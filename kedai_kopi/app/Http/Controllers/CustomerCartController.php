<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class CustomerCartController extends Controller
{
    private const SESSION_KEY = 'cart';

    public function index()
    {
        $cart = session()->get(self::SESSION_KEY, []);
        $items = $this->resolveCartItems($cart);
        $totals = $this->calculateTotals($items);

        return view('customer.cart', compact('items', 'totals'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'qty' => ['nullable', 'integer', 'min:1', 'max:99'],
        ]);

        $variantId = (int) $data['variant_id'];
        $qty = (int) ($data['qty'] ?? 1);

        $cart = session()->get(self::SESSION_KEY, []);
        $cart[(string) $variantId] = (int) ($cart[(string) $variantId] ?? 0) + $qty;
        $cart[(string) $variantId] = min(99, $cart[(string) $variantId]);

        session()->put(self::SESSION_KEY, $cart);

        return redirect()->route('customer.purchase')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'qty' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $variantId = (int) $data['variant_id'];
        $qty = (int) $data['qty'];

        $cart = session()->get(self::SESSION_KEY, []);

        // qty minimal 1
        $cart[(string) $variantId] = max(1, $qty);

        session()->put(self::SESSION_KEY, $cart);

        return redirect()
            ->route('customer.cart')
            ->with('success', 'Keranjang diperbarui.');
    }

    public function remove(Request $request)
    {
        $data = $request->validate([
            'variant_id' => ['required', 'integer', 'exists:product_variants,id'],
        ]);

        $variantId = (int) $data['variant_id'];
        $cart = session()->get(self::SESSION_KEY, []);
        unset($cart[(string) $variantId]);
        session()->put(self::SESSION_KEY, $cart);

        return redirect()->route('customer.cart')->with('success', 'Item dihapus dari keranjang.');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get(self::SESSION_KEY, []);

        // payment method is currently UI-only; we keep it for future use
        $paymentGroup = $request->input('payment_group');

        if (empty($cart)) {
            return redirect()->route('customer.cart')->with('error', 'Keranjang kosong.');
        }

        $items = $this->resolveCartItems($cart);
        $totals = $this->calculateTotals($items);

        $transaction = Transaction::create([
            'cust_id' => (string) (Auth::id() ?? '0'),
            'subtotal' => $totals['subtotal'],
            'discount' => $totals['discount'],
            'tax' => $totals['tax'],
            'grand_total' => $totals['grand_total'],
            'in_or_out' => 'in',
            'payment_status' => false,
        ]);

        foreach ($items as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'variant_id' => $item['variant']->id,
                'qty' => $item['qty'],
                'unit_price' => $item['unit_price'],
            ]);
        }

        // clear cart
        session()->forget(self::SESSION_KEY);

        return redirect()->route('customer.transactions')->with('success', 'Checkout berhasil. Status pembayaran: pending.');
    }

    private function resolveCartItems(array $cart): array
    {
        if (empty($cart)) {
            return [];
        }

        $variantIds = array_map('intval', array_keys($cart));
        $variants = ProductVariant::with('product')->whereIn('id', $variantIds)->get()->keyBy('id');

        $items = [];
        foreach ($cart as $variantId => $qty) {
            $variant = $variants->get((int) $variantId);
            if (!$variant) {
                continue;
            }

            $qty = (int) $qty;
            if ($qty <= 0) {
                continue;
            }

            $items[] = [
                'variant' => $variant,
                'qty' => $qty,
                'unit_price' => (float) $variant->price,
                'line_total' => (float) $variant->price * $qty,
            ];
        }

        return $items;
    }

    private function calculateTotals(array $items): array
    {
        $subtotal = 0.0;
        foreach ($items as $item) {
            $subtotal += $item['line_total'];
        }

        // simple demo: discount/tax = 0. You can adjust later.
        $discount = 0.0;
        $tax = 0.0;
        $grandTotal = $subtotal - $discount + $tax;

        return [
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'grand_total' => $grandTotal,
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CustomerPurchaseController extends Controller
{
    public function index()
    {
        return view('customer.purchase');
    }

    public function transactions()
    {
        // ambil data customer menggunakan id user
        $customer = Customer::where('user_id', auth()->id())->first();

        $transactions = Transaction::with(
            'details.variant.product'
        )
        ->where('cust_id', $customer->id)
        ->orderByDesc('created_at')
        ->paginate(10)
        // mapping data agar lebih rapih di Js
        ->through(function ($tx) {
            return [
                'id' => str_pad($tx->id, 4, '0', STR_PAD_LEFT),
                'subtotal' => 'Rp'.number_format($tx->subtotal, 0, ',', '.'),
                'total' => number_format($tx->grand_total, 0, ',', '.'),
                'status' => $tx->status,
                'items' => $tx->details->map(function ($detail) {
                    return [
                        'name' => $detail->variant?->product?->name ?? '-',
                        'variant' => $detail->variant?->variant_name ?? '-',
                        'qty' => $detail->qty,
                        'price' => $detail->variant?->price ?? 0,
                    ];
                }),
                'created_at' => $tx->created_at->format('d M Y, H:i'),
                'payment_status' => $tx->payment_status,
            ];
        });

        return view('customer.transactions', compact('transactions'));
    }
}

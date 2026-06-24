<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');

        $transactions = Transaction::with('customer.user', 'details.variant.product')

            ->when($status === 'pending', function ($q) {
                $q->where('payment_status', 0);
            })

            ->when($status === 'success', function ($q) {
                $q->where('payment_status', 1);
            })

            ->latest()
            ->paginate(20);

        $stats = [
            'total' => Transaction::count(),
            'pending' => Transaction::where('payment_status', 0)->count(),
            'success' => Transaction::where('payment_status', 1)->count(),
            'revenue' => Transaction::where('payment_status', 1)
                ->sum('grand_total'),
        ];

        return view(
            'dashboard.transactions',
            compact(
                'transactions',
                'status',
                'stats'
            )
        );
    }

    public function approve(Transaction $transaction)
    {
        if ($transaction->payment_status == 1) {
            return back()->with(
                'error',
                'Pembayaran sudah diverifikasi.'
            );
        }

        $transaction->update([
            'payment_status' => 1
        ]);

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi.'
        );
    }
}

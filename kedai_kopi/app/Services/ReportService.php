<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\TransactionDetail;

use function Laravel\Prompts\number;

class ReportService
{
    public function getData()
    {
        $transaction = Transaction::all();

        $totalTransaction = $transaction->count();
        $currentMonthRevenue = $this->getRevenue(now()->year, now()->month);
        $previousMonthRevenue = $this->getRevenue(now()->year, now()->subMonth()->month);
        $deviation = $currentMonthRevenue - $previousMonthRevenue;
        $growth = number_format($deviation / $currentMonthRevenue, 2) * 100;

        // dd($pastMonths);

        return [
            'totalTransaction' => $totalTransaction,
            'currentMonthRevenue' => $currentMonthRevenue,
            'deviation' => $deviation,
            'growth' => $growth,
            'average' => $this->monthlyAvg(now()->month),
            'topMenu' => $this->topMenu(2024, 2),
        ];
    }

    public function getRevenue(
        ?int $year = null,
        ?int $month = null
    ) {
        $query = Transaction::query();

        if ($year) {
            $query->whereYear('created_at', $year);
        }

        if ($month) {
            $query->whereMonth('created_at', $month);
        }

        return $query->sum('grand_total');
    }

    public function monthlyAvg(int $month)
    {
        return Transaction::whereYear('created_at', now()->year)
            ->whereMonth('created_at', $month)
            ->avg('grand_total');
    }

    public function topMenu(
        ?int $year = null,
        ?int $month = null
    ) {
        $totalSold = TransactionDetail::query();

        $menus = TransactionDetail::query()
            ->join(
                'product_variants',
                'transaction_details.variant_id',
                '=',
                'product_variants.id'
            )
            ->join(
                'products',
                'product_variants.product_id',
                '=',
                'products.id'
            )
            ->selectRaw(
                'products.id,
                products.name,
                SUM(transaction_details.qty) as total_sold'
            )
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_sold');

        if ($year) {
            $totalSold->whereYear('created_at', $year);
            $menus->whereYear('transaction_details.created_at', $year);
        }

        if ($month) {
            $totalSold->whereMonth('created_at', $month);
            $menus->whereMonth('transaction_details.created_at', $month);
        }

        return $menus->take(5)->get()->map(function ($menu) use ($totalSold) {
            return (object) [
                'id' => $menu->id,
                'name' => $menu->name,
                'total_sold' => $menu->total_sold,
                'percentage' => round(
                    ($menu->total_sold / $totalSold->sum('qty')) * 100,
                    2
                ),
            ];
        });
    }
}

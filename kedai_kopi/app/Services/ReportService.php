<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Number;

class ReportService
{
    public function getData()
    {
        $transaction = Transaction::all();
        $customer = Customer::all();

        $totalTransaction = $transaction->count();
        $currentMonthRevenue = $this->getRevenue($this->getLast()->year, $this->getLast()->month);
        $previousMonthRevenue = $this->getRevenue($this->getLast()->year, ($this->getLast()->month - 1));
        $deviation = $currentMonthRevenue - $previousMonthRevenue;
        $growth = number_format(abs($deviation / $currentMonthRevenue * 100), 2);
        $loyalCust = $customer->where('status', 'vip');
        $topCust = $customer->sortByDesc('points')->take(5);

        $revenues = [];
        foreach ($this->lastSix() as $month) {
            $revenues[] = $this->getRevenue(
                Carbon::parse($month)->format('Y'), 
                Carbon::parse($month)->format('n')
            );
        }

        return [
            'totalTransaction' => $totalTransaction,
            'currentMonthRevenue' => Number::abbreviate($currentMonthRevenue, precision: 1),
            'deviation' => $deviation,
            'growth' => $growth,
            'average' => $this->monthlyAvg($this->getLast()->month),
            'topMenu' => $this->topMenu($this->getLast()->year, $this->getLast()->month),
            'label' => $this->lastSix(),
            'revenues' => $revenues,
            'totalCust' => $customer->count(),
            'totalLoyalCust' => $loyalCust->count(),
            'topCust' => $topCust,
        ];
    }

    public function getLast()
    {
        $latestTransaction = Transaction::latest('created_at')->first();

        return (object) [
            'month' => $latestTransaction->created_at->month,
            'year' => $latestTransaction->created_at->year
        ];
    }

    public function getRevenue(
        ?int $year = null,
        ?int $month = null
    ): int {
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
        return Transaction::whereYear('created_at', $this->getLast()->year)
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
                'products.name,
                SUM(transaction_details.qty) as total_sold'
            )
            ->groupBy('products.name')
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
                'name' => $menu->name,
                'total_sold' => $menu->total_sold,
                'percentage' => round(
                    ($menu->total_sold / $totalSold->sum('qty')) * 100,
                    2
                ),
            ];
        });
    }

    public function lastSix()
    {
        $lastYear = $this->getLast()->year;
        $lastMonth = $this->getLast()->month;
        $months = [];

        for ($i = 5; $i >= 0; $i--) {
            $months[] = Carbon::create(
                $lastYear,
                $lastMonth
            )
                ->subMonths($i)
                ->translatedFormat('M Y');
        }

        return $months;
    }
}

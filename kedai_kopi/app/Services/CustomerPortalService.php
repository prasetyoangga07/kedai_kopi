<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\LoyaltyLevel;
use App\Models\Transaction;

class CustomerPortalService
{
    public function getData()
    {
        $customer = Customer::where('user_id', auth()->id())->first();
        $transaction = Transaction::where('customer_id', $customer->id)
            ->where('payment_status', 1)
            ->get();

        $member = $customer->loyalty?->name;
        $memberColorPr = $this->getClass($member)['colorPr'];
        $memberColorSc = $this->getClass($member)['colorSc'];
        $memberColorTx = $this->getClass($member)['colorTx'];
        
        $nextLevel = LoyaltyLevel::query()
            ->where('min_points', '>', $customer->total_points)
            ->orderBy('min_points')
            ->first();

        // handle statement ketika member sudah paling tinggi
        if ($nextLevel) {
            $nextName = $nextLevel->name;
            $nextPoint = $nextLevel->min_points;
            $nextLess = $nextLevel->min_points - $customer->total_points;
            $nextPercent = $customer->points/$nextLevel->min_points * 100;
        } else {
            $nextName = $member;
            $nextPoint = 0;
            $nextLess = 0;
            $nextPercent = 100;
        }
        // dd($nextPercent);
        
        return [
            'points' => number_format($customer->total_points, 0, ',', '.'),
            'totalSpend' => number_format($transaction->sum('grand_total'), 0, ',', '.'),
            'member' => $member,
            'colorPr' => $memberColorPr,
            'colorSc' => $memberColorSc,
            'colorTx' => $memberColorTx,
            'nextName' => $nextName,
            'nextPoint' => $nextPoint,
            'nextLess' => $nextLess,
            'nextPercent' => $nextPercent
        ];
    }

    public function getClass(string $member)
    {   
        $colorPr = LoyaltyLevel::where('name', $member)->value('primary_color');
        $colorSc = LoyaltyLevel::where('name', $member)->value('secondary_color');
        $colorTx = LoyaltyLevel::where('name', $member)->value('text_color');

        return [
            'colorPr' => $colorPr,
            'colorSc' => $colorSc,
            'colorTx' => $colorTx,
        ];
    }
}
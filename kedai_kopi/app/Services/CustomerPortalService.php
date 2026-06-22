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
        $transaction = Transaction::where('cust_id', $customer->id)->get();

        $member = $customer->loyalty?->name;
        $memberColorPr = $this->getClass($member)['colorPr'];
        $memberColorSc = $this->getClass($member)['colorSc'];
        $memberColorTx = $this->getClass($member)['colorTx'];
        
        $nextLevel = LoyaltyLevel::query()
            ->where('min_points', '>', $customer->points)
            ->orderBy('min_points')
            ->first();

        $nextLess = $nextLevel->min_points - $customer->points;
        $nextPercent = $customer->points/$nextLevel->min_points * 100;
        // dd($nextPercent);
        
        return [
            'points' => number_format($customer->points, 0, ',', '.'),
            'totalSpend' => number_format($transaction->sum('grand_total'), 0, ',', '.'),
            'member' => $member,
            'colorPr' => $memberColorPr,
            'colorSc' => $memberColorSc,
            'colorTx' => $memberColorTx,
            'nextName' => $nextLevel->name,
            'nextPoint' => $nextLevel->min_points,
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoyaltyLevel extends Model
{
    protected $table = 'loyalty_levels';

    protected $fillable = [
        'name',
        'min_points',
        'max_points',
        'primary_color',
        'secondary_color',
        'text_color',
    ];

    // hitung jumlah customer pada level tertentu
    public function getCustomerCountAttribute()
    {
        return Customer::query()
            ->withSum('transaction', 'points')->get()
            ->filter(function ($customer) {
                $points = $customer->transaction_sum_points ?? 0;
                return $points >= $this->min_points && $points <= $this->max_points;
            })
            ->count();
    }
}

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

    public function getCustomerCountAttribute()
    {
        return Customer::query()
            ->where('points', '>=', $this->min_points)
            ->when(
                $this->max_points,
                fn($q) => $q->where(
                    'points',
                    '<=',
                    $this->max_points
                )
            )
            ->count();
    }
}

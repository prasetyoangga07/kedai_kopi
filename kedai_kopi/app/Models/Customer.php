<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'phone',
        'points',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLoyaltyAttribute()
    {
        return LoyaltyLevel::query()
            ->where('min_points', '<=', $this->points)
            ->where(function ($q) {
                $q->whereNull('max_points')
                ->orWhere('max_points', '>=', $this->points);
            })
            ->first();
    }
}

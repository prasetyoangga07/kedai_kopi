<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'phone',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getTotalPointsAttribute()
    {
        return $this->transaction()
            ->where('payment_status', 1)
            ->sum('points');
    }

    // menentukan level customer dari tabel loyalty
    public function getLoyaltyAttribute()
    {
        return LoyaltyLevel::query()
            ->where('min_points', '<=', $this->total_points)
            ->where(function ($q) {
                $q->whereNull('max_points')
                ->orWhere('max_points', '>=', $this->total_points);
            })
            ->first();
    }
}

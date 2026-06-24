<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'customer_id',
        'subtotal',
        'discount',
        'tax',
        'grand_total',
        'in_or_out',
        'points',
        'payment_status',
        'payment_method',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}

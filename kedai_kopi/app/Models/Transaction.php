<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'cust_name',
        'subtotal',
        'discount',
        'tax',
        'grand_total',
        'in_or_out',
        'payment_status',
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}

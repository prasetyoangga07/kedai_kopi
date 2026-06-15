<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';

    public function variantId()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}

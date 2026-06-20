<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'points',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

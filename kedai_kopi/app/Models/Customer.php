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

    public function getInitialsAttribute(): string
    {
        return collect(preg_split('/\s+/', trim($this->name)))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->join('');
    }
}

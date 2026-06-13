<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apriori extends Model
{
    protected $table = 'assosiation_rules';

    protected $fillable = [
        'antecedents',
        'consequents',
        'support',
        'confidence',
        'lift',
        'is_active',
    ];
}

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

    protected $casts = [
        'antecedents' => 'array',
        'consequents' => 'array',
    ];

    public function getRulesLabelAttribute()
    {
        return match (true) {
            $this->leverage >= 0.75 => 'Sangat Kuat',
            $this->leverage >= 0.5 => 'Menengah',
            $this->leverage >= 0.25 => 'Lemah',
            default => 'Sangat Lemah'
        };
    }
}

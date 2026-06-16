<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignStatistic extends Model
{
    protected $fillable = [
        'campaign_id',
        'reach_count',
        'transaction_count',
        'revenue',
        'conversion_rate'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
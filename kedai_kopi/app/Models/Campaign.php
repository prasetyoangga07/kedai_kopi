<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'campaign_type',
        'discount_percentage',
        'target_revenue',
        'start_date',
        'end_date',
        'banner',
        'created_by'
    ];

    public function statistics()
    {
        return $this->hasOne(CampaignStatistic::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'campaign_products',
            'campaign_id',
            'product_id'
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
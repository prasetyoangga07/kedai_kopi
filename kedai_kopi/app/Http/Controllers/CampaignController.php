<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignProduct;
use App\Models\CampaignStatistic;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with([
            'statistics',
            'products',
            'creator'
        ])->get();

        $activeCampaigns = Campaign::where('status', 'active')->count();

        $totalRevenue = CampaignStatistic::sum('revenue');

        $totalProductsPromo = CampaignProduct::distinct('variant_id')->count('variant_id');

        $avgConversion = round(
            CampaignStatistic::avg('conversion_rate') ?? 0,
            1
        );

        return view('campaigns.index', compact(
            'campaigns',
            'activeCampaigns',
            'totalRevenue',
            'totalProductsPromo',
            'avgConversion'
        ));
    }


    public function store(Request $request)
    {
        Campaign::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'campaign_type' => $request->campaign_type,
            'discount_percentage' => $request->discount_percentage,
            'target_revenue' => $request->target_revenue,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_by' => 1,
        ]);

        return redirect()->back()
            ->with('success', 'Campaign berhasil dibuat');
    }

    public function update(Request $request, Campaign $campaign)
    {
        $banner = $campaign->banner;

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner')
                ->store('campaigns', 'public');
        }

        $campaign->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'campaign_type' => $request->campaign_type,
            'discount_percentage' => $request->discount_percentage,
            'target_revenue' => $request->target_revenue,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'banner' => $banner,
        ]);

        return back()->with(
            'success',
            'Campaign berhasil diperbarui'
        );
    }

    public function destroy(Campaign $campaign)
    {
        // hapus relasi statistik
        $campaign->statistics()->delete();

        // hapus relasi many-to-many produk
        $campaign->products()->detach();

        // hapus campaign
        $campaign->delete();

        return redirect()->back()
            ->with('success', 'Campaign berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Campaign;
use App\Models\Customer;

class LandingController extends Controller
{
    public function index()
    {
        $products = Product::with('variant')
            ->latest()
            ->take(3)
            ->get();

        $campaigns = Campaign::where('status', 'active')
            ->latest()
            ->take(3)
            ->get();

        $totalCustomers = Customer::count();
        $totalProducts = Product::count();
        $totalCampaigns = Campaign::count();

        return view('landing', compact(
            'products',
            'campaigns',
            'totalCustomers',
            'totalProducts',
            'totalCampaigns'
        ));
    }
}

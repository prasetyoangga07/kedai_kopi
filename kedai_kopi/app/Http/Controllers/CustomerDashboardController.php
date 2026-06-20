<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $category = $request->query('category', '');

        $productsQuery = Product::with('variant')->latest();

        if ($q !== '') {
            $productsQuery->where(function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhere('category', 'like', "%{$q}%");
            });
        }

        if ($category !== '') {
            $productsQuery->where('category', $category);
        }

        $products = $productsQuery->get();

        return view('customer.dashboard', compact('products'));
    }
}

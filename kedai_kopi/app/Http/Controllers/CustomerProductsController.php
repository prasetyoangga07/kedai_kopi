<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductsController extends Controller
{
    public function index()
    {
        // tampilkan grid produk untuk user, tanpa pakai halaman visitor
        $products = Product::with('variant')
            ->latest()
            ->get();

        return view('customer.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('variant');

        return view('customer.products.show', compact('product'));
    }
}

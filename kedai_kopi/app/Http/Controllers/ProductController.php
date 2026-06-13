<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('variant')->get();
        // dd($products->toArray());
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description
        ]);

        foreach ($request->variant as $variant) {
            if ($variant['id']) {
                ProductVariant::find($variant['id'])
                    ->update([
                        'sku' => $variant['sku'],
                        'variant_name' => $variant['variant_name'],
                        'price' => $variant['price'],
                        'is_active' => $variant['is_active']
                    ]);
            } else {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'sku' => $variant['sku'],
                    'variant_name' => $variant['variant_name'],
                    'price' => $variant['price'],
                    'is_active' => $variant['is_active']
                ]);
            }
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('show_edit_modal', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

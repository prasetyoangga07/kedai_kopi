<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\LoyaltyLevel;
use Illuminate\Http\Request;

class LoyaltyLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyalty = LoyaltyLevel::orderBy('min_points', 'asc')->get();
        return view('dashboard.loyalty', compact('loyalty'));
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
        try {
            LoyaltyLevel::create([
                'name' => $request->name,
                'min_points' => $request->min_points,
                'max_points' => $request->max_points,
                'primary_color' => $request->primary_color,
                'secondary_color' => $request->secondary_color,
                'text_color' => $request->text_color,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Loyalty baru berhasil dibuat'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LoyaltyLevel $loyaltyLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoyaltyLevel $loyaltyLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $loyalty = LoyaltyLevel::findOrFail($id);

            $loyalty->update([
                'name' => $request->name,
                'min_points' => $request->min_points,
                'max_points' => $request->max_points,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Loyalty berhasil diperbarui'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoyaltyLevel $loyaltyLevel)
    {
        //
    }
}

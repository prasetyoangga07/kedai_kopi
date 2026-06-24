<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cust = Customer::query()
            ->with('user')
            ->withSum('transaction', 'points')
            ->whereHas('user', function ($q) {
                $q->where(
                    'name',
                    'like',
                    '%' . request('search') . '%'
                );
            })
            ->paginate(10)
            ->withQueryString();
        $customer = Customer::all();
        return view('dashboard.customers', compact('cust', 'customer'));
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
    public function store(CustomerRequest $request)
    {
        try {
            Customer::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data pelanggan berhasil diperbarui'
            ]);;
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'points' => $request->points,
            'status' => $request->status
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pelanggan berhasil diperbarui'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {

            $data = Customer::findOrFail($id);
            $data->delete();

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}

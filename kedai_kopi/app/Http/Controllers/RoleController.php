<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.roles', [
            'roles'            => Role::withCount('users')->with('permissions')->paginate(10),
            'permissions'      => Permission::orderBy('name')->get(),
            'totalRoles'       => Role::count(),
            'activeRoles'      => Role::has('users')->count(),
            'totalPermissions' => Permission::count(),
            'totalUsers'       => User::count(),
        ]);
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
            $role = Role::create([
                'name' => $request->name,
            ]);

            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($request->permissions);

            return response()->json([
                'success' => true,
                'message' => 'Role baru berhasil dibuat'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $role = Role::findOrFail($id);

            $role->update([
                'name' => $request->name,
            ]);

            // ngambil nama permission karena dari request hasilnya id
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);

            return response()->json([
                'success' => true,
                'message' => 'Role berhasil diperbarui'
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
    public function destroy(string $id)
    {
        try {
            Role::findOrFail($id)->delete();

            return redirect()->back()->with('success', 'Akun berhasil dihapus');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}

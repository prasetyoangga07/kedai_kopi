<?php

namespace App\Http\Controllers;

use App\Mail\UserCredentialMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::query()
            ->when(
                request('seacrh'),
                fn($q) => $q->where(
                    'name',
                    'like',
                    '%' . request('search') . '%'
                )
            )
            ->when(
                request('type') === 'staff',
                fn($q) => $q->whereHas('roles') 
            )
            ->when(
                request('type') === 'customer',
                fn($q) => $q->whereDoesntHave('roles') 
            )
            ->paginate(10)
            ->withQueryString();
        $roles = Role::all();
        $totalAdmin = User::Role(['admin', 'super admin'])->count();
        $totalStaff = User::permission('admin.panel')->count();
        return view('dashboard.users', compact('users', 'roles', 'totalAdmin', 'totalStaff'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $pass = Str::random(10);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,

                // password random sementara
                'password' => bcrypt($pass)
            ]);

            $user->assignRole($request->role);

            Mail::to($user->email)
                ->send(
                    new UserCredentialMail($user, $pass)
                );

            return response()->json([
                'success' => true,
                'message' => 'Akun pengguna berhasil dibuat cek email akun'
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $user = User::findOrFail($id);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            $user->syncRoles($request->role);

            return response()->json([
                'success' => true,
                'message' => 'Akun pengguna berhasil diperbarui'
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
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->back()->with('success', 'Akun berhasil dihapus');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}

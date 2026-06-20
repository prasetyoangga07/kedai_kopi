<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
            ->paginate(10)
            ->withQueryString();
        $roles = Role::all();
        $totalAdmin = User::role('admin')->count();
        return view('dashboard.users', compact('users', 'roles', 'totalAdmin'));
    }
}

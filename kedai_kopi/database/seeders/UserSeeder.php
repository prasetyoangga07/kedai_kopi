<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin Ganteng',
            'email' => 'adminganteng@kopin.com',
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');
    }
}

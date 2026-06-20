<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'dashboard.view']);

        Permission::create(['name' => 'products.view']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.update']);
        Permission::create(['name' => 'products.delete']);

        Permission::create(['name' => 'customers.view']);
        Permission::create(['name' => 'customers.create']);
        Permission::create(['name' => 'customers.update']);
        Permission::create(['name' => 'customers.delete']);

        Permission::create(['name' => 'transactions.view']);

        Permission::create(['name' => 'apriori.view']);        
        Permission::create(['name' => 'apriori.create']);
        
        // Customer 
        Permission::create(['name' => 'portal.view']);

        $admin = Role::create([
            'name' => 'admin'
        ]);

        $barista = Role::create([
            'name' => 'barista'
        ]);

        $admin->givePermissionTo(
            Permission::all()
        );

        $barista->givePermissionTo([
            'dashboard.view',

            'products.view',

            'customers.view',

            'transactions.view',
        ]);
    }
}

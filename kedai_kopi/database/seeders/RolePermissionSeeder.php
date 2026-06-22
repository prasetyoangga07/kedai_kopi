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
        Permission::create(['name' => 'admin.panel']);

        Permission::create(['name' => 'dashboard.view']);

        Permission::create(['name' => 'customer.view']);
        Permission::create(['name' => 'customer.update']);
        Permission::create(['name' => 'customer.delete']);

        Permission::create(['name' => 'product.view']);
        Permission::create(['name' => 'product.create']);
        Permission::create(['name' => 'product.update']);
        Permission::create(['name' => 'product.delete']);

        Permission::create(['name' => 'campaign.view']);
        Permission::create(['name' => 'campaign.create']);
        Permission::create(['name' => 'campaign.update']);
        Permission::create(['name' => 'campaign.delete']);
        
        Permission::create(['name' => 'apriori.view']);
        Permission::create(['name' => 'apriori.generate']);
        
        Permission::create(['name' => 'report.view']);
        
        Permission::create(['name' => 'user.view']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.update']);
        Permission::create(['name' => 'user.delete']);
        
        Permission::create(['name' => 'role.view']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.update']);
        Permission::create(['name' => 'role.delete']);
        
        $superadmin = Role::create([
            'name' => 'super admin'
        ]);

        $admin = Role::create([
            'name' => 'admin'
        ]);

        $barista = Role::create([
            'name' => 'barista'
        ]);

        $marketing = Role::create([
            'name' => 'marketing'
        ]);

        $superadmin->givePermissionTo(
            Permission::all()
        );

        $admin->givePermissionTo([
            'admin.panel',

            'dashboard.view',

            'customer.view',
            'customer.update',
            'customer.delete',
            
            'product.view',
            'product.create',
            'product.update',
            'product.delete',

            'campaign.view',
            'campaign.create',
            'campaign.update',
            'campaign.delete',

            'apriori.view',
            'apriori.generate',

            'report.view'
        ]);

        $barista->givePermissionTo([
            'admin.panel',

            'dashboard.view',

            'product.view',
            'product.create',
            'product.update',
            'product.delete',

            'campaign.view'
        ]);

        $marketing->givePermissionTo([
            'admin.panel',
            
            'dashboard.view',
            
            'customer.view',

            'product.view',
            'product.create',
            'product.update',
            'product.delete',

            'campaign.view',
            'campaign.create',
            'campaign.update',
            'campaign.delete',

            'apriori.view',
            'apriori.generate',

            'report.view'
        ]);
    }
}

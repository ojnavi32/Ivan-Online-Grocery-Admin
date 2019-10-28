<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** ROLES **/
        $admin = ['name' => 'administrator'];
        $customer = ['name' => 'customer'];

        /** PERMISSIONS **/
        $adminLists = [
            'add-category',
            'edit-category',
            'delete-category',

            'add-product',
            'edit-product',
            'delete-product',

            'add-customer',
            'edit-customer',
            'delete-customer',

            'process-order',
            'view-dashboard',
            'view-report',
        ];

        $customerLists = [
            'cart-add-product',
            'checkout',
            'view-cart'
        ];

        $adminRole = Role::create($admin);
        $customerRole = Role::create($customer);

        foreach ($adminLists as $item) {
            $adminPermissions[] = Permission::create(['name' => $item]);
        }

        foreach ($customerLists as $item) {
            $customerPermissions[] = Permission::create(['name' => $item]);
        }

        $adminRole->givePermissionTo($adminPermissions);
        $customerRole->givePermissionTo($customerPermissions);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles Seeder
        $admin = Role::whereName('Admin')->first();
        if (is_null($admin)) {
            $admin = Role::create([
                'name' => 'Admin',
            ]);
        }

        // Permission Seeder
        $permissions = [
            'list user',
            'tambah user',
            'edit user',
            'delete user',
            'list customer',
            'edit customer',
            'delete customer',
        ];

        $createdId = [];
        foreach ($permissions as $item) {

            $permission = Permission::whereName($item)->first();
            if (is_null($permission)) {
                $permission = Permission::create([
                    'name' => $item,
                ]);
            }
            $createdId[] = $permission->id;

            $admin->givePermissionTo($permission);
        }

        // Clean Permission
        Permission::whereNotIn('id', $createdId)->delete();
    }
}

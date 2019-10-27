<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::create(['name' => 'admin']);
        $tenant_role = Role::create(['name' => 'tenant']);

        $admin_permission = Permission::create(['name' => 'edit all']);
        $tenant_permission = Permission::create(['name' => 'manage market stores']);

        $admin_role->givePermissionTo($admin_permission);
        $admin_permission->assignRole($admin_role);
        $tenant_role->givePermissionTo($tenant_permission);

        $admin_user = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $tenant_user = User::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'janedoe@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        $admin_user->givePermissionTo($admin_permission);
        $admin_user->assignRole('admin');
        $tenant_user->assignRole('tenant');
    }
}

<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>'secret',
            'role' => 'ROLE_SUPER_ADMIN',
        ]);
        //$role=Role::create(['guard_name' => 'api_user', 'name' => 'super_admin']);
        //$admin->assignRole($role->getRoleName());
        //$role->givePermissionTo('products.*');

        $user = User::create([
            'firstname' => 'user',
            'lastname' => 'user',
            'email' => 'user@gmail.com',
            'password' => 'secret',
            'role' => 'ROLE_USER_ADMIN',
        ]);
        //$user->assignRole('user');


        
        
    }
}

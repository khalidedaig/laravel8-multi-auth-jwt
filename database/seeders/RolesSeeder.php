<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['guard_name' => 'api_user', 'name' => 'super_admin']);
        Role::create(['guard_name' => 'api_user', 'name' => 'user']);

        Role::create(['guard_name' => 'api_delivery_man', 'name' => 'super_delivery_man']);
        Role::create(['guard_name' => 'api_delivery_man', 'name' => 'under_delivery_man']);

        Role::create(['guard_name' => 'api_beneficiary', 'name' => 'super_beneficiary']);

        
    }
}

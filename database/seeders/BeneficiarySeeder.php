<?php

namespace Database\Seeders;

use App\Models\Beneficiary;
use Illuminate\Database\Seeder;

class BeneficiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beneficiary = Beneficiary::create([
            'firstname' => 'beneficiary',
            'lastname' => 'beneficiary',
            'email' => 'beneficiary@gmail.com',
            'password' => 'secret',
            'role' => 'ROLE_BENEFICIARY',
        ]);
        //$beneficiary->assignRole("beneficiary");
    }
}

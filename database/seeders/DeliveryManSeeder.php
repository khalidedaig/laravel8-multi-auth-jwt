<?php

namespace Database\Seeders;

use App\Models\DeliveryMan;
use Illuminate\Database\Seeder;

class DeliveryManSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superDeliveryMan = DeliveryMan::create([
            'firstname' => 'super',
            'lastname' => 'deliveryman',
            'email' => 'superdeliveryman@gmail.com',
            'password' => 'secret',
            'role' => 'ROLE_BENEFICIARY',
        ]);
        //$superDeliveryMan->assignRole('super_delivery_man');

        $underDeliveryMan = DeliveryMan::create([
            'firstname' => 'under',
            'lastname' => 'deliveryman',
            'email' => 'underdeliveryman@gmail.com',
            'password' => 'secret',
            'role' => 'ROLE_BENEFICIARY',
        ]);
        //$underDeliveryMan->assignRole("under_delivery_man");
    }
}

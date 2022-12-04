<?php

namespace Database\Seeders;

use App\Models\TravelPayment;
use App\Models\User;
use Illuminate\Database\Seeder;

class TravelPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            TravelPayment::factory()->count(200)->for($user)->create();
        }
    }
}

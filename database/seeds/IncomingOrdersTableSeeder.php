<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;;

class IncomingOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('orders')->insert([
                [
                    'name' => str_random(10),
                    'price' => "1000",
                    'location' => str_random(7),
                    'order' => "Pizza",
                    'phone' => mt_rand(100000, 999999),
                    'email' => str_random(10) . '@gmail.com',
                    'name' => str_random(30)
                ]

            ]);
        }
    }
}

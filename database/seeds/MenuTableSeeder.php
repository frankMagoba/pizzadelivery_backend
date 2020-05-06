<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'name' => "Italian Pizza",
                'price' => "1000",
            ],
            [
                'name' => "Diced Pineapples Pizza",
                'price' => "500",
            ],
            [
                'name' => "Veggie Pizza",
                'price' => "300",
            ],
            [
                'name' => "German Pizza",
                'price' => "560",
            ],
        ]);
    }
}

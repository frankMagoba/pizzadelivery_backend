<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => "Busia",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Classic Pizza with mozarella cheese and tomato sauce",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__7__oehiYXnV7Dk.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Nairobi",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Pizza served in a square bread, with peperonni and ham",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__8__-txOQbA2l6.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Mombasa",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Pizza with cherry tomatoes, peppers and onions",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__9__0bAXVH8aIb.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Kisumu",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Kisumu Style Pizza, with shredded mozarella cheese and tomatoe sauce",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__6__VzLRxyEdOPBw.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Eldoret",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Also known as the \"The Devil's Pizza\", because it was invented in the depths of hell. Why would you subject yourself to this?",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__3__IaCGV9G_l.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Kitale",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Kisumu style pizza, served on square bread used as a kind of deep plate",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__2__VXIC2t8bN.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Mandera",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "Mandera Style Pizza",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__4__Rw-M71JSv.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Margarita",
            'price' => 10.5,
            'type' => "pizza",
            'description' => "The orginal, the one that started it all",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__1__wYMM0yMh2s.jpeg",
        ]);

        DB::table('items')->insert([
            'name' => "Large Soda",
            'price' => 1.99,
            'type' => "other",
            'description' => "A large soda of your choice",
            'image_url' => "https://www.cfacdn.com/img/order/COM/Menu_Refresh/Drinks/Drinks%20PDP/_0000s_0022_Feed_Menu_0000_Drinks_Coca-cola.png",
        ]);

        DB::table('items')->insert([
            'name' => "Medium Soda",
            'price' => 1,
            'type' => "other",
            'description' => "A medium soda of your choice",
            'image_url' => "https://ik.imagekit.io/714jicfzzb/images__5__Tapc-58GTDd.jpeg",
        ]);

        DB::table('currencies')->insert([
            'name' => "Dollar",
            'symbol' => "$",
            'exchange_rate' => 1,
        ]);

        DB::table('currencies')->insert([
            'name' => "Shillings",
            'symbol' => "Ksh",
            'exchange_rate' => 0.01,
        ]);

        DB::table('users')->insert([
            'name' => "Test User",
            'email' => 'test@testmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

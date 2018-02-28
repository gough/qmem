<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Category, \App\User;

class ConsumablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        for ($i = 1; $i < 234; $i++) {
            $random_date = mt_rand(1400000000, 1500000000);
            DB::table('consumables')->insert([
                'name' => $faker->catchPhrase,
                'category_id' => Category::all()->random()->id,
                'quantity' => mt_rand(0, 100),
                'user_id' => User::all()->random()->id,
                'created_at' => date("Y-m-d H:i:s", $random_date),
                'updated_at' => date("Y-m-d H:i:s", $random_date),
            ]);
        }
    }
}

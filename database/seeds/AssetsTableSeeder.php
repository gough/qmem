<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i < 150; $i++) {
            $random_date = mt_rand(1400000000, 1500000000);
            DB::table('assets')->insert([
                'name' => $faker->slug,
                'type' => 'capital',
                'user' => $faker->firstName . ' ' . $faker->lastName,
                'created_at' => date("Y-m-d H:i:s", $random_date),
                'updated_at' => date("Y-m-d H:i:s", $random_date),
            ]);
        }

        for ($i = 1; $i < 150; $i++) {
            $random_date = mt_rand(1400000000, 1500000000);
            DB::table('assets')->insert([
                'name' => $faker->slug,
                'type' => 'consumable',
                'user' => $faker->firstName . ' ' . $faker->lastName,
                'created_at' => date("Y-m-d H:i:s", $random_date),
                'updated_at' => date("Y-m-d H:i:s", $random_date),
            ]);
        }
    }
}

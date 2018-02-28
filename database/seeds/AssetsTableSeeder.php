<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\User;

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
        for ($i = 1; $i < 123; $i++) {
            $random_date = mt_rand(1400000000, 1500000000);
            DB::table('assets')->insert([
                'name' => $faker->catchPhrase,
                'category' => $faker->city,
                'user_id' => User::where('active', True)->where('name', '<>', '')->get()->random()->id,
                'created_at' => date("Y-m-d H:i:s", $random_date),
                'updated_at' => date("Y-m-d H:i:s", $random_date),
            ]);
        }
    }
}

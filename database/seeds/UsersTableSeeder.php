<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'netid' => '15ag36',
            'group' => 'admin',
            'name' => '',
            'email' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'netid' => '13sjk',
            'group' => 'admin',
            'name' => '',
            'email' => '',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        for ($i = 1; $i < 8; $i++) {
            $random_date = mt_rand(1400000000, 1500000000);
            DB::table('users')->insert([
                'netid' => '',
                'group' => 'user',
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'email' => $faker->email,
                'created_at' => date("Y-m-d H:i:s", $random_date),
                'updated_at' => date("Y-m-d H:i:s", $random_date),
            ]);
        }
    }
}

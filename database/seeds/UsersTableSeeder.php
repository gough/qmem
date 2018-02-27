<?php

use Illuminate\Database\Seeder;
use \App\User;

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

        // our first user is important, because it will be the one used on local machines
        // (when netid system is unavailable)
        $user = new User;
        $user->netid = '12ab34';
        $user->group = 'admin';
        $user->name = 'Test User';
        $user->email = 'test.user@example.com';
        $user->active = True;
        $user->save();

        $netids = [
            '15ag36', // Adam
            '14ajn', // Annika
            '12jeh6', // Josh
            '13lr31', // Lucy
            '', // Sahsa
        ];

        foreach ($netids as $netid) {
            $user = new User;
            $user->netid = $netid;
            $user->group = 'admin';
            $user->name = '';
            $user->email = '';
            $user->active = True;
            $user->save();
        }

        for ($i = 1; $i < 7; $i++) {
            $user = new User;
            $user->netid = mt_rand(100000,999999);
            $user->group = 'user';
            $user->name = $faker->firstName . ' ' . $faker->lastName;
            $user->email = $faker->email;
            $user->save();
        }
    }
}

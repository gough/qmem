<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'netid' => '12ab34',
            'group' => 'admin',
            'name' => str_random(4) . ' ' . str_random(8),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'netid' => '15ag36',
            'group' => 'admin',
            'name' => str_random(4) . ' ' . str_random(8),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'netid' => '13sjk',
            'group' => 'user',
            'name' => str_random(4) . ' ' . str_random(8),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'netid' => str_random(6),
            'group' => 'user',
            'name' => str_random(4) . ' ' . str_random(8),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'netid' => str_random(6),
            'group' => 'user',
            'name' => str_random(4) . ' ' . str_random(8),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}

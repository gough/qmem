<?php

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 150; $i++) {
            DB::table('assets')->insert([
            'name' => str_random(6),
            'type' => 'capital',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }

        for ($i = 1; $i < 150; $i++) {
            DB::table('assets')->insert([
            'name' => str_random(6),
            'type' => 'consumable',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}

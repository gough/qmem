<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Consumable, \App\Category, \App\User;

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
            $consumable = new Consumable;
            
            $consumable->name = $faker->catchPhrase;
            $consumable->category_id = Category::all()->random()->id;
            $consumable->quantity = mt_rand(0, 100);
            $consumable->user_id = User::where('active', True)->where('name', '<>', '')->get()->random()->id;

            $consumable->save();
        }
    }
}

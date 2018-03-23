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
        if (config('app.env') != 'production')
        {
        	$faker = Faker::create();
            for ($i = 1; $i < 234; $i++) {
                $consumable = new Consumable;

                $consumable->name = $faker->catchPhrase;
                $consumable->category_id = Category::all()->random()->id;
                $consumable->quantity = $faker->numberBetween(0, 500);

                $consumable->minimum_quantity = $faker->numberBetween(0, 100);
                $consumable->item_number = $faker->numberBetween(111111111, 999999999999);
                $consumable->catalog_number = $faker->numberBetween(111111, 999999999);
                $consumable->custom_number = $faker->numberBetween(111, 999999);
                $consumable->location = $faker->state();
                $consumable->price = $faker->randomFloat(2, 0, 100000);
                $consumable->image_id = null;
                $consumable->notes = $faker->paragraphs(4, true);

                $consumable->save();
            }
        }
    }
}

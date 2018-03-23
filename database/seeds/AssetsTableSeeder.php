<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Asset, \App\Category, \App\Status;

class AssetsTableSeeder extends Seeder
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
            for ($i = 1; $i < 123; $i++) {
                $asset = new Asset;

                $asset->name = $faker->catchPhrase;
                $asset->category_id = Category::all()->random()->id;
                $asset->status_id = Status::all()->random()->id;

                $asset->serial_number = $faker->numberBetween(111111111, 999999999999);
                $asset->catalog_number = $faker->numberBetween(111111, 999999999);
                $asset->custom_number = $faker->numberBetween(111, 999999);
                $asset->location = $faker->state();
                $asset->price = $faker->randomFloat(2, 0, 100000);
                $asset->image_id = null;
                $asset->notes = $faker->paragraphs(4, true);

                $asset->save();
            }
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Asset, \App\Category, \App\User;

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
            $asset = new Asset;

            $asset->name = $faker->catchPhrase;
            $asset->category_id = Category::all()->random()->id;
            $asset->status = 'available';
            $asset->price = mt_rand(1, 10000) / 100;
            $asset->user_id = User::where('active', True)->where('name', '<>', '')->get()->random()->id;

            $asset->save();
        }
    }
}

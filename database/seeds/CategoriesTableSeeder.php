<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use \App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->name = '(uncategorized)';
        $category->save();

        if (app('APP_ENV') != 'production')
        {
            $faker = Faker::create();
            for ($i = 1; $i < 25; $i++) {           
                $category = new Category;
                $category->name = $faker->city;
                $category->save();
            }
        }
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // user groups must be created before users can be assigned them
        $this->call(UserGroupsTableSeeder::class);

        // users must be created before assets can be assigned them
        $this->call(UsersTableSeeder::class);
        
        // categories must be created before assets can be assigned them
        $this->call(CategoriesTableSeeder::class);

        // statuses must also be created before assets can be assigned them
        $this->call(StatusesTableSeeder::class);

        $this->call(AssetsTableSeeder::class);
        $this->call(ConsumablesTableSeeder::class);    
    }
}

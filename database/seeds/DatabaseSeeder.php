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
        // users seeder must be run first so that other seeds can use random user ids
        $this->call(UsersTableSeeder::class);
        
        $this->call(AssetsTableSeeder::class);
        $this->call(AssetTypesTableSeeder::class);
        $this->call(ConsumablesTableSeeder::class);
        $this->call(UserGroupsTableSeeder::class);
    }
}

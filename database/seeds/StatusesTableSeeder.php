<?php

use Illuminate\Database\Seeder;
use \App\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$status = new Status;
	    $status->name = 'Available';
	    $status->save();

        $status = new Status;
        $status->name = 'Pending';
        $status->save();

        $status = new Status;
        $status->name = 'Unavailable';
        $status->save();
    }
}

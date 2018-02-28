<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function assets()
    {
    	return $this->hasMany('\App\Asset');
    }

    public function consumables()
    {
    	return $this->hasMany('\App\Consumable');
    }
}

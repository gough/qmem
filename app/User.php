<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'netid', 'group', 'name', 'email'
    ];

    public function assets()
    {
    	return $this->hasMany('\App\Asset');
    }

    public function consumables()
    {
    	return $this->hasMany('\App\Consumable');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    public $table = 'user_groups';

    public function users()
    {
    	return $this->hasMany('\App\User');
    }
}

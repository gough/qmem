<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Sortable;

    public $fillable = ['netid', 'group_id', 'name', 'email'];
    public $sortable = ['netid', 'group_id', 'name', 'email', 'created_at'];

    public function group()
    {
    	return $this->belongsTo('\App\UserGroup');
    }

    public function assets()
    {
    	return $this->hasMany('\App\Asset');
    }

    public function consumables()
    {
    	return $this->hasMany('\App\Consumable');
    }

    public function groupSortable($query, $direction)
    {
    	return $query->join('user_groups', 'users.group_id', '=', 'user_groups.id')
    				->select('user_groups.name as user_group', 'users.*')
    				->orderBy('user_group', $direction);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Consumable extends Model
{
	use Sortable;

    public $sortable = ['id', 'name', 'category', 'quantity', 'user', 'created_at'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function userSortable($query, $direction)
    {
    	return $query->join('users', 'consumables.user_id', '=', 'users.id')
    				->select('users.name as user_name', 'consumables.*')
    				->orderBy('user_name', $direction);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Asset extends Model
{
	use Sortable;

    public $sortable = ['id', 'name', 'category', 'user', 'created_at'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function userSortable($query, $direction)
    {
    	return $query->join('users', 'assets.user_id', '=', 'users.id')
    				->select('users.name as user_name', 'assets.*')
    				->orderBy('user_name', $direction);
    }
}

<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;
use Kyslik\ColumnSortable\Sortable;

class Asset extends BaseModel
{
    use RevisionableTrait;
    use Searchable;
    use Sortable;

    protected $revisionCreationsEnabled = true;

    public $fillable = ['name', 'category_id'];
    public $sortable = ['id', 'name', 'category', 'user', 'created_at'];

    public function user()
    {
    	return $this->belongsTo('\App\User');
    }

    public function category()
    {
    	return $this->belongsTo('\App\Category');
    }

    public function categorySortable($query, $direction)
    {
    	return $query->join('categories', 'assets.category_id', '=', 'categories.id')
    				->select('categories.name as category_name', 'assets.*')
    				->orderBy('category_name', $direction);
    }

    public function userSortable($query, $direction)
    {
    	return $query->join('users', 'assets.user_id', '=', 'users.id')
    				->select('users.name as user_name', 'assets.*')
    				->orderBy('user_name', $direction);
    }
}

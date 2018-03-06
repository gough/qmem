<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;
use Kyslik\ColumnSortable\Sortable;

class Consumable extends BaseModel
{
    use RevisionableTrait;
    use Searchable;
    use Sortable;

    protected $revisionCreationsEnabled = true;

    public $fillable = ['name', 'category_id', 'quantity'];
    public $sortable = ['id', 'name', 'category', 'quantity', 'user', 'created_at'];

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
        return $query->join('categories', 'consumables.category_id', '=', 'categories.id')
                    ->select('categories.name as category_name', 'consumables.*')
                    ->orderBy('category_name', $direction);
    }

    public function userSortable($query, $direction)
    {
    	return $query->join('users', 'consumables.user_id', '=', 'users.id')
    				->select('users.name as user_name', 'consumables.*')
    				->orderBy('user_name', $direction);
    }
}

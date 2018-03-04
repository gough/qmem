<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends BaseModel
{
	use Sortable;

    public $sortable = ['id', 'name', 'created_at'];

    public function assets()
    {
    	return $this->hasMany('\App\Asset');
    }

    public function consumables()
    {
    	return $this->hasMany('\App\Consumable');
    }
}

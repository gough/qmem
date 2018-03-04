<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Venturecraft\Revisionable\RevisionableTrait;
use Kyslik\ColumnSortable\Sortable;

class Category extends BaseModel
{
    use RevisionableTrait;
    use Sortable;

    protected $revisionCreationsEnabled = true;

    public $fillable = ['name'];
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

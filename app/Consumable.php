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

    public $fillable = [
        'name',
        'category_id',
        'quantity',
        'minimum_quantity',
        'item_number',
        'catalog_number',
        'custom_number',
        'location',
        'price',
        'image_id',
        'notes'
    ];

    public $sortable = [
        'name',
        'category',
        'quantity',
        'minimum_quantity',
        'item_number',
        'catalog_number',
        'custom_number',
        'location',
        'price',
        'notes'
    ];

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

    public function toSearchableArray()
    {
        return parent::toSearchableArray();
    }
}

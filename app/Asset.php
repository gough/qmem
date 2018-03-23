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

    public $fillable = [
        'name',
        'category_id',
        'status_id',
        'serial_number',
        'catalog_number',
        'custom_number',
        'location',
        'price',
        'image_id',
        'notes'
    ];

    public $sortable = [
        'id',
        'name',
        'category',
        'status',
        'serial_number',
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

    public function status()
    {
        return $this->belongsTo('\App\Status');
    }

    public function categorySortable($query, $direction)
    {
    	return $query->join('categories', 'assets.category_id', '=', 'categories.id')
    				->select('categories.name as category_name', 'assets.*')
    				->orderBy('category_name', $direction);
    }

    public function statusSortable($query, $direction)
    {
        return $query->join('statuses', 'assets.status_id', '=', 'statuses.id')
                    ->select('statuses.name as status_name', 'assets.*')
                    ->orderBy('status_name', $direction);
    }

    public function toSearchableArray()
    {
        return parent::toSearchableArray();
    }
}

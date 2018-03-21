<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $fillable = ['name'];
    public $sortable = ['id', 'name', 'created_at'];

    public function assets()
    {
    	return $this->hasMany('\App\Asset');
    }
}

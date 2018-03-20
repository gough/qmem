<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class BaseModel extends Model
{
    public function getIdHashAttribute()
    {
        if ($this instanceof Asset)
        {
            $prefix = '1';
        }
        elseif ($this instanceof Consumable)
        {
            $prefix = '2';
        }
        else
        {
            $prefix = '9';
        }

        $id_hash = $prefix . crc32($this->id);

        return $id_hash;
    }

    public function getPriceAttribute($price)
    {
        return number_format($price, 2, '.', '');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d h:i:s A');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d h:i:s A');
    }

    public function barcode($scale = 3, $thickness = 20, $fontsize = 10, $class = 'img-fluid')
    {
    	$barcode = new BarcodeGenerator();

    	$barcode->setText($this->id_hash);
    	$barcode->setType(BarcodeGenerator::Code128);
    	$barcode->setScale($scale);
    	$barcode->setThickness($thickness);
    	$barcode->setFontSize($fontsize);
    	$code = $barcode->generate();

        if (!empty($class))
        {
            return '<img class="' . $class . '" src="data:image/png;base64,' . $code . '">';
        }
        else
        {
            return '<img src="data:image/png;base64,' . $code . '">';
        }
    }

    public function toSearchableArray()
    {
        $record = $this->toArray();
        $record['id_hash'] = $this->id_hash;

        return $record;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Vinkla\Hashids\Facades\Hashids;

class BaseModel extends Model
{
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d h:i:s A');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d h:i:s A');
    }

    public function barcode()
    {
    	$barcode = new BarcodeGenerator();

        if ($this instanceof Asset)
        {
            $text = '1' . Hashids::encode($this->id);
        }
        elseif ($this instanceof Consumable)
        {
            $text = '2' . Hashids::encode($this->id);
        }

    	$barcode->setText($text);
    	$barcode->setType(BarcodeGenerator::Code39);
    	$barcode->setScale(2);
    	$barcode->setThickness(20);
    	$barcode->setFontSize(10);
    	$code = $barcode->generate();

    	return '<img src="data:image/png;base64,' . $code . '" />';
    }
}

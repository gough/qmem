<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function makeImage($image)
    {
        $file = time() . '.png';
        $path = public_path() . '/img/' . $file;

        Image::make($image)
            ->widen(468, function ($constraint) { $constraint->upsize(); })
            ->encode('png')
            ->save($path);

        return $file;
    }
}

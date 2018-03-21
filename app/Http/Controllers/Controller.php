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
        $file = time() . '.jpg';
        $path = public_path() . '/img/' . $file;

        Image::make($image)
            ->widen(2000, function ($constraint) { $constraint->upsize(); })
            ->orientate()
            ->encode('jpg', 75)
            ->save($path);

        return $file;
    }
}

<?php

namespace App\Http\Controllers;

use App, Excel;
use \App\Asset, \App\Consumable, \App\Category, \App\Status;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    private $rules = array(
        'data_type' => 'required',
        'format' => 'required'
    );

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $data_types = ['Assets', 'Consumables'];

        $formats = [
            'csv' => 'Comma-seperated values (.csv)',
        ];

        return view('pages.export.index', compact('data_types', 'formats'));
    }

    public function download(Request $request) {
        $validator = $request->validate($this->rules);

        $filename = 'export';

        if ($validator['data_type'] == 0)
        {
            $filename = 'assets';
            $items = Asset::all()->toArray();

            for ($count = 0; $count < Asset::count(); $count++)
            { 
                $items[$count]['category_id'] = Category::find($items[$count]['category_id'])->name;
                $items[$count]['status_id'] = Status::find($items[$count]['status_id'])->name;
            }
        }
        else if ($validator['data_type'] == 1)
        {
            $filename = 'consumables';
            $items = Consumable::all()->toArray();

            for ($count = 0; $count < Consumable::count(); $count++)
            { 
                $items[$count]['category_id'] = Category::find($items[$count]['category_id'])->name;
            }
        }

        $excel = App::make('excel');

        $excel->create($filename, function($excel) use ($items)
        {
            $excel->sheet('sheet', function($sheet) use ($items)
            {
                $sheet->fromArray($items);
            });
        })->download('csv');
    }
}

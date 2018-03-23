<?php

namespace App\Http\Controllers;

use App, Excel;
use Illuminate\Http\Request;
use \App\Asset,App\Consumable, App\Category, App\User, \App\Status;;

class ReportsController extends Controller
{   
     private $rules = array(
        
        'report_check' => 'required',
        'report_check.*' => 'required|min:1'
    );

	public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index() {
        $consumables = Consumable::sortable(['id'])->paginate(50);

    	return view('pages.reports.index', compact('consumables'));
    }


    public function create(Request $request){

        //$validator = $request->validate($this->rules);
        //$values = $validator['report_check'];
        $values = $request->input('report_check');

        $formats = [
            'csv' => 'Comma-seperated values (.csv)',
            'pdf' => 'Portable Document File (.pdf)',
        ];


        if ($values != null)    {
            $consumables = Consumable::whereIn('id', $values)->paginate(50);
            return view('pages.reports.create', compact('consumables','formats'));
        }



        return redirect()->back();  
    }



    public function excelDownload(Request $request) {
       
        $validator = $request->validate(['format' => 'required',
                                        'items' => 'required',
                                        'items.*' => 'nullable']);
        $values = $validator['items'];
        $filename = "itemReport".date('m-d-Y-His');

        $items = Consumable::whereIn('id', $values)->get()->toArray();

        for ($count = 0; $count < count($items); $count++)
        { 
            $items[$count]['category_id'] = Category::find($items[$count]['category_id'])->name;
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
    

    public function pdfDownload(){
        return view('pages.reports.index');
    }
}

<?php

namespace App\Http\Controllers;

use App, Excel;
use Illuminate\Http\Request;
use \Venturecraft\Revisionable\Revision;
use \App\Asset,App\Consumable, App\Category, App\User, \App\Status;

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
                                        'items.*' => 'nullable',
                                        'startdate' => 'required|before:enddate',
                                        'enddate' => 'required|after:startdate' ]);


        $values = $validator['items'];
        $start_date = $validator['startdate'];
        $end_date = $validator['enddate'];

        $filename = "itemReport".date('m-d-Y-His');

        $costArray = array();
        $purchased = array();
        $totalCost = 0.0;
        $output = array(array('Id','Name','Current Price','Number Purchased', 'Total Cost'));

        for ($count = 0; $count < count($values); $count++)
        { 


            $costArray[$count]=0;
            $purchased[$count]=0;
            $item =Consumable::where('id', $values[$count])->get()->toArray()[0];
            $cost_at_time = (float)$item['price'];

            $revs= Revision::where('revisionable_type', 'App\Consumable')->where('revisionable_id', $values[$count])->whereBetween('updated_at', [$start_date, $end_date])
                            ->whereIn('key',['price', 'quantity'])->get()->toArray();

            foreach($revs as $rev){
                if ($rev['key'] == 'price'){
                    $cost_at_time = (float)$rev['new_value'];
                }else{
                    if ($rev['new_value'] >= $rev['old_value'] )   {
                        $purchased[$count] += ((float)$rev['new_value'] - (float)$rev['old_value']);
                        $costArray[$count] += $cost_at_time *((float)$rev['new_value'] - (float)$rev['old_value']);

                    }
                }

            }
            $totalCost += $costArray[$count];
            $output[$count+1] = array($item['id'],$item['name'],$item['price'], ($purchased[$count] != 0 ? $purchased[$count] : "0") ,($costArray[$count] != 0 ? $costArray[$count] : "0"));
        }  

        $output[count($values)+1] = array('','','','','');
        $output[count($values)+2] = array('Total Cost:',$totalCost,'','','');



        $excel = App::make('excel');

        $excel->create($filename, function($excel) use ($output)
        {
            $excel->sheet('sheet', function($sheet) use ($output)
            {
                $sheet->fromArray($output);
            });
        })->download('csv');
    }
    

    public function pdfDownload(){
        return view('pages.reports.index');
    }
}

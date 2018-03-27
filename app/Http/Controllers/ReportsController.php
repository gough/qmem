<?php

namespace App\Http\Controllers;

use App, Excel, PDF;
use Illuminate\Http\Request;
use \Venturecraft\Revisionable\Revision;
use \App\Asset,App\Consumable, App\Category, App\User, \App\Status;

class ReportsController extends Controller
{   
     private $rules = array(
        'select_all' => 'nullable',
        'report_check' => 'nullable',
        'report_check.*' => 'nullable'
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

        $validator = $request->validate($this->rules);
        //$values = $validator['report_check'];



        $formats = [
            'csv' => 'Comma-seperated values (.csv)',
            'pdf' => 'Portable Document File (.pdf)',
        ];

        if ($request->input('select_all') == "yes") {
            $consumables = Consumable::sortable(['created_at' => 'desc'])->paginate(50);

        }elseif ($request->input('report_check') == null){

            redirect()->back();

        }else {

            $values = $request->input('report_check');
            $consumables = Consumable::whereIn('id', $values)->paginate(50);
            
        }
        return view('pages.reports.create', compact('consumables','formats'));
          
    }



    public function download(Request $request) {
       
        $validator = $request->validate(['format' => 'nullable',
                                        'items' => 'nullable',
                                        'items.*' => 'nullable',
                                        'startdate' => 'nullable|before:enddate',
                                        'enddate' => 'nullable|after:startdate'
                                         ]);


        if ($validator['startdate']== null or $validator['enddate']== null or $validator['format']== null){
            return redirect()->back();
        } else {
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
                $createFlag = 0;
                $createPrice = 0;
                $oldFlag = 0;
                $oldPrice =0;
                $item =Consumable::where('id', $values[$count])->get()->toArray()[0];
                $cost_at_time = 0;

                $revs= Revision::where('revisionable_type', 'App\Consumable')->where('revisionable_id', $values[$count])->whereBetween('updated_at', [$start_date, $end_date])->whereIn('key',['price', 'quantity','created_at'])->get()->toArray();                  

                foreach($revs as $rev){
                    if ($rev['key'] == 'price'){
                        if ($oldFlag == 0){
                            $oldPrice = (float)$rev['old_value'];
                        }

                        $cost_at_time = $rev['new_value'];

                        if ($oldFlag == 0){
                            if($createFlag == 1){
                                $createPrice = $oldPrice;
                            }

                            $costArray[$count] += $oldPrice * $purchased[$count];
                            $oldFlag = 1;
                            $oldPrice = 0;

                        }

                    }elseif($rev['key'] == 'quantity'){

                        if ($rev['new_value'] >= $rev['old_value'] )   {
                            $purchased[$count] += ((float)$rev['new_value'] - (float)$rev['old_value']);

                            if ($oldFlag == 1){
                                $costArray[$count] += $cost_at_time *((float)$rev['new_value'] - (float)$rev['old_value']);
                            }
                        }
                        
                        if ($createFlag == 1){
                            if ($oldFlag == 1){
                                $costArray[$count] += $createPrice * (float)$rev['old_value'];
                            }
                            $purchased[$count] += (float)$rev['old_value'];
                            

                            $createFlag = 0;
                            $createPrice = 0;
                        }
                

                    }else{
                        $createFlag = 1;   
                    }
                }


                //if a price still hasnt been found search for one 
                if ($oldFlag == 0) {
                    $anotherRev= Revision::where('revisionable_type', 'App\Consumable')->where('revisionable_id', $values[$count])->whereDate('updated_at', '>=', $start_date)->where('key', 'price')->get()->toArray(); 

                    //This happens if there was no price update OR quantity update but there was a create
                    if ($createFlag == 1){
                        $purchased[$count] += $item['quantity'];
                    }
                    if (count($anotherRev) > 0){
                        $costArray[$count] += (float)$anotherRev[0]['old_value'] * (float)$purchased[$count];

                    } else {
                        $costArray[$count] += (float)$item['price'] * (float)$purchased[$count];
                    }
                } elseif ($createFlag == 1){
                    $purchased[$count] += $item['quantity'];
                    $costArray[$count] += $createPrice * (float)$purchased[$count];
                }


                $totalCost += $costArray[$count];
                $output[$count+1] = array($item['id'],$item['name'],$item['price'], ($purchased[$count] != 0 ? $purchased[$count] : "0") ,($costArray[$count] != 0 ? $costArray[$count] : "0"));
            }  

            $output[count($values)+1] = array('','','','','');
            $output[count($values)+2] = array('Total Cost:',$totalCost,'','','');


            if ($validator['format'] == 'csv'){
                $excel = App::make('excel');

                $excel->create($filename, function($excel) use ($output)
                {
                    $excel->sheet('sheet', function($sheet) use ($output)
                    {
                        $sheet->fromArray($output);
                    });
                })->download('csv');

            } else{
                $pdf = PDF::loadview('pages.reports.pdflayout',compact('output','start_date','end_date'));
                return $pdf->download($filename.'.pdf');
            }
        }
    }
    
}

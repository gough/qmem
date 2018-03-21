<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumable, App\Category, App\User;

class ReportsController extends Controller
{   
     private $rules = array(
        'name' => 'required|min:2|max:255',
        'category' => 'required',
        'quantity' => 'required|min:0',
        'location' => 'nullable',
        'image' => 'nullable|image|max:1000',
        'notes' => 'nullable|max:2000'
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

        $values = $request->input('report_check');
        

        if ($values != null)    {
            $consumables = Consumable::whereIn('id', $values)->paginate(50);

            return view('pages.reports.create', compact('consumables'));
        }

        return redirect()->back();  
    }
}

<?php

namespace App\Http\Controllers;

use App\Consumable, App\Category, App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsumableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET /consumables

        $consumables = Consumable::sortable(['created_at' => 'desc'])->paginate(50);

        return view('pages.consumables.index', compact('consumables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        // GET /consumables/new
        
        $categories = Category::pluck('name', 'id')->sort();

        return view('pages.consumables.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // POST /consumables/create
                
        $rules = array(
            'name' => 'required|min:2|max:255',
            'category' => 'required',
            'quantity' => 'required|numeric|min:0'
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
            'category.required' => 'category.required',
            'quantity.required' => 'quantity.required',
            'quantity.min' => 'quantity.min'
        );
        
        $validator = $request->validate($rules, $messages);

        $consumable = new Consumable;

        $consumable->name = $validator['name'];
        $consumable->category_id = $validator['category'];
        $consumable->quantity = $validator['quantity'];
        $consumable->user_id = Auth::user()->id;

        $consumable->save();

        return redirect()->route('consumables.view', $consumable->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        // GET /consumables/{id}
                
        $consumable = Consumable::findOrFail($id);

        return view('pages.consumables.view', compact('consumable'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET /consumables/{id}/edit
        
        $consumable = Consumable::findOrFail($id);
        $categories = Category::pluck('name', 'id')->sort();

        return view('pages.consumables.edit', compact('consumable', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // POST /consumables/{id}/update
        
        $consumable = Consumable::findOrFail($id);

        $rules = array(
            'name' => 'required|min:2|max:255',
            'category' => 'required',
            'quantity' => 'required'
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
            'category.required' => 'category.required',
            'quantity.required' => 'quantity.required',
        );
        
        $validator = $request->validate($rules, $messages);

        $consumable->update([
            'name' => $validator['name'],
            'category_id' => $validator['category'],
            'quantity' => $validator['quantity']
        ]);

        return redirect()->route('consumables.view', $consumable->id);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // GET /consumables/{id}/delete

        $consumable = Consumable::findOrFail($id);

        return view('pages.consumables.delete', compact('consumable'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // POST /consumables/{id}/destroy
        
        // TODO: actually destory consumable
    }
}

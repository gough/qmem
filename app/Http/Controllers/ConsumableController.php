<?php

namespace App\Http\Controllers;

use App\Consumable;
use Illuminate\Http\Request;

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

        $consumables = Consumable::sortable()->paginate(50);

        return view('pages.consumables.index', compact('consumables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET /consumables/new
        
        return view('pages.consumables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /consumables
        
        
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
                
        $consumable = Consumable::findOrFail($id); // TODO: actually load consumable

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

        return view('pages.consumables.edit', compact('consumable'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consumable $consumable)
    {
        // POST /consumables/{id}
        

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

        return view('pages.consumables.edit', compact('consumable'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consumable  $consumable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consumable $consumable)
    {
        // POST /consumables/{id}
        
        
    }
}

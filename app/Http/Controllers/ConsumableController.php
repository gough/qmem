<?php

namespace App\Http\Controllers;

use App\Consumable, App\Category, App\User;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConsumableController extends Controller
{
    private $rules = array(
        'name' => 'required|min:2|max:255',
        'category' => 'required',
        'status' => 'required',
        'quantity' => 'required|numeric|min:0',
        'price' => 'nullable|numeric|min:0',
        'location' => 'nullable',
        'image' => 'nullable|image|max:1000',
        'notes' => 'nullable|max:2000'
    );

    private $statuses = array(
        'available' => 'Available',
        'unavailable' => 'Unavailable'
    );

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
        $statuses = $this->statuses;

        return view('pages.consumables.new', compact('categories', 'statuses'));
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
        
        $validator = $request->validate($this->rules);

        $consumable = new Consumable;

        $consumable->name = $validator['name'];
        $consumable->category_id = $validator['category'];
        $consumable->status = $validator['status'];
        $consumable->quantity = $validator['quantity'];
        $consumable->price = number_format($validator['price'], 2, '.', '');
        $consumable->location = $validator['location'];
        $consumable->image_id = null;
        $consumable->notes = $validator['notes'];

        if (isset($validator['image']))
        {
            $consumable->image_id = $this->makeImage($validator['image']);
        }

        $consumable->user_id = Auth::user()->id;
        $consumable->save();

        Session::flash('message', '<strong>Success!</strong> Consumable #' . $consumable->id . ' was created.');
        Session::flash('alert-class', 'alert-success');

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
        
        try
        {
            $consumable = Consumable::findOrFail($id);
        }
        catch (ModelNotFoundException $e)
        {
            return redirect()->route('consumables.index');
        }   

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
        $statuses = $this->statuses;

        return view('pages.consumables.edit', compact('consumable', 'categories', 'statuses'));
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
        
        $validator = $request->validate($this->rules);

        $image = $consumable->image_id;
        if (isset($validator['image']))
        {
            $image = $this->makeImage($validator['image']);
        }

        $consumable->update([
            'name' => $validator['name'],
            'category_id' => $validator['category'],
            'status' => $validator['status'],
            'quantity' => $validator['quantity'],
            'price' => number_format($validator['price'], 2, '.', ''),
            'location' => $validator['location'],
            'image_id' => $image,
            'notes' => $validator['notes']
        ]);

        Session::flash('message', '<strong>Success!</strong> Consumable #' . $consumable->id . ' was updated.');
        Session::flash('alert-class', 'alert-success');

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
    public function destroy(Request $request, $id)
    {
        // POST /consumables/{id}/destroy
        
        $consumable = Consumable::findOrFail($id);

        Consumable::destroy($id);

        Session::flash('message', '<strong>Success!</strong> Consumable #' . $consumable->id . ' was destroyed.');
        Session::flash('alert-class', 'alert-success');

        return redirect($request->post('next'));
    }
}

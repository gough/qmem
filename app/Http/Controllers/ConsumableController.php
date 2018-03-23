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
        'quantity' => 'required|numeric|min:0',

        'minimum_quantity' => 'nullable|numeric|min:0',
        'item_number' => 'nullable',
        'catalog_number' => 'nullable',
        'custom_number' => 'nullable',
        'location' => 'nullable',
        'price' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|max:10000',
        'notes' => 'nullable|max:2000'
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

        $consumables = Consumable::sortable(['id' => 'desc'])->paginate(50);

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
        $consumable->quantity = $validator['quantity'];

        $conusmable->minimum_quantity = $validator['minimum_quantity'];
        $consumable->item_number = $validator['item_number'];
        $consumable->catalog_number = $validator['catalog_number'];
        $consumable->custom_number = $validator['custom_number'];
        $consumable->location = $validator['location'];
        $consumable->price = $validator['price'];
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
            'quantity' => $validator['quantity'],

            'minimum_quantity' => $validator['minimum_quantity'],
            'item_number' => $validator['item_number'],
            'catalog_number' => $validator['catalog_number'],
            'custom_number' => $validator['custom_number'],
            'location' => $validator['location'],
            'price' => $validator['price'],
            'image_id' => $image,
            'notes' => $validator['notes']
        ]);

        Session::flash('message', '<strong>Success!</strong> Consumable #' . $consumable->id . ' was updated.');
        Session::flash('alert-class', 'alert-success');

        return redirect($request->post('next'));
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

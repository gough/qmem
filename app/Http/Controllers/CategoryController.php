<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        // GET /categories
        
        $categories = Category::sortable(['created_at' => 'desc'])->paginate(50);

        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        // GET /categories/new
        
        return view('pages.categories.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // POST /categories/create
                
        $rules = array(
            'name' => 'required|min:2|max:255',
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
        );
        
        $validator = $request->validate($rules, $messages);

        $category = new Category;

        $category->name = $validator['name'];

        $category->save();

        return redirect()->route('categories.view', $category->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        // GET /categories/{id}
                
        $category = Category::findOrFail($id);
        $assets = $category->assets()->sortable(['created_at' => 'desc'])->get();
        $consumables = $category->consumables()->sortable(['created_at' => 'desc'])->get();

        return view('pages.categories.view', compact('category', 'assets', 'consumables'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET /categories/{id}/edit
        
        $category = Category::findOrFail($id);

        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // POST /categories/{id}/update
                
        $category = Category::findOrFail($id);

        $rules = array(
            'name' => 'required|min:2|max:255',
        );

        $messages = array(
            'name.required' => 'name.required',
            'name.min' => 'name.min',
            'name.max' => 'name.max',
        );
        
        $validator = $request->validate($rules, $messages);

        $category->update([
            'name' => $validator['name'],
        ]);

        return redirect()->route('categories.view', $category->id);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // GET /categories/{id}/delete

        return view('pages.categories.delete', compact('category'));        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // POST /categories/{id}/destroy
        
        // TODO: actually destory category
    }
}

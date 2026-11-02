<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacategories = Categories::all();
        return view('categories.index',compact('datacategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->validate([
        'categories_name' => 'required|string|max:100|unique:categories',
        'categories_descriptions' => 'required|string'
    ]);
    Categories::create([
        'categories_name' => $request->categories_name,
        'categories_descriptions' => $request->categories_descriptions,
    ]);
    return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataeditcategories = Categories::find($id);
        return view('categories.edit',compact('dataeditcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'categories_name' => 'required|string|max:100|unique:categories,categories_name, ' . $id . ',categories_id',
            'categories_descriptions' => 'required|string'
        ]);

        $updatedata = Categories::find($id);

        $updatedata->update([
            'categories_name' => $request->categories_name,
            'categories_descriptions' => $request->categories_descriptions
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::where('categories_id',$id)->delete();
        return redirect()->route('categories.index');
    }
}

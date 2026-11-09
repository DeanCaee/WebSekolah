<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataproducts = Products::all();
        return view('products.index',compact('dataproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datacategories = Categories::all();
        return view('products.create',compact('datacategories') );
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
            'products_name' => 'required',
            'categories_id' => 'required',
            'products_price' => 'required',
            'products_stock' => 'required',
            'products_description' => 'required',
            'products_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2040',
            'products_status' => 'required|in:available,unavailable',
        ]);
        $image = null;
        if ($request->hasFile('products_image')) {
            $image = $request->file('products_image')->store('products','public');
        }
        Products::create([
            'products_name' => $request->products_name,
            'products_price' => $request->products_price,
            'categories_id' => $request->categories_id,
            'products_description' => $request->products_description,
            'products_stock' => $request->products_stock,
            'products_image' => $image,
            'products_status' => $request->input('products_status'),
        ])
        ;
        return redirect()->route('products.index');
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
        $dataeditproducts = Products::FindOrFail($id);
        $dataeditcategories = Categories::all();
        return view('products.edit',compact('dataeditproducts','dataeditcategories'));
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
        'products_name' => 'required',
        'categories_id' => 'required',
        'products_price' => 'required|numeric',
        'products_stock' => 'required|numeric',
        'products_description' => 'required',
        'products_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2040',
        'products_status' => 'required|in:available,unavailable',
    ]);

    
    $product = Products::findOrFail($id);
    $image = $product->products_image;

    if ($request->hasFile('products_image')) {
        if ($image && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
        $image = $request->file('products_image')->store('products', 'public');
    }

    // 5. Update data ke database
    $product->update([
        'products_name' => $request->products_name,
        'categories_id' => $request->categories_id,
        'products_price' => $request->products_price,
        'products_stock' => $request->products_stock,
        'products_description' => $request->products_description,
        'products_image' => $image,
        'products_status' => $request->products_status,
    ]);

    // 6. Redirect kembali ke halaman index produk
    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    Products::where('products_id',$id)->delete();
    return redirect()->route('products.index');
    }
}

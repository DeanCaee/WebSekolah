<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datacustomers = Customers::all();
        return view('customers.index',compact('datacustomers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
        'customers_name' => 'required|string|max:100',
        'customers_email' => 'nullable|string',
        'customers_phone' => 'required|string',
        'customers_address' => 'nullable|string',
        'member_status' => 'required|boolean'
    ]);
    Customers::create([
        'customers_name' => $request->customers_name,
        'customers_email' => $request->customers_email,
        'customers_phone' => $request->customers_phone,
        'customers_address' => $request->customers_address,
        'member_status' => $request->input('member_status'),
    ]);
    return redirect()->route('customers.index');
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
        $dataeditcustomers = Customers::find($id);
        return view('customers.edit',compact('dataeditcustomers'));
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
        'customers_name' => 'required|string|max:100|unique:customers,customers_name, ' . $id . ',customers_id',
        'customers_email' => 'nullable|string',
        'customers_phone' => 'required|string',
        'customers_address' => 'nullable|string',
        'member_status' => 'required|boolean'
    ]);
    $updatedata = Customers::find($id);
    $updatedata->update([
        'customers_name' => $request->customers_name,
        'customers_email' => $request->customers_email,
        'customers_phone' => $request->customers_phone,
        'customers_address' => $request->customers_address,
        'member_status' => $request->input('member_status'),
    ]);
    return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::where('customers_id',$id)->delete();
        return redirect()->route('customers.index');
    }
}

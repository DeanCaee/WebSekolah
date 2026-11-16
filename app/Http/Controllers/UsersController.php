<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datausers = User::all();
        return view('users.index',compact('datausers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'users_name' => 'required',
            'users_email' => 'required',
            'users_password' => 'required|min:8',
            'users_role' => 'required',
        ]);
        User::create([
            'users_name' => $request->users_name,
            'users_email' => $request->users_email,
            'users_password' => bcrypt ($request->users_password),
            'users_role' => $request->input('users_role'),
        ])
        ;
        return redirect()->route('users.index');
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
        $dataeditusers = User::find($id);
        return view('users.edit',compact('dataeditusers'));
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
            'users_name'=> 'required',
            'users_email' => 'required|unique:users,users_email,'.$id.',users_id',
            'users_password' => 'nullable|min:8',
            'users_role' => 'required',
        ]);
        $updatedata = User::find($id);
        $updatedata->update([
        'users_name' => $request->users_name,
        'users_email' => $request->users_email,
        'users_password' => bcrypt ($request->users_password),
        'users_role' => $request->input('users_role'),
    ]);
    return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('users_id',$id)->delete();
        return redirect()->route('users.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Location;
use App\User;
use Illuminate\Http\Request;
use Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $customers = User::where('role_id', '3')->orderBy('created_at', 'desc')->get();
        $locations = Location::orderBy('name', 'asc')->get();

        return view('admin.customer.index', compact('user', 'customers', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lastname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'location_id' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User;
        $user->lastname = $request->lastname;
        $user->firstname = $request->firstname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->address = $request->address;
        $user->location_id = $request->location_id;
        $user->role_id = $request->role_id;


        $user->save();

        return redirect(route('customer.index'))->with('success', 'Customer account has been created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);

        $billings=Bill::where('user_id',$id)->get();

        return view('admin.customer.show', array('user' => Auth::user()), compact('customer','billings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Auth;
use Illuminate\Http\Request;

class BillController extends Controller
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
        $bills = Bill::orderBy('name', 'asc')->get();

        return view('admin.bill.index', compact('user', 'customers', 'bills'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$customer_id)
    {
        // $customer = $request->customer_id;
      
        return view('admin.bill.create', array('user' => Auth::user()),compact('customer_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'currentreading'=>'required',
            'previousreading'=>'required',
        ]);

        $bill=new Bill;

        $bill->user_id= $request->user_id;
        $bill->billnumber= $request->billnumber;
        $bill->currentreading= $request->currentreading;
        $bill->previousreading= $request->previousreading;
        $bill->totalkwh= $request->totalkwh;
        $bill->totalecharge= $request->totalecharge;
        $bill->billmonth= $request->billmonth;
        $bill->finalbill= $request->finalbill;
        
        $bill->save();

        return redirect(route('customer.index'));
        
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

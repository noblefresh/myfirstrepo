<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;
use App\Models\user;
use App\Models\cart;
use App\Models\order;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        // return $request;

        $name = $request->fname. ' ' .$request->lname;

        $createCusAcc = new customer;
        $createCusAcc->name = $name;
        $createCusAcc->email = $request->email;
        $createCusAcc->phone = $request->phone;
        $createCusAcc->address1 = $request->address1;
        $createCusAcc->address2 = $request->address2;
        $createCusAcc->city = $request->city;
        $createCusAcc->state = $request->state;

        // return $createCusAcc;
        if($createCusAcc->save()){
            $customerid = $createCusAcc->id;
            // return $customerid;
            if($request->password != ""){
                $this->creatUser($name, $request->email, $customerid, $request->password);
                $this->save_order($customerid);
                $createid = time();
                $orderid = substr($createid, 6);
                $fetchOrder = order::where('orderid',$orderid)->get();
                return view('order-details',['order'=>$fetchOrder]);
            }else{
                $this->save_order($customerid);
                $createid = time();
                $orderid = substr($createid, 6);
                $fetchOrder = order::where('orderid',$orderid)->get();
                return view('order-details',['order'=>$fetchOrder]);
            }
        }else{
            return redirect('/process-checkout')->with('error','An error occured!, Try again later');
        }
    }

    function creatUser($name, $email, $customerid, $pass){
        return User::create([
            'name' => $name,
            'email' => $email,
            'customerid' => $customerid,
            'password' => Hash::make($pass),
        ]);
    }

    public function save_order($customerid){
        // $customerid = 2;
        $ip = $_SERVER['REMOTE_ADDR'];
        $createid = time();
        $orderid = substr($createid, 6);
        $cart = cart::where('ip',$ip)->get();
        foreach ($cart as $value) {
            $save_order = new order;
            $save_order->orderid = $orderid;
            $save_order->productid = $value->productid;
            $save_order->qty = $value->qty;
            $save_order->customerid = $customerid;
            $save_order->save();
        }
        $fetchOrder = order::where('orderid',$orderid)->get();
        return view('order-details',['order'=>$fetchOrder]);
    }
    // a duplicate of save_order (this is for returning users)
    public function save_order2($customerid){
        // $customerid = 2;
        $ip = $_SERVER['REMOTE_ADDR'];
        $createid = time();
        $orderid = substr($createid, 6);
        $cart = cart::where('ip',$ip)->get();
        foreach ($cart as $value) {
            $save_order = new order;
            $save_order->orderid = $orderid;
            $save_order->productid = $value->productid;
            $save_order->qty = $value->qty;
            $save_order->customerid = $customerid;
            $save_order->save();
        }
        
        $fetchOrder = order::where('orderid',$orderid)->get();
        return view('order-details',['order'=>$fetchOrder]);
        // return redirect('/process-checkout')->with('success','success');
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

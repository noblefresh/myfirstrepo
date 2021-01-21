<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\user;
use App\Models\cart;
use App\Models\order;
// use App\Http\Controllers\CartController;

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
        if (customer::where('email', $request->email)->exists()) {
            return json_encode([
                'status' => 'error',
                'type' => 'email',
                'message' => 'Account Already Exists! Please sign in.'
            ]);
        } else {
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
                }
                return json_encode([
                    'status' => 'success',
                    'message' => 'Customer Account Created.'
                ]);
                // $customerid = customer::where('email',$request->email)->first(); //Need reconstruction
                // $orderid = $this->save_order($customerid);
                // return '/order-details/' . $orderid;
            }else{
                return json_encode([
                    'status' => 'error',
                    'type' => 'something',
                    'message' => 'Customer Account Could not be Created.'
                ]);
                // return redirect('/process-checkout')->with('error','An error occured!, Try again later');
            }
        }
        
    }

    function creatUser($name, $email, $customerid, $pass){
        if (!User::where('email', $email)->exists()) {
            return User::create([
                'name' => $name,
                'email' => $email,
                'customerid' => $customerid,
                'password' => Hash::make($pass),
            ]);
        }
    }

    public function CheckCustomer(Request $request)
    {
        $customer = customer::where('email', $request->email)->get();
        if(customer::where('email', $request->email)->exists()){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function save_order(Request $request){
        $ip = $_SERVER['REMOTE_ADDR'];
        $createid = time();
        $orderid = substr($createid, 6);
        $cart = cart::where('ip',$ip)->get();
        foreach ($cart as $value) {
            $save_order = new order;
            $save_order->orderid = $orderid;
            $save_order->productid = $value->productid;
            $save_order->qty = $value->qty;
            $save_order->customerid = $this->getCustomerId($request->email);
            if($save_order->save()){
                DB::delete('delete from carts where ip = ?', [$ip]);
            }
        }
        return json_encode([
            'url' => '/order-details/' . $orderid,
            'status' => 'success'
        ]);
    }

    function getCustomerId($email){
        $customer = customer::where('email', $email)->get();
        foreach ($customer as $value) {
            return $value->id;
        }
    }
    // a duplicate of save_order (this is for returning users)
    public function save_order_auth(Request $request){
        $ip = $_SERVER['REMOTE_ADDR'];
        $createid = time();
        $orderid = substr($createid, 6);
        $cart = cart::where('ip',$ip)->get();
        foreach ($cart as $value) {
            $save_order = new order;
            $save_order->orderid = $orderid;
            $save_order->productid = $value->productid;
            $save_order->qty = $value->qty;
            $save_order->customerid = $request->customerid;
            $save_order->save();
            if($save_order->save()){
                DB::delete('delete from carts where ip = ?', [$ip]);
            }
        }
        return json_encode([
            'url' => '/order-details/' . $orderid,
            'status' => 'success'
        ]);
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

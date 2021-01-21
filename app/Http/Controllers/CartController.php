<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cart;

class CartController extends Controller
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
        $addToCart = new cart;
        $addToCart->productid = $request->productid;
        $addToCart->ip = $request->ip;
        $addToCart->qty = $request->qty;
        if($addToCart->save()){
            return json_encode([
                'status' => 'success',
                'message' => 'Product Added'
            ]);
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'An error occured!'
            ]);
        }
    }

    //Getting the total item in cart
    public function get_count_cart(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $total_item_inCart = cart::where('ip',$ip)->get();
        $getTotalItem = count($total_item_inCart);
        
        return json_encode([

            'totalItem' => $getTotalItem,
        ]);
    }

    // Loading Cart Container on Layout header
    public function load_cart_container(Request $request){
        return view('template.cart');
    }

    // Loading Cart View
    public function load_cart_view(Request $request){
        return view('template.viewcart');
    }

    // Deleting cart item 
    public function delete_cart_item(Request $request){
        // return $request;
        $id = $request->id;
        if(DB::delete('delete from carts where id = ?', [$id])){
            return json_encode([
                'status' => 'success',
                'message' => 'Item removed',
            ]); 
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'An error occured!',
            ]);
        }
    }

    // Clear All Items in Cart
    public function clear_cart(Request $request){
        // return $request;
        $ip = $request->ip;
        if(DB::delete('delete from carts where ip = ?', [$ip])){
            return json_encode([
                'status' => 'success',
                'message' => 'Cart Clared',
            ]); 
        }else{
            return json_encode([
                'status' => 'error',
                'message' => 'An error occured!',
            ]);
        }
    }

    public static function delete_cart_items($ip_addr){
        if(DB::delete('delete from carts where ip = ?', [$ip_addr])){
            return true;
        }else{
            return false;
        }
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

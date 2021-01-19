<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\order;
use App\Models\privacy_term_delivery;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('welcome');
    }

    public function viewproduct(){
        return view('product-details');
    }

    public function products(){
        return view('products');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function process_checkout(){
        return view('process-checkout');
    }

    public function view_cart(){
        return view('view-cart');
    }

    // Displaying foods in any selected menu
    public function display_day_menu($menuid){
        // return $menu;
        $getMenuFoods = product::where('menu',$menuid)->orderBy('id','DESC')->get();
        return view('products',['product'=>$getMenuFoods]);
    }

    // Showing product full details here
    public function show_product_details($productid){
        $showProductFullDetails = product::where('productid',$productid)->get();
        return view('product-details',['productdetails'=>$showProductFullDetails]);
    }

    // Displaying Order Details
    public function order_details(){
        return view('order-details');
    }

    // Customer Account Landing Page
    public function myaccount(){
        return view('customer.myaccount');
    }

    // Customer Order History Page
    public function orderhistory(){
        return view('customer.orderhistory');
    }

    // Customer Order History Details
    public function order_history_details($orderid){
        $fetchHistory = order::where('orderid',$orderid)->get();
        return view('order-details',['order'=>$fetchHistory]);
    }

    // Customer Last Order History
    public function last_order(){
        $phase = order::where('customerid',Auth()->user()->id)->orderBy('id','DESC')->limit(1)->get();
        foreach ($phase as $value) {
            $getLastOrderid = $value->orderid;
        }
        $lastOrder = order::where('customerid',Auth()->user()->id)->where('orderid',$getLastOrderid)->get();
        return view('order-details',['order'=>$lastOrder]);
    }

    // contact
    public function contact(){
        return view('contact');
    }

    // About us
    public function about(){
        return view('about');
    }

    // Privacy Policy
    public function privacy(){
        $getPolicy = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
        return view('privacy',['policy'=>$getPolicy]);
    }

    // Terms and Conditions
    public function terms(){
        $getPolicy = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
        return view('terms',['terms'=>$getPolicy]);
    }

    // Terms and Conditions
    public function delivery(){
        $getPolicy = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
        return view('delivery',['delivery'=>$getPolicy]);
    }

    // FAQ
    public function faq(){
        return view('faq');
    }

    // Foods
    public function foods(){
        $getAllFoods = product::orderBy('id','DESC')->get();
        return view('foods',['product'=>$getAllFoods]);
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

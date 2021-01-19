<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\menu;
use App\Models\order;
use App\Models\customer;
use App\Models\rating;
use App\Models\contact;
use App\Models\newsletter;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $level = Auth()->user()->level;
        if($level > 1){
            return view('admin.home');
        }else{
            return view('customer.myaccount');
        }
    }

    // add product pages 
    public function addproduct(){
        return view('admin.addproduct');
    }

    // product list
    public function productlist(){
        $getAllFood = product::orderBy('id','DESC')->get();
        $getAllMenu = menu::all();
        return view('admin.productlist',['foods'=>$getAllFood],['menu'=>$getAllMenu]);
    }

    // menu catalogue
    public function menu(){
        $getAllMenu = menu::orderBy('id','DESC')->get();
        return view('admin.menu',['menu'=>$getAllMenu]);
    }

    // Showing products that falls on particular menu
    public function show_menu_product($menuid){
        $getproducts = product::where('menu',$menuid)->orderBy('id','DESC')->get();
        $getAllMenu = menu::all();
        return view('admin.menuproducts',['product'=>$getproducts],['menu'=>$getAllMenu]);
    }

    // Displaying all orders here
    public function orders(){
        $allorder = order::orderBy('id','DESC')->paginate(20);
        // $allorder = order::orderBy('id','DESC')->distinct('orderid')->paginate(20);
        // $allorder = order::select('orderid')->distinct('orderid')->paginate(20);
        // return $allorder;
        return view('admin.orders',['order'=>$allorder]);
    }

    // Displaying invoice list here
    public function invoicelist(){
        return view('admin.invoicelist');
    }

    // Invoice details
    public function invoicedetails($orderid){
        $fetchInvoice = order::where('orderid',$orderid)->get();
        return view('admin.invoicedetails',['order'=>$fetchInvoice]);
    }

    // customer list
    public function customerlist(){
        $getAllCustomer = customer::orderBy('id','DESC')->paginate(20);
        return view('admin.customerlist',['customer'=>$getAllCustomer]);
    }

    // customers review
    public function customerreview(){
        $getAllReview = rating::orderBy('id','DESC')->paginate(10);
        return view('admin.customerreview',['review'=>$getAllReview]);
    }

    // Sales
    public function sales(){
        return view('admin.sales');
    }

    // customer list
    public function contactlist(){
        $getAllContact = contact::orderBy('id','DESC')->paginate(20);
        return view('admin.contactlist',['contact'=>$getAllContact]);
    }

    // Newsletter List
    public function newsletterlist(){
        $getNewsletter = newsletter::orderBy('id','DESC')->paginate(20);
        return view('admin.newsletter',['newsletter'=>$getNewsletter]);
    }

    // Privacy, Terms, Delivery Page
    public function privacy_terms_delivery(){
        return view('admin.privacy_term_delivery');
    }

    // Invoice details
    public function print($orderid){
        $printInvoice = order::where('orderid',$orderid)->get();
        return view('admin.receipt',['order'=>$printInvoice]);
    }
    
}

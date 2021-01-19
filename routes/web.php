<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// FRONT-END ROUTES
Route::get('/welcome', [App\Http\Controllers\PageController::class, 'index'])->name('welcome');
Route::get('/view-product', [App\Http\Controllers\PageController::class, 'viewproduct']);
Route::get('/products', [App\Http\Controllers\PageController::class, 'products']);
Route::get('/sign-in', [App\Http\Controllers\PageController::class, 'login'])->name('signin');
Route::get('/create-account', [App\Http\Controllers\PageController::class, 'register'])->name('create-account');
Route::get('/process-checkout', [App\Http\Controllers\PageController::class, 'process_checkout'])->name('process_checkout');
Route::get('/view-cart', [App\Http\Controllers\PageController::class, 'view_cart'])->name('view-cart');
Route::get('/order-details', [App\Http\Controllers\PageController::class, 'order_details'])->name('order-details');
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/privacy-policy', [App\Http\Controllers\PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [App\Http\Controllers\PageController::class, 'terms'])->name('terms');
Route::get('/delivery-policy', [App\Http\Controllers\PageController::class, 'delivery'])->name('delivery');
Route::get('/faq', [App\Http\Controllers\PageController::class, 'faq'])->name('faq');
Route::get('/foods', [App\Http\Controllers\PageController::class, 'foods'])->name('foods');

// Customer Routes
Route::get('/my-account', [App\Http\Controllers\PageController::class, 'myaccount'])->name('myaccount');
Route::get('/order-history', [App\Http\Controllers\PageController::class, 'orderhistory'])->name('orderhistory');
Route::get('/last-order', [App\Http\Controllers\PageController::class, 'last_order'])->name('lastorder');


Route::get('/fetch_order_history/{orderid}', [App\Http\Controllers\PageController::class, 'order_history_details']);


// FRONT-END PROCCESSING ROUTES
Route::get('/showmenu/{menuid}', [App\Http\Controllers\PageController::class, 'display_day_menu']);
Route::get('/showproduct/{productid}', [App\Http\Controllers\PageController::class, 'show_product_details']);
Route::get('/save_rating', [App\Http\Controllers\RatingController::class, 'store']);
Route::get('/addtocart', [App\Http\Controllers\CartController::class, 'store']);
Route::get('/getCountCart', [App\Http\Controllers\CartController::class, 'get_count_cart']);
Route::get('/loadcartcontainer', [App\Http\Controllers\CartController::class, 'load_cart_container']);
Route::get('/delete_cart_item', [App\Http\Controllers\CartController::class, 'delete_cart_item']);
Route::get('/clear_cart', [App\Http\Controllers\CartController::class, 'clear_cart']);
Route::get('/loadcartview', [App\Http\Controllers\CartController::class, 'load_cart_view']);
Route::post('/create_customer', [App\Http\Controllers\CustomerController::class, 'store']);
Route::get('/save_order2/{customerid}', [App\Http\Controllers\CustomerController::class, 'save_order2']);
Route::post('/save_contact', [App\Http\Controllers\ContactController::class, 'store']);
Route::post('/save_email', [App\Http\Controllers\NewsletterController::class, 'store']);



Route::get('/save_order', [App\Http\Controllers\CustomerController::class, 'save_order']); // remember to remove


Auth::routes();

// ADMIN PAGES ROUTE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addproduct', [App\Http\Controllers\HomeController::class, 'addproduct'])->name('addproduct');
Route::get('/productlist', [App\Http\Controllers\HomeController::class, 'productlist'])->name('productlist');
Route::get('/admin-menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/admin-orders', [App\Http\Controllers\HomeController::class, 'orders'])->name('orders');
Route::get('/invoicelist', [App\Http\Controllers\HomeController::class, 'invoicelist'])->name('invoicelist');
Route::get('/customerlist', [App\Http\Controllers\HomeController::class, 'customerlist'])->name('customerlist');
Route::get('/customerreview', [App\Http\Controllers\HomeController::class, 'customerreview'])->name('customerreview');
Route::get('/admin-sales', [App\Http\Controllers\HomeController::class, 'sales'])->name('sales');
Route::get('/contactlist', [App\Http\Controllers\HomeController::class, 'contactlist'])->name('contactlist');
Route::get('/newsletterlist', [App\Http\Controllers\HomeController::class, 'newsletterlist'])->name('newsletterlist');
Route::get('/privacy_terms_delivery', [App\Http\Controllers\HomeController::class, 'privacy_terms_delivery'])->name('privacy_terms_delivery');


// ADMIN DATA PROCCESSING ROUTES
Route::post('/save_product', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/editfood/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('update_product/{id}', [App\Http\Controllers\ProductController::class, 'update']);
Route::get('deletefood/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);
Route::post('/save_menu', [App\Http\Controllers\MenuController::class, 'store']);
Route::get('/editmenu/{id}', [App\Http\Controllers\MenuController::class, 'edit']);
Route::post('update_menu/{id}', [App\Http\Controllers\MenuController::class, 'update']);
Route::get('deletemenu/{id}', [App\Http\Controllers\MenuController::class, 'destroy']);
Route::get('/menuproduct/{menuid}', [App\Http\Controllers\HomeController::class, 'show_menu_product']);
Route::post('/update_fee/{id}', [App\Http\Controllers\FeeController::class, 'update']);
Route::get('/orderinvoice/{orderid}', [App\Http\Controllers\HomeController::class, 'invoicedetails']);
Route::get('/deliver/{orderid}', [App\Http\Controllers\OrderController::class, 'deliverorder']);
Route::get('/cancelled/{orderid}', [App\Http\Controllers\OrderController::class, 'cancelorder']);
Route::post('/update_policy/{id}', [App\Http\Controllers\PolicyController::class, 'update_policy']);
Route::post('/update_term/{id}', [App\Http\Controllers\PolicyController::class, 'update_term']);
Route::post('/update_delivery/{id}', [App\Http\Controllers\PolicyController::class, 'update_delivery']);
Route::post('/save_todo', [App\Http\Controllers\TodoController::class, 'store']);
Route::get('delete_todo/{id}', [App\Http\Controllers\TodoController::class, 'destroy']);
Route::get('/print/{orderid}', [App\Http\Controllers\HomeController::class, 'print']);

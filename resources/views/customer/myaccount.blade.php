@extends('template.layout')
@section('content')
    <?php
    if(isset($_COOKIE["ip"])){
        $ip = $_COOKIE["ip"];
        // echo  $ip;
    } else{
        setcookie("ip", $_SERVER['REMOTE_ADDR'], time()+30*24*60*60);
        $ip = $_SERVER['REMOTE_ADDR'];
        // echo  $ip;
    }
    $subtotal = 0;
    use App\Models\cart;
    use App\Models\order;
    $Cart = cart::where('ip',$ip)->get();
    $countCart = count($Cart);

    $order = order::where('customerid',Auth::user()->id)->get();
    $countOrder = count($order);
    ?>
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            @auth
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-light-black fw-600 p-3 bg-danger text-light shadow">MY ACCOUNT</h5>
                    <div class="tracking-sec">
                        <div class="tracking-details padding-20 p-relative">
                            <h5 class="text-light-black fw-600 p-3 bg-dark text-light">My Account</h5>
                            <div class="ml-3">
                                @if($countCart > 0)
                                <p><a href="{{route('process_checkout')}}">Continue Checkout</a></p>
                                @endif
                                <p><a href="{{route('orderhistory')}}">View Order History</a></p>
                                @if($countOrder > 0)
                                <p><a href="{{route('lastorder')}}">My Last Order</a></p>
                                @endif
                                <p><a href="{{route('view-cart')}}">Check Cart Bag</a></p>
                            </div>
                        </div>
                        <div class="tracking-map">
                            <img src="{{asset('images/product.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
            @endauth
        </div>
        {{-- @endauth --}}
    </section>
    <!-- offer near -->
    @include('template.offer')
    <!-- offer near -->
@endsection
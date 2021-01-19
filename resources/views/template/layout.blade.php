<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Quickmunch | Food Delivery Hub</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
    <link rel="apple-touch-icon-precomposed" href="#">
    <link rel="shortcut icon" href="#">
    <!-- Bootstrap -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Flaticons -->
    <link href="{{asset('assets/css/font/flaticon.css')}}" rel="stylesheet">
    <!-- Swiper Slider -->
    <link href="{{asset('assets/css/swiper.min.css')}}" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{asset('assets/css/ion.rangeSlider.min.css')}}" rel="stylesheet">
    <!-- magnific popup -->
    <link href="{{asset('assets/css/magnific-popup.css')}}" rel="stylesheet">
    <!-- Nice Select -->
    <link href="{{asset('assets/css/nice-select.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
	<!-- Color Change -->
    <link rel="stylesheet" class="color-changing" href="assets/css/color4.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <!-- place -->
</head>

<body>
    <!-- advertise-banner -->
    {{-- <div class="banner-adv-bg">
      <div id="banner-adv" class="banner-adv">
        <div class="flex-adv">
            <a href="https://themeforest.net/item/costic-food-dashboard-html5-template/28164952" target="_blank">
                <i class="fas fa-gift"></i> 
                <span class="text">Get FREE CRM Dashboard with Quickmunch.</span>
            </a>
            <a href="https://themeforest.net/item/costic-food-dashboard-html5-template/28164952" target="_blank"  class="btn-second btn-submit">View Dashboard here</a>
            </div> 
            <span class="close-banner"></span>
        </div>
    </div> --}}
     <!-- advertise-banner -->
    <?php
    // Setting a cookie
    if(isset($_COOKIE["ip"])){
        $ip = $_COOKIE["ip"];
        // echo  $ip;
    } else{
        setcookie("ip", $_SERVER['REMOTE_ADDR'], time()+30*24*60*60);
        $ip = $_SERVER['REMOTE_ADDR'];
        // echo  $ip;
    }
    ?>
    <input type="hidden" name="ip" id="ip" value="{{$ip}}">

    <!-- Navigation -->
    <div class="header">
        <header class="full-width">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mainNavCol">
                        <!-- logo -->
                        <div class="logo mainNavCol">
                            <a href="index.html">
                                <img src="assets/img/logo.png" class="img-fluid" alt="Logo">
                            </a>
                        </div>
                        <!-- logo -->
                        <div class="main-search mainNavCol">
                            <form class="main-search search-form full-width">
                                <div class="row">
                                    <!-- location picker -->
                                    <div class="col-lg-6 col-md-5">
                                        {{-- I removed location picker here --}}
                                    </div>
                                    <!-- location picker -->
                                    <!-- search -->
                                    <div class="col-lg-6 col-md-7">
                                        <div class="search-box padding-10">
                                            <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                                        </div>
                                    </div>
                                    <!-- search -->
                                </div>
                            </form>
                        </div>
                        <div class="right-side fw-700 mainNavCol">
                            <div class="gem-points">
                                <a href="{{route('foods')}}"> <i class="fas fa-concierge-bell"></i>
                                    <span>Order Now</span>
                                </a>
                            </div>
                            <div class="catring parent-megamenu">
                                <a href="#"> <span>Pages <i class="fas fa-caret-down"></i></span>
                                    <i class="fas fa-bars"></i>
                                </a>
                                <div class="megamenu">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-5">
                                                    <div class="ex-collection-box h-100">
                                                        <a href="#">
                                                            <img src="{{asset('assets/img/nav-1.jpg')}}" class="img-fluid full-width h-100" alt="image">
                                                        </a>
                                                        <div class="category-type overlay padding-15"> <a href="restaurant.html" class="category-btn">Top rated</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-7">
                                                    <div class="row">
                                                        {{-- <div class="col-lg-3 col-sm-6">
                                                            <div class="menu-style">
                                                                <div class="menu-title">
                                                                    <h6 class="cat-name"><a href="#" class="text-light-black">Home Pages</a></h6>
                                                                </div>
                                                                <ul>
                                                                    <li class="active"><a href="index.html" class="text-light-white fw-500">Landing Page</a>
                                                                    </li>
                                                                    <li><a href="homepage-1.html" class="text-light-white fw-500">Home Page 1</a>
                                                                    </li>
                                                                    <li><a href="homepage-2.html" class="text-light-white fw-500">Home Page 2</a>
                                                                    </li>
                                                                    <li><a href="homepage-3.html" class="text-light-white fw-500">Home Page 3</a>
                                                                    </li>
                                                                    <li><a href="homepage-4.html" class="text-light-white fw-500">Home Page 4</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="menu-style">
                                                                <div class="menu-title">
                                                                    <h6 class="cat-name"><a href="#" class="text-light-black">Top Rated Menu</a></h6>
                                                                </div>
                                                                <ul>
                                                                <?php
                                                                use App\Models\menu;
                                                                $getmenu = menu::orderBy('id','DESC')->limit(5)->get();
                                                                ?>
                                                                @foreach($getmenu as $menu)
                                                                    <li><a href="{{url('/showmenu/'.$menu->menuid)}}" class="text-light-white fw-500">{{$menu->name}}</a></li>
                                                                @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="menu-style">
                                                                <div class="menu-title">
                                                                    <h6 class="cat-name"><a href="#" class="text-light-black">Related Pages</a></h6>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="{{route('foods')}}" class="text-light-white fw-500">Verities</a>
                                                                    <li><a href="{{route('about')}}" class="text-light-white fw-500">About Us</a>
                                                                    </li>
                                                                    <li><a href="{{route('contact')}}" class="text-light-white fw-500">Contact</a>
                                                                    </li>
                                                                    <li><a href="{{route('faq')}}" class="text-light-white fw-500">FAQ</a>
                                                                    </li>
                                                                    <li><a href="list-view.html" class="text-light-white fw-500">List View</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6">
                                                            <div class="menu-style">
                                                                <div class="menu-title">
                                                                    <h6 class="cat-name"><a href="#" class="text-light-black">Additional Pages</a></h6>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="login.html" class="text-light-white fw-500">Login</a>
                                                                    </li>
                                                                    <li><a href="register.html" class="text-light-white fw-500">Sign-up</a>
                                                                    </li>
                                                                    <li><a href="checkout.html" class="text-light-white fw-500">Checkout</a>
                                                                    </li>
                                                                    <li><a href="order-details.html" class="text-light-white fw-500">Order Details</a>
                                                                    </li>
                                                                    <li><a href="geo-locator.html" class="text-light-white fw-500">Geo Locator</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- mobile search -->
                            <div class="mobile-search">
                                <a href="#" data-toggle="modal" data-target="#search-box"> <i class="fas fa-search"></i>
                                </a>
                            </div>
                            <!-- mobile search -->
                            <!-- user account -->
                            <div class="user-details p-relative">
                                <a href="#" class="text-light-white fw-500">
                                    <img src="{{asset('images/default.png')}}" class="rounded-circle" style="width: 30px" alt="userimg">
                                   <?php use App\Models\order; ?>
                                    @auth
                                    <?php $userName = Auth::user()->name;
                                    $arr = explode(' ',trim($userName));
                                    $order = order::where('customerid',Auth::user()->id)->get();
                                    $countOrder = count($order);
                                    ?>
                                    <span>Hi, {{$arr[0]}}</span>
                                    @else
                                    <span>Account</span>
                                    @endauth 
                                </a>
                                <div class="user-dropdown">
                                    <ul>
                                        @auth
                                        <li>
                                            <a href="{{route('orderhistory')}}">
                                                <div class="icon"><i class="flaticon-rewind"></i>
                                                </div> <span class="details">Past Orders</span>
                                            </a>
                                        </li>
                                        @if($countOrder > 0)
                                        <li>
                                            <a href="{{route('lastorder')}}">
                                                <div class="icon"><i class="flaticon-takeaway"></i>
                                                </div> <span class="details">Upcoming Orders</span>
                                            </a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('contact')}}">
                                                <div class="icon"><i class="flaticon-board-games-with-roles"></i>
                                                </div> <span class="details">Help Center</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{route('myaccount')}}">
                                                <div class="icon"><i class="flaticon-user"></i>
                                                </div> <span class="details">Account</span>
                                            </a>
                                        </li>
                                        @else
                                        <p>Not Signed-in</p>
                                        @endauth
                                    </ul>
                                    <div class="user-footer"> <span class="text-light-black"></span> 
                                        @auth
                                            <a href="#" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">Sign Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        @else
                                            <a href="{{route('signin')}}">Sign In</a>
                                        @endauth
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- mobile search -->
                            <!-- user notification -->
                            <div class="cart-btn notification-btn">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-bell"></i>
                                    <span class="user-alert-notification"></span>
                                </a>
                                <div class="notification-dropdown">
                                    <div class="product-detail">
                                        <a href="#">
                                            <div class="img-box">
                                                <img src="{{asset('assets/img/shop-1.png')}}" class="rounded" alt="image">
                                            </div>
                                            <div class="product-about">
                                                <p class="text-light-black">Lil Johnny’s</p>
                                                <p class="text-light-white">Spicy Maxican Grill</p>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="rating-box">
                                        <p class="text-light-black">How was your last order ?.</p> <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <span class="text-dark-white"><i class="fas fa-star"></i></span>
                                        <cite class="text-light-white">Ordered 2 days ago</cite>
                                    </div>
                                </div>
                            </div>
                            <!-- user notification -->
                            <!-- user cart -->
                            <div class="cart-btn cart-dropdown">
                                <a href="#" class="text-light-green fw-700"> <i class="fas fa-shopping-bag"></i>
                                    <span class="user-alert-cart" id="total_item_inCart"></span>
                                </a>
                                <div class="cart-detail-box">
                                    <div class="card cart_container" id="cart_container">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- user cart -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- Navigation -->

    <main>
        @yield('content')
    </main>

    <!-- footer -->
    <div class="footer-top section-padding bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-credit-card-1"></i></span>
                        <span class="text-custom-white">100% Payment<br>Secured</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-wallet-1"></i></span>
                        <span class="text-custom-white">Support lots<br> of Payments</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6 mb-sm-20">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-help"></i></span>
                        <span class="text-custom-white">24 hours / 7 days<br>Support</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-truck"></i></span>
                        <span class="text-custom-white">Fast Delivery<br>low fee</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-guarantee"></i></span>
                        <span class="text-custom-white">Best Price<br>Guaranteed</span>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 col-6">
                    <div class="icon-box"> <span class="text-light-green"><i class="flaticon-app-file-symbol"></i></span>
                        <span class="text-custom-white">Order History<br>Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="section-padding bg-light-theme pt-0 u-line bg-black">
        <div class="u-line instagram-slider swiper-container">
            <ul class="hm-list hm-instagram swiper-wrapper">
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-3.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-1.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-2.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-4.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-5.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-6.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-7.jpg')}}" alt="instagram"></a>
                </li>
                <li class="swiper-slide">
                    <a href="#"><img src="{{asset('assets/img/restaurants/250x200/insta-8.jpg')}}" alt="instagram"></a>
                </li>
            </ul>
        </div>
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <h6 class="text-custom-white">Top Menu List</h6>
                            <ul>
                                <?php
                                $getmenufoot = menu::where('status','published')->orderBy('id','DESC')->limit(5)->get();
                                ?>
                                @foreach($getmenu as $menufoot)
                                    {{-- <li><a href="{{url('/showmenu/'.$menu->menuid)}}" class="text-light-white fw-500">{{$menu->name}}</a></li> --}}
                                    <li><a href="{{url('/showmenu/'.$menu->menuid)}}" class="text-light-white fw-600">{{$menu->name}}</a></li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <h6 class="text-custom-white">Let Us Help You</h6>
                            <ul>
                                <li><a href="#" class="text-light-white fw-600">How to Order for a Food</a></li>
                                <li><a href="#" class="text-light-white fw-600">Account Details</a></li>
                                <li><a href="#" class="text-light-white fw-600">Order History</a></li>
                                <li><a href="#" class="text-light-white fw-600">Delievry Options and Timelines</a></li>
                                <li><a href="#" class="text-light-white fw-600">Login</a></li>
                                {{-- <li><a href="#" class="text-light-white fw-600">Help Center</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <h6 class="text-custom-white">Get to Know Us</h6>
                            <ul>
                                <li><a href="{{route('about')}}" class="text-light-white fw-600">About Us</a>
                                </li>
                                <li><a href="{{route('faq')}}" class="text-light-white fw-600">FAQ</a>
                                </li>
                                <li><a href="{{route('delivery')}}" class="text-light-white fw-600">Delivery</a>
                                </li>
                                <li><a href="{{route('privacy')}}" class="text-light-white fw-600">Privacy Policy</a>
                                </li>
                                <li><a href="{{route('terms')}}" class="text-light-white fw-600">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl col-lg-4 col-md-4 col-sm-6">
                        <div class="footer-contact">
                            <h6 class="text-custom-white">Newsletter</h6>
                            <form class="subscribe_form" method="post" action="{{url('/save_email')}}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-submit" name="email" placeholder="Enter your email" required>
                                    <span class="input-group-btn">
                                        <button class="btn btn-second btn-submit" type="submit"><i class="fas fa-paper-plane"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="ft-social-media">
                            <h6 class="text-center text-custom-white">Follow us</h6>
                            <ul>
                                <li> <a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li> <a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li> <a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li> <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                                <li> <a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="payment-logo mb-md-20"> <span class="text-light-white fs-14 mr-3">We accept</span>
                        <div class="payemt-icon">
                            <img src="{{asset('assets/img/card-front.jpg')}}" alt="#">
                            <img src="{{asset('assets/img/visa.jpg')}}" alt="#">
                            <img src="{{asset('assets/img/amex-card-front.png')}}" alt="#">
                            <img src="{{asset('assets/img/mastercard.png')}}" alt="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center medewithlove align-self-center">
                    {{-- <a href="http://www.slidesigma.com" class="text-custom-white">Made with Real <i class="fas fa-heart"></i> Slidesigma</a> --}}
                </div>
                <div class="col-lg-4">
                    <div class="copyright-text"> <span class="text-light-white">© <a href="#" class="text-light-white">Chinmark Food</a> - <?php echo date('Y')?> | All Right Reserved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <div class="modal fade" id="search-box">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="search-box p-relative full-width">
                        <input type="text" class="form-control" placeholder="Pizza, Burger, Chinese">
                    </div>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

{{-- MODALS --}}
<!-- MESSAGE MODAL (SUCCESS) -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="modal-2">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="content_m" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                            <i class="fa fa-check-circle text-success" style="font-size:3.0em;"></i>
                            <p id="modalMsg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MESSAGE MODAL (ERROR) -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="modal-2">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="content_m" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                            <i class="fa fa-times-circle text-danger" style="font-size:3.0em;"></i>
                            <p id="modalMsg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        $('#successModal').on('show.bs.modal', function(){
            $('#modalMsg').text("{{ session('success') }}");
        });
        $('#successModal').modal('show');
    </script>
@endif
@if(session('error'))
    <script>
        $('#errorModal').on('show.bs.modal', function(){
            $('#modalMsg').text("{{ session('success') }}");
        });
        $('#errorModal').modal('show');
    </script>
@endif

    <!-- Place all Scripts Here -->
    <!-- jQuery -->
    {{-- <script src="{{asset('assets/js/jquery.min.js')}}"></script> --}}
    <!-- Popper -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- Range Slider -->
    <script src="{{asset('assets/js/ion.rangeSlider.min.js')}}"></script>
    <!-- Swiper Slider -->
    <script src="{{asset('assets/js/swiper.min.js')}}"></script>
    <!-- Nice Select -->
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
    <!-- sticky sidebar -->
    <script src="{{asset('assets/js/sticksy.js')}}"></script>
    <!-- Munch Box Js -->
    <script src="{{asset('assets/js/quickmunch.js')}}"></script>
    <!-- /Place all Scripts Here -->
</body>

</html>

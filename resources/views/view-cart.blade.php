@extends('template.layout')
@section('content')
    <!-- restaurent meals -->
    <section class="section-padding restaurent-meals bg-light-theme mt-2">
        <div class="container-fluid">
            <div class="row">
                {{-- Cart View Starts --}}
                <div class="col-lg-9 browse-cat border-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header-left">
                                <h3 class="text-light-black header-title title-2">Most popular near you <small></small></h3>
                            </div>
                        </div>
                        <div class="col-12">
                            <?php
                            use App\Models\menu;
                            $getmenu = menu::where('status','published')->get();
                            ?>
                            <div class="popular-item-slider swiper-container swiper-container-initialized swiper-container-horizontal">
                                @foreach($getmenu as $menu)
                                <div class="swiper-wrapper" style="transform: translate3d(-642.4px, 0px, 0px); transition-duration: 0ms;">
                                    <div class="swiper-slide" style="width: 120.6px; margin-right: 40px;">
                                        <a href="{{url('/showmenu/'.$menu->menuid)}}" class="categories">
                                            <div class="icon text-custom-white bg-light-green ">
                                                <img src="{{asset('/menuImages/'.$menu->image)}}" class="rounded-circle" alt="categories">
                                            </div> <span class="text-light-black cat-name">{{$menu->name}}</span>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                <!-- Add Arrows -->
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="false"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                            
                            {{-- Start --}}
                            <div id="cart_view">
                            
                            </div>
                            {{-- End --}}
                        </div>
                        
                        {{-- </div> --}}
                    </div>
                </div>
                {{-- Cart View Stops --}}
                <div class="col-xl-3 col-lg-3 mt-3">
                    <div class="sidebar">
                        <div class="video-box mb-xl-20">
                            <div class="video_wrapper video_wrapper_full js-videoWrapper">
                                <iframe class="videoIframe js-videoIframe" src="https://www.youtube.com/embed/AdZrEIo6UYU" data-src="https://www.youtube.com/embed/AdZrEIo6UYU?autoplay=1&amp;rel=0" allow="autoplay"></iframe>
                                <div class="videoPoster js-videoPoster">
                                    <div class="video-inner">
                                        <i class="far fa-play-circle"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="discount-box main-box padding-tb-10">
                                <div class="discount-price padding-10">
                                    <div class="left-side">
                                        <h6 class="text-light-black fw-600 no-margin">Watch Now and get 50% discount</h6>
                                        <p class="text-light-white no-margin">The hung-over foody (2019)</p>
                                    </div>
                                    <div class="right-side justify-content-end">
                                        <div class="dis-text">
                                            <span class="badge bg-light-green text-custom-white fw-400">Discount</span>
                                            <h4 class="text-light-black no-margin">50%</h4>
                                        </div>
                                        <a href="restaurent.html">
                                            <img src="{{asset('assets/img/logo-3.jpg')}}" class="img-fluid" alt="logo">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent meals -->
    <!-- offer near -->
    <section class="fresh-deals section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Offers near you</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="fresh-deals-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="restaurant.html">
                                            <img src="{{asset('assets/img/restaurants/255x150/shop-10.jpg')}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Great Burger</a></h6>
                                        </div>
                                        <p class="text-light-white">American, Fast Food</p>
                                        <div class="product-details">
                                            <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">$10 min</span>
                                            </div>
                                            <div class="rating"> <span>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                            </span>
                                                <span class="text-light-white text-right">4225 ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-footer-2">
                                        <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                        </div>
                                        <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="restaurant.html">
                                            <img src="{{asset('assets/img/restaurants/255x150/shop-11.jpg')}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Flavor Town</a></h6>
                                        </div>
                                        <p class="text-light-white">Breakfast, Lunch & Dinner</p>
                                        <div class="product-details">
                                            <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">$10 min</span>
                                            </div>
                                            <div class="rating"> <span>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                            </span>
                                                <span class="text-light-white text-right">4225 ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-footer-2">
                                        <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                        </div>
                                        <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="restaurant.html">
                                            <img src="{{asset('assets/img/restaurants/255x150/shop-22.jpg')}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Big Bites</a></h6>
                                        </div>
                                        <p class="text-light-white">Pizzas, Fast Food</p>
                                        <div class="product-details">
                                            <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">$10 min</span>
                                            </div>
                                            <div class="rating"> <span>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                </span>
                                                <span class="text-light-white text-right">4225 ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-footer-2">
                                        <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                        </div>
                                        <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="restaurant.html">
                                            <img src="{{asset('assets/img/restaurants/255x150/shop-23.jpg')}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Smile N’ Delight</a></h6>
                                        </div>
                                        <p class="text-light-white">Desserts, Beverages</p>
                                        <div class="product-details">
                                            <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">$10 min</span>
                                            </div>
                                            <div class="rating"> <span>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            <i class="fas fa-star text-yellow"></i>
                                            </span>
                                                <span class="text-light-white text-right">4225 ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-footer-2">
                                        <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                        </div>
                                        <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="product-box">
                                    <div class="product-img">
                                        <a href="restaurant.html">
                                            <img src="{{asset('assets/img/restaurants/255x150/shop-24.jpg')}}" class="img-fluid full-width" alt="product-img">
                                        </a>
                                    </div>
                                    <div class="product-caption">
                                        <div class="title-box">
                                            <h6 class="product-title"><a href="restaurant.html" class="text-light-black">Lil Johnny’s</a></h6>
                                        </div>
                                        <p class="text-light-white">Continental & Mexican</p>
                                        <div class="product-details">
                                            <div class="price-time"> <span class="text-light-black time">30-40 min</span>
                                                <span class="text-light-white price">$10 min</span>
                                            </div>
                                            <div class="rating"> <span>
                          <i class="fas fa-star text-yellow"></i>
                          <i class="fas fa-star text-yellow"></i>
                          <i class="fas fa-star text-yellow"></i>
                          <i class="fas fa-star text-yellow"></i>
                          <i class="fas fa-star text-yellow"></i>
                        </span>
                                                <span class="text-light-white text-right">4225 ratings</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-footer-2">
                                        <div class="discount"> <span class="text-success fs-12">$3 off</span>
                                        </div>
                                        <div class="discount-coupon"> <span class="text-light-white fs-12">First order only</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- offer near -->
@endsection
@extends('template.layout')
@section('content')
<?php
use App\Models\product;
use App\Models\rating;
use App\Models\menu;
$getmenu = menu::where('status','published')->get();
?>
 <!-- slider -->
 <section class="about-us-slider swiper-container p-relative">
    <div class="swiper-wrapper">
        <div class="swiper-slide slide-item">
            <img src="assets/img/about/blog/1920x700/banner-4.jpg" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 align-self-center">
                            <div class="right-side-content">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="#" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="swiper-slide slide-item">
            <img src="assets/img/about/blog/1920x700/banner-5.jpg" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 align-self-center">
                            <div class="right-side-content text-center">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="#" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
        <div class="swiper-slide slide-item">
            <img src="assets/img/about/blog/1920x700/banner-6.jpg" class="img-fluid full-width" alt="Banner">
            <div class="transform-center">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-7 align-self-center">
                            <div class="right-side-content text-right">
                                <h1 class="text-custom-white fw-600">Increase takeout sales by 50%</h1>
                                <h3 class="text-custom-white fw-400">with the largest delivery platform in the U.S. and Canada</h3>
                                <a href="#" class="btn-second btn-submit">Learn More.</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay overlay-bg"></div>
        </div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</section>
<!-- slider -->
<!-- Browse by category -->
<section class="browse-cat u-line section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Browse by menu <span class="fs-14">
                        {{-- <a href="#">See all restaurant</a></span></h3> --}}
                </div>
            </div>
            <div class="col-12">
                <div class="category-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="categories">
                                <div class="icon icon-parent text-custom-white bg-light-green"> <i class="fas fa-map-marker-alt"></i>
                                </div> <span class="text-light-black cat-name">Brooklyn</span>
                            </a>
                        </div>
                        <?php
                        $getmenu = menu::where('status','published')->get();
                        ?>
                        @foreach($getmenu as $menu)
                        <div class="swiper-slide">
                            <a href="{{url('/showmenu/'.$menu->menuid)}}" class="categories">
                                <div class="icon text-custom-white bg-light-green ">
                                    <img src="{{asset('/menuImages/'.$menu->image)}}" class="rounded-circle" alt="categories">
                                </div> <span class="text-light-black cat-name">{{$menu->name}}</span>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Browse by category -->
<!-- Explore collection -->
<section class="ex-collection section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header-left">
                    <h3 class="text-light-black header-title title">Explore our collections</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    <img src="assets/img/restaurants/540x300/collection-1.jpg" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="#" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="ex-collection-box mb-xl-20">
                    <img src="assets/img/restaurants/540x300/collection-2.jpg" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15"> <a href="#" class="category-btn">Top rated</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="assets/img/restaurants/255x587/Banner-12.jpg" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">Most popular near you</button> <a href="#" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    @foreach ($getmenu as $value)
                        <?php 
                        $product = product::where('menu',$value->menuid)->inRandomOrder()->limit(6)->get()
                        ?>
                        @foreach ($product as $show)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-box mb-xl-20">
                                <div class="product-img">
                                    <a href="{{url('/showproduct/'.$show->productid)}}">
                                        <img src="{{asset('/productImages/'.$show->image)}}" class="img-fluid full-width" style="" alt="product-img">
                                    </a>
                                    <div class="overlay">
                                        <div class="product-tags padding-10"> <span class="circle-tag">
                                            <img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                                            </span>
                                            <div class="custom-tag"> 
                                                {{-- <span class="text-custom-white rectangle-tag bg-gradient-red">10%</span> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="title-box">
                                        <h6 class="product-title"><a href="{{url('/showproduct/'.$show->productid)}}" class="text-light-black ">{{$show->name}}</a></h6>
                                        <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">&#8358;{{number_format($show->amount,2)}}</span>
                                        </div>
                                    </div>
                                    <p class="text-light-white">{{$show->type}}</p>
                                    <div class="product-details">
                                        <div class="price-time"> <span class="text-light-black time">Fast Delivery</span>
                                            {{-- <span class="text-light-white price">$10 min</span> --}}
                                        </div>
                                        {{-- Product Review Start --}}
                                        <?php
                                        // use App\Models\rating;
                                        $getReview = rating::where('productid',$show->productid)->get();
                                        $countReview = count($getReview);
                                        $getMax = rating::where('productid',$show->productid)->max('star');
                                        ?>
                                        @if($getMax == 1)
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @elseif($getMax == 2)
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @elseif($getMax == 3)
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @elseif($getMax == 4)
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @elseif($getMax == 5)
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                                <i class="fas fa-star text-yellow"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @else
                                        <div class="rating"> 
                                            <span class="fs-16 text-yellow">
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                                <i class="fas fa-star text-dark-white"></i>
                                            </span>
                                            <span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                                        </div>
                                        @endif
                                        {{-- !Product Review Ends --}}
                                    </div>
                                    <div class="product-footer">
                                        <a href="#" class="btn-second btn-submit addToCart" id="{{$show->productid}}" title="{{$show->productid}}">ADD TO CART</a>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        @endforeach
                    @endforeach 
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-12">
                <div class="banner-adv2 mb-xl-20">
                    <img src="assets/img/restaurants/1110x100/vbanner-2.jpg" class="img-fluid full-width" alt="banner"> <span class="text">Unlimited Free Delivery with. <img src="{{asset('images/logo.png')}}" style="width: 150px" alt="logo">
                        <a href="#" class="btn-second btn-submit">Try 30 Days FREE</a></span>
                    <span class="close-banner"></span>
                </div>
            </div>
        </div>
        <!-- advertisement banner-->
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                   jdfjkekje
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="large-product-box mb-xl-20 p-relative">
                    <img src="assets/img/restaurants/255x587/Banner-1.jpg" class="img-fluid full-width" alt="image">
                    <div class="category-type overlay padding-15">
                        <button class="category-btn">Most popular near you</button> <a href="#" class="btn-first white-btn text-light-black fw-600 full-width">See all</a>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Explore collection --> 
@endsection
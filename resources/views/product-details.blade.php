@extends('template.layout')
@section('content')
    <!-- restaurent top -->
    <?php
    use App\Models\product;
    $product = product::orderBy('id','DESC')->get();
    foreach ($productdetails as $value);

    $mostpopular = product::orderBy('id','DESC')->limit(10)->get();
    ?>
    <section class="" style="margin-top: 90px">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    @foreach ($productdetails as $value)
                    <h5 class="text-uppercase text-light bg-danger p-3 shadow">{{$value->name}}</h5>
                    @endforeach
                </div>
                {{-- <div class="col-md-12">

                </div> --}}
            </div>
        </div>
    </section>
    <!-- restaurent top -->
    <!-- restaurent details -->
    <section class="restaurent-details  u-line pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('/productImages/'.$value->image)}}" class="img-fluid full-width mt-4" style="height: 400px" alt="product-img">
                </div>
                <div class="col-md-6">
                    <div class="heading padding-tb-10 u-line">
                        <h3 class="text-light-black title fw-700 no-margin">{{$value->name}}</h3>
                        <h4 class="text-danger no-margin mb-2">&#8358;{{number_format($value->amount,2)}}
                        </h4>
                        <?php
                        use App\Models\rating;
                        $getReview = rating::where('productid',$value->productid)->get();
                        $countReview = count($getReview);
                        $getMax = rating::where('productid',$value->productid)->max('star');
                        ?>
                        <div class="head-rating">
                            @if($getMax == 1)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @elseif($getMax == 2)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @elseif($getMax == 3)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @elseif($getMax == 4)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @elseif($getMax == 5)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @else
                            <div class="rating"> 
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="text-light-black fs-12 rate-data">{{$countReview}} rating</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="u-line pt-3 pb-3">
                        <span>Qty:</span> <input class="addtocartInput mr-2" type="number" id="qty" placeholder="1"><a href="#" class="btn-second btn-submit addToCart" id="{{$value->productid}}" title="{{$value->productid}}">ADD TO CART</a>
                    </div>
                    <div class="restaurent-tabs u-line">
                        <div class="restaurent-menu scrollnav">
                            <ul class="nav nav-pills">
                                <li class="nav-item"> <a class="nav-link active text-light-white fw-700" data-toggle="pill" href="#menu">Menu</a>
                                </li>
                                {{-- <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#about">About</a>
                                </li> --}}
                                <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#review">Reviews</a>
                                </li>
                                {{-- <li class="nav-item"> <a class="nav-link text-light-white fw-700" data-toggle="pill" href="#mapgallery">Map & Gallery</a>
                                </li> --}}
                            </ul>
                            <div class="add-wishlist">
                                <img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                            </div>
                        </div>
                    </div>
                    <div class="restaurent-address u-line">
                        <div class="address-details">
                            <div class="address">
                                <div class="delivery-address"> {{$value->type}}
                                    <div class="delivery-type"> <span class="text-success fs-12 fw-500">No minimun</span><span class="text-light-white">, Fast Delivery</span>
                                    </div>
                                </div>
                                <div class="change-address"> <a href="{{route('foods')}}" class="fw-500">Shop More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="u-line mt-2 mb-2">
                        <p class="text-light-white no-margin">{!!$value->description!!}</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent details -->
    
    <!-- restaurent meals -->
    <section class="section-padding restaurent-meals bg-light-theme">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="advertisement-slider swiper-container h-auto mb-xl-20 mb-md-40">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-box">
                                        <div class="testimonial-img p-relative">
                                            <a href="restaurant.html">
                                                <img src="{{asset('assets/img/blog/438x180/shop-1.jpg')}}" class="img-fluid full-width" alt="testimonial-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="brand-logo">
                                                    <img src="{{asset('assets/img/user/user-3.png')}}" class="img-fluid" alt="logo">
                                                </div>
                                                <div class="add-fav text-success">
                                                    <img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-caption padding-15">
                                            <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                                            <h5 class="fw-600"><a href="restaurant.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                                            <div class="testimonial-user-box">
                                                <img src="{{asset('assets/img/blog-details/40x40/user-1.png')}}" class="rounded-circle" alt="#">
                                                <div class="testimonial-user-name">
                                                    <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                                                </div>
                                            </div>
                                            <div class="ratings"> <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                                                <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                                                <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                                                <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                                                <span class="text-yellow fs-16">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                            </div>
                                            <p class="text-light-black">Delivery was fast and friendly...</p>
                                            <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                                            <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-box">
                                        <div class="testimonial-img p-relative">
                                            <a href="restaurant.html">
                                                <img src="{{asset('assets/img/blog/438x180/shop-2.jpg')}}" class="img-fluid full-width" alt="testimonial-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="brand-logo">
                                                    <img src="{{asset('assets/img/user/user-2.png')}}" class="img-fluid" alt="logo">
                                                </div>
                                                <div class="add-fav text-success"><img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-caption padding-15">
                                            <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                                            <h5 class="fw-600"><a href="restaurant.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                                            <div class="testimonial-user-box">
                                                <img src="{{asset('assets/img/blog-details/40x40/user-2.png')}}" class="rounded-circle" alt="#">
                                                <div class="testimonial-user-name">
                                                    <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                                                </div>
                                            </div>
                                            <div class="ratings"> <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                                                                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                                                                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                                                                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                                                                        <span class="text-yellow fs-16">
                                                  <i class="fas fa-star"></i>
                                                </span>
                                            </div>
                                            <p class="text-light-black">Delivery was fast and friendly...</p>
                                            <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                                            <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-wrapper">
                                    <div class="testimonial-box">
                                        <div class="testimonial-img p-relative">
                                            <a href="restaurant.html">
                                                <img src="{{asset('assets/img/blog/438x180/shop-2.jpg')}}" class="img-fluid full-width" alt="testimonial-img">
                                            </a>
                                            <div class="overlay">
                                                <div class="brand-logo">
                                                    <img src="{{asset('assets/img/user/user-1.png')}}" class="img-fluid" alt="logo">
                                                </div>
                                                <div class="add-fav text-success"><img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="testimonial-caption padding-15">
                                            <p class="text-light-white text-uppercase no-margin fs-12">Featured</p>
                                            <h5 class="fw-600"><a href="restaurant.html" class="text-light-black">GSA King Tomato Farm</a></h5>
                                            <div class="testimonial-user-box">
                                                <img src="{{asset('assets/img/blog-details/40x40/user-3.png')}}" class="rounded-circle" alt="#">
                                                <div class="testimonial-user-name">
                                                    <p class="text-light-black fw-600">Sarra</p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                                                </div>
                                            </div>
                                            <div class="ratings"> <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                                                                    <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                                                                    <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                                                                    <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                                                                    <span class="text-yellow fs-16">
                                              <i class="fas fa-star"></i>
                                            </span>
                                            </div>
                                            <p class="text-light-black">Delivery was fast and friendly...</p>
                                            <p class="text-light-white fw-100"><strong class="text-light-black fw-700">Local delivery: </strong> From $7.99 (4.0 mi)</p>
                                            <a href="checkout.html" class="btn-second btn-submit">Order Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="card sidebar-card">
                        <div class="card-header no-padding">
                            <div class="offer-content">
                                <h2 class="text-custom-white fw-700">Get &#8358;104 off <small class=" fw-700">your order*</small></h2>
                                <p class="text-custom-white">As an added treat, enjoy <strong>free delivery</strong> from
                                    <br>subscribing to our newsletter automatically</p>
                            </div>
                        </div>
                        <div class="card-body padding-15">
                            <form class="subscribe_form" method="post" action="{{url('/save_email')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="text-light-white fs-14">Email</label>
                                            <input type="email" name="email" class="form-control form-control-submit" placeholder="Email I'd" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn-second btn-submit full-width">Save &#8358;104 on your first order</button>
                                        </div>

                                        <div class="text-center"> <span class="text-light-black fs-12">*Valid on first order only, for one-time use, subject to Chinmark verification. Additional terms may apply. By signing up, you agree to receive marketing and
                        promotional emails and communications form Chinmark</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="promocodeimg mb-xl-20 p-relative">
                                <img src="{{asset('assets/img/banner.jpg')}}" class="img-fluid full-width" alt="promocode">
                                <div class="promocode-text">
                                    <div class="promocode-text-content">
                                        <h5 class="text-custom-white mb-2 fw-600">Get &#8358;104 off your first order!</h5>
                                        <p class="text-custom-white no-margin">Spend &#8358;300 or more and get &#8358;89 off your first delivery order.</p>
                                    </div>
                                    <div class="promocode-btn"> <a href="#">Get Deal</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 restaurent-meal-head mb-md-40">
                            <div class="card">
                                <div class="card-header">
                                    <div class="section-header-left">
                                        <h3 class="text-light-black header-title">
                                            <a class="card-link text-light-black no-margin" data-toggle="collapse" href="#collapseOne">
                                            Most Popular
                                          </a>
                                        </h3>
                                    </div>
                                </div>
                                <div id="collapseOne" class="collapse show">
                                    <div class="card-body no-padding">
                                        <div class="row">
                                            @foreach ($mostpopular as $popular)
                                            <div class="col-lg-12">
                                                <div class="restaurent-product-list">
                                                    <div class="restaurent-product-detail">
                                                        <div class="restaurent-product-left">
                                                            <div class="restaurent-product-title-box">
                                                                <div class="restaurent-product-box">
                                                                    <div class="restaurent-product-title">
                                                                        <h6 class="mb-2" data-toggle="modal" data-target="#restaurent-popup"><a href="javascript:void(0)" class="text-light-black fw-600">{{$popular->name}}</a></h6>
                                                                        <p class="text-light-white">{{$popular->type}}</p>
                                                                    </div>
                                                                    <div class="restaurent-product-label"> <span class="rectangle-tag bg-gradient-red text-custom-white addToCart" id="{{$popular->productid}}" title="{{$popular->productid}}">ADD TO CART</span>
                                                                        {{-- <span class="rectangle-tag bg-dark text-custom-white">Combo</span> --}}
                                                                    </div>
                                                                </div>
                                                                <div class="restaurent-product-rating">
                                                                    <?php
                                                                    // use App\Models\rating;
                                                                    $getReviewP = rating::where('productid',$popular->productid)->get();
                                                                    $countReviewP = count($getReviewP);
                                                                    $getMaxP = rating::where('productid',$popular->productid)->max('star');
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
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
                                                                    </div>
                                                                    @elseif($getMaxP == 2)
                                                                    <div class="rating"> 
                                                                        <span class="fs-16 text-yellow">
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                        </span>
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
                                                                    </div>
                                                                    @elseif($getMaxP == 3)
                                                                    <div class="rating"> 
                                                                        <span class="fs-16 text-yellow">
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                        </span>
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
                                                                    </div>
                                                                    @elseif($getMaxP == 4)
                                                                    <div class="rating"> 
                                                                        <span class="fs-16 text-yellow">
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-dark-white"></i>
                                                                        </span>
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
                                                                    </div>
                                                                    @elseif($getMaxP == 5)
                                                                    <div class="rating"> 
                                                                        <span class="fs-16 text-yellow">
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                            <i class="fas fa-star text-yellow"></i>
                                                                        </span>
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
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
                                                                        <span class="text-light-black fs-12 rate-data">{{$countReviewP}} ratings</span>
                                                                    </div>
                                                                    @endif
                                                                    {{-- !Product Review Ends --}}
                                                                </div>
                                                            </div>
                                                            <div class="restaurent-product-caption-box"> 
                                                                <?php
                                                                $string = $popular->description;
                                                                if (strlen($string) > 20) {
                                                                    $stringCut = substr($string, 0, 20);
                                                                    $endPoint = strrpos($stringCut, ' ');
                                                                    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                                                }
                                                                ?>
                                                                <span class="text-light-white">{!!$string!!}</span>
                                                            </div>
                                                            <div class="restaurent-tags-price">
                                                                <div class="restaurent-tags">
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/004-leaf.svg')}}" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/006-chili.svg')}}" alt="tag">
                                                                      </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/005-chef.svg')}}" alt="tag">
                                                                      </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/008-protein.svg')}}" alt="tag">
                                                                      </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/009-lemon.svg')}}" alt="tag">
                                                                      </span>
                                                                </div>
                                                                    <span class="circle-tag">
                                                                        <img src="{{asset('assets/img/svg/010-heart.svg')}}" alt="tag">
                                                                    </span>
                                                                <div class="restaurent-product-price">
                                                                    <h6 class="text-success fw-600 no-margin">&#8358;{{number_format($popular->amount,2)}}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="restaurent-product-img">
                                                            <img src="{{asset('/productImages/'.$popular->image)}}" class="img-fluid" alt="#">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card">
                                <div class="card-header">
                                    <div class="section-header-left">
                                        <h3 class="text-light-black header-title">
                                            <a class="card-link text-light-black no-margin" data-toggle="collapse" href="#collapseTwo">
                        Combo Meals
                      </a>
                                        </h3>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="collapse show">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="restaurent-product-list">
                                                    <div class="restaurent-product-detail">
                                                        <div class="restaurent-product-left">
                                                            <div class="restaurent-product-title-box">
                                                                <div class="restaurent-product-box">
                                                                    <div class="restaurent-product-title">
                                                                        <h6 class="mb-2" data-toggle="modal" data-target="#restaurent-popup"><a href="javascript:void(0)" class="text-light-black fw-600">Hakka Noodles & Sticky Date Cake - Meal</a></h6>
                                                                        <p class="text-light-white">600-700 Cal.</p>
                                                                    </div>
                                                                    <div class="restaurent-product-label"> <span class="rectangle-tag bg-gradient-red text-custom-white">Label</span>
                                                                        <span class="rectangle-tag bg-dark text-custom-white">Combo</span>
                                                                    </div>
                                                                </div>
                                                                <div class="restaurent-product-rating">
                                                                    <div class="ratings"> <span class="text-yellow"><i class="fas fa-star"></i></span>
                                                                        <span class="text-yellow"><i class="fas fa-star"></i></span>
                                                                        <span class="text-yellow"><i class="fas fa-star"></i></span>
                                                                        <span class="text-yellow"><i class="fas fa-star"></i></span>
                                                                        <span class="text-yellow"><i class="fas fa-star-half-alt"></i></span>
                                                                    </div>
                                                                    <div class="rating-text">
                                                                        <p class="text-light-white fs-12 title">3845 ratings</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="restaurent-product-caption-box"> <span class="text-light-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</span>
                                                            </div>
                                                            <div class="restaurent-tags-price">
                                                                <div class="restaurent-tags"> <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/004-leaf.svg')}}" alt="tag">
                                                                    </span>
                                                                                                        <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/006-chili.svg')}}" alt="tag">
                                                                    </span>
                                                                                                        <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/005-chef.svg')}}" alt="tag">
                                                                    </span>
                                                                                                        <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/008-protein.svg')}}" alt="tag">
                                                                    </span>
                                                                                                        <span class="text-custom-white square-tag">
                                                                        <img src="{{asset('assets/img/svg/009-lemon.svg')}}" alt="tag">
                                                                    </span>
                                                                                                    </div> <span class="circle-tag">
                                                                    <img src="{{asset('assets/img/svg/013-heart-1.svg')}}" alt="tag">
                                                                    </span>
                                                                <div class="restaurent-product-price">
                                                                    <h6 class="text-success fw-600 no-margin">$7.99+</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="restaurent-product-img">
                                                            <img src="{{asset('assets/img/dish/150x151/dish-6.jpg')}}" class="img-fluid" alt="#">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3">
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
                        <div class="cart-detail-box">
                            <div class="card cart_container" >
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent meals -->
    <!-- restaurent about -->
    {{-- <section class="section-padding restaurent-about smoothscroll" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light-black fw-700 title">Great Burger Menu Info</h3>
                    <p class="text-light-green no-margin">American, Breakfast, Coffee and Tea, Fast Food, Hamburgers</p>
                    <p class="text-light-white no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> <span class="text-success fs-16">$</span>
                    <span class="text-success fs-16">$</span>
                    <span class="text-success fs-16">$</span>
                    <span class="text-dark-white fs-16">$</span>
                    <span class="text-dark-white fs-16">$</span>
                    <ul class="about-restaurent">
                        <li> <i class="fas fa-map-marker-alt"></i>
                            <span>
                <a href="#" class="text-light-white">
                  314 79th St<br>
                  Rite Aid, Brooklyn, NY, 11209
                </a>
              </span>
                        </li>
                        <li> <i class="fas fa-phone-alt"></i>
                            <span><a href="tel:" class="text-light-white">(347) 123456789</a></span>
                        </li>
                        <li> <i class="far fa-envelope"></i>
                            <span><a href="mailto:" class="text-light-white">demo@domain.com</a></span>
                        </li>
                    </ul>
                    <ul class="social-media pt-2">
                        <li> <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
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
                <div class="col-md-6">
                    <div class="restaurent-schdule">
                        <div class="card">
                            <div class="card-header text-light-white fw-700 fs-16">Hours</div>
                            <div class="card-body">
                                <div class="schedule-box">
                                    <div class="day text-light-black">Monday</div>
                                    <div class="time text-light-black">Delivery: 7:00am - 10:59pm</div>
                                </div>
                                <div class="collapse" id="schdule">
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Tuesday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Wednesday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Thursday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                    <div class="schedule-box">
                                        <div class="day text-light-black">Friday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
									    <div class="schedule-box">
                                        <div class="day text-light-black">Saturday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                        <div class="schedule-box">
                                        <div class="day text-light-black">Sunday</div>
                                        <div class="time text-light-black">Delivery: 7:00am - 10:00pm</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer"> <a class="fw-500 collapsed" data-toggle="collapse" href="#schdule">See the full schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- restaurent about -->
    <!-- map gallery -->
    {{-- <div class="map-gallery-sec section-padding bg-light-theme smoothscroll" id="mapgallery">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="main-box">
                        <div class="row">
                            <div class="col-md-6 map-pr-0">
                                <iframe id="locmap" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                            <div class="col-md-6 map-pl-0">
                                <div class="gallery-box padding-10">
                                    <ul class="gallery-img">
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-1.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-1.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-2.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-2.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-3.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-3.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-4.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-4.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-5.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-5.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                        <li>
                                            <a class="image-popup" href="assets/img/gallery/img-6.jpg" title="Image title">
                                                <img src="assets/img/gallery/img-6.jpg" class="img-fluid full-width" alt="9.jpg" />
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- map gallery -->
    <!-- restaurent reviews -->
    <section class="section-padding restaurent-review smoothscroll" id="review">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header-left">
                        <h3 class="text-light-black header-title title">Reviews for {{$value->name}}</h3>
                    </div>
                    <div class="restaurent-rating mb-xl-20">
                        @if($getMax == 1)
                        <div class="rating"> 
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @elseif($getMax == 2)
                        <div class="rating"> 
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @elseif($getMax == 3)
                        <div class="rating"> 
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @elseif($getMax == 4)
                        <div class="rating"> 
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @elseif($getMax == 5)
                        <div class="rating"> 
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @else
                        <div class="rating"> 
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                        </div><span class="text-light-black fs-12 rate-data">{{$countReview}} ratings</span>
                        @endif
                    </div>
                    {{-- Adding Review --}}
                    <div class="row">
                        <div class="col-md-6">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header"> <a class="collapsed card-link fw-500 fs-14" data-toggle="collapse" href="#collapseTwo">Write a Review</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                        <div class="card-body no-padding payment-option-tab p-2">
                                            <form method="get" name="frmRate">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="head-rating">
                                                        <div class="rating rateUs"> 
                                                        <span class="pr-3">Rate: </span>
                                                        <span class="fs-16 text-dark-white" id="star1">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="fs-16 text-dark-white" id="star2">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="fs-16 text-dark-white" id="star3">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="fs-16 text-dark-white" id="star4">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                        <span class="fs-16 text-dark-white" id="star5">
                                                          <i class="fas fa-star"></i>
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" id="username" name="username" placeholder="Your name" required>
                                                    <input class="form-control" type="hidden" name="productid" value="{{$value->productid}}" required>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" id="message" type="text" name="message" placeholder="Shot review message" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button class="btn-second btn-submit" type="submit">Add Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                    </div>
                    <h5 class="text-light-black mb-xl-20 mt-3">Here's what people are saying:</h5>
                    <div class="u-line"></div>
                </div>
                <div class="col-md-12">
                    @if($countReview > 0)
                        @foreach ($getReview as $show)
                        <div class="review-box">
                            <div class="review-user">
                                <div class="review-user-img">
                                    <img src="{{asset('images/default.png')}}" class="rounded-circle" alt="#" style="width: 40px">
                                    <div class="reviewer-name">
                                        <p class="text-light-black fw-600">{{$show->username}}
                                            {{-- <small class="text-light-white fw-500">New York, (NY)</small> --}}
                                        </p> <i class="fas fa-trophy text-black"></i><span class="text-light-black">Top Reviewer</span>
                                    </div>
                                </div>
                                <div class="review-date"> <span class="text-light-white">{{date('D, d M, Y.', strtotime($show->created_at))}}</span>
                                </div>
                            </div>
                            <div class="ratings"> <span class="fs-16">
                                @if($getMax == 1)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            </div>
                            @elseif($getMax == 2)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            </div>
                            @elseif($getMax == 3)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            </div>
                            @elseif($getMax == 4)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            </div>
                            @elseif($getMax == 5)
                            <div class="rating"> 
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-yellow"><i class="fas fa-star"></i></span>
                            </div>
                            @else
                            <div class="rating"> 
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                                <span class="fs-16 text-dark-white"><i class="fas fa-star"></i></span>
                            </div>
                            @endif
                            </div>
                            <p class="text-light-black">{{$show->message}}</p>
                        </div>
                        @endforeach
                    @else
                    <div class="mt-4 mb-4">
                        <h4 class="text-danger">No Review for this Product Yet</h4>
                    </div>
                    @endif
                </div>
                <div class="col-12">
                    <div class="review-img">
                        <img src="{{asset('assets/img/review-footer.png')}}" class="img-fluid" alt="#">
                        <div class="review-text">
                            <h2 class="text-light-white mb-2 fw-600">Be one of the first to review</h2>
                            <p class="text-light-white">Order now and write a review to give others the inside scoop.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent reviews -->
    <!-- offer near -->
    @include('template.offer')
    <!-- offer near -->
@endsection
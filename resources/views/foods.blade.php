@extends('template.layout')
@section('content')
<?php
use App\Models\rating;
?>
<section class="checkout-page section-padding bg-light-theme">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="history-title mb-md-40">
                    <h2 class="text-light-black">Food<span class="text-light-green">Varities</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($product as $show)
            <div class="col-lg-3 col-md-6 col-sm-6">
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
        </div>
    </div>
</section>
<!-- offer near -->
@include('template.offer')
<!-- offer near -->
@endsection
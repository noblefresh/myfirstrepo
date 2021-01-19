@extends('template.layout')
@section('content')
<section class="register-restaurent-sec section-padding bg-light-theme">
    <div class="container-fluid">
        <?php
        use App\Models\customer;
        use App\Models\fee;

        $getFee = fee::orderBy('id','DESC')->limit(1)->get();
        foreach ($getFee as $fee);
        ?>
        @auth
        <?php
        $authId = Auth::user()->customerid;
        $getCustomer = customer::where('id',$authId)->get();
        ?>
        @endauth
        <div class="row">
            <div class="col-lg-9">
                <div class="sidebar-tabs main-box padding-20 mb-md-40">
                    <div id="add-restaurent-tab" class="step-app">
                        <div class="row">
                            <div class="col-xl-4 col-lg-5 mb-md-40">
                                <ul class="step-steps steps-1">
                                    <li class="stepbtn active" id="step1">
                                        <a href="#"> <span class="number"></span>
                                            <span class="step-name">Delivery Info</span>
                                        </a>
                                    </li>
                                    <li class="stepbtn" id="step2">
                                        <a href="#"> <span class="number"></span>
                                            <span class="step-name">Order Review</span>
                                        </a>
                                    </li>
                                    <li class="stepbtn" id="step3">
                                        <a href="#"> <span class="number"></span>
                                            <span class="step-name">Payment</span>
                                        </a>
                                    </li>
                                    <li class="stepbtn" id="step4">
                                        <a href="#"> <span class="number"></span>
                                            <span class="step-name">Preview</span>
                                        </a>
                                    </li>
                                </ul>
                                @auth
                               
                                @else
                                <ul class="step-steps steps-2">
                                    <div class="form-group ml-3 mt-3">
                                        <input type="checkbox" id="return_user" />
                                        <label class="text-light-black fw-700" for="return_user">Returning Customer</label>
                                    </div>
                                    <div class="row ml-3" id="login_option" style="display: none;">
                                        <div class="col-12">
                                            <h6 class="text-light-black fw-700">Grant Access</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{route('signin')}}" class="btn btn-primary">Sign-in</a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <li class="add-res-tab active" id="stepbtn1"> <a href="#" class="add-res-tab">Delivery Info</a>
                                    </li>
                                    <li class="add-res-tab" id="stepbtn2"> <a href="#" class="add-res-tab">Order Review</a>
                                    </li>
                                    <li class="add-res-tab" id="stepbtn3"> <a href="#" class="add-res-tab">Payment</a>
                                    </li>
                                    <li class="add-res-tab" id="stepbtn4"> <a href="#" class="add-res-tab">Preview</a>
                                    </li> --}}
                                </ul> 
                                @endauth
                                {{-- <div class="step-footer">
                                    <button class="btn-first white-btn none" id="prev-1">Previous</button>
                                    <button class="btn-first white-btn none" id="prev-2">Previous</button>
                                    <button class="btn-first white-btn none" id="prev-3">Previous</button>
                                    <button class="btn-first white-btn" id="next-1">Next</button>
                                    <button class="btn-first white-btn none" id="next-2">Next</button>
                                    <button class="btn-first white-btn none" id="next-3">Next</button>
                                    <button class="btn-first white-btn none" id="finish-1">Finish</button>
                                </div> --}}
                            </div>
                            <div class="col-xl-8 col-lg-7">
                                <div class="step-content">
                                    <div class="step-tab-panel active" id="steppanel1">
                                        <div class="Delivery-sec">
                                            <form method="POST" action="{{url('/create_customer')}}">
                                                @csrf
                                                {{-- If User is Authenticated --}}
                                                @auth
                                                    @foreach ($getCustomer as $value)
                                                        
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-light-black fw-700">Delivery Information</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <i>{{ $value->name }}</i><br>
                                                                <i>{{ $value->email }}</i><br>
                                                                <i>{{ $value->phone }}</i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="u-line mb-xl-20"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-light-black fw-700">Location</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Address 1 <sup class="fs-16">*</sup></label>
                                                                <input type="text" name="address1" class="form-control form-control-submit" value="{{ $value->address1 }}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Address 2 </label>
                                                                <input type="text" name="address2" class="form-control form-control-submit" value="{{ $value->address2 }}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">City <sup class="fs-16">*</sup></label>
                                                                <input type="text" name="city" class="form-control form-control-submit" value="{{ $value->city }}" required readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">State <sup class="fs-16">*</sup></label>
                                                                <select class="form-control form-control-submit custom-select-2 full-width"name="state" required readonly="true">
                                                                    <option value="{{ $value->state }}">{{ $value->state }}</option>
                                                                    <option value="Enugu">Enugu</option>
                                                                    <option value="Lagos">Lagos</option>
                                                                    <option value="Abuja">Abuja</option>
                                                                    <option value="Rivers State">Rivers State</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <a href="{{url('/save_order2/'.$value->id)}}" id="saveorder2" class="btn btn-primary">Save</a>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="amount" value="{{$total}}">
                                                    <input type="hidden" id="email" value="{{$value->email}}">
                                                    <input type="hidden" id="number" value="{{$value->phone}}">
                                                    @endforeach
                                                @else
                                                {{-- If Not Authenticated User --}}
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-light-black fw-700">Delivery Information</h5>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">First name <sup class="fs-16">*</sup>
                                                                </label>
                                                                <input type="text" name="fname" class="form-control form-control-submit" placeholder="i.e Joe" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Last name <sup class="fs-16">*</sup></label>
                                                                <input type="text" name="lname" class="form-control form-control-submit" placeholder="i.e Buy" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Contact Email <sup class="fs-16">*</sup></label>
                                                                <input type="email" id="email" name="email" class="form-control form-control-submit" placeholder="i.e joe@example.com" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Contact Phone <sup class="fs-16">*</sup></label>
                                                                <input type="text" id="number" name="phone" class="form-control form-control-submit" placeholder="i.e +234 804 874 9483" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="u-line mb-xl-20"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h5 class="text-light-black fw-700">Location</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Address 1 <sup class="fs-16">*</sup></label>
                                                                <input type="text" name="address1" class="form-control form-control-submit" placeholder="i.e 65 Joebuy Street, Lekki Phase 1" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">Address 2 </label>
                                                                <input type="text" name="address2" class="form-control form-control-submit" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">City <sup class="fs-16">*</sup></label>
                                                                <input type="text" name="city" class="form-control form-control-submit" placeholder="i.e Lagos" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700">State <sup class="fs-16">*</sup></label>
                                                                <select class="form-control form-control-submit custom-select-2 full-width"name="state" required>
                                                                    <option value="">Select State</option>
                                                                    <option value="Enugu">Enugu</option>
                                                                    <option value="Lagos">Lagos</option>
                                                                    <option value="Abuja">Abuja</option>
                                                                    <option value="Rivers State">Rivers State</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="checkbox" name="save_details" id="save_details" />
                                                                <label class="text-light-black fw-700" for="save_details">Save my details for later</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="login_opt" style="display: none;">
                                                        <div class="col-12">
                                                            <h5 class="text-light-black fw-700">Login Details</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="text-light-black fw-700" for="password">Password</label>
                                                                <input type="password" name="password" id="password" class="form-control form-control-submit" placeholder="Enter a preferred password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <button id="saveorder" type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                @endauth
                                            </form>
                                            <div class="step-footer">
                                                <button class="btn-first white-btn" id="next-1">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel" id="steppanel2">
                                        <div class="package-sec">
                                            <div class="row">
                                                <div class="col-lg-12">
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
                                                    $Cart = cart::where('ip',$ip)->get();
                                                    $countCart = count($Cart);

                                                    $subtotal = 0;
                                                    ?>
                                                    
                                                    <div class="ms-panel">
                                                        <div class="ms-panel-header">
                                                          <h6>Order Review</h6>
                                                        </div>
                                                        <div class="ms-panel-body">
                                                          <div class="table-responsive">
                                                            <table class="table table-hover thead-primary">
                                                              <thead style="background-color:red; color:#ffffff">
                                                                <tr>
                                                                  <th scope="col">Image</th>
                                                                  <th scope="col">Item Name</th>
                                                                  <th scope="col">Qty</th>
                                                                  <th scope="col">Price</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                @foreach ($Cart as $item)
                                                                <tr>
                                                                  <th scope=""><img src="{{asset('/productImages/'.$item->product->image)}}" class="img-fluid" style="width: 70px" alt="#"></th>
                                                                  <td>{{$item->product->name}}</td>
                                                                  <td>{{$item->qty}}</td>
                                                                  <td>&#8358;{{number_format(($item->qty * $item->product->amount),2)}}</td>
                                                                </tr>
                                                                <?php $subtotal += $item->qty * $item->product->amount;?>
                                                                @endforeach
                                                                <?php $total = $subtotal + $fee->vat + $fee->deliveryfee + $fee->drivetip?>
                                                              </tbody>
                                                              <input type="hidden" id="amount" value="{{$total}}">
                                                            </table>
                                                            <div class="product-right-col">
                                                                <div class="product-list-details mt-2">
                                                                    <span class="text-black fw-600">Subtotal: <span class="" style="float:right">&#8358;{{ number_format($subtotal,2) }}</span></span><br>
                                                                <span class="text-black fw-600">Vat: <span class="" style="float:right">&#8358;{{ number_format($fee->vat,2) }}</span></span><br>
                                                                <span class="text-black fw-600">Delivery Fess: <span class="" style="float:right">&#8358;{{ number_format($fee->deliveryfee,2) }}</span></span><br>
                                                                <span class="text-black fw-600">Drive Tip: <span class="" style="float:right">&#8358;{{ number_format($fee->drivetip,2) }}</span></span><br>
                                                                <h6 class="text-light-black fw-600">Total: <span class="text-success" style="float:right">&#8358;{{ number_format($total, 2) }}</span></h6>
                                                                </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-nd-12 p-3">
                                                    <div class="step-footer">
                                                        <button class="btn-first white-btn none" id="prev-1">Previous</button>
                                                        <button class="btn-first white-btn none" id="prev-2">Previous</button>
                                                        <button class="btn-first white-btn none" id="prev-3">Previous</button>
                                                        <button class="btn-first white-btn none" id="next-2">Next</button>
                                                        <button class="btn-first white-btn none" id="next-3">Next</button>
                                                        <button class="btn-first white-btn none" id="finish-1">Finish</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel" id="steppanel3">
                                        <div class="payment-sec">
                                            <div class="section-header-left">
                                                <h3 class="text-light-black header-title">Payment</h3>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="accordion">
                                                        <div class="payment-option-tab">
                                                            <div class="tab-content">
                                                                <div class="form-group">
                                                                    <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
                                                                    <button id="pay" class="btn-first green-btn text-custom-white full-width fw-500">Place Your Order</button>
                                                                </div>
                                                                {{-- <button class="btn btn-primary" id="process_order">Click here</button> --}}
                                                                <p class="text-center text-light-black no-margin">By placing your order, you agree to Quickmunch's <a href="#">terms of use</a> and <a href="#">privacy agreement</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-nd-12 p-3">
                                                    <div class="step-footer">
                                                        <button class="btn-first white-btn none" id="prev-2">Previous</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="step-tab-panel" id="steppanel4">
                                        <div class="thankmsg-sec">
                                            <div class="msg-wrapper text-center">
                                                <div class="wrapper-1">
                                                    <h1 class="text-success mb-2">Thank You</h1>
                                                    <h3 class="text-dark-white">You have successfully created your restaurant, to add more details, go to your email inbox for login details</h3>
                                                </div>
                                                <div class="row text-left">
                                                    <div class="col-lg-6">
                                                        <div class="product-box mb-xl-20">
                                                            <div class="product-img">
                                                                <a href="restaurant.html">
                                                                    <img src="assets/img/package/shop-2.jpg" class="img-fluid full-width" alt="product-img">
                                                                </a>
                                                                <div class="overlay">
                                                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                                                        <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                                                                        </span>
                                                                        <div class="custom-tag"> <span class="text-custom-white rectangle-tag bg-gradient-red">
                                                                                    10%
                                                                                </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-caption">
                                                                <div class="title-box">
                                                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Great Burger</a></h6>
                                                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-yellow">
                                                                        3.1
                                                                        </span>
                                                                    </div>
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
                                                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/004-leaf.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/006-chili.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/005-chef.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/008-protein.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/009-lemon.svg" alt="tag">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="product-box mb-xl-20">
                                                            <div class="product-img">
                                                                <a href="restaurant.html">
                                                                    <img src="assets/img/package/shop-1.jpg" class="img-fluid full-width" alt="product-img">
                                                                </a>
                                                                <div class="overlay">
                                                                    <div class="product-tags padding-10"> <span class="circle-tag">
                                                                            <img src="assets/img/svg/013-heart-1.svg" alt="tag">
                                                                            </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-caption">
                                                                <div class="title-box">
                                                                    <h6 class="product-title"><a href="restaurant.html" class="text-light-black "> Flavor Town</a></h6>
                                                                    <div class="tags"> <span class="text-custom-white rectangle-tag bg-red">
                                                                        2.1
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <p class="text-light-white">Breakfast, Lunch &amp; Dinner</p>
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
                                                                <div class="product-footer"> <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/007-chili-1.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/004-leaf.svg" alt="tag">
                                                                    </span>
                                                                    <span class="text-custom-white square-tag">
                                                                        <img src="assets/img/svg/009-lemon.svg" alt="tag">
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-light-black">For cancellation or more information Please Contact Us</p>
                                                <ul class="contact-details">
                                                    <li> <i class="fas fa-phone-alt text-light-black"></i>
                                                        <span><a href="tel:" class="text-light-black">(347) 123456789</a></span>
                                                    </li>
                                                    <li> <i class="fas fa-fax text-light-black"></i>
                                                        <span><a href="tel:" class="text-light-black">(347) 123456789</a></span>
                                                    </li>
                                                    <li> <i class="far fa-envelope text-light-black"></i>
                                                        <span><a href="mailto:" class="text-light-black">demo@domain.com</a></span>
                                                    </li>
                                                </ul>
                                                <button class="btn-first white-btn">Preview</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                {{-- Sidebar Start --}}
                @include('template.sidebar')
                {{-- Sidebar Ends --}}
            </div>
        </div>
    </div>

</section>
@endsection
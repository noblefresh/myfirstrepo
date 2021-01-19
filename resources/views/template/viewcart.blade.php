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
    {{-- <div class="sort-tag-filter padding-15">
        <div class="restaurent-tags"> <span class="tags">open now <span class="close">x</span></span> <span class="tags">new <span class="close">x</span></span>
        </div>
    </div> --}}
    <div class="section-header-left mt-4">
        <h3 class="text-light-black header-title title-2">Your Cart Items</h3>
    </div>
    @foreach ($Cart as $item)
    <div class="product-list-view mt-2">
        <div class="product-list-info">
            <div class="product-list-img">
                <a href="#">
                    <img src="{{asset('/productImages/'.$item->product->image)}}" class="img-fluid" alt="#">
                </a>
            </div>
        </div>
        <div class="product-right-col">
            <div class="product-list-details">
                <div class="product-list-title">
                    <div class="product-info">
                        <h6><a href="{{url('/showproduct/'.$item->product->productid)}}" class="text-light-black fw-600">{{$item->product->name}}</a></h6>
                        <p class="text-light-white fs-12">{{$item->product->type}}</p>
                    </div>
                </div>
                <div class="product-detail-right-box">
                    <div class="product-list-rating text-center">
                        <div class="ratings"> <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star"></i></span>
                            <span class="text-yellow"><i class="fas fa-star-half-alt"></i></span>
                        </div>
                        <div class="rating-text">
                            <p class="text-light-white fs-12">3845 ratings</p>
                        </div>
                    </div>
                    <div class="product-list-tags"> 
                        <span class="text-custom-white rectangle-tag bg-gradient-red delitem" id="{{$item->id}}"><i class="far fa-trash-alt"></i></span>
                        <span class="rectangle-tag bg-gradient-green text-custom-white">Qty: {{$item->qty}}</span>
                    </div>
                    <div class="product-price-icon"> 
                        <p class="text-success">&#8358;{{number_format(($item->qty * $item->product->amount),2)}}</p>
                    </div>
                    
                </div>
            </div>
            <div class="product-list-bottom">
                <div class="product-list-type"> <span class="text-light-white new">New</span>
                    <span class="text-custom-white square-tag"><img src="assets/img/svg/004-leaf.svg" alt="tag"></span>
                    <span class="text-custom-white square-tag"><img src="assets/img/svg/006-chili.svg" alt="tag"></span>
                    <span class="text-custom-white square-tag"><img src="assets/img/svg/005-chef.svg" alt="tag"></span>
                    <span class="text-custom-white square-tag"><img src="assets/img/svg/008-protein.svg" alt="tag"></span>
                    <span class="text-custom-white square-tag"><img src="assets/img/svg/009-lemon.svg" alt="tag"></span>
                </div>
                <div class="mob-tags-label"> <span class="text-custom-white rectangle-tag bg-gradient-red delitem" id="{{$item->id}}"><i class="far fa-trash-alt"></i></span>
                    <span class="rectangle-tag bg-gradient-green text-custom-white">Qty: {{$item->qty}}</span>
                </div>
                <div class="product-list-time"> 
                    <span class="circle-tag"><img src="assets/img/svg/013-heart-1.svg" alt="tag"></span>
                </div>
            </div>
        </div>
    </div>
    <?php $subtotal += $item->qty * $item->product->amount ?>
    @endforeach
    <div class="product-right-col">
        <div class="product-list-details mt-2">
        <h6 class="text-light-black fw-600">subtotal: <span class="text-success" style="float:right">&#8358;{{ number_format($subtotal, 2) }}</span></h6>
        </div>
    </div>
    <div class="product-right-col">
        <div class="product-list-details mt-5 text-center">
            <a href="#" class="btn btn-warning">Continue Shopping</a>
            <a href="{{route('process_checkout')}}" class="btn btn-success bg-success text-light">Checkout</a>
        </div>
    </div>
   
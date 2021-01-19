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
    ?>
    <div class="card-header padding-15">Your Order
        @if($countCart > 0)
        <span style="float:right; cursor:pointer; color:red" id="{{$ip}}" class="clearCart">Clear Cart</span>
        @else
        
        @endif
    </div>
        @if($countCart > 0)
            <div class="card-body no-padding" style="overflow-y: auto">
                @foreach ($Cart as $item)
                <div class="cat-product-box">
                    <div class="cat-product">
                        <div class="cat-name">
                            <a href="#">
                                <p class="text-light-green"><span class="text-dark-white">{{ $item->qty }}</span> {{ $item->product->name }} </p> <span class="text-light-white">{{ $item->product->type }}</span>
                            </a>
                        </div>
                        <div class="delete-btn">
                            <a href="#" id="{{ $item->id }}" class="text-dark-white delitem"> <i class="far fa-trash-alt"></i>
                            </a>
                        </div>
                        <div class="price"> <a href="#" class="text-dark-white fw-500">&#8358;{{number_format(($item->qty * $item->product->amount),2)}}</a>
                        </div>
                    </div>
                </div>
                <?php $subtotal += $item->qty * $item->product->amount ?>
                @endforeach
                <div class="item-total">
                    <div class="total-price border-0"> <span class="text-dark-white fw-700">Items subtotal: </span>
                        <span class="text-dark-white fw-700">&#8358;{{ number_format($subtotal, 2) }}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer padding-15">
                <a href="{{route('view-cart')}}" class="btn-first bg-danger text-custom-white ">View Cart</a> 
                <a href="{{route('process_checkout')}}" class="btn-first green-btn text-custom-white ">Checkout</a>
            </div>
        @else
            <div class="total-price border-0 m-3"> <span class="text-dark-white fw-700">
                No Item In Cart
            </div>
        @endif
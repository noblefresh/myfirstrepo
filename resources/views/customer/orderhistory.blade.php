@extends('template.layout')
@section('content')
    <?php
    use App\Models\order;
    $order = order::where('customerid',Auth::user()->customerid)->orderBy('id','DESC')->get();
    // $countCart = count($Cart);
    ?>
    @auth
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-light-black fw-600 p-3 bg-danger text-light shadow">MY ACCOUNT</h5>
                    <div class="tracking-sec">
                        <div class="tracking-details padding-20 p-relative">
                            <h5 class="text-light-black fw-600 p-3 bg-dark text-light">My Order History</h5>
                            <div class="ml-3">
                                @if(count($order) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover thead-primary">
                                        <thead style="background-color:red; color:#ffffff">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order as $item)
                                            <tr>
                                                <td>{{$item->orderid}}</td>
                                                <td>Not Set</td>
                                                <td>{{date('d M, Y'), strtotime($item->created_at)}}</td>
                                                <td><a href="{{url('/fetch_order_history/'.$item->orderid)}}" class="btn btn-danger text-light"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div>
                                    <h5 class="m-3 text-danger">No History</h5>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="tracking-map">
                            <img src="{{asset('images/product.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endauth
    <!-- offer near -->
    @include('template.offer')
    <!-- offer near -->
@endsection
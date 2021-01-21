@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
    <div class="row">

      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>

          </ol>
        </nav>
        
        <div class="row">
          <div class="col-md-12">
            <div class="ms-nav-item ms-search-form pb-0 py-0 mb-4" style="text-align: right">
              <form class="ms-form" method="post">
                <div class="ms-form-group my-0 mb-0 has-icon fs-14">
                  <input type="search" class="ms-form-input bg-light" name="searchorder" placeholder="Search order..." value=""> <i class="flaticon-search text-disabled"></i>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6> Order List</h6>
            </div>
            <div class="ms-panel-body">

              <div class="table-responsive">
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Location</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody id="order_items">
                    @foreach ($order as $item)
                    <tr>
                      <th scope="row">{{$item->orderid}}</th>
                      <td>{{$item->product->name}}</td>
                      <td> {{$item->customer->name}}</td>
                      <?php
                          $string = $item->customer->address1;
                          if (strlen($string) > 20) {
                              $stringCut = substr($string, 0, 20);
                              $endPoint = strrpos($stringCut, ' ');
                              $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                              // $string .= '<a style="cursor: pointer;" href="" >Read More</a>';
                          }
                          // echo $string;
                      ?>
                      <td> {{$string}}</td>
                      @if($item->status == 'processing')
                      <td><span class="badge badge-primary">Processing</span></td>
                      @elseif($item->status == 'delivered')
                      <td><span class="badge badge-success">Delivered</span></td>
                      @else
                      <td><span class="badge badge-dark">Cancelled</span></td>
                      @endif
                      <td>&#8358;{{number_format(($item->product->amount),2)}}</td>
                      <td><a href="{{url('/orderinvoice/'.$item->orderid)}}" class=""><i class="fas  fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- PAGINATE LINK -->
    <div class="container pt-3">
      <div class="row mt-3">
          <div class="col-md">{{$order->links()}}</div>
      </div>
    </div>
    </div>
  </div>
@endsection
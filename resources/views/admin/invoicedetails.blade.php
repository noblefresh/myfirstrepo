@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
  <?php
  use App\Models\fee;
  $getFee = fee::orderBy('id','DESC')->limit(1)->get();
  foreach ($getFee as $fee);
  $subtotal = 0;
  ?>
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Invoice</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
          </ol>
        </nav>
        <div class="ms-panel">
          @foreach ($order as $key => $item)
          @if($key == 0 )
          <?php 
          $name = $item->customer->name;
          $email = $item->customer->email;
          $address1 = $item->customer->address1;
          $address2 = $item->customer->address2;
          $phone = $item->customer->phone;
          $city = $item->customer->city;
          $state = $item->customer->state;
          $datetimecreated = $item->created_at;
          $status = $item->status;
          $orderid = $item->orderid;
          ?>
          @endif
          @endforeach
          <div class="ms-panel-header header-mini">
            <div class="d-flex justify-content-between">
              <h6>Invoice</h6>
              <h6>#{{$orderid}}</h6>
            </div>
          </div>
          <div class="ms-panel-body">
            <!-- Invoice To -->
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="invoice-address">
                  <h3>Reciever: </h3>
                  <h5>{{$name}}</h5>
                  <p class="mb-0">{{$email}}</p>
                  <p class="mb-0">{{$phone}}</p>
                  <p class="mb-0">{{$address1}}</p>
                  <p class="mb-0">{{$address2}}</p>
                  <p class="mb-0">{{$city}}</p>
                  <p>{{$state}}</p>
                </div>
              </div>
              <div class="col-md-6 text-md-right">
                <ul class="invoice-date">
                  <li>Invoice Date : {{date('D, M d Y', strtotime($datetimecreated))}}</li>
                  <li>Order Status : <strong class="p-1 bg-danger text-light" style="text-transform: uppercase">{{$status}}</strong></li>
                </ul>
              </div>
            </div>
            <!-- Invoice Table -->
            <div class="ms-invoice-table table-responsive mt-5">
              <table class="table table-hover text-right thead-light">
                <thead>
                  <tr class="text-capitalize">
                    <th class="text-center w-5">id</th>
                    <th class="text-left">description</th>
                    <th>qty</th>
                    <th>Unit Cost</th>
                    <th>total</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($order as $item)
                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-left">{{$item->product->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>&#8358;{{number_format(($item->product->amount),2)}}</td>
                    <?php $itemsTotalCots = $item->qty * $item->product->amount?>
                    <td>&#8358;{{number_format(($itemsTotalCots),2)}}</td>
                  </tr>
                  <?php $subtotal += $item->qty * $item->product->amount ?>
                  @endforeach
                  <?php $total = $subtotal + $fee->vat + $fee->deliveryfee + $fee->drivetip?>
                </tbody>
              </table>
              <div class="price-table u-line" style="float:right; margin-right:15px">
                <div class="item"> <span class="text-light-white ">Item subtotal:</span>
                    <span class="text-light-white" style="float:right">&#8358;{{ number_format($subtotal,2) }}</span>
                </div>
                <div class="item"> <span class="text-light-white" style="padding-right:110px">Vat:</span>
                    <span class="text-light-white" style="float:right">&#8358;{{ number_format($fee->vat,2) }}</span>
                </div>
                <div class="item"> <span class="text-light-white ">Delivery fee:</span>
                    <span class="text-light-white" style="float:right">&#8358;{{ number_format($fee->deliveryfee,2) }}</span>
                </div>
                <div class="item"> <span class="text-light-white ">Driver tip:</span>
                    <span class="text-light-white" style="float:right">&#8358;{{ number_format($fee->drivetip,2) }}</span>
                </div>
                <div class="item"><b> <span class="text-light-white">Total:</span>
                  <span class="text-light-white" style="float:right">&#8358;{{ number_format($total,2) }}</span></b>
                </div>
            </div>
            </div>
            <div class="invoice-buttons text-right"> 
                @if($status != 'delivered' && $status != 'cancelled')
                <a href="{{url('/deliver/'.$orderid)}}" class="btn btn-primary mr-2">Delivered</a>
                <a href="{{url('/cancelled/'.$orderid)}}" class="btn btn-primary mr-2">Cancel Order</a>
                @elseif($status != 'cancelled')
                <a href="{{url('/cancelled/'.$orderid)}}" class="btn btn-primary mr-2">Cancel Order</a>
                @elseif($status == 'cancelled')
                <a href="{{url('/deliver/'.$orderid)}}" class="btn btn-primary mr-2">Delivered</a>
                @elseif($status == 'processing')
                <a href="{{url('/cancelled/'.$orderid)}}" class="btn btn-primary mr-2">Cancel Order</a>
                @endif
                {{-- @if($status == 'can') --}}
                {{-- <a href="#" class="btn btn-primary mr-2">Cancel Order</a> --}}
                <a href="{{url('/print/'.$orderid)}}" class="btn btn-primary">Print Invoice</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
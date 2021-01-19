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

        <div class="col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-header">
              <h6>Favourite Orders</h6>
            </div>
            <div class="ms-panel-body order-circle">

              <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <h6 class="text-center">Pizza</h6>
                  <div class="progress-rounded progress-round-tiny">

                    <div class="progress-value">12%</div>
                    <svg>
                      <circle class="progress-cicle bg-success animated" cx="65" cy="65" r="57" stroke-width="4" fill="none" aria-valuenow="12" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" role="slider" style="stroke-dashoffset: 315.165px;">
                      </circle>
                    </svg>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                      <h6 class="text-center">Mexican Noodels</h6>
                  <div class="progress-rounded progress-round-tiny">
                    <div class="progress-value">38.8%</div>
                    <svg>
                      <circle class="progress-cicle bg-primary animated" cx="65" cy="65" r="57" stroke-width="4" fill="none" aria-valuenow="38.8" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" role="slider" style="stroke-dashoffset: 219.183px;">
                      </circle>
                    </svg>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <h6 class="text-center">Spicy Salad</h6>
                  <div class="progress-rounded progress-round-tiny">
                    <div class="progress-value">78.8%</div>
                    <svg>
                      <circle class="progress-cicle bg-secondary animated" cx="65" cy="65" r="57" stroke-width="4" fill="none" aria-valuenow="78.8" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" role="slider" style="stroke-dashoffset: 75.926px;">
                      </circle>
                    </svg>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <h6 class="text-center">French Fries</h6>
                  <div class="progress-rounded progress-round-tiny">
                    <div class="progress-value">100%</div>
                    <svg>
                      <circle class="progress-cicle bg-dark animated" cx="65" cy="65" r="57" stroke-width="4" fill="none" aria-valuenow="100" aria-orientation="vertical" aria-valuemin="0" aria-valuemax="100" role="slider" style="stroke-dashoffset: 0px;">
                      </circle>
                    </svg>
                  </div>
                </div>
              </div>
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
                      <th scope="col">Order Name</th>
                      <th scope="col">Customer Name</th>
                      <th scope="col">Location</th>
                      <th scope="col">Order Status</th>
                      <th scope="col">Price</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
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
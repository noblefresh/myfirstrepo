@extends('layouts.app')

@section('content')
<div class="ms-content-wrapper">
  <?php
  use App\Models\order;
  use App\Models\user;
  use App\Models\Customer;
  use App\Models\product;
  $orderRequest = order::orderBy('id','DESC')->limit(4)->get();
  $order = order::orderBy('id','DESC')->limit(10)->get();
  $totalOrder = order::all();
  $getTotalOrder = count($totalOrder);
  $totalUser = user::all();
  $getTotalUser = count($totalUser);
  $totalCustomer = customer::all();
  $getTotalCustomer = count($totalCustomer);
  $totalProduct = product::all();
  $getTotalProduct = count($totalProduct);
  ?>
  <div class="row">
    <div class="col-md-12">
      <h1 class="db-header-title">Welcome, {{Auth::user()->name}}</h1>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        {{-- <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 3.2%</span> --}}
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Total Product</strong></span>
            <h2>{{$getTotalProduct}}</h2>
          </div>
        </div>
        <canvas id="line-chart"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        {{-- <span class="ms-chart-label bg-red"><i class="material-icons">arrow_downward</i> 4.5%</span> --}}
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Total Customers</strong></span>
            <h2>{{$getTotalCustomer}}</h2>
          </div>
        </div>
        <canvas id="line-chart-2"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        {{-- <span class="ms-chart-label bg-black"><i class="material-icons">arrow_upward</i> 12.5%</span> --}}
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Authenticated Users</strong></span>
            <h2>{{$getTotalUser}}</h2>
          </div>
        </div>
        <canvas id="line-chart-3"></canvas>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
      <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">
        {{-- <span class="ms-chart-label bg-red"><i class="material-icons">arrow_upward</i> 9.5%</span> --}}
        <div class="ms-card-body media">
          <div class="media-body">
            <span class="black-text"><strong>Total Orders</strong></span>
            <h2>{{$getTotalOrder}}</h2>
          </div>
        </div>
        <canvas id="line-chart-4"></canvas>
      </div>
    </div>
    <!-- Recent Orders Requested -->
    <div class="col-xl-6 col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <div class="d-flex justify-content-between">
            <div class="align-self-center align-left">
              <h6>Recent Orders Requested</h6>
            </div>
            <a href="{{route('orders')}}" type="button" class="btn btn-primary">View All</a>
          </div>
        </div>
        <div class="ms-panel-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">Food Item</th>
                  <th scope="col">Price</th>
                  <th scope="col">Product ID</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orderRequest as $item)
                <tr>
                  <td class="ms-table-f-w"> <img src="{{asset('/productImages/'.$item->product->image)}}" alt="people"> {{$item->product->name}} </td>
                  <td>&#8358;{{number_format(($item->product->amount),2)}}</td>
                  <td>{{$item->product->productid}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-12">
      <div class="ms-panel ms-panel-fh">
        <div class="ms-panel-header new">
          <h6>Monthly Revenue</h6>
          <select class="form-control new" id="exampleSelect">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March </option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="1">June</option>
            <option value="2">July</option>
            <option value="3">August</option>
            <option value="4">September</option>
            <option value="5">October</option>
            <option value="4">November</option>
            <option value="5">December</option>
          </select>
        </div>
        <div class="ms-panel-body">
          <span class="progress-label"> <strong>Week 1</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
          </div>
          <span class="progress-label"> <strong>Week 2</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
          </div>
          <span class="progress-label"> <strong>Week 3</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
          </div>
          <span class="progress-label"> <strong>Week 4</strong> </span>
          <div class="progress">
            <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
          </div>
        </div>
      </div>
    </div>
    <!-- Food Orders -->
    <div class="col-md-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Trending Orders</h6>
        </div>
        <div class="ms-panel-body">
          <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="admin/img/costic/food-5.jpg" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Meat Stew</h6>
                    <span class="green-text"><strong>$25.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">15</span></p>
                    <p>Income <span class="red-text">$175</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="admin/img/costic/food-2.jpg" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Pancake</h6>
                    <span class="green-text"><strong>$50.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">75</span></p>
                    <p>Income <span class="red-text">$275</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="admin/img/costic/food-4.jpg" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Burger</h6>
                    <span class="green-text"><strong>$45.00</strong></span>
                  </div>

                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">85</span></p>
                    <p>Income <span class="red-text">$575</span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
              <div class="ms-card no-margin">
                <div class="ms-card-img">
                  <img src="admin/img/costic/food-3.jpg" alt="card_img">
                </div>
                <div class="ms-card-body">
                  <div class="ms-card-heading-title">
                    <h6>Saled</h6>
                    <span class="green-text"><strong>$85.00</strong></span>
                  </div>
                  <div class="ms-card-heading-title">
                    <p>Orders <span class="red-text">175</span></p>
                    <p>Income <span class="red-text">$775</span></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- END/Food Orders -->

    <!-- Recent Placed Orders< -->
    <div class="col-12">
      <div class="ms-panel">
        <div class="ms-panel-header">
          <h6>Recently Placed Orders</h6>
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
    <!-- Recent Orders< -->
  <!-- client chat -->
  </div>
</div>
@endsection

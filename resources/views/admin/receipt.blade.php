<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Costic Dashboard</title>
  <script src="{{ asset('js/app.js') }}"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/mycss.css') }}" rel="stylesheet">
  <!-- Iconic Fonts -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{asset('vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/flat-icons/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
  <!-- Bootstrap core CSS -->
  <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="{{asset('admin/css/jquery-ui.min.css')}}" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="{{asset('admin/css/slick.css')}}" rel="stylesheet">
  <link href="{{asset('admin/css/datatables.min.css')}}" rel="stylesheet">
  <!-- Costic styles -->
  <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="ms-content-wrapper">
              <?php
              use App\Models\fee;
              $getFee = fee::orderBy('id','DESC')->limit(1)->get();
              foreach ($getFee as $fee);
              $subtotal = 0;
              ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="ms-panel">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-12" style="text-align: center">
                            <div class="logo-sn ms-d-block-lg mt-3">
                              <a class="pl-0 ml-0 text-center" href="">
                                <img src="{{asset('images/logo.png')}}" alt="logo">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
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
                        <div class="invoice-buttons text-right mt-3"> 
                            <a href="#" onclick="window.print();" class="btn btn-primary">Print Invoice</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Global Required Scripts Start -->
  {{-- <script src="{{asset('admin/js/jquery-3.5.0.min.js')}}"></script> --}}
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/js/perfect-scrollbar.js')}}">
  </script>
  <script src="{{asset('admin/js/jquery-ui.min.js')}}">
  </script>
  <!-- Global Required Scripts End -->
  <!-- Page Specific Scripts Start -->

  <script src="{{asset('admin/js/Chart.bundle.min.js')}}">
  </script>
  <script src="{{asset('admin/js/widgets.js')}}"> </script>
  <script src="{{asset('admin/js/clients.js')}}"> </script>
  <script src="{{asset('admin/js/Chart.Financial.js')}}"> </script>
  <script src="{{asset('admin/js/d3.v3.min.js')}}">
  </script>
  <script src="{{asset('admin/js/topojson.v1.min.js')}}">
  </script>
  <script src="{{asset('admin/js/datatables.min.js')}}">
  </script>
  <script src="{{asset('admin/js/data-tables.js')}}">
  </script>
  
  <!-- Page Specific Scripts Finish -->
  <!-- Costic core JavaScript -->
  <script src="{{asset('admin/js/framework.js')}}"></script>
  <!-- Settings -->
  <script src="{{asset('admin/js/settings.js')}}"></script>
</body>

</html>

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
  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>
  <!-- Overlays -->
  <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
  <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
  <!-- Sidebar Navigation Left -->
  <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
      <a class="pl-0 ml-0 text-center" href="">
        <img src="{{asset('admin/img/costic/costic-logo-216x62.png')}}" alt="logo">
      </a>
    </div>

    <!-- Right Side Of Navbar -->
    {{-- <ul class="navbar-nav ml-auto">
       
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul> --}}

    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
      <!-- Dashboard -->
      <li class="menu-item">
        <a href="{{route('home')}}" class="has-chevron" data-toggle="collapse" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard"> <span><i class="material-icons fs-16">dashboard</i>Dashboard </span>
        </a>
        <ul id="dashboard" class="collapse" aria-labelledby="dashboard" data-parent="#side-nav-accordion">
          <li> <a href="{{route('home')}}">Costic</a>
          </li>
        </ul>
      </li>
      <!-- /Dashboard -->
      <!-- product -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product"> <span><i class="fa fa-archive fs-16"></i>Menus </span>
        </a>
        <ul id="product" class="collapse" aria-labelledby="product" data-parent="#side-nav-accordion">
          <li> <a href="{{route('menu')}}">Menu Catalogue</a>
          </li>
          <li> <a href="{{route('productlist')}}">Product List</a>
          </li>
          <li> <a href="{{route('addproduct')}}">Add Product</a>
          </li>
        </ul>
      </li>
      <!-- product end -->
      <!-- orders -->
      <li class="menu-item">
        <a href="{{route('orders')}}"> <span><i class="fas fa-clipboard-list fs-16"></i>Orders</span>
        </a>
      </li>
      <!-- orders end -->
      <!-- restaurants -->
      <li class="menu-item">
        <a href="pages/restaurants.html"> <span><i class="fa fa-tasks fs-16"></i>Restaurants List</span>
        </a>
      </li>
      <!-- restaurants end -->
      <!-- Invoice -->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="invoice"> <span><i class="fas fa-file-invoice fs-16"></i>Invoice </span>
        </a>
        <ul id="invoice" class="collapse" aria-labelledby="invoice" data-parent="#side-nav-accordion">
          {{-- <li> <a href="{{route('invoicedetails')}}">Invoice Detail</a>
          </li> --}}
          <li> <a href="{{route('invoicelist')}}">Invoice List</a>
          </li>
        </ul>
      </li>
      <!-- Invoice end -->
      <!-- customers-->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#customer" aria-expanded="false" aria-controls="customer"> <span><i class="fas fa-user-friends fs-16"></i>Customers </span>
        </a>
        <ul id="customer" class="collapse" aria-labelledby="customer" data-parent="#side-nav-accordion">
          <li> <a href="{{route('customerreview')}}">Customers Review</a>
          </li>
          <li> <a href="{{route('customerlist')}}">Customers List</a>
          </li>
          {{-- <li> <a href="pages/customer/social.html">Social Activity</a>
          </li> --}}
        </ul>
      </li>
      <!-- Customers  end -->
      <!-- Pages-->
      <li class="menu-item">
        <a href="#" class="has-chevron" data-toggle="collapse" data-target="#pages" aria-expanded="false" aria-controls="pages"> <span><i class="fas  fa-qrcode fs-16"></i>Pages </span>
        </a>
        <ul id="pages" class="collapse" aria-labelledby="pages" data-parent="#side-nav-accordion">
          <li> <a href="{{route('contactlist')}}">Contact List</a>
          </li>
          <li> <a href="{{route('newsletterlist')}}">Newsletter List</a>
          </li>
          <li> <a href="{{route('privacy_terms_delivery')}}">Privacy, Terms, Delivery</a>
          </li>
          {{-- <li> <a href="pages/customer/social.html">Social Activity</a>
          </li> --}}
        </ul>
      </li>
      <!-- Pages  end -->
      <!-- sales -->
      <li class="menu-item">
        <a href="{{route('sales')}}"> <span><i class="fa fa-briefcase fs-16"></i>Sales</span>
        </a>
      </li>
      <!-- sales end  -->
      <!-- Logout -->
      <li class="menu-item">
        <a href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> <span><i class="fas fa-power-off fs-16"></i>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
      </li>
      <!-- Logout end  -->
    </ul>
  </aside>
  <!-- Sidebar Right -->
  <aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">
    <div class="ms-aside-header">
      <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
        <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active" role="tab" data-toggle="tab"> Activity Log</a>
        </li>
        <li>
          <button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity" data-toggle="slideRight"><span aria-hidden="true">&times;</span>
          </button>
        </li>
      </ul>
    </div>
    <div class="ms-aside-body">
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
          <ul class="ms-activity-log">
            <li>
              <div class="ms-btn-icon btn-pill icon btn-light"> <i class="flaticon-gear"></i>
              </div>
              <h6>Update 1.0.0 Pushed</h6>
              <span> <i class="material-icons">event</i>1 January, 2020</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-success"> <i class="flaticon-tick-inside-circle"></i>
              </div>
              <h6>Profile Updated</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-warning"> <i class="flaticon-alert-1"></i>
              </div>
              <h6>Your payment is due</h6>
              <span> <i class="material-icons">event</i>1 January, 2020</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-danger"> <i class="flaticon-alert"></i>
              </div>
              <h6>Database Error</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-info"> <i class="flaticon-information"></i>
              </div>
              <h6>Checkout what's Trending</h6>
              <span> <i class="material-icons">event</i>1 January, 2020</span>
              <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
            </li>
            <li>
              <div class="ms-btn-icon btn-pill icon btn-secondary"> <i class="flaticon-diamond"></i>
              </div>
              <h6>Your Dashboard is ready</h6>
              <span> <i class="material-icons">event</i>4 March, 2018</span>
              <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
            </li>
          </ul> <a href="#" class="btn btn-primary d-block"> View All </a>
        </div>
      </div>
    </div>
  </aside>
  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
    <nav class="navbar ms-navbar">
      <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
      <div class="logo-sn logo-sm ms-d-block-sm">
        <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index.html"><img src="{{asset('admin/img/costic/costic-logo-84x41.png')}}" alt="logo"> </a>
      </div>
      <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">
        <li class="ms-nav-item ms-search-form pb-0 py-0">
          <form class="ms-form" method="post">
            <div class="ms-form-group my-0 mb-0 has-icon fs-14">
              <input type="search" class="ms-form-input" name="search" placeholder="Search here..." value=""> <i class="flaticon-search text-disabled"></i>
            </div>
          </form>
        </li>
        <li class="ms-nav-item dropdown"> <a href="#" class="text-disabled ms-has-notification" id="mailDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-mail"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="mailDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Mail</span></h6><span class="badge badge-pill badge-success">3 New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">
              <a class="media p-2" href="#">
                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                  <img src="{{asset('admin/img/costic/customer-3.jpg')}}" class="ms-img-round" alt="people">
                </div>
                <div class="media-body"> <span>Hey man, looking forward to your new project.</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="ms-chat-status ms-status-online ms-chat-img mr-2 align-self-center">
                  <img src="{{asset('admin/img/costic/customer-2.jpg')}}" class="ms-img-round" alt="people">
                </div>
                <div class="media-body"> <span>Dear John, I was told you bought Costic! Send me your feedback</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 28 minutes ago</p>
                </div>
              </a>
              <a class="media p-2" href="#">
                <div class="ms-chat-status ms-status-offline ms-chat-img mr-2 align-self-center">
                  <img src="{{asset('admin/img/costic/customer-1.jpg')}}" class="ms-img-round" alt="people">
                </div>
                <div class="media-body"> <span>How many people are we inviting to the dashboard?</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 6 hours ago</p>
                </div>
              </a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer text-center"> <a href="pages/apps/email.html">Go to Inbox</a>
            </li>
          </ul>
        </li>
        <li class="ms-nav-item dropdown"> <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bell"></i></a>
          <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
            <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6><span class="badge badge-pill badge-info">4 New</span>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-scrollable ms-dropdown-list">

              <a class="media p-2" href="#">
                <div class="media-body"> <span>12 ways to improve your crypto dashboard</span>
                  <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
                </div>
              </a>
              
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer text-center"> <a href="#">View all Notifications</a>
            </li>
          </ul>
        </li>

        <li class="ms-nav-item ms-nav-user dropdown">
          <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="ms-user-img ms-img-round float-right" src="{{asset('images/default.png')}}" alt="people">
          </a>
          <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
            {{-- <li class="dropdown-menu-header">
              <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, {{Auth::user()->name}}</span></h6>
            </li>
            <li class="dropdown-divider"></li>
            <li class="ms-dropdown-list">
              <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i class="flaticon-user mr-2"></i> Profile</span>
              </a>
              <a class="media fs-14 p-2" href="pages/apps/email.html"> <span><i class="flaticon-mail mr-2"></i> Inbox</span> <span class="badge badge-pill badge-info">3</span>
              </a>
              <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i class="flaticon-gear mr-2"></i> Account Settings</span>
              </a>
            </li>
            <li class="dropdown-divider"></li>
            <li class="dropdown-menu-footer">
              <a class="media fs-14 p-2" href="pages/prebuilt-pages/lock-screen.html"> <span><i class="flaticon-security mr-2"></i> Lock</span>
              </a>
            </li> --}}
            <li class="dropdown-menu-footer">
              {{-- <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              </a> --}}
              <a class="media fs-14 p-2" href="#" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options"> <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
        <span class="ms-toggler-bar bg-primary"></span>
      </div>
    </nav>

    <main class="main">
        @yield('content')
    </main>
    
  </main>
  <!-- MODALS -->
  <!-- Quick bar -->
  <aside id="ms-quick-bar" class="ms-quick-bar fixed ms-d-block-lg">

    <ul class="nav nav-tabs ms-quick-bar-list" role="tablist">

      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch To-do-list" data-title="To-do-list">
        <a href="#qa-toDo" aria-controls="qa-toDo" role="tab" data-toggle="tab">
          <i class="flaticon-list"></i>

        </a>
      </li>
      {{-- <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Reminders" data-title="Reminders">
        <a href="#qa-reminder" aria-controls="qa-reminder" role="tab" data-toggle="tab">
          <i class="flaticon-bell"></i>

        </a>
      </li>
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Launch Notes" data-title="Notes">
        <a href="#qa-notes" aria-controls="qa-notes" role="tab" data-toggle="tab">
          <i class="flaticon-pencil"></i>

        </a>
      </li>
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Invite Members" data-title="Invite Members">
        <a href="#qa-invite" aria-controls="qa-invite" role="tab" data-toggle="tab">
          <i class="flaticon-share-1"></i>

        </a>
      </li> --}}
      <li class="ms-quick-bar-item ms-has-qa" role="presentation" data-toggle="tooltip" data-placement="left" title="Settings" data-title="Settings">
        <a href="#qa-settings" aria-controls="qa-settings" role="tab" data-toggle="tab">
          <i class="flaticon-gear"></i>

        </a>
      </li>
    </ul>
    <div class="ms-configure-qa" data-toggle="tooltip" data-placement="left" title="Configure Quick Access">

      <a href="#">
        <i class="flaticon-hammer"></i>

      </a>

    </div>

    <!-- Quick bar Content -->
    <div class="ms-quick-bar-content">

      <div class="ms-quick-bar-header clearfix">
        <h5 class="ms-quick-bar-title float-left">Title</h5>
        <button type="button" class="close ms-toggler" data-target="#ms-quick-bar" data-toggle="hideQuickBar" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="ms-quick-bar-body tab-content">
        <div role="tabpanel" class="tab-pane" id="qa-toDo">
          <div class="ms-quickbar-container ms-todo-list-container ms-scrollable">

            <form class="ms-add-task-bloc" action="{{url('/save_todo')}}" method="post">
              @csrf
              <div class="form-group mx-3 mt-0  fs-14 clearfix">
                <input type="text" class="form-control fs-14 float-left" id="task-block" name="todo" placeholder="Add Task Block">
                <button type="submit" class="ms-btn-icon bg-primary float-right"><i class="material-icons text-disabled">add</i></button>
              </div>
            </form>

            <ul class="ms-todo-list">
              <li class="ms-card ms-qa-card ms-deletable">

                {{-- <div class="ms-card-header clearfix">
                  <h6 class="ms-card-title">Task Block Title</h6>
                  <button data-toggle="tooltip" data-placement="left" title="Add a Task to this block" class="ms-add-task-to-block ms-btn-icon float-right"> <i class="material-icons text-disabled">add</i> </button>
                </div> --}}

                <div class="ms-card-body">
                  <ul class="ms-list ms-task-block">
                    <?php
                    use App\Models\todo;
                    $todo = todo::orderBy('id','DESC')->get();
                    ?>
                    @foreach ($todo as $item)
                    <li class="ms-list-item ms-to-do-task ms-deletable">
                      <label class="ms-checkbox-wrap ms-todo-complete">
                        <input type="checkbox" value="">
                        <i class="ms-checkbox-check"></i>
                      </label>
                      <span> {{$item->todo}} </span>
                      <a href="{{url('/delete_todo/'.$item->id)}}" class="close"><i class="flaticon-trash ms-delete-trigge"> </i></a>
                    </li>
                    @endforeach
                  </ul>
                </div>

                <div class="ms-card-footer clearfix">
                  <a href="#" class="text-disabled mr-2"> <i class="flaticon-archive"> </i> Archive </a>
                  <a href="#" class="text-disabled  ms-delete-trigger float-right"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </li>
            </ul>

          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="qa-reminder">
          <div class="ms-quickbar-container ms-reminders">

            <ul class="ms-qa-options">
              <li> <a href="#" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-bell"></i> New Reminder </a> </li>
            </ul>

            <div class="ms-quickbar-container ms-scrollable">

              <div class="ms-card ms-qa-card ms-deletable">
                <div class="ms-card-body">
                  <p> Developer Meeting in Block B </p>
                  <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Today - 3:45 pm</span>
                </div>
                <div class="ms-card-footer clearfix">

                  <div class="ms-note-editor float-right">
                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                  </div>

                </div>
              </div>
              <div class="ms-card ms-qa-card ms-deletable">
                <div class="ms-card-body">
                  <p> Start adding change log to version 2 </p>
                  <span class="text-disabled fs-12"><i class="material-icons fs-14">access_time</i> Tomorrow - 12:00 pm</span>
                </div>
                <div class="ms-card-footer clearfix">

                  <div class="ms-note-editor float-right">
                    <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#reminder-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                    <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                  </div>

                </div>
              </div>

            </div>

          </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="qa-notes">

          <ul class="ms-qa-options">
            <li> <a href="#" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-sticky-note"></i> New Note </a> </li>
            <li> <a href="#"> <i class="flaticon-excel"></i> Export to Excel </a> </li>
          </ul>

          <div class="ms-quickbar-container ms-scrollable">

            <div class="ms-card ms-qa-card ms-deletable">
              <div class="ms-card-header">
                <h6 class="ms-card-title">Don't forget to check with the designer</h6>
              </div>
              <div class="ms-card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,
                  vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                </p>
                <ul class="ms-note-members clearfix mb-0">
                  <li class="ms-deletable"> <img src="{{asset('admin/img/people/people-3.jpg')}}" alt="member"> </li>
                  <li class="ms-deletable"> <img src="{{asset('admin/img/people/people-5.jpg')}}" alt="member"> </li>
                </ul>
              </div>
              <div class="ms-card-footer clearfix">

                <div class="dropdown float-left">
                  <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flaticon-share-1"></i> Share
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share With</span></h6>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="ms-scrollable ms-dropdown-list ms-members-list">
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-10.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>John Doe</span>
                        </div>
                      </a>
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-9.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>Raymart Sandiago</span>
                        </div>
                      </a>
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-7.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>Heather Brown</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="ms-note-editor float-right">
                  <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                  <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </div>
            </div>

            <div class="ms-card ms-qa-card ms-deletable">
              <div class="ms-card-header">
                <h6 class="ms-card-title">Perform the required unit tests</h6>
              </div>
              <div class="ms-card-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate urna in faucibus venenatis. Etiam at dapibus neque,
                  vel varius metus. Pellentesque eget orci malesuada, venenatis magna et
                </p>
                <ul class="ms-note-members clearfix mb-0">
                  <li class="ms-deletable"> <img src="{{asset('admin/img/people/people-9.jpg')}}" alt="member"> </li>
                </ul>
              </div>
              <div class="ms-card-footer clearfix">

                <div class="dropdown float-left">
                  <a href="#" class="text-disabled" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="flaticon-share-1"></i> Share
                  </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-menu-header">
                      <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Share With</span></h6>
                    </li>
                    <li class="dropdown-divider"></li>
                    <li class="ms-scrollable ms-dropdown-list ms-members-list">
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-10.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>John Doe</span>
                        </div>
                      </a>
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-9.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>Raymart Sandiago</span>
                        </div>
                      </a>
                      <a class="media p-2" href="#">
                        <div class="mr-2 align-self-center">
                          <img src="{{asset('admin/img/people/people-7.jpg')}}" class="ms-img-round" alt="people">
                        </div>
                        <div class="media-body">
                          <span>Heather Brown</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="ms-note-editor float-right">
                  <a href="#" class="text-disabled mr-2" data-toggle="modal" data-target="#notes-modal"> <i class="flaticon-pencil"> </i> Edit </a>
                  <a href="#" class="text-disabled  ms-delete-trigger"> <i class="flaticon-trash"> </i> Delete </a>
                </div>

              </div>
            </div>

          </div>

        </div>

        <div role="tabpanel" class="tab-pane" id="qa-invite">

          <div class="ms-quickbar-container text-center ms-invite-member">
            <i class="flaticon-network"></i>
            <p>Invite Team Members</p>
            <form>
              <div class="ms-form-group">
                <input type="text" placeholder="Member Email" class="form-control" name="invite-email" value="">
              </div>
              <div class="ms-form-group">
                <button type="submit" name="invite-member" class="btn btn-primary w-100">Invite</button>
              </div>
            </form>
          </div>

        </div>

        <div role="tabpanel" class="tab-pane" id="qa-settings">

          <div class="ms-quickbar-container text-center ms-invite-member">
            <div class="row">
              <div class="col-md-12 text-left mb-5">
                <h4 class="section-title bold">Customize</h4>
                <div>
                  <label class="ms-switch">
                    <input type="checkbox" id="dark-mode">
                    <span class="ms-switch-slider round"></span>
                  </label>
                  <span> Dark Mode </span>
                </div>
                <div>
                  <label class="ms-switch">
                    <input type="checkbox" id="remove-quickbar">
                    <span class="ms-switch-slider round"></span>
                  </label>
                  <span> Remove Quickbar </span>
                </div>
              </div>
              <div class="col-md-12 text-left mb-4">
                <h4 class="section-title bold">Additional Fees</h4>
                {{-- <div style=""> --}}
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-4">Fees</button>
                {{-- </div> --}}
              </div>
              <div class="col-md-12 text-left">
                <h4 class="section-title bold">Keyboard Shortcuts</h4>
                <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>
                <p class="ms-directions mb-0"><code>Alt + (1 -&gt; 6)</code> Open Quick Bar Tab</p>
                <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>
  </aside>
  <!-- Reminder Modal -->
  <div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white"> New Reminder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Remind me about</label>
              <textarea class="form-control" name="reminder"></textarea>
            </div>
            <div class="ms-form-group"> <span class="ms-option-name fs-14">Repeat Daily</span>
              <label class="ms-switch float-right">
                <input type="checkbox"> <span class="ms-switch-slider round"></span>
              </label>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="ms-form-group">
                  <input type="text" class="form-control datepicker" name="reminder-date" value="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="ms-form-group">
                  <select class="form-control" name="reminder-time">
                    <option value="">12:00 pm</option>
                    <option value="">1:00 pm</option>
                    <option value="">2:00 pm</option>
                    <option value="">3:00 pm</option>
                    <option value="">4:00 pm</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Notes Modal -->
  <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
            <div class="ms-form-group">
              <label>Note Title</label>
              <input type="text" class="form-control" name="note-title" value="">
            </div>
            <div class="ms-form-group">
              <label>Note Description</label>
              <textarea class="form-control" name="note-description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
          </div>
        </form>
      </div>
    </div>
  </div>

{{-- Fees Modal --}}
<div class="modal fade" id="modal-4" tabindex="-1" role="dialog" aria-labelledby="modal-3">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
          <h3 class="modal-title has-icon ms-icon-round "><i class="flaticon-list bg-primary text-white"></i> Update Fees</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
            <?php
            use App\Models\fee;
            $getFee = fee::orderBy('id','DESC')->get();
            ?>
            @foreach ($getFee as $item)
            <form method="post" action="{{url('/update_fee/'.$item->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="ms-form-group">
                        <label>Vat (#)</label>
                        <input type="number" value="{{$item->vat}}" class="form-control" name="vat" required>
                    </div>
                    <div class="ms-form-group">
                      <label>Delivery Fee (#)</label>
                      <input type="number" value="{{$item->deliveryfee}}" class="form-control" name="deliveryfee" required>
                  </div>
                  <div class="ms-form-group">
                    <label>Drive Tip (#)</label>
                    <input type="number" value="{{$item->drivetip}}" class="form-control" name="drivetip" required>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary shadow-none">Update</button>
                </div>
            </form>
            @endforeach
      </div>
  </div>
</div>

{{-- MODALS --}}
<!-- MESSAGE MODAL (SUCCESS) -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="modal-2">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="content_m" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                            <i class="fa fa-check-circle text-success" style="font-size:3.0em;"></i>
                            <p id="modalMsg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MESSAGE MODAL (ERROR) -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="modal-2">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" id="content_m" style="text-align:center;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                            <i class="fa fa-times-circle text-danger" style="font-size:3.0em;"></i>
                            <p id="modalMsg"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <script>
        $('#successModal').on('show.bs.modal', function(){
            $('#modalMsg').text("{{ session('success') }}");
        });
        $('#successModal').modal('show');
    </script>
@endif
@if(session('error'))
    <script>
        $('#errorModal').on('show.bs.modal', function(){
            $('#modalMsg').text("{{ session('success') }}");
        });
        $('#errorModal').modal('show');
    </script>
@endif

  <!-- SCRIPTS -->
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

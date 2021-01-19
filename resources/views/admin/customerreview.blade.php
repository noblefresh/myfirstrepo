@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Customer</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Customers Review</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="ms-content-wrapper">
      <div class="row">
        <!-- Recent Support Tickets -->
        <div class="col-xl-12 col-md-12">
          <div class="ms-panel ms-panel-fh">
            <div class="ms-panel-body p-0">
              <ul class="ms-list ms-feed ms-twitter-feed ms-recent-support-tickets">
                @foreach ($review as $item)
                <li class="ms-list-item">
                  <a href="#" class="media clearfix">
                    <img src="{{asset('images/default.png')}}" class="ms-img-round ms-img-small" alt="This is another feature">
                    <div class="media-body">
                      <div class="customer-meta">
                        <div class="new">
                          <h5 class="ms-feed-user mb-0">{{$item->username}}</h5>
                          <h6 class="ml-4 mb-0 text-red">{{$item->product->name}}</h6>
                        </div>
                        <ul class="ms-star-rating rating-fill rating-circle ratings-new">
                        @if($item->star == 5)
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                        @elseif($item->star == 4)
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                        @elseif($item->star == 3)
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                        @elseif($item->star == 2)
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                        @else
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item"> <i class="material-icons">star</i></li>
                          <li class="ms-rating-item rated"> <i class="material-icons">star</i></li>
                        @endif
                        </ul>
                      </div> <span class="my-2 d-block"> <i class="material-icons">date_range</i> {{date('M d, Y', strtotime($item->created_at))}}</span>
                      <p class="d-block">{{$item->message}}</p>
                      <div class="d-flex justify-content-between align-items-end">
                        <div class="ms-feed-controls"> <span>
                          <i class="material-icons">chat</i>
                        </div>
                      </div>
                    </div>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- PAGINATE LINK -->
        <div class="container pt-3">
            <div class="row mt-3">
                <div class="col-md">{{$review->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
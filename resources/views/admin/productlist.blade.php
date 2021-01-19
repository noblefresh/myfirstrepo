@extends('layouts.app')
@section('content')
<!-- Body Content Wrapper -->
<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" class="new">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active" aria-current="page">Menu Grid</li>
          </ol>
        </nav>
        
          <div class="row">
              @foreach ($foods as $show)
              <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="ms-card">
                  <div class="ms-card-img">
                    <img src="{{asset('/productImages/'.$show->image)}}" alt="card_img" class="w-100">
                  </div>
                  <div class="ms-card-body">

                    <div class="new">
                      <h6 class="mb-0">{{$show->name}}</h6>
                      <h6 class="ms-text-primary mb-0">&#8358;{{ number_format($show->amount,2) }}</h6>
                    </div>
                    <div class="new meta">
                      <p>ID:{{$show->productid}}</p>
                      @foreach($menu as $item)
                      @if($show->menu == $item->menuid)
                      <span class="badge badge-success">{{$item->name}}</span>
                      @endif
                      @endforeach
                    </div>
                    <p>
                      <?php
                      $string = $show->description;
                      if (strlen($string) > 50) {
                          $stringCut = substr($string, 0, 50);
                          $endPoint = strrpos($stringCut, '');
                          $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                      }
                      ?>
                      {!!$show->string!!}
                    </p>
                    <div class="new mb-0">
                      <a type="button" class="btn grid-btn mt-0 btn-sm btn-primary" href="{{url('/deletefood/'.$show->id)}}">Remove</a>
                      <a type="button" class="btn grid-btn mt-0 btn-sm btn-secondary" href="{{url('/editfood/'.$show->id)}}">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
        </div>
      </div>
    </div>

  </div>
@endsection
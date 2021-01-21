@extends('layouts.app')
@section('content')
    <div class="ms-content-wrapper box">

      <div class="row">
        <div class="col-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Menu Catalogue</li>
            </ol>
          </nav>
        </div>
        <div class="col-4 text-right mb-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-3"><i class="fas fa-plus"></i></button>
        </div>
        <?php use App\Models\product; ?>
        @foreach($menu as $show)
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="ms-card">
            <div class="ms-card-img">
              <img src="{{asset('/MenuImages/'.$show->image)}}" alt="menu_img">
            </div>
            <div class="ms-card-body ">
              <div class="wrapper-new2 ">
                <h6>{{$show->name}}</h6>
                @if($show->status == 'published')
                <span class="bg-success text-light p-2">{{$show->status}}</span>
                @else
                <span class="bg-danger text-light p-2">{{$show->status}}</span>
                @endif
              </div>
              <div class="wrapper-new1">
                <?php
                $numProduct = product::where('menu',$show->menuid)->get();
                $countProduct = count($numProduct);
                ?>
                <span>Total Products :<strong class="color-red"> {{$countProduct}}</strong> </span>
                <span><a href="{{url('/deletemenu/'.$show->id)}}"><i class="flaticon-trash"></i></a></span>
              </div>
              <div class="new mb-0 mt-3">
                <a type="button" class="btn grid-btn mt-0 btn-sm btn-primary" href="{{url('/menuproduct/'.$show->menuid)}}">Show Products</a>
                <a type="button" class="btn grid-btn mt-0 btn-sm btn-secondary" href="{{url('/editmenu/'.$show->id)}}">Edit</a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>


    {{-- Add Menu Modal --}}
    <div class="modal fade" id="modal-3" tabindex="-1" role="dialog" aria-labelledby="modal-3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                <h3 class="modal-title has-icon ms-icon-round "><i class="flaticon-list bg-primary text-white"></i> Add Menu</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <form method="post" action="{{url('/save_menu')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="ms-form-group has-icon">
                            <label>Manu Name</label>
                            <input type="text" placeholder="Name" class="form-control" name="name" required>
                            <i class="material-icons">adjust</i>
                        </div>
                        <div class="ms-form-group">
                            <label>Visiablity</label>
                            <div class="input-group">
                                <select class="form-control" name="status" required>
                                <option value="">Select visiablity</option>
                                <option value="published">Published</option>
                                <option value="nonpublished">Nonpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="ms-form-group has-icon">
                            <label>Manu Cover Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                    <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
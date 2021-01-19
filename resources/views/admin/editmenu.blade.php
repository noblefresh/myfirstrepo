@extends('layouts.app')
@section('content')
    <div class="ms-content-wrapper box">

      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
              <li class="breadcrumb-item"><a href="#">Menu</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Menu Catalogue</li>
            </ol>
          </nav>
        </div>

        {{-- <div class="row justify-content-center"> --}}
            <div class="col-md-6 bg-light">
                <div>
                @foreach($showmenu as $show)
                    <form method="post" action="{{url('/update_menu/'.$show->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="ms-form-group has-icon">
                                <label>Manu Name</label>
                                <input type="text" placeholder="Name" class="form-control" name="name" value="{{$show->name}}" required>
                                <i class="material-icons">email</i>
                            </div>
                            <div class="ms-form-group">
                                <label>Visiablity</label>
                                <div class="input-group">
                                    <select class="form-control" name="status" required>
                                    <option value="{{$show->status}}">{{$show->status}}</option>
                                    <option value="published">Published</option>
                                    <option value="nonpublished">Nonpublished</option>
                                    </select>
                                </div>
                            </div>
                            <div class="ms-form-group has-icon">
                                <label>Manu Cover Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>

                        <div class="modal-footer">
                        <button type="submit" class="btn btn-primary shadow-none">Submit</button>
                        </div>
                    </form>
                @endforeach
                </div>
            </div>
        {{-- </div> --}}
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper">
        <div class="row">
  
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
              </ol>
            </nav>
  
            {{-- <div class="alert alert-success" role="alert">
              <strong>Well done!</strong> You successfully read this important alert message.
            </div> --}}
          </div>
  
        @foreach ($showfood as $show)
        <form class="needs-validation clearfix" method="POST" action="{{url('/update_product/'.$show->id)}}" novalidate enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="ms-panel ms-panel-fh">
                    <div class="ms-panel-header">
                        <h6>Add Product Form</h6>
                    </div>
                    <div class="ms-panel-body">
                        {{-- form before --}}
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom18">Product Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" id="validationCustom18" value="{{$show->name}}" required>
                            </div>
                            </div>
        
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom22">Food Menu Category</label>
                            <div class="input-group">
                                <select class="form-control" id="validationCustom22" name="menu" required>
                                <option value="{{$show->menu}}">{{$show->menu}}</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                                </select>
                                <div class="invalid-feedback">
                                    Food Menu Category.
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom23">Catagory</label>
                            <div class="input-group">
                                <select class="form-control" name="category" id="validationCustom23">
                                <option value="{{$show->category}}">{{$show->category}}</option>
                                <option value="Category 1">Category 1</option>
                                <option value="Category 2">Category 2</option>
                                </select>
                                <div class="invalid-feedback">
                                Please select a Category
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom24">Type</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="type" id="validationCustom24" value="{{$show->type}}" required>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom25">Price</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="validationCustom25" name="amount" value="{{$show->amount}}" required>
                                <div class="invalid-feedback">
                                    Price
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Description</label>
                            <div class="input-group">
                                <textarea rows="5" id="summary-ckeditor"class="form-control" name="description" required>{{$show->description}}</textarea>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Product Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
    
            <div class="col-xl-6 col-md-12">
                <div class="row">
                <div class="col-md-12">
                    <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>Product </h6>
                    </div>
                    <div class="ms-panel-body">
                        <img class="d-block w-100" src="{{asset('/productImages/'.$show->image)}}" alt="First slide">
                    </div>
                    <div class="ms-panel-header new">
                        {{-- <button class="btn btn-secondary d-block" type="submit">Save</button> --}}
                        <button class="btn btn-primary d-block" type="submit">Update</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </form>
            @endforeach
        </div>
        {{-- <button class="btn btn-primary" type="button" id="" data-toggle="modal" data-target="#modal-2"> Click Me </button> --}}
    </div>

    <!-- MESSAGE MODAL (SUCCESS) -->
    <div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="modal-2">
        <div class="modal-dialog modal-md modal-dialog-centered">
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

    @if(session('success'))
        <script>
            $('#modal-2').on('show.bs.modal', function(){
                $('#modalMsg').text("{{ session('success') }}");
            });
            $('#modal-2').click();
        </script>
    @endif
    <!-- CKEDITO SCRIPT -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script> 
@endsection
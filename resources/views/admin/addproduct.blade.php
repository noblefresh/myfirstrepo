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
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
              </ol>
            </nav>
  
            {{-- <div class="alert alert-success" role="alert">
              <strong>Well done!</strong> You successfully read this important alert message.
            </div> --}}
          </div>
  
        <form class="needs-validation clearfix" method="POST" action="{{url('/save_product')}}" novalidate enctype="multipart/form-data">
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
                                <input type="text" class="form-control" name="name" id="validationCustom18" placeholder="Product Name" required>
                            </div>
                            </div>
        
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom22">Food Menu Category</label>
                            <div class="input-group">
                                <?php
                                use App\Models\menu;
                                $getmenu = menu::all();
                                ?>
                                <select class="form-control" id="validationCustom22" name="menu" required>
                                <option value="">Select Daily Menu</option>
                                @foreach($getmenu as $item)
                                <option value="{{$item->menuid}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Food Menu Category.
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom23">Catagory</label>
                            <div class="input-group">
                                <select class="form-control" name="category" id="validationCustom23" required>
                                <option value="">Select Category</option>
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
                                <input type="text" class="form-control" name="type" id="validationCustom24" placeholder="Food Type" required>
                            </div>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label for="validationCustom25">Price</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="validationCustom25" name="amount" placeholder="#" required>
                                <div class="invalid-feedback">
                                    Price
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Description</label>
                            <div class="input-group">
                                <textarea rows="5" id="summary-ckeditor" class="form-control" name="description" placeholder="Message" required></textarea>
                            </div>
                            </div>
                            <div class="col-md-12 mb-3">
                            <label for="validationCustom12">Product Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="validatedCustomFile" required>
                                <label class="custom-file-label" for="validatedCustomFile">Upload Images...</label>
                                <div class="invalid-feedback">Invalid Image File</div>
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
                        <img class="d-block w-100" src="{{asset('admin/img/costic/add-product-1.jpg')}}" alt="First slide">
                        {{-- <div id="imagesSlider" class="ms-image-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="{{asset('addmin/img/costic/add-product-1.jpg')}}" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('addmin/img/costic/add-product-2.jpg')}}" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="{{asset('admin/img/costic/add-product-3.jpg')}}" alt="Third slide">
                            </div>
                        </div>
                        <ol class="carousel-indicators">
                            <li data-target="#imagesSlider" data-slide-to="0" class="active"> <img class="d-block w-100" src="{{asset('admin/img/costic/add-product-1.jpg')}}" alt="First slide"></li>
                            <li data-target="#imagesSlider" data-slide-to="1"><img class="d-block w-100" src="{{asset('admin/img/costic/add-product-2.jpg')}}" alt="Second slide"></li>
                            <li data-target="#imagesSlider" data-slide-to="2"><img class="d-block w-100" src="{{asset('admin/img/costic/add-product-3.jpg')}}" alt="Third slide"></li>
                        </ol>
                        </div> --}}
                    </div>
                    <div class="ms-panel-header new">
                        <p class="medium">Status Available</p>
                        <div>
                        <label class="ms-switch">
                            <input type="checkbox" checked="">
                            <span class="ms-switch-slider round"></span>
                        </label>
                        </div>
                    </div>
                    <div class="ms-panel-header new">
                        <p class="medium">Discount Active</p>
                        <div>
                        <label class="ms-switch">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                        </div>
                    </div>
                    <div class="ms-panel-header new">
                        {{-- <button class="btn btn-secondary d-block" type="submit">Save</button> --}}
                        <button class="btn btn-primary d-block" type="submit">Save and Add</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </form>
        </div>
        {{-- <button class="btn btn-primary" type="button" id="" data-toggle="modal" data-target="#errorModal"> Click Me </button> --}}
    </div>

    
    <!-- CKEDITO SCRIPT -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script> 
@endsection
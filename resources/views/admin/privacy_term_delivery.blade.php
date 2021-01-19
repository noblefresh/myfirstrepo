@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Privacy, Terms, Delivery</a>
            </li>
          </ol>
        </nav>
        <div class="col-12">
          <div class="ms-panel">
                <div class="ms-panel-header">
                <h6>Privacy Policy</h6>
                </div>
                <?php
                use App\Models\privacy_term_delivery;
                $getPolicy = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
                ?>
                @foreach ($getPolicy as $policy)
                <div class="ms-panel-body">
                    <form method="POST" action="{{url('/update_policy/'.$policy->id)}}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="policy" id="summary-ckeditor1" rows="10">{{$policy->policy}}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Update Policy</button>
                        </div>
                    </form>
                </div>
                @endforeach
          </div>
        </div>

        <div class="col-12 mt-4">
            <div class="ms-panel">
                  <div class="ms-panel-header">
                  <h6>Terms & Conditions</h6>
                  </div>
                  <?php
                  $getTerm = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
                  ?>
                  @foreach ($getTerm as $term)
                  <div class="ms-panel-body">
                      <form method="POST" action="{{url('/update_term/'.$term->id)}}">
                          @csrf
                          <div class="form-group">
                              <textarea class="form-control" name="term" id="summary-ckeditor1" rows="10">{{$term->term}}</textarea>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary">Update Terms</button>
                          </div>
                      </form>
                  </div>
                  @endforeach
            </div>
          </div>

          <div class="col-12 mt-4">
            <div class="ms-panel">
                  <div class="ms-panel-header">
                  <h6>Delivery Policy</h6>
                  </div>
                  <?php
                  $getDelivery = privacy_term_delivery::orderBy('id','DESC')->limit(1)->get();
                  ?>
                  @foreach ($getDelivery as $delivery)
                  <div class="ms-panel-body">
                      <form method="POST" action="{{url('/update_delivery/'.$delivery->id)}}">
                          @csrf
                          <div class="form-group">
                              <textarea class="form-control" name="delivery" id="summary-ckeditor1" rows="10">{{$delivery->delivery}}</textarea>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary">Update Delivery</button>
                          </div>
                      </form>
                  </div>
                  @endforeach
            </div>
          </div>
      </div>
    </div>
  </div>

   <!-- CKEDITO SCRIPT -->
   <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
   <script>
       CKEDITOR.replace( 'summary-ckeditor1' );
   </script> 
@endsection
@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Newsletter List</a>
            </li>
          </ol>
        </nav>
        <div class="col-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Newsletter List</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Email</th>
                      <th scope="col">Date Reg.</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($newsletter as $item)
                    <tr>
                      <th scope="row">{{$item->id}}</th>
                      <td>{{$item->email}}</td>
                      <td>{{date('D d M, Y', strtotime($item->created_at))}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- PAGINATE LINK -->
    <div class="container pt-3">
        <div class="row mt-3">
            <div class="col-md">{{$newsletter->links()}}</div>
        </div>
    </div>
  </div>
@endsection
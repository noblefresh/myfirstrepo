@extends('layouts.app')
@section('content')
<div class="ms-content-wrapper">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Sales</a>
            </li>
          </ol>
        </nav>
        <div class="col-12">
          <div class="ms-panel">
            <div class="ms-panel-header">
              <h6>Sales</h6>
            </div>
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table class="table table-hover thead-primary">
                  <thead>
                    <tr>
                      <th scope="col">Product ID</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Menu</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">15451</th>
                      <td>French Fries</td>
                      <td>001</td>
                      <td>African Foods</td>
                      <td>$10</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
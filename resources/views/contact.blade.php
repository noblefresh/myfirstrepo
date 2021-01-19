@extends('template.layout')
@section('content')
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-light-black fw-600 p-3 bg-danger text-light shadow">CONTACT</h5>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-8 shadow">
                    <div class="mt-3">
                        <h3>Reach Us</h3>
                    </div>
                    <div class="p-3">
                        <form action="{{url('/save_contact')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-light-black fw-700">Name</label>
                                        <input type="text" class="form-control form-control-submit" name="name" placeholder="e.g Jeo Mark" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-light-black fw-700">Email</label>
                                        <input type="email" class="form-control form-control-submit" name="email" placeholder="e.g example@yourdomain.com" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-light-black fw-700">Subject</label>
                                        <input type="text" class="form-control form-control-submit" name="subject" placeholder="Enter the subject of your message" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-light-black fw-700">Message</label>
                                        <textarea type="text" class="form-control form-control-submit" rows="5" name="message" placeholder="Kindly write your message here" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-danger">Submit <i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="col-md-6 mt-3">
                            <div class="infoDiv text-center">
                                <h5 class="text-bold">Resturant One Name</h5>
                                <span class=""><b>65A Plaza, Oha Phase 1, Enugu</b><span><br>
                                <span class="">example@domain.com<span><br>
                                <span class="">+234 (0) 80 830 847 4374<span><br>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="infoDiv text-center">
                                <h5 class="text-bold">Resturant Two Name</h5>
                                <span class=""><b>65A Plaza, Oha Phase 1, Enugu</b><span><br>
                                <span class="">example@domain.com<span><br>
                                <span class="">+234 (0) 80 830 847 4374<span><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    {{-- Sidebar Start --}}
                    @include('template.sidebar')
                    {{-- Sidebar Ends --}}
                </div>
            </div>
        </div>
        {{-- @endauth --}}
    </section>

    <style>
        .infoDiv{
            padding: 15px;
            border: 1px solid rgb(238, 20, 20);
            border-radius: 5px;
        }
    </style>
@endsection
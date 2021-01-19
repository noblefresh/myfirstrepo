@extends('template.layout')
@section('content')
    <section class="checkout-page section-padding bg-light-theme">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="p-3">
                        <div class="history-title mb-md-40">
                            <h2 class="text-light-black">Terms & <span class="text-light-green">Conditions</span></h2>
                            @foreach ($terms as $item)
                            <div class="text-light-white">
                                {!!$item->term!!}
                            </div>
                            @endforeach
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
@endsection
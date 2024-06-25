@extends('user.master.layout')
@section('title', 'Testimonial')
@section('banner')
@endsection
@section('facts')
@endsection
@section('resent')
@endsection
@section('content')
    <section class="page-header profile_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>My Testimonial</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>My Testimonial</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo"> <img src="{{ asset('user/images/dealer-logo.jpg') }}" alt="image">
                </div>

                <div class="dealer_info">
                    <h5 class=" uppercase">{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->address }}<br>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    @include('user.master.myslide')
                </div>

                <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                        <h5 class="uppercase underline">My Testimonials </h5>
                        <div class="my_vehicles_list">
                            @foreach ($test as $t)
                            <ul class="vehicle_listing">

                                <li>

                                    <div>
                                        <p>{{$t->message}}</p>
                                        <p><b>Posting Date:</b>{{ $t->created_at->format('Y-m-d')}}</p>
                                    </div>

                                    @if ($t->status == "0")
                                    <div class=""> <a href="#" class="btn outline btn-xs">Waiting for
                                            approval</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @else
                                    <div class=""> <a class="btn outline btn-xs active-btn">Active</a>

                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                </li>

                            </ul>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

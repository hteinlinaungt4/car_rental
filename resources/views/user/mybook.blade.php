@extends('user.master.layout')
@section('title', 'Detail')
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
                    <h1>My Booking</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>My Booking</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>



    <section class="user_profile inner_pages">
        <div class="container">
            <div class="user_profile_info gray-bg padding_4x4_40">
                <div class="upload_user_logo"> <img src="{{asset('user/images/dealer-logo.jpg')}}" alt="image">
                </div>

                <div class="dealer_info">
                    <h5 class=" uppercase">{{Auth::user()->name}}</h5>
                    <p>{{Auth::user()->address}}<br>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    @include('user.master.myslide')
                </div>

                <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                        <h5 class="uppercase underline">My Bookings </h5>
                        <div class="my_vehicles_list">
                            <ul class="vehicle_listing">

                                @foreach ($books as $b)
                                <li>
                                    <div class="vehicle_img"> <a href=""><img src="{{asset('storage/vehicle/'.$b->vehicle->image1)}}" alt="image"></a>
                                    </div>
                                    <div class="vehicle_title">
                                        <h6> {{$b->vehicle->title}} | {{$b->bookNumber}} </h6>
                                        <p><b>From Date:</b>{{$b->fromDate}}<br /> <b>To Date:</b>{{$b->toDate}}</p>
                                    </div>
                                    @if ($b->status == "Confirmed")
                                    <div class=""> <a
                                            class="btn outline btn-xs active-btn">Confirmed</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @elseif ($b->status == "Cancelled")
                                    <div class=""> <a class="btn outline btn-xs">Cancelled</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @else
                                    <div class=""> <a
                                         class="btn outline btn-xs">Not
                                            Confirm yet</a>
                                        <div class="clearfix"></div>
                                    </div>
                                    @endif
                                    <div style="float: left">
                                        <p><b>Message:</b> {{$b->message}} </p>
                                    </div>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

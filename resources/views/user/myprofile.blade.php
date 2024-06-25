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
                        <h5 class="uppercase underline">Genral Settings</h5>
                        <form action="{{route('myprofile.update')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Reg Date -</label>
                                {{ Auth::user()->created_at }}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Update at -</label>
                                {{ Auth::user()->updated_at }}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Full Name</label>
                                <input class="form-control white_bg" name="name" value="{{ Auth::user()->name }}"
                                    id="fullname" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email Address</label>
                                <input class="form-control white_bg" value="{{ Auth::user()->email }}" name="email"
                                    id="email" type="email" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number</label>
                                <input class="form-control white_bg" name="phone" value="{{ Auth::user()->phone }}"
                                    id="phone-number" type="text" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Your Address</label>
                                <textarea class="form-control white_bg" name="address" rows="4">{{ Auth::user()->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="updateprofile" class="btn">Save Changes <span
                                        class="angle_arrow"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

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
                    <h1>Change Password</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li>Change Password</li>
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
                        <form action="{{ route('userpassword#change') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="gray-bg field-title">
                                <h6>Update password</h6>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Current Password</label>
                                <input class="form-control white_bg @error('oldpassword') is-invalid @enderror" id="password" name="oldpassword" type="password"
                                    required>
                                @error('oldpassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">New Password</label>
                                <input class="form-control white_bg @error('newpassword') is-invalid @enderror" id="newpassword" type="password" name="newpassword"
                                    required>
                                @error('newpassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password</label>
                                <input class="form-control white_bg @error('comfirmpassword') is-invalid @enderror" id="confirmpassword" type="password"
                                    name="comfirmpassword" required>
                                    @error('comfirmpassword')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" name="update" id="submit" class="btn btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection

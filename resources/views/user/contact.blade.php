@extends('user.master.layout')
@section('title', 'Detail')
@section('banner')
@endsection
@section('facts')
@endsection
@section('resent')
@endsection
@section('content')
    <section class="page-header contactus_page">
        <div class="container">
            <div class="page-header_wrap">
                <div class="page-heading">
                    <h1>Contact Us</h1>
                </div>
                <ul class="coustom-breadcrumb">
                    <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header-->

    <!--Contact-us-->
    <section class="contact_us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3>For Any quieries Contact Us</h3>
                    <div class="contact_form gray-bg">
                        <form action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Full Name <span>*</span></label>
                                <input type="text" name="name" class="form-control white_bg" id="fullname" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email Address <span>*</span></label>
                                <input type="email" name="email" class="form-control white_bg" id="emailaddress"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone Number <span>*</span></label>
                                <input type="text" name="phone" class="form-control white_bg" id="phonenumber"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Message <span>*</span></label>
                                <textarea class="form-control white_bg" name="message" rows="4" required></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn" type="submit" name="send" type="submit">Send Message <span
                                        class="angle_arrow"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></span></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@extends('user.master.layout')
@section('title',"Detail")
@section('banner')
@endsection
@section('facts')
@endsection
@section('resent')
@endsection
@section('content')
<!--Contact-us-->
<section class="page-header aboutus_page">
    <div class="container">
      <div class="page-header_wrap">
        <div class="page-heading">
          <h1>About Us</h1>
        </div>
        <ul class="coustom-breadcrumb">
          <li><a href="{{route('admin.dashboard')}}">Home</a></li>
          <li>About Us</li>
        </ul>
      </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
  </section>
  <section class="about_us section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2>About Us</h2>
        <p>We offer a varied fleet of cars, ranging from the compact. All our vehicles have air conditioning,  power steering, electric windows. All our vehicles are bought and maintained at official dealerships only. Automatic transmission cars are available in every booking class. As we are not affiliated with any specific automaker, we are able to provide a variety of vehicle makes and models for customers to rent</p>
      </div>
    </div>
  </section>

@endsection

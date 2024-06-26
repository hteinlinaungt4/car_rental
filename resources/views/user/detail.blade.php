@extends('user.master.layout')
@section('title',"Detail")
@section('banner')
@endsection
@section('facts')
@endsection
@section('resent')
@endsection
@section('content')
<section id="listing_img_slider">
    <div class="caros" width="900" height="560"><img src="{{asset('storage/vehicle/'.$vehicle->image1)}}" class="img-responsive caro object-cover" alt="image" style="width: 100%" height="100%" >
    </div>
    <div class="caros" width="900" height="560"><img src="{{asset('storage/vehicle/'.$vehicle->image2)}}" class="img-responsive caro object-cover" alt="image" style="width: 100%" height="100%" >
    </div>
    <div class="caros" width="900" height="560"><img src="{{asset('storage/vehicle/'.$vehicle->image3)}}" class="img-responsive caro object-cover" alt="image" style="width: 100%" height="100%" >
    </div>
    <div class="caros" width="900" height="560"><img src="{{asset('storage/vehicle/'.$vehicle->image4)}}" class="img-responsive caro object-cover" alt="image" style="width: 100%" height="100%" >
    </div>

</section>
<!--/Listing-Image-Slider-->


<!--Listing-detail-->
<section class="listing-detail">
    <div class="container">
        <div class="listing_detail_head row">
            <div class="col-md-9">
                <h2>{{$vehicle->brand->name}},{{$vehicle->title}}</h2>
            </div>
            <div class="col-md-3">
                <div class="price_info">
                    <p>${{$vehicle->perDay}}</p>Per Day

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="main_features">
                    <ul>

                        <li> <i class="fa fa-calendar" aria-hidden="true"></i>
                            <h5>{{$vehicle->modelyear}}</h5>
                            <p>Reg.Year</p>
                        </li>
                        <li> <i class="fa fa-cogs" aria-hidden="true"></i>
                            <h5 class=" uppercase">{{$vehicle->fuel}}</h5>
                            <p>Fuel Type</p>
                        </li>

                        <li> <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <h5>{{$vehicle->seatingCapacity}}</h5>
                            <p>Seats</p>
                        </li>
                    </ul>
                </div>
                <div class="listing_more_info">
                    <div class="listing_detail_wrap">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs gray-bg" role="tablist">
                            <li role="presentation" class="active"><a href="#vehicle-overview "
                                    aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview
                                </a></li>

                            <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab"
                                    data-toggle="tab">Accessories</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- vehicle-overview -->
                            <div role="tabpanel" class="tab-pane active" id="vehicle-overview">

                                <p>{{$vehicle->overview}}</p>
                            </div>


                            <!-- Accessories -->
                            <div role="tabpanel" class="tab-pane" id="accessories">
                                <!--Accessories-->
                                <table>
                                    <thead>
                                        <tr>
                                            <th colspan="2">Accessories</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Air Conditioner</td>
                                            @if($vehicle->AirConditioner)
                                            <td><i class="fa fa-check" aria-hidden="true"></i></td>
                                            @else
                                            <td><i class="fa fa-close" aria-hidden="true"></i></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Power Door Locks</td>
                                            <td>
                                                @if($vehicle->PowerDoorLocks == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Anti Lock Braking System</td>
                                            <td>
                                                @if($vehicle->AntiLockBrakingSystem == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brake Assist</td>
                                            <td>
                                                @if($vehicle->BrakeAssist == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Power Steering</td>
                                            <td>
                                                @if($vehicle->PowerSteering == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Driver Airbag</td>
                                            <td>
                                                @if($vehicle->DriverAirbag == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Passenger Airbag</td>
                                            <td>
                                                @if($vehicle->PassengerAirbag == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Power Windows</td>
                                            <td>
                                                @if($vehicle->PowerWindows == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>CD Player</td>
                                            <td>
                                                @if($vehicle->CDPlayer == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Central Locking</td>
                                            <td>
                                                @if($vehicle->CentralLocking == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Crash Sensor</td>
                                            <td>
                                                @if($vehicle->CrashSensor == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Leather Seats</td>
                                            <td>
                                                @if($vehicle->LeatherSeats == '1')
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-close" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!--Side-Bar-->
            <aside class="col-md-3">

                <div class="share_vehicle">
                    <p>Share: <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a
                            href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a> <a
                            href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> <a
                            href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a> </p>
                </div>
                <div class="sidebar_widget">
                    <div class="widget_heading">
                        <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
                    </div>
                    <form action="{{route('book')}}" method="post">
                        @csrf

                        <input type="hidden" value="{{$vehicle->id}}" name="vehicle_id">
                        <div class="form-group">
                            <input class="form-control" name="fromDate" type="text" id="start" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="toDate" type="text" id="end" />
                        </div>
                        <div class="form-group">
                            <textarea rows="4" class="form-control" name="message" placeholder="Message" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn">Book</button>
                        </div>


                    </form>
                </div>
            </aside>
            <!--/Side-Bar-->
        </div>

        <div class="space-20"></div>
        <div class="divider"></div>

        <!--Similar-Cars-->
        <div class="similar_cars">
            <h3>Similar Cars</h3>
            <div class="row">
                @foreach ($vehicles as $v)
                <div class="col-md-3 grid_listing">
                    <div class="product-listing-m gray-bg">
                        <div class="product-listing-img"> <a href="{{route('detail',$v->id)}}"><img
                                    src="{{asset('storage/vehicle/'.$v->image1)}}" class="img-responsive object-cover" style=" width:300px;height:200px;" alt="image" />
                            </a>
                        </div>
                        <div class="product-listing-content">
                            <h5><a href="{{route('detail',$v->id)}}">{{$v->brand->name}} , {{$v->title}}
                                    </a></h5>
                            <p class="list-price">$ {{$v->perDay}}</p>

                            <ul class="features_list">

                                <li><i class="fa fa-user" aria-hidden="true"></i>{{$v->seatingCapacity}} seats</li>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$v->modelyear}} model</li>
                                <li><i class="fa fa-car" aria-hidden="true"></i><span class=" uppercase">{{$v->fuel}}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>
        </div>
        <!--/Similar-Cars-->

    </div>
</section>
<!--/Listing-detail-->



<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a>
</div>
<!--/Back to top-->

@endsection
@section('script')
    <script>
        $(function() {
            $('#start').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "maxDate" : moment(),
                "locale":{
                    "format":"YYYY-MM-DD",
                }
            }
            );
            $('#end').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "autoApply": true,
                "minDate" : moment(),
                "locale":{
                    "format":"YYYY-MM-DD",
                }
            }
            );
        });

    </script>
@endsection

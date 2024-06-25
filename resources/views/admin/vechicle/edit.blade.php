@extends('admin.dashboard')
@section('title', 'Vechile Edit')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Basic Info
                        </div>
                    </div>
                    <div class="card-body">
                      <form action="{{route('vehicle.update',$vehicle->id)}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-6 ">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;">Vehicle Title <sup>*</sup> </lable>
                                    <input name="title" value="{{old('title',$vehicle->title)}}" type="text" class="form-control my-2 @error('title') is-invalid @enderror">
                                    @error ('title')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;"> Select Brand <sup>*</sup> </lable>
                                    <select  class="form-control my-2 @error('brand') is-invalid @enderror" name="brand" id="">
                                        <option value="">Select</option>
                                        @foreach ($brands as $b)
                                            <option value="{{$b->id}}" @if(old('brand',$vehicle->brand_id) == $b->id ) selected @endif>{{$b->name}}</option>
                                        @endforeach
                                    </select>
                                    @error ('brand')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;">Vehicle Overview <sup>*</sup> </lable>
                                    <textarea name="overview" class="form-control my-2 @error('overview') is-invalid @enderror"  rows="5">{{old('overview',$vehicle->overview)}}</textarea>
                                    @error ('overview')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 ">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;">Price Per Day(in USDT) <sup>*</sup> </lable>
                                    <input value="{{old('perDay',$vehicle->perDay)}}" type="number" name="perDay" class="form-control my-2 @error('perDay') is-invalid @enderror">
                                </div>
                                @error ('perDay')
                                        <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;"> Select Fuel Type <sup>*</sup> </lable>
                                    <select class="form-control my-2 @error('fuel') is-invalid @enderror" name="fuel" id="">
                                        <option value="">Select</option>
                                        <option value="petrol" @if( old('fuel',$vehicle->fuel) == 'petrol' ) selected @endif>PETROL</option>
                                        <option value="diesel" @if( old('fuel',$vehicle->fuel) == 'diesel' ) selected @endif>DIESEL</option>
                                        <option value="cng" @if( old('fuel',$vehicle->fuel) == 'cng' ) selected @endif>CNG</option>
                                    </select>
                                    @error ('fuel')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 ">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;">Model Year <sup>*</sup> </lable>
                                    <input type="number" placeholder="Example 2xxx.." value="{{old('modelyear',$vehicle->modelyear)}}" name="modelyear" class="form-control my-2 @error('modelyear') is-invalid @enderror">
                                </div>
                                @error ('modelyear')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <lable  style="color: black !important; font-weight:bolder !important;">Seating Capacity <sup>*</sup> </lable>
                                    <input name="seatingCapacity" value="{{old('seatingCapacity',$vehicle->seatingCapacity)}}" type="number" class="form-control my-2 @error('seatingCapacity') is-invalid @enderror">
                                    @error ('seatingCapacity')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <img src="{{asset('storage/vehicle/'.$vehicle->image1)}}" alt="" class=" img-thumbnail" style="width: 300px; height:150px; object-fit:cover;">
                                        <br>
                                        <lable  style="color: black !important; font-weight:bolder !important;">Image 1 <sup>*</sup> </lable>
                                        <input  name="image1" class="form-control @error('image1') is-invalid @enderror" type="file"  >
                                    </div>
                                    @error ('image1')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <img src="{{asset('storage/vehicle/'.$vehicle->image2)}}" alt="" class=" img-thumbnail" style="width: 300px; height:150px; object-fit:cover;">
                                        <br>
                                        <lable  style="color: black !important; font-weight:bolder !important;">Image 2 <sup>*</sup> </lable>
                                        <input name="image2" class="form-control @error('image2') is-invalid @enderror" type="file"  >
                                    </div>
                                    @error('image2')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <img src="{{asset('storage/vehicle/'.$vehicle->image1)}}" alt="" class=" img-thumbnail" style="width: 300px; height:150px; object-fit:cover;">
                                        <br>
                                        <lable  style="color: black !important; font-weight:bolder !important;">Image 3 <sup>*</sup> </lable>
                                        <input name="image3" class="form-control @error('image3') is-invalid @enderror" type="file"  >
                                    </div>
                                    @error ('image3')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <img src="{{asset('storage/vehicle/'.$vehicle->image1)}}" alt="" class=" img-thumbnail" style="width: 300px; height:150px; object-fit:cover;">
                                        <br>
                                        <lable  style="color: black !important; font-weight:bolder !important;">Image 4 <sup>*</sup> </lable>
                                        <input name="image4" class="form-control @error('image4') is-invalid @enderror" type="file"  >
                                    </div>
                                    @error ('image4')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h4>Accessories</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="AirConditioner" type="checkbox" value="1" @if($vehicle->AirConditioner == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Air Conditioner
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="PowerDoorLocks" class="form-check-input" type="checkbox" value="1" @if($vehicle->PowerDoorLocks == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Power Door Locks
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="AntiLockBrakingSystem" type="checkbox" value="1"  @if($vehicle->AntiLockBrakingSystem == 1) checked @endif>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            AntiLock Braking System
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="BrakeAssist" class="form-check-input" type="checkbox" value="1"  @if($vehicle->BrakeAssist == 1) checked @endif>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Brake Assist
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="PowerSteering" class="form-check-input" type="checkbox" value="1" @if($vehicle->PowerSteering == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Power Steering
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="DriverAirbag" class="form-check-input" type="checkbox" value="1" @if($vehicle->DriverAirbag == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Driver Airbag
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="PassengerAirbag" class="form-check-input" type="checkbox" value="1" @if($vehicle->PassengerAirbag == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Passenger Airbag
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="PowerWindows" class="form-check-input" type="checkbox" value="1" @if($vehicle->PowerWindows == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Power Windows
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-3">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="CDPlayer" class="form-check-input" type="checkbox" value="1"  @if($vehicle->CDPlayer == 1) checked @endif>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            CD Player
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="CentralLocking" class="form-check-input" type="checkbox" value="1" @if($vehicle->CentralLocking == 1) checked @endif >
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Central Locking
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="CrashSensor" class="form-check-input" type="checkbox" value="1" @if($vehicle->CrashSensor == 1) checked @endif>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Crash Sensor
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input name="LeatherSeats" class="form-check-input" type="checkbox" value="1" @if($vehicle->LeatherSeats == 1) checked @endif>
                                                        <label class="form-check-label" for="flexCheckChecked">
                                                            Leather Seats
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class=" float-right">
                                            <button class="btn btn-danger" type="reset">Cancel</button>
                                            <button class="btn btn-primary">Save changes</button>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.dashboard')
@section('title',"Brand Create")
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Brand</h2>
    </div>
    <div class="card-body">
        <form action="{{route('brand.store')}}" class="w-50 mx-auto" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Brand Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Brand Name ...">
                @error ('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary float-right">Create</button>
        </form>
    </div>
   </div>
@endsection

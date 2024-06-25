@extends('master.layout')
@section('title',"Register")
@section('content')
{{--
    <div class="limiter">
		<div class="container-login100" style=" background-image: url('{{asset('user/img/bg-img/1.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Register
				</span>

                <form action="{{route('register')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input  class="input100  @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        @error ('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input type="email" class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe822;"></span>
                        @error ('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Address">
                        <textarea  class="input100  @error('address') is-invalid @enderror" name="address"  placeholder="Address"></textarea>
						<span class="focus-input100" data-placeholder="&#xe800;"></span>
                        @error ('address')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Phone">
						<input type="text" class="input100  @error('phone') is-invalid @enderror"  name="phone" placeholder="Phone">
						<span class="focus-input100" data-placeholder="&#xe822;"></span>
                        @error ('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Password">
						<input type="password" class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Comfrim Password">
						<input type="password" class="input100  @error('cm_password') is-invalid @enderror" type="password" name="cm_password" placeholder="Comfirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('cm_password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div> --}}


    <div class="login-page bk-img " style="background-image: url({{asset('user/img/adminlogin.jpg')}});">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Sign Up</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
                                <form action="{{route('register')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                                    @csrf

                                    <label for="" class="text-uppercase text-sm">Name</label>
									<input type="text" value="{{old('name')}}" placeholder="Name" name="name" class="form-control mb @error('name') is-invalid @enderror">
                                    @error ('name')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" value="{{old('email')}}" placeholder="Email" name="email" class="form-control mb @error('email') is-invalid @enderror">
                                    @error ('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror



                                    <label for="" class="text-uppercase text-sm">Address</label>
									<textarea placeholder="Address" name="address" class="form-control mb @error('address') is-invalid @enderror">{{old('address')}}</textarea>
                                    @error ('address')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror


                                    <label for="" class="text-uppercase text-sm">Phone</label>
									<input type="number" value="{{old('phone')}}" placeholder="Phone" name="phone" class="form-control mb @error('address') is-invalid @enderror">
                                    @error ('phone')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb  @error('password') is-invalid @enderror">
                                    @error ('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

                                    <label for="" class="text-uppercase text-sm">Comfirm Password</label>
									<input type="password" placeholder="Confrim Password" name="cm_password" class="form-control mb  @error('cm_password') is-invalid @enderror">
                                    @error ('cm_password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
									<button class="btn btn-primary btn-block" name="login" type="submit">Register</button>
                                    <h5>If you have  Account Sign In <a href="{{route('login')}}">yet!</a></h5>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection

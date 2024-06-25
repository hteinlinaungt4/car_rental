@extends('master.layout')
@section('title',"Register")
@section('content')


    <div class="login-page bk-img" style="background-image: url({{asset('user/img/adminlogin.jpg')}});">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
                                <form action="{{route('login')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                                    @csrf
									<label for="" class="text-uppercase text-sm">Email</label>
									<input type="text" placeholder="Email" name="email" class="form-control mb @error('email') is-invalid @enderror">
                                    @error ('email')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb  @error('password') is-invalid @enderror">
                                    @error ('password')
                                        <div class="invalid-feedback">{{$message}}</div>
                                    @enderror



									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

								</form>
                                <h5>If you have not Account Sign Up <a href="{{route('register')}}">yet!</a></h5>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

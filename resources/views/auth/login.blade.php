@extends('auth.app')

@section('content')

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto pt-5">
    <div class="card card-signin my-5">
      <div class="card-body">
        <h5 class="card-title text-center">Sign In</h5>
        <form class="form-signin" method="POST" action="{{ route('login') }}">
         @csrf
          <div class="form-label-group">
            <input id="inputEmail" type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email address Or Number" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="inputEmail">Email address Or Number</label>
          </div>

          <div class="form-label-group">
            <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label for="inputPassword">Password</label>
          </div>
         
          <div class="custom-control custom-checkbox mb-3">
             <input class="custom-control-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
            <label class="custom-control-label" for="remember">Remember password</label>
          </div>
          <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
           <p class="text-center text-white my-4">
                 @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </p>
          <hr class="my-4">
          @if (Route::has('register'))
             <a  href="{{ route('register') }}" class="btn btn-lg btn-google btn-block text-uppercase"><i class="fa fa-lock mr-2"></i> Register</a>
          @endif
         
        </form>
      </div>
    </div>
  </div>
@endsection

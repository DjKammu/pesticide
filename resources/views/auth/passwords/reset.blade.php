@extends('auth.app')
@section('content')

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto pt-5">
    <div class="card card-signin my-5">
      <div class="card-body">
       <h5 class="card-title text-center">{{ __('Reset Password') }}</h5>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-signin" method="POST" action="{{ route('password.update') }}">
            @csrf

             <div class="form-label-group">
                <input id="inputPassword" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputPassword">Email</label>
            </div>

             <div class="form-label-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="password">Password</label>
            </div>

            <div class="form-label-group">
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"
                  placeholder="Confirm Password">
                <label for="password-confirm" >Confirm Password</label>
            </div>
            <button type="submit" class="btn btn-lg btn-primary btn-block text-uppercase">Reset Password</button>
        </form>
     </div>
   </div>
 </div>
@endsection

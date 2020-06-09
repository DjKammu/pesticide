@extends('auth.app')

@section('content')

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto pt-5">
    <div class="card card-signin my-5">
      <div class="card-body">
       <h5 class="card-title text-center">Password Recovery!</h5>
        <p class="text-low-alpha">Instruction will be sent to your email address</p>
        
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-signin" method="POST" action="{{ route('password.email') }}">
        
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

            <button class="btn btn-lg btn-primary btn-block text-uppercase">
            Send Password Reset Link</button>
            
            <hr class="my-4">
            <a href="{{ route('login')}}" class="btn btn-lg btn-primary btn-block text-uppercase waves-effect waves-light"><i class="fa fa-lock mr-2"></i>Login</a>
        </form>
     </div>
   </div>
 </div>
@endsection

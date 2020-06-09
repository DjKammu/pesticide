@extends('auth.app')
@section('content')
<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin mb-5 mt-4">
              <div class="card-body">
                <h5 class="card-title text-center mb-0">Create Account</h5>
                <p class="text-center mb-3">Get started with your free account</p>
              <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf

                  <div class="form-label-group">
                      <input id="inputfirstName" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="First Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                      <label for="inputfirstName">First Name</label>
                  </div>

                  <div class="form-label-group">
                      <input type="text" id="inputlastName" name="last_name" class="form-control" placeholder="Last Name" autofocus>
                      <label for="inputlastName">Last Name</label>
                  </div>

                  <div class="form-label-group">
                     <input type="text" id="sponser_id" name="refer_sponser_id" class="form-control @error('refer_sponser_id') is-invalid @enderror" placeholder="Refer Sponser Id" value="{{ old('refer_sponser_id') }}" autofocus>
                      <p class="text-center">Leave Black , If you havn't Sponser Id</p>
                      @error('refer_sponser_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <label for="sponser_id">Refer Sponser Id </label>
                  </div>

                  <div class="form-label-group">
                    <input id="inputEmail" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="inputEmail">Email address</label>
                  </div>

                  <div class="form-label-group">
                    <input id="number" type="number" placeholder="Number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                    @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="number">Number</label>
                  </div>

                  <div class="form-label-group">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror

                      <label for="password">Password</label>
                  </div>
                  
                  <hr class="my-4">
                  <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-lock mr-2"></i> Create Account </button>
                  <hr class="my-4">
                    <a  href="{{ route('login') }}" class="btn btn-lg btn-primary btn-block text-uppercase"><i class="fa fa-lock mr-2"></i> Login</a>
                </form>
              </div>
            </div>
          </div>
@endsection

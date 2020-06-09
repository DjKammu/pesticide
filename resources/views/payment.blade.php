@extends('layouts.app')
@section('content')

<div class="pt-5 pb-5">
  <div class="container">
    <h2 class="text-center">Pay</h2>
    <div class="row">
      <div class="col-md-2"></div>
    <div class="col-md-8 order-md-2 mb-4">
       @if ($errors->any())
         @foreach ($errors->all() as $error)
              <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{$error}}
              </div>
         @endforeach
       @endif  
       @if(session()->has('success'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('success') }}
            </div>
        @endif
      <p class="text-center"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit </p>
    
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
          <span>Total</span>
          <strong>RS Rs {{App\Payment::DEFAULT_PRICE}}</strong>
        </li>
      </ul>
      <a href="{{ route('pay')}}" class="btn btn-primary btn-lg btn-block">Pay</a>
    </div>
  </div>
  </div>
</div>
@endsection

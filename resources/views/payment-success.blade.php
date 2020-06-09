@extends('layouts.app')
@section('content')
<div class="order-successfull">
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <h3>
              <b>
                <i class="fa fa-check"></i> Payment Successfull!
              </b>
            </h3>
          <div class="successfull card card-body">
            <p class="text-success">
              <b>
              <i class="fa fa-check"></i>
              Thanks For Paying with Us 
            </b>
            </p>
            <div class="row">
              <div class="col-md-8">
                <h6 style="font-weight: 900">Order No: #{{$ORDERID}}</h6>
                <p> {{ @\Carbon\Carbon::parse($TXNDATE)->format('F d-Y')}}</p>
              </div>
              <div class="col-md-4">
                <p class="text-right text-success"><i class="fa fa-circle"></i> {{$RESPMSG}}
                </p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 border-right">
                <h6><b> Trabsaction Id</b></h6>
                <p>{{ $TXNID}}</p>
              </div>
              <div class="col-md-6 border-right">
                <h6><b>Order Id </b></h6>
                <p>{{$ORDERID}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

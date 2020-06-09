@extends('layouts.app')
@section('content')
   <div class="product-1">
    <div class="container">
        <h1><b>Dashboard</b></h1>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <div class="row">
            <div class="col-sm-7">
                    <div class="box bg-white rounded p-4 shadow mb-4">
                        <div class="title mb-4">
                            <h5 class="title-heading-grey">About Me</h5>
                        </div>
                        <div class="row mb-6">
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">Name</p>
                                    </div>
                                    <h6 class="my-2">{{ @$user->name}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">Phone Number</p>
                                    </div>
                                    <h6 class="my-2">{{ @$user->number}}</h6>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mb-6">
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">Sponser Id</p>
                                    </div>
                                    <h6 class="my-2">{{ @$userInfo->sponser_id}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">Wallet</p>
                                    </div>
                                    <h6 class="my-2">{{ $wallet}}</h6>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row mb-6">
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">Direct Members</p>
                                    </div>
                                    <h6 class="my-2">{{ @$direct}}</h6>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="description border-bottom">
                                    <div class="title">
                                        <p class="title-heading-grey mb-0">All Members</p>
                                    </div>
                                    <h6 class="my-2">{{ @$all}}</h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>
    
@endsection

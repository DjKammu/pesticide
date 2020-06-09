@extends('layouts.app')

@section('content')


  <!-- start banner Area -->
      <section class="banner-area relative about-banner" id="home"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Popular Courses   
              </h1> 
              <p class="text-white link-nav"><a href="{{ url('/')}}">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{ url('/courses')}}"> Popular Courses</a></p>
            </div>  
          </div>
        </div>
      </section>
      <!-- End banner Area -->  

      <!-- Start popular-courses Area --> 
      <section class="popular-courses-area section-gap courses-page">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">Popular Courses we offer</h1>
                <p>There is a moment in the life of any aspiring.</p>
              </div>
            </div>
          </div>            
          <div class="row">

             @foreach($courses as $course)
              
              <div class="single-popular-carusel col-lg-3 col-md-6">
              <div class="thumb-wrap relative">
                <div class="thumb relative">
                  <div class="overlay overlay-bg"></div>  
                  <img class="img-fluid" src="{{ url(\Storage::url($course->image)) }}" alt="">
                </div>
                <div class="meta d-flex justify-content-between">
                  <!-- <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p> -->
                  <h4>Free</h4>
                </div>                  
              </div>
              <div class="details">
                <a href="{{ route('course.show',$course->slug)}}">
                  <h4>
                    {{ $course->title}}
                  </h4>
                </a>
                <p>
                  {{ Str::limit(strip_tags($course->description),100) }}                  
                </p>
              </div>
            </div>  

            @endforeach

            @empty($courses)
               <div class="alert alert-warning">
                    <strong>Sorry!</strong> No Courses Found.
               </div>
            @endempty


                                    
          </div>

          {{ $courses->links()}}
          
        </div>  
      </section>
      <!-- End popular-courses Area -->     
@endsection

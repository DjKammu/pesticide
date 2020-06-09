@extends('layouts.app')

@section('content')

<!-- start banner Area -->
      <section class="banner-area relative about-banner" id="home"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                {{ @$course['title'] }}
              </h1> 
              <p class="text-white link-nav"><a href="{{ url('/') }}">Home </a> 
                <span class="lnr lnr-arrow-right"></span>  <a href="{{ url('/courses') }}"> Courses</a>
                <span class="lnr lnr-arrow-right"></span> {{ @$course['title'] }} </p>
            </div>  
          </div>
        </div>
      </section>
      <!-- End banner Area -->  

      <!-- Start course-details Area -->
      <section class="course-details-area pt-120">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 left-contents">
              <div class="main-image">
                <img class="img-fluid" src="{{ url(\Storage::url(@$course->image)) }}" alt="">
              </div>
              <div class="jq-tab-wrapper" id="horizontalTab">
                              <div class="jq-tab-menu">
                                  <div class="jq-tab-title active" data-tab="1">Description</div>
                                  <!-- <div class="jq-tab-title" data-tab="2">Eligibility</div> -->
                                  <div class="jq-tab-title" data-tab="3">Course Outline</div>
                                  <div class="jq-tab-title" data-tab="4">Comments</div>
                                  <div class="jq-tab-title" data-tab="5">Reviews</div>
                              </div>
                              <div class="jq-tab-content-wrapper">

                                  <div class="jq-tab-content active" data-tab="1">
                                     {!! @$course['description'] !!}
                                  </div>

                                  <div class="jq-tab-content" data-tab="2">

                                  </div>

                                  <div class="jq-tab-content" data-tab="3">
                    <ul class="course-list">

                       @foreach($course->lessons as $lesson)
                      
                          <li class="justify-content-between d-flex">
                            <p>{{ $lesson->title}}</p>
                            <a class="primary-btn text-uppercase" href="{{ route('lesson.show',$lesson->slug)}}">View Details</a>
                          </li>

                      @endforeach 

                      @if(count($course->lessons) == 0) 
                         <div class="alert alert-warning">
                              <strong>Sorry!</strong> No Lesson Found.
                         </div>
                      @endif
   

                    </ul>
                                  </div>
                                  <div class="jq-tab-content comment-wrap" data-tab="4">
                            <div class="comments-area">
                                <h4>05 Comments</h4>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Emilly Blunt</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                               <a href="" class="btn-reply text-uppercase">reply</a> 
                                        </div>
                                    </div>
                                </div>  
                                <div class="comment-list left-padding">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c2.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Elsie Cunningham</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                               <a href="" class="btn-reply text-uppercase">reply</a> 
                                        </div>
                                    </div>
                                </div>   
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c4.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a></h5>
                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                <p class="comment">
                                                    Never say goodbye till the end comes!
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                               <a href="" class="btn-reply text-uppercase">reply</a> 
                                        </div>
                                    </div>
                                </div>                                                    
                            </div>
                            <div class="comment-form">
                                <h4>Leave a Comment</h4>
                                <form>
                                    <div class="form-group form-inline">
                                      <div class="form-group col-lg-6 col-md-12 name">
                                        <input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                      </div>
                                      <div class="form-group col-lg-6 col-md-12 email">
                                        <input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                      </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    </div>
                                    <a href="#" class="mt-40 text-uppercase genric-btn primary text-center">Post Comment</a> 
                                </form>
                            </div>                                
                                  </div>
                                  <div class="jq-tab-content" data-tab="5"> 
                                    <div class="review-top row pt-40">
                                      <div class="col-lg-3">
                                        <div class="avg-review">
                                          Average <br>
                                          <span>5.0</span> <br>
                                          (3 Ratings)
                                        </div>
                                      </div>
                                      <div class="col-lg-9">
                                        <h4 class="mb-20">Provide Your Rating</h4>
                                        <div class="d-flex flex-row reviews">
                                          <span>Quality</span>
                          <div class="star">
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                                          <span>Outstanding</span>
                                        </div>
                                        <div class="d-flex flex-row reviews">
                                          <span>Puncuality</span>
                          <div class="star">
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                                          <span>Outstanding</span>
                                        </div>
                                        <div class="d-flex flex-row reviews">
                                          <span>Quality</span>
                          <div class="star">
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                                          <span>Outstanding</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="feedeback">
                                      <h4 class="pb-20">Your Feedback</h4>
                                      <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                                      <a href="#" class="mt-20 primary-btn text-right text-uppercase">Submit</a>
                                    </div>
                            <div class="comments-area mb-30">
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c1.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Emilly Blunt</a>
                              <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                              </div>
                                                </h5>
                                                <p class="comment">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c2.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Elsie Cunningham</a>
                              <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                              </div>
                                                </h5>
                                                <p class="comment">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c3.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a>
                              <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                              </div>
                                                </h5>
                                                <p class="comment">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="comment-list">
                                    <div class="single-comment single-reviews justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="img/blog/c4.jpg" alt="">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">Maria Luna</a>
                              <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                              </div>
                                                </h5>
                                                <p class="comment">
                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum ut sed, dolorum asperiores perspiciatis provident, odit maxime doloremque aliquam.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                                    
                            </div>                                    
                                  </div>                                
                              </div>
                          </div>
            </div>
            <div class="col-lg-4 right-contents">
              <ul>
                <li>
                  <a class="justify-content-between d-flex" href="javascript:void(0)">
                    <p>Teacher’s Name</p> 
                    <span class="or">
                      {{ @($course->teachers[0]->name) ? @($course->teachers[0]->name) : 'Admin' }}
                    </span>
                  </a>
                </li>
                <li>
                  <a class="justify-content-between d-flex" href="#">
                    <p>Course Fee </p>
                    <span>Free</span>
                  </a>
                </li>
                <!-- <li>
                  <a class="justify-content-between d-flex" href="#">
                    <p>Available Seats </p>
                    <span>15</span>
                  </a>
                </li>
                <li>
                  <a class="justify-content-between d-flex" href="#">
                    <p>Schedule </p>
                    <span>2.00 pm to 4.00 pm</span>
                  </a>
                </li> -->
              </ul>
              <!-- <a href="#" class="primary-btn text-uppercase">Enroll the course</a> -->
            </div>
          </div>
        </div>  
      </section>
      <!-- End course-details Area -->
      

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
          </div>

        </div>  
        {{ $courses->links()}}
      </section>
      <!-- End popular-courses Area -->         

      <!-- Start cta-two Area -->
      <section class="cta-two-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 cta-left">
              <h1>Not Yet Satisfied with our Trend?</h1>
            </div>
            <div class="col-lg-4 cta-right">
              <a class="primary-btn wh" href="#">view our blog</a>
            </div>
          </div>
        </div>  
      </section>
      <!-- End cta-two Area -->              


@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

       <title>{{ config('app.name', 'Laravel') }}</title>
       <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
      <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
      <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">              
      <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">     
      <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">      
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body>  
      <header id="header" id="home">
        <div class="header-top">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
                <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                </ul>     
              </div>
              <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
                <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+953 012 3654 896</span></a>
                <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">support@colorlib.com</span></a>     
              </div>
            </div>                  
          </div>
      </div>
        <div class="container main-menu">
          <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
              <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                  <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                  <a href="{{ url('/')}}" class="nav-link">Home</a></li>
                  <li class="nav-item {{ Request::is('about-us') ? 'active' : '' }}">
                  <a href="{{ route('page','about-us')}}" class="nav-link">About</a></li>
                  <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                  <a href="{{ route('page','courses')}}" class="nav-link">Courses</a></li>
                  <!-- <li class="nav-item"><a href="teacher.html" class="nav-link">Teacher</a></li> -->
                  <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                  <!-- <li class="nav-item"><a href="event.html" class="nav-link">Events</a></li> -->
                  <li class="nav-item"><a href="{{ route('page','contact-us') }}" class="nav-link">Contact</a></li>

                  @guest
                  <li class="nav-item ">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item ">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>

                  @else
                  <li class="nav-item ">
                  <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                  </li>
                  <li class="nav-item ">
                  <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
                  </li>
                  @endif
              </ul>
            </nav><!-- #nav-menu-container -->            
          </div>
        </div>
      </header><!-- #header -->

    <!-- <section> -->
         @yield('content')
    <!-- </section> -->
       
      <!-- start footer Area -->    
      <footer class="footer-area section-gap">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h4>Top Products</h4>
                <ul>
                  <li><a href="#">Managed Website</a></li>
                  <li><a href="#">Manage Reputation</a></li>
                  <li><a href="#">Power Tools</a></li>
                  <li><a href="#">Marketing Service</a></li>
                </ul>               
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h4>Quick links</h4>
                <ul>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">Brand Assets</a></li>
                  <li><a href="#">Investor Relations</a></li>
                  <li><a href="#">Terms of Service</a></li>
                </ul>               
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h4>Features</h4>
                <ul>
                  <li><a href="#">Jobs</a></li>
                  <li><a href="#">Brand Assets</a></li>
                  <li><a href="#">Investor Relations</a></li>
                  <li><a href="#">Terms of Service</a></li>
                </ul>               
              </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h4>Resources</h4>
                <ul>
                  <li><a href="#">Guides</a></li>
                  <li><a href="#">Research</a></li>
                  <li><a href="#">Experts</a></li>
                  <li><a href="#">Agencies</a></li>
                </ul>               
              </div>
            </div>                                    
            <div class="col-lg-4  col-md-6 col-sm-6">
              <div class="single-footer-widget">
                <h4>Newsletter</h4>
                <p>Stay update with our latest</p>
                <div class="" id="mc_embed_signup">
                   <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
                    <div class="input-group">
                      <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
                      <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                          <span class="lnr lnr-arrow-right"></span>
                        </button>    
                      </div>
                        <div class="info"></div>  
                    </div>
                  </form> 
                </div>
              </div>
            </div>                      
          </div>
          <div class="footer-bottom row align-items-center justify-content-between">
            <p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            <div class="col-lg-6 col-sm-12 footer-social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-dribbble"></i></a>
              <a href="#"><i class="fa fa-behance"></i></a>
            </div>
          </div>            
        </div>
      </footer> 
      <!-- End footer Area -->  


      <script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>      
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>      
      <script src="{{ asset('js/hoverIntent.js') }}"></script>
      <script src="{{ asset('js/superfish.min.js') }}"></script> 
      <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
      <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script> 
        <script src="{{ asset('js/jquery.tabs.min.js') }}"></script>           
      <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>  
      <script src="{{ asset('js/owl.carousel.min.js') }}"></script>                  
      <script src="{{ asset('js/mail-script.js') }}"></script> 
      <script src="{{ asset('js/main.js') }}"></script>  
       @yield('pagescript')
    </body>
  </html>
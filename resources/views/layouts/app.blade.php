<!DOCTYPE html>
<html lang="en">

<head>
  <title>WaterBoat &mdash; Website Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Dancing+Script:400,700|Muli:300,400" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">

  <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
  <link href="{{ asset('assets/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    
    <div class="header-top bg-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-lg-3">
            <a href="index.html">
              <img src="{{ asset('assets/images/logo.png') }}" alt="Image" class="img-fluid">
              <!-- <strong>Water</strong>Boat -->
            </a>
          </div>
          <div class="col-lg-3 d-none d-lg-block">

            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-location-arrow text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">San Francisco</span>
                <span class="caption-text">Mountain View, Fake st., CA</span>
              </div>
            </div>

          </div>
          <div class="col-lg-3 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-phone text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">000 209 392 312</span>
                <span class="caption-text">Toll free</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 d-none d-lg-block">
            <div class="quick-contact-icons d-flex">
              <div class="icon align-self-start">
                <span class="icon-envelope text-primary"></span>
              </div>
              <div class="text">
                <span class="h4 d-block">info@gmail.com</span>
                <span class="caption-text">Gournadi, 1230 Bariasl</span>
              </div>
            </div>
          </div>

          <div class="col-6 d-block d-lg-none text-right">
              <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      


      
      <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          
          <div class="mx-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
  <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
    <li class="active">
      <a href="{{ route('home') }}" class="nav-link text-left">Home</a>
    </li>
    <li>
      <a href="{{ route('about') }}" class="nav-link text-left">About Us</a>
    </li>
    <li>
      <a href="{{ route('services') }}" class="nav-link text-left">Services</a>
    </li>
    <li>
      <a href="{{ route('testimonials') }}" class="nav-link text-left">Testimonials</a>
    </li>
    <li>
      <a href="{{ route('blog') }}" class="nav-link text-left">Blog</a>
    </li>
    <li>
      <a href="{{ route('contact') }}" class="nav-link text-left">Contact</a>
    </li>
  </ul>
</nav>


          </div>
         
        </div>
      </div>

    </div>
    
    </div>
    


    @yield('content')

     </div>
    </div>
    

  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('assets/js/aos.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.mb.YTPlayer.min.js') }}"></script>




  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
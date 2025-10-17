<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Is Yours - Log In</title>

  <!-- Stylesheets -->
  <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  

  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

  <body>
    <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Header Span -->
    {{-- <span class="header-span"></span> --}}
    
    {{-- @include('partials/header_candidate') --}}
    
    
  
    <style>
      @media (min-width: 992px) {
        .main-content-responsive {
          padding-left: 300px !important;
        }
      }
      @media (max-width: 991.98px) {
        .main-content-responsive {
          padding-left: 1rem !important;
        }
      }
    </style>
    <div class="row">
      <div class="">
        @yield('content')
        @include('layouts/footer')
      </div>
    </div>
    


  </div><!-- End Page Wrapper -->



<!-- 
  <script src="js/jquery.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/chosen.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.js"></script>
  <script src="js/jquery.modal.min.js"></script>
  <script src="js/mmenu.polyfills.js"></script>
  <script src="js/mmenu.js"></script>
  <script src="js/appear.js"></script>
  <script src="js/ScrollMagic.min.js"></script>
  <script src="js/rellax.min.js"></script>
  <script src="js/owl.js"></script>
  <script src="js/wow.js"></script>
  <script src="js/script.js"></script>
  <script src="js/api/job_single.js"></script> -->


  <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/chosen.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
    <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
    <script src="{{ asset('js/mmenu.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('js/rellax.min.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/api/login.js') }}"></script>
    @yield('js')
  
  <!--Google Map APi Key-->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw&#038;ver=5.2.4"></script>
  <script src="js/map-script.js"></script>
  <!--End Google Map APi-->
</body>

</html>
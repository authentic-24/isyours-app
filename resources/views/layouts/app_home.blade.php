<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Is Yours - Perfect Match Jobs</title>

  <!-- Stylesheets -->
  <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  

  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body data-anm=".anm">

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

   @include('home/header')

   @yield('content')
  </div><!-- End Page Wrapper -->

    <!-- Main Footer -->
    @include('layouts/footer')
    <!-- End Main Footer -->




  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/logo.change.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/chosen.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
  <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
  <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
  <script src="{{ asset('js/mmenu.js') }}"></script>
  <script src="{{ asset('js/appear.js') }}"></script>
  <script src="{{ asset('js/anm.min.js') }}"></script>
  <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('js/rellax.min.js') }}"></script>
  <script src="{{ asset('js/owl.js') }}"></script>
  <script src="{{ asset('js/wow.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
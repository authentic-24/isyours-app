 <!-- Main Header-->
 <header class="main-header -type-11">
  <!-- Main box -->
  <div class="main-box">
    <!--Nav Outer -->
    <div class="nav-outer">
      <div class="logo-box">
        <div class="logo"><a href="#"><img class="logoChange" src="{{ asset('images/logo-main-white-big.svg')}}" alt="Is Yours logo" title="Is Yours Logo"></a></div>
      </div>

      <nav class="nav main-menu">
        <ul class="navigation" id="navbar">
          <li><a href="{{ route('home') }}">
            <span>Home</span> 
          </a></li>
          <li><a href="#">
            <li><a href="{{ route('about') }}">
            <span>About Us</span>
          </a></li>
        </ul>
      </nav>
      <!-- Main Menu End-->
    </div>

    <div class="outer-box">
      <!-- Login/Register -->
      <div class="btn-box">
        <a href="{{ route('web_login') }}" class="theme-btn btn-style-three btn-white-10">Login / Register</a>
        <a href="#" class="theme-btn btn-style-seven btn-post-job">Job Post</a>
      </div>
    </div>
  </div>

  <!-- Mobile Header -->
  <div class="mobile-header">
    <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo-main.svg')}}" alt="Is Yours Mobile logo" title="Is Yours Mobile Logo"></a></div>

    <!--Nav Box-->
    <div class="nav-outer clearfix">

      <div class="outer-box">
        <!-- Login/Register -->
        <div class="login-box">
          {{-- <a href="{{ route('web_login') }}" class=""><span class="icon-user"></span></a> --}}
          <a href="#" class=""><span class="icon-user"></span></a>
        </div>

        <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
      </div>
    </div>
  </div>

  <!-- Mobile Nav -->
  <div id="nav-mobile"></div>
</header>

<!-- Estilos para ajustar el tamaño del logo -->
<style>
.main-header .logo img {
  max-height: 45px !important;
  width: auto !important;
}

.mobile-header .logo img {
  max-height: 35px !important;
  width: auto !important;
}

/* Ajuste adicional para diferentes resoluciones */
@media (max-width: 1366px) {
  .main-header .logo img {
    max-height: 40px !important;
  }
}

@media (max-width: 991px) {
  .mobile-header .logo img {
    max-height: 32px !important;
  }
}
.btn-post-job {
  background-color: #f39c12;
  color: #fff;
}
.btn-post-job:hover {
  background-color: #e67e22;
  color: #fff;
}
</style>

<!--End Main Header -->
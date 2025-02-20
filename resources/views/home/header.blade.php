 <!-- Main Header-->
 <header class="main-header -type-11">
  <!-- Main box -->
  <div class="main-box">
    <!--Nav Outer -->
    <div class="nav-outer">
      <div class="logo-box">
        <div class="logo"><a href="#"><img class="logoChange" src="{{ asset('images/logo-main-big.svg')}}" alt="Is Yours logo" title="Is Yours Logo"></a></div>
      </div>

      <nav class="nav main-menu">
        <ul class="navigation" id="navbar">
          <li><a href="{{ route('home') }}">
            <span>Home</span> 
          </a></li>
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
        <!-- <a href="dashboard-post-job.html" class="theme-btn btn-style-one btn-white"><span class="btn-title">JOB POST</span></a> -->
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
          <a href="{{ route('web_login') }}" class=""><span class="icon-user"></span></a>
        </div>

        <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
      </div>
    </div>
  </div>

  <!-- Mobile Nav -->
  <div id="nav-mobile"></div>
</header>
<!--End Main Header -->
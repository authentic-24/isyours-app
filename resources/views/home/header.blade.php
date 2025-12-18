<!-- Language Bar -->
<div id="language-bar" style="background-color: #7e7e7e; padding: 2px 0; width: 100%; position: fixed; top: 0; left: 0; z-index: 999; transition: transform 0.3s ease;">
  <div style="width: 100%; padding: 0 20px; text-align: right;">
    <select onchange="window.location.href=this.value" style="border: none; padding: 2px 2px !important; font-size: 7px; border-radius: 1px; background: #aaaaaa; cursor: pointer;">
      <option value="{{ route('language.switch', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
      <option value="{{ route('language.switch', 'es') }}" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
    </select>
  </div>
</div>
<!-- End Language Bar -->

<!-- Main Header-->
 <header class="main-header -type-11" id="main-header" style="top: 5px !important; transition: top 0.3s ease;">
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
            <span>{{ __('home.home') }}</span> 
          </a></li>
          <li><a href="#">
            <li><a href="{{ route('about') }}">
            <span>{{ __('home.about_us') }}</span>
          </a></li>
        </ul>
      </nav>
      <!-- Main Menu End-->
    </div>

    <div class="outer-box">
      <!-- Login/Register -->
      <div class="btn-box">
        <a href="{{ route('web_login') }}" class="theme-btn btn-style-three btn-white-10">{{ __('home.log_in') }} / {{ __('home.register') }}</a>
        {{-- <a href="{{ route('job.create') }}" class="theme-btn btn-style-seven btn-post-job">Job Post</a> --}}
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
body {
  padding-top: 20px !important;
}

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

<!-- Script para ocultar barra de idioma al hacer scroll -->
<script>
let lastScroll = 0;
const languageBar = document.getElementById('language-bar');
const mainHeader = document.getElementById('main-header');

window.addEventListener('scroll', function() {
  const currentScroll = window.pageYOffset;
  
  if (currentScroll > 50) {
    // Ocultar barra de idioma
    languageBar.style.transform = 'translateY(-100%)';
    mainHeader.style.top = '0px';
  } else {
    // Mostrar barra de idioma
    languageBar.style.transform = 'translateY(0)';
    mainHeader.style.top = '5px';
  }
  
  lastScroll = currentScroll;
});
</script>

<!--End Main Header -->
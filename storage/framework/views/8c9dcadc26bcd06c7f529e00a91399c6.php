

<!-- Main Header-->
 <header class="main-header -type-11" id="main-header">
  <!-- Main box -->
  <div class="main-box">
    <!--Nav Outer -->
    <div class="nav-outer">
      <div class="logo-box">
        <div class="logo"><a href="#"><img class="logoChange" src="<?php echo e(asset('images/logo-main-white-big.svg')); ?>" alt="Is Yours logo" title="Is Yours Logo"></a></div>
      </div>

      <nav class="nav main-menu">
        <ul class="navigation" id="navbar">
          <li><a href="<?php echo e(route('home')); ?>">
            <span><?php echo e(__('home.home')); ?></span> 
          </a></li>
          <li><a href="#">
            <li><a href="<?php echo e(route('about')); ?>">
            <span><?php echo e(__('home.about_us')); ?></span>
          </a></li>
        </ul>
      </nav>
      <!-- Main Menu End-->
    </div>

    <div class="outer-box">
      <!-- Login/Register -->
      <div class="btn-box">
        <a href="<?php echo e(route('web_login')); ?>" class="theme-btn btn-style-three btn-white-10"><?php echo e(__('home.log_in')); ?> / <?php echo e(__('home.register')); ?></a>
        
      </div>
    </div>
  </div>

  <!-- Mobile Header -->
  <div class="mobile-header">
    <div class="logo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="Is Yours Mobile logo" title="Is Yours Mobile Logo"></a></div>

    <!--Nav Box-->
    <div class="nav-outer clearfix">

      <div class="outer-box">
        <!-- Login/Register -->
        <div class="login-box">
          
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



<!--End Main Header --><?php /**PATH C:\laragon\www\isyours\resources\views/home/header.blade.php ENDPATH**/ ?>
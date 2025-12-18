 <!-- Main Header-->
 <header class="main-header header-shaddow">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="" title=""></a></div>
            </div>

            <nav class="nav main-menu">
              <ul class="navigation" id="navbar">
                <li><a href="<?php echo e(route('home')); ?>">
                  <span><?php echo e(__('home.home')); ?></span> 
                </a></li>
                <li><a href="<?php echo e(route('about')); ?>">
                  <span>About Us</span>
                </a></li>
              </ul>
            </nav>
            <!-- Main Menu End-->
          </div>

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="btn-box">
              <!-- <a href="login-popup.html" class="theme-btn btn-style-three call-modal">Login / Register</a> -->
              <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="<?php echo e(route('web_login')); ?>" class=""><span class="icon-user"></span></a>
            </div>

            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>
      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <!--End Main Header --><?php /**PATH C:\laragon\www\isyours\resources\views\login\header.blade.php ENDPATH**/ ?>
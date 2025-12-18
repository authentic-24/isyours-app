<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Is Yours - Log In</title>

  <!-- Stylesheets -->
  <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  

  <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">
  <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">

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
    
    
    <?php echo $__env->make('partials/header_candidate', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <style>
      body {
        background: linear-gradient(135deg, #ede9fe 0%, #ddd6fe 50%, #ede9fe 100%);
        background-attachment: fixed;
      }
      
      @media (min-width: 992px) {
        .main-content-with-sidebar {
          margin-left: 300px;
          transition: all 300ms ease;
          min-height: 100vh;
          display: flex;
          flex-direction: column;
          padding: 20px 20px 0 0;
        }
      }
      @media (max-width: 991.98px) {
        .main-content-with-sidebar {
          margin-left: 0;
          min-height: 100vh;
          display: flex;
          flex-direction: column;
          padding: 10px;
        }
      }
      
      .content-wrapper {
        flex: 1;
        padding: 0;
        background: #ffffff;
        margin-bottom: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
      }
      
      .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 25px;
      }

      @media (max-width: 991.98px) {
        .content-wrapper {
          margin: 10px;
          border-radius: 8px;
        }
      }
    </style>
    
    <div class="main-content-with-sidebar">
      <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
      </div>
        <?php echo $__env->make('layouts/footerapp', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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


  <script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/chosen.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.fancybox.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.modal.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mmenu.polyfills.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('js/appear.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ScrollMagic.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/rellax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl.js')); ?>"></script>
    <script src="<?php echo e(asset('js/wow.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
    <script src="<?php echo e(asset('js/api/login.js')); ?>"></script>
    <?php echo $__env->yieldContent('js'); ?>
  
  <!--Google Map APi Key-->
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyDaaCBm4FEmgKs5cfVrh3JYue3Chj1kJMw&#038;ver=5.2.4"></script>
  <script src="js/map-script.js"></script>
  <!--End Google Map APi-->
</body>

</html><?php /**PATH C:\laragon\www\isyours\resources\views\layouts\app2.blade.php ENDPATH**/ ?>
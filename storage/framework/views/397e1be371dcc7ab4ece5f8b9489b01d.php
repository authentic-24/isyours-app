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

  <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->

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
    <span class="header-span"></span>
    <?php echo $__env->make('login/header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->yieldContent('content'); ?>

  </div><!-- End Page Wrapper -->

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
    <?php echo $__env->yieldContent('js'); ?>

  </body>

</html> <?php /**PATH C:\laragon\www\isyours\resources\views\login\layout_index.blade.php ENDPATH**/ ?>
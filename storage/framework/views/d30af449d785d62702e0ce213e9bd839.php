<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->make('offer/partial_create_job', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\offer\create.blade.php ENDPATH**/ ?>
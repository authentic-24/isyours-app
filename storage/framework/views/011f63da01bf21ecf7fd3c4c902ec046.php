<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
    <?php echo $__env->make('offer/partial_job_detail', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    
  <?php if(session()->has('admin') || (!is_null($company) && $company->id == $offer->company_id )): ?>
    <?php echo $__env->make('offer/partial_candidate_list', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\offer\show.blade.php ENDPATH**/ ?>
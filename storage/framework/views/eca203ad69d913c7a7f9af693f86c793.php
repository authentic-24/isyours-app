

<?php $__env->startSection('content'); ?>
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>My Applications</h1>
                <ul class="page-breadcrumb">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li>My Applications</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        
                        <?php if(session('message')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('message')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if($applications->count() > 0): ?>
                            <div class="ls-switcher">
                                <div class="showing-result">
                                    <div class="text">Showing <strong><?php echo e($applications->count()); ?></strong> applications</div>
                                </div>
                            </div>

                            <!-- Job Listings -->
                            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo">
                                                <?php if($application->company && $application->company->logo): ?>
                                                    <img src="<?php echo e(asset('storage/' . $application->company->logo)); ?>" alt="<?php echo e($application->company->name); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('images/resource/company-logo/default.png')); ?>" alt="Company">
                                                <?php endif; ?>
                                            </span>
                                            <h4>
                                                <a href="<?php echo e(route('web.offer.show', $application->id)); ?>">
                                                    <?php echo e($application->jobTitle->name ?? 'N/A'); ?> - <?php echo e($application->jobLevel->name ?? 'N/A'); ?>

                                                </a>
                                            </h4>

                                            <ul class="job-info">
                                                <?php if($application->company): ?>
                                                    <li><span class="icon flaticon-briefcase"></span> <?php echo e($application->company->name); ?></li>
                                                <?php endif; ?>
                                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($application->city->name ?? 'N/A'); ?>, <?php echo e($application->city->state->code ?? ''); ?></li>
                                                <li><span class="icon flaticon-clock-3"></span> <?php echo e($application->jobType->name ?? 'N/A'); ?></li>
                                                <?php if($application->offered_salary): ?>
                                                    <li><span class="icon flaticon-money"></span> $<?php echo e(number_format($application->offered_salary)); ?></li>
                                                <?php endif; ?>
                                            </ul>

                                            <ul class="job-other-info">
                                                <li class="time">Applied <?php echo e(\Carbon\Carbon::parse($application->pivot->created_at ?? $application->created_at)->diffForHumans()); ?></li>
                                            </ul>

                                            <button class="bookmark-btn">
                                                <span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <!-- No Applications -->
                            <div class="text-center" style="padding: 50px 0;">
                                <div class="icon" style="font-size: 80px; color: #ddd; margin-bottom: 20px;">
                                    <i class="flaticon-briefcase"></i>
                                </div>
                                <h3>No Applications Yet</h3>
                                <p style="margin-bottom: 30px;">You haven't applied to any jobs yet. Start exploring opportunities!</p>
                                <a href="<?php echo e(route('web.offer.index')); ?>" class="theme-btn btn-style-one">Browse Jobs</a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Listing Section -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\candidates\my_applications.blade.php ENDPATH**/ ?>
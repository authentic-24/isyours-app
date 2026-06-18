

<?php $__env->startSection('content'); ?>
<style>
/* Ocultar header */
.main-header,
#language-bar {
    display: none !important;
}

body {
    padding-top: 0 !important;
    background: #ffffff;
}

.legal-section {
    min-height: 100vh;
    background: #ffffff;
    padding: 60px 0;
}

.legal-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 40px;
}

.legal-header {
    text-align: center;
    margin-bottom: 40px;
    padding-bottom: 30px;
    border-bottom: 2px solid #e5e7eb;
}

.legal-title {
    font-size: 32px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 10px;
}

.legal-date {
    font-size: 14px;
    color: #6b7280;
}

.legal-content {
    color: #374151;
    line-height: 1.8;
}

.legal-content h2 {
    font-size: 24px;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 40px;
    margin-bottom: 20px;
}

.legal-content h3 {
    font-size: 18px;
    font-weight: 600;
    color: #1a1a1a;
    margin-top: 30px;
    margin-bottom: 15px;
}

.legal-content p {
    margin-bottom: 15px;
}

.legal-content ul {
    margin-bottom: 20px;
    padding-left: 30px;
}

.legal-content li {
    margin-bottom: 10px;
}

.back-link {
    display: inline-block;
    margin-bottom: 30px;
    color: #1a1a1a;
    text-decoration: none;
    font-weight: 600;
}

.back-link:hover {
    color: #333333;
}
</style>

<section class="legal-section">
    <div class="legal-container">
        <a href="javascript:history.back()" class="back-link">
            <i class="fas fa-arrow-left"></i> <?php echo e(__('home.back')); ?>

        </a>

        <div class="legal-header">
            <h1 class="legal-title"><?php echo e(__('home.terms_conditions')); ?></h1>
            <p class="legal-date"><?php echo e(__('home.last_updated')); ?>: <?php echo e(__('home.january')); ?> 2026</p>
        </div>

        <div class="legal-content">
            <h2>1. <?php echo e(__('home.acceptance_of_terms')); ?></h2>
            <p>
                <?php echo e(__('home.terms_acceptance_text')); ?>

            </p>

            <h2>2. <?php echo e(__('home.use_of_service')); ?></h2>
            <p>
                <?php echo e(__('home.service_use_text')); ?>

            </p>

            <h3>2.1 <?php echo e(__('home.eligibility')); ?></h3>
            <p>
                <?php echo e(__('home.eligibility_text')); ?>

            </p>

            <h3>2.2 <?php echo e(__('home.account_registration')); ?></h3>
            <p>
                <?php echo e(__('home.registration_text')); ?>

            </p>

            <h2>3. <?php echo e(__('home.user_responsibilities')); ?></h2>
            <ul>
                <li><?php echo e(__('home.responsibility_1')); ?></li>
                <li><?php echo e(__('home.responsibility_2')); ?></li>
                <li><?php echo e(__('home.responsibility_3')); ?></li>
                <li><?php echo e(__('home.responsibility_4')); ?></li>
            </ul>

            <h2>4. <?php echo e(__('home.prohibited_activities')); ?></h2>
            <p>
                <?php echo e(__('home.prohibited_text')); ?>

            </p>

            <h2>5. <?php echo e(__('home.intellectual_property')); ?></h2>
            <p>
                <?php echo e(__('home.ip_text')); ?>

            </p>

            <h2>6. <?php echo e(__('home.termination')); ?></h2>
            <p>
                <?php echo e(__('home.termination_text')); ?>

            </p>

            <h2>7. <?php echo e(__('home.limitation_of_liability')); ?></h2>
            <p>
                <?php echo e(__('home.liability_text')); ?>

            </p>

            <h2>8. <?php echo e(__('home.contact_us')); ?></h2>
            <p>
                <?php echo e(__('home.contact_text')); ?>

            </p>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/legal/terms.blade.php ENDPATH**/ ?>
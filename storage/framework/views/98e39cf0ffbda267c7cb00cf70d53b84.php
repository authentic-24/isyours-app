

<?php $__env->startSection('dashboard_title', 'My Applications'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .my-apps {
            padding: 8px 0 12px;
        }

        .my-apps .soft-alert {
            border-radius: 12px;
            border: 1px solid #dce2f3;
            box-shadow: 0 8px 24px rgba(49, 39, 131, 0.08);
        }

        .my-apps .apps-toolbar {
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid #e1e7f5;
            border-radius: 16px;
            padding: 14px 16px;
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .my-apps .apps-kicker {
            margin: 0;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            font-weight: 700;
        }

        .my-apps .apps-total {
            margin: 2px 0 0;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
            color: #1a086e;
            font-size: 1.15rem;
        }

        .my-apps .apps-grid {
            margin-top: 2px;
        }

        .my-apps .app-card {
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid #dce2f3;
            border-radius: 18px;
            padding: 16px;
            box-shadow: 0 10px 26px rgba(49, 39, 131, 0.08);
            height: 100%;
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .my-apps .app-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(49, 39, 131, 0.14);
        }

        .my-apps .app-head {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 10px;
        }

        .my-apps .app-logo {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            overflow: hidden;
            background: linear-gradient(135deg, #4b41df, #1a086e);
            display: grid;
            place-items: center;
            color: #fff;
            font-weight: 700;
            flex: 0 0 auto;
        }

        .my-apps .app-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .my-apps .app-title {
            margin: 0;
            font-size: 16px;
            line-height: 1.35;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
        }

        .my-apps .app-title a {
            color: #111827;
            text-decoration: none;
        }

        .my-apps .app-title a:hover {
            color: #1a086e;
        }

        .my-apps .app-meta {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .my-apps .app-meta li {
            color: #4b5563;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .my-apps .app-meta .icon {
            color: #4b41df;
        }

        .my-apps .app-foot {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .my-apps .app-badge {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            border: 1px solid #dce2f3;
            background: #f3f6ff;
            color: #2f2f74;
            font-size: 12px;
            font-weight: 700;
            padding: 5px 10px;
        }

        .my-apps .app-link {
            font-size: 13px;
            color: #1a086e;
            text-decoration: none;
            font-weight: 700;
        }

        .my-apps .app-link:hover {
            color: #4b41df;
        }

        .my-apps .empty-state {
            padding: 44px 12px;
            text-align: center;
            border: 1px dashed #d5ddf1;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.62);
        }

        .my-apps .empty-icon {
            font-size: 64px;
            color: #c8d1e8;
            margin-bottom: 14px;
            line-height: 1;
        }

        .my-apps .empty-title {
            margin-bottom: 8px;
            color: #1a086e;
            font-family: "Manrope", sans-serif;
            font-size: 1.25rem;
            font-weight: 800;
        }

        .my-apps .empty-copy {
            margin-bottom: 20px;
            color: #6b7280;
        }

    </style>

    <section class="my-apps">
        <div class="auto-container">
            <div class="apps-toolbar">
                <div>
                    <p class="apps-kicker">Candidate Activity</p>
                    <p class="apps-total"><?php echo e($applications->count()); ?> applications tracked</p>
                </div>
                <a href="<?php echo e(route('web.offer.index')); ?>" class="theme-btn btn-style-one">Browse Jobs</a>
            </div>

            <div class="ls-outer">
                        
                        <?php if(session('message')): ?>
                            <div class="alert alert-success alert-dismissible fade show soft-alert" role="alert">
                                <?php echo e(session('message')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php if($applications->count() > 0): ?>
                            <div class="row apps-grid">
                                <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $companyName = $application->company->name ?? 'Company';
                                        $logoInitial = strtoupper(substr($companyName, 0, 1));
                                    ?>
                                    <div class="col-lg-6 col-md-12 mb-3">
                                        <article class="app-card">
                                            <div class="app-head">
                                                <div class="app-logo">
                                                    <?php if($application->company && $application->company->logo): ?>
                                                        <img src="<?php echo e(asset('storage/' . $application->company->logo)); ?>" alt="<?php echo e($companyName); ?>">
                                                    <?php else: ?>
                                                        <?php echo e($logoInitial); ?>

                                                    <?php endif; ?>
                                                </div>
                                                <h3 class="app-title">
                                                    <a href="<?php echo e(route('web.offer.show', $application->id)); ?>">
                                                        <?php echo e($application->jobTitle->name ?? 'N/A'); ?> - <?php echo e($application->jobLevel->name ?? 'N/A'); ?>

                                                    </a>
                                                </h3>
                                            </div>

                                            <ul class="app-meta">
                                                <?php if($application->company): ?>
                                                    <li><span class="icon flaticon-briefcase"></span> <?php echo e($application->company->name); ?></li>
                                                <?php endif; ?>
                                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($application->city->name ?? 'N/A'); ?>, <?php echo e($application->city->state->code ?? ''); ?></li>
                                                <li><span class="icon flaticon-clock-3"></span> <?php echo e($application->jobType->name ?? 'N/A'); ?></li>
                                                <?php if($application->offered_salary): ?>
                                                    <li><span class="icon flaticon-money"></span> $<?php echo e(number_format($application->offered_salary)); ?></li>
                                                <?php endif; ?>
                                            </ul>

                                            <div class="app-foot">
                                                <span class="app-badge">Applied <?php echo e(\Carbon\Carbon::parse($application->pivot->created_at ?? $application->created_at)->diffForHumans()); ?></span>
                                                <a class="app-link" href="<?php echo e(route('web.offer.show', $application->id)); ?>">View Details</a>
                                            </div>
                                        </article>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <!-- No Applications -->
                            <div class="empty-state">
                                <div class="empty-icon">
                                    <i class="flaticon-briefcase"></i>
                                </div>
                                <h3 class="empty-title">No Applications Yet</h3>
                                <p class="empty-copy">You haven't applied to any jobs yet. Start exploring opportunities!</p>
                                <a href="<?php echo e(route('web.offer.index')); ?>" class="theme-btn btn-style-one">Browse Jobs</a>
                            </div>
                        <?php endif; ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/candidates/my_applications.blade.php ENDPATH**/ ?>
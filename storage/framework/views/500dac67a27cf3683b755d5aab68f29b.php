<?php $__env->startSection('dashboard_title', 'Jobs'); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .offers-view {
            padding: 8px 0 12px;
        }

        .offers-toolbar {
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

        .offers-kicker {
            margin: 0;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6b7280;
            font-weight: 700;
        }

        .offers-total {
            margin: 2px 0 0;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
            color: #1a086e;
            font-size: 1.15rem;
        }

        .offers-grid {
            margin-top: 2px;
        }

        .offer-card {
            background: rgba(255, 255, 255, 0.84);
            border: 1px solid #dce2f3;
            border-radius: 18px;
            padding: 16px;
            box-shadow: 0 10px 26px rgba(49, 39, 131, 0.08);
            height: 100%;
            transition: transform .18s ease, box-shadow .18s ease;
        }

        .offer-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(49, 39, 131, 0.14);
        }

        .offer-head {
            display: flex;
            gap: 12px;
            align-items: center;
            margin-bottom: 10px;
        }

        .offer-logo {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4b41df, #1a086e);
            color: #fff;
            font-size: 15px;
            font-weight: 700;
            display: grid;
            place-items: center;
            text-transform: uppercase;
        }

        .offer-title {
            margin: 0;
            font-size: 16px;
            line-height: 1.35;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
        }

        .offer-title a {
            color: #111827;
            text-decoration: none;
        }

        .offer-title a:hover {
            color: #1a086e;
        }

        .offer-meta {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .offer-meta li {
            color: #4b5563;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .offer-meta .icon {
            color: #4b41df;
        }

        .offer-foot {
            margin-top: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .offer-badge {
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

        .offer-link {
            font-size: 13px;
            color: #1a086e;
            text-decoration: none;
            font-weight: 700;
        }

        .offer-link:hover {
            color: #4b41df;
        }

        .offers-empty {
            text-align: center;
            padding: 50px 16px;
            border: 1px dashed #d5ddf1;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.62);
        }

        .offers-empty h3 {
            margin-bottom: 8px;
            color: #1a086e;
            font-family: "Manrope", sans-serif;
            font-weight: 800;
        }

        .offers-empty p {
            color: #6b7280;
            margin-bottom: 0;
        }
    </style>

    <section class="offers-view">
        <div class="auto-container">
            <div class="offers-toolbar">
                <div>
                    <p class="offers-kicker">Open Positions</p>
                    <p class="offers-total"><?php echo e(count($offers)); ?> jobs available</p>
                </div>
                <?php if(session('admin') || session('employer')): ?>
                <a href="<?php echo e(route('web.offer.create')); ?>" class="theme-btn btn-style-one">Post a Job</a>
                <?php endif; ?>
            </div>

            <?php if(count($offers) > 0): ?>
                <div class="row offers-grid">
                    <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $offer = (object) $offer;
                        $titleInitial = strtoupper(substr(($offer->job_title->name ?? 'J'), 0, 1));
                    ?>
                        <div class="col-lg-6 col-md-12 mb-3">
                            <article class="offer-card">
                                <div class="offer-head">
                                    <div class="offer-logo"><?php echo e($titleInitial); ?></div>
                                    <h3 class="offer-title">
                                        <a href="<?php echo e(route('web.offer.show', ['id' => $offer->id ])); ?>">
                                            <?php echo e($offer->job_level->name ?? 'Job'); ?> / <?php echo e($offer->job_title->name ?? 'Title'); ?>

                                        </a>
                                    </h3>
                                </div>

                                <ul class="offer-meta">
                                    <li><span class="icon flaticon-map-locator"></span> <?php echo e($offer->city->name ?? '-'); ?>, <?php echo e($offer->city->state->code ?? ''); ?></li>
                                    <li><span class="icon flaticon-clock-3"></span> <?php echo e(\Carbon\Carbon::parse($offer->created_at)->diffForHumans()); ?></li>
                                    <li><span class="icon flaticon-money"></span> $<?php echo e($offer->rate ?? '0'); ?> / hour</li>
                                    <?php if(session()->has('admin') || (!is_null($company) && $company->id == $offer->company_id ) ): ?>
                                        <li><span class="icon flaticon-user"></span> <?php echo e($offer->candidate_count ?? '0'); ?> candidates</li>
                                    <?php endif; ?>
                                </ul>

                                <div class="offer-foot">
                                    <span class="offer-badge"><?php echo e($offer->job_type->name ?? 'Job Type'); ?></span>
                                    <a class="offer-link" href="<?php echo e(route('web.offer.show', ['id' => $offer->id ])); ?>">View Details</a>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="offers-empty">
                    <h3>No jobs available</h3>
                    <p>There are no offers published right now.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/offer/index.blade.php ENDPATH**/ ?>
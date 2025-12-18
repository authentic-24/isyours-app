<?php $__env->startSection('content'); ?>
    <!-- Banner Section-->
    <section class="banner-section -type-15" style="background-image: url('<?php echo e(asset('images/index-15/header/bg.png')); ?>');">
        <div class="auto-container">
            <div class="cotnent-box">
                <div class="title-box wow fadeInUp" data-wow-delay="300ms">
                    <h3 class="main-title"><?php echo e(__('home.join_explore_jobs')); ?></h3>
                    <div class="text description-text">
                        <?php echo e(__('home.find_jobs_employment')); ?>

                    </div>
                    <div class="text cta-text">
                        <span class=""><?php echo e(__('home.find_perfect_job')); ?></span>
                    </div>
                </div>

                <!-- Job Search Form -->
                <div class="job-search-form wow fadeInUp" data-wow-delay='600ms'>
                    <form method="get" action="<?php echo e(route('web_login')); ?>">
                        <div class="row">
                            <!-- Form Group -->
                            <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                <span class="icon flaticon-search-1"></span>
                                <input type="text" name="job_search" placeholder="<?php echo e(__('home.job_title_keywords')); ?>">
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                                <span class="icon flaticon-map-locator"></span>
                                <input type="text" name="location_search" placeholder="<?php echo e(__('home.city_postcode')); ?>">
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 category">
                                <span class="icon flaticon-briefcase"></span>
                                <select class="chosen-select">
                                    <option value=""><?php echo e(__('home.all_categories')); ?></option>
                                    <option value="44"><?php echo e(__('home.hotels')); ?></option>
                                    <option value="106"><?php echo e(__('home.restaurants')); ?></option>
                                    <option value="46"><?php echo e(__('home.catering')); ?></option>
                                </select>
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                                <button type="submit" class="theme-btn btn-style-two"><?php echo e(__('home.find_jobs')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Job Search Form -->

                <!-- Fun Fact Section -->
                <div class="fun-fact-section">
                    <div class="row">
                        <div class="text cta-text">
                            <span class=""><?php echo e(__('home.connect_women_opportunities')); ?></span>
                        </div>
                        <!--Column-->
                        

                        <!--Column-->
                        

                        <!--Column-->
                        

                        <!--Column-->
                        
                    </div>
                </div>
                <!-- Fun Fact Section -->
            </div>
        </div>
    </section>
    <!-- End Banner Section-->

    <!-- Work Section -->
    <section class="">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2><?php echo e(__('home.horeca_excellence')); ?></h2>
                <div class="text"><?php echo e(__('home.discover_job_opportunities')); ?></div>
            </div>

            <div class="row pt-50">
                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="<?php echo e(asset('images/home/hospitality.png')); ?>" alt="">
                            </figure>
                            <h5><?php echo e(__('home.hotel')); ?></h5>
                            <p><?php echo e(__('home.strategic_alliances')); ?></p>
                            
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="<?php echo e(asset('images/home/restaurant.png')); ?>" alt="">
                            </figure>
                            <h5><?php echo e(__('home.restaurant')); ?></h5>
                            <p><?php echo e(__('home.top_restaurants')); ?></p>
                            
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="<?php echo e(asset('images/home/catering.png')); ?>" alt="">
                            </figure>
                            <h5><?php echo e(__('home.catering')); ?></h5>
                            <p><?php echo e(__('home.exciting_opportunities')); ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work employer Section -->

    <!-- Work Section (Index-15 Style) -->
    <section class="">
        <div class="auto-container">
            <div class="row grid-base wow fadeInUp">

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-case"></span>
                            </div>
                            <h5><?php echo e(__('home.register_account')); ?></h5>
                            <p><?php echo e(__('home.join_platform')); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-contact"></span>
                            </div>
                            <h5><?php echo e(__('home.explore_thousands')); ?></h5>
                            <p><?php echo e(__('home.discover_amazing')); ?></p>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-doc"></span>
                            </div>
                            <h5><?php echo e(__('home.find_suitable')); ?></h5>
                            <p><?php echo e(__('home.match_skills')); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Work Section -->

    <!-- Job Section -->
    <section class="layout-pt-60 layout-pb-120">
        <div class="auto-container">
            <div class="sec-title text-center mb-0">
                <h2><?php echo e(__('home.jobs_of_day')); ?></h2>
                <div class="text"><?php echo e(__('home.know_your_worth')); ?></div>
            </div>

            <div class="default-tabs pt-50 tabs-box">
                <!--Tabs Box-->
                <div class="tab-buttons-wrap">
                    <ul class="tab-buttons -pills-condensed">
                        <li class="tab-btn" data-tab="#tab1">Popular</li>
                        <li class="tab-btn active-btn" data-tab="#tab2">Recent</li>
                        <li class="tab-btn" data-tab="#tab3">Featured</li>
                    </ul>
                </div>

                <div class="tabs-content pt-50 wow fadeInUp">
                    <!--Tab-->
                    <div class="tab" id="tab1">
                        <div class="row">
                            <?php $__currentLoopData = $latest_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="<?php echo e(asset('images/resource/company-logo/4-1.png')); ?>" alt=""></span>
                                            <h4 class="job-title"><a href="<?php echo e(route('web.offer.show', ['id' => $offer->id])); ?>"><?php echo e($offer->job_level_name ?? ''); ?> / <?php echo e($offer->job_title_name ?? ''); ?></a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($offer->city->name ?? ''); ?>, <?php echo e($offer->city->state->code ?? ''); ?></li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    <?php if(isset($offer->created_at)): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($offer->created_at)->diffForHumans()); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </li>
                                                <li><span class="icon flaticon-money"></span> $<?php echo e($offer->rate ?? ' '); ?>/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time"><?php echo e($offer->job_type->name ?? 'Full Time'); ?></li>
                                                <li class="privacy"><?php echo e($offer->job_level->name ?? 'Private'); ?></li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab active-tab" id="tab2">
                        <div class="row">
                            <?php $__currentLoopData = $latest_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="<?php echo e(asset('images/resource/company-logo/4-1.png')); ?>" alt=""></span>
                                            <h4 class="job-title"><a href="<?php echo e(route('web.offer.show', ['id' => $offer->id])); ?>"><?php echo e($offer->job_level_name ?? ''); ?> / <?php echo e($offer->job_title_name ?? ''); ?></a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($offer->city->name ?? ''); ?>, <?php echo e($offer->city->state->code ?? ''); ?></li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    <?php if(isset($offer->created_at)): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($offer->created_at)->diffForHumans()); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </li>
                                                <li><span class="icon flaticon-money"></span> $<?php echo e($offer->rate ?? ' '); ?>/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time"><?php echo e($offer->job_type->name ?? 'Full Time'); ?></li>
                                                <li class="privacy"><?php echo e($offer->job_level->name ?? 'Private'); ?></li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="tab3">
                        <div class="row">
                            <?php $__currentLoopData = $latest_offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="<?php echo e(asset('images/resource/company-logo/4-1.png')); ?>" alt=""></span>
                                            <h4 class="job-title"><a href="<?php echo e(route('web.offer.show', ['id' => $offer->id])); ?>"><?php echo e($offer->job_level_name ?? ''); ?> / <?php echo e($offer->job_title_name ?? ''); ?></a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-map-locator"></span> <?php echo e($offer->city->name ?? ''); ?>, <?php echo e($offer->city->state->code ?? ''); ?></li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    <?php if(isset($offer->created_at)): ?>
                                                        <?php echo e(\Carbon\Carbon::parse($offer->created_at)->diffForHumans()); ?>

                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </li>
                                                <li><span class="icon flaticon-money"></span> $<?php echo e($offer->rate ?? ' '); ?>/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time"><?php echo e($offer->job_type->name ?? 'Full Time'); ?></li>
                                                <li class="privacy"><?php echo e($offer->job_level->name ?? 'Private'); ?></li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Job Section -->

    <!-- Call To Action Two -->
    <section class="call-to-action-two overlay-black-60" style="background-image: url('<?php echo e(asset('images/index-15/cta/bg.png')); ?>');">
        <div class="auto-container wow fadeInUp">
            <div class="row grid-base justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="sec-title light text-center">
                        <h2 class="text-white"><?php echo e(__('home.recruiting_advantage')); ?></h2>
                        <div class="text text-white"><?php echo e(__('home.recruiting_description')); ?></div>
                    </div>

                    <div class="btn-box">
                        <a href="<?php echo e(route('web_register')); ?>" class="theme-btn btn-white-type-2"><?php echo e(__('home.get_started')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action -->

    <!-- Top Companies -->
    <section class="">
        <div class="auto-container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6">
                    <div class="sec-title mb-0">
                        <h2><?php echo e(__('home.top_companies')); ?></h2>
                        <div class="text"><?php echo e(__('home.top_companies_text')); ?></div>
                    </div>
                </div>

                
            </div>

            <div class="carousel-outer pt-50 wow fadeInUp">
                <div class="companies-carousel owl-carousel owl-theme default-dots">
                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #007bff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">HOTEL</div>
                            </figure>
                            <h4 class="name">Hotel Excellence</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Miami, FL</div>
                            <a href="#" class="theme-btn btn-style-one">15 <?php echo e(__('home.open_positions')); ?></a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #28a745; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">REST</div>
                            </figure>
                            <h4 class="name">Restaurant Group</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> New York, NY</div>
                            <a href="#" class="theme-btn btn-style-one">22 <?php echo e(__('home.open_positions')); ?></a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #ffc107; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">CAT</div>
                            </figure>
                            <h4 class="name">Catering Plus</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Los Angeles, CA</div>
                            <a href="#" class="theme-btn btn-style-one">18 <?php echo e(__('home.open_positions')); ?></a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #dc3545; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">LUX</div>
                            </figure>
                            <h4 class="name">Luxury Hotels</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Las Vegas, NV</div>
                            <a href="#" class="theme-btn btn-style-one">25 <?php echo e(__('home.open_positions')); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Companies -->

    <!-- Features Section -->
    <section class="">
        <div class="auto-container">
            <div class="sec-title-outer">
                <div class="sec-title">
                    <h2><?php echo e(__('home.featured_cities')); ?></h2>
                    <div class="text"><?php echo e(__('home.featured_cities_text')); ?></div>
                </div>
                <a href="#" class="link"><?php echo e(__('home.browse_all_locations')); ?> <span class="fa fa-angle-right"></span></a>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="<?php echo e(asset('images/index-15/cities/1.png')); ?>" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Miami</h5>
                                    <span class="total-jobs">120 <?php echo e(__('home.jobs_count')); ?></span>
                                    <a href="<?php echo e(route('web_login')); ?>" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="<?php echo e(asset('images/index-15/cities/2.png')); ?>" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>New York</h5>
                                    <span class="total-jobs">89 <?php echo e(__('home.jobs_count')); ?></span>
                                    <a href="<?php echo e(route('web_login')); ?>" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="<?php echo e(asset('images/index-15/cities/3.png')); ?>" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Los Angeles</h5>
                                    <span class="total-jobs">156 <?php echo e(__('home.jobs_count')); ?></span>
                                    <a href="<?php echo e(route('web_login')); ?>" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="<?php echo e(asset('images/index-15/cities/4.png')); ?>" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Las Vegas</h5>
                                    <span class="total-jobs">78 <?php echo e(__('home.jobs_count')); ?></span>
                                    <a href="<?php echo e(route('web_login')); ?>" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Features Section -->

    <!-- Testimonials Section -->
    
    <!-- End Testimonials Section -->

    <!-- Subscribe Section -->
    <section class="subscribe-section-two -type-4">
        <div class="background-image" style="background-image: url('<?php echo e(asset('images/index-15/cta-2/bg.png')); ?>');"></div>
        <div class="auto-container wow fadeInUp">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-10">
                    <div class="sec-title light mb-0 pb-20">
                        <h2 class="text-white"><?php echo e(__('home.get_matched_jobs')); ?></h2>
                        <div class="text text-white"><?php echo e(__('home.upload_cv_text')); ?></div>

                        <div class="mt-20">
                            <a href="<?php echo e(route('web_login')); ?>" class="btn-cv">
                                
                                <?php echo e(__('home.upload_cv')); ?>

                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 md:mt-30">
                    <div class="image">
                        <img src="<?php echo e(asset('images/index-15/cta-2/1.png')); ?>" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- Registeration Banners -->
    <section class="">
        <div class="auto-container">
            <div class="row wow fadeInUp">
                <!-- Banner Style One -->
                <div class="banner-style-one -type-2 col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box"
                        style="background-image:url('<?php echo e(asset('images/index-13/banner/bg-1.png')); ?>">
                        <div class="content">
                            <h3><?php echo e(__('home.employers')); ?></h3>
                            <p><?php echo e(__('home.employers_text')); ?></p>
                            <a href="<?php echo e(route('web_register')); ?>" class="theme-btn btn-style-five"><?php echo e(__('home.register_account')); ?></a>
                        </div>
                        <figure class="image"><img src="<?php echo e(asset('images/home/employer.png')); ?>"
                                alt=""></figure>
                    </div>
                </div>

                <!-- Banner Style Two -->
                <div class="banner-style-two -type-2 col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-box"
                        style="background-image:url('<?php echo e(asset('images/index-13/banner/bg-2.png')); ?>">
                        <div class="content">
                            <h3 class="color-dark-1"><?php echo e(__('home.applicants')); ?></h3>
                            <p class="color-dark-2"><?php echo e(__('home.applicants_text')); ?></p>
                            <a href="<?php echo e(route('web_register')); ?>"
                                class="theme-btn btn-style-five color-dark-1"><?php echo e(__('home.register_account')); ?></a>
                        </div>
                        <figure class="image"><img
                                src="<?php echo e(asset('images/home/candidate.png')); ?>" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
                            <!-- End Registeration Banners -->

                            <!-- Features Section -->
                            
    </section>
    <!-- End Features Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\home\index.blade.php ENDPATH**/ ?>
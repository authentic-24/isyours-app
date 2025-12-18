

<?php $__env->startSection('content'); ?>

    <!--Page Title-->
    <section class="page-title" style="background-color: #f8f9fa;">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Candidate Profile</h1>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Candidate Detail Section -->
    <section class="candidate-detail-section" style="padding: 60px 0; background: #ffffff;">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <!-- Candidate Info -->
                    <div class="candidate-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <div class="inner-box">
                            <div class="content" style="display: flex; align-items: center; gap: 20px;">
                                <figure class="image" style="margin: 0;">
                                    <img src="<?php echo e(asset('images/resource/candidate-1.png')); ?>" alt="<?php echo e($candidate->first_name); ?>" style="border-radius: 50%; width: 100px; height: 100px;">
                                </figure>
                                <div>
                                    <h3 style="margin: 0 0 10px 0; color: #312683;"><?php echo e($candidate->first_name); ?> <?php echo e($candidate->last_name); ?></h3>
                                    <p style="margin: 5px 0; color: #666;"><span class="icon flaticon-mail"></span> <?php echo e($candidate->email); ?></p>
                                    <?php if($candidate->phone_number): ?>
                                        <p style="margin: 5px 0; color: #666;"><span class="icon flaticon-phone"></span> <?php echo e($candidate->phone_number); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Personal Information</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <p style="margin: 10px 0;"><strong>Location:</strong> <?php echo e($candidate->city->name ?? '-'); ?>, <?php echo e($candidate->city->state->name ?? '-'); ?></p>
                                <p style="margin: 10px 0;"><strong>Education Level:</strong> <?php echo e($candidate->educationLevel->name ?? '-'); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p style="margin: 10px 0;"><strong>Visa Status:</strong> <?php echo e($candidate->visa->name ?? '-'); ?></p>
                                <p style="margin: 10px 0;"><strong>Vehicle:</strong> 
                                    <?php if($candidate->have_vehicle): ?>
                                        <span style="color: green;">✓ Yes (<?php echo e($candidate->license_plates); ?>)</span>
                                    <?php else: ?>
                                        <span style="color: red;">✗ No</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Work Experience -->
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Work Experience</h4>
                        
                        <?php if($candidate->workExperiences && $candidate->workExperiences->count() > 0): ?>
                            <?php $__currentLoopData = $candidate->workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="experience-item" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #e9ecef;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                                        <div>
                                            <h5 style="margin: 0 0 5px 0; color: #333; font-size: 18px;"><?php echo e($experience->position); ?></h5>
                                            <?php if($experience->company): ?>
                                                <p style="margin: 0; color: #666; font-weight: 500;"><?php echo e($experience->company); ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <span style="color: #666; font-size: 14px; white-space: nowrap; margin-left: 15px;"><?php echo e($experience->duration); ?></span>
                                    </div>
                                    <?php if($experience->description): ?>
                                        <p style="margin: 10px 0 0 0; color: #555; line-height: 1.6;"><?php echo e($experience->description); ?></p>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <p style="color: #999; font-style: italic;">No work experience listed.</p>
                        <?php endif; ?>
                    </div>

                    <!-- Talents -->
                    <div class="resume-block" style="background: #ffffff; padding: 30px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 30px;">
                        <h4 style="margin-bottom: 20px; color: #312683; border-bottom: 2px solid #f9b232; padding-bottom: 10px;">Talents & Skills</h4>
                        
                        <?php if($candidate->talents && $candidate->talents->count() > 0): ?>
                            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                <?php $__currentLoopData = $candidate->talents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $talent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span style="background: #f9b232; color: #202124; padding: 8px 20px; border-radius: 20px; font-size: 14px; font-weight: 500; display: inline-block;">
                                        <?php echo e($talent->talent); ?>

                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                            <p style="color: #999; font-style: italic;">No talents listed.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12">
                    <!-- Contact Card -->
                    <div class="sidebar-widget" style="background: #f8f9fa; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0; margin-bottom: 20px;">
                        <h4 style="margin-bottom: 20px; color: #312683;">Contact Information</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                <span class="icon flaticon-mail" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                <a href="mailto:<?php echo e($candidate->email); ?>" style="color: #333; text-decoration: none;"><?php echo e($candidate->email); ?></a>
                            </li>
                            <?php if($candidate->phone_number): ?>
                                <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                    <span class="icon flaticon-phone" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                    <a href="tel:<?php echo e($candidate->phone_number); ?>" style="color: #333; text-decoration: none;"><?php echo e($candidate->phone_number); ?></a>
                                </li>
                            <?php endif; ?>
                            <li style="margin-bottom: 15px; display: flex; align-items: center;">
                                <span class="icon flaticon-map-locator" style="color: #f9b232; margin-right: 10px; font-size: 18px;"></span>
                                <span style="color: #333;"><?php echo e($candidate->city->name ?? '-'); ?>, <?php echo e($candidate->city->state->code ?? '-'); ?></span>
                            </li>
                        </ul>
                        <div style="margin-top: 25px;">
                            <a href="tel:<?php echo e($candidate->phone_number); ?>" class="theme-btn btn-style-one" style="width: 100%; text-align: center; display: block;">
                                <span class="btn-title">Contact Candidate</span>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="sidebar-widget" style="background: #ffffff; padding: 25px; border-radius: 8px; border: 1px solid #e0e0e0;">
                        <h4 style="margin-bottom: 20px; color: #312683;">Quick Stats</h4>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #e9ecef;">
                                <strong style="color: #666;">Experience:</strong>
                                <span style="float: right; color: #333;"><?php echo e($candidate->workExperiences->count()); ?> positions</span>
                            </li>
                            <li style="margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #e9ecef;">
                                <strong style="color: #666;">Skills:</strong>
                                <span style="float: right; color: #333;"><?php echo e($candidate->talents->count()); ?> talents</span>
                            </li>
                            <li style="margin-bottom: 0;">
                                <strong style="color: #666;">Education:</strong>
                                <span style="float: right; color: #333;"><?php echo e($candidate->educationLevel->name ?? '-'); ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="row" style="margin-top: 30px;">
                <div class="col-12">
                    <a href="<?php echo e(route('web.candidate.index')); ?>" class="theme-btn btn-style-three">
                        <span class="btn-title">← Back to Candidates</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--End Candidate Detail Section -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\candidates\show.blade.php ENDPATH**/ ?>
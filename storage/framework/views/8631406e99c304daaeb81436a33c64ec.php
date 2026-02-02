<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <style>
    .language-selector {
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 999;
    }

    .language-selector select {
        border: 1px solid #d1d5db;
        background: #ffffff;
        color: #1a1a1a;
        border-radius: 4px;
        padding: 8px 12px;
        font-size: 13px;
        cursor: pointer;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .language-selector select:focus {
        outline: none;
        border-color: #312683;
    }

    .page-title {
        position: relative;
    }
    </style>

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1><?php echo e(__('profile.my_profile')); ?></h1>
            </div>
        </div>
        
        <div class="language-selector">
            <select onchange="window.location.href=this.value">
                <option value="<?php echo e(route('language.switch', 'en')); ?>" <?php echo e(app()->getLocale() == 'en' ? 'selected' : ''); ?>>EN</option>
                <option value="<?php echo e(route('language.switch', 'es')); ?>" <?php echo e(app()->getLocale() == 'es' ? 'selected' : ''); ?>>ES</option>
            </select>
        </div>
    </section>

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        

                        <div class="widget-content">

                            

                            <form class="default-form" id="registrationForm" action="<?php echo e(route('web.candidate.update')); ?>"
                                method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                
                                <?php if(session('success')): ?>
                                    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 12px 20px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                                        <?php echo e(session('success')); ?>

                                    </div>
                                <?php endif; ?>

                                <!-- Profile Completeness Indicator -->
                                <div class="profile-completeness-card" style="background: linear-gradient(135deg, #312683 0%, #4a3a9f 100%); border-radius: 12px; padding: 30px; margin-bottom: 30px; box-shadow: 0 4px 15px rgba(49, 38, 131, 0.2);">
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                                        <div>
                                            <h3 style="color: white; margin: 0 0 8px 0; font-size: 24px; font-weight: 600;"><?php echo e(__('profile.profile_completeness')); ?></h3>
                                            <p style="color: rgba(255,255,255,0.8); margin: 0; font-size: 14px;"><?php echo e(__('profile.complete_profile_message')); ?></p>
                                        </div>
                                        <div style="text-align: center; background: rgba(255,255,255,0.15); padding: 15px 25px; border-radius: 10px; backdrop-filter: blur(10px);">
                                            <div style="font-size: 42px; font-weight: bold; color: white; line-height: 1;"><?php echo e($profileCompleteness['percentage']); ?>%</div>
                                            <div style="font-size: 12px; color: rgba(255,255,255,0.9); margin-top: 5px; text-transform: uppercase; letter-spacing: 1px;"><?php echo e(__('profile.complete')); ?></div>
                                        </div>
                                    </div>

                                    <!-- Progress Bar -->
                                    <div style="background: rgba(255,255,255,0.2); border-radius: 10px; height: 16px; overflow: hidden; margin-bottom: 20px; box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);">
                                        <div style="background: linear-gradient(90deg, #f9b232 0%, #ffd700 100%); height: 100%; width: <?php echo e($profileCompleteness['percentage']); ?>%; border-radius: 10px; transition: width 0.5s ease; box-shadow: 0 2px 8px rgba(249, 178, 50, 0.4);"></div>
                                    </div>

                                    <!-- Breakdown Details -->
                                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px;">
                                        <?php
                                            $sections = [
                                                'basic' => ['label' => __('profile.basic_information'), 'icon' => ''],
                                                'experience' => ['label' => __('profile.work_experience'), 'icon' => ''],
                                                'talents' => ['label' => __('profile.talents'), 'icon' => ''],
                                                'competencies' => ['label' => __('profile.competencies'), 'icon' => ''],
                                                'power_skills' => ['label' => __('profile.power_skills'), 'icon' => ''],
                                                'culture' => ['label' => __('profile.culture'), 'icon' => ''],
                                                'leadership' => ['label' => __('profile.leadership'), 'icon' => '']
                                            ];
                                        ?>

                                        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $detail = $profileCompleteness['details'][$key];
                                                $sectionComplete = $detail['completed'] == $detail['total'];
                                            ?>
                                            <div style="background: rgba(255,255,255,<?php echo e($sectionComplete ? '0.25' : '0.1'); ?>); padding: 12px 15px; border-radius: 8px; display: flex; align-items: center; gap: 10px; border: 1px solid rgba(255,255,255,<?php echo e($sectionComplete ? '0.3' : '0.15'); ?>);">
                                                <div style="flex: 1; min-width: 0;">
                                                    <div style="color: white; font-size: 13px; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($section['label']); ?></div>
                                                    <div style="color: rgba(255,255,255,0.8); font-size: 11px; margin-top: 2px;">
                                                        <?php echo e($detail['completed']); ?>/<?php echo e($detail['total']); ?> 
                                                        <?php if($sectionComplete): ?>
                                                            <span style="color: #f9b232;">✓</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <?php if($profileCompleteness['percentage'] < 100): ?>
                                    <div style="margin-top: 20px; padding: 15px; background: rgba(249, 178, 50, 0.15); border: 1px solid rgba(249, 178, 50, 0.3); border-radius: 8px;">
                                        <p style="color: white; margin: 0; font-size: 13px; line-height: 1.6;">
                                            <strong style="color: #f9b232;"><?php echo e(__('profile.advice')); ?>:</strong> 
                                            <?php if($profileCompleteness['percentage'] < 30): ?>
                                                <?php echo e(__('profile.advice_30')); ?>

                                            <?php elseif($profileCompleteness['percentage'] < 60): ?>
                                                <?php echo e(__('profile.advice_60')); ?>

                                            <?php elseif($profileCompleteness['percentage'] < 85): ?>
                                                <?php echo e(__('profile.advice_85')); ?>

                                            <?php else: ?>
                                                <?php echo e(__('profile.advice_almost')); ?>

                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <?php else: ?>
                                    <div style="margin-top: 20px; padding: 15px; background: rgba(34, 197, 94, 0.15); border: 1px solid rgba(34, 197, 94, 0.3); border-radius: 8px; text-align: center;">
                                        <p style="color: white; margin: 0; font-size: 14px; font-weight: 600;">
                                            <?php echo e(__('profile.congratulations')); ?>

                                        </p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="row">

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="firstName"><?php echo e(__('profile.first_name')); ?>:</label>
                                        <input type="text" id="firstName" name="first_name"
                                            value="<?php echo e(isset($user) ? $user->first_name : old('first_name')); ?>" required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="lastName"><?php echo e(__('profile.last_name')); ?>:</label>
                                        <input type="text" id="lastName" name="last_name" value="<?php echo e(isset($user) ? $user->last_name : old('last_name')); ?>"
                                            required><br>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="identification"><?php echo e(__('profile.identification')); ?>:</label>
                                        <input type="text" id="identification" name="identification"
                                            value="<?php echo e(isset($user) ? $user->last_name : old('last_name')); ?>" required><br>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="country_of_origin_id"><?php echo e(__('profile.country_of_origin')); ?>:</label>
                                        <select id="country_of_origin_id" name="country_of_origin_id" required>
                                            <option value=""><?php echo e(__('profile.select_country')); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($country->id == $user->country_of_origin_id): ?>
                                                    <option value="<?php echo e($country->id); ?>" selected><?php echo e($country->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label><?php echo e(__('profile.education_level')); ?></label>
                                        <select data-placeholder="<?php echo e(__('profile.select_education')); ?>" name="education_level_id" tabindex="4" required>
                                            <option value=""></option>
                                            <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($education_level->id == $user->education_level_id): ?>
                                                    <option value="<?php echo e($education_level->id); ?>" selected><?php echo e($education_level->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($education_level->id); ?>"><?php echo e($education_level->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>



                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="phone"><?php echo e(__('profile.phone_number')); ?>:</label>
                                        <input type="text" id="phone" name="phone_number" 
                                            value="<?php echo e(isset($user) ? $user->phone_number : old('phone_number')); ?>" required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="email"><?php echo e(__('profile.email')); ?>:</label>
                                        <input type="email" id="email" name="email" value="<?php echo e(isset($user) ? $user->email : old('email')); ?>"
                                            required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="visa"><?php echo e(__('profile.visa_type')); ?>:</label>
                                        <select id="visa" name="visa_id" >
                                            <option value=""><?php echo e(__('profile.select_visa')); ?></option>
                                            <?php $__currentLoopData = $visas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($visa->id == $user->visa_id): ?>
                                                    <option value="<?php echo e($visa->id); ?>" selected><?php echo e($visa->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($visa->id); ?>"><?php echo e($visa->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="visa_number"><?php echo e(__('profile.visa_number')); ?>:</label>
                                        <input type="text" id="visa_number" name="visa_number" value="<?php echo e(isset($user) ? $user->visa_number : old('visa_number')); ?>"
                                            ><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <input name="have_vehicle" type="hidden" value="0">
                                        <?php if($user->have_vehicle): ?>
                                        <input type="checkbox" id="agree" name="have_vehicle" value="1" checked>
                                        <?php else: ?>
                                        <input type="checkbox" id="agree" name="have_vehicle" value="1">
                                        <?php endif; ?>
                                        <label for="agree"><?php echo e(__('profile.have_vehicle')); ?></label><br>
                                        <input type="text" id="license_plates" name="license_plates" placeholder="<?php echo e(__('profile.license_plates')); ?>"
                                            value="<?php echo e(isset($user) ? $user->license_plates : old('license_plates')); ?>"><br>
                                    </div>

                                    
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="security_id"><?php echo e(__('profile.security_id')); ?></label>
                                        <select id="security_id" name="security_id" class="chosen-select">
                                            <option value="no" <?php echo e((isset($user) && $user->security_id == 'no') ? 'selected' : ''); ?>><?php echo e(__('profile.no')); ?></option>
                                            <option value="yes" <?php echo e((isset($user) && $user->security_id == 'yes') ? 'selected' : ''); ?>><?php echo e(__('profile.yes')); ?></option>
                                            <option value="in_process" <?php echo e((isset($user) && $user->security_id == 'in_process') ? 'selected' : ''); ?>><?php echo e(__('profile.in_process')); ?></option>
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12" id="security_digits_field" style="display: <?php echo e((isset($user) && $user->security_id == 'yes') ? 'block' : 'none'); ?>;">
                                        <label for="security_id_last_digits"><?php echo e(__('profile.security_id_digits')); ?></label>
                                        <input type="text" id="security_id_last_digits" name="security_id_last_digits" 
                                               placeholder="1234" maxlength="4" pattern="\d{4}"
                                               value="<?php echo e(isset($user) ? $user->security_id_last_digits : old('security_id_last_digits')); ?>">
                                    </div>


                                    <div class="widget-title">
                                        <h4><?php echo e(__('profile.current_address')); ?></h4>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="country"><?php echo e(__('profile.country')); ?>:</label>
                                        <select id="country" name="country_id" required>
                                            <option value=""><?php echo e(__('profile.select_country_address')); ?></option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($country->id == 1): ?>
                                                <?php if($country->id == $city->state->country_id): ?>
                                                    <option value="<?php echo e($country->id); ?>" selected><?php echo e($country->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="state"><?php echo e(__('profile.state')); ?>:</label>
                                        <select id="state" name="state_id" required>
                                            <option value=""><?php echo e(__('profile.select_state')); ?></option>
                                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($state->id == $city->state_id): ?>
                                                    <option value="<?php echo e($state->id); ?>" selected><?php echo e($state->name); ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="city"><?php echo e(__('profile.city')); ?>:</label>
                                        <select id="city" name="city_id" required>
                                            <option value=""><?php echo e(__('profile.select_city')); ?></option>
                                            <option value="<?php echo e($city->id); ?>" selected><?php echo e($city->name); ?></option>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="zipcode"><?php echo e(__('profile.zip_code')); ?>:</label>
                                        <input type="text" pattern="\d{5}" maxlength="5"
                                            title="Please enter a valid ZIP Code" id="zipcode" name="zip_code"
                                            value="<?php echo e(isset($user) ? $user->zip_code : old('zip_code')); ?>" required><br>
                                    </div>


                                    <!-- Work Experience Section -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <h4 style="margin-top: 30px; margin-bottom: 20px;"><?php echo e(__('profile.work_experience_section')); ?></h4>
                                    </div>

                                    <?php if(isset($user) && $user->workExperiences && $user->workExperiences->count() > 0): ?>
                                        <?php $__currentLoopData = $user->workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="work-experience-item" style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #e0e0e0;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <strong style="font-size: 16px; color: #333;"><?php echo e($experience->position); ?></strong>
                                                        <?php if($experience->company): ?>
                                                            <p style="margin: 5px 0; color: #666;"><?php echo e($experience->company); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 text-right">
                                                        <span style="color: #666;"><?php echo e($experience->duration); ?></span>
                                                    </div>
                                                    <?php if($experience->description): ?>
                                                        <div class="col-lg-12 col-md-12" style="margin-top: 10px;">
                                                            <p style="color: #555; margin: 0;"><?php echo e($experience->description); ?></p>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="col-lg-12 col-md-12" style="margin-top: 15px; display: flex; gap: 15px;">
                                                        <button type="button" class="btn-edit-experience" data-id="<?php echo e($experience->id); ?>" style="background: none; border: none; color: #312683; cursor: pointer; font-size: 18px; padding: 5px; transition: all 0.3s;" title="Edit" onmouseover="this.style.color='#0146A6'" onmouseout="this.style.color='#312683'">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="<?php echo e(route('web.profile.work_experience.destroy', $experience->id)); ?>" method="POST" style="display: inline; margin: 0;">
                                                            <?php echo csrf_field(); ?>
                                                            <?php echo method_field('DELETE'); ?>
                                                            <button type="submit" onclick="return confirm('<?php echo e(__('profile.confirm_delete_experience')); ?>')" style="background: none; border: none; color: #f9b232; cursor: pointer; font-size: 18px; padding: 5px; transition: all 0.3s;" title="Delete" onmouseover="this.style.color='#E9A000'" onmouseout="this.style.color='#f9b232'">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <div class="col-lg-12 col-md-12">
                                            <p style="color: #666; font-style: italic;"><?php echo e(__('profile.no_experience')); ?></p>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Add New Work Experience Button -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="button" id="btn-add-experience" class="theme-btn btn-style-two" style="margin-bottom: 20px;"><?php echo e(__('profile.add_experience')); ?></button>
                                    </div>

                                    <!-- New Work Experience Form (Hidden by default) -->
                                    <div id="new-experience-form" style="display: none; background: #f0f7ff; padding: 20px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #d0e0f0;">
                                        <h5 style="margin-bottom: 15px;"><?php echo e(__('profile.add_experience')); ?></h5>
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-12">
                                                <label><?php echo e(__('profile.position')); ?> *</label>
                                                <input type="text" id="new_position" name="new_position" placeholder="<?php echo e(__('profile.position_placeholder')); ?>">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-12">
                                                <label><?php echo e(__('profile.company')); ?></label>
                                                <input type="text" id="new_company" name="new_company" placeholder="<?php echo e(__('profile.company_placeholder')); ?>">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label><?php echo e(__('profile.start_date')); ?> *</label>
                                                <input type="date" id="new_start_date" name="new_start_date">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label><?php echo e(__('profile.end_date')); ?></label>
                                                <input type="date" id="new_end_date" name="new_end_date">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label style="display: block;">&nbsp;</label>
                                                <div style="padding-top: 10px;">
                                                    <input type="checkbox" id="new_is_current" name="new_is_current" style="width: auto; margin-right: 8px;">
                                                    <label for="new_is_current" style="display: inline; font-weight: normal;"><?php echo e(__('profile.currently_working')); ?></label>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <label><?php echo e(__('profile.description')); ?></label>
                                                <textarea id="new_description" name="new_description" rows="3" placeholder="<?php echo e(__('profile.description_placeholder')); ?>"></textarea>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <button type="button" id="btn-save-experience" class="theme-btn btn-style-one" style="margin-right: 10px;"><?php echo e(__('profile.save_experience')); ?></button>
                                                <button type="button" id="btn-cancel-experience" class="theme-btn btn-style-three"><?php echo e(__('profile.cancel')); ?></button>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Professional Profile Section -->
                                    <div class="widget-title" style="margin-top: 40px;">
                                        <h4><?php echo e(__('profile.professional_profile')); ?></h4>
                                    </div>

                                    <!-- Talento Innato -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label><?php echo e(__('profile.innate_talent')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.innate_talent_desc')); ?></p>
                                        <textarea name="innate_talent" rows="4" placeholder="<?php echo e(__('profile.innate_talent_placeholder')); ?>"><?php echo e(isset($user) ? $user->innate_talent : old('innate_talent')); ?></textarea>
                                    </div>

                                    <!-- Talento Potencial -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label><?php echo e(__('profile.potential_talent')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.potential_talent_desc')); ?></p>
                                        <textarea name="potential_talent" rows="4" placeholder="<?php echo e(__('profile.potential_talent_placeholder')); ?>"><?php echo e(isset($user) ? $user->potential_talent : old('potential_talent')); ?></textarea>
                                    </div>

                                    <!-- Power Skills -->
                                    <div class="form-group col-lg-12 col-md-12" style="margin-top: 30px;">
                                        <label><?php echo e(__('profile.power_skills_section')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.power_skills_desc')); ?></p>
                                        <div id="power-skills-container" style="max-height: 400px; overflow-y: auto; border: 1px solid #e0e0e0; border-radius: 4px; padding: 20px; background: #f9f9f9;">
                                            <div class="row">
                                                <?php $__currentLoopData = $powerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6 col-md-12" style="margin-bottom: 20px;">
                                                    <div style="background: white; padding: 15px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                                        <label style="font-weight: 600; margin-bottom: 8px; display: block;"><?php echo e($skill->localized_name); ?></label>
                                                        <p style="font-size: 12px; color: #666; margin-bottom: 10px;"><?php echo e($skill->localized_description); ?></p>
                                                        <div style="display: flex; gap: 10px; align-items: center;">
                                                            <span style="font-size: 12px; color: #666;"><?php echo e(__('profile.level')); ?>:</span>
                                                            <?php
                                                                $userLevel = $user->powerSkills->where('id', $skill->id)->first();
                                                                $currentLevel = $userLevel ? $userLevel->pivot->level : 0;
                                                            ?>
                                                            <select name="power_skills[<?php echo e($skill->id); ?>]" style="width: auto; padding: 5px 10px;">
                                                                <option value="0" <?php echo e($currentLevel == 0 ? 'selected' : ''); ?>>-</option>
                                                                <option value="1" <?php echo e($currentLevel == 1 ? 'selected' : ''); ?>>1 - <?php echo e(__('profile.level_basic')); ?></option>
                                                                <option value="2" <?php echo e($currentLevel == 2 ? 'selected' : ''); ?>>2 - <?php echo e(__('profile.level_intermediate')); ?></option>
                                                                <option value="3" <?php echo e($currentLevel == 3 ? 'selected' : ''); ?>>3 - <?php echo e(__('profile.level_advanced')); ?></option>
                                                                <option value="4" <?php echo e($currentLevel == 4 ? 'selected' : ''); ?>>4 - <?php echo e(__('profile.level_expert')); ?></option>
                                                                <option value="5" <?php echo e($currentLevel == 5 ? 'selected' : ''); ?>>5 - <?php echo e(__('profile.level_master')); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Competencias Comportamentales - Martha Alles -->
                                    <div class="form-group col-lg-12 col-md-12" style="margin-top: 30px;">
                                        <label><?php echo e(__('profile.behavioral_competencies')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.behavioral_competencies_desc')); ?></p>
                                        
                                        <div id="behavioral-competencies-container">
                                            <?php $__currentLoopData = $behavioralCompetencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $competencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div style="margin-bottom: 30px;">
                                                <h5 style="color: #312683; margin-bottom: 15px; padding: 10px; background: #f9b232; border-radius: 4px;">
                                                    <?php if($category == 'cardinal'): ?>
                                                        <?php echo e(__('profile.cardinal_competencies')); ?>

                                                    <?php elseif($category == 'specific'): ?>
                                                        <?php echo e(__('profile.specific_competencies')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__('profile.technical_competencies')); ?>

                                                    <?php endif; ?>
                                                </h5>
                                                <div style="max-height: 400px; overflow-y: auto; border: 1px solid #e0e0e0; border-radius: 4px; padding: 20px; background: #f9f9f9;">
                                                    <div class="row">
                                                        <?php $__currentLoopData = $competencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="col-lg-6 col-md-12" style="margin-bottom: 20px;">
                                                            <div style="background: white; padding: 15px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                                                <label style="font-weight: 600; margin-bottom: 8px; display: block;"><?php echo e($competency->localized_name); ?></label>
                                                                <p style="font-size: 12px; color: #666; margin-bottom: 10px;"><?php echo e($competency->localized_description); ?></p>
                                                                <div style="display: flex; gap: 10px; align-items: center;">
                                                                    <span style="font-size: 12px; color: #666;"><?php echo e(__('profile.level')); ?>:</span>
                                                                    <?php
                                                                        $userComp = $user->behavioralCompetencies->where('id', $competency->id)->first();
                                                                        $currentLevel = $userComp ? $userComp->pivot->level : 0;
                                                                    ?>
                                                                    <select name="behavioral_competencies[<?php echo e($competency->id); ?>]" style="width: auto; padding: 5px 10px;">
                                                                        <option value="0" <?php echo e($currentLevel == 0 ? 'selected' : ''); ?>>-</option>
                                                                        <option value="1" <?php echo e($currentLevel == 1 ? 'selected' : ''); ?>>1 - <?php echo e(__('profile.level_initial')); ?></option>
                                                                        <option value="2" <?php echo e($currentLevel == 2 ? 'selected' : ''); ?>>2 - <?php echo e(__('profile.level_developing')); ?></option>
                                                                        <option value="3" <?php echo e($currentLevel == 3 ? 'selected' : ''); ?>>3 - <?php echo e(__('profile.level_competent')); ?></option>
                                                                        <option value="4" <?php echo e($currentLevel == 4 ? 'selected' : ''); ?>>4 - <?php echo e(__('profile.level_advanced')); ?></option>
                                                                        <option value="5" <?php echo e($currentLevel == 5 ? 'selected' : ''); ?>>5 - <?php echo e(__('profile.level_expert')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>

                                    <!-- Match Cultura Organizacional -->
                                    <div class="form-group col-lg-12 col-md-12" style="margin-top: 30px;">
                                        <label><?php echo e(__('profile.organizational_culture')); ?> - <?php echo e(__('profile.what_you_seek_company')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.organizational_culture_advice')); ?></p>
                                        <div id="culture-values-container" style="max-height: 400px; overflow-y: auto; border: 1px solid #e0e0e0; border-radius: 4px; padding: 20px; background: #f9f9f9;">
                                            <div class="row">
                                                <?php $__currentLoopData = $cultureValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6 col-md-12" style="margin-bottom: 20px;">
                                                    <div style="background: white; padding: 15px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                                        <label style="font-weight: 600; margin-bottom: 8px; display: block;"><?php echo e($value->localized_name); ?></label>
                                                        <p style="font-size: 12px; color: #666; margin-bottom: 10px;"><?php echo e($value->localized_description); ?></p>
                                                        <div style="display: flex; gap: 10px; align-items: center;">
                                                            <span style="font-size: 12px; color: #666;"><?php echo e(__('profile.priority')); ?>:</span>
                                                            <?php
                                                                $userValue = $user->organizationalCultureValues->where('id', $value->id)->first();
                                                                $currentPriority = $userValue ? $userValue->pivot->priority : 0;
                                                            ?>
                                                            <select name="culture_values[<?php echo e($value->id); ?>]" style="width: auto; padding: 5px 10px;">
                                                                <option value="0" <?php echo e($currentPriority == 0 ? 'selected' : ''); ?>>-</option>
                                                                <option value="1" <?php echo e($currentPriority == 1 ? 'selected' : ''); ?>>1 - <?php echo e(__('profile.priority_critical')); ?></option>
                                                                <option value="2" <?php echo e($currentPriority == 2 ? 'selected' : ''); ?>>2 - <?php echo e(__('profile.priority_very_important')); ?></option>
                                                                <option value="3" <?php echo e($currentPriority == 3 ? 'selected' : ''); ?>>3 - <?php echo e(__('profile.priority_important')); ?></option>
                                                                <option value="4" <?php echo e($currentPriority == 4 ? 'selected' : ''); ?>>4 - <?php echo e(__('profile.priority_desirable')); ?></option>
                                                                <option value="5" <?php echo e($currentPriority == 5 ? 'selected' : ''); ?>>5 - <?php echo e(__('profile.priority_optional')); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Qué buscas de un líder -->
                                    <div class="form-group col-lg-12 col-md-12" style="margin-top: 30px;">
                                        <label><?php echo e(__('profile.leadership_preferences')); ?></label>
                                        <p style="font-size: 13px; color: #666; margin-top: 5px;"><?php echo e(__('profile.leadership_advice')); ?></p>
                                        <div id="leadership-preferences-container" style="max-height: 400px; overflow-y: auto; border: 1px solid #e0e0e0; border-radius: 4px; padding: 20px; background: #f9f9f9;">
                                            <div class="row">
                                                <?php $__currentLoopData = $leadershipPrefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="col-lg-6 col-md-12" style="margin-bottom: 20px;">
                                                    <div style="background: white; padding: 15px; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                                                        <label style="font-weight: 600; margin-bottom: 8px; display: block;"><?php echo e($pref->localized_name); ?></label>
                                                        <p style="font-size: 12px; color: #666; margin-bottom: 10px;"><?php echo e($pref->localized_description); ?></p>
                                                        <div style="display: flex; gap: 10px; align-items: center;">
                                                            <span style="font-size: 12px; color: #666;"><?php echo e(__('profile.importance')); ?>:</span>
                                                            <?php
                                                                $userPref = $user->leadershipPreferences->where('id', $pref->id)->first();
                                                                $currentImportance = $userPref ? $userPref->pivot->importance : 0;
                                                            ?>
                                                            <select name="leadership_preferences[<?php echo e($pref->id); ?>]" style="width: auto; padding: 5px 10px;">
                                                                <option value="0" <?php echo e($currentImportance == 0 ? 'selected' : ''); ?>>-</option>
                                                                <option value="1" <?php echo e($currentImportance == 1 ? 'selected' : ''); ?>>1 - <?php echo e(__('profile.importance_indispensable')); ?></option>
                                                                <option value="2" <?php echo e($currentImportance == 2 ? 'selected' : ''); ?>>2 - <?php echo e(__('profile.importance_very_important')); ?></option>
                                                                <option value="3" <?php echo e($currentImportance == 3 ? 'selected' : ''); ?>>3 - <?php echo e(__('profile.importance_important')); ?></option>
                                                                <option value="4" <?php echo e($currentImportance == 4 ? 'selected' : ''); ?>>4 - <?php echo e(__('profile.importance_desirable')); ?></option>
                                                                <option value="5" <?php echo e($currentImportance == 5 ? 'selected' : ''); ?>>5 - <?php echo e(__('profile.importance_valuable')); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one"><?php echo e(__('profile.save')); ?></button>
                                    </div>
                                </div>
                            </form>


                        </div>
                   
                

                <!-- Ls widget -->
                

                <!-- Ls widget -->
                

                </div>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>

<script type="text/javascript">
    $(window).on('load', function() {
        // Security ID functionality
        $('#security_id').change(function() {
            var digitsField = $('#security_digits_field');
            var digitsInput = $('#security_id_last_digits');
            if ($(this).val() === 'yes') {
                digitsField.slideDown();
            } else {
                digitsField.slideUp();
                digitsInput.val('');
            }
        });

        // Work Experience functionality
        $('#btn-add-experience').click(function() {
            $('#new-experience-form').slideDown();
            $(this).hide();
        });

        $('#btn-cancel-experience').click(function() {
            $('#new-experience-form').slideUp();
            $('#btn-add-experience').show();
            clearExperienceForm();
        });

        $('#new_is_current').change(function() {
            if($(this).is(':checked')) {
                $('#new_end_date').val('').prop('disabled', true);
            } else {
                $('#new_end_date').prop('disabled', false);
            }
        });

        $('#btn-save-experience').click(function() {
            const position = $('#new_position').val().trim();
            const company = $('#new_company').val().trim();
            const startDate = $('#new_start_date').val();
            const endDate = $('#new_end_date').val();
            const isCurrent = $('#new_is_current').is(':checked');
            const description = $('#new_description').val().trim();

            if(!position) {
                alert('<?php echo e(__('profile.position_required')); ?>');
                return;
            }

            if(!startDate) {
                alert('<?php echo e(__('profile.start_date_required')); ?>');
                return;
            }

            if(!isCurrent && endDate && new Date(endDate) < new Date(startDate)) {
                alert('<?php echo e(__('profile.end_date_after_start')); ?>');
                return;
            }

            // Create form data
            const formData = {
                _token: '<?php echo e(csrf_token()); ?>',
                position: position,
                company: company,
                start_date: startDate,
                end_date: isCurrent ? null : endDate,
                is_current: isCurrent ? 1 : 0,
                description: description
            };

            // Submit via AJAX
            $.ajax({
                url: "<?php echo e(route('web.profile.work_experience.store')); ?>",
                method: 'POST',
                data: formData,
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    if(xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        for(let key in errors) {
                            errorMsg += errors[key][0] + '\n';
                        }
                        alert(errorMsg);
                    } else {
                        alert('<?php echo e(__('profile.error_occurred')); ?>');
                    }
                }
            });
        });

        function clearExperienceForm() {
            $('#new_position').val('');
            $('#new_company').val('');
            $('#new_start_date').val('');
            $('#new_end_date').val('').prop('disabled', false);
            $('#new_is_current').prop('checked', false);
            $('#new_description').val('');
        }

        // When the country select element changes, retrieve states for the selected country and fill the state select element
        $('#country').change(function() {
            var countryId = $(this).val();

            $.ajax({
            url: "<?php echo e(route('api.states_by_country', '')); ?>"+"/"+countryId,
            method: 'GET',
            success: function(response) {
                // Get the state select element
                var data = response.states

                // Fill the select element with the retrieved data
                fillSelect('state', 'id', 'name', data, 'State');
            },
            error: function(error) {
                console.log(error);
            }
            });
        });

        
        $('#state').change(function() {
            var stateId = $(this).val();

            $.ajax({
                url: "<?php echo e(route('api.cities_by_state', '')); ?>"+"/"+stateId,
                method: 'GET',
                success: function(response) {
                    // Get the state select element
                    var data = response.cities

                    // Fill the select element with the retrieved data
                    fillSelect('city', 'id', 'name', data, 'City');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        // Function to fill a select element with data
        function fillSelect(idSelect, idData, nameValue, data, displaySelectName) {
            // Get the select element
            var select = $('#' + idSelect);
            // Clear the select element
            select.empty();
            // Add default option to the select element
            select.append($('<option>').val('').text('--Select '+displaySelectName+'--'));
            // Loop through the data and add options to the select element
            for (var i = 0; i < data.length; i++) {
                var dato = data[i];
                select.append($('<option>').val(dato[idData]).text(dato[nameValue]));
            }
        }


    });
    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/profile/edit.blade.php ENDPATH**/ ?>
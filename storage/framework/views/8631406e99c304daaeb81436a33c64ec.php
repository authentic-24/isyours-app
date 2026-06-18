

<?php $__env->startSection('dashboard_title', __('profile.my_profile')); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* ── Profile Form – design inspirado en dashboard_formularios_vibrantes ─ */
    .pf-wrap {
        padding: 4px 0 24px;
    }

    .pf-card {
        background: #ffffff;
        border: 1px solid #eef0f8;
        border-radius: 24px;
        padding: 28px 32px;
        box-shadow: 0 2px 8px rgba(49, 39, 131, 0.06);
        margin-bottom: 20px;
    }

    .pf-card-head {
        margin-bottom: 22px;
    }

    .pf-card-title {
        margin: 0 0 4px;
        font-family: "Manrope", sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: #1a086e;
    }

    .pf-card-copy {
        margin: 0;
        font-size: 13px;
        color: #6b7280;
        line-height: 1.6;
    }

    .pf-field {
        margin-bottom: 18px;
    }

    .pf-label {
        display: block;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #474551;
        margin-bottom: 7px;
        margin-left: 2px;
    }

    .pf-input,
    .pf-select,
    .pf-textarea {
        display: block;
        width: 100%;
        background: #f0f3ff;
        border: none;
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 14px;
        font-weight: 500;
        color: #151c27;
        transition: box-shadow .18s ease, background .18s ease;
        outline: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .pf-textarea {
        min-height: 110px;
        resize: vertical;
    }

    .pf-input:focus,
    .pf-select:focus,
    .pf-textarea:focus {
        background: #ebe8ff;
        box-shadow: 0 0 0 3px rgba(75, 65, 223, 0.18);
    }

    .pf-hint {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 14px 16px;
        background: rgba(238, 242, 255, 0.6);
        border: 1px solid #dde4f7;
        border-radius: 14px;
        font-size: 13px;
        color: #312783;
        line-height: 1.55;
        margin-top: 4px;
    }

    .pf-hint .pf-hint-icon {
        font-size: 18px;
        color: #4b41df;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .pf-check-row {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .pf-check-row input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #4b41df;
        flex-shrink: 0;
        cursor: pointer;
    }

    .pf-check-row label {
        font-size: 14px;
        color: #374151;
        cursor: pointer;
        margin: 0;
    }

    .pf-exp-card {
        background: #f5f7ff;
        border: 1px solid #dee6f8;
        border-radius: 14px;
        padding: 18px;
        margin-bottom: 12px;
    }

    .pf-exp-role {
        font-weight: 700;
        font-size: 15px;
        color: #111827;
        margin: 0 0 3px;
    }

    .pf-exp-meta {
        font-size: 13px;
        color: #6b7280;
        margin: 0 0 3px;
    }

    .pf-exp-desc {
        font-size: 13px;
        color: #4b5563;
        margin: 6px 0 0;
    }

    .pf-exp-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .pf-icon-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 4px 6px;
        border-radius: 8px;
        font-size: 16px;
        transition: background .15s;
    }

    .pf-icon-btn.edit  { color: #312683; }
    .pf-icon-btn.edit:hover  { background: #eef2ff; }
    .pf-icon-btn.del   { color: #4b41df; }
    .pf-icon-btn.del:hover   { background: #eef2ff; }

    .pf-exp-new-form {
        display: none;
        background: #f2f5ff;
        border: 1px solid #dae2f6;
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 14px;
    }

    .pf-exp-new-title {
        font-size: 15px;
        font-weight: 700;
        color: #1a086e;
        margin-bottom: 14px;
    }

    .pf-checkbox-inline {
        display: flex;
        align-items: center;
        gap: 8px;
        padding-top: 8px;
    }

    .pf-checkbox-inline input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #4b41df;
        cursor: pointer;
    }

    .pf-checkbox-inline label {
        font-size: 13px;
        color: #374151;
        cursor: pointer;
        margin: 0;
        font-weight: 500;
    }

    .pf-submit-bar {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
    }

    .pf-btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 13px 28px;
        background: linear-gradient(135deg, #4b41df, #1a086e);
        color: #fff;
        font-weight: 700;
        font-size: 14px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(49, 39, 131, 0.22);
        transition: transform .15s ease, box-shadow .2s ease;
    }

    .pf-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(49,39,131,0.28); }

    .pf-btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 11px 20px;
        background: #fff;
        color: #1a086e;
        font-weight: 700;
        font-size: 13px;
        border: 1px solid #dce2f3;
        border-radius: 12px;
        cursor: pointer;
        transition: background .15s;
    }

    .pf-btn-secondary:hover { background: #f3f6ff; }

    .pf-success-msg {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #edfdf5;
        border: 1px solid #c9f3dc;
        color: #166534;
        border-radius: 12px;
        padding: 13px 18px;
        margin-bottom: 20px;
        font-weight: 600;
        font-size: 14px;
    }

    @media (max-width: 767.98px) {
        .pf-card { padding: 18px 16px; border-radius: 18px; }
        .pf-submit-bar { justify-content: stretch; }
        .pf-btn-primary { width: 100%; justify-content: center; }
    }
</style>

<div class="pf-wrap">
    <form id="registrationForm" action="<?php echo e(route('web.candidate.update')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php if(session('success')): ?>
            <div class="pf-success-msg">
                <span class="material-symbols-outlined">check_circle</span>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="pf-card">
            <div class="pf-card-head">
                <h3 class="pf-card-title"><?php echo e(__('profile.basic_information')); ?></h3>
                <p class="pf-card-copy">Personal details, contact data and legal information used across your applications.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="firstName"><?php echo e(__('profile.first_name')); ?></label>
                        <input class="pf-input" type="text" id="firstName" name="first_name"
                            value="<?php echo e(isset($user) ? $user->first_name : old('first_name')); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="lastName"><?php echo e(__('profile.last_name')); ?></label>
                        <input class="pf-input" type="text" id="lastName" name="last_name"
                            value="<?php echo e(isset($user) ? $user->last_name : old('last_name')); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="identification"><?php echo e(__('profile.identification')); ?></label>
                        <input class="pf-input" type="text" id="identification" name="identification"
                            value="<?php echo e(isset($user) ? $user->identification : old('identification')); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="country_of_origin_id"><?php echo e(__('profile.country_of_origin')); ?></label>
                        <select class="pf-select" id="country_of_origin_id" name="country_of_origin_id" required>
                            <option value=""><?php echo e(__('profile.select_country')); ?></option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country->id); ?>" <?php echo e($country->id == $user->country_of_origin_id ? 'selected' : ''); ?>>
                                    <?php echo e($country->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label"><?php echo e(__('profile.education_level')); ?></label>
                        <select class="pf-select" name="education_level_id" required>
                            <option value=""><?php echo e(__('profile.select_education')); ?></option>
                            <?php $__currentLoopData = $educationLevels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($education_level->id); ?>" <?php echo e($education_level->id == $user->education_level_id ? 'selected' : ''); ?>>
                                    <?php echo e($education_level->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="phone"><?php echo e(__('profile.phone_number')); ?></label>
                        <input class="pf-input" type="text" id="phone" name="phone_number"
                            value="<?php echo e(isset($user) ? $user->phone_number : old('phone_number')); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="email"><?php echo e(__('profile.email')); ?></label>
                        <input class="pf-input" type="email" id="email" name="email"
                            value="<?php echo e(isset($user) ? $user->email : old('email')); ?>" required>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="visa"><?php echo e(__('profile.visa_type')); ?></label>
                        <select class="pf-select" id="visa" name="visa_id">
                            <option value=""><?php echo e(__('profile.select_visa')); ?></option>
                            <?php $__currentLoopData = $visas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($visa->id); ?>" <?php echo e($visa->id == $user->visa_id ? 'selected' : ''); ?>>
                                    <?php echo e($visa->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="visa_number"><?php echo e(__('profile.visa_number')); ?></label>
                        <input class="pf-input" type="text" id="visa_number" name="visa_number"
                            value="<?php echo e(isset($user) ? $user->visa_number : old('visa_number')); ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label"><?php echo e(__('profile.have_vehicle')); ?></label>
                        <input name="have_vehicle" type="hidden" value="0">
                        <div class="pf-check-row">
                            <input type="checkbox" id="agree" name="have_vehicle" value="1"
                                <?php echo e(($user->have_vehicle) ? 'checked' : ''); ?>>
                            <label for="agree"><?php echo e(__('profile.have_vehicle')); ?></label>
                        </div>
                        <input class="pf-input" type="text" id="license_plates" name="license_plates"
                            placeholder="<?php echo e(__('profile.license_plates')); ?>"
                            value="<?php echo e(isset($user) ? $user->license_plates : old('license_plates')); ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="security_id"><?php echo e(__('profile.security_id')); ?></label>
                        <select class="pf-select" id="security_id" name="security_id">
                            <option value="no"         <?php echo e((isset($user) && $user->security_id == 'no')         ? 'selected' : ''); ?>><?php echo e(__('profile.no')); ?></option>
                            <option value="yes"        <?php echo e((isset($user) && $user->security_id == 'yes')        ? 'selected' : ''); ?>><?php echo e(__('profile.yes')); ?></option>
                            <option value="in_process" <?php echo e((isset($user) && $user->security_id == 'in_process') ? 'selected' : ''); ?>><?php echo e(__('profile.in_process')); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12" id="security_digits_field"
                     style="display:<?php echo e((isset($user) && $user->security_id == 'yes') ? 'block' : 'none'); ?>;">
                    <div class="pf-field">
                        <label class="pf-label" for="security_id_last_digits"><?php echo e(__('profile.security_id_digits')); ?></label>
                        <input class="pf-input" type="text" id="security_id_last_digits" name="security_id_last_digits"
                               placeholder="1234" maxlength="4" pattern="\d{4}"
                               value="<?php echo e(isset($user) ? $user->security_id_last_digits : old('security_id_last_digits')); ?>">
                    </div>
                </div>
            </div>
        </div>

        
        <div class="pf-card">
            <div class="pf-card-head">
                <h3 class="pf-card-title"><?php echo e(__('profile.current_address')); ?></h3>
                <p class="pf-card-copy">Keep your current location updated so matching and contact details stay accurate.</p>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="country"><?php echo e(__('profile.country')); ?></label>
                        <select class="pf-select" id="country" name="country_id" required>
                            <option value=""><?php echo e(__('profile.select_country_address')); ?></option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($country->id == 1): ?>
                                    <option value="<?php echo e($country->id); ?>"
                                        <?php echo e($country->id == $city->state->country_id ? 'selected' : ''); ?>>
                                        <?php echo e($country->name); ?>

                                    </option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="state"><?php echo e(__('profile.state')); ?></label>
                        <select class="pf-select" id="state" name="state_id" required>
                            <option value=""><?php echo e(__('profile.select_state')); ?></option>
                            <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == $city->state_id ? 'selected' : ''); ?>>
                                    <?php echo e($state->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="city"><?php echo e(__('profile.city')); ?></label>
                        <select class="pf-select" id="city" name="city_id" required>
                            <option value=""><?php echo e(__('profile.select_city')); ?></option>
                            <option value="<?php echo e($city->id); ?>" selected><?php echo e($city->name); ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label" for="zipcode"><?php echo e(__('profile.zip_code')); ?></label>
                        <input class="pf-input" type="text" id="zipcode" name="zip_code"
                            pattern="\d{5}" maxlength="5" title="Please enter a valid ZIP Code"
                            value="<?php echo e(isset($user) ? $user->zip_code : old('zip_code')); ?>" required>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="pf-card">
            <div class="pf-card-head">
                <h3 class="pf-card-title"><?php echo e(__('profile.work_experience_section')); ?></h3>
                <p class="pf-card-copy">Show the roles and achievements that strengthen your profile and improve your visibility.</p>
            </div>

            <?php if(isset($user) && $user->workExperiences && $user->workExperiences->count() > 0): ?>
                <?php $__currentLoopData = $user->workExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pf-exp-card">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p class="pf-exp-role"><?php echo e($experience->position); ?></p>
                                <?php if($experience->company): ?>
                                    <p class="pf-exp-meta"><?php echo e($experience->company); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-6 col-md-12" style="text-align:right;">
                                <p class="pf-exp-meta"><?php echo e($experience->duration); ?></p>
                            </div>
                            <?php if($experience->description): ?>
                                <div class="col-lg-12 col-md-12">
                                    <p class="pf-exp-desc"><?php echo e($experience->description); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="col-lg-12 col-md-12">
                                <div class="pf-exp-actions">
                                    <button type="button" class="pf-icon-btn edit btn-edit-experience"
                                            data-id="<?php echo e($experience->id); ?>" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="<?php echo e(route('web.profile.work_experience.destroy', $experience->id)); ?>"
                                          method="POST" class="m-0 d-inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="pf-icon-btn del"
                                                onclick="return confirm('<?php echo e(__('profile.confirm_delete_experience')); ?>')" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p style="color:#6b7280; font-size:14px; font-style:italic; margin-bottom:14px;">
                    <?php echo e(__('profile.no_experience')); ?>

                </p>
            <?php endif; ?>

            <button type="button" id="btn-add-experience" class="pf-btn-secondary" style="margin-bottom:4px;">
                <span class="material-symbols-outlined" style="font-size:18px;">add</span>
                <?php echo e(__('profile.add_experience')); ?>

            </button>

            <div id="new-experience-form" class="pf-exp-new-form">
                <p class="pf-exp-new-title"><?php echo e(__('profile.add_experience')); ?></p>
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label"><?php echo e(__('profile.position')); ?> *</label>
                            <input class="pf-input" type="text" id="new_position" name="new_position"
                                placeholder="<?php echo e(__('profile.position_placeholder')); ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label"><?php echo e(__('profile.company')); ?></label>
                            <input class="pf-input" type="text" id="new_company" name="new_company"
                                placeholder="<?php echo e(__('profile.company_placeholder')); ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label"><?php echo e(__('profile.start_date')); ?> *</label>
                            <input class="pf-input" type="date" id="new_start_date" name="new_start_date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label"><?php echo e(__('profile.end_date')); ?></label>
                            <input class="pf-input" type="date" id="new_end_date" name="new_end_date">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label">&nbsp;</label>
                            <div class="pf-checkbox-inline">
                                <input type="checkbox" id="new_is_current" name="new_is_current">
                                <label for="new_is_current"><?php echo e(__('profile.currently_working')); ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="pf-field">
                            <label class="pf-label"><?php echo e(__('profile.description')); ?></label>
                            <textarea class="pf-textarea" id="new_description" name="new_description" rows="3"
                                placeholder="<?php echo e(__('profile.description_placeholder')); ?>"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div style="display:flex; gap:10px;">
                            <button type="button" id="btn-save-experience" class="pf-btn-primary">
                                <?php echo e(__('profile.save_experience')); ?>

                            </button>
                            <button type="button" id="btn-cancel-experience" class="pf-btn-secondary">
                                <?php echo e(__('profile.cancel')); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="pf-card">
            <div class="pf-card-head">
                <h3 class="pf-card-title"><?php echo e(__('profile.professional_profile')); ?></h3>
                <p class="pf-card-copy">Describe your natural strengths and future potential with more context than a simple resume line.</p>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label"><?php echo e(__('profile.innate_talent')); ?></label>
                        <p style="font-size:12px; color:#6b7280; margin:-4px 0 8px 2px;"><?php echo e(__('profile.innate_talent_desc')); ?></p>
                        <textarea class="pf-textarea" name="innate_talent" rows="4"
                            placeholder="<?php echo e(__('profile.innate_talent_placeholder')); ?>"><?php echo e(isset($user) ? $user->innate_talent : old('innate_talent')); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="pf-field">
                        <label class="pf-label"><?php echo e(__('profile.potential_talent')); ?></label>
                        <p style="font-size:12px; color:#6b7280; margin:-4px 0 8px 2px;"><?php echo e(__('profile.potential_talent_desc')); ?></p>
                        <textarea class="pf-textarea" name="potential_talent" rows="4"
                            placeholder="<?php echo e(__('profile.potential_talent_placeholder')); ?>"><?php echo e(isset($user) ? $user->potential_talent : old('potential_talent')); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="pf-hint">
                <span class="material-symbols-outlined pf-hint-icon">info</span>
                <span>These details help recruiters understand your profile beyond your CV. Be specific and authentic.</span>
            </div>
        </div>

        
        <div class="pf-card">
            <div class="pf-submit-bar">
                <button type="submit" class="pf-btn-primary">
                    <span class="material-symbols-outlined" style="font-size:18px;">save</span>
                    <?php echo e(__('profile.save')); ?>

                </button>
            </div>
        </div>

    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript">
    $(window).on('load', function() {
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
            if ($(this).is(':checked')) {
                $('#new_end_date').val('').prop('disabled', true);
            } else {
                $('#new_end_date').prop('disabled', false);
            }
        });

        $('#btn-save-experience').click(function() {
            var position    = $('#new_position').val().trim();
            var company     = $('#new_company').val().trim();
            var startDate   = $('#new_start_date').val();
            var endDate     = $('#new_end_date').val();
            var isCurrent   = $('#new_is_current').is(':checked');
            var description = $('#new_description').val().trim();

            if (!position) { alert('<?php echo e(__('profile.position_required')); ?>'); return; }
            if (!startDate) { alert('<?php echo e(__('profile.start_date_required')); ?>'); return; }
            if (!isCurrent && endDate && new Date(endDate) < new Date(startDate)) {
                alert('<?php echo e(__('profile.end_date_after_start')); ?>'); return;
            }

            $.ajax({
                url: '<?php echo e(route('web.profile.work_experience.store')); ?>',
                method: 'POST',
                data: {
                    _token:      '<?php echo e(csrf_token()); ?>',
                    position:    position,
                    company:     company,
                    start_date:  startDate,
                    end_date:    isCurrent ? null : endDate,
                    is_current:  isCurrent ? 1 : 0,
                    description: description
                },
                success: function() { location.reload(); },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        var msg = '';
                        for (var k in xhr.responseJSON.errors) msg += xhr.responseJSON.errors[k][0] + '\n';
                        alert(msg);
                    } else {
                        alert('<?php echo e(__('profile.error_occurred')); ?>');
                    }
                }
            });
        });

        function clearExperienceForm() {
            $('#new_position, #new_company, #new_start_date, #new_description').val('');
            $('#new_end_date').val('').prop('disabled', false);
            $('#new_is_current').prop('checked', false);
        }

        $('#country').change(function() {
            $.ajax({
                url: '<?php echo e(route('api.states_by_country', '')); ?>' + '/' + $(this).val(),
                method: 'GET',
                success: function(r) { fillSelect('state', 'id', 'name', r.states, 'State'); },
                error: function(e) { console.log(e); }
            });
        });

        $('#state').change(function() {
            $.ajax({
                url: '<?php echo e(route('api.cities_by_state', '')); ?>' + '/' + $(this).val(),
                method: 'GET',
                success: function(r) { fillSelect('city', 'id', 'name', r.cities, 'City'); },
                error: function(e) { console.log(e); }
            });
        });

        function fillSelect(id, idKey, nameKey, data, placeholder) {
            var sel = $('#' + id);
            sel.empty().append($('<option>').val('').text('--Select ' + placeholder + '--'));
            for (var i = 0; i < data.length; i++) {
                sel.append($('<option>').val(data[i][idKey]).text(data[i][nameKey]));
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/profile/edit.blade.php ENDPATH**/ ?>
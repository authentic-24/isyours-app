

<?php $__env->startSection('dashboard_title', 'My Skills'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* ── Skills multi-step form ──────────────────────────────────────────── */
    .sk-wrap { padding: 4px 0 24px; }

    /* Stepper header */
    .sk-stepper-card {
        background: #ffffff;
        border: 1px solid #eef0f8;
        border-radius: 24px;
        padding: 24px 32px 20px;
        box-shadow: 0 2px 8px rgba(49,39,131,0.06);
        margin-bottom: 20px;
    }

    .sk-stepper-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .sk-steps {
        display: flex;
        align-items: center;
        gap: 0;
        flex: 1;
        min-width: 0;
        overflow-x: auto;
        padding-bottom: 4px;
    }

    .sk-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        min-width: 80px;
        position: relative;
        cursor: pointer;
    }

    .sk-step + .sk-step::before {
        content: '';
        position: absolute;
        left: calc(-50% + 4px);
        right: calc(50% + 24px);
        top: 20px;
        height: 2px;
        background: #e2e8f8;
        z-index: 0;
    }

    .sk-step.done + .sk-step::before { background: #4b41df; }

    .sk-step-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 14px;
        position: relative;
        z-index: 1;
        transition: all .2s;
        background: #e7eefe;
        color: #787583;
        border: 2px solid #e2e8f8;
    }

    .sk-step.active .sk-step-circle {
        background: #4b41df;
        color: #fff;
        border-color: #4b41df;
        box-shadow: 0 6px 18px rgba(75,65,223,0.28);
    }

    .sk-step.done .sk-step-circle {
        background: #1a086e;
        color: #fff;
        border-color: #1a086e;
    }

    .sk-step-label {
        font-size: 11px;
        font-weight: 700;
        color: #787583;
        text-align: center;
        white-space: nowrap;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .sk-step.active .sk-step-label { color: #1a086e; }
    .sk-step.done .sk-step-label   { color: #4b41df; }

    .sk-step-counter {
        text-align: right;
        flex-shrink: 0;
    }

    .sk-step-counter p {
        margin: 0;
        font-size: 11px;
        font-weight: 700;
        color: #1a086e;
        text-transform: uppercase;
        letter-spacing: 0.06em;
    }

    .sk-progress-bar {
        height: 6px;
        background: #e7eefe;
        border-radius: 999px;
        margin-top: 4px;
        width: 120px;
        overflow: hidden;
    }

    .sk-progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #4b41df, #1a086e);
        border-radius: 999px;
        transition: width .35s ease;
    }

    /* Step panels */
    .sk-panel {
        display: none;
    }

    .sk-panel.active {
        display: block;
    }

    .sk-card {
        background: #ffffff;
        border: 1px solid #eef0f8;
        border-radius: 24px;
        padding: 28px 32px;
        box-shadow: 0 2px 8px rgba(49,39,131,0.06);
        margin-bottom: 20px;
    }

    .sk-card-head { margin-bottom: 20px; }

    .sk-card-title {
        margin: 0 0 4px;
        font-family: "Manrope", sans-serif;
        font-size: 17px;
        font-weight: 800;
        color: #1a086e;
    }

    .sk-card-copy {
        margin: 0;
        font-size: 13px;
        color: #6b7280;
        line-height: 1.6;
    }

    /* Skill grid */
    .sk-skill-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 14px;
    }

    .sk-skill-item {
        background: #f7f9ff;
        border: 1px solid #e4e9f6;
        border-radius: 16px;
        padding: 16px;
        transition: border-color .15s;
    }

    .sk-skill-item:hover { border-color: #b5beff; }

    .sk-skill-name {
        font-weight: 700;
        font-size: 14px;
        color: #111827;
        margin: 0 0 4px;
    }

    .sk-skill-desc {
        font-size: 12px;
        color: #6b7280;
        margin: 0 0 12px;
        line-height: 1.5;
    }

    .sk-pill-label {
        display: block;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #474551;
        margin-bottom: 8px;
    }

    .sk-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .sk-pill {
        position: relative;
    }

    .sk-pill input[type="radio"] {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .sk-pill span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px 10px;
        border-radius: 999px;
        border: 1px solid #dce2f3;
        background: #fff;
        color: #4b5563;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: all .15s ease;
        white-space: nowrap;
    }

    .sk-pill input[type="radio"]:checked + span {
        background: linear-gradient(135deg, #4b41df, #1a086e);
        border-color: #312783;
        color: #fff;
        box-shadow: 0 4px 12px rgba(49,39,131,0.2);
    }

    .sk-pill span:hover { border-color: #b8c3e6; color: #1a086e; }
    .sk-pill input[type="radio"]:checked + span:hover { color: #fff; }

    /* Category chip */
    .sk-category-chip {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #e9e7ff;
        color: #1a086e;
        font-weight: 700;
        font-size: 12px;
        padding: 7px 14px;
        border-radius: 999px;
        margin-bottom: 16px;
    }

    /* Nav buttons */
    .sk-nav {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin-top: 4px;
    }

    .sk-btn-primary {
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
        box-shadow: 0 8px 20px rgba(49,39,131,0.22);
        transition: transform .15s, box-shadow .2s;
    }

    .sk-btn-primary:hover { transform: translateY(-1px); box-shadow: 0 12px 24px rgba(49,39,131,0.28); }

    .sk-btn-secondary {
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

    .sk-btn-secondary:hover { background: #f3f6ff; }

    .sk-success-msg {
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

    .sk-hint {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 14px 16px;
        background: rgba(238,242,255,0.6);
        border: 1px solid #dde4f7;
        border-radius: 14px;
        font-size: 13px;
        color: #312783;
        line-height: 1.55;
        margin-bottom: 20px;
    }

    .sk-hint .material-symbols-outlined { font-size: 18px; color: #4b41df; flex-shrink: 0; margin-top: 1px; }

    .sk-toast {
        display: none;
        align-items: center;
        gap: 10px;
        position: fixed;
        top: 24px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        background: #fff1f1;
        border: 1px solid #fecaca;
        color: #991b1b;
        border-radius: 14px;
        padding: 13px 20px;
        font-weight: 700;
        font-size: 13px;
        box-shadow: 0 8px 24px rgba(153,27,27,0.14);
        min-width: 260px;
        max-width: 90vw;
        animation: sk-toast-in .22s ease;
    }

    .sk-toast.visible { display: flex; }

    .sk-toast .material-symbols-outlined { font-size: 20px; color: #dc2626; flex-shrink: 0; }

    @keyframes sk-toast-in {
        from { opacity: 0; transform: translateX(-50%) translateY(-8px); }
        to   { opacity: 1; transform: translateX(-50%) translateY(0); }
    }

    @media (max-width: 767.98px) {
        .sk-card { padding: 18px 16px; border-radius: 18px; }
        .sk-stepper-card { padding: 16px; }
        .sk-skill-grid { grid-template-columns: 1fr; }
        .sk-step-label { display: none; }
    }
</style>

<div class="sk-wrap">

    <div id="sk-toast" class="sk-toast" role="alert">
        <span class="material-symbols-outlined">warning</span>
        <span id="sk-toast-msg"></span>
    </div>

    <?php if(session('success')): ?>
        <div class="sk-success-msg">
            <span class="material-symbols-outlined">check_circle</span>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="sk-stepper-card">
        <div class="sk-stepper-row">
            <div class="sk-steps">
                <div class="sk-step active" data-step="1">
                    <div class="sk-step-circle">1</div>
                    <span class="sk-step-label">Power Skills</span>
                </div>
                <div class="sk-step" data-step="2">
                    <div class="sk-step-circle">2</div>
                    <span class="sk-step-label">Behavioral</span>
                </div>
                <div class="sk-step" data-step="3">
                    <div class="sk-step-circle">3</div>
                    <span class="sk-step-label">Culture</span>
                </div>
                <div class="sk-step" data-step="4">
                    <div class="sk-step-circle">4</div>
                    <span class="sk-step-label">Leadership</span>
                </div>
            </div>
            <div class="sk-step-counter">
                <p id="sk-step-text">Step 1 of 4</p>
                <div class="sk-progress-bar">
                    <div class="sk-progress-fill" id="sk-progress-fill" style="width:25%"></div>
                </div>
            </div>
        </div>
    </div>

    <form id="sk-form" action="<?php echo e(route('web.candidate.update')); ?>" method="post">
        <?php echo csrf_field(); ?>

        
        <div class="sk-panel active" id="sk-panel-1">
            <div class="sk-card">
                <div class="sk-card-head">
                    <h3 class="sk-card-title"><?php echo e(__('profile.power_skills_section')); ?></h3>
                    <p class="sk-card-copy">Rate the strengths you already use in real work situations.</p>
                </div>
                <div class="sk-hint">
                    <span class="material-symbols-outlined">info</span>
                    <span><?php echo e(__('profile.power_skills_desc')); ?></span>
                </div>
                <div class="sk-skill-grid">
                    <?php $__currentLoopData = $powerSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $userLevel = $user->powerSkills->where('id', $skill->id)->first();
                        $currentLevel = $userLevel ? $userLevel->pivot->level : 0;
                    ?>
                    <div class="sk-skill-item">
                        <p class="sk-skill-name"><?php echo e($skill->localized_name); ?></p>
                        <p class="sk-skill-desc"><?php echo e($skill->localized_description); ?></p>
                        <span class="sk-pill-label"><?php echo e(__('profile.level')); ?></span>
                        <input type="hidden" name="power_skills[<?php echo e($skill->id); ?>]" value="0">
                        <div class="sk-pills">
                            <label class="sk-pill">
                                <input type="radio" name="power_skills[<?php echo e($skill->id); ?>]" value="1" <?php echo e($currentLevel == 1 ? 'checked' : ''); ?>>
                                <span>1 · <?php echo e(__('profile.level_basic')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="power_skills[<?php echo e($skill->id); ?>]" value="2" <?php echo e($currentLevel == 2 ? 'checked' : ''); ?>>
                                <span>2 · <?php echo e(__('profile.level_intermediate')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="power_skills[<?php echo e($skill->id); ?>]" value="3" <?php echo e($currentLevel == 3 ? 'checked' : ''); ?>>
                                <span>3 · <?php echo e(__('profile.level_advanced')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="power_skills[<?php echo e($skill->id); ?>]" value="4" <?php echo e($currentLevel == 4 ? 'checked' : ''); ?>>
                                <span>4 · <?php echo e(__('profile.level_expert')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="power_skills[<?php echo e($skill->id); ?>]" value="5" <?php echo e($currentLevel == 5 ? 'checked' : ''); ?>>
                                <span>5 · <?php echo e(__('profile.level_master')); ?></span>
                            </label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="sk-card">
                <div class="sk-nav">
                    <span></span>
                    <button type="button" class="sk-btn-primary sk-next" data-next="2">
                        Next: Behavioral
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>

        
        <div class="sk-panel" id="sk-panel-2">
            <div class="sk-card">
                <div class="sk-card-head">
                    <h3 class="sk-card-title"><?php echo e(__('profile.behavioral_competencies')); ?></h3>
                    <p class="sk-card-copy">Define how you operate, collaborate and solve challenges in different professional contexts.</p>
                </div>
                <div class="sk-hint">
                    <span class="material-symbols-outlined">info</span>
                    <span><?php echo e(__('profile.behavioral_competencies_desc')); ?></span>
                </div>
                <?php $__currentLoopData = $behavioralCompetencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category => $competencies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="margin-bottom:28px;">
                    <div class="sk-category-chip">
                        <span class="material-symbols-outlined" style="font-size:16px;">category</span>
                        <?php if($category == 'cardinal'): ?>   <?php echo e(__('profile.cardinal_competencies')); ?>

                        <?php elseif($category == 'specific'): ?> <?php echo e(__('profile.specific_competencies')); ?>

                        <?php else: ?> <?php echo e(__('profile.technical_competencies')); ?>

                        <?php endif; ?>
                    </div>
                    <div class="sk-skill-grid">
                        <?php $__currentLoopData = $competencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $userComp = $user->behavioralCompetencies->where('id', $competency->id)->first();
                            $currentLevel = $userComp ? $userComp->pivot->level : 0;
                        ?>
                        <div class="sk-skill-item">
                            <p class="sk-skill-name"><?php echo e($competency->localized_name); ?></p>
                            <p class="sk-skill-desc"><?php echo e($competency->localized_description); ?></p>
                            <span class="sk-pill-label"><?php echo e(__('profile.level')); ?></span>
                            <input type="hidden" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="0">
                            <div class="sk-pills">
                                <label class="sk-pill">
                                    <input type="radio" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="1" <?php echo e($currentLevel == 1 ? 'checked' : ''); ?>>
                                    <span>1 · <?php echo e(__('profile.level_initial')); ?></span>
                                </label>
                                <label class="sk-pill">
                                    <input type="radio" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="2" <?php echo e($currentLevel == 2 ? 'checked' : ''); ?>>
                                    <span>2 · <?php echo e(__('profile.level_developing')); ?></span>
                                </label>
                                <label class="sk-pill">
                                    <input type="radio" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="3" <?php echo e($currentLevel == 3 ? 'checked' : ''); ?>>
                                    <span>3 · <?php echo e(__('profile.level_competent')); ?></span>
                                </label>
                                <label class="sk-pill">
                                    <input type="radio" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="4" <?php echo e($currentLevel == 4 ? 'checked' : ''); ?>>
                                    <span>4 · <?php echo e(__('profile.level_advanced')); ?></span>
                                </label>
                                <label class="sk-pill">
                                    <input type="radio" name="behavioral_competencies[<?php echo e($competency->id); ?>]" value="5" <?php echo e($currentLevel == 5 ? 'checked' : ''); ?>>
                                    <span>5 · <?php echo e(__('profile.level_expert')); ?></span>
                                </label>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="sk-card">
                <div class="sk-nav">
                    <button type="button" class="sk-btn-secondary sk-prev" data-prev="1">
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                        Back
                    </button>
                    <button type="button" class="sk-btn-primary sk-next" data-next="3">
                        Next: Culture
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>

        
        <div class="sk-panel" id="sk-panel-3">
            <div class="sk-card">
                <div class="sk-card-head">
                    <h3 class="sk-card-title"><?php echo e(__('profile.organizational_culture')); ?></h3>
                    <p class="sk-card-copy">Prioritize the environment and company values that matter most to you.</p>
                </div>
                <div class="sk-hint">
                    <span class="material-symbols-outlined">info</span>
                    <span><?php echo e(__('profile.organizational_culture_advice')); ?></span>
                </div>
                <div class="sk-skill-grid">
                    <?php $__currentLoopData = $cultureValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $userValue = $user->organizationalCultureValues->where('id', $value->id)->first();
                        $currentPriority = $userValue ? $userValue->pivot->priority : 0;
                    ?>
                    <div class="sk-skill-item">
                        <p class="sk-skill-name"><?php echo e($value->localized_name); ?></p>
                        <p class="sk-skill-desc"><?php echo e($value->localized_description); ?></p>
                        <span class="sk-pill-label"><?php echo e(__('profile.priority')); ?></span>
                        <input type="hidden" name="culture_values[<?php echo e($value->id); ?>]" value="0">
                        <div class="sk-pills">
                            <label class="sk-pill">
                                <input type="radio" name="culture_values[<?php echo e($value->id); ?>]" value="1" <?php echo e($currentPriority == 1 ? 'checked' : ''); ?>>
                                <span>1 · <?php echo e(__('profile.priority_critical')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="culture_values[<?php echo e($value->id); ?>]" value="2" <?php echo e($currentPriority == 2 ? 'checked' : ''); ?>>
                                <span>2 · <?php echo e(__('profile.priority_very_important')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="culture_values[<?php echo e($value->id); ?>]" value="3" <?php echo e($currentPriority == 3 ? 'checked' : ''); ?>>
                                <span>3 · <?php echo e(__('profile.priority_important')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="culture_values[<?php echo e($value->id); ?>]" value="4" <?php echo e($currentPriority == 4 ? 'checked' : ''); ?>>
                                <span>4 · <?php echo e(__('profile.priority_desirable')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="culture_values[<?php echo e($value->id); ?>]" value="5" <?php echo e($currentPriority == 5 ? 'checked' : ''); ?>>
                                <span>5 · <?php echo e(__('profile.priority_optional')); ?></span>
                            </label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="sk-card">
                <div class="sk-nav">
                    <button type="button" class="sk-btn-secondary sk-prev" data-prev="2">
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                        Back
                    </button>
                    <button type="button" class="sk-btn-primary sk-next" data-next="4">
                        Next: Leadership
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_forward</span>
                    </button>
                </div>
            </div>
        </div>

        
        <div class="sk-panel" id="sk-panel-4">
            <div class="sk-card">
                <div class="sk-card-head">
                    <h3 class="sk-card-title"><?php echo e(__('profile.leadership_preferences')); ?></h3>
                    <p class="sk-card-copy">Mark the traits and leadership style you expect from the teams and managers around you.</p>
                </div>
                <div class="sk-hint">
                    <span class="material-symbols-outlined">info</span>
                    <span><?php echo e(__('profile.leadership_advice')); ?></span>
                </div>
                <div class="sk-skill-grid">
                    <?php $__currentLoopData = $leadershipPrefs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $userPref = $user->leadershipPreferences->where('id', $pref->id)->first();
                        $currentImportance = $userPref ? $userPref->pivot->importance : 0;
                    ?>
                    <div class="sk-skill-item">
                        <p class="sk-skill-name"><?php echo e($pref->localized_name); ?></p>
                        <p class="sk-skill-desc"><?php echo e($pref->localized_description); ?></p>
                        <span class="sk-pill-label"><?php echo e(__('profile.importance')); ?></span>
                        <input type="hidden" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="0">
                        <div class="sk-pills">
                            <label class="sk-pill">
                                <input type="radio" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="1" <?php echo e($currentImportance == 1 ? 'checked' : ''); ?>>
                                <span>1 · <?php echo e(__('profile.importance_indispensable')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="2" <?php echo e($currentImportance == 2 ? 'checked' : ''); ?>>
                                <span>2 · <?php echo e(__('profile.importance_very_important')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="3" <?php echo e($currentImportance == 3 ? 'checked' : ''); ?>>
                                <span>3 · <?php echo e(__('profile.importance_important')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="4" <?php echo e($currentImportance == 4 ? 'checked' : ''); ?>>
                                <span>4 · <?php echo e(__('profile.importance_desirable')); ?></span>
                            </label>
                            <label class="sk-pill">
                                <input type="radio" name="leadership_preferences[<?php echo e($pref->id); ?>]" value="5" <?php echo e($currentImportance == 5 ? 'checked' : ''); ?>>
                                <span>5 · <?php echo e(__('profile.importance_valuable')); ?></span>
                            </label>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="sk-card">
                <div class="sk-nav">
                    <button type="button" class="sk-btn-secondary sk-prev" data-prev="3">
                        <span class="material-symbols-outlined" style="font-size:18px;">arrow_back</span>
                        Back
                    </button>
                    <button type="submit" class="sk-btn-primary">
                        <span class="material-symbols-outlined" style="font-size:18px;">save</span>
                        <?php echo e(__('profile.save')); ?>

                    </button>
                </div>
            </div>
        </div>

    </form>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
(function () {
    var totalSteps = 4;
    var current = 1;

    var toastTimer = null;

    function showToast(msg) {
        var toast = document.getElementById('sk-toast');
        document.getElementById('sk-toast-msg').textContent = msg;
        toast.classList.add('visible');
        if (toastTimer) clearTimeout(toastTimer);
        toastTimer = setTimeout(function() { toast.classList.remove('visible'); }, 4000);
    }

    var stepLabels = {
        1: 'Power Skills',
        2: 'Behavioral Competencies',
        3: 'Organizational Culture',
        4: 'Leadership Preferences'
    };

    function validateStep(step) {
        var panel = document.getElementById('sk-panel-' + step);
        var radios = panel.querySelectorAll('input[type="radio"]');
        var names = {};
        radios.forEach(function(r) { names[r.name] = false; });
        radios.forEach(function(r) { if (r.checked) names[r.name] = true; });
        var missing = Object.values(names).filter(function(v) { return !v; }).length;
        if (missing > 0) {
            showToast('Please complete all ' + missing + ' item' + (missing > 1 ? 's' : '') + ' in "' + stepLabels[step] + '" before continuing.');
            return false;
        }
        return true;
    }

    function goTo(step) {
        // Hide all panels
        document.querySelectorAll('.sk-panel').forEach(function(p) { p.classList.remove('active'); });
        document.getElementById('sk-panel-' + step).classList.add('active');

        // Update step circles
        document.querySelectorAll('.sk-step').forEach(function(s) {
            var n = parseInt(s.dataset.step);
            s.classList.remove('active', 'done');
            if (n === step) s.classList.add('active');
            if (n < step)  s.classList.add('done');
        });

        // Progress bar & counter
        document.getElementById('sk-progress-fill').style.width = (step / totalSteps * 100) + '%';
        document.getElementById('sk-step-text').textContent = 'Step ' + step + ' of ' + totalSteps;

        current = step;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    document.addEventListener('click', function(e) {
        var nextBtn = e.target.closest('.sk-next');
        var prevBtn = e.target.closest('.sk-prev');
        if (nextBtn) {
            var dest = parseInt(nextBtn.dataset.next);
            if (!validateStep(current)) return;
            goTo(dest);
        }
        if (prevBtn) goTo(parseInt(prevBtn.dataset.prev));
    });

    // Validate step 4 before submit
    document.getElementById('sk-form').addEventListener('submit', function(e) {
        if (!validateStep(4)) {
            e.preventDefault();
        }
    });

    // Also allow clicking stepper circles to navigate to visited steps
    document.querySelectorAll('.sk-step').forEach(function(s) {
        s.addEventListener('click', function() {
            var target = parseInt(s.dataset.step);
            if (target < current || s.classList.contains('done')) {
                goTo(target);
            } else if (target === current + 1) {
                // Forward click: validate current step first
                if (validateStep(current)) goTo(target);
            }
        });
    });
})();
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/app2', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/profile/skills.blade.php ENDPATH**/ ?>
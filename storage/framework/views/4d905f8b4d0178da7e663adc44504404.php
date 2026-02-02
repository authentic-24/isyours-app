<?php $__env->startSection('content'); ?>
<style>
/* Ocultar header */
.main-header,
#language-bar {
    display: none !important;
}

body {
    padding-top: 0 !important;
}

/* Estilos minimalistas para login */
.login-section {
    min-height: 100vh;
    background: #f3f4f6 !important;
    display: flex;
    align-items: center;
    padding: 40px 0;
}

.login-logo {
    position: absolute;
    top: 20px;
    left: 20px;
}

.login-logo a {
    display: inline-block;
}

.login-logo img {
    max-width: 140px;
    height: auto;
}

.language-selector {
    position: absolute;
    top: 20px;
    right: 20px;
}

.language-selector select {
    border: 1px solid #d1d5db;
    background: #ffffff;
    color: #1a1a1a;
    border-radius: 4px;
    padding: 8px 12px;
    font-size: 13px;
    cursor: pointer;
}

.language-selector select:focus {
    outline: none;
    border-color: #1a1a1a;
}

.login-overlay {
    display: none !important;
}

.login-card {
    background: #ffffff !important;
    backdrop-filter: none !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
    border: 1px solid #e5e7eb !important;
    padding: 40px !important;
    max-width: 400px !important;
}

.login-badge {
    display: none !important;
}

.login-header {
    padding: 0 0 30px 0 !important;
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 30px;
}

.main-heading {
    color: #1a1a1a !important;
    font-size: 28px !important;
    font-weight: 600 !important;
    text-shadow: none !important;
    margin-bottom: 0 !important;
}

.subtitle {
    display: none !important;
}

.login-body {
    padding: 0 !important;
}

.form-label {
    color: #1a1a1a !important;
    font-weight: 500 !important;
    font-size: 14px !important;
    margin-bottom: 8px !important;
}

.form-label .icon {
    display: none !important;
}

.form-control-enhanced {
    border: 1px solid #d1d5db !important;
    background: #ffffff !important;
    color: #1a1a1a !important;
    border-radius: 4px !important;
    padding: 12px 16px !important;
    font-size: 15px !important;
}

.form-control-enhanced:focus {
    border-color: #1a1a1a !important;
    box-shadow: none !important;
    outline: none !important;
}

.input-focus-line {
    display: none !important;
}

.btn-enhanced {
    background: #1a1a1a !important;
    border: none !important;
    box-shadow: none !important;
    border-radius: 4px !important;
    padding: 14px 24px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
}

.btn-enhanced:hover {
    background: #333333 !important;
}

.forgot-link,
.signup-link {
    color: #1a1a1a !important;
    font-weight: 600 !important;
    text-decoration: underline !important;
}

.forgot-link:hover,
.signup-link:hover {
    color: #333333 !important;
}

.login-footer {
    padding: 30px 0 0 0 !important;
    border-top: 1px solid #e5e5e5;
    margin-top: 30px;
}

.signup-text {
    color: #666666 !important;
    font-size: 14px !important;
}

.social-divider,
.social-login {
    display: none !important;
} !important;
    font-size: 15px !important;
    font-weight: 500 !important;
    width: 100% !important;
    margin-top: 10px !important;
}

.btn-enhanced:hover {
    background: #333333 !important;
}

.forgot-link {
    color: #666666 !important;
    font-size: 14px !important;
    text-decoration: underline !important;
}

.forgot-link:hover {
    color: #1a1a1a !important;
}

.remember-me label {
    color: #1a1a1a !important;
    font-size: 14px !important;
}

.login-footer {
    padding: 30px 0 0 0 !important;
    border-top: 1px solid #e5e5e5;
    margin-top: 30px;
}

.signup-text {
    color: #666666 !important;
    font-size: 14px !important;
}

.signup-link {
    color: #1a1a1a !important;
    font-weight: 600 !important;
    text-decoration: underline !important;
}

.signup-link:hover {
    color: #333333 !important;
}

.social-divider {
    display: none !important;
}

.social-login {
    display: none !important;
}

.alert-message.success {
    background: #f0fdf4 !important;
    border: 1px solid #86efac !important;
    color: #166534 !important;
    border-radius: 4px !important;
}

.alert-message.error {
    background: #fef2f2 !important;
    border: 1px solid #fecaca !important;
    color: #991b1b !important;
    border-radius: 4px !important;
}

.form-options {
    margin: 20px 0 !important;
}
</style>

<!-- Login Section -->
<section class="login-section">
    <!-- Logo -->
    <div class="login-logo">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="Is Yours Logo">
        </a>
    </div>
    
    <div class="language-selector">
        <select onchange="window.location.href=this.value">
            <option value="<?php echo e(route('language.switch', 'en')); ?>" <?php echo e(app()->getLocale() == 'en' ? 'selected' : ''); ?>>EN</option>
            <option value="<?php echo e(route('language.switch', 'es')); ?>" <?php echo e(app()->getLocale() == 'es' ? 'selected' : ''); ?>>ES</option>
        </select>
    </div>
    
    <div class="login-overlay"></div>

    <div class="auto-container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <div class="login-card">
                    
                    <div class="login-header text-center">
                        <div class="login-badge">
                            <span class="icon flaticon-user"></span>
                            <?php echo e(__('home.login_welcome_back')); ?>

                        </div>
                        <h2 class="main-heading"><?php echo e(__('home.login_sign_in')); ?></h2>
                        <p class="subtitle"><?php echo e(__('home.login_subtitle')); ?></p>
                    </div>

                    
                    <div class="login-body">
                        <?php if(session('message')): ?>
                            <div class="alert-message success">
                                <span class="icon flaticon-check"></span>
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>
                        
                        <?php if($errors->any()): ?>
                            <div class="alert-message error">
                                <span class="icon flaticon-warning"></span>
                                <ul class="error-list">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <form method="POST" action="<?php echo e(route('login_post')); ?>" autocomplete="off" class="enhanced-form">
                            <?php echo csrf_field(); ?>
                            <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            
                            <div class="form-group-enhanced">
                                <label for="email" class="form-label">
                                    <span class="icon flaticon-email"></span>
                                    <?php echo e(__('home.email_address')); ?>

                                </label>
                                <div class="input-wrapper">
                                    <input type="email" 
                                           class="form-control-enhanced" 
                                           id="email" 
                                           name="email" 
                                           placeholder="<?php echo e(__('home.enter_email')); ?>"
                                           value="<?php echo e(old('email')); ?>"
                                           required>
                                    <span class="input-focus-line"></span>
                                </div>
                            </div>
                            
                            
                            <div class="form-group-enhanced">
                                <label for="password" class="form-label">
                                    <span class="icon flaticon-lock"></span>
                                    <?php echo e(__('home.password')); ?>

                                </label>
                                <div class="input-wrapper">
                                    <input type="password" 
                                           class="form-control-enhanced" 
                                           id="password" 
                                           name="password" 
                                           placeholder="<?php echo e(__('home.enter_password')); ?>"
                                           required>
                                    <span class="input-focus-line"></span>
                                    <button type="button" class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </button>
                                </div>
                            </div>

                            
                            <div class="form-options">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                                    <label for="remember"><?php echo e(__('home.remember_me')); ?></label>
                                </div>
                                <a href="#" class="forgot-link"><?php echo e(__('home.forgot_password')); ?></a>
                            </div>
                            
                            
                            <div class="form-group-submit">
                                <button type="submit" class="btn-enhanced login-btn">
                                    <span class="btn-text"><?php echo e(__('home.sign_in')); ?></span>
                                    <span class="btn-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>

                    
                    <div class="login-footer text-center">
                        <p class="signup-text">
                            <?php echo e(__('home.dont_have_account')); ?> 
                            <a href="<?php echo e(route('web_register')); ?>" class="signup-link"><?php echo e(__('home.create_account')); ?></a>
                        </p>
                        <p class="privacy-text" style="margin-top: 15px; font-size: 13px; color: #666666;">
                            <?php echo e(__('home.by_logging_in')); ?>

                            <a href="<?php echo e(route('terms')); ?>" target="_blank" class="forgot-link" style="text-decoration: none;"><?php echo e(__('home.terms_conditions')); ?></a>
                            <?php echo e(__('home.and')); ?>

                            <a href="<?php echo e(route('privacy')); ?>" target="_blank" class="forgot-link" style="text-decoration: none;"><?php echo e(__('home.privacy_policy')); ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views/login/index.blade.php ENDPATH**/ ?>
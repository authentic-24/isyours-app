

<?php $__env->startSection('content'); ?>
<!-- Login Section -->
<section class="login-section">
    <div class="login-overlay"></div>
    <div class="floating-elements">
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
    </div>
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8 col-10">
                <div class="login-card">
                    
                    
                    <!-- Header -->
                    <div class="login-header text-center">
                        <div class="login-badge">
                            <span class="icon flaticon-user"></span>
                            <?php echo e(__('home.login_welcome_back')); ?>

                        </div>
                        <h2 class="main-heading"><?php echo e(__('home.login_sign_in')); ?></h2>
                        <p class="subtitle"><?php echo e(__('home.login_subtitle')); ?></p>
                    </div>

                    <!-- Form Body -->
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
                            <!-- Email Field -->
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
                            
                            <!-- Password Field -->
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

                            <!-- Remember & Forgot -->
                            <div class="form-options">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                                    <label for="remember"><?php echo e(__('home.remember_me')); ?></label>
                                </div>
                                <a href="#" class="forgot-link"><?php echo e(__('home.forgot_password')); ?></a>
                            </div>
                            
                            <!-- Submit Button -->
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

                    <!-- Footer -->
                    <div class="login-footer text-center">
                        <p class="signup-text">
                            <?php echo e(__('home.dont_have_account')); ?> 
                            <a href="<?php echo e(route('web_register')); ?>" class="signup-link"><?php echo e(__('home.create_account')); ?></a>
                        </p>
                        
                        <div class="social-divider">
                            <span class="divider-line"></span>
                            <span class="divider-text"><?php echo e(__('home.or_continue_with')); ?></span>
                            <span class="divider-line"></span>
                        </div>
                        
                        <div class="social-login">
                            <a href="#" class="social-btn google-btn">
                                <i class="fab fa-google"></i>
                                <span>Google</span>
                            </a>
                            
                        </div>
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

<?php echo $__env->make('layouts.app_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\login\login.blade.php ENDPATH**/ ?>
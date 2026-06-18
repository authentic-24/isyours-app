<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Sign In &mdash; Is Yours</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: "Plus Jakarta Sans", sans-serif;
            background: radial-gradient(circle at top right, #e4dfff 0%, #f8f9fa 50%);
            color: #191c1d;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        main {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 64px 24px;
        }

        .ln-center {
            width: 100%;
            max-width: 448px;
        }

        /* Branding */
        .ln-brand {
            text-align: center;
            margin-bottom: 40px;
        }

        .ln-brand-logo {
            height: 52px;
            width: auto;
            margin-bottom: 18px;
        }

        .ln-brand p {
            font-size: 15px;
            line-height: 1.6;
            color: #474551;
        }

        /* Card */
        .ln-card {
            background: #ffffff;
            border: 1px solid rgba(200,196,211,0.3);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(49,39,131,0.05);
        }

        @media (min-width: 768px) {
            .ln-card { padding: 40px; }
        }

        /* Alert */
        .ln-alert {
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 16px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .ln-alert.success { background: #edfdf5; border: 1px solid #c9f3dc; color: #166534; }
        .ln-alert.error   { background: #fff5f5; border: 1px solid #fecaca; color: #991b1b; }
        .ln-alert .material-symbols-outlined { font-size: 18px; flex-shrink: 0; margin-top: 1px; }
        .ln-alert ul { margin: 2px 0 0; padding-left: 16px; }

        /* Form spacing */
        .ln-form { display: flex; flex-direction: column; gap: 16px; }

        /* Field */
        .ln-field-label-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .ln-label {
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: 0.02em;
            color: #191c1d;
        }

        .ln-forgot {
            font-size: 12px;
            font-weight: 500;
            line-height: 1.4;
            color: #005ac1;
            text-decoration: none;
        }

        .ln-forgot:hover { text-decoration: underline; }

        .ln-input-wrap { position: relative; }

        .ln-input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #787583;
            pointer-events: none;
        }

        .ln-input {
            width: 100%;
            padding: 8px 16px 8px 44px;
            background: #ffffff;
            border: 1px solid #c8c4d3;
            border-radius: 8px;
            font-size: 16px;
            line-height: 1.6;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: #191c1d;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
            -webkit-appearance: none;
        }

        .ln-input::placeholder { color: #b0b7c9; }

        .ln-input:focus {
            border-color: #005ac1;
            box-shadow: 0 0 0 2px rgba(0,90,193,0.2);
        }

        .ln-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #787583;
            display: flex;
            align-items: center;
            padding: 0;
            transition: color .15s;
        }

        .ln-eye:hover { color: #312783; }
        .ln-eye .material-symbols-outlined { font-size: 20px; }

        /* Submit */
        .ln-submit {
            width: 100%;
            padding: 8px 16px;
            background: #312783;
            color: #ffffff;
            font-family: "Plus Jakarta Sans", sans-serif;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.4;
            letter-spacing: 0.02em;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-top: 8px;
            transition: opacity .2s, transform .1s;
        }

        .ln-submit:hover   { opacity: 0.9; }
        .ln-submit:active  { transform: scale(0.98); }

        /* Divider */
        .ln-divider {
            position: relative;
            margin: 40px 0;
        }

        .ln-divider-line {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
        }

        .ln-divider-line div {
            width: 100%;
            border-top: 1px solid #c8c4d3;
        }

        .ln-divider-label {
            position: relative;
            display: flex;
            justify-content: center;
        }

        .ln-divider-label span {
            padding: 0 16px;
            background: #ffffff;
            font-size: 12px;
            font-weight: 500;
            line-height: 1.4;
            color: #787583;
        }

        /* Register prompt */
        .ln-register {
            text-align: center;
            margin-top: 24px;
            font-size: 16px;
            line-height: 1.6;
            color: #474551;
        }

        .ln-register a {
            color: #005ac1;
            font-weight: 600;
            text-decoration: none;
        }

        .ln-register a:hover { text-decoration: underline; }

        /* Legal */
        .ln-legal {
            margin-top: 12px;
            font-size: 12px;
            color: #787583;
            text-align: center;
            line-height: 1.6;
        }

        .ln-legal a { color: #312783; font-weight: 600; text-decoration: none; }
        .ln-legal a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<main>
    <div class="ln-center">

        
        <div class="ln-brand">
            <img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="Is Yours" class="ln-brand-logo">
            <p><?php echo e(__('home.login_subtitle')); ?></p>
        </div>

        
        <div class="ln-card">

            <?php if(session('message')): ?>
                <div class="ln-alert success">
                    <span class="material-symbols-outlined">check_circle</span>
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="ln-alert error">
                    <span class="material-symbols-outlined">error</span>
                    <div><ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul></div>
                </div>
            <?php endif; ?>

            <form class="ln-form" method="POST" action="<?php echo e(route('login_post')); ?>" novalidate autocomplete="off">
                <?php echo csrf_field(); ?>

                
                <div>
                    <label class="ln-label" for="email"><?php echo e(__('home.email_address')); ?></label>
                    <div class="ln-input-wrap" style="margin-top:8px;">
                        <span class="material-symbols-outlined ln-input-icon">mail</span>
                        <input class="ln-input" type="email" id="email" name="email"
                            value="<?php echo e(old('email')); ?>"
                            placeholder="name@company.com"
                            autocomplete="email" autofocus>
                    </div>
                </div>

                
                <div>
                    <div class="ln-field-label-row">
                        <label class="ln-label" for="password"><?php echo e(__('home.password')); ?></label>
                        <a class="ln-forgot" href="#"><?php echo e(__('home.forgot_password')); ?></a>
                    </div>
                    <div class="ln-input-wrap">
                        <span class="material-symbols-outlined ln-input-icon">lock</span>
                        <input class="ln-input" type="password" id="password" name="password"
                            placeholder="••••••••"
                            autocomplete="current-password">
                        <button type="button" class="ln-eye" id="eyeBtn" tabindex="-1">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>

                
                <button type="submit" class="ln-submit"><?php echo e(__('home.sign_in')); ?></button>
            </form>

            
            <div class="ln-divider">
                <div class="ln-divider-line"><div></div></div>
                <div class="ln-divider-label"><span><?php echo e(__('home.or_continue_with')); ?></span></div>
            </div>

            
            <p class="ln-register">
                <?php echo e(__('home.dont_have_account')); ?>

                <a href="<?php echo e(route('web_register')); ?>"><?php echo e(__('home.create_account')); ?></a>
            </p>

            <p class="ln-legal">
                <?php echo e(__('home.by_logging_in')); ?>

                <a href="<?php echo e(route('terms')); ?>" target="_blank"><?php echo e(__('home.terms_conditions')); ?></a>
                <?php echo e(__('home.and')); ?>

                <a href="<?php echo e(route('privacy')); ?>" target="_blank"><?php echo e(__('home.privacy_policy')); ?></a>
            </p>
        </div>

    </div>
</main>

<script>
(function () {
    var btn   = document.getElementById('eyeBtn');
    var input = document.getElementById('password');
    if (!btn || !input) return;
    btn.addEventListener('click', function () {
        var icon = btn.querySelector('.material-symbols-outlined');
        if (input.type === 'password') {
            input.type = 'text';
            icon.textContent = 'visibility_off';
        } else {
            input.type = 'password';
            icon.textContent = 'visibility';
        }
    });
})();
</script>


<div class="lang-fab" id="langFab">
    <button class="lang-fab-btn" id="langFabBtn" aria-label="Change language">
        <span class="material-symbols-outlined" style="font-size:18px">language</span>
        <span style="font-size:13px;font-weight:700;letter-spacing:.05em"><?php echo e(strtoupper(app()->getLocale())); ?></span>
    </button>
    <div class="lang-fab-menu" id="langFabMenu">
        <a href="<?php echo e(route('language.switch', 'en')); ?>" class="lang-option <?php echo e(app()->getLocale() === 'en' ? 'active' : ''); ?>">
            <span>🇺🇸</span> EN
        </a>
        <a href="<?php echo e(route('language.switch', 'es')); ?>" class="lang-option <?php echo e(app()->getLocale() === 'es' ? 'active' : ''); ?>">
            <span>🇪🇸</span> ES
        </a>
    </div>
</div>
<style>
    .lang-fab{position:fixed;bottom:24px;left:24px;z-index:9999;display:flex;flex-direction:column;align-items:flex-start;gap:6px}
    .lang-fab-btn{display:flex;align-items:center;gap:6px;background:#312783;color:#fff;border:none;border-radius:50px;padding:10px 16px;font-family:"Plus Jakarta Sans",sans-serif;cursor:pointer;box-shadow:0 4px 16px rgba(49,39,131,.35);transition:background .2s,transform .15s,box-shadow .2s}
    .lang-fab-btn:hover{background:#1e1660;box-shadow:0 6px 20px rgba(49,39,131,.45);transform:translateY(-1px)}
    .lang-fab-menu{display:none;flex-direction:column;gap:4px;background:#fff;border:1px solid #ece9f6;border-radius:10px;padding:6px;box-shadow:0 8px 24px rgba(49,39,131,.15);min-width:90px}
    .lang-fab-menu.open{display:flex}
    .lang-option{display:flex;align-items:center;gap:8px;padding:8px 12px;border-radius:7px;font-size:13px;font-weight:600;color:#312783;text-decoration:none;transition:background .15s}
    .lang-option:hover{background:#f0eeff}
    .lang-option.active{background:#312783;color:#fff}
</style>
<script>
(function(){
    var btn = document.getElementById('langFabBtn');
    var menu = document.getElementById('langFabMenu');
    btn.addEventListener('click', function(e){ e.stopPropagation(); menu.classList.toggle('open'); });
    document.addEventListener('click', function(){ menu.classList.remove('open'); });
})();
</script>

</body>
</html><?php /**PATH C:\laragon\www\isyours\resources\views/login/index.blade.php ENDPATH**/ ?>
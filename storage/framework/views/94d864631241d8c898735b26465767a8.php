<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Is Yours - Dashboard</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo e(asset('images/favicon.png')); ?>" type="image/x-icon">

    <style>
        :root {
            --isy-primary: #1a086e;
            --isy-secondary: #4b41df;
            --isy-surface: #f9f9ff;
            --isy-card: rgba(255, 255, 255, 0.88);
            --isy-border: #dce2f3;
            --isy-text: #151c27;
            --isy-muted: #6b7280;
        }

        body {
            margin: 0;
            background: var(--isy-surface);
            font-family: "Inter", sans-serif;
            color: var(--isy-text);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 450, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .dash-shell {
            min-height: 100vh;
            display: flex;
        }

        .dash-sidebar {
            width: 280px;
            position: fixed;
            inset: 0 auto 0 0;
            background: linear-gradient(180deg, #312783 0%, #1a086e 100%);
            color: #fff;
            padding: 24px 16px;
            z-index: 50;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 10px 0 30px rgba(49, 39, 131, 0.2);
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            padding: 0 8px;
        }

        .brand-logo {
            display: block;
            height: 36px;
            width: auto;
            max-width: 200px;
            object-fit: contain;
        }

        .dash-nav {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .dash-nav a {
            color: rgba(255, 255, 255, 0.78);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            transition: all .2s ease;
            font-weight: 600;
            font-size: .92rem;
        }

        .dash-nav a:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #fff;
        }

        .dash-nav a.active {
            background: rgba(255, 255, 255, 0.16);
            color: #fff;
            box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.22);
        }

        .dash-sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 14px;
        }

        .dash-main {
            margin-left: 280px;
            width: calc(100% - 280px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: radial-gradient(circle at top right, #e4dfff 0%, #f9f9ff 55%);
        }

        .dash-topbar {
            height: 78px;
            position: sticky;
            top: 0;
            z-index: 30;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid #e6e8f2;
        }

        .dash-title {
            margin: 0;
            font-family: "Manrope", sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--isy-primary);
        }

        .dash-user {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #374151;
        }

        .dash-language {
            position: relative;
        }

        .dash-language select {
            min-width: 64px;
            height: 34px;
            border-radius: 999px;
            border: 1px solid #d7ddee;
            background: #f3f6ff;
            color: #312783;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            padding: 0 28px 0 12px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .dash-language::after {
            content: 'expand_more';
            font-family: 'Material Symbols Outlined';
            font-size: 18px;
            color: #4b41df;
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .dash-language select:focus {
            border-color: #b5beff;
            box-shadow: 0 0 0 3px rgba(75, 65, 223, 0.16);
            outline: none;
        }

        .dash-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--isy-secondary), var(--isy-primary));
            color: white;
            display: grid;
            place-items: center;
            font-size: 13px;
            font-weight: 700;
        }

        /* ── Topbar icon buttons ───────────────────────────────── */
        .tb-icon-btn {
            position: relative;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 1px solid #e2e6f3;
            background: #f7f9ff;
            color: #4b41df;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .15s, border-color .15s;
            flex-shrink: 0;
        }

        .tb-icon-btn:hover { background: #eef1ff; border-color: #b5beff; }

        .tb-icon-btn .material-symbols-outlined { font-size: 20px; }

        .tb-badge {
            position: absolute;
            top: 4px;
            right: 4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            border: 2px solid #fff;
        }

        /* Settings dropdown */
        .tb-dropdown {
            position: relative;
        }

        .tb-dropdown-menu {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            min-width: 200px;
            background: #fff;
            border: 1px solid #e2e6f3;
            border-radius: 14px;
            box-shadow: 0 12px 32px rgba(49,39,131,0.14);
            padding: 6px 0;
            z-index: 999;
            animation: tb-dd-in .15s ease;
        }

        .tb-dropdown-menu.open { display: block; }

        @keyframes tb-dd-in {
            from { opacity: 0; transform: translateY(-6px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .tb-dd-header {
            padding: 10px 16px 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #9ca3af;
        }

        .tb-dd-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 16px;
            font-size: 13px;
            font-weight: 600;
            color: #1f2937;
            text-decoration: none;
            transition: background .12s;
        }

        .tb-dd-item:hover { background: #f3f6ff; color: #1a086e; text-decoration: none; }

        .tb-dd-item .material-symbols-outlined { font-size: 17px; color: #4b41df; }

        .tb-dd-divider {
            height: 1px;
            background: #f0f1f8;
            margin: 4px 0;
        }

        .tb-dd-item.danger { color: #dc2626; }
        .tb-dd-item.danger .material-symbols-outlined { color: #dc2626; }
        .tb-dd-item.danger:hover { background: #fff5f5; }

        .dash-content {
            padding: 14px;
            flex: 1;
        }

        .dash-content > * {
            background: transparent;
        }

        /* Stitch-like visual normalization for legacy dashboard widgets */
        .dash-content .page-title,
        .dash-content .ls-section,
        .dash-content .candidate-detail-section,
        .dash-content .job-detail-section {
            background: transparent !important;
        }

        .dash-content .page-title {
            padding: 8px 0 16px;
            margin-bottom: 4px;
        }

        .dash-content .page-title .title-outer h1,
        .dash-content .title-box h3 {
            font-family: "Manrope", sans-serif;
            font-size: 1.45rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--isy-primary);
            margin-bottom: 0;
        }

        .dash-content .ls-widget,
        .dash-content .job-block .inner-box,
        .dash-content .candidate-block-three .inner-box,
        .dash-content .job-overview-two,
        .dash-content .sidebar-widget,
        .dash-content .resume-block,
        .dash-content .candidate-block,
        .dash-content .job-detail,
        .dash-content .company-widget .widget-content,
        .dash-content .ls-outer {
            background: rgba(255, 255, 255, 0.82) !important;
            border: 1px solid rgba(220, 226, 243, 0.9) !important;
            border-radius: 18px !important;
            box-shadow: 0 10px 30px rgba(49, 39, 131, 0.08) !important;
            backdrop-filter: blur(8px);
        }

        .dash-content .widget-content,
        .dash-content .job-detail,
        .dash-content .job-overview-two,
        .dash-content .company-widget .widget-content,
        .dash-content .candidate-block,
        .dash-content .resume-block,
        .dash-content .sidebar-widget {
            padding: 22px !important;
        }

        .dash-content .default-form label,
        .dash-content .form-group label {
            font-size: 11px;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #4b5563;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .dash-content .default-form input[type="text"],
        .dash-content .default-form input[type="email"],
        .dash-content .default-form input[type="number"],
        .dash-content .default-form input[type="date"],
        .dash-content .default-form input[type="password"],
        .dash-content .default-form select,
        .dash-content .default-form textarea,
        .dash-content .form-group input[type="text"],
        .dash-content .form-group input[type="email"],
        .dash-content .form-group input[type="number"],
        .dash-content .form-group input[type="date"],
        .dash-content .form-group input[type="password"],
        .dash-content .form-group select,
        .dash-content .form-group textarea {
            min-height: 46px;
            border-radius: 12px !important;
            border: 1px solid #d9dfef !important;
            background: #f3f6ff !important;
            color: #1f2937 !important;
            box-shadow: none !important;
            padding: 10px 14px !important;
            transition: border-color .2s ease, box-shadow .2s ease;
        }

        .dash-content .default-form textarea,
        .dash-content .form-group textarea {
            min-height: 120px;
        }

        .dash-content .default-form input:focus,
        .dash-content .default-form select:focus,
        .dash-content .default-form textarea:focus,
        .dash-content .form-group input:focus,
        .dash-content .form-group select:focus,
        .dash-content .form-group textarea:focus {
            border-color: #b5beff !important;
            box-shadow: 0 0 0 3px rgba(75, 65, 223, 0.16) !important;
            outline: none;
        }

        .dash-content .theme-btn,
        .dash-content button.theme-btn,
        .dash-content a.theme-btn {
            border-radius: 12px !important;
            font-weight: 700 !important;
            letter-spacing: 0.01em;
            border: 1px solid transparent;
            transition: transform .15s ease, box-shadow .2s ease;
        }

        .dash-content .btn-style-one {
            background: linear-gradient(135deg, #4b41df, #1a086e) !important;
            color: #fff !important;
            box-shadow: 0 10px 20px rgba(49, 39, 131, 0.25);
        }

        .dash-content .btn-style-three,
        .dash-content .btn-style-two {
            background: #fff !important;
            color: var(--isy-primary) !important;
            border-color: #dbe2f3 !important;
        }

        .dash-content .theme-btn:hover,
        .dash-content button.theme-btn:hover,
        .dash-content a.theme-btn:hover {
            transform: translateY(-1px);
        }

        .dash-content .job-info li,
        .dash-content .candidate-info li,
        .dash-content .company-info li,
        .dash-content .post-tags li {
            color: #4b5563 !important;
            font-size: 13px;
        }

        .dash-content .job-other-info li,
        .dash-content .post-tags li {
            border-radius: 999px !important;
            border: 1px solid #dce2f3 !important;
            background: #f3f6ff !important;
            color: #2f2f74 !important;
            font-weight: 600;
        }

        .dash-content .ls-switcher {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #e1e7f5;
            border-radius: 14px;
            padding: 10px 14px;
            margin-bottom: 14px;
        }

        .dash-content .table-outer,
        .dash-content table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 14px;
            overflow: hidden;
        }

        .dash-content table thead th {
            background: #eef2ff !important;
            color: #4b5563;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            font-weight: 700;
            border-bottom: 1px solid #dfe5f3 !important;
            padding: 12px 14px !important;
        }

        .dash-content table tbody td {
            background: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid #edf1fb !important;
            color: #1f2937;
            font-size: 13px;
            padding: 12px 14px !important;
        }

        .dash-content table tbody tr:hover td {
            background: #f7f8ff;
        }

        .dash-content .alert {
            border-radius: 12px;
            border: 1px solid #dce2f3;
            box-shadow: 0 8px 20px rgba(49, 39, 131, 0.08);
        }

        .dash-content .chosen-container-single .chosen-single,
        .dash-content .chosen-container-multi .chosen-choices {
            min-height: 46px;
            border-radius: 12px !important;
            border: 1px solid #d9dfef !important;
            background: #f3f6ff !important;
            box-shadow: none !important;
            padding-top: 7px;
        }

        .dash-content .chosen-container-active .chosen-single,
        .dash-content .chosen-container-active .chosen-choices {
            border-color: #b5beff !important;
            box-shadow: 0 0 0 3px rgba(75, 65, 223, 0.16) !important;
        }

        .dash-content [style*="#f9b232"] {
            color: #4b41df !important;
            border-color: #4b41df !important;
            background-color: rgba(75, 65, 223, 0.12) !important;
        }

        .dash-content [style*="#312683"],
        .dash-content [style*="#312783"] {
            color: #1a086e !important;
            border-color: #dce2f3 !important;
        }

        .dash-content [style*="background: #ffffff"],
        .dash-content [style*="background:#ffffff"],
        .dash-content [style*="background: #f8f9fa"],
        .dash-content [style*="background:#f8f9fa"] {
            background: rgba(255, 255, 255, 0.82) !important;
            border-color: #dce2f3 !important;
            border-radius: 14px !important;
        }

        @media (max-width: 767.98px) {
            .dash-content {
                padding: 10px;
            }

            .dash-content .widget-content,
            .dash-content .job-detail,
            .dash-content .job-overview-two,
            .dash-content .company-widget .widget-content,
            .dash-content .candidate-block,
            .dash-content .resume-block,
            .dash-content .sidebar-widget {
                padding: 14px !important;
            }
        }

        @media (max-width: 991.98px) {
            .dash-sidebar {
                width: 100%;
                max-width: 320px;
                transform: translateX(-100%);
                transition: transform .25s ease;
            }

            .dash-shell.mobile-open .dash-sidebar {
                transform: translateX(0);
            }

            .dash-main {
                margin-left: 0;
                width: 100%;
            }

            .dash-topbar {
                padding: 0 12px;
            }

            .menu-toggle {
                display: inline-flex !important;
            }
        }

        .menu-toggle {
            display: none;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 10px;
            width: 38px;
            height: 38px;
            align-items: center;
            justify-content: center;
            color: #374151;
        }

        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.35);
            z-index: 40;
        }

        .dash-shell.mobile-open .overlay {
            display: block;
        }
    </style>
</head>
<body>
<?php
    $currentUser = \App\Models\User::find(session('user_id'));
    $currentInitials = $currentUser ? strtoupper(substr(($currentUser->first_name ?? 'U'), 0, 1) . substr(($currentUser->last_name ?? ''), 0, 1)) : 'U';
?>

<div class="dash-shell" id="dashShell">
    <aside class="dash-sidebar">
        <div class="brand">
            <img src="<?php echo e(asset('images/logo-white.svg')); ?>" alt="IsYours" class="brand-logo">
        </div>

        <nav class="dash-nav">
            <a class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">
                <span class="material-symbols-outlined">dashboard</span>
                <span>Dashboard</span>
            </a>
            <a class="<?php echo e(request()->routeIs('web.offer.index') || request()->routeIs('web.offer.show') ? 'active' : ''); ?>" href="<?php echo e(route('web.offer.index')); ?>">
                <span class="material-symbols-outlined">work</span>
                <span>Jobs</span>
            </a>

            <?php if(!session('admin') && !session('employer')): ?>
            <a class="<?php echo e(request()->routeIs('web.candidate.my_applications') ? 'active' : ''); ?>" href="<?php echo e(route('web.candidate.my_applications')); ?>">
                <span class="material-symbols-outlined">description</span>
                <span>My Applications</span>
            </a>
            <?php endif; ?>

            <?php if(session('admin') || session('employer')): ?>
            <a class="<?php echo e(request()->routeIs('web.offer.create') ? 'active' : ''); ?>" href="<?php echo e(route('web.offer.create')); ?>">
                <span class="material-symbols-outlined">send</span>
                <span>Post a Job</span>
            </a>
            <?php endif; ?>

            <?php if(session('admin') || session('employer')): ?>
            <a class="<?php echo e(request()->routeIs('web.candidate.index') || request()->routeIs('web.candidate.show') ? 'active' : ''); ?>" href="<?php echo e(route('web.candidate.index')); ?>">
                <span class="material-symbols-outlined">group</span>
                <span>Candidates</span>
            </a>
            <?php endif; ?>

            <?php if(session('employer')): ?>
            <a class="<?php echo e(request()->routeIs('web.company.create') ? 'active' : ''); ?>" href="<?php echo e(route('web.company.create')); ?>">
                <span class="material-symbols-outlined">business</span>
                <span>Company Profile</span>
            </a>
            <?php endif; ?>

            <a class="<?php echo e(request()->routeIs('web.profile.edit') ? 'active' : ''); ?>" href="<?php echo e(route('web.profile.edit')); ?>">
                <span class="material-symbols-outlined">person</span>
                <span>My Profile</span>
            </a>

            <?php if(!session('admin') && !session('employer')): ?>
            <a class="<?php echo e(request()->routeIs('web.profile.skills') ? 'active' : ''); ?>" href="<?php echo e(route('web.profile.skills')); ?>">
                <span class="material-symbols-outlined">psychology</span>
                <span>My Skills</span>
            </a>
            <?php endif; ?>

        </nav>

        <div class="dash-sidebar-bottom">
            <nav class="dash-nav">
                <a href="<?php echo e(route('log_out')); ?>">
                    <span class="material-symbols-outlined">logout</span>
                    <span>Logout</span>
                </a>
            </nav>
        </div>
    </aside>

    <div class="overlay" id="dashOverlay"></div>

    <main class="dash-main">
        <header class="dash-topbar">
            <div style="display:flex; align-items:center; gap:10px;">
                <button class="menu-toggle" id="menuToggle" type="button">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <h1 class="dash-title"><?php echo $__env->yieldContent('dashboard_title', 'Panel de Control'); ?></h1>
            </div>

            <div class="dash-user">

                
                <div class="tb-icon-btn" title="Notifications">
                    <span class="material-symbols-outlined">notifications</span>
                    
                    
                </div>

                
                <div class="tb-dropdown" id="tbSettingsWrap">
                    <button type="button" class="tb-icon-btn" id="tbSettingsBtn" title="Settings" aria-haspopup="true" aria-expanded="false">
                        <span class="material-symbols-outlined">settings</span>
                    </button>
                    <div class="tb-dropdown-menu" id="tbSettingsMenu">
                        <div class="tb-dd-header">Account</div>
                        <a href="<?php echo e(route('web.profile.change_password')); ?>" class="tb-dd-item">
                            <span class="material-symbols-outlined">lock_reset</span>
                            Change Password
                        </a>
                        <div class="tb-dd-divider"></div>
                        <a href="<?php echo e(route('web.profile.edit')); ?>" class="tb-dd-item">
                            <span class="material-symbols-outlined">manage_accounts</span>
                            Edit Profile
                        </a>
                    </div>
                </div>

                
                <div class="dash-language">
                    <select onchange="window.location.href=this.value" aria-label="Language switcher">
                        <option value="<?php echo e(route('language.switch', 'en')); ?>" <?php echo e(app()->getLocale() == 'en' ? 'selected' : ''); ?>>EN</option>
                        <option value="<?php echo e(route('language.switch', 'es')); ?>" <?php echo e(app()->getLocale() == 'es' ? 'selected' : ''); ?>>ES</option>
                    </select>
                </div>

                
                <div style="text-align:right; line-height:1.1;">
                    <div style="font-size:13px; font-weight:700;"><?php echo e($currentUser->first_name ?? 'Usuario'); ?> <?php echo e($currentUser->last_name ?? ''); ?></div>
                    <div style="font-size:11px; color:#6b7280;"><?php echo e(session('role_name') ?? 'user'); ?></div>
                </div>
                <div class="dash-user-avatar"><?php echo e($currentInitials); ?></div>

            </div>
        </header>

        <section class="dash-content">
            <?php echo $__env->yieldContent('content'); ?>
        </section>
    </main>
</div>

<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/chosen.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.fancybox.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.modal.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/mmenu.polyfills.js')); ?>"></script>
<script src="<?php echo e(asset('js/mmenu.js')); ?>"></script>
<script src="<?php echo e(asset('js/appear.js')); ?>"></script>
<script src="<?php echo e(asset('js/ScrollMagic.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/rellax.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/owl.js')); ?>"></script>
<script src="<?php echo e(asset('js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('js/script.js')); ?>"></script>
<script src="<?php echo e(asset('js/api/login.js')); ?>"></script>

<script>
    (function () {
        var shell = document.getElementById('dashShell');
        var toggle = document.getElementById('menuToggle');
        var overlay = document.getElementById('dashOverlay');

        function closeMenu() {
            shell.classList.remove('mobile-open');
        }

        if (toggle) {
            toggle.addEventListener('click', function () {
                shell.classList.toggle('mobile-open');
            });
        }

        if (overlay) {
            overlay.addEventListener('click', closeMenu);
        }
    })();
</script>

<script>
    (function () {
        var btn  = document.getElementById('tbSettingsBtn');
        var menu = document.getElementById('tbSettingsMenu');
        if (!btn || !menu) return;

        btn.addEventListener('click', function (e) {
            e.stopPropagation();
            var open = menu.classList.toggle('open');
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });

        document.addEventListener('click', function (e) {
            if (!document.getElementById('tbSettingsWrap').contains(e.target)) {
                menu.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                menu.classList.remove('open');
                btn.setAttribute('aria-expanded', 'false');
            }
        });
    })();
</script>

<?php echo $__env->yieldContent('js'); ?>
</body>
</html>
<?php /**PATH C:\laragon\www\isyours\resources\views/layouts/app2.blade.php ENDPATH**/ ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sign In &mdash; Is Yours</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: "Manrope", sans-serif;
            background: radial-gradient(circle at top right, #e4dfff 0%, #f8f9fa 55%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 32px 16px;
            color: #191c1d;
        }

        .ln-wrap {
            width: 100%;
            max-width: 440px;
        }

        /* Brand */
        .ln-brand {
            text-align: center;
            margin-bottom: 32px;
        }

        .ln-logo {
            height: 44px;
            width: auto;
            margin-bottom: 16px;
        }

        .ln-brand-title {
            font-size: 28px;
            font-weight: 800;
            color: #1a086e;
            line-height: 1.2;
            margin-bottom: 6px;
        }

        .ln-brand-sub {
            font-size: 14px;
            color: #6b7280;
            font-weight: 500;
        }

        /* Card */
        .ln-card {
            background: #ffffff;
            border: 1px solid rgba(200,196,211,0.4);
            border-radius: 24px;
            padding: 36px 40px;
            box-shadow: 0 4px 24px rgba(49,39,131,0.08);
        }

        /* Fields */
        .ln-field {
            margin-bottom: 20px;
        }

        .ln-field-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .ln-label {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: #474551;
        }

        .ln-forgot {
            font-size: 12px;
            font-weight: 600;
            color: #4b41df;
            text-decoration: none;
            transition: color .15s;
        }

        .ln-forgot:hover { color: #1a086e; }

        .ln-input-wrap {
            position: relative;
        }

        .ln-input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 20px;
            pointer-events: none;
            user-select: none;
        }

        .ln-input {
            display: block;
            width: 100%;
            background: #f0f3ff;
            border: 1.5px solid transparent;
            border-radius: 12px;
            padding: 12px 44px 12px 44px;
            font-size: 14px;
            font-weight: 500;
            color: #151c27;
            font-family: "Manrope", sans-serif;
            outline: none;
            transition: border-color .18s, box-shadow .18s, background .18s;
            -webkit-appearance: none;
        }

        .ln-input::placeholder { color: #b0b7c9; }

        .ln-input:focus {
            background: #eaedff;
            border-color: #4b41df;
            box-shadow: 0 0 0 3px rgba(75,65,223,0.16);
        }

        .ln-input.is-invalid {
            background: #fff0f0;
            border-color: #ef4444;
            box-shadow: 0 0 0 3px rgba(239,68,68,0.14);
        }

        .ln-eye-btn {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            color: #9ca3af;
            display: flex;
            align-items: center;
            transition: color .15s;
        }

        .ln-eye-btn:hover { color: #4b41df; }
        .ln-eye-btn .material-symbols-outlined { font-size: 20px; }

        .ln-field-error {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 12px;
            color: #dc2626;
            font-weight: 600;
            margin-top: 6px;
        }

        .ln-field-error .material-symbols-outlined { font-size: 15px; }

        /* Remember */
        .ln-remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            cursor: pointer;
            user-select: none;
        }

        .ln-remember input[type="checkbox"] {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            accent-color: #4b41df;
            cursor: pointer;
        }

        .ln-remember span {
            font-size: 13px;
            font-weight: 600;
            color: #4b5563;
        }

        /* Submit */
        .ln-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #4b41df, #1a086e);
            color: #fff;
            font-family: "Manrope", sans-serif;
            font-size: 15px;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(49,39,131,0.24);
            transition: transform .15s, box-shadow .2s, opacity .15s;
            letter-spacing: 0.01em;
        }

        .ln-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 28px rgba(49,39,131,0.3);
        }

        .ln-submit:active { transform: scale(0.98); }

        /* Divider */
        .ln-divider {
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 28px 0;
            color: #9ca3af;
            font-size: 12px;
            font-weight: 600;
        }

        .ln-divider::before,
        .ln-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e5e7eb;
        }

        /* Register link */
        .ln-register {
            text-align: center;
            margin-top: 24px;
            font-size: 13px;
            color: #6b7280;
            font-weight: 500;
        }

        .ln-register a {
            color: #4b41df;
            font-weight: 700;
            text-decoration: none;
        }

        .ln-register a:hover { text-decoration: underline; }

        /* Error banner */
        .ln-error-banner {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: #fff5f5;
            border: 1px solid #fecaca;
            color: #991b1b;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .ln-error-banner .material-symbols-outlined { font-size: 18px; flex-shrink: 0; margin-top: 1px; }

        @media (max-width: 480px) {
            .ln-card { padding: 28px 20px; border-radius: 20px; }
            .ln-brand-title { font-size: 24px; }
        }
    </style>
</head>
<body>

<div class="ln-wrap">

    {{-- Brand --}}
    <div class="ln-brand">
        <img src="{{ asset('images/logo-dark-blue.svg') }}" alt="Is Yours" class="ln-logo">
        <h1 class="ln-brand-title">Welcome back</h1>
        <p class="ln-brand-sub">Sign in to your account to continue</p>
    </div>

    {{-- Card --}}
    <div class="ln-card">

        @if($errors->any())
            <div class="ln-error-banner">
                <span class="material-symbols-outlined">error</span>
                <div>
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf

            {{-- Email --}}
            <div class="ln-field">
                <div class="ln-field-top">
                    <label class="ln-label" for="email">Email Address</label>
                </div>
                <div class="ln-input-wrap">
                    <span class="material-symbols-outlined ln-input-icon">mail</span>
                    <input class="ln-input @error('email') is-invalid @enderror"
                        type="email" id="email" name="email"
                        value="{{ old('email') }}"
                        placeholder="name@company.com"
                        autocomplete="email" autofocus>
                </div>
                @error('email')
                    <p class="ln-field-error">
                        <span class="material-symbols-outlined">error</span>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="ln-field">
                <div class="ln-field-top">
                    <label class="ln-label" for="password">Password</label>
                    @if (Route::has('password.request'))
                        <a class="ln-forgot" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>
                <div class="ln-input-wrap">
                    <span class="material-symbols-outlined ln-input-icon">lock</span>
                    <input class="ln-input @error('password') is-invalid @enderror"
                        type="password" id="password" name="password"
                        placeholder="••••••••"
                        autocomplete="current-password">
                    <button type="button" class="ln-eye-btn" data-target="password" tabindex="-1">
                        <span class="material-symbols-outlined">visibility</span>
                    </button>
                </div>
                @error('password')
                    <p class="ln-field-error">
                        <span class="material-symbols-outlined">error</span>{{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Remember me --}}
            <label class="ln-remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>Remember me</span>
            </label>

            {{-- Submit --}}
            <button type="submit" class="ln-submit">
                <span class="material-symbols-outlined" style="font-size:18px;">login</span>
                Sign In
            </button>
        </form>

        @if (Route::has('register'))
            <div class="ln-divider">or</div>
            <p class="ln-register">
                Don&rsquo;t have an account? <a href="{{ route('register') }}">Create one</a>
            </p>
        @endif

    </div>
</div>

<script>
    document.querySelectorAll('.ln-eye-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var input = document.getElementById(btn.dataset.target);
            var icon  = btn.querySelector('.material-symbols-outlined');
            if (input.type === 'password') {
                input.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                input.type = 'password';
                icon.textContent = 'visibility';
            }
        });
    });
</script>

</body>
</html>
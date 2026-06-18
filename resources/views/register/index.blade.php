<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __("home.register_create_account") }} &mdash; Is Yours</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    <style>
        *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
        .material-symbols-outlined{font-variation-settings:"FILL" 0,"wght" 400,"GRAD" 0,"opsz" 24}
        body{font-family:"Plus Jakarta Sans",sans-serif;background:radial-gradient(circle at top right,#e4dfff 0%,#f8f9fa 50%);color:#191c1d;min-height:100vh;display:flex;flex-direction:column}
        main{flex-grow:1;display:flex;align-items:flex-start;justify-content:center;padding:48px 24px 64px}
        .rg-center{width:100%;max-width:680px}
        .rg-brand{text-align:center;margin-bottom:32px}
        .rg-brand-logo{height:52px;width:auto;margin-bottom:14px}
        .rg-brand p{font-size:15px;line-height:1.6;color:#474551}
        .rg-card{background:#fff;border:1px solid rgba(200,196,211,.3);border-radius:12px;padding:28px 24px;box-shadow:0 4px 20px rgba(49,39,131,.05)}
        @media(min-width:640px){.rg-card{padding:40px}}
        .rg-card-title{font-size:22px;font-weight:700;color:#312783;margin-bottom:4px}
        .rg-card-sub{font-size:14px;color:#474551;margin-bottom:24px}
        .rg-alert{border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:14px;font-weight:500;display:flex;align-items:flex-start;gap:8px}
        .rg-alert.success{background:#edfdf5;border:1px solid #c9f3dc;color:#166534}
        .rg-alert.error{background:#fff5f5;border:1px solid #fecaca;color:#991b1b}
        .rg-alert .material-symbols-outlined{font-size:18px;flex-shrink:0;margin-top:1px}
        .rg-alert ul{margin:2px 0 0;padding-left:16px}
        /* Role toggle */
        .role-toggle{display:grid;grid-template-columns:1fr 1fr;gap:8px;margin-bottom:20px}
        .role-btn{
            display:flex;flex-direction:row;align-items:center;justify-content:center;gap:8px;
            padding:10px 14px;border-radius:8px;cursor:pointer;
            border:2px solid #ece9f6;background:#fcfbff;
            transition:all .22s cubic-bezier(.4,0,.2,1);user-select:none;
        }
        .role-btn:hover{border-color:#a78bfa;background:#f0eeff;transform:translateY(-1px);box-shadow:0 4px 12px rgba(49,39,131,.1)}
        .role-btn.active{border-color:#312783;background:#312783;color:#fff;box-shadow:0 4px 14px rgba(49,39,131,.28);transform:translateY(-1px)}
        .role-btn .role-icon{font-size:20px;transition:transform .2s;flex-shrink:0}
        .role-btn.active .role-icon{transform:scale(1.08)}
        .role-btn .role-label{font-size:13px;font-weight:700;letter-spacing:.01em}
        .role-btn .role-desc{display:none}
        .rg-section{border:1px solid #ece9f6;background:#fcfbff;border-radius:10px;padding:20px;margin-bottom:16px}
        .rg-section-title{font-size:11px;letter-spacing:.08em;text-transform:uppercase;color:#5a52ae;font-weight:700;margin-bottom:16px}
        .rg-grid{display:grid;gap:12px}
        .rg-grid-2{grid-template-columns:1fr 1fr}
        .rg-grid-3{grid-template-columns:1fr 1fr 1fr}
        @media(max-width:540px){.rg-grid-2,.rg-grid-3{grid-template-columns:1fr}}
        .rg-label{display:block;font-size:13px;font-weight:600;color:#191c1d;margin-bottom:6px;letter-spacing:.01em}
        .rg-input,.rg-select{width:100%;border:1px solid #c8c4d3;background:#fff;border-radius:8px;padding:9px 12px;font-size:14px;font-family:"Plus Jakarta Sans",sans-serif;color:#191c1d;outline:none;transition:border-color .2s,box-shadow .2s;-webkit-appearance:none}
        .rg-input::placeholder{color:#b0b7c9}
        .rg-input:focus,.rg-select:focus{border-color:#005ac1;box-shadow:0 0 0 2px rgba(0,90,193,.18)}
        .rg-pwd-wrap{position:relative}
        .rg-pwd-eye{position:absolute;right:10px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:#787583;display:flex;align-items:center;padding:0;transition:color .15s}
        .rg-pwd-eye:hover{color:#312783}
        .rg-pwd-eye .material-symbols-outlined{font-size:18px}
        .rg-checkbox-row{display:flex;align-items:flex-start;gap:10px;font-size:13px;color:#474551;line-height:1.5}
        .rg-checkbox-row input[type="checkbox"]{margin-top:2px;accent-color:#312783;flex-shrink:0}
        .rg-checkbox-row a{color:#005ac1;font-weight:600;text-decoration:none}
        .rg-checkbox-row a:hover{text-decoration:underline}
        .rg-submit{width:100%;padding:10px 16px;background:#312783;color:#fff;font-family:"Plus Jakarta Sans",sans-serif;font-size:14px;font-weight:600;letter-spacing:.02em;border:none;border-radius:8px;cursor:pointer;box-shadow:0 4px 6px rgba(0,0,0,.1);margin-top:8px;transition:opacity .2s,transform .1s}
        .rg-submit:hover{opacity:.9}
        .rg-submit:active{transform:scale(.98)}
        .rg-footer{text-align:center;margin-top:20px;font-size:14px;color:#474551}
        .rg-footer a{color:#005ac1;font-weight:600;text-decoration:none}
        .rg-footer a:hover{text-decoration:underline}
    </style>
</head>
<body>
<main>
    <div class="rg-center">

        <div class="rg-brand">
            <img src="{{ asset('images/logo-main.svg') }}" alt="Is Yours" class="rg-brand-logo">
            <p>{{ __("home.register_subtitle") }}</p>
        </div>

        <div class="rg-card">
            <h1 class="rg-card-title">{{ __("home.register_create_account") }}</h1>
            <p class="rg-card-sub">{{ __("home.register_subtitle") }}</p>

            @if(session("message"))
                <div class="rg-alert success">
                    <span class="material-symbols-outlined">check_circle</span>
                    {{ session("message") }}
                </div>
            @endif

            @if($errors->any())
                <div class="rg-alert error">
                    <span class="material-symbols-outlined">error</span>
                    <div><ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul></div>
                </div>
            @endif

            <form method="POST" action="{{ route('register_post') }}" novalidate>
                @csrf

                {{-- Role toggle --}}
                <input type="hidden" id="user_type" name="user_type" value="{{ old('user_type', 'candidate') }}">
                <div class="role-toggle">
                    <div class="role-btn {{ old('user_type','candidate') === 'candidate' ? 'active' : '' }}" data-role="candidate" tabindex="0" role="button" aria-pressed="{{ old('user_type','candidate') === 'candidate' ? 'true' : 'false' }}">
                        <span class="material-symbols-outlined role-icon">person_search</span>
                        <span class="role-label">{{ __("home.candidate") }}</span>
                        <span class="role-desc">{{ __("home.im_looking_for_work") ?? "Looking for a job" }}</span>
                    </div>
                    <div class="role-btn {{ old('user_type','candidate') === 'employer' ? 'active' : '' }}" data-role="employer" tabindex="0" role="button" aria-pressed="{{ old('user_type','candidate') === 'employer' ? 'true' : 'false' }}">
                        <span class="material-symbols-outlined role-icon">business_center</span>
                        <span class="role-label">{{ __("home.employer") }}</span>
                        <span class="role-desc">{{ __("home.im_hiring") ?? "Hiring talent" }}</span>
                    </div>
                </div>

                <div class="rg-section">
                    <p class="rg-section-title">{{ __("home.personal_information") }}</p>
                    <div class="rg-grid rg-grid-2">
                        <div>
                            <label class="rg-label" for="first_name">{{ __("home.first_name") }}</label>
                            <input id="first_name" name="first_name" class="rg-input" value="{{ old("first_name") }}" required>
                        </div>
                        <div>
                            <label class="rg-label" for="last_name">{{ __("home.last_name") }}</label>
                            <input id="last_name" name="last_name" class="rg-input" value="{{ old("last_name") }}" required>
                        </div>
                    </div>
                </div>

                <div class="rg-section">
                    <p class="rg-section-title">{{ __("home.country") }} &amp; {{ __("home.phone_number") }}</p>
                    <div class="rg-grid rg-grid-3">
                        <div>
                            <label class="rg-label" for="country">{{ __("home.country") }}</label>
                            <select id="country" name="country_id" class="rg-select" required>
                                <option value="">{{ __("home.select_country") }}</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ old("country_id") == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="rg-label" for="state">{{ __("home.state") }}</label>
                            <select id="state" name="state_id" class="rg-select" required>
                                <option value="">{{ __("home.select_state") }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="rg-label" for="city">{{ __("home.city") }}</label>
                            <select id="city" name="city_id" class="rg-select" required>
                                <option value="">{{ __("home.select_city") }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="rg-label" for="zip_code">{{ __("home.zip_code") }}</label>
                            <input id="zip_code" name="zip_code" class="rg-input" pattern="\d{5}" maxlength="5" value="{{ old("zip_code") }}" required>
                        </div>
                        <div>
                            <label class="rg-label" for="phone_number">{{ __("home.phone_number") }}</label>
                            <input id="phone_number" name="phone_number" class="rg-input" value="{{ old("phone_number") }}" required>
                        </div>
                        <div>
                            <label class="rg-label" for="email">{{ __("home.email_address") }}</label>
                            <input id="email" type="email" name="email" class="rg-input" value="{{ old("email") }}" required>
                        </div>
                    </div>
                </div>

                <div class="rg-section">
                    <p class="rg-section-title">{{ __("home.password") }}</p>
                    <div class="rg-grid rg-grid-2">
                        <div>
                            <label class="rg-label" for="password-field">{{ __("home.password") }}</label>
                            <div class="rg-pwd-wrap">
                                <input id="password-field" type="password" name="password" class="rg-input" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                                <button type="button" id="togglePassword" class="rg-pwd-eye" tabindex="-1">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="rg-label" for="confirmPassword">{{ __("home.confirm_password") ?? "Confirm Password" }}</label>
                            <input type="password" id="confirmPassword" name="password_confirmation" class="rg-input" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" required>
                        </div>
                    </div>

                    <div style="margin-top:16px;display:flex;flex-direction:column;gap:12px;">
                        <div class="rg-checkbox-row">
                            <input name="have_vehicle" type="hidden" value="0">
                            <input type="checkbox" id="have_vehicle" name="have_vehicle" value="1" {{ old("have_vehicle") ? "checked" : "" }}>
                            <label for="have_vehicle">{{ __("home.have_vehicle") ?? "Do you have a vehicle?" }}</label>
                        </div>

                        <div>
                            <label class="rg-label" for="security_id">{{ __("home.has_security_id") }}</label>
                            <select id="security_id" name="security_id" class="rg-select">
                                <option value="no" {{ old("security_id") == "no" ? "selected" : "" }}>{{ __("home.security_id_no") }}</option>
                                <option value="yes" {{ old("security_id") == "yes" ? "selected" : "" }}>{{ __("home.security_id_yes") }}</option>
                                <option value="in_process" {{ old("security_id") == "in_process" ? "selected" : "" }}>{{ __("home.security_id_in_process") }}</option>
                            </select>
                        </div>

                        <div id="security_digits_field" style="display:{{ old('security_id') == 'yes' ? 'block' : 'none' }};">
                            <label class="rg-label" for="security_id_last_digits">{{ __("home.security_id_last_4_digits") }}</label>
                            <input type="text" id="security_id_last_digits" name="security_id_last_digits" class="rg-input" maxlength="4" pattern="\d{4}" value="{{ old("security_id_last_digits") }}">
                        </div>

                        <div class="rg-checkbox-row">
                            <input type="checkbox" id="agree_terms" name="is_agree_terms_privacy" value="1" required {{ old("is_agree_terms_privacy") ? "checked" : "" }}>
                            <label for="agree_terms">
                                {{ __("home.i_agree_to") }}
                                <a href="{{ route('terms') }}" target="_blank">{{ __("home.terms_conditions") }}</a>
                                {{ __("home.and") }}
                                <a href="{{ route('privacy') }}" target="_blank">{{ __("home.privacy_policy") }}</a>
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="rg-submit">{{ __("home.create_account") }}</button>
            </form>

            <p class="rg-footer">
                {{ __("home.already_have_account") }}
                <a href="{{ route('web_login') }}">{{ __("home.sign_in") }}</a>
            </p>
        </div>

    </div>
</main>

{{-- Floating language switcher --}}
<div class="lang-fab" id="langFab">
    <button class="lang-fab-btn" id="langFabBtn" aria-label="Change language">
        <span class="material-symbols-outlined">language</span>
        <span class="lang-fab-current">{{ strtoupper(app()->getLocale()) }}</span>
    </button>
    <div class="lang-fab-menu" id="langFabMenu">
        <a href="{{ route('language.switch', 'en') }}" class="lang-option {{ app()->getLocale() === 'en' ? 'active' : '' }}">
            <span class="lang-flag">🇺🇸</span> EN
        </a>
        <a href="{{ route('language.switch', 'es') }}" class="lang-option {{ app()->getLocale() === 'es' ? 'active' : '' }}">
            <span class="lang-flag">🇪🇸</span> ES
        </a>
    </div>
</div>

<style>
    .lang-fab{position:fixed;bottom:24px;left:24px;z-index:9999;display:flex;flex-direction:column;align-items:flex-start;gap:6px}
    .lang-fab-btn{
        display:flex;align-items:center;gap:6px;
        background:#312783;color:#fff;border:none;border-radius:50px;
        padding:10px 16px;font-family:"Plus Jakarta Sans",sans-serif;font-size:13px;font-weight:700;
        cursor:pointer;box-shadow:0 4px 16px rgba(49,39,131,.35);
        transition:background .2s,transform .15s,box-shadow .2s;
    }
    .lang-fab-btn:hover{background:#1e1660;box-shadow:0 6px 20px rgba(49,39,131,.45);transform:translateY(-1px)}
    .lang-fab-btn .material-symbols-outlined{font-size:18px}
    .lang-fab-current{letter-spacing:.05em}
    .lang-fab-menu{
        display:none;flex-direction:column;gap:4px;
        background:#fff;border:1px solid #ece9f6;border-radius:10px;
        padding:6px;box-shadow:0 8px 24px rgba(49,39,131,.15);min-width:90px;
    }
    .lang-fab-menu.open{display:flex}
    .lang-option{
        display:flex;align-items:center;gap:8px;
        padding:8px 12px;border-radius:7px;font-size:13px;font-weight:600;
        color:#312783;text-decoration:none;transition:background .15s;
    }
    .lang-option:hover{background:#f0eeff}
    .lang-option.active{background:#312783;color:#fff}
    .lang-flag{font-size:16px;line-height:1}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function () {
    // Language FAB toggle
    $("#langFabBtn").on("click", function (e) {
        e.stopPropagation();
        $("#langFabMenu").toggleClass("open");
    });
    $(document).on("click", function () {
        $("#langFabMenu").removeClass("open");
    });

    // Role toggle
    $(".role-btn").on("click keydown", function (e) {
        if (e.type === "keydown" && e.key !== "Enter" && e.key !== " ") return;
        e.preventDefault();
        $(".role-btn").removeClass("active").attr("aria-pressed","false");
        $(this).addClass("active").attr("aria-pressed","true");
        $("#user_type").val($(this).data("role"));
    });

    $("#country").on("change", function () {
        var countryId = $(this).val();
        $.ajax({
            url: "{{ route('api.states_by_country', '') }}" + "/" + countryId,
            method: "GET",
            success: function (res) {
                fillSelect("state", "id", "name", res.states, "{{ __('home.state') }}");
                $("#city").empty().append($("<option>").val("").text("{{ __('home.select_city') }}"));
            }
        });
    });
    $("#state").on("change", function () {
        var stateId = $(this).val();
        $.ajax({
            url: "{{ route('api.cities_by_state', '') }}" + "/" + stateId,
            method: "GET",
            success: function (res) {
                fillSelect("city", "id", "name", res.cities, "{{ __('home.city') }}");
            }
        });
    });
    function fillSelect(id, valKey, labelKey, data, placeholder) {
        var sel = $("#" + id).empty().append($("<option>").val("").text("-- " + placeholder + " --"));
        $.each(data, function (i, item) { sel.append($("<option>").val(item[valKey]).text(item[labelKey])); });
    }
    $("#togglePassword").on("click", function () {
        var field = $("#password-field");
        var icon = $(this).find(".material-symbols-outlined");
        if (field.attr("type") === "password") { field.attr("type", "text"); icon.text("visibility_off"); }
        else { field.attr("type", "password"); icon.text("visibility"); }
    });
    $("#security_id").on("change", function () {
        if ($(this).val() === "yes") { $("#security_digits_field").show(); }
        else { $("#security_digits_field").hide(); $("#security_id_last_digits").val(""); }
    });
});
</script>
</body>
</html>

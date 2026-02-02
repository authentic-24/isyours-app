@extends('layouts.app_home')

@section('content')
<style>
/* Ocultar header */
.main-header,
#language-bar {
    display: none !important;
}

body {
    padding-top: 0 !important;
}

/* Estilos minimalistas para register */
.register-section {
    min-height: 100vh;
    background: #f3f4f6 !important;
    display: flex;
    align-items: center;
    padding: 40px 0;
}

.register-logo {
    position: absolute;
    top: 20px;
    left: 20px;
}

.register-logo a {
    display: inline-block;
}

.register-logo img {
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

.register-overlay {
    display: none !important;
}

.register-card {
    background: #ffffff !important;
    backdrop-filter: none !important;
    border-radius: 12px !important;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06) !important;
    border: 1px solid #e5e7eb !important;
    padding: 40px !important;
    max-width: 600px !important;
}

.register-badge {
    display: none !important;
}

.register-header {
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

.register-body {
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

.btn-wizard-next,
.btn-wizard-prev,
.btn-enhanced,
.register-btn {
    background: #1a1a1a !important;
    border: none !important;
    box-shadow: none !important;
    border-radius: 4px !important;
    padding: 14px 24px !important;
    font-size: 15px !important;
    font-weight: 500 !important;
}

.btn-wizard-next:hover,
.btn-wizard-prev:hover,
.btn-enhanced:hover,
.register-btn:hover {
    background: #333333 !important;
}

.wizard-progress-bar {
    display: none !important;
}

.wizard-step-indicator {
    display: none !important;
}

.login-link,
.signin-link {
    color: #1a1a1a !important;
    font-weight: 600 !important;
    text-decoration: underline !important;
}

.login-link:hover,
.signin-link:hover {
    color: #333333 !important;
}

.social-divider {
    display: none !important;
}

.social-login {
    display: none !important;
}

.register-footer {
    padding: 30px 0 0 0 !important;
    border-top: 1px solid #e5e5e5;
    margin-top: 30px;
}

.signin-text {
    color: #666666 !important;
    font-size: 14px !important;
}

.divider-text {
    color: #666666 !important;
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

.wizard-nav {
    margin-top: 24px !important;
}

.form-options {
    margin: 20px 0 !important;
}

.form-check-label {
    color: #1a1a1a !important;
    font-size: 14px !important;
}

.row {
    margin-bottom: 15px;
}

.form-group-enhanced {
    margin-bottom: 20px;
}
</style>

<!-- Register Section -->
<section class="register-section">
    <!-- Logo -->
    <div class="register-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo-main.svg') }}" alt="Is Yours Logo">
        </a>
    </div>
    
    <div class="language-selector">
        <select onchange="window.location.href=this.value">
            <option value="{{ route('language.switch', 'en') }}" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>EN</option>
            <option value="{{ route('language.switch', 'es') }}" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>ES</option>
        </select>
    </div>
    
    <div class="register-overlay"></div>
    <div class="auto-container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11">
                <div class="register-card">

                    <!-- Header -->
                    <div class="register-header text-center">
                        <div class="register-badge">
                            <span class="icon flaticon-user-plus"></span>
                            {{ __('home.register_join') }}
                        </div>
                        <h2 class="main-heading">{{ __('home.register_create_account') }}</h2>
                        <p class="subtitle">{{ __('home.register_subtitle') }}</p>
                    </div>

                    <!-- Form Body -->
                    <div class="register-body">
                        @if(session('message'))
                            <div class="alert-message success">
                                <span class="icon flaticon-check"></span>
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        @if ($errors->any())
                            <div class="alert-message error">
                                <span class="icon flaticon-warning"></span>
                                <ul class="error-list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('register_post') }}" class="enhanced-form">
                            @csrf
                            
                            <!-- User Type & Identification -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="user_type" class="form-label"><span class="icon flaticon-user"></span> {{ __('home.user_type') }}</label>
                                    <div class="input-wrapper">
                                        <select id="user_type" name="user_type" class="form-control-enhanced" required>
                                            <option value="candidate" {{ old('user_type') == 'candidate' ? 'selected' : '' }}>{{ __('home.candidate') }}</option>
                                            <option value="employer" {{ old('user_type') == 'employer' ? 'selected' : '' }}>{{ __('home.employer') }}</option>
                                        </select>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="identification" class="form-label"><span class="icon flaticon-id"></span> {{ __('home.identification') }}</label>
                                    <div class="input-wrapper">
                                        <input type="text" id="identification" name="identification" class="form-control-enhanced" value="{{ old('identification') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Names -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label"><span class="icon flaticon-user"></span> {{ __('home.first_name') }}</label>
                                    <div class="input-wrapper">
                                        <input type="text" id="firstName" name="first_name" class="form-control-enhanced" value="{{ old('first_name') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label"><span class="icon flaticon-user"></span> {{ __('home.last_name') }}</label>
                                    <div class="input-wrapper">
                                        <input type="text" id="lastName" name="last_name" class="form-control-enhanced" value="{{ old('last_name') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="country" class="form-label"><span class="icon flaticon-map"></span> {{ __('home.country') }}</label>
                                    <div class="input-wrapper">
                                        <select id="country" name="country_id" class="form-control-enhanced" required>
                                            <option value="">{{ __('home.select_country') }}</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label"><span class="icon flaticon-map"></span> {{ __('home.state') }}</label>
                                    <div class="input-wrapper">
                                        <select id="state" name="state_id" class="form-control-enhanced" required>
                                            <option value="">{{ __('home.select_state') }}</option>
                                        </select>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="city" class="form-label"><span class="icon flaticon-map"></span> {{ __('home.city') }}</label>
                                    <div class="input-wrapper">
                                        <select id="city" name="city_id" class="form-control-enhanced" required>
                                            <option value="">{{ __('home.select_city') }}</option>
                                        </select>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="zipcode" class="form-label"><span class="icon flaticon-map"></span> {{ __('home.zip_code') }}</label>
                                    <div class="input-wrapper">
                                        <input type="text" pattern="\d{5}" maxlength="5" title="Enter a valid ZIP code" id="zipcode" name="zip_code" class="form-control-enhanced" value="{{ old('zip_code') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact -->
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="phone" class="form-label"><span class="icon flaticon-phone"></span> {{ __('home.phone_number') }}</label>
                                    <div class="input-wrapper">
                                        <input type="text" id="phone" name="phone_number" class="form-control-enhanced" value="{{ old('phone_number') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email" class="form-label"><span class="icon flaticon-email"></span> Email</label>
                                    <div class="input-wrapper">
                                        <input type="email" id="email" name="email" class="form-control-enhanced" value="{{ old('email') }}" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="row">
                                <div class="col-md-12 position-relative">
                                    <label for="password-field" class="form-label"><span class="icon flaticon-lock"></span> Password</label>
                                    <div class="input-wrapper">
                                        <input id="password-field" type="password" name="password" class="form-control-enhanced pr-5" placeholder="Password" required>
                                        <span class="input-focus-line"></span>
                                        <button type="button" id="togglePassword" style="position:absolute; right:10px; top:38px; background:none; border:none;" tabindex="-1">
                                            <i class="fa fa-eye" id="password-eye-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="confirmPassword" class="form-label"><span class="icon flaticon-lock"></span> Confirm password</label>
                                    <div class="input-wrapper">
                                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control-enhanced" required>
                                        <span class="input-focus-line"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Checkboxes -->
                            <div class="form-options">
                                <div class="terms-agreement">
                                    <input name="have_vehicle" type="hidden" value="0">
                                    <input type="checkbox" id="have_vehicle" name="have_vehicle" value="1" class="custom-checkbox" {{ old('have_vehicle') ? 'checked' : '' }}>
                                    <label for="have_vehicle" class="form-check-label">Do you have a vehicle?</label>
                                </div>
                            </div>
                            <div class="form-options">
                                <div class="terms-agreement">
                                    <label for="security_id" class="form-check-label" style="display: block; margin-bottom: 8px;">¿Tiene ID de seguridad?</label>
                                    <select id="security_id" name="security_id" class="form-control-enhanced" style="width: 100%; margin-bottom: 10px;">
                                        <option value="no" {{ old('security_id') == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ old('security_id') == 'yes' ? 'selected' : '' }}>Sí</option>
                                        <option value="in_process" {{ old('security_id') == 'in_process' ? 'selected' : '' }}>En trámite</option>
                                    </select>
                                    <div id="security_digits_field" style="display: {{ old('security_id') == 'yes' ? 'block' : 'none' }}; margin-top: 10px;">
                                        <input type="text" id="security_id_last_digits" name="security_id_last_digits" 
                                               class="form-control-enhanced" placeholder="4 últimos dígitos" 
                                               maxlength="4" pattern="\d{4}" value="{{ old('security_id_last_digits') }}">
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.getElementById('security_id').addEventListener('change', function() {
                                    var digitsField = document.getElementById('security_digits_field');
                                    if (this.value === 'yes') {
                                        digitsField.style.display = 'block';
                                    } else {
                                        digitsField.style.display = 'none';
                                    }
                                });
                            </script>
                            <div class="form-options">
                                <div class="terms-agreement">
                                    <input type="checkbox" id="agree_terms" name="is_agree_terms_privacy" value="1" class="custom-checkbox" required {{ old('is_agree_terms_privacy') ? 'checked' : '' }}>
                                    <label for="agree_terms" class="form-check-label">{{ __('home.i_agree_to') }} <a href="{{ route('terms') }}" target="_blank" style="color: #1a1a1a; font-weight: 600;">{{ __('home.terms_conditions') }}</a> {{ __('home.and') }} <a href="{{ route('privacy') }}" target="_blank" style="color: #1a1a1a; font-weight: 600;">{{ __('home.privacy_policy') }}</a></label>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group-submit" style="margin-top: 30px;">
                                <button type="submit" class="btn-enhanced register-btn">
                                    <span class="btn-text">{{ __('home.create_account') }}</span>
                                    <span class="btn-icon">
                                        <i class="fas fa-user-plus"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="register-footer text-center">
                        <p class="signin-text">
                            {{ __('home.already_have_account') }} 
                            <a href="{{ route('web_login') }}" class="signin-link">{{ __('home.sign_in') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(window).on('load', function() {
        // When the country select element changes, retrieve states for the selected country and fill the state select element
        $('#country').change(function() {
            var countryId = $(this).val();

            $.ajax({
            url: "{{ route('api.states_by_country', '') }}"+"/"+countryId,
            method: 'GET',
            success: function(response) {
                var data = response.states
                fillSelect('state', 'id', 'name', data, 'Estado');
            },
            error: function(error) {
                console.log(error);
            }
            });
        });

        $('#state').change(function() {
            var stateId = $(this).val();

            $.ajax({
                url: "{{ route('api.cities_by_state', '') }}"+"/"+stateId,
                method: 'GET',
                success: function(response) {
                    var data = response.cities
                    fillSelect('city', 'id', 'name', data, 'Ciudad');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Function to fill a select element with data
        function fillSelect(idSelect, idData, nameValue, data, displaySelectName) {
            var select = $('#' + idSelect);
            select.empty();
            select.append($('<option>').val('').text('--Select '+displaySelectName+'--'));
            for (var i = 0; i < data.length; i++) {
                var dato = data[i];
                select.append($('<option>').val(dato[idData]).text(dato[nameValue]));
            }
        }

        // Mostrar/ocultar contraseña
        $('#togglePassword').on('click', function() {
            const passwordField = $('#password-field');
            const eyeIcon = $('#password-eye-icon');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            if (type === 'text') {
                eyeIcon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                eyeIcon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>
@endsection

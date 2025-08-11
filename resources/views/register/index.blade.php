@extends('layouts.app_home')

@section('content')
<!-- Register Section -->
<section class="register-section">
    <div class="register-overlay"></div>
    {{-- <div class="floating-elements">
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
    </div> --}}
    <div class="auto-container">
        <div class="row justify-content-center pt-5">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11">
                <div class="register-card">

                    <!-- Header -->
                    <div class="register-header text-center">
                        <div class="register-badge">
                            <span class="icon flaticon-user-plus"></span>
                            Join HORECA
                        </div>
                        <h2 class="main-heading">Create Your Account</h2>
                        <p class="subtitle">Start your career journey in hospitality industry</p>
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
                            <!-- Paso 1 -->
                            <div class="wizard-step" id="step-1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="user_type" class="form-label"><span class="icon flaticon-user"></span> User type</label>
                                        <div class="input-wrapper">
                                            <select id="user_type" name="user_type" class="form-control-enhanced" required>
                                                <option value="candidate" {{ old('user_type') == 'candidate' ? 'selected' : '' }}>Candidate</option>
                                                <option value="employer" {{ old('user_type') == 'employer' ? 'selected' : '' }}>Employer</option>
                                            </select>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="identification" class="form-label"><span class="icon flaticon-id"></span> Identification</label>
                                        <div class="input-wrapper">
                                            <input type="text" id="identification" name="identification" class="form-control-enhanced" value="{{ old('identification') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="firstName" class="form-label"><span class="icon flaticon-user"></span> First name</label>
                                        <div class="input-wrapper">
                                            <input type="text" id="firstName" name="first_name" class="form-control-enhanced" value="{{ old('first_name') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="lastName" class="form-label"><span class="icon flaticon-user"></span> Last name</label>
                                        <div class="input-wrapper">
                                            <input type="text" id="lastName" name="last_name" class="form-control-enhanced" value="{{ old('last_name') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-nav">
                                    <button type="button" class="btn btn-primary btn-wizard-next" id="next-1">
                                        <i class="fas fa-arrow-right"></i> Next
                                    </button>
                                </div>
                            </div>

                            <!-- Paso 2 -->
                            <div class="wizard-step d-none" id="step-2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="country" class="form-label"><span class="icon flaticon-map"></span> Country</label>
                                        <div class="input-wrapper">
                                            <select id="country" name="country_id" class="form-control-enhanced" required>
                                                <option value="">--Select country--</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="state" class="form-label"><span class="icon flaticon-map"></span> State</label>
                                        <div class="input-wrapper">
                                            <select id="state" name="state_id" class="form-control-enhanced" required>
                                                <option value="">--Select state--</option>
                                            </select>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="city" class="form-label"><span class="icon flaticon-map"></span> City</label>
                                        <div class="input-wrapper">
                                            <select id="city" name="city_id" class="form-control-enhanced" required>
                                                <option value="">--Select city--</option>
                                            </select>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="zipcode" class="form-label"><span class="icon flaticon-map"></span> ZIP code</label>
                                        <div class="input-wrapper">
                                            <input type="text" pattern="\d{5}" maxlength="5" title="Enter a valid ZIP code" id="zipcode" name="zip_code" class="form-control-enhanced" value="{{ old('zip_code') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="wizard-nav">
                                    <button type="button" class="btn btn-outline-primary btn-wizard-prev" id="prev-2">
                                        <i class="fas fa-arrow-left"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary btn-wizard-next" id="next-2">
                                        Next <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Paso 3 -->
                            <div class="wizard-step d-none" id="step-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="phone" class="form-label"><span class="icon flaticon-phone"></span> Phone number</label>
                                        <div class="input-wrapper">
                                            <input type="text" id="phone" name="phone_number" class="form-control-enhanced" value="{{ old('phone_number') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="email" class="form-label"><span class="icon flaticon-email"></span> Email</label>
                                        <div class="input-wrapper">
                                            <input type="email" id="email" name="email" class="form-control-enhanced" value="{{ old('email') }}" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
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
                                    <div class="col-md-12">
                                        <label for="confirmPassword" class="form-label"><span class="icon flaticon-lock"></span> Confirm password</label>
                                        <div class="input-wrapper">
                                            <input type="password" id="confirmPassword" name="password_confirmation" class="form-control-enhanced" required>
                                            <span class="input-focus-line"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-options">
                                    <div class="terms-agreement">
                                        <input name="have_vehicle" type="hidden" value="0">
                                        <input type="checkbox" id="have_vehicle" name="have_vehicle" value="1" class="custom-checkbox" {{ old('have_vehicle') ? 'checked' : '' }}>
                                        <label for="have_vehicle" class="form-check-label">Do you have a vehicle?</label>
                                    </div>
                                </div>
                                <div class="form-options">
                                    <div class="terms-agreement">
                                        <input type="checkbox" id="agree_terms" name="is_agree_terms_privacy" value="1" class="custom-checkbox" required {{ old('is_agree_terms_privacy') ? 'checked' : '' }}>
                                        <label for="agree_terms" class="form-check-label">I accept the <a href="#" target="_blank">terms and privacy policy</a>.</label>
                                    </div>
                                </div>
                                <div class="form-group-submit">
                                    <button type="button" class="btn btn-outline-primary btn-wizard-prev" id="prev-3">
                                        <i class="fas fa-arrow-left"></i> Previous
                                    </button>
                                    <button type="submit" class="btn btn-success register-btn">
                                        <span class="btn-text">Create Account</span>
                                        <span class="btn-icon">
                                            <i class="fas fa-user-plus"></i>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="register-footer text-center">
                        <p class="signin-text">
                            Already have an account? 
                            <a href="{{ route('web_login') }}" class="signin-link">Sign In</a>
                        </p>
                        
                        <div class="social-divider">
                            <span class="divider-line"></span>
                            <span class="divider-text">or register with</span>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .wizard-nav {
        margin-top: 2rem;
        text-align: center;
    }
    .btn-wizard-next, .btn-wizard-prev {
        min-width: 120px;
        font-weight: 500;
        font-size: 1rem;
        border-radius: 25px;
        padding: 0.5rem 1.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        transition: background 0.2s, color 0.2s;
        margin: 0 0.5rem;
    }
    .btn-wizard-next i, .btn-wizard-prev i {
        font-size: 1.1em;
        vertical-align: middle;
    }
    .btn-wizard-next {
        background: #1967D2; /* App blue */
        color: #fff;
        border: none;
    }
    .btn-wizard-next:hover {
        background: #154db2; /* App blue dark */
        color: #fff;
    }
    .btn-wizard-prev {
        background: #ffa737; /* App yellow */
        color: #fff;
        border: none;
    }
    .btn-wizard-prev:hover {
        background: #e09c2a; /* App yellow dark */
        color: #fff;
    }
    .btn-success.register-btn {
        border-radius: 25px;
        font-weight: 600;
        font-size: 1rem;
        padding: 0.5rem 2rem;
        box-shadow: 0 2px 8px rgba(16,185,129,0.08);
        background: #10b981;
        color: #fff;
        border: none;
    }
    .btn-success.register-btn:hover {
        background: #059669;
        color: #fff;
    }
</style>
<script>
$(document).ready(function() {
    // Mostrar el primer paso
    $('.wizard-step').addClass('d-none');
    $('#step-1').removeClass('d-none');

    function validateStep(stepId) {
        let valid = true;
        $('#' + stepId + ' [required]').each(function() {
            if ($(this).is(':checkbox')) {
                if (!$(this).is(':checked')) {
                    valid = false;
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            } else if (!$(this).val()) {
                valid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        return valid;
    }

    // Siguiente a paso 2
    $('#next-1').click(function() {
        if (validateStep('step-1')) {
            $('.wizard-step').addClass('d-none');
            $('#step-2').removeClass('d-none');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // Siguiente a paso 3
    $('#next-2').click(function() {
        if (validateStep('step-2')) {
            $('.wizard-step').addClass('d-none');
            $('#step-3').removeClass('d-none');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // Anterior a paso 1
    $('#prev-2').click(function() {
        $('.wizard-step').addClass('d-none');
        $('#step-1').removeClass('d-none');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Anterior a paso 2
    $('#prev-3').click(function() {
        $('.wizard-step').addClass('d-none');
        $('#step-2').removeClass('d-none');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // Quitar la clase is-invalid al corregir
    $('[required]').on('input change', function() {
        if ($(this).is(':checkbox')) {
            if ($(this).is(':checked')) {
                $(this).removeClass('is-invalid');
            }
        } else if ($(this).val()) {
            $(this).removeClass('is-invalid');
        }
    });
});
</script>
<script>
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const toggleIcon = document.getElementById(iconId);
    
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

// Password strength checker
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthFill = document.getElementById('strengthFill');
    const strengthText = document.getElementById('strengthText');
    
    let strength = 0;
    let text = 'Weak';
    let color = '#ef4444';
    
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    switch(strength) {
        case 0:
        case 1:
            text = 'Weak';
            color = '#ef4444';
            break;
        case 2:
        case 3:
            text = 'Medium';
            color = '#f59e0b';
            break;
        case 4:
        case 5:
            text = 'Strong';
            color = '#10b981';
            break;
    }
    
    strengthFill.style.width = (strength * 20) + '%';
    strengthFill.style.backgroundColor = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
});
</script>
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

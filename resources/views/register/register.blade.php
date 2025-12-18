@extends('layouts.app_home')

@section('content')
<!-- Register Section -->
<section class="register-section">
    <div class="register-overlay"></div>
    <div class="floating-elements">
        <div class="floating-circle circle-1"></div>
        <div class="floating-circle circle-2"></div>
        <div class="floating-circle circle-3"></div>
    </div>
    <div class="auto-container">
        <div class="row justify-content-center">
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
                        
                        <form method="POST" action="{{ route('register.post') }}" class="enhanced-form">
                            @csrf
                            
                            <!-- Name Field -->
                            <div class="form-group-enhanced">
                                <label for="name" class="form-label">
                                    <span class="icon flaticon-user"></span>
                                    {{ __('home.full_name') }}
                                </label>
                                <div class="input-wrapper">
                                    <input type="text" 
                                           class="form-control-enhanced" 
                                           id="name" 
                                           name="name" 
                                           placeholder="{{ __('home.enter_full_name') }}"
                                           value="{{ old('name') }}"
                                           required>
                                    <span class="input-focus-line"></span>
                                </div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="form-group-enhanced">
                                <label for="email" class="form-label">
                                    <span class="icon flaticon-email"></span>
                                    {{ __('home.email_address') }}
                                </label>
                                <div class="input-wrapper">
                                    <input type="email" 
                                           class="form-control-enhanced" 
                                           id="email" 
                                           name="email" 
                                           placeholder="{{ __('home.enter_email') }}"
                                           value="{{ old('email') }}"
                                           required>
                                    <span class="input-focus-line"></span>
                                </div>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group-enhanced">
                                <label for="password" class="form-label">
                                    <span class="icon flaticon-lock"></span>
                                    {{ __('home.password') }}
                                </label>
                                <div class="input-wrapper">
                                    <input type="password" 
                                           class="form-control-enhanced" 
                                           id="password" 
                                           name="password" 
                                           placeholder="{{ __('home.create_strong_password') }}"
                                           required>
                                    <span class="input-focus-line"></span>
                                    <button type="button" class="password-toggle" onclick="togglePassword('password', 'toggleIcon1')">
                                        <i class="fas fa-eye" id="toggleIcon1"></i>
                                    </button>
                                </div>
                                <div class="password-strength">
                                    <div class="strength-bar">
                                        <div class="strength-fill" id="strengthFill"></div>
                                    </div>
                                    <span class="strength-text" id="strengthText">{{ __('home.password_strength') }}</span>
                                </div>
                            </div>
                            
                            <!-- Confirm Password Field -->
                            <div class="form-group-enhanced">
                                <label for="password_confirmation" class="form-label">
                                    <span class="icon flaticon-lock"></span>
                                    {{ __('home.confirm_password') }}
                                </label>
                                <div class="input-wrapper">
                                    <input type="password" 
                                           class="form-control-enhanced" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="{{ __('home.confirm_your_password') }}"
                                           required>
                                    <span class="input-focus-line"></span>
                                    <button type="button" class="password-toggle" onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                        <i class="fas fa-eye" id="toggleIcon2"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Terms & Conditions -->
                            <div class="form-options">
                                <div class="terms-agreement">
                                    <input type="checkbox" id="terms" name="terms" class="custom-checkbox" required>
                                    <label for="terms">
                                        {{ __('home.i_agree_to') }} <a href="#" class="terms-link">{{ __('home.terms_conditions') }}</a> 
                                        {{ __('home.and') }} <a href="#" class="privacy-link">{{ __('home.privacy_policy') }}</a>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="form-group-submit">
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
                            <a href="{{ route('login') }}" class="signin-link">{{ __('home.sign_in_here') }}</a>
                        </p>
                        
                        <div class="social-divider">
                            <span class="divider-line"></span>
                            <span class="divider-text">{{ __('home.or_continue_with') }}</span>
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
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>
@endsection

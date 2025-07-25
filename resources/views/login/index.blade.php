{{-- @extends('login.layout_index')

@section('content')
    <!-- Info Section -->
    <div class="login-section d-flex align-items-start justify-content-center" style="min-height:100vh; background:linear-gradient(120deg, #f8fafc 60%, #e3eafc 100%); position:relative; padding-top:48px; padding-bottom:16px;">
        <div class="image-layer position-absolute w-100 h-100" style="background-image: url({{ asset('images/login-2.jpg')}}); background-size:cover; background-position:center; opacity:0.18; z-index:1;"></div>
        <div class="overflow-hidden d-flex mx-auto position-relative" style="max-width:500px; width:100%; align-items:flex-start; justify-content:center; border-radius:1rem; box-shadow:0 2px 16px rgba(0,0,0,0.07); z-index:2; margin-top:0; margin-bottom:0;">
          <div class="w-100" style="position:relative;">
            <div class="form-inner w-100">
              
              <form id="loginForm" method="post" action="{{route('login_post')}}" autocomplete="off" style="border-radius:12px; box-shadow:0 2px 16px rgba(0,0,0,0.07); padding:32px 24px; background:#fff;">
                @csrf
                @include('partials/errors_div')
                <h3 class="mb-4 text-center" style="font-weight:700; color:#2d3e50;">Login to <span style="color:#007bff;">Is Yours</span></h3>
                <div class="form-group mb-3">
                  <label>Email</label>
                  <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group mb-3 position-relative">
                  <label>Password</label>
                  <input id="password-field" type="password" name="password" class="form-control pr-5" value="" placeholder="Password" required>
                  <button type="button" id="togglePassword" style="position:absolute; right:10px; top:38px; background:none; border:none;" tabindex="-1">
                    <i class="fa fa-eye"></i>
                  </button>
                </div>
                <!-- <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LeYCvYlAAAAAM5-aLYRj4D5vIKg903-p2DCRtDe"></div>
                </div> -->
                <div class="form-group mb-3">
                  <button class="theme-btn btn-style-one w-100" type="submit" name="log-in">Log In</button>
                </div>
                <div class="bottom-box text-center mt-3">
                  <a href="#" class="text">Forgot password?</a>
                  <div class="text">Don't have an account? <a href="{{ route('web_register') }}">Signup</a></div>
                </div>
              </form>
              
            </div>
          </div>
        </div>
    </div>
    <!-- End Info Section -->
@endsection

@section('js')
<script type="text/javascript">
    $(window).on('load', function() {
        // Mostrar/ocultar contraseña
        $('#togglePassword').on('click', function() {
            const passwordField = $('#password-field');
            const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).find('i').toggleClass('fa-eye fa-eye-slash');
        });
    });
</script>
@endsection --}}
@extends('layouts.app_home')

@section('content')
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
                    
                    <div class="login-header text-center">
                        <div class="login-badge">
                            <span class="icon flaticon-user"></span>
                            Welcome Back
                        </div>
                        <h2 class="main-heading">Sign In to Your Account</h2>
                        <p class="subtitle">Access your HORECA career dashboard</p>
                    </div>

                    
                    <div class="login-body">
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
                        
                        <form method="POST" action="{{route('login_post')}}" autocomplete="off" class="enhanced-form">
                            @csrf
                            @include('partials/errors_div')
                            
                            <div class="form-group-enhanced">
                                <label for="email" class="form-label">
                                    <span class="icon flaticon-email"></span>
                                    Email Address
                                </label>
                                <div class="input-wrapper">
                                    <input type="email" 
                                           class="form-control-enhanced" 
                                           id="email" 
                                           name="email" 
                                           placeholder="Enter your email address"
                                           value="{{ old('email') }}"
                                           required>
                                    <span class="input-focus-line"></span>
                                </div>
                            </div>
                            
                            
                            <div class="form-group-enhanced">
                                <label for="password" class="form-label">
                                    <span class="icon flaticon-lock"></span>
                                    Password
                                </label>
                                <div class="input-wrapper">
                                    <input type="password" 
                                           class="form-control-enhanced" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Enter your password"
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
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="forgot-link">Forgot Password?</a>
                            </div>
                            
                            
                            <div class="form-group-submit">
                                <button type="submit" class="btn-enhanced login-btn">
                                    <span class="btn-text">Sign In</span>
                                    <span class="btn-icon">
                                        <i class="fas fa-arrow-right"></i>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>

                    
                    <div class="login-footer text-center">
                        <p class="signup-text">
                            Don't have an account? 
                            <a href="{{ route('web_register') }}" class="signup-link">Create Account</a>
                        </p>
                        
                        <div class="social-divider">
                            <span class="divider-line"></span>
                            <span class="divider-text">or continue with</span>
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
@endsection

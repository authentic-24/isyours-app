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
                    {{-- <div class="card-decoration"></div> --}}
                    
                    <!-- Header -->
                    <div class="login-header text-center">
                        <div class="login-badge">
                            <span class="icon flaticon-user"></span>
                            Welcome Back
                        </div>
                        <h2 class="main-heading">Sign In to Your Account</h2>
                        <p class="subtitle">Access your HORECA career dashboard</p>
                    </div>

                    <!-- Form Body -->
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
                            <!-- Email Field -->
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
                            
                            <!-- Password Field -->
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

                            <!-- Remember & Forgot -->
                            <div class="form-options">
                                <div class="remember-me">
                                    <input type="checkbox" id="remember" name="remember" class="custom-checkbox">
                                    <label for="remember">Remember me</label>
                                </div>
                                <a href="#" class="forgot-link">Forgot Password?</a>
                            </div>
                            
                            <!-- Submit Button -->
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

                    <!-- Footer -->
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
                            {{-- <a href="#" class="social-btn linkedin-btn">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a> --}}
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

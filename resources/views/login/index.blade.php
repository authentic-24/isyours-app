@extends('login.layout_index')

@section('content')
    <!-- Info Section -->
    <div class="login-section">
      <div class="image-layer" style="background-image: url({{ asset('images/login-2.jpg')}});"></div>
      <div class="outer-box">
        <!-- Login Form -->
        <div class="login-form default-form">
          <div class="form-inner">
            <h3>Login to Is Yours</h3>
            <!--Login Form-->
            <form id="loginForm" method="post" action="{{route('login_post')}}">
              @csrf

              @include('partials/errors_div')

              <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" required>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input id="password-field" type="password" name="password" value="" placeholder="Password" required>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeYCvYlAAAAAM5-aLYRj4D5vIKg903-p2DCRtDe"></div>
              </div>
              <div class="form-group">
                <button class="theme-btn btn-style-one" type="submit" name="log-in">Log In</button>
              </div>
            </form>

            <div class="bottom-box">
                <a href="#" class="text">Forgot password?</a>

              <div class="text">Don't have an account? <a href="{{ route('web_register') }}">Signup</a></div>
              <!-- <div class="divider"><span>or</span></div>
              <div class="btn-box row">
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                </div>
                <div class="col-lg-6 col-md-12">
                  <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!--End Login Form -->
      </div>
    </div>
    <!-- End Info Section -->

@endsection

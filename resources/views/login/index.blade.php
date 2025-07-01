@extends('login.layout_index')

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
@endsection

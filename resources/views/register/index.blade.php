@extends('login.layout_index')

@section('content')
    <!-- Info Section -->
    <div class="login-section d-flex align-items-center justify-content-center" style="min-height:100vh; background:linear-gradient(120deg, #f8fafc 60%, #e3eafc 100%); position:relative; padding-top:32px; padding-bottom:32px;">
        <div class="image-layer position-absolute w-100 h-100" style="background-image: url({{asset('images/register-bg.jpg')}}); background-size:cover; background-position:center; opacity:0.18; z-index:1;"></div>
        <div class="overflow-hidden d-flex mx-auto position-relative" style="max-width:700px; width:100%; align-items:center; justify-content:center; border-radius:2rem; box-shadow:0 2px 16px rgba(0,0,0,0.07); z-index:2; margin-top:0; margin-bottom:0;">
          <div class="w-100" style="position:relative;">
            <div class="form-inner w-100">
              @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif
              <form id="registrationForm" action="{{ route('register_post') }}" method="post" autocomplete="off" style="border-radius:12px; box-shadow:0 2px 16px rgba(0,0,0,0.07); padding:32px 24px; background:#fff;">
                @csrf
                @include('partials/errors_div')
                <h3 class="mb-4 text-center" style="font-weight:700; color:#2d3e50;">Create your account on <span style="color:#007bff;">Is Yours</span></h3>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="user_type" class="form-label">User type</label>
                    <select id="user_type" name="user_type" class="form-control" required>
                      <option value="candidate" {{ old('user_type') == 'candidate' ? 'selected' : '' }}>Candidate</option>
                      <option value="employer" {{ old('user_type') == 'employer' ? 'selected' : '' }}>Employer</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="identification" class="form-label">Identification</label>
                    <input type="text" id="identification" name="identification" class="form-control" value="{{ old('identification') }}" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" id="firstName" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" id="lastName" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select id="country" name="country_id" class="form-control" required>
                      <option value="">--Select country--</option>
                      @foreach ($countries as $country)
                          <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="state" class="form-label">State</label>
                    <select id="state" name="state_id" class="form-control" required>
                      <option value="">--Select state--</option>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">City</label>
                    <select id="city" name="city_id" class="form-control" required>
                      <option value="">--Select city--</option>
                    </select>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="zipcode" class="form-label">ZIP code</label>
                    <input type="text" pattern="\d{5}" maxlength="5" title="Enter a valid ZIP code" id="zipcode" name="zip_code" class="form-control" value="{{ old('zip_code') }}" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone number</label>
                    <input type="text" id="phone" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3 position-relative">
                    <label for="password-field" class="form-label">Password</label>
                    <input id="password-field" type="password" name="password" class="form-control pr-5" placeholder="Password" required>
                    <button type="button" id="togglePassword" style="position:absolute; right:10px; top:38px; background:none; border:none;" tabindex="-1">
                      <i class="fa fa-eye"></i>
                    </button>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="confirmPassword" class="form-label">Confirm password</label>
                    <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" required>
                  </div>
                </div>

                <div class="form-group form-check mb-2">
                  <input name="have_vehicle" type="hidden" value="0">
                  <input type="checkbox" id="have_vehicle" name="have_vehicle" value="1" class="form-check-input" {{ old('have_vehicle') ? 'checked' : '' }}>
                  <label for="have_vehicle" class="form-check-label">Do you have a vehicle?</label>
                </div>

                <div class="form-group form-check mb-3">
                  <input type="checkbox" id="agree_terms" name="is_agree_terms_privacy" value="1" class="form-check-input" required {{ old('is_agree_terms_privacy') ? 'checked' : '' }}>
                  <label for="agree_terms" class="form-check-label">I accept the <a href="#" target="_blank">terms and privacy policy</a>.</label>
                </div>

                <div class="form-group mb-0">
                  <button class="theme-btn btn-style-one w-100" type="submit" name="Register" style="font-weight:600; font-size:1.1rem;">Register</button>
                </div>
              </form>
  
              <!-- div class="bottom-box">
                <div class="divider"><span>or</span></div>
                <div class="btn-box row">
                  <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                  </div>
                </div>
              </div> -->
              <!--End Login Form -->
            </div>
  
  
            <!-- div class="bottom-box">
                  <div class="divider"><span>or</span></div>
                  <div class="btn-box row">
                    <div class="col-lg-6 col-md-12">
                      <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                      <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                    </div>
                  </div>
                </div> -->
          </div>
        </div>
        <!--End Login Form -->
      </div>
    <!-- End Info Section -->

@endsection

@section('js')
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
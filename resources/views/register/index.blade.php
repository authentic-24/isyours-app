@extends('login.layout_index')

@section('content')
    <!-- Info Section -->
    <div class="login-section">
        <div class="image-layer" style="background-image: url({{asset('images/register-bg.jpg')}});"></div>
        <div class="outer-box">
          <!-- Login Form -->
          <div class="login-form default-form ">
            <div class="form-inner">
              <h3>Create an Account In Is Yours</h3>
  
              <!--Login Form-->
  
              <form id="registrationForm" action="{{ route('register_post') }}" method="post">
                @csrf
                @include('partials/errors_div')


                <!-- <div class="form-group">
                  <div class="btn-box row">
                    <div class="col-lg-6 col-md-12">
                      <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                    </div>
                    <div class="col-lg-6 col-md-12">
                      <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                    </div>
                  </div>
                </div> -->
                

                <div class="form-group">
                  <label for="user_type">User Type:</label>
                  <select id="user_type" name="user_type"  value="{{ old('user_type') }}" required>
                    <option value="candidate" selected>Candidate</option>
                    <option value="employer">Employer</option>
                  </select><br>
                </div>
  
  
                <div class="form-group">
                  <label for="firstName">First Name:</label>
                  <input type="text" id="firstName" name="first_name"  value="{{ old('first_name') }}" required><br>
                </div>
  
                <div class="form-group">
                  <label for="lastName">Last Name:</label>
                  <input type="text" id="lastName" name="last_name"  value="{{ old('last_name') }}" required><br>
                </div>
  
  
                <div class="form-group">
                  <label for="identification">Identification:</label>
                  <input type="text" id="identification" name="identification"  value="{{ old('identification') }}" required><br>
                </div>
  
                <div class="form-group">
                  <label for="country">Country:</label>
                  <select id="country" name="country_id" required>
                    <option value="">--Select Country--</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                  </select><br>
                </div>
  
                <div class="form-group">
                  <label for="state">State:</label>
                  <select id="state" name="state_id" required>
                    <option value="">--Select State--</option>
                    <!-- <option value="AZ">complete list from DB</option> -->
                  </select><br>
                </div>
  
                <div class="form-group">
                  <label for="city">City:</label>
                  <select id="city" name="city_id" required>
                    <option value="">--Select City--</option>
                    <!-- <option value="AZ">complete list from DB</option> -->
                  </select><br>
                </div>
  
                <div class="form-group">
                  <label for="zipcode">ZIP Code:</label>
                  <input type="text" pattern="\d{5}" maxlength="5" title="Please enter a valid ZIP Code" id="zipcode" name="zip_code"  value="{{ old('zip_code') }}"
                    required><br>
                </div>

              
                <div class="form-group">
                  <label for="phone">Phone Number:</label>
                  <input type="text" id="phone" name="phone_number"  value="{{ old('phone_number') }}" required><br>
                </div>
  
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" id="email" name="email"  value="{{ old('email') }}" required><br>
                </div>
  
  
                <div class="form-group">
                  <label>Password</label>
                  <input id="password-field" type="password" name="password" value="" placeholder="Password">
                </div>
  
                <div class="form-group">
                  <label for="confirmPassword">Confirm Password:</label>
                  <input type="password" id="confirmPassword" name="password_confirmation" required><br>
                </div>

                <div class="form-group">
                  <input name="have_vehicle" type="hidden" value="0">
                  <input type="checkbox" id="agree" name="have_vehicle" value="1">
                  <label for="agree">Do you have a vehicle?</label><br>
                </div>
  
  
                <div class="form-group">
                  <input type="checkbox" id="agree" name="is_agree_terms_privacy" value="1" required>
                  <label for="agree">I agree to the user terms and privacy policy.</label><br>
                </div>
  
                <div class="form-group">
                  <button class="theme-btn btn-style-one " type="submit" name="Register">Register</button>
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
                // Get the state select element
                var data = response.states

                // Fill the select element with the retrieved data
                fillSelect('state', 'id', 'name', data, 'State');
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
                    // Get the state select element
                    var data = response.cities

                    // Fill the select element with the retrieved data
                    fillSelect('city', 'id', 'name', data, 'City');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        // Function to fill a select element with data
        function fillSelect(idSelect, idData, nameValue, data, displaySelectName) {
            // Get the select element
            var select = $('#' + idSelect);
            // Clear the select element
            select.empty();
            // Add default option to the select element
            select.append($('<option>').val('').text('--Select '+displaySelectName+'--'));
            // Loop through the data and add options to the select element
            for (var i = 0; i < data.length; i++) {
                var dato = data[i];
                select.append($('<option>').val(dato[idData]).text(dato[nameValue]));
            }
        }


    });
    
</script>

@endsection
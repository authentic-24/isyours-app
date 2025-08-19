@extends('layouts/app')

@section('content')
    @include('partials/errors_div')

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>My Profile</h1>
            </div>
        </div>
    </section>

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        {{-- <div class="tabs-box">
                            <div class="widget-title">
                                <h4>My Profile</h4>
                            </div> --}}

                        <div class="widget-content">

                            {{-- <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="attachments[]"
                                            accept="image/*, application/pdf" id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Browse Logo</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg & .png</div>
                                </div>

                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="attachments[]"
                                            accept="image/*, application/pdf" id="upload_cover" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Browse Cover</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Max file size is 1MB, Minimum dimension: 330x300 And Suitable files
                                        are .jpg & .png</div>
                                </div> --}}

                            <form class="default-form" id="registrationForm" action="{{ route('web.candidate.update') }}"
                                method="post">
                                @csrf
                                @include('partials/errors_div')
                                <div class="row">

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="firstName">First Name:</label>
                                        <input type="text" id="firstName" name="first_name"
                                            value="{{ isset($user) ? $user->first_name : old('first_name') }}" required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="lastName">Last Name:</label>
                                        <input type="text" id="lastName" name="last_name" value="{{ isset($user) ? $user->last_name : old('last_name') }}"
                                            required><br>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="identification">Identification:</label>
                                        <input type="text" id="identification" name="identification"
                                            value="{{ isset($user) ? $user->last_name : old('last_name') }}" required><br>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="country_of_origin_id">Country of Origin:</label>
                                        <select id="country_of_origin_id" name="country_of_origin_id" required>
                                            <option value="">--Select Country of Origin--</option>
                                            @foreach ($countries as $country)
                                                @if($country->id == $user->country_of_origin_id)
                                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                            @endforeach
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Education Level</label>
                                        <select data-placeholder="Select education level" name="education_level_id" tabindex="4" required>
                                            <option value=""></option>
                                            @foreach ($educationLevels as $education_level)
                                                @if($education_level->id == $user->education_level_id)
                                                    <option value="{{ $education_level->id }}" selected>{{ $education_level->name }}</option>
                                                @else
                                                    <option value="{{ $education_level->id }}">{{ $education_level->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="phone">Phone Number:</label>
                                        <input type="text" id="phone" name="phone_number" 
                                            value="{{ isset($user) ? $user->phone_number : old('phone_number') }}" required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}"
                                            required><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="visa">Visa Type:</label>
                                        <select id="visa" name="visa_id" >
                                            <option value="">--Select Visa Type--</option>
                                            @foreach ($visas as $visa)
                                                @if($visa->id == $user->visa_id)
                                                    <option value="{{ $visa->id }}" selected>{{ $visa->name }}</option>
                                                @else
                                                    <option value="{{ $visa->id }}">{{ $visa->name }}</option>
                                                @endif
                                            @endforeach
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="visa_number">Visa Number:</label>
                                        <input type="text" id="visa_number" name="visa_number" value="{{ isset($user) ? $user->visa_number : old('visa_number') }}"
                                            ><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <input name="have_vehicle" type="hidden" value="0">
                                        @if($user->have_vehicle)
                                        <input type="checkbox" id="agree" name="have_vehicle" value="1" checked>
                                        @else
                                        <input type="checkbox" id="agree" name="have_vehicle" value="1">
                                        @endif
                                        <label for="agree">Do you have a vehicle?</label><br>
                                        <input type="text" id="license_plates" name="license_plates" placeholder="License Plates"
                                            value="{{ isset($user) ? $user->license_plates : old('license_plates') }}"><br>
                                    </div>

                                    
                                    <div class="form-group col-lg-6 col-md-12">
                                        <input name="security_id" type="hidden" value="0">
                                        @if($user->security_id)
                                        <input type="checkbox" id="agree" name="security_id" value="1" checked>
                                        @else
                                        <input type="checkbox" id="agree" name="security_id" value="1">
                                        @endif
                                        <label for="agree">Do you have a security ID?</label><br>
                                    </div>


                                    <div class="widget-title">
                                        <h4>Current Address Information</h4>
                                    </div>


                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="country">Country:</label>
                                        <select id="country" name="country_id" required>
                                            <option value="">--Select Country--</option>
                                            @foreach ($countries as $country)
                                            @if($country->id == 1)
                                                @if($country->id == $city->state->country_id)
                                                    <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                            @endif
                                            @endforeach
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="state">State:</label>
                                        <select id="state" name="state_id" required>
                                            <option value="">--Select State--</option>
                                            @foreach ($states as $state)
                                                @if($state->id == $city->state_id)
                                                    <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                                @else
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endif
                                            @endforeach
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="city">City:</label>
                                        <select id="city" name="city_id" required>
                                            <option value="">--Select City--</option>
                                            <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                        </select><br>
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label for="zipcode">ZIP Code:</label>
                                        <input type="text" pattern="\d{5}" maxlength="5"
                                            title="Please enter a valid ZIP Code" id="zipcode" name="zip_code"
                                            value="{{ isset($user) ? $user->zip_code : old('zip_code') }}" required><br>
                                    </div>


                                    


                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>

                <!-- Ls widget -->
                {{-- <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Social Network</h4>
                            </div>

                            <div class="widget-content">
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Facebook</label>
                                            <input type="text" name="name" placeholder="www.facebook.com/Invision">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Twitter</label>
                                            <input type="text" name="name" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Linkedin</label>
                                            <input type="text" name="name" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Google Plus</label>
                                            <input type="text" name="name" placeholder="">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

                <!-- Ls widget -->
                {{-- <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Contact Information</h4>
                            </div>

                            <div class="widget-content">
                                <form class="default-form">
                                    <div class="row">
                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Country</label>
                                            <select class="chosen-select">
                                                <option>Australia</option>
                                                <option>Pakistan</option>
                                                <option>Chaina</option>
                                                <option>Japan</option>
                                                <option>India</option>
                                            </select>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>City</label>
                                            <select class="chosen-select">
                                                <option>Melbourne</option>
                                                <option>Pakistan</option>
                                                <option>Chaina</option>
                                                <option>Japan</option>
                                                <option>India</option>
                                            </select>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Complete Address</label>
                                            <input type="text" name="name"
                                                placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Find On Map</label>
                                            <input type="text" name="name"
                                                placeholder="329 Queensberry Street, North Melbourne VIC 3051, Australia.">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-3 col-md-12">
                                            <label>Latitude</label>
                                            <input type="text" name="name" placeholder="Melbourne">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-3 col-md-12">
                                            <label>Longitude</label>
                                            <input type="text" name="name" placeholder="Melbourne">
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-three">Search Location</button>
                                        </div>


                                        <div class="form-group col-lg-12 col-md-12">
                                            <div class="map-outer">
                                                <div class="map-canvas map-height" data-zoom="12" data-lat="-37.817085"
                                                    data-lng="144.955631" data-type="roadmap" data-hue="#ffc400"
                                                    data-title="Envato" data-icon-path="images/resource/map-marker.png"
                                                    data-content="Melbourne VIC 3000, Australia<br><a href='mailto:info@youremail.com'>info@youremail.com</a>">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Input -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

            </div>


        </div>
        </div>
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
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
                                
                                @if(session('success'))
                                    <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 12px 20px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
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


                                    <!-- Work Experience Section -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <h4 style="margin-top: 30px; margin-bottom: 20px;">Work Experience</h4>
                                    </div>

                                    @if(isset($user) && $user->workExperiences && $user->workExperiences->count() > 0)
                                        @foreach($user->workExperiences as $experience)
                                            <div class="work-experience-item" style="background: #f8f9fa; padding: 20px; margin-bottom: 15px; border-radius: 8px; border: 1px solid #e0e0e0;">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12">
                                                        <strong style="font-size: 16px; color: #333;">{{ $experience->position }}</strong>
                                                        @if($experience->company)
                                                            <p style="margin: 5px 0; color: #666;">{{ $experience->company }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 text-right">
                                                        <span style="color: #666;">{{ $experience->duration }}</span>
                                                    </div>
                                                    @if($experience->description)
                                                        <div class="col-lg-12 col-md-12" style="margin-top: 10px;">
                                                            <p style="color: #555; margin: 0;">{{ $experience->description }}</p>
                                                        </div>
                                                    @endif
                                                    <div class="col-lg-12 col-md-12" style="margin-top: 15px; display: flex; gap: 15px;">
                                                        <button type="button" class="btn-edit-experience" data-id="{{ $experience->id }}" style="background: none; border: none; color: #312683; cursor: pointer; font-size: 18px; padding: 5px; transition: all 0.3s;" title="Edit" onmouseover="this.style.color='#0146A6'" onmouseout="this.style.color='#312683'">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <form action="{{ route('web.profile.work_experience.destroy', $experience->id) }}" method="POST" style="display: inline; margin: 0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this work experience?')" style="background: none; border: none; color: #f9b232; cursor: pointer; font-size: 18px; padding: 5px; transition: all 0.3s;" title="Delete" onmouseover="this.style.color='#E9A000'" onmouseout="this.style.color='#f9b232'">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-lg-12 col-md-12">
                                            <p style="color: #666; font-style: italic;">No work experience added yet.</p>
                                        </div>
                                    @endif

                                    <!-- Add New Work Experience Button -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="button" id="btn-add-experience" class="theme-btn btn-style-two" style="margin-bottom: 20px;">Add Work Experience</button>
                                    </div>

                                    <!-- New Work Experience Form (Hidden by default) -->
                                    <div id="new-experience-form" style="display: none; background: #f0f7ff; padding: 20px; margin-bottom: 20px; border-radius: 8px; border: 1px solid #d0e0f0;">
                                        <h5 style="margin-bottom: 15px;">Add New Work Experience</h5>
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-12">
                                                <label>Position / Job Title *</label>
                                                <input type="text" id="new_position" name="new_position" placeholder="e.g. Software Developer">
                                            </div>

                                            <div class="form-group col-lg-6 col-md-12">
                                                <label>Company Name</label>
                                                <input type="text" id="new_company" name="new_company" placeholder="e.g. ABC Corporation">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label>Start Date *</label>
                                                <input type="date" id="new_start_date" name="new_start_date">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label>End Date</label>
                                                <input type="date" id="new_end_date" name="new_end_date">
                                            </div>

                                            <div class="form-group col-lg-4 col-md-12">
                                                <label style="display: block;">&nbsp;</label>
                                                <div style="padding-top: 10px;">
                                                    <input type="checkbox" id="new_is_current" name="new_is_current" style="width: auto; margin-right: 8px;">
                                                    <label for="new_is_current" style="display: inline; font-weight: normal;">Currently working here</label>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <label>Description</label>
                                                <textarea id="new_description" name="new_description" rows="3" placeholder="Describe your responsibilities and achievements..."></textarea>
                                            </div>

                                            <div class="form-group col-lg-12 col-md-12">
                                                <button type="button" id="btn-save-experience" class="theme-btn btn-style-one" style="margin-right: 10px;">Save Experience</button>
                                                <button type="button" id="btn-cancel-experience" class="theme-btn btn-style-three">Cancel</button>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <!-- Talents Section -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <h4 style="margin-top: 30px; margin-bottom: 20px;">Mis Talentos</h4>
                                    </div>

                                    <!-- Display Talents as Badges -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div id="talents-container" style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 15px;">
                                            @if(isset($user) && $user->talents && $user->talents->count() > 0)
                                                @foreach($user->talents as $talent)
                                                    <span class="talent-badge" style="background: #f9b232; color: #202124; padding: 8px 15px; border-radius: 20px; font-size: 14px; font-weight: 500; display: inline-flex; align-items: center; gap: 8px;">
                                                        {{ $talent->talent }}
                                                        <form action="{{ route('web.profile.talent.destroy', $talent->id) }}" method="POST" style="display: inline; margin: 0;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="background: none; border: none; color: #202124; cursor: pointer; font-size: 16px; padding: 0; line-height: 1; font-weight: bold;" title="Remove talent">×</button>
                                                        </form>
                                                    </span>
                                                @endforeach
                                            @else
                                                <p style="color: #666; font-style: italic;">No talents added yet.</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Add New Talent -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <div style="display: flex; gap: 10px; align-items: flex-start;">
                                            <div style="flex: 1; max-width: 400px;">
                                                <label>Add Talent</label>
                                                <input type="text" id="new_talent" name="new_talent" placeholder="e.g. Leadership, Communication, Problem Solving..." maxlength="50">
                                            </div>
                                            <div style="padding-top: 32px;">
                                                <button type="button" id="btn-add-talent" class="theme-btn btn-style-two" style="padding: 12px 30px;">Add</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group col-lg-12 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>


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
    </section>
@endsection


@section('js')

<script type="text/javascript">
    $(window).on('load', function() {
        // Work Experience functionality
        $('#btn-add-experience').click(function() {
            $('#new-experience-form').slideDown();
            $(this).hide();
        });

        $('#btn-cancel-experience').click(function() {
            $('#new-experience-form').slideUp();
            $('#btn-add-experience').show();
            clearExperienceForm();
        });

        $('#new_is_current').change(function() {
            if($(this).is(':checked')) {
                $('#new_end_date').val('').prop('disabled', true);
            } else {
                $('#new_end_date').prop('disabled', false);
            }
        });

        $('#btn-save-experience').click(function() {
            const position = $('#new_position').val().trim();
            const company = $('#new_company').val().trim();
            const startDate = $('#new_start_date').val();
            const endDate = $('#new_end_date').val();
            const isCurrent = $('#new_is_current').is(':checked');
            const description = $('#new_description').val().trim();

            if(!position) {
                alert('Position is required');
                return;
            }

            if(!startDate) {
                alert('Start date is required');
                return;
            }

            if(!isCurrent && endDate && new Date(endDate) < new Date(startDate)) {
                alert('End date must be after start date');
                return;
            }

            // Create form data
            const formData = {
                _token: '{{ csrf_token() }}',
                position: position,
                company: company,
                start_date: startDate,
                end_date: isCurrent ? null : endDate,
                is_current: isCurrent ? 1 : 0,
                description: description
            };

            // Submit via AJAX
            $.ajax({
                url: "{{ route('web.profile.work_experience.store') }}",
                method: 'POST',
                data: formData,
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    if(xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        for(let key in errors) {
                            errorMsg += errors[key][0] + '\n';
                        }
                        alert(errorMsg);
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });

        function clearExperienceForm() {
            $('#new_position').val('');
            $('#new_company').val('');
            $('#new_start_date').val('');
            $('#new_end_date').val('').prop('disabled', false);
            $('#new_is_current').prop('checked', false);
            $('#new_description').val('');
        }

        // Talents functionality
        $('#btn-add-talent').click(function() {
            const talent = $('#new_talent').val().trim();

            if(!talent) {
                alert('Please enter a talent');
                return;
            }

            if(talent.length > 50) {
                alert('Talent must be 50 characters or less');
                return;
            }

            // Submit via AJAX
            $.ajax({
                url: "{{ route('web.profile.talent.store') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    talent: talent
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    if(xhr.responseJSON && xhr.responseJSON.message) {
                        alert(xhr.responseJSON.message);
                    } else if(xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = '';
                        for(let key in errors) {
                            errorMsg += errors[key][0] + '\n';
                        }
                        alert(errorMsg);
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });

        // Allow adding talent by pressing Enter
        $('#new_talent').keypress(function(e) {
            if(e.which == 13) {
                e.preventDefault();
                $('#btn-add-talent').click();
            }
        });

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
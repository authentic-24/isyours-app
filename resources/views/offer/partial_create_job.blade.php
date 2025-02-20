    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Post Job</h1>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-content">

                                <div class="post-job-steps">
                                    <div class="step">
                                        <span class="icon flaticon-briefcase"></span>
                                        <h5>Job Detail</h5>
                                    </div>
                                </div>

                                <form class="default-form" action="{{ route('create_post') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <!-- Search Select - Job Level -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Level</label>
                                            <select name="job_level_id" data-placeholder="Select job level"
                                                class="chosen-select" tabindex="4" required>
                                                <option value=""></option>
                                                @foreach ($jobLevels as $jobLevel)
                                                    <option value="{{ $jobLevel->id }}">{{ $jobLevel->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Search Select - Job Title -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Job Title</label>
                                            <select data-placeholder="Select job title" name="job_title_id"
                                                class="chosen-select" tabindex="4" required>
                                                <option value=""></option>
                                                @foreach ($jobTitles as $jobTitle)
                                                    <option value="{{ $jobTitle->id }}">{{ $jobTitle->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Search Select - Employment Type -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Employment Type</label>
                                            <select data-placeholder="Select employment type" name="job_type_id"
                                                class="chosen-select" tabindex="4" required>
                                                <option value=""></option>
                                                @foreach ($jobTypes as $jobType)
                                                    <option value="{{ $jobType->id }}">{{ $jobType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- Search Select - Education Level -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Education Level</label>
                                            <select data-placeholder="Select education level" name="education_level_id"
                                                class="chosen-select" tabindex="4" required>
                                                <option value=""></option>
                                                @foreach ($educationLevels as $education_level)
                                                    <option value="{{ $education_level->id }}">
                                                        {{ $education_level->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <!-- About Company -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label>Job Description</label>
                                            <textarea placeholder="" name="description" required></textarea>
                                        </div>

                                        <!-- Select - Language -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Language</label>
                                            <select data-placeholder="Select language" name="language_id"
                                                class="chosen-select" tabindex="4" required>
                                                <option value=""></option>
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Select - Proficiency Level -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Proficiency Level</label>
                                            <select data-placeholder="Select Proficiency Level"
                                                name="proficiency_level_id" class="chosen-select" tabindex="4"
                                                required>
                                                <option value=""></option>
                                                @foreach ($proficiencyLevels as $proficiencylevel)
                                                    <option value="{{ $proficiencylevel->id }}">
                                                        {{ $proficiencylevel->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Input Range - Rate -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Rate usd /hour</label>
                                            <input type="number" name="rate" placeholder="Enter rate" value="0"
                                                step="1" min="3" required>
                                        </div>

                                        <!-- Input - Offered Salary -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Offered Salary</label>
                                            <input type="number" name="offered_salary"
                                                placeholder="Enter offered salary" step="any" min="0"
                                                required>
                                        </div>

                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Years of Experience</label>
                                            <input type="number" name="years_of_experience"
                                                placeholder="Enter years of experience" step="1" min="0"
                                                required>
                                        </div>

                                        <!-- Input - Expiration Date -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <br>
                                            <label>Application Deadline Date</label>
                                            <br>
                                            <input type="date" name="expiration_date" required>
                                        </div>

                                        <!-- Key Responsibilities -->
                                        <input type="hidden" name="responsibilities" id="responsibilities-input">
                                        <div class="form-group col-lg-12 col-md-12 responsibilities-container">
                                            <label>Key Responsibilities</label>
                                            <p>Please enter up to 10 key responsibilities, each with a maximum of 300
                                                characters.</p>

                                            <!-- Responsibility Input -->
                                            <div class="responsibility-input">
                                                <input type="text" class="responsibility-text" maxlength="300">
                                                <button type="button"
                                                    class="theme-btn btn-style-one add-responsibility-btn">Add</button>
                                            </div>
                                        </div>

                                        <!-- Added Responsibilities List -->
                                        <div id="added-responsibilities">
                                            <h4>Added Responsibilities:</h4>
                                            <ul class="list-style-three"></ul>
                                        </div>

                                        <div class="post-job-steps">
                                            <div class="step">
                                                <span class="icon flaticon-pin"></span>
                                                <h5>Location</h5>
                                            </div>
                                        </div>

                                        <!-- Input - Country -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Country</label>
                                            <select id="country" class="chosen-selec"
                                                data-placeholder="Select Country" name="country_id" required>
                                                <option value=""></option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Input - State -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>State</label>
                                            <select id="state" class="chosen-selec" name="state_id" required>
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <!-- Input - City -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>City</label>
                                            <select id="city" class="chosen-selec" name="city_id" required>
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <!-- Input - Zip Code -->
                                        <div class="form-group col-lg-6 col-md-12">
                                            <label>Zip Code</label>
                                            <input type="text" name="zip_code" placeholder="Enter zip code"
                                                required>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button type="submit" class="theme-btn btn-style-one">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @section('js')
        <script type="text/javascript">
            $(window).on('load', function() {
                var maxResponsibilities = 10; // Máximo número de responsabilidades permitidas
                var responsibilityCount = 0; // Contador de responsabilidades agregadas
                var responsibilities = []; // Arreglo para almacenar las responsabilidades

                // Evento click para agregar responsabilidad
                $('.add-responsibility-btn').click(function() {
                    if (responsibilityCount < maxResponsibilities) {
                        var responsibilityText = $(this).siblings('.responsibility-text').val().trim();

                        if (responsibilityText !== '') {
                            responsibilities.push(responsibilityText); // Agregar responsabilidad al arreglo

                            var listItem = $('<li>').text(responsibilityText);
                            $('#added-responsibilities ul').append(listItem);

                            // Limpiar campo de entrada
                            $(this).siblings('.responsibility-text').val('');

                            responsibilityCount++;

                            if (responsibilityCount === maxResponsibilities) {
                                // Deshabilitar el botón "Add" si se alcanza el máximo de responsabilidades
                                $('.add-responsibility-btn').prop('disabled', true);
                            }
                        }
                    }
                });

                // Enviar responsabilidades al campo oculto antes de enviar el formulario
                $('form').submit(function() {
                    $('#responsibilities-input').val(JSON.stringify(responsibilities));
                });



                // When the country select element changes, retrieve states for the selected country and fill the state select element
                $('#country').change(function() {
                    var countryId = $(this).val();

                    $.ajax({
                        url: "{{ route('api.states_by_country', '') }}" + "/" + countryId,
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
                        url: "{{ route('api.cities_by_state', '') }}" + "/" + stateId,
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
                    select.append($('<option>').val('').text('--Select ' + displaySelectName + '--'));
                    // Loop through the data and add options to the select element
                    for (var i = 0; i < data.length; i++) {
                        var dato = data[i];
                        select.append($('<option>').val(dato[idData]).text(dato[nameValue]));
                    }
                }

            });
        </script>
    @endsection

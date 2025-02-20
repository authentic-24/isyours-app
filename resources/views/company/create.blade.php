@extends('layouts/app')

@section('content')
    @include('partials/errors_div')

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Company Profile</h1>
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

                            <form class="default-form" action="{{ isset($company) ? route('edit_company_profile') : route('create_company_profile') }}" method="post">
                                @csrf
                                @if(isset($company))
                                    <input type="hidden" name="id" id="id" value="{{$company->id}}">
                                @endif
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Company name</label>
                                        <input type="text" name="name" placeholder="Company Name" value="{{ isset($company) ? $company->name : old('name') }}" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Email address</label>
                                        <input type="email" name="email" placeholder="" value="{{ isset($company) ? $company->email : old('email') }}" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Phone</label>
                                        <input type="text" name="phone" placeholder="" value="{{ isset($company) ? $company->phone : old('phone') }}" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Website</label>
                                        <input type="text" name="website" value="{{ isset($company) ? $company->website : old('website') }}" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>LLC</label>
                                        <input type="text" name="llc" value="{{ isset($company) ? $company->llc : old('llc') }}" placeholder="">
                                    </div>

                                    <!-- Search Select -->
                                    {{-- <div class="form-group col-lg-6 col-md-12">
                                            <label>Multiple Select boxes </label>
                                            <select data-placeholder="Categories" class="chosen-select multiple" multiple
                                                tabindex="4">
                                                <option value="Banking">Banking</option>
                                                <option value="Digital&Creative">Digital & Creative</option>
                                                <option value="Retail">Retail</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Management">Management</option>
                                            </select>
                                        </div> --}}

                                    <!-- Input -->
                                    {{-- <div class="form-group col-lg-6 col-md-12">
                                            <label>Allow In Search & Listing</label>
                                            <select name="is_allow_search" class="chosen-select">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div> --}}

                                    <!-- About Company -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>About Company</label>
                                        <textarea name="about" placeholder="" required>{{ isset($company) ? $company->about : old('about') }}</textarea>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
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

@extends('layouts.app_home')

@section('content')
    <!-- Banner Section-->
    <section class="banner-section -type-13">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-7">
                    <div class="inner-column">
                        <div class="title-box wow fadeInUp" data-wow-delay="300ms">
                            <h3>{{ __('home.title') }}</h3>
                            <div class="text"><strong>We are at the forefront of promoting visibility for Migrant Workers,
                                    Refugees, and Diversity and Inclusion groups, connecting Women migrants and refugees.</strong></div>
                            <div class="text">Find Your Perfect HoReCa Job Match!</div>
                        </div>

                        <!-- Job Search Form -->
                        <div class="job-search-form wow fadeInUp" data-wow-delay='600ms'>
                            <form method="get" action="{{ route('web_login') }}">
                                <div class="row">
                                    <!-- Form Group -->
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                        <span class="icon flaticon-search-1"></span>
                                        <input type="text" name="field_name"
                                            placeholder="Job title, keywords, or company">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                                        <span class="icon flaticon-map-locator"></span>
                                        <input type="text" name="field_name" placeholder="City or postcode">
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group col-lg-3 col-md-12 col-sm-12 category">
                                        <span class="icon flaticon-briefcase"></span>
                                        <select class="chosen-select">
                                            <option value="">All Categories</option>
                                            <option value="44">Hotels</option>
                                            <option value="106">Restaurants</option>
                                            <option value="46">Catering</option>
                                        </select>
                                    </div>

                                    <!-- Form Group -->
                                    <div class="form-group col-lg-2 col-md-12 col-sm-12 text-right">
                                        <button type="submit" class="theme-btn btn-style-two">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Job Search Form -->

                        <!-- Popular Search -->
                        <div class="popular-searches wow fadeInUp" data-wow-delay="900ms">
                            <span class="title">Popular Searches : </span>
                            <a href="#">Restaurant assistant</a>
                        </div>
                        <!-- End Popular Search -->

                        <div class="bottom-box wow fadeInUp" data-wow-delay="1500ms">
                            <div class="count-employers">
                                <a href="#works"><span class="title">How It Works?</span></a>
                                <a href="#works"><img src="{{ asset('images/home/horeca-header.png') }}"
                                        alt=""></a>
                            </div>
                            <a href="#" class="upload-cv"><span class="icon flaticon-confirm"></span> Complete Your
                                Profile</a>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-5 col-md-12">
                    <div class="image-box">
                        <figure class="main-image wow fadeIn anm" data-wow-delay="1200ms" data-speed-x="2"><img
                                src="{{ asset('images/home/waiter-1.png') }}" alt=""></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section-->

    <!-- Work Section -->
    <section class="work-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>HORECA</h2>
                <div class="text">Job for anyone, in any HORECA Sector</div>
            </div>

            <div class="row wow fadeInUp">
                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('images/home/hospitality.png') }}" alt="">
                        </figure>
                        <h5>Hotel</h5>
                        <p>Alliances with some Hotels.</p>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('images/home/restaurant.png') }}" alt=""></figure>
                        <h5>Restaurant</h5>
                        <p>Restaurants seraching for their workers.</p>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <figure class="image"><img src="{{ asset('images/home/catering.png') }}" alt=""></figure>
                        <h5>Catering</h5>
                        <p>There is an opportunity to work in Catering services.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Work employer Section -->

    <!-- How it works employer section -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sec-title text-center">
                        <h2 id="works">Are You Looking For Job Applicants?</h2>
                        <div class="text">Complete these 3 steps to star looking for the perfect applicant for your needs
                        </div>
                    </div>
                </div>
            </div>

            <div class="row grid-base wow fadeInUp">

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -red">
                                <a href="register.html">
                                    <span class="icon icon-contact"></span>
                                </a>
                            </div>
                            <h5>Register an account to start</h5>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -yellow">
                                <span class="icon icon-doc"></span>
                            </div>
                            <h5>Make payment</h5>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -blue">
                                <span class="icon icon-case"></span>
                            </div>
                            <h5>Publish your job offer</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How it works section -->

    <!-- How it works section -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sec-title text-center">
                        <h2 id="works">Are You Looking For A Job?</h2>
                        <div class="text">you just need to follow 3 steps to apply your next work</div>
                    </div>
                </div>
            </div>

            <div class="row grid-base wow fadeInUp">

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -blue">
                                <a href="register.html">
                                    <span class="icon icon-contact"></span>
                                </a>
                            </div>
                            <h5>Register an account to start</h5>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -red">
                                <span class="icon icon-doc"></span>
                            </div>
                            <h5>Complete your profile</h5>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap -yellow">
                                <span class="icon icon-case"></span>
                            </div>
                            <h5>Explore & Apply to a vacant</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How it works section -->

    <!-- Job Section -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row wow fadeInUp">
                <div class="featured-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-title text-center">
                        <h2 class="color-blue-dark fw-700">Latest Jobs</h2>
                        <div class="text">Know your worth and find the job that qualify your life</div>

                        <!-- <div class="mt-50">
                              <ul class="switchbox -horizontal">
                                <li>
                                  <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                    <span class="title">Freelance</span>
                                  </label>
                                </li>
                                <li>
                                  <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                    <span class="title">Full Time</span>
                                  </label>
                                </li>
                                <li>
                                  <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                    <span class="title">Internship</span>
                                  </label>
                                </li>
                              </ul>
                            </div>
                          </div> -->

                        <div class="outer-box job-block-five-separated">

                            <!-- Job Block -->
                            @foreach ($latest_offers as $offer)
                                <div class="job-block-five">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img
                                                    src="{{ asset('images/resource/company-logo/4-1.png') }}"
                                                    alt=""></span>
                                            <h4 style="text-align: left;"><a href="#">{{ $offer->job_level->name ?? '' }} / {{ $offer->job_title->name ?? '' }}</a></h4>
                                            <ul class="job-info mb-0">
                                                    <li><span class="icon flaticon-map-locator"></span>
                                                    {{ $offer->city->name ?? ''}}, {{ $offer->city->state->code ?? ''}}</li>
                                                <li><span class="icon flaticon-clock-3"></span>
                                                    {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}</li>
                                                <li><span class="icon flaticon-money"></span> ${{ $offer->rate ?? ' ' }}/hour </li>
                                            </ul>
                                        </div>
                                        <ul class="job-other-info">
                                            <li class="time mb-0">{{ $offer->job_type->name ?? '' }}</li>
                                        </ul>
                                        <a href="{{ route('web_login') }}" class="theme-btn btn-dark-blue">Apply Job</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div>

                            <hr />

                            <!-- Registeration Banners -->
                            <section class="layout-pt-60 layout-pb-60">
                                <div class="auto-container">
                                    <div class="row wow fadeInUp">
                                        <!-- Banner Style One -->
                                        <div class="banner-style-one -type-2 col-lg-6 col-md-12 col-sm-12">
                                            <div class="inner-box"
                                                style="background-image:url('{{ asset('images/index-13/banner/bg-1.png') }}">
                                                <div class="content">
                                                    <h3>Employers</h3>
                                                    <p>Sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt. Labore et dolore nostrud exercitation.</p>
                                                    <a href="#" class="theme-btn btn-style-five">Register
                                                        Account</a>
                                                </div>
                                                <figure class="image"><img src="{{ asset('images/home/employer.png') }}"
                                                        alt=""></figure>
                                            </div>
                                        </div>

                                        <!-- Banner Style Two -->
                                        <div class="banner-style-two -type-2 col-lg-6 col-md-12 col-sm-12">
                                            <div class="inner-box"
                                                style="background-image:url('{{ asset('images/index-13/banner/bg-2.png') }}">
                                                <div class="content">
                                                    <h3 class="color-dark-1">Applicants</h3>
                                                    <p class="color-dark-2">Sit amet, consectetur adipiscing elit, sed do
                                                        eiusmod tempor incididunt. Labore et dolore nostrud exercitation.
                                                    </p>
                                                    <a href="#"
                                                        class="theme-btn btn-style-five color-dark-1">Register Account</a>
                                                </div>
                                                <figure class="image"><img
                                                        src="{{ asset('images/home/candidate.png') }}" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Registeration Banners -->

                            <!-- Features Section -->
                            {{-- <section class="features-section">
        <div class="auto-container">
          <div class="sec-title">
            <h2>Featured Cities</h2>
            <div class="text">These are the common cities.</div>
          </div>
  
          <div class="row wow fadeInUp">
            <div class="column col-lg-4 col-md-6 col-sm-12">
              <!-- Feature Block -->
              <div class="feature-block">
                <div class="inner-box">
                  <figure class="image"><img src="{{ asset('images/resource/featured-1.png')}}" alt=""></figure>
                  <div class="overlay-box">
                    <div class="content">
                      <h5>Miami</h5>
                      <span class="total-jobs">12 Jobs</span>
                      <a href="job-list-v1.html" class="overlay-link"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="column col-lg-4 col-md-6 col-sm-12">
              <!-- Feature Block -->
              <div class="feature-block">
                <div class="inner-box">
                  <figure class="image"><img src="{{ asset('images/resource/featured-2.png')}}" alt=""></figure>
                  <div class="overlay-box">
                    <div class="content">
                      <h5>Tampa</h5>
                      <span class="total-jobs">12 Jobs</span>
                      <a href="job-list-v1.html" class="overlay-link"></a>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Feature Block -->
              <div class="feature-block">
                <div class="inner-box">
                  <figure class="image"><img src="{{ asset('images/resource/featured-4.png')}}" alt=""></figure>
                  <div class="overlay-box">
                    <div class="content">
                      <h5>Orlando</h5>
                      <span class="total-jobs">12 Jobs</span>
                      <a href="job-list-v1.html" class="overlay-link"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  
  
            <div class="feature-block col-lg-4 col-md-6 col-sm-12">
  
              <!-- Feature Block -->
              <div class="feature-block">
                <div class="inner-box">
                  <figure class="image"><img src="{{ asset('images/resource/featured-3.png')}}" alt=""></figure>
                  <div class="overlay-box">
                    <div class="content">
                      <h5>Miami</h5>
                      <span class="total-jobs">12 Jobs</span>
                      <a href="job-list-v1.html" class="overlay-link"></a>
                    </div>
                  </div>
                </div>
              </div>
  
              <!-- Feature Block -->
              <div class="feature-block">
                <div class="inner-box">
                  <figure class="image"><img src="{{ asset('images/resource/featured-5.png')}}" alt=""></figure>
                  <div class="overlay-box">
                    <div class="content">
                      <h5>Tampa</h5>
                      <span class="total-jobs">12 Jobs</span>
                      <a href="job-list-v1.html" class="overlay-link"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
    </section>
    <!-- End Features Section -->
@endsection

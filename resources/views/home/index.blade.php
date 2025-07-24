@extends('layouts.app_home')

@section('content')
    <!-- Banner Section-->
    <section class="banner-section -type-13">
        <div class="banner-overlay"></div>
        <div class="floating-elements">
            <div class="floating-circle circle-1"></div>
            <div class="floating-circle circle-2"></div>
            <div class="floating-circle circle-3"></div>
        </div>
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-12">
                    <div class="inner-column">
                        <div class="title-box wow fadeInUp" data-wow-delay="300ms">
                            <div class="subtitle-badge">
                                <span class="icon flaticon-star"></span>
                                Your Dream Career Starts Here
                            </div>
                            <h3 class="main-title">We Connect Stories With Job <span class="highlight-text">Opportunities</span></h3>
                            <div class="text description-text">
                                <strong>We are at the forefront of promoting the visibility of workers, focusing on diversity and inclusion groups, connecting women.</strong>
                            </div>
                            <div class="text cta-text">
                                <span class="highlight-badge">Find your perfect job in HoReCa!</span>
                            </div>
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
                            <div class="search-tags">
                                <a href="#" class="search-tag">Restaurant assistant</a>
                                <a href="#" class="search-tag">Chef</a>
                                <a href="#" class="search-tag">Waiter</a>
                                <a href="#" class="search-tag">Hotel Manager</a>
                            </div>
                        </div>
                        <!-- End Popular Search -->

                        <div class="bottom-box wow fadeInUp" data-wow-delay="1500ms">
                            <div class="count-employers">
                                <a href="#works" class="how-it-works-btn">
                                    <span class="icon flaticon-info"></span>
                                    <span class="title">How It Works?</span>
                                </a>
                                <a href="#works" class="horeca-preview">
                                    <img src="{{ asset('images/home/horeca-header.png') }}" alt="">
                                </a>
                            </div>
                            <a href="#" class="upload-cv enhanced-cta">
                                <span class="icon flaticon-confirm"></span> 
                                <span class="text">Complete Your Profile</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section-->

    <!-- Work Section -->
    <section class="work-section enhanced-work-section">
        <div class="background-decoration">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center enhanced-title">
                <div class="title-badge">
                    <span class="icon flaticon-briefcase"></span>
                    Sectors
                </div>
                <h2 class="main-heading">HORECA <span class="highlight-accent">Excellence</span></h2>
                <div class="text enhanced-subtitle">Discover job opportunities for anyone, in any HORECA Sector</div>
                <div class="title-decoration">
                    <span class="decoration-line"></span>
                    <span class="decoration-dot"></spa  n>
                    <span class="decoration-line"></span>
                </div>
            </div>

            <div class="row wow fadeInUp enhanced-grid">
                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12 d-flex">
                    <div class="inner-box enhanced-card w-100">
                        <div class="card-decoration"></div>
                        <figure class="image enhanced-image">
                            <img src="{{ asset('images/home/hospitality.png') }}" alt="">
                            <div class="image-overlay"></div>
                        </figure>
                        <div class="content-area">
                            <h5 class="card-title">Hotel</h5>
                            <p class="card-description">Strategic alliances with premium Hotels worldwide.</p>
                            <div class="card-stats">
                                <span class="stat-item">
                                    <span class="number">150+</span>
                                    <span class="label">Partners</span>
                                </span>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <span class="explore-btn">Explore Opportunities</span>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box enhanced-card">
                        <div class="card-decoration"></div>
                        <figure class="image enhanced-image">
                            <img src="{{ asset('images/home/restaurant.png') }}" alt="">
                            <div class="image-overlay"></div>
                        </figure>
                        <div class="content-area">
                            <h5 class="card-title">Restaurant</h5>
                            <p class="card-description">Top restaurants actively searching for talented workers.</p>
                            <div class="card-stats">
                                <span class="stat-item">
                                    <span class="number">300+</span>
                                    <span class="label">Positions</span>
                                </span>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <span class="explore-btn">Explore Opportunities</span>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="work-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box enhanced-card">
                        <div class="card-decoration"></div>
                        <figure class="image enhanced-image">
                            <img src="{{ asset('images/home/catering.png') }}" alt="">
                            <div class="image-overlay"></div>
                        </figure>
                        <div class="content-area">
                            <h5 class="card-title">Catering</h5>
                            <p class="card-description">Exciting opportunities to work in premium Catering services.</p>
                            <div class="card-stats">
                                <span class="stat-item">
                                    <span class="number">200+</span>
                                    <span class="label">Events</span>
                                </span>
                            </div>
                        </div>
                        <div class="hover-overlay">
                            <span class="explore-btn">Explore Opportunities</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work employer Section -->

    <!-- How it works employer section -->
    <section class="how-it-works-section employer-section">
        <div class="background-pattern">
            <div class="pattern-shape shape-1"></div>
            <div class="pattern-shape shape-2"></div>
            <div class="pattern-shape shape-3"></div>
        </div>
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-title text-center enhanced-title">
                        <div class="title-badge employer-badge">
                            <span class="icon flaticon-briefcase"></span>
                            For Employers
                        </div>
                        <h2 class="main-heading" id="works">Are You Looking For Job Applicants?</h2>
                        <div class="text enhanced-subtitle">
                            Complete these 3 steps to start looking for the perfect applicant for your needs
                        </div>
                        <div class="title-decoration">
                            <span class="decoration-line"></span>
                            <span class="decoration-dot"></span>
                            <span class="decoration-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row enhanced-steps-grid wow fadeInUp">

                <!-- Work Block 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card employer-step">
                        <div class="step-number">
                            <span class="number">01</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon register-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Register an account to start</h4>
                        </div>
                        <div class="step-cta">
                            <a href="{{ route('web_register') }}" class="step-btn register-btn">
                                <span class="text">Get Started</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Work Block 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card employer-step">
                        <div class="step-number">
                            <span class="number">02</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon payment-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Make payment</h4>
                        </div>
                        <div class="step-cta">
                            <a href="#" class="step-btn payment-btn">
                                <span class="text">Choose Plan</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Work Block 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card employer-step">
                        <div class="step-number">
                            <span class="number">03</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon publish-icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Publish your job offer</h4>
                        </div>
                        <div class="step-cta">
                            <a href="#" class="step-btn publish-btn">
                                <span class="text">Post Job</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How it works section -->

    <!-- How it works section -->
    <section class="how-it-works-section candidate-section">
        <div class="background-pattern">
            <div class="pattern-shape shape-1"></div>
            <div class="pattern-shape shape-2"></div>
            <div class="pattern-shape shape-3"></div>
        </div>
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sec-title text-center enhanced-title">
                        <div class="title-badge candidate-badge">
                            <span class="icon flaticon-user"></span>
                            For Job Seekers
                        </div>
                        <h2 class="main-heading">Are You Looking For A Job?</h2>
                        <div class="text enhanced-subtitle">
                            You just need to follow 3 steps to apply your next work
                        </div>
                        <div class="title-decoration">
                            <span class="decoration-line"></span>
                            <span class="decoration-dot"></span>
                            <span class="decoration-line"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row enhanced-steps-grid wow fadeInUp">

                <!-- Work Block 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card candidate-step">
                        <div class="step-number">
                            <span class="number">01</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon register-icon-candidate">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Register an account to start</h4>
                        </div>
                        <div class="step-cta">
                            <a href="{{ route('web_register') }}" class="step-btn register-btn-candidate">
                                <span class="text">Get Started</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Work Block 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card candidate-step">
                        <div class="step-number">
                            <span class="number">02</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon profile-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Complete your profile</h4>
                        </div>
                        <div class="step-cta">
                            <a href="#" class="step-btn profile-btn">
                                <span class="text">Build Profile</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Work Block 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="step-card candidate-step">
                        <div class="step-number">
                            <span class="number">03</span>
                        </div>
                        <div class="step-icon-wrapper">
                            <div class="step-icon apply-icon">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                        <div class="step-content">
                            <h4 class="step-title">Explore & Apply to a vacant</h4>
                        </div>
                        <div class="step-cta">
                            <a href="#" class="step-btn apply-btn">
                                <span class="text">Find Jobs</span>
                                <span class="arrow">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- How it works section -->

    <!-- Job Section -->
    <section class="latest-jobs-section">
        <div class="background-decoration">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
        </div>
        <div class="auto-container">
            <div class="row wow fadeInUp">
                <div class="featured-column col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="sec-title text-center enhanced-title">
                        <div class="title-badge jobs-badge">
                            <span class="icon flaticon-search"></span>
                            Latest Opportunities
                        </div>
                        <h2 class="main-heading">Latest <span class="highlight-text">Jobs</span></h2>
                        <div class="text enhanced-subtitle">Know your worth and find the job that qualify your life</div>
                        <div class="title-decoration">
                            <span class="decoration-line"></span>
                            <span class="decoration-dot"></span>
                            <span class="decoration-line"></span>
                        </div>
                    </div>

                    <div class="jobs-container">
                        <div class="outer-box job-block-five-separated enhanced-jobs-list">

                            <!-- Job Block -->
                            @foreach ($latest_offers as $offer)
                                <div class="job-block-five enhanced-job-card">
                                    <div class="inner-box">
                                        <div class="job-card-decoration"></div>
                                        <div class="content">
                                            <span class="company-logo enhanced-logo">
                                                <img src="{{ asset('images/resource/company-logo/4-1.png') }}" alt="">
                                            </span>
                                            <h4 class="job-title"><a href="#">{{ $offer->job_level->name ?? '' }} / {{ $offer->job_title->name ?? '' }}</a></h4>
                                            <ul class="job-info mb-0">
                                                <li class="location-info">
                                                    <span class="icon flaticon-map-locator"></span>
                                                    {{ $offer->city->name ?? ''}}, {{ $offer->city->state->code ?? ''}}
                                                </li>
                                                <li class="time-info">
                                                    <span class="icon flaticon-clock-3"></span>
                                                    @if (isset($offer->created_at))
                                                        {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </li>
                                                <li class="salary-info">
                                                    <span class="icon flaticon-money"></span> 
                                                    ${{ $offer->rate ?? ' ' }}/hour
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="job-actions">
                                            <ul class="job-other-info">
                                                <li class="job-type-badge">{{ $offer->job_type->name ?? '' }}</li>
                                            </ul>
                                            <a href="{{ route('web_login') }}" class="apply-btn enhanced-apply-btn">
                                                <span class="text">Apply Job</span>
                                                <span class="arrow">→</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
                                                    <a href="{{ route('web_register') }}" class="theme-btn btn-style-five">Register
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
                                                    <a href="{{ route('web_register') }}"
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

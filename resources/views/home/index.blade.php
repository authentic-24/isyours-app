@extends('layouts.app_home')

@section('content')
    <!-- Banner Section-->
    <section class="banner-section -type-15" style="background-image: url('{{ asset('images/index-15/header/bg.png') }}');">
        <div class="auto-container">
            <div class="cotnent-box">
                <div class="title-box wow fadeInUp" data-wow-delay="300ms">
                    <h3 class="main-title">Join us & Explore Thousands of <span class="">Jobs</span></h3>
                    <div class="text description-text">
                        Find Jobs, Employment & Career Opportunities
                    </div>
                    <div class="text cta-text">
                        <span class="">Find your perfect job in HoReCa!</span>
                    </div>
                </div>

                <!-- Job Search Form -->
                <div class="job-search-form wow fadeInUp" data-wow-delay='600ms'>
                    <form method="get" action="{{ route('web_login') }}">
                        <div class="row">
                            <!-- Form Group -->
                            <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                <span class="icon flaticon-search-1"></span>
                                <input type="text" name="job_search" placeholder="Job title, keywords, or company">
                            </div>

                            <!-- Form Group -->
                            <div class="form-group col-lg-3 col-md-12 col-sm-12 location">
                                <span class="icon flaticon-map-locator"></span>
                                <input type="text" name="location_search" placeholder="City or postcode">
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
                                <button type="submit" class="theme-btn btn-style-two">Find Jobs</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Job Search Form -->

                <!-- Fun Fact Section -->
                <div class="fun-fact-section">
                    <div class="row">
                        <!--Column-->
                        <div class="counter-column col-lg-auto col-md-6 col-sm-6 wow fadeInUp">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="97216">0</span></div>
                            <h4 class="counter-title">Jobs</h4>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-auto col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="400ms">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="4782">0</span></div>
                            <h4 class="counter-title">Members</h4>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-auto col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="800ms">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="5322">0</span></div>
                            <h4 class="counter-title">Resume</h4>
                        </div>

                        <!--Column-->
                        <div class="counter-column col-lg-auto col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="1200ms">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="6329">0</span></div>
                            <h4 class="counter-title">Company</h4>
                        </div>
                    </div>
                </div>
                <!-- Fun Fact Section -->
            </div>
        </div>
    </section>
    <!-- End Banner Section-->

    <!-- Work Section -->
    <section class="">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>HORECA Excellence</h2>
                <div class="text">Discover job opportunities for anyone, in any HORECA Sector</div>
            </div>

            <div class="row pt-50">
                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="{{ asset('images/home/hospitality.png') }}" alt="">
                            </figure>
                            <h5>Hotel</h5>
                            <p>Strategic alliances with premium Hotels worldwide.</p>
                            <div class="text-muted">150+ Partners</div>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="{{ asset('images/home/restaurant.png') }}" alt="">
                            </figure>
                            <h5>Restaurant</h5>
                            <p>Top restaurants actively searching for talented workers.</p>
                            <div class="text-muted">300+ Positions</div>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="{{ asset('images/home/catering.png') }}" alt="">
                            </figure>
                            <h5>Catering</h5>
                            <p>Exciting opportunities to work in premium Catering services.</p>
                            <div class="text-muted">200+ Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work employer Section -->

    <!-- Work Section (Index-15 Style) -->
    <section class="">
        <div class="auto-container">
            <div class="row grid-base wow fadeInUp">

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-case"></span>
                            </div>
                            <h5>Register an account<br> to start</h5>
                            <p>Join our HoReCa platform and start your journey to find the perfect job opportunity.</p>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-contact"></span>
                            </div>
                            <h5>Explore over thousands<br> of job offers</h5>
                            <p>Discover amazing opportunities in Hotels, Restaurants and Catering worldwide.</p>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-3 mb-0">
                        <div class="inner-box">
                            <div class="icon-wrap">
                                <span class="icon icon-doc"></span>
                            </div>
                            <h5>Find the most suitable<br> position</h5>
                            <p>Match your skills with the best HoReCa employers and advance your career.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Work Section -->

    <!-- Job Section -->
    <section class="layout-pt-60 layout-pb-120">
        <div class="auto-container">
            <div class="sec-title text-center mb-0">
                <h2>Jobs of the day</h2>
                <div class="text">Know your worth and find the job that qualify your life</div>
            </div>

            <div class="default-tabs pt-50 tabs-box">
                <!--Tabs Box-->
                <div class="tab-buttons-wrap">
                    <ul class="tab-buttons -pills-condensed">
                        <li class="tab-btn" data-tab="#tab1">Popular</li>
                        <li class="tab-btn active-btn" data-tab="#tab2">Recent</li>
                        <li class="tab-btn" data-tab="#tab3">Featured</li>
                    </ul>
                </div>

                <div class="tabs-content pt-50 wow fadeInUp">
                    <!--Tab-->
                    <div class="tab" id="tab1">
                        <div class="row">
                            @foreach ($latest_offers as $offer)
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="{{ asset('images/resource/company-logo/4-1.png') }}" alt=""></span>
                                            <h4 class="job-title"><a href="{{ route('web.offer.show', ['id' => $offer->id]) }}">{{ $offer->job_level_name ?? '' }} / {{ $offer->job_title_name ?? '' }}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> HoReCa</li>
                                                <li><span class="icon flaticon-map-locator"></span> {{ $offer->city->name ?? ''}}, {{ $offer->city->state->code ?? ''}}</li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    @if (isset($offer->created_at))
                                                        {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </li>
                                                <li><span class="icon flaticon-money"></span> ${{ $offer->rate ?? ' ' }}/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">{{ $offer->job_type->name ?? 'Full Time' }}</li>
                                                <li class="privacy">{{ $offer->job_level->name ?? 'Private' }}</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab active-tab" id="tab2">
                        <div class="row">
                            @foreach ($latest_offers as $offer)
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="{{ asset('images/resource/company-logo/4-1.png') }}" alt=""></span>
                                            <h4 class="job-title"><a href="{{ route('web.offer.show', ['id' => $offer->id]) }}">{{ $offer->job_level_name ?? '' }} / {{ $offer->job_title_name ?? '' }}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> HoReCa</li>
                                                <li><span class="icon flaticon-map-locator"></span> {{ $offer->city->name ?? ''}}, {{ $offer->city->state->code ?? ''}}</li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    @if (isset($offer->created_at))
                                                        {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </li>
                                                <li><span class="icon flaticon-money"></span> ${{ $offer->rate ?? ' ' }}/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">{{ $offer->job_type->name ?? 'Full Time' }}</li>
                                                <li class="privacy">{{ $offer->job_level->name ?? 'Private' }}</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!--Tab-->
                    <div class="tab" id="tab3">
                        <div class="row">
                            @foreach ($latest_offers as $offer)
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo enhanced-logo"><img src="{{ asset('images/resource/company-logo/4-1.png') }}" alt=""></span>
                                            <h4 class="job-title"><a href="{{ route('web.offer.show', ['id' => $offer->id]) }}">{{ $offer->job_level_name ?? '' }} / {{ $offer->job_title_name ?? '' }}</a></h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> HoReCa</li>
                                                <li><span class="icon flaticon-map-locator"></span> {{ $offer->city->name ?? ''}}, {{ $offer->city->state->code ?? ''}}</li>
                                                <li><span class="icon flaticon-clock-3"></span> 
                                                    @if (isset($offer->created_at))
                                                        {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </li>
                                                <li><span class="icon flaticon-money"></span> ${{ $offer->rate ?? ' ' }}/hour</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">{{ $offer->job_type->name ?? 'Full Time' }}</li>
                                                <li class="privacy">{{ $offer->job_level->name ?? 'Private' }}</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                            <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Job Section -->

    <!-- Call To Action Two -->
    <section class="call-to-action-two overlay-black-60" style="background-image: url('{{ asset('images/index-15/cta/bg.png') }}');">
        <div class="auto-container wow fadeInUp">
            <div class="row grid-base justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="sec-title light text-center">
                        <h2 class="text-white">Make Recruiting Your Competitive Advantage in HoReCa</h2>
                        <div class="text text-white">IsYours offers a way to completely optimize your entire recruiting process in Hotels, Restaurants and Catering. Find better candidates, conduct more focused interviews, and make data-driven hiring decisions.</div>
                    </div>

                    <div class="btn-box">
                        <a href="{{ route('web_register') }}" class="theme-btn btn-white-type-2">GET STARTED</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action -->

    <!-- Top Companies -->
    <section class="">
        <div class="auto-container">
            <div class="row justify-content-between align-items-end">
                <div class="col-lg-6">
                    <div class="sec-title mb-0">
                        <h2>Top HoReCa Companies Registered</h2>
                        <div class="text">Some of the top Hotels, Restaurants and Catering companies we've helped recruit excellent applicants over the years.</div>
                    </div>
                </div>

                {{-- <div class="col-auto">
                    <a href="#" class="link">Browse <span class="fa fa-angle-right"></span></a>
                </div> --}}
            </div>

            <div class="carousel-outer pt-50 wow fadeInUp">
                <div class="companies-carousel owl-carousel owl-theme default-dots">
                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #007bff; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">HOTEL</div>
                            </figure>
                            <h4 class="name">Hotel Excellence</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Miami, FL</div>
                            <a href="#" class="theme-btn btn-style-one">15 Open Position</a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #28a745; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">REST</div>
                            </figure>
                            <h4 class="name">Restaurant Group</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> New York, NY</div>
                            <a href="#" class="theme-btn btn-style-one">22 Open Position</a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #ffc107; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">CAT</div>
                            </figure>
                            <h4 class="name">Catering Plus</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Los Angeles, CA</div>
                            <a href="#" class="theme-btn btn-style-one">18 Open Position</a>
                        </div>
                    </div>

                    <!-- Company Block -->
                    <div class="company-block">
                        <div class="inner-box">
                            <figure class="image">
                                <div style="width: 80px; height: 60px; background-color: #dc3545; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; margin: 0 auto;">LUX</div>
                            </figure>
                            <h4 class="name">Luxury Hotels</h4>
                            <div class="location"><i class="flaticon-map-locator"></i> Las Vegas, NV</div>
                            <a href="#" class="theme-btn btn-style-one">25 Open Position</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Top Companies -->

    <!-- Features Section -->
    <section class="">
        <div class="auto-container">
            <div class="sec-title-outer">
                <div class="sec-title">
                    <h2>Featured Cities</h2>
                    <div class="text">Discover HoReCa opportunities in top destinations worldwide</div>
                </div>
                <a href="#" class="link">Browse All Locations <span class="fa fa-angle-right"></span></a>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('images/index-15/cities/1.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Miami</h5>
                                    <span class="total-jobs">120 Jobs</span>
                                    <a href="{{ route('web_login') }}" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('images/index-15/cities/2.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>New York</h5>
                                    <span class="total-jobs">89 Jobs</span>
                                    <a href="{{ route('web_login') }}" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('images/index-15/cities/3.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Los Angeles</h5>
                                    <span class="total-jobs">156 Jobs</span>
                                    <a href="{{ route('web_login') }}" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <!-- Feature Block -->
                    <div class="feature-block">
                        <div class="inner-box">
                            <figure class="image"><img src="{{ asset('images/index-15/cities/4.png') }}" alt=""></figure>
                            <div class="overlay-box">
                                <div class="content">
                                    <h5>Las Vegas</h5>
                                    <span class="total-jobs">78 Jobs</span>
                                    <a href="{{ route('web_login') }}" class="overlay-link"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Features Section -->

    <!-- Testimonials Section -->
    <section class="layout-pt-60 layout-pb-120">
        <div class="auto-container">
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <div class="">
                        <h2>What people are saying</h2>
                        <div class="text mt-9">Success stories from HoReCa professionals who found their dream jobs through our platform.</div>
                    </div>
                </div>
            </div>

            <div class="job-carousel pt-50 wow fadeInUp owl-carousel owl-theme default-dots">

                <!-- Testimonial Block -->
                <div class="">
                    <div class="testimonial -type-2 text-center">
                        <div class="image">
                            <img class="mx-auto" src="{{ asset('images/index-12/testimonials/1.png') }}" alt="image">
                        </div>

                        <div class="content">
                            <h4>Perfect Platform</h4>
                            <p>Found my dream job as a chef in a 5-star hotel through IsYours. The platform is user-friendly and connects you with amazing opportunities!</p>
                        </div>

                        <div class="author">
                            <div class="name">Maria Rodriguez</div>
                            <div class="job">Executive Chef, Luxury Resort</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Block -->
                <div class="">
                    <div class="testimonial -type-2 text-center">
                        <div class="image">
                            <img class="mx-auto" src="{{ asset('images/index-12/testimonials/2.png') }}" alt="image">
                        </div>

                        <div class="content">
                            <h4>Great Experience</h4>
                            <p>As a restaurant manager, I've hired several excellent candidates through IsYours. The quality of applicants is outstanding!</p>
                        </div>

                        <div class="author">
                            <div class="name">John Anderson</div>
                            <div class="job">Restaurant Manager, Fine Dining</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Block -->
                <div class="">
                    <div class="testimonial -type-2 text-center">
                        <div class="image">
                            <img class="mx-auto" src="{{ asset('images/index-12/testimonials/3.png') }}" alt="image">
                        </div>

                        <div class="content">
                            <h4>Highly Recommended</h4>
                            <p>Started as a server and now I'm an assistant manager thanks to the career opportunities I found on IsYours. Amazing platform!</p>
                        </div>

                        <div class="author">
                            <div class="name">Sarah Johnson</div>
                            <div class="job">Assistant Manager, Hotel Chain</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Testimonials Section -->

    <!-- Subscribe Section -->
    <section class="subscribe-section-two -type-4">
        <div class="background-image" style="background-image: url('{{ asset('images/index-15/cta-2/bg.png') }}');"></div>
        <div class="auto-container wow fadeInUp">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 col-md-10">
                    <div class="sec-title light mb-0 pb-20">
                        <h2 class="text-white">Get Matched With The Most Valuable HoReCa Jobs</h2>
                        <div class="text text-white">Join thousands of professionals who have found their perfect career in Hotels, Restaurants and Catering. Upload your CV and let employers find you!</div>

                        <div class="mt-20">
                            <a href="{{ route('web_register') }}" class="btn-cv">
                                <i class="icon fa fa-file-upload"></i>
                                Upload Your CV
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 md:mt-30">
                    <div class="image">
                        <img src="{{ asset('images/index-15/cta-2/1.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- Registeration Banners -->
    <section class="">
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

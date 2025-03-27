@extends('layouts.app_home')

@section('content')
<br>
<br>
<br>
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>About Us</h1>
            </div>
        </div>
    </section>
    <!-- About Section Three -->
    <section class="about-section-three">
        <div class="text-box">
            <h4>About Is Yours</h4>
            <h3>Our solution:</h3>
            <p>We are a scalable digital platform based on emerging technological solutions that, 
                through mobile devices, connect companies with individuals seeking a service and/or 
                vacancy, including diverse and inclusive groups</p>

            <h3>Problem:</h3>
            <p>We aim to highlight the workforce within its major diverse and inclusive groups, 
                connecting occupations with opportunities through an agile digital platform, 
                enabling them to find employment in the hospitality, gastronomy-bar, and restaurant sector.
            <p>

            <blockquote class="blockquote-style-one">Diversity, inclusion, fairness, pillars of sustainability, corporate
                social responsibility; a
                central issue on the agendas of the organizational world.</blockquote>
        </div>
    </section>
    <!-- End About Section Three -->

    <!-- team section 1 -->
    <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="sec-title text-center">
                        <h2 id="works">Meet The Team</h2>
                        <div class="text">We are a multi-skill workteam that love what we do</div>
                    </div>
                </div>
            </div>


            <div class="row grid-base wow fadeInUp">

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset('images/index-11/clients/1.svg') }}"
                                        alt=""></a></figure>
                            <h5>Angelica Santos</h5>
                            <p><strong>Founder</strong> psychologist, specialist in Human Management
                                and organizational development and coach. She worked for more than 12 years in
                                multinationals and multilatinas organizations in talent attraction and development of
                                the pharmaceutical sector. More than 9 years as an entrepreneur of Ingenios * Head
                                hunter and coach in middle and managerial positions. Since 2017 joined with 3 friends
                                and we are partners of Startup Authentic Team, for the Pharma and Health sector,
                                where we have the challenge of 22 thousand Colombians on the platform. During
                                2021 in association with Laura Mojica and Otoniel we developed YoSoy Platform for
                                Colombia.</p>
                        </div>
                    </div>
                </div>

                <!-- Work Block -->
                

                <!-- Work Block -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset('images/index-11/clients/1.svg') }}"
                                        alt=""></a></figure>
                            <h5>Otoniel Fonseca</h5>
                            <p>Systems Engineer, certified in Azure, Itil, AWS
                                Architecture and GCP courses with 12 years of experience in the technology area in
                                companies such as IBM, Accenture and Getronics, and 5 years driving digital
                                transformation in solutions that contribute and benefit the community such as
                                employability, banking and digital identity projects.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="work-block -type-2 mb-0">
                        <div class="inner-box">
                            <figure class="image-box"><a href="#"><img src="{{ asset('images/team/julian.jpg') }}"
                                        alt=""></a></figure>
                            <h5>Julian Andres Garnica</h5>
                            <p>Full Stack Developer, Systems engineer with more than 4 years of experience 
                                developing strategic, modern, and scalable software and technological solutions for businesses.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Team section 1 -->

    <!-- team section 2 -->
    {{-- <section class="layout-pt-60 layout-pb-60">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="row grid-base wow fadeInUp, row justify-content-center">

                    <!-- Work Block -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="work-block -type-2 mb-0">
                            <div class="inner-box">
                                <figure class="image-box"><a href="#"><img src="{{ asset('images/index-11/clients/1.svg') }}"
                                            alt=""></a></figure>
                                <h5>Julian Andres Garnica</h5>
                                <p>Full Stack Developer, Systems Engineer with 3 years of experience
                                    in the area of digital employability and education solutions development.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div> --}}
    </section>
    <!-- Team section 2 -->


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
@endsection

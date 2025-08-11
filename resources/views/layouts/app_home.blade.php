<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Is Yours - Perfect Match Jobs</title>

  <!-- Stylesheets -->
  <link href="{{ asset('css/bootstrap.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  
  <!-- Custom Font Style -->
  <style>
    body, h1, h2, h3, h4, h5, h6, p, span, div, a, li, td, th, input, button, select, textarea {
      font-family: 'Jost', sans-serif !important;
      font-style: normal !important;
      text-decoration: none !important;
    }
    
    /* Ensure no text decoration on links */
    a {
      text-decoration: none !important;
    }
    
    /* Remove any strikethrough effects */
    * {
      text-decoration-line: none !important;
    }
    
    /* Significantly reduce overall font sizes */
    body {
      font-size: 12px !important;
      line-height: 1.4 !important;
    }
    
    h1 {
      font-size: 1.6rem !important;
    }
    
    h2 {
      font-size: 1.4rem !important;
    }
    
    h3 {
      font-size: 1.2rem !important;
    }
    
    h4 {
      font-size: 1.1rem !important;
    }
    
    h5 {
      font-size: 1rem !important;
    }
    
    h6 {
      font-size: 0.9rem !important;
    }
    
    p {
      font-size: 12px !important;
    }
    
    /* WIDER LAYOUT - Extend content to sides (more balanced) */
    .auto-container {
      max-width: 1200px !important;
      padding: 0 30px !important;
    }
    
    /* Banner normal width (not wider) */
    .banner-section .auto-container {
      max-width: 1200px !important;
    }
    
    /* Banner background image settings */
    .banner-section {
      background-size: cover !important;
      background-position: center center !important;
      background-repeat: no-repeat !important;
    }
    
    /* Banner text sizes - make them larger */
    .banner-section h1 {
      font-size: 2.5rem !important;
      line-height: 1.2 !important;
    }
    
    .banner-section h2 {
      font-size: 2rem !important;
      line-height: 1.3 !important;
    }
    
    .banner-section p {
      font-size: 16px !important;
      line-height: 1.5 !important;
    }
    
    .banner-section .text {
      font-size: 16px !important;
    }
    
    .banner-section .banner-title {
      font-size: 2.5rem !important;
    }
    
    /* Specific banner text styling */
    .banner-section .banner-title,
    .banner-section .main-title,
    .banner-section .title {
      font-size: 3rem !important;
      font-weight: bold !important;
      line-height: 1.2 !important;
    }
    
    .banner-section .subtitle,
    .banner-section .banner-text,
    .banner-section .description {
      font-size: 1.2rem !important;
      line-height: 1.4 !important;
    }
    
    /* Banner specific elements - more specific selectors */
    .banner-section.-type-15 .title-box .subtitle-badge {
      font-size: 1.1rem !important;
      font-weight: 500 !important;
    }
    
    .banner-section.-type-15 .title-box .main-title,
    .banner-section.-type-15 .title-box h3.main-title {
      font-size: 2.5rem !important;
      font-weight: normal !important;
    }
    
    .banner-section.-type-15 .title-box .description-text,
    .banner-section.-type-15 .title-box .text.description-text {
      font-size: 1.2rem !important;
      font-weight: 600 !important;
    }
    
    .banner-section.-type-15 .title-box .cta-text,
    .banner-section.-type-15 .title-box .text.cta-text {
      font-size: 1.1rem !important;
      font-weight: 500 !important;
    }
    
    /* Fix excessive padding in banner content */
    .banner-section.-type-15 .cotnent-box {
      padding: 140px 0px 80px !important;
    }
    
    @media (max-width: 991px) {
      .banner-section.-type-15 .cotnent-box {
        padding: 80px 0px 40px !important;
      }
    }
    
    @media (max-width: 767px) {
      .banner-section.-type-15 .cotnent-box {
        padding: 60px 0px 30px !important;
      }
    }
    
    /* Images responsive and well-fitted */
    img {
      max-width: 100% !important;
      height: auto !important;
      object-fit: cover !important;
    }
    
    /* Company logos better sizing */
    .company-logo img,
    .company-block .image img {
      width: 80px !important;
      height: 60px !important;
      object-fit: contain !important;
      background-color: #f8f9fa !important;
      border: 1px solid #e9ecef !important;
      border-radius: 8px !important;
      padding: 10px !important;
    }
    
    /* Company block styling */
    .company-block .inner-box {
      text-align: center !important;
      padding: 20px !important;
      border: 1px solid #e9ecef !important;
      border-radius: 8px !important;
      background-color: white !important;
    }
    
    .company-block .image {
      margin-bottom: 15px !important;
    }
    
    /* City images full width */
    .feature-block .image img {
      width: 100% !important;
      height: 200px !important;
      object-fit: cover !important;
    }
    
    /* Header always with blue background */
    .main-header.-type-11 {
      background-color: #312783 !important;
    }
    
    /* HORECA section images better fitting */
    .work-block.-type-2 .image img {
      width: 50% !important;
      height: 200px !important;
      object-fit: cover !important;
      border-radius: 8px !important;
    }
    
    .work-block.-type-2 .inner-box {
      text-align: center !important;
      padding: 20px !important;
    }
    
    .work-block.-type-2 .image {
      margin-bottom: 20px !important;
      overflow: hidden !important;
      border-radius: 8px !important;
    }
    
    /* Fix form input text position and size */
    .job-search-form .form-group input[type="text"] {
      padding-left: 50px !important;
      font-size: 16px !important;
      color: #333 !important;
      font-weight: 500 !important;
    }
    
    .job-search-form .form-group select,
    .job-search-form .form-group .chosen-container .chosen-single {
      padding-left: 50px !important;
      font-size: 16px !important;
      color: #333 !important;
    }
    
    /* Position icons properly */
    .job-search-form .form-group .icon {
      position: absolute !important;
      left: 15px !important;
      top: 50% !important;
      transform: translateY(-50%) !important;
      z-index: 10 !important;
    }
    
    /* Work section images */
    .work-block .image img {
      width: 100% !important;
      height: 180px !important;
      object-fit: cover !important;
    }
    
    /* Testimonial images circular */
    .testimonial .image img {
      width: 80px !important;
      height: 80px !important;
      object-fit: cover !important;
      border-radius: 50% !important;
    }
    
    /* Banner text colors and much smaller sizes */
    .banner-section.-type-15 .title-box .subtitle-badge {
      color: #333 !important;
      font-size: 11px !important;
    }
    
    .banner-section.-type-15 .title-box .main-title {
      color: #333 !important;
      font-size: 1.8rem !important;
    }
    
    .banner-section.-type-15 .title-box .text {
      color: #666 !important;
      font-size: 13px !important;
    }
    
    .banner-section.-type-15 .title-box .highlight-text {
      color: #1967d2 !important;
    }
    
    .banner-section.-type-15 .title-box .highlight-badge {
      color: #fff !important;
      background: #1967d2 !important;
      font-size: 12px !important;
    }
    
    /* Fun fact section colors and smaller sizes */
    .banner-section.-type-15 .fun-fact-section .count-text {
      color: #333 !important;
      font-size: 1.5rem !important;
    }
    
    .banner-section.-type-15 .fun-fact-section .counter-title {
      color: #666 !important;
      font-size: 12px !important;
    }
    
    /* Section titles - much smaller */
    .sec-title h2 {
      font-size: 1.3rem !important;
    }
    
    /* Card titles - smaller */
    .card-title, .step-title, .job-title {
      font-size: 0.9rem !important;
    }
    
    /* General text in cards - smaller */
    .card-description, .step-content p, .job-info li {
      font-size: 11px !important;
    }
    
    /* Buttons - smaller */
    .theme-btn, .step-btn {
      font-size: 11px !important;
      padding: 8px 16px !important;
    }
    
    /* Form inputs - smaller */
    input, select, textarea {
      font-size: 12px !important;
      padding: 8px 12px !important;
    }
    
    /* Reduce section padding but keep wider */
    section {
      padding: 40px 0 !important;
    }
    
    /* Make banner section more compact */
    .banner-section {
      padding: 60px 0 !important;
    }
    
    /* Reduce spacing in title sections */
    .sec-title {
      margin-bottom: 30px !important;
    }
    
    /* Smaller work blocks but wider layout */
    .work-block .inner-box {
      padding: 20px !important;
    }
    
    /* Compact testimonials */
    .testimonial {
      padding: 15px !important;
    }
    
    /* Better spacing for cards */
    .row {
      margin: 0 -10px !important;
    }
    
    .row > [class*="col-"] {
      padding: 0 10px !important;
    }
    
    /* Subscribe section image better fit */
    .subscribe-section-two .image img {
      width: 100% !important;
      max-width: 400px !important;
      height: auto !important;
    }
    
    /* App section image */
    .image-column .image img {
      width: 100% !important;
      max-width: 500px !important;
      height: auto !important;
    }
    
    /* Subscribe section custom background - remove green, use app blue */
    
    
    /* Override any existing background image with our gradient */
    .subscribe-section-two.-type-4 .background-image {
      background: #312783 !important;
      background-image: none !important;
    }
    
    /* Make icon-wrap yellow for work-block type-3 */
    .work-block.-type-3 .icon-wrap {
      background-color: #FFD700 !important;
      border-radius: 50% !important;
      width: 80px !important;
      height: 80px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      margin: 0 auto 20px !important;
    }
    
    .work-block.-type-3 .icon-wrap .icon {
      color: white !important;
      font-size: 32px !important;
    }
    
    /* Scroll to top button - Override default display: none */
    .scroll-to-target,
    .scroll-to-top {
      position: fixed !important;
      bottom: 30px !important;
      right: 30px !important;
      width: 50px !important;
      height: 50px !important;
      background-color: #312783 !important;
      color: white !important;
      border-radius: 50% !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 20px !important;
      z-index: 9999 !important;
      cursor: pointer !important;
      transition: all 0.3s ease !important;
      box-shadow: 0 4px 12px rgba(49, 39, 131, 0.3) !important;
      opacity: 1 !important;
      visibility: visible !important;
      line-height: 1 !important;
      text-align: center !important;
    }
    
    .scroll-to-target:hover,
    .scroll-to-top:hover {
      background-color: #1967d2 !important;
      color: white !important;
      transform: translateY(-2px) !important;
      box-shadow: 0 6px 20px rgba(49, 39, 131, 0.4) !important;
    }
    
    .scroll-to-target span,
    .scroll-to-top span,
    .scroll-to-target .fa,
    .scroll-to-top .fa,
    .scroll-to-target .arrow-up,
    .scroll-to-top .arrow-up {
      color: white !important;
      font-size: 24px !important;
      font-weight: bold !important;
      display: inline-block !important;
      line-height: 1 !important;
    }
    
    /* Force visibility with highest specificity */
    body .scroll-to-target,
    body .scroll-to-top,
    div.scroll-to-target,
    div.scroll-to-top {
      display: flex !important;
      opacity: 1 !important;
      visibility: visible !important;
    }
  </style>

  <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">

  <!-- Responsive -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
  <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body data-anm=".anm">

  <div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

   @include('home/header')

   @yield('content')
  </div><!-- End Page Wrapper -->

    <!-- Main Footer -->
    @include('layouts/footer')
    <!-- End Main Footer -->




  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/logo.change.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/chosen.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
  <script src="{{ asset('js/jquery.modal.min.js') }}"></script>
  <script src="{{ asset('js/mmenu.polyfills.js') }}"></script>
  <script src="{{ asset('js/mmenu.js') }}"></script>
  <script src="{{ asset('js/appear.js') }}"></script>
  <script src="{{ asset('js/anm.min.js') }}"></script>
  <script src="{{ asset('js/ScrollMagic.min.js') }}"></script>
  <script src="{{ asset('js/rellax.min.js') }}"></script>
  <script src="{{ asset('js/owl.js') }}"></script>
  <script src="{{ asset('js/wow.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
<style>
.main-footer {
  background: #f8f9fa;
  color: #1a1a1a;
  padding: 50px 0 0 0;
  /* margin-top: 60px; */
  border-top: 1px solid #e5e5e5;
}

.main-footer .widgets-section {
  padding: 0 0 40px 0;
}

.main-footer .footer-widget h4.widget-title {
  color: #1a1a1a;
  font-size: 14px;
  font-weight: 600;
  margin-bottom: 20px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.main-footer .footer-widget p.address,
.main-footer .footer-widget .list li a,
.main-footer .footer-widget .phone-num a {
  color: #666666;
  font-size: 14px;
  transition: color 0.2s ease;
  text-decoration: none;
  line-height: 1.8;
}

.main-footer .footer-widget .list li a:hover,
.main-footer .footer-widget .phone-num a:hover {
  color: #1a1a1a;
}

.main-footer .footer-widget .list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.main-footer .footer-widget .list li {
  margin-bottom: 10px;
}

.main-footer .footer-widget .phone-num {
  margin-bottom: 10px;
}

.main-footer .footer-widget .phone-num i {
  margin-right: 8px;
  font-size: 14px;
}

.footer-bottom {
  background: #ffffff;
  padding: 25px 0;
  border-top: 1px solid #e5e5e5;
}

.footer-bottom .outer-box {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 20px;
}

.footer-bottom .copyright-text {
  color: #666666;
  font-size: 14px;
}

.footer-bottom .copyright-text a {
  color: #1a1a1a;
  font-weight: 600;
  text-decoration: none;
}

.footer-bottom .copyright-text a:hover {
  color: #333333;
}

.footer-bottom .social-links {
  display: flex;
  gap: 12px;
}

.footer-bottom .social-links a {
  width: 38px;
  height: 38px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f3f4f6;
  border-radius: 50%;
  color: #666666;
  font-size: 15px;
  transition: all 0.2s ease;
  text-decoration: none;
}

.footer-bottom .social-links a:hover {
  background: #1a1a1a;
  color: #ffffff;
}

@media (max-width: 767px) {
  .main-footer {
    margin-top: 40px;
    padding: 40px 0 0 0;
  }
  
  .footer-bottom .outer-box {
    flex-direction: column;
    text-align: center;
  }
  
  .main-footer .footer-column {
    margin-bottom: 30px;
  }
}
</style>

<footer class="main-footer">
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget">
                        <div class="logo" style="margin-bottom: 20px;">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-main.svg')}}" alt="Is Yours" style="max-width: 140px;">
                            </a>
                        </div>
                        <p class="address" style="margin-bottom: 0;">
                            {{ __('home.footer_description') }}
                        </p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-3 col-sm-6 footer-column">
                    <div class="footer-widget links-widget">
                        <h4 class="widget-title">{{ __('home.quick_links') }}</h4>
                        <ul class="list">
                            <li><a href="{{ route('home') }}">{{ __('home.home') }}</a></li>
                            <li><a href="{{ route('about') }}">{{ __('home.about_us') }}</a></li>
                            <li><a href="#">{{ __('home.find_jobs_link') }}</a></li>
                            <li><a href="#">{{ __('home.post_job') }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- For Candidates -->
                <div class="col-lg-2 col-md-3 col-sm-6 footer-column">
                    <div class="footer-widget links-widget">
                        <h4 class="widget-title">{{ __('home.for_candidates') }}</h4>
                        <ul class="list">
                            <li><a href="#">{{ __('home.browse_jobs') }}</a></li>
                            <li><a href="#">{{ __('home.career_advice') }}</a></li>
                            <li><a href="#">{{ __('home.faq') }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget">
                        <h4 class="widget-title">{{ __('home.contact_us') }}</h4>
                        <div class="phone-num">
                            <a href="mailto:hello@isyours.us"><i class="la la-envelope"></i> hello@isyours.us</a>
                        </div>
                        <div class="phone-num">
                            <a href="mailto:hola@isyours.us"><i class="la la-envelope"></i> hola@isyours.us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="outer-box">
                <div class="copyright-text">
                    &copy; {{ date('Y') }} <a href="{{ route('home') }}">Is Yours</a>. {{ __('home.all_rights_reserved') }}.
                </div>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
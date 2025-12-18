<style>
.main-footer.alternate5 {
  background: #ffffff;
  margin: 0 0 20px 0;
  border-radius: 12px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  overflow: hidden;
}

.main-footer .widgets-section {
  background: #f9fafb;
}

.main-footer .footer-widget h4.widget-title {
  color: #374151;
  font-size: 0.875rem;
  font-weight: 600;
  margin-bottom: 12px;
}

.main-footer .footer-widget p.address,
.main-footer .footer-widget .list li a,
.main-footer .footer-widget .phone-num a {
  color: #6b7280;
  font-size: 0.813rem;
  transition: color 0.3s ease;
  line-height: 1.6;
}

.main-footer .footer-widget .list li a:hover,
.main-footer .footer-widget .phone-num a:hover {
  color: #4f46e5;
}

.main-footer .footer-widget .list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.main-footer .footer-widget .list li {
  margin-bottom: 6px;
}

.footer-bottom {
  background: #ffffff;
}

.footer-bottom .outer-box {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 12px;
}

.footer-bottom .copyright-text {
  color: #6b7280;
  font-size: 0.813rem;
}

.footer-bottom .copyright-text a {
  color: #4f46e5;
  font-weight: 600;
}

.footer-bottom .social-links {
  display: flex;
  gap: 8px;
}

.footer-bottom .social-links a {
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #e5e7eb;
  border-radius: 50%;
  color: #6b7280;
  font-size: 0.813rem;
  transition: all 0.2s ease;
}

.footer-bottom .social-links a:hover {
  background: #4f46e5;
  color: #ffffff;
}

@media (max-width: 767px) {
  .footer-bottom .outer-box {
    flex-direction: column;
    text-align: center;
  }
}
</style>

<footer class="main-footer alternate5">
    <div class="widgets-section" style="padding: 30px 0 20px;">
        <div class="dashboard-container">
            <div class="row">
                <!-- Company Info -->
                <div class="col-lg-6 col-md-6 col-sm-12 footer-column mb-3">
                    <div class="footer-widget">
                        <div class="logo" style="margin-bottom: 10px;">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-main.svg')}}" alt="Is Yours" style="max-width: 100px; opacity: 0.8;">
                            </a>
                        </div>
                        <p class="address" style="margin-bottom: 0;">
                            Connecting talented professionals with exceptional opportunities worldwide.
                        </p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column mb-3">
                    <div class="footer-widget links-widget">
                        <h4 class="widget-title">Quick Links</h4>
                        <ul class="list">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('web.offer.index') }}">Find Jobs</a></li>
                            <li><a href="{{ route('web.offer.create') }}">Post Jobs</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column mb-3">
                    <div class="footer-widget">
                        <h4 class="widget-title">Contact</h4>
                        <div class="phone-num" style="margin-bottom: 6px;">
                            <a href="mailto:hello@isyours.us"><i class="la la-envelope"></i> hello@isyours.us</a>
                        </div>
                        <div class="phone-num" style="margin-bottom: 6px;">
                            <a href="mailto:hola@isyours.us"><i class="la la-envelope"></i> hola@isyours.us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom" style="padding: 15px 0;">
        <div class="dashboard-container">
            <div class="outer-box">
                <div class="copyright-text">
                    &copy; 2025 <a href="{{ route('home') }}">Is Yours</a>. All rights reserved.
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
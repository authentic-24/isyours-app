<footer class="professional-footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <!-- Company Info Section -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-section company-info">
                        <div class="footer-logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-main.svg')}}" alt="Is Yours" class="logo-img">
                            </a>
                        </div>
                        <p class="company-description">
                            Connecting talented professionals with exceptional opportunities worldwide. 
                            Build your career or find the perfect candidate with our innovative platform.
                        </p>
                        <div class="social-media">
                            <h6 class="social-title">Follow Us</h6>
                            <div class="social-links">
                                <a href="#" class="social-link facebook" title="Facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link twitter" title="Twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link linkedin" title="LinkedIn">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link instagram" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-section">
                        <h5 class="footer-title">Platform</h5>
                        <ul class="footer-links">
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="#">Find Jobs</a></li>
                            <li><a href="#">Post Jobs</a></li>
                            <li><a href="#">Browse Companies</a></li>
                            <li><a href="#">Salary Guide</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Resources Section -->
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-section">
                        <h5 class="footer-title">Resources</h5>
                        <ul class="footer-links">
                            <li><a href="#">Career Advice</a></li>
                            <li><a href="#">Resume Builder</a></li>
                            <li><a href="#">Interview Tips</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Help Center</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Info Section -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-section">
                        <h5 class="footer-title">Get In Touch</h5>
                        <div class="contact-info">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-content">
                                    <span class="contact-label">General Inquiries</span>
                                    <a href="mailto:hello@isyours.us" class="contact-value">hello@isyours.us</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="contact-content">
                                    <span class="contact-label">Soporte en Español</span>
                                    <a href="mailto:hola@isyours.us" class="contact-value">hola@isyours.us</a>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-content">
                                    <span class="contact-label">Phone Support</span>
                                    <a href="tel:+15551234567" class="contact-value">+1 (555) 123-4567</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        <p>&copy; 2025 <a href="{{ route('home') }}">Is Yours</a>. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-bottom-links">
                        <a href="#">Privacy Policy</a>
                        <a href="#">Terms of Service</a>
                        <a href="#">Cookie Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>
</footer>
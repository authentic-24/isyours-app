 <!-- Job Detail Section -->
 <section class="job-detail-section">
    <!-- Upper Box -->
    <div class="upper-box">
      <div class="auto-container">
        <!-- Job Block -->
        <div class="job-block-seven">
          <div class="inner-box">
            <div class="content" style="padding-left:0px;">
              {{-- <span class="company-logo"><img src="{{ asset('images/resource/company-logo/5-1.png') }}" alt=""></span> --}}
              <h4><a id="server_position" href="#">{{ $offer->server_position ?? ''}}</a></h4>
              <ul class="job-info">
                <li><span class="icon flaticon-briefcase"></span> -</li>
                <li id="city"><span class="icon flaticon-map-locator"></span> {{ $offer->city->name ?? ''}}</li>
                <li><span class="icon flaticon-clock-3"></span> {{ \Carbon\Carbon::parse( $offer->created_at)->diffForHumans() }}</li>
                <li><span class="icon flaticon-money"></span> - </li>
              </ul>
              <ul class="job-other-info">
                <li class="time">Full Time</li>
                <li class="privacy">-</li>
                <!-- <li class="privacy">Private</li> -->
                <li class="required">-</li>
                <!-- <li class="required">Urgent</li> -->
              </ul>
            </div>

            <div class="btn-box">
              <a href="{{ route('web.offer.apply_offer', ['offer_id' => $offer->id]) }}" class="theme-btn btn-style-one">Apply For Job</a>
              <!-- <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="job-detail-outer">
      <div class="auto-container">
        <div class="row">
          <div class="content-column col-lg-8 col-md-12 col-sm-12">
            <div class="job-detail">
              <h4>Job Description</h4>
              <p id="job_description">{{ $offer->description ?? ''}}</h4>
              <ul id ="skill_list" class="list-style-three">
              </ul>
            </div>

            <!-- Other Options -->
            <!-- <div class="other-options">
              <div class="social-share">
                <h5>Share this job</h5>
                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#" class="google"><i class="fab fa-google"></i> Google+</a>
              </div>
            </div> -->

            <!-- Related Jobs -->
            <div class="related-jobs">
              <div class="title-box">
                <h3>Related Jobs</h3>
                <div class="text">Coming Soon</div>
              </div>

              <!-- Job Block -->
              <!-- <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-1.png" alt=""></span>
                    <h4><a href="#">Software Engineer (Android), Libraries</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Full Time</li>
                      <li class="privacy">Private</li>
                      <li class="required">Urgent</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div> -->

              <!-- Job Block -->
              <!-- <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-2.png" alt=""></span>
                    <h4><a href="#">Recruiting Coordinator</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Full Time</li>
                      <li class="privacy">Private</li>
                      <li class="required">Urgent</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div> -->

              <!-- Job Block -->
              <!-- <div class="job-block">
                <div class="inner-box">
                  <div class="content">
                    <span class="company-logo"><img src="images/resource/company-logo/1-3.png" alt=""></span>
                    <h4><a href="#">Product Manager, Studio</a></h4>
                    <ul class="job-info">
                      <li><span class="icon flaticon-briefcase"></span> Segment</li>
                      <li><span class="icon flaticon-map-locator"></span> London, UK</li>
                      <li><span class="icon flaticon-clock-3"></span> 11 hours ago</li>
                      <li><span class="icon flaticon-money"></span> $35k - $45k</li>
                    </ul>
                    <ul class="job-other-info">
                      <li class="time">Full Time</li>
                      <li class="privacy">Private</li>
                      <li class="required">Urgent</li>
                    </ul>
                    <button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
                  </div>
                </div>
              </div> -->

            </div>
          </div>

          <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
            <aside class="sidebar">
              <div class="sidebar-widget">
                <!-- Job Overview -->
                <h4 class="widget-title">Job Overview</h4>
                <div class="widget-content">
                  <ul class="job-overview">
                    <li>
                      <i class="icon icon-calendar"></i>
                      <h5>Date Posted:</h5>
                      <span>-</span>
                      <!-- <span>Posted 1 hours ago</span> -->
                    </li>
                    <li>
                      <i class="icon icon-expiry"></i>
                      <h5>Expiration date:</h5>
                      <span>-</span>
                      <!-- <span>April 06, 2021</span> -->
                    </li>
                    <li>
                      <i class="icon icon-location"></i>
                      <h5>Location:</h5>
                      <span>-</span>
                      <!-- <span>Orlando, FL</span> -->
                    </li>
                    <li>
                      <i class="icon icon-user-2"></i>
                      <h5>Job Title:</h5>
                      <span>-</span>
                      <!-- <span>Assistant</span> -->
                    </li>
                    <li>
                      <i class="icon icon-clock"></i>
                      <h5>Hours:</h5>
                      <span>-</span>
                      <!-- <span>32h / week</span> -->
                    </li>
                    <li>
                      <i class="icon icon-rate"></i>
                      <h5>Rate:</h5>
                      <span>-</span>
                      <!-- <span>$10 - $15 / hour</span> -->
                    </li>
                  </ul>
                </div>

              </div>

              <!-- <div class="sidebar-widget company-widget">
                <div class="widget-content">
                  <div class="company-title">
                    <div class="company-logo"><img src="images/resource/company-7.png" alt=""></div>
                    <h5 class="company-name">InVision</h5>
                    <a href="#" class="profile-link">View company profile</a>
                  </div>

                  <ul class="company-info">
                    <li>Primary industry: <span>Software</span></li>
                    <li>Company size: <span>501-1,000</span></li>
                    <li>Founded in: <span>2011</span></li>
                    <li>Phone: <span>123 456 7890</span></li>
                    <li>Email: <span>info@joio.com</span></li>
                    <li>Location: <span>London, UK</span></li>
                    <li>Social media:
                      <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                    </li>
                  </ul>

                  <div class="btn-box"><a href="#" class="theme-btn btn-style-three">www.invisionapp.com</a></div>
                </div>
              </div> -->
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Job Detail Section -->
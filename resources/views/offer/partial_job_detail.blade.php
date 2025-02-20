 <!-- Job Detail Section -->
 <section class="job-detail-section">
     <!-- Upper Box -->
     <div class="upper-box">
         <div class="auto-container {{ !is_null($offer->company) ? 'row' : ''}}">
             <!-- Job Block -->
             <div class="job-block-seven  {{ !is_null($offer->company) ? 'col-lg-8' : 'col-lg-12'}} col-md-12 col-sm-12">
                 <div class="inner-box">
                     <div class="content" style="padding-left:0px;">
                         {{-- <span class="company-logo"><img src="{{ asset('images/resource/company-logo/5-1.png') }}" alt=""></span> --}}
                         <h4><a id="server_position" href="#">{{ $offer->jobLevel->name ?? '' }} /
                                 {{ $offer->jobLevel->name ?? '' }}</a></h4>
                         <ul class="job-other-info">
                             <li class="time">{{ $offer->jobType->name ?? '' }}</li>
                             <li class="time"><span class="icon flaticon-clock-3"></span>
                                 {{ \Carbon\Carbon::parse($offer->created_at)->diffForHumans() }}</li>
                         </ul>
                     </div>

                     <div class="btn-box">
                         <a href="{{ route('web.offer.apply_offer', ['offer_id' => $offer->id]) }}"
                             class="theme-btn btn-style-one">Apply For Job</a>
                         <!-- <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button> -->
                     </div>


                 </div>

                 <div class="job-overview-two">
                     <ul>
                         <li>
                             <i class="icon icon-calendar"></i>
                             <h5>Experience:</h5>
                             <span>{{ $offer->years_of_experience }}
                                 {{ Illuminate\Support\Str::plural('year', $offer->years_of_experience) }}</span>
                         </li>
                         <li>
                             <i class="icon icon-degree"></i>
                             <h5>Education Level:</h5>
                             <span>{{ $offer->educationLevel->name }}</span>
                         </li>
                         <li>
                             <i class="icon icon-expiry"></i>
                             <h5>Expiration date:</h5>
                             <span>{{ \Carbon\Carbon::parse($offer->expiration_date)->diffForHumans() }}</span>
                         </li>
                         <li>
                             <i class="icon icon-location"></i>
                             <h5>Location:</h5>
                             <span>{{ $offer->city->name ?? '' }}, {{ $offer->city->state->code ?? '' }}</span>
                         </li>
                         {{-- <li>
                <i class="icon icon-user-2"></i>
                <h5>Job Title:</h5>
                <span>Designer</span>
              </li> --}}
                         {{-- <li>
                <i class="icon icon-clock"></i>
                <h5>Hours:</h5>
                <span>50h / week</span>
              </li> --}}
                         <li>
                             <i class="icon icon-rate"></i>
                             <h5>Rate:</h5>
                             <span>${{ $offer->rate ?? '' }} / hour</span>
                         </li>
                         <li>
                             <i class="icon icon-salary"></i>
                             <h5>Salary:</h5>
                             <span>${{ $offer->offered_salary ?? '' }}</span>
                         </li>
                     </ul>
                 </div>
                 <div class="job-detail-outer" style="padding: 0px;">
                     <div class="auto-container">
                         <div class="row">
                             <div class="content-column col-lg-8 col-md-12 col-sm-12">
                                 <div class="job-detail">
                                     <h4>Job Description</h4>
                                     <p id="job_description">{{ $offer->description ?? '' }}</h4>
                                 </div>

                                 <div class="job-detail">
                                     <h4>Key Responsibilities</h4>
                                     <ul id="skill_list" class="list-style-three">
                                         @foreach ($offer->keyResponsabilities as $responsability)
                                             <li>{{ $responsability->responsability }}</li>
                                         @endforeach
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


                             </div>


                         </div>
                     </div>
                 </div>
             </div>

             @if(!is_null($offer->company))
             <div class="col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                  <div class="sidebar-widget company-widget">
                      <div class="widget-content">
                          {{-- <div class="company-title">
                              <div class="company-logo"><img src="images/resource/company-7.png" alt=""></div>
                              <h5 class="company-name">{{ $offer->company->name }}</h5>
                          </div> --}}
        
                          <ul class="company-info">
                              <li>Company: <span>{{ $offer->company->name }}</span></li>
                              {{-- <li>Primary industry: <span>Software</span></li>
                              <li>Company size: <span>501-1,000</span></li>
                              <li>Founded in: <span>2011</span></li> --}}
                              <li>Phone: <span>{{ $offer->company->phone }}</span></li>
                              <li>Email: <span>{{ $offer->company->email }}</span></li>
                          </ul>
        
                          <div class="btn-box"><a target="_blank" href="{{ $offer->company->website }}"
                                  class="theme-btn btn-style-three">{{ $offer->company->website }}</a></div>
                      </div>
                  </div>
              </aside>
          </div>
          @endif
            

         </div>
        
     </div>

    



 </section>
 <!-- End Job Detail Section -->

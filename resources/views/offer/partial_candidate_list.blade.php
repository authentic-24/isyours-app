 <!-- Listing Section -->
 <section class="ls-section">
	<div class="auto-container">
	  <div class="filters-backdrop"></div>

	  <div class="row">
		{{-- <div class="content-column col-lg-12"> --}}
			{{-- <div class="ls-outer"> --}}
				<div class="title-box">
					<h3>Candidate List</h3>
				</div>

		<!-- Filters Column -->
		{{-- <div class="filters-column col-lg-4 col-md-12 col-sm-12">
		  <div class="inner-column pd-right">
			<div class="filters-outer">
			  <button type="button" class="theme-btn close-filters">X</button>

			  <!-- Filter Block -->
			  <div class="filter-block">
				<h4>Search by Keywords</h4>
				<div class="form-group">
				  <input type="text" name="listing-search" placeholder="Job title, keywords, or company">
				  <span class="icon flaticon-search-3"></span>
				</div>
			  </div>

			  <!-- Filter Block -->
			  <div class="filter-block">
				<h4>Location</h4>
				<div class="form-group">
				  <input type="text" name="listing-search" placeholder="City or postcode">
				  <span class="icon flaticon-map-locator"></span>
				</div>
				<p>Radius around selected destination</p>
				<div class="range-slider-one">
				  <div class="area-range-slider"></div>
				  <div class="input-outer">
					<div class="amount-outer"><span class="area-amount"></span>km</div>
				  </div>
				</div>
			  </div>

			  <!-- Filter Block -->
			  <div class="filter-block">
				<h4>Category</h4>
				<div class="form-group">
				  <select class="chosen-select">
					<option>Choose a category</option>
					<option>Residential</option>
					<option>Commercial</option>
					<option>Industrial</option>
					<option>Apartments</option>
				  </select>
				  <span class="icon flaticon-briefcase"></span>
				</div>
			  </div>

			  <!-- Filter Block -->
			  <div class="filter-block">
				<h4>Candidate Gender</h4>
				<div class="form-group">
				  <select class="chosen-select">
					<option>Male</option>
					<option>Female</option>
					<option>Others</option>
				  </select>
				  <span class="icon flaticon-man"></span>
				</div>
			  </div>

			  <!-- Checkboxes Ouer -->
			  <div class="checkbox-outer">
				<h4>Date Posted</h4>
				<ul class="checkboxes square">
				  <li>
					<input id="check-f" type="checkbox" name="check">
					<label for="check-f">All</label>
				  </li>
				  <li>
					<input id="check-g" type="checkbox" name="check">
					<label for="check-g">Last Hour</label>
				  </li>
				  <li>
					<input id="check-h" type="checkbox" name="check">
					<label for="check-h">Last 24 Hours</label>
				  </li>
				  <li>
					<input id="check-i" type="checkbox" name="check">
					<label for="check-i">Last 7 Days</label>
				  </li>
				  <li>
					<input id="check-j" type="checkbox" name="check">
					<label for="check-j">Last 14 Days</label>
				  </li>
				  <li>
					<input id="check-k" type="checkbox" name="check">
					<label for="check-k">Last 30 Days</label>
				  </li>
				</ul>
			  </div>


			  <!-- Checkboxes Ouer -->
			  <div class="checkbox-outer">
				<h4>Experience</h4>
				<ul class="checkboxes square">
				  <li>
					<input id="check-l" type="checkbox" name="check">
					<label for="check-l">0-2 Years</label>
				  </li>
				  <li>
					<input id="check-m" type="checkbox" name="check">
					<label for="check-m">10-12 Years</label>
				  </li>
				  <li>
					<input id="check-n" type="checkbox" name="check">
					<label for="check-n">12-16 Years</label>
				  </li>
				  <li>
					<input id="check-o" type="checkbox" name="check">
					<label for="check-o">16-20 Years</label>
				  </li>
				  <li>
					<input id="check-p" type="checkbox" name="check">
					<label for="check-p">20-25 Years</label>
				  </li>
				  <li>
					<button class="view-more"><span class="icon flaticon-plus"></span> View More</button>
				  </li>
				</ul>
			  </div>

			  <!-- Checkboxes Ouer -->
			  <div class="checkbox-outer">
				<h4>Education Levels</h4>
				<ul class="checkboxes square">
				  <li>
					<input id="check-a" type="checkbox" name="check">
					<label for="check-a">Certificate</label>
				  </li>
				  <li>
					<input id="check-b" type="checkbox" name="check">
					<label for="check-b">Diploma</label>
				  </li>
				  <li>
					<input id="check-c" type="checkbox" name="check">
					<label for="check-c">Associate Degree</label>
				  </li>
				  <li>
					<input id="check-d" type="checkbox" name="check">
					<label for="check-d">Bachelor Degree</label>
				  </li>
				  <li>
					<input id="check-e" type="checkbox" name="check">
					<label for="check-e">Master’s Degree</label>
				  </li>
				  <li>
					<button class="view-more"><span class="icon flaticon-plus"></span> View More</button>
				  </li>
				</ul>
			  </div>
			</div>
		  </div>
		</div> --}}


		<!-- Content Column -->
		{{-- <div class="content-column col-lg-8 col-md-12 col-sm-12"> --}}
		<div class="content-column col-lg-12 col-md-12 col-sm-12">
		  <div class="ls-outer">
			<button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

			<!-- ls Switcher -->
			<div class="ls-switcher">
			  <div class="showing-result">
				<div class="text">Showing  <strong>{{ $offer->users->count() }}</strong> candidates</div>
			  </div>
			  {{-- <div class="sort-by">
				<select class="chosen-select">
				  <option>New Jobs</option>
				  <option>Freelance</option>
				  <option>Full Time</option>
				  <option>Internship</option>
				  <option>Part Time</option>
				  <option>Temporary</option>
				</select>

				<select class="chosen-select">
				  <option>Show 10</option>
				  <option>Show 20</option>
				  <option>Show 30</option>
				  <option>Show 40</option>
				  <option>Show 50</option>
				  <option>Show 60</option>
				</select>
			  </div> --}}
			</div>


			<!-- Candidate block three -->
			@foreach ($offer->users as $candidate)
			  <div class="candidate-block-three">
				<div class="inner-box">
				  <div class="content">
					<figure class="image"><img src="{{ asset('images/resource/candidate-1.png') }}" alt=""></figure>
					<h4 class="name"><a href="#">{{ $candidate->first_name ?? '' }} {{ $candidate->last_name ?? '' }}</a></h4>
					<ul class="candidate-info">
					  <li class="designation">{{ $candidate->email ?? '' }}</li>
					  {{-- <li><span class="icon flaticon-map-locator"></span> {{ $candidate->city->name ?? '-'}} </li>
					  <li><span class="icon flaticon-money"></span> $ / hour</li> --}}
					</ul>
					<ul class="post-tags">
						<li><i class="icon flaticon-diploma"></i>
							{{ $candidate->educationLevel->name ?? '-' }}</li>
						<li><span class="icon flaticon-notebook"></span>
							{{ $candidate->visa->name ?? '-' }}</li>
						<li><span class="icon flaticon-pin"></span> {{ $candidate->city->name ?? ''}}, {{ $candidate->city->state->code ?? ''}}</li>
						<li><span class="icon flaticon-pin"></span> {{ $candidate->distance ?? '-' }}
							mi</li>

							
						@if ($candidate->have_vehicle)
							<li><span class="icon flaticon-car"></span>{{ ' ' }}
								<span class="icon flaticon-checked"> {{ $candidate->license_plates }}</span>
							</li>
						@else
							<li><span class="icon flaticon-car"></span>{{ ' ' }}
								<span class="icon flaticon-cancel"></span>
							</li>
						@endif
					</ul>
				  </div>
				  <div class="btn-box">
					<a href="tel:{{ $candidate->phone_number }}" class="theme-btn btn-style-three"><span class="icon flaticon-phone"></span></a>
				  </div> 
				  {{-- <div class="btn-box">
					<button class="bookmark-btn"><span class="flaticon-bookmark"></span></button>
					<a href="#" class="theme-btn btn-style-three"><span class="btn-title">View Profile</span></a>
				  </div> --}}
				</div>
			  </div>
			@endforeach

			<!-- Listing Show More -->
			{{-- <div class="ls-show-more">
			  <p>Showing 36 of 497 Jobs</p>
			  <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
			  <button class="show-more">Show More</button>
			</div> --}}
		  </div>
		</div>
	  </div>
	</div>
  </section>
 <!--End Listing Page Section -->

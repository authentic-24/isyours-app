@extends('layouts/app2')

@section('content')
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>My Applications</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>My Applications</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
        <div class="auto-container">
            <div class="row">
                <div class="content-column col-lg-12 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        
                        @if(session('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($applications->count() > 0)
                            <div class="ls-switcher">
                                <div class="showing-result">
                                    <div class="text">Showing <strong>{{ $applications->count() }}</strong> applications</div>
                                </div>
                            </div>

                            <!-- Job Listings -->
                            @foreach($applications as $application)
                                <div class="job-block">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo">
                                                @if($application->company && $application->company->logo)
                                                    <img src="{{ asset('storage/' . $application->company->logo) }}" alt="{{ $application->company->name }}">
                                                @else
                                                    <img src="{{ asset('images/resource/company-logo/default.png') }}" alt="Company">
                                                @endif
                                            </span>
                                            <h4>
                                                <a href="{{ route('web.offer.show', $application->id) }}">
                                                    {{ $application->jobTitle->name ?? 'N/A' }} - {{ $application->jobLevel->name ?? 'N/A' }}
                                                </a>
                                            </h4>

                                            <ul class="job-info">
                                                @if($application->company)
                                                    <li><span class="icon flaticon-briefcase"></span> {{ $application->company->name }}</li>
                                                @endif
                                                <li><span class="icon flaticon-map-locator"></span> {{ $application->city->name ?? 'N/A' }}, {{ $application->city->state->code ?? '' }}</li>
                                                <li><span class="icon flaticon-clock-3"></span> {{ $application->jobType->name ?? 'N/A' }}</li>
                                                @if($application->offered_salary)
                                                    <li><span class="icon flaticon-money"></span> ${{ number_format($application->offered_salary) }}</li>
                                                @endif
                                            </ul>

                                            <ul class="job-other-info">
                                                <li class="time">Applied {{ \Carbon\Carbon::parse($application->pivot->created_at ?? $application->created_at)->diffForHumans() }}</li>
                                            </ul>

                                            <button class="bookmark-btn">
                                                <span class="flaticon-bookmark"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <!-- No Applications -->
                            <div class="text-center" style="padding: 50px 0;">
                                <div class="icon" style="font-size: 80px; color: #ddd; margin-bottom: 20px;">
                                    <i class="flaticon-briefcase"></i>
                                </div>
                                <h3>No Applications Yet</h3>
                                <p style="margin-bottom: 30px;">You haven't applied to any jobs yet. Start exploring opportunities!</p>
                                <a href="{{ route('web.offer.index') }}" class="theme-btn btn-style-one">Browse Jobs</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Listing Section -->
@endsection

@section('js')
<script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);
</script>
@endsection

@extends('layouts/app2')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="padding: 25px 0 20px; background: #ffffff; border-bottom: 1px solid #e5e7eb; margin-bottom: 0;">
        <div class="dashboard-container">
            <div class="title-outer">
                <h1 style="color: #1f2937; font-size: 1.5rem; margin-bottom: 5px; font-weight: 600;">Candidate Dashboard</h1>
                <p style="color: #6b7280; margin-bottom: 0; font-size: 0.875rem;">Welcome back, {{ $user->first_name }}! Find your next opportunity.</p>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Dashboard Section -->
    <section class="user-dashboard" style="padding: 25px 0 50px;">
        <div class="dashboard-container">
            
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <!-- Total Applications -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-1" style="font-size: 0.875rem;">My Applications</h6>
                                    <h3 class="mb-0">{{ $total_applications }}</h3>
                                    <a href="{{ route('web.candidate.my_applications') }}" class="btn btn-sm btn-link ps-0 mt-1" style="font-size: 0.813rem;">
                                        View All <i class="la la-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="icon" style="font-size: 2.5rem; color: #1967d2; opacity: 0.8;">
                                    <i class="la la-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Jobs -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-1" style="font-size: 0.875rem;">Recommended Jobs</h6>
                                    <h3 class="mb-0">{{ $recommended_jobs->count() }}</h3>
                                    <small class="text-muted" style="font-size: 0.75rem;">Based on your profile</small>
                                </div>
                                <div class="icon" style="font-size: 2.5rem; color: #34a853; opacity: 0.8;">
                                    <i class="la la-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Jobs -->
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-1" style="font-size: 0.875rem;">New Jobs</h6>
                                    <h3 class="mb-0">{{ $latest_jobs->count() }}</h3>
                                    <a href="{{ route('web.offer.index') }}" class="btn btn-sm btn-link ps-0 mt-1" style="font-size: 0.813rem;">
                                        Browse All <i class="la la-arrow-right"></i>
                                    </a>
                                </div>
                                <div class="icon" style="font-size: 2.5rem; color: #fbbc04; opacity: 0.8;">
                                    <i class="la la-briefcase"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-3">
                            <h6 class="mb-2">Quick Actions</h6>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="{{ route('web.offer.index') }}" class="theme-btn btn-style-one" style="padding: 8px 20px; font-size: 0.875rem;">
                                    <i class="la la-search"></i> Browse Jobs
                                </a>
                                <a href="{{ route('web.candidate.my_applications') }}" class="theme-btn btn-style-two" style="padding: 8px 20px; font-size: 0.875rem;">
                                    <i class="la la-file-alt"></i> My Applications
                                </a>
                                <a href="{{ route('web.profile.edit') }}" class="theme-btn btn-style-four" style="padding: 8px 20px; font-size: 0.875rem;">
                                    <i class="la la-user"></i> Edit Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Applications -->
            @if($recent_applications->count() > 0)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2">
                                <h6 class="mb-0">Recent Applications</h6>
                                <a href="{{ route('web.candidate.my_applications') }}" class="text-primary" style="font-size: 0.875rem;">View All</a>
                            </div>
                            <div class="card-body p-0">
                                @foreach($recent_applications as $application)
                                    <div class="job-block-item border-bottom p-2">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" style="font-size: 0.938rem;">
                                                    <a href="{{ route('web.offer.show', $application->id) }}">
                                                        {{ $application->jobTitle->name ?? 'N/A' }} - {{ $application->jobLevel->name ?? 'N/A' }}
                                                    </a>
                                                </h6>
                                                <ul class="job-info" style="list-style: none; padding: 0; margin: 0 0 5px 0; font-size: 0.813rem;">
                                                    @if($application->company)
                                                        <li class="d-inline-block me-3">
                                                            <span class="icon flaticon-briefcase"></span>
                                                            {{ $application->company->name }}
                                                        </li>
                                                    @endif
                                                    <li class="d-inline-block me-3">
                                                        <span class="icon flaticon-map-locator"></span>
                                                        {{ $application->city->name ?? 'N/A' }}
                                                    </li>
                                                    @if($application->offered_salary)
                                                        <li class="d-inline-block">
                                                            <span class="icon flaticon-money"></span>
                                                            ${{ number_format($application->offered_salary) }}
                                                        </li>
                                                    @endif
                                                </ul>
                                                <small class="text-muted" style="font-size: 0.75rem;">
                                                    Applied {{ $application->pivot && $application->pivot->created_at ? $application->pivot->created_at->diffForHumans() : 'recently' }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Recommended Jobs -->
            @if($recommended_jobs->count() > 0)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom">
                                <h5 class="mb-0"><i class="la la-star text-warning"></i> Recommended Jobs for You</h5>
                                <small class="text-muted">Based on your education level and profile</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($recommended_jobs as $job)
                                        <div class="col-lg-6 mb-3">
                                            <div class="job-block">
                                                <div class="inner-box border rounded p-3">
                                                    <div class="content">
                                                        @if($job->company)
                                                            <span class="company-logo mb-2">
                                                                @if($job->company->logo)
                                                                    <img src="{{ asset('storage/' . $job->company->logo) }}" alt="{{ $job->company->name }}" style="max-width: 50px;">
                                                                @endif
                                                            </span>
                                                        @endif
                                                        <h5 class="mb-2">
                                                            <a href="{{ route('web.offer.show', $job->id) }}">
                                                                {{ $job->jobTitle->name ?? 'N/A' }} - {{ $job->jobLevel->name ?? 'N/A' }}
                                                            </a>
                                                        </h5>

                                                        <ul class="job-info mb-2" style="list-style: none; padding: 0;">
                                                            @if($job->company)
                                                                <li><span class="icon flaticon-briefcase"></span> {{ $job->company->name }}</li>
                                                            @endif
                                                            <li><span class="icon flaticon-map-locator"></span> {{ $job->city->name ?? 'N/A' }}</li>
                                                            @if($job->offered_salary)
                                                                <li><span class="icon flaticon-money"></span> ${{ number_format($job->offered_salary) }}</li>
                                                            @endif
                                                        </ul>

                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="badge bg-success">New</span>
                                                            <a href="{{ route('web.offer.show', $job->id) }}" class="btn btn-sm btn-primary">
                                                                View Details
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Latest Jobs -->
            @if($latest_jobs->count() > 0)
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Latest Job Opportunities</h5>
                                <a href="{{ route('web.offer.index') }}" class="text-primary">Browse All Jobs</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($latest_jobs as $job)
                                        <div class="col-lg-6 mb-3">
                                            <div class="job-block">
                                                <div class="inner-box border rounded p-3">
                                                    <div class="content">
                                                        @if($job->company)
                                                            <span class="company-logo mb-2">
                                                                @if($job->company->logo)
                                                                    <img src="{{ asset('storage/' . $job->company->logo) }}" alt="{{ $job->company->name }}" style="max-width: 50px;">
                                                                @endif
                                                            </span>
                                                        @endif
                                                        <h5 class="mb-2">
                                                            <a href="{{ route('web.offer.show', $job->id) }}">
                                                                {{ $job->jobTitle->name ?? 'N/A' }} - {{ $job->jobLevel->name ?? 'N/A' }}
                                                            </a>
                                                        </h5>

                                                        <ul class="job-info mb-2" style="list-style: none; padding: 0;">
                                                            @if($job->company)
                                                                <li><span class="icon flaticon-briefcase"></span> {{ $job->company->name }}</li>
                                                            @endif
                                                            <li><span class="icon flaticon-map-locator"></span> {{ $job->city->name ?? 'N/A' }}</li>
                                                            <li><span class="icon flaticon-clock-3"></span> {{ $job->created_at ? $job->created_at->diffForHumans() : 'recently' }}</li>
                                                        </ul>

                                                        <a href="{{ route('web.offer.show', $job->id) }}" class="btn btn-sm btn-outline-primary">
                                                            View & Apply
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- No Jobs Available -->
                <div class="row">
                    <div class="col-12">
                        <div class="text-center py-5">
                            <i class="la la-briefcase" style="font-size: 5rem; color: #ddd;"></i>
                            <h4 class="mt-3">No Jobs Available</h4>
                            <p class="text-muted">Check back later for new opportunities!</p>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <!-- End Dashboard Section -->
@endsection

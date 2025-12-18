@extends('layouts/app2')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="padding: 25px 0 20px; background: #ffffff; border-bottom: 1px solid #e5e7eb; margin-bottom: 0;">
        <div class="dashboard-container">
            <div class="title-outer">
                <h1 style="color: #1f2937; font-size: 1.5rem; margin-bottom: 5px; font-weight: 600;">Employer Dashboard</h1>
                @if($company)
                    <p style="color: #6b7280; margin-bottom: 0; font-size: 0.875rem;">Welcome back, {{ $company->name }}! Manage your job postings and applications.</p>
                @else
                    <p style="color: #6b7280; margin-bottom: 0; font-size: 0.875rem;">Welcome! Please create your company profile to start posting jobs.</p>
                @endif
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Dashboard Section -->
    <section class="user-dashboard" style="padding: 25px 0 50px;">
        <div class="dashboard-container">
            
            @if(!$company)
                <!-- No Company Profile Alert -->
                <div class="alert alert-warning" role="alert">
                    <h5><i class="la la-exclamation-triangle"></i> Company Profile Required</h5>
                    <p>You need to create your company profile before you can post jobs and manage applications.</p>
                    <a href="{{ route('web.company.create') }}" class="theme-btn btn-style-one mt-2">
                        Create Company Profile
                    </a>
                </div>
            @else
                
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <!-- Total Offers -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-2">Total Jobs</h6>
                                        <h2 class="mb-0">{{ $total_offers }}</h2>
                                    </div>
                                    <div class="icon" style="font-size: 3rem; color: #1967d2;">
                                        <i class="la la-briefcase"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Active Offers -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-2">Active Jobs</h6>
                                        <h2 class="mb-0">{{ $active_offers }}</h2>
                                    </div>
                                    <div class="icon" style="font-size: 3rem; color: #34a853;">
                                        <i class="la la-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Expired Offers -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-2">Expired Jobs</h6>
                                        <h2 class="mb-0">{{ $expired_offers }}</h2>
                                    </div>
                                    <div class="icon" style="font-size: 3rem; color: #fbbc04;">
                                        <i class="la la-times-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Applications -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="text-muted mb-2">Applications</h6>
                                        <h2 class="mb-0">{{ $total_applications }}</h2>
                                    </div>
                                    <div class="icon" style="font-size: 3rem; color: #ea4335;">
                                        <i class="la la-file-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="mb-3">Quick Actions</h5>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('web.offer.create') }}" class="theme-btn btn-style-one">
                                        <i class="la la-plus"></i> Post New Job
                                    </a>
                                    <a href="{{ route('web.candidate.index') }}" class="theme-btn btn-style-two">
                                        <i class="la la-search"></i> Browse Candidates
                                    </a>
                                    <a href="{{ route('web.company.create') }}" class="theme-btn btn-style-four">
                                        <i class="la la-edit"></i> Edit Company Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Your Job Postings -->
                    <div class="col-lg-7 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Your Job Postings</h5>
                                <a href="{{ route('web.offer.index') }}" class="text-primary">View All</a>
                            </div>
                            <div class="card-body p-0">
                                @forelse($recent_offers as $offer)
                                    <div class="job-block-item border-bottom p-3">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2">
                                                    <a href="{{ route('web.offer.show', $offer->id) }}">
                                                        {{ $offer->jobTitle->name ?? 'N/A' }} - {{ $offer->jobLevel->name ?? 'N/A' }}
                                                    </a>
                                                </h6>
                                                <ul class="job-info" style="list-style: none; padding: 0; margin: 0;">
                                                    <li class="d-inline-block me-3">
                                                        <span class="icon flaticon-map-locator"></span>
                                                        {{ $offer->city->name ?? 'N/A' }}
                                                    </li>
                                                    <li class="d-inline-block me-3">
                                                        <span class="icon flaticon-briefcase"></span>
                                                        {{ $offer->users->count() }} applications
                                                    </li>
                                                    <li class="d-inline-block">
                                                        <span class="icon flaticon-clock-3"></span>
                                                        Posted {{ $offer->created_at ? $offer->created_at->diffForHumans() : 'recently' }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                @if($offer->expiration_date > now())
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Expired</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="la la-briefcase" style="font-size: 4rem; color: #ddd;"></i>
                                        <p class="text-muted mt-3">No job postings yet</p>
                                        <a href="{{ route('web.offer.create') }}" class="theme-btn btn-style-one">
                                            Post Your First Job
                                        </a>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Recent Applications -->
                    <div class="col-lg-5 mb-4">
                        <div class="card border-0 shadow-sm">
                            <div class="card-header bg-white border-bottom">
                                <h5 class="mb-0">Recent Applications</h5>
                            </div>
                            <div class="card-body p-0">
                                @forelse($recent_applications as $application)
                                    <div class="application-item border-bottom p-3">
                                        <h6 class="mb-1">{{ $application->first_name }} {{ $application->last_name }}</h6>
                                        <p class="text-muted mb-1" style="font-size: 0.875rem;">{{ $application->email }}</p>
                                        <small class="text-muted">
                                            Applied {{ $application->applied_at ? \Carbon\Carbon::parse($application->applied_at)->diffForHumans() : 'recently' }}
                                        </small>
                                    </div>
                                @empty
                                    <div class="text-center py-5">
                                        <i class="la la-inbox" style="font-size: 3rem; color: #ddd;"></i>
                                        <p class="text-muted mt-2 mb-0">No applications yet</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Most Popular Jobs -->
                    @if($popular_offers->count() > 0)
                        <div class="col-lg-12 mb-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-white border-bottom">
                                    <h5 class="mb-0">Most Popular Job Postings</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($popular_offers as $offer)
                                            <div class="col-md-4 mb-3">
                                                <div class="border rounded p-3">
                                                    <h6>
                                                        <a href="{{ route('web.offer.show', $offer->id) }}">
                                                            {{ Str::limit($offer->jobTitle->name ?? 'N/A', 30) }}
                                                        </a>
                                                    </h6>
                                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                                        <span class="badge bg-primary">{{ $offer->users_count }} applications</span>
                                                        <small class="text-muted">{{ $offer->created_at ? $offer->created_at->diffForHumans() : 'N/A' }}</small>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            @endif

        </div>
    </section>
    <!-- End Dashboard Section -->
@endsection

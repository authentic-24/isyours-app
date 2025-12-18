@extends('layouts/app2')

@section('content')
    <!--Page Title-->
    <section class="page-title" style="padding: 25px 0 20px; background: #ffffff; border-bottom: 1px solid #e5e7eb; margin-bottom: 0;">
        <div class="dashboard-container">
            <div class="title-outer">
                <h1 style="color: #1f2937; font-size: 1.5rem; margin-bottom: 5px; font-weight: 600;">Admin Dashboard</h1>
                <p style="color: #6b7280; margin-bottom: 0; font-size: 0.875rem;">Welcome back! Here's what's happening with your platform.</p>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Dashboard Section -->
    <section class="user-dashboard" style="padding: 25px 0 50px;">
        <div class="dashboard-container">
            
            <!-- Statistics Cards -->
            <div class="row mb-4">
                <!-- Total Users -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Total Users</h6>
                                    <h2 class="mb-0">{{ $total_users }}</h2>
                                </div>
                                <div class="icon" style="font-size: 3rem; color: #1967d2;">
                                    <i class="la la-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Candidates -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Candidates</h6>
                                    <h2 class="mb-0">{{ $total_candidates }}</h2>
                                </div>
                                <div class="icon" style="font-size: 3rem; color: #34a853;">
                                    <i class="la la-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Employers -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Employers</h6>
                                    <h2 class="mb-0">{{ $total_employers }}</h2>
                                </div>
                                <div class="icon" style="font-size: 3rem; color: #fbbc04;">
                                    <i class="la la-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Job Offers -->
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-2">Total Jobs</h6>
                                    <h2 class="mb-0">{{ $total_offers }}</h2>
                                </div>
                                <div class="icon" style="font-size: 3rem; color: #ea4335;">
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
                                <div class="icon" style="font-size: 3rem; color: #ea4335;">
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
                                <div class="icon" style="font-size: 3rem; color: #1967d2;">
                                    <i class="la la-file-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Recent Offers -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0">Recent Job Offers</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Job Title</th>
                                            <th>Company</th>
                                            <th>Location</th>
                                            <th>Posted</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recent_offers as $offer)
                                            <tr>
                                                <td>
                                                    <a href="{{ route('web.offer.show', $offer->id) }}">
                                                        {{ $offer->jobTitle->name ?? 'N/A' }}
                                                    </a>
                                                </td>
                                                <td>{{ $offer->company->name ?? 'N/A' }}</td>
                                                <td>{{ $offer->city->name ?? 'N/A' }}</td>
                                                <td>{{ $offer->created_at ? $offer->created_at->diffForHumans() : 'N/A' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center py-4">No recent offers</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Users -->
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0">Recent Users</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recent_users as $user)
                                            <tr>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at ? $user->created_at->diffForHumans() : 'N/A' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center py-4">No recent users</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Top Companies -->
                <div class="col-lg-12 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h5 class="mb-0">Top Companies by Job Offers</h5>
                        </div>
                        <div class="card-body">
                            @forelse($top_companies as $company)
                                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                    <div>
                                        <h6 class="mb-1">{{ $company->name }}</h6>
                                        <small class="text-muted">{{ $company->email }}</small>
                                    </div>
                                    <div>
                                        <span class="badge bg-primary">{{ $company->job_offers_count }} offers</span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center mb-0">No companies yet</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Dashboard Section -->
@endsection

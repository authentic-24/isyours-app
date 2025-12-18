@extends('layouts/app2')

@section('content')
    <!--Page Title-->
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Change Password</h1>
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Change Password</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Ls widget -->
                    <div class="ls-widget">
                        <div class="tabs-box">
                            <div class="widget-title">
                                <h4>Change Password</h4>
                            </div>

                            <div class="widget-content">
                                
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="la la-check-circle"></i> {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form class="default-form" method="POST" action="{{ route('web.profile.update_password') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <!-- Current Password -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="current_password">Current Password</label>
                                            <input 
                                                type="password" 
                                                name="current_password" 
                                                id="current_password"
                                                placeholder="Enter your current password"
                                                required
                                                class="@error('current_password') is-invalid @enderror"
                                            >
                                            @error('current_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- New Password -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="new_password">New Password</label>
                                            <input 
                                                type="password" 
                                                name="new_password" 
                                                id="new_password"
                                                placeholder="Enter new password (min 8 characters)"
                                                required
                                                class="@error('new_password') is-invalid @enderror"
                                            >
                                            <small class="form-text text-muted">
                                                Password must be at least 8 characters and contain letters and numbers.
                                            </small>
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Confirm New Password -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <label for="new_password_confirmation">Confirm New Password</label>
                                            <input 
                                                type="password" 
                                                name="new_password_confirmation" 
                                                id="new_password_confirmation"
                                                placeholder="Confirm your new password"
                                                required
                                            >
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button type="submit" class="theme-btn btn-style-one">
                                                Update Password
                                            </button>
                                            <a href="{{ route('web.profile.edit') }}" class="theme-btn btn-style-four">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>

                                <!-- Password Requirements Info -->
                                <div class="mt-4 p-3" style="background-color: #f8f9fa; border-radius: 8px;">
                                    <h6><i class="la la-info-circle"></i> Password Requirements:</h6>
                                    <ul style="margin-bottom: 0;">
                                        <li>Minimum 8 characters long</li>
                                        <li>Must contain letters (a-z, A-Z)</li>
                                        <li>Must contain numbers (0-9)</li>
                                        <li>New password must be confirmed correctly</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard -->
@endsection

@section('js')
<script>
    // Auto-hide success alerts after 5 seconds
    setTimeout(function() {
        $('.alert-success').fadeOut('slow');
    }, 5000);

    // Password visibility toggle (optional enhancement)
    document.addEventListener('DOMContentLoaded', function() {
        // You can add password visibility toggle functionality here if needed
    });
</script>
@endsection

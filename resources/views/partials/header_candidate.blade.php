 <!-- Main Header-->
 <header class="main-header">
      <div class="container-fluid">
        <!-- Main box -->
        <div class="main-box">
          <!--Nav Outer -->
          <div class="nav-outer">
            <div class="logo-box">
              <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo-main.svg')}}" alt="" title=""></a></div>
            </div>

            <nav class="nav main-menu " style="padding-left: 2rem;">
              <ul class="navigation" id="navbar">
                <li><a href="{{ route('web.offer.index') }}">
                  <span>Jobs</span> 
                </a></li>
                @if(session('admin') || session('employer'))
                <li><a href="{{ route('web.offer.create') }}">
                  <span>Post a Job</span> 
                </a></li>
                @endif
                @if(session('admin') || session('employer'))
                <li><a href="{{ route('web.candidate.index') }}">
                  <span>Candidates</span> 
                </a></li>
                @endif
                @if(session('employer'))
                <li><a href="{{ route('web.company.create') }}">
                  <span>Company Profile</span> 
                </a></li>
                @endif

                <li><a href="{{ route('web.profile.edit') }}">
                  <span>My Profile</span> 
                </a></li>
               
                <li><a href="{{ route('about') }}">
                  <span>About Us</span>
                </a></li>
                <li><a href="{{ route('log_out') }}">
                  <span>Log out</span>
                </a></li>
              </ul>
            </nav>
            <!-- Main Menu End-->
          </div>

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="btn-box">
              <!-- <a href="login-popup.html" class="theme-btn btn-style-three call-modal">Login / Register</a> -->
              <!-- <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Job Post</span></a> -->
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile Header -->
      <div class="mobile-header">
        <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('images/logo-main.svg')}}" alt="" title=""></a></div>

        <!--Nav Box-->
        <div class="nav-outer clearfix">

          <div class="outer-box">
            <!-- Login/Register -->
            <div class="login-box">
              <a href="#" class=""><span class="icon-user"></span></a>
            </div>

            <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
          </div>
        </div>
      </div>

      <!-- Mobile Nav -->
      <div id="nav-mobile"></div>
    </header>
    <div class="sidebar-backdrop"></div>

    <!-- User Sidebar -->
    <div class="user-sidebar">

      <div class="sidebar-inner">
        <ul class="navigation">
          <li class="active"><a href="dashboard.html"> <i class="la la-home"></i> Dashboard</a></li>
          {{-- <li><a href="dashboard-company-profile.html"><i class="la la-user-tie"></i>Company Profile</a></li>
          <li><a href="dashboard-post-job.html"><i class="la la-paper-plane"></i>Post a New Job</a></li>
          <li><a href="dashboard-manage-job.html"><i class="la la-briefcase"></i> Manage Jobs </a></li>
          <li><a href="dashboard-applicants.html"><i class="la la-file-invoice"></i> All Applicants</a></li>
          <li><a href="dashboard-resumes.html"><i class="la la-bookmark-o"></i>Shortlisted Resumes</a></li> --}}
          
          
          {{-- <li><a href="dashboard-packages.html"><i class="la la-box"></i>Packages</a></li>
          <li><a href="dashboard-messages.html"><i class="la la-comment-o"></i>Messages</a></li>
          <li><a href="dashboard-resume-alerts.html"><i class="la la-bell"></i>Resume Alerts</a></li>
          <li><a href="dashboard-change-password.html"><i class="la la-lock"></i>Change Password</a></li>
          <li><a href="dashboard-company-profile.html"><i class="la la-user-alt"></i>View Profile</a></li>
          <li><a href="index.html"><i class="la la-sign-out"></i>Logout</a></li>
          <li><a href="index.html"><i class="la la-trash"></i>Delete Profile</a></li> --}}

          <li><a href="#"><i class="la la-box"></i>Packages</a></li>
          <li><a href="#"><i class="la la-comment-o"></i>Messages</a></li>
          <li><a href="#"><i class="la la-bell"></i>Resume Alerts</a></li>
          <li><a href="#"><i class="la la-lock"></i>Change Password</a></li>
          <li><a href="{{ route('web.profile.edit') }}"><i class="la la-user-alt"></i>View Profile</a></li>
          <li><a href="{{ route('log_out') }}"><i class="la la-sign-out"></i>Logout</a></li>
          <li><a href="#"><i class="la la-trash"></i>Delete Profile</a></li>
        </ul>
      </div>
    </div>

    
    <!--End Main Header -->
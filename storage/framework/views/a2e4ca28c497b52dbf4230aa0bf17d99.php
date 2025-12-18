<!-- Mobile Header -->
<div class="mobile-header">
  <div class="logo"><a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="" title=""></a></div>

  <!--Nav Box-->
  <div class="nav-outer clearfix">
    <div class="outer-box">
      <button class="mobile-nav-toggler" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
        <span class="flaticon-menu-1"></span>
      </button>
    </div>
  </div>
</div>

<div class="sidebar-backdrop"></div>

<!-- User Sidebar -->
<div class="user-sidebar">
  <div class="sidebar-inner">
    <div class="sidebar-logo">
      <a href="<?php echo e(route('home')); ?>">
        <img src="<?php echo e(asset('images/logo-main.svg')); ?>" alt="Is Yours" title="Is Yours">
      </a>
    </div>
    
    <ul class="navigation">
      <li class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('home')); ?>"> 
          <i class="la la-home"></i> Dashboard
        </a>
      </li>
      
      <li class="<?php echo e(request()->routeIs('web.offer.index') || request()->routeIs('web.offer.show') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.offer.index')); ?>">
          <i class="la la-briefcase"></i> Jobs
        </a>
      </li>

      <?php if(!session('admin') && !session('employer')): ?>
      <li class="<?php echo e(request()->routeIs('web.candidate.my_applications') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.candidate.my_applications')); ?>">
          <i class="la la-file-alt"></i> My Applications
        </a>
      </li>
      <?php endif; ?>

      <?php if(session('admin') || session('employer')): ?>
      <li class="<?php echo e(request()->routeIs('web.offer.create') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.offer.create')); ?>">
          <i class="la la-paper-plane"></i> Post a Job
        </a>
      </li>
      <?php endif; ?>

      <?php if(session('admin') || session('employer')): ?>
      <li class="<?php echo e(request()->routeIs('web.candidate.index') || request()->routeIs('web.candidate.show') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.candidate.index')); ?>">
          <i class="la la-users"></i> Candidates
        </a>
      </li>
      <?php endif; ?>

      <?php if(session('employer')): ?>
      <li class="<?php echo e(request()->routeIs('web.company.create') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.company.create')); ?>">
          <i class="la la-user-tie"></i> Company Profile
        </a>
      </li>
      <?php endif; ?>

      <li class="<?php echo e(request()->routeIs('web.profile.edit') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.profile.edit')); ?>">
          <i class="la la-user-alt"></i> My Profile
        </a>
      </li>

      <li>
        <a href="#">
          <i class="la la-bell"></i> Notifications
        </a>
      </li>

      

      <li class="<?php echo e(request()->routeIs('web.profile.change_password') ? 'active' : ''); ?>">
        <a href="<?php echo e(route('web.profile.change_password')); ?>">
          <i class="la la-lock"></i> Change Password
        </a>
      </li>

      <li>
        <a href="<?php echo e(route('log_out')); ?>">
          <i class="la la-sign-out"></i> Logout
        </a>
      </li>
    </ul>
  </div>
</div>

<!-- Mobile Sidebar Offcanvas -->
<div class="offcanvas offcanvas-start mobile-sidebar" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navigation">
      <li><a href="<?php echo e(route('home')); ?>"><i class="la la-home"></i> Dashboard</a></li>
      <li><a href="<?php echo e(route('web.offer.index')); ?>"><i class="la la-briefcase"></i> Jobs</a></li>
      
      <?php if(!session('admin') && !session('employer')): ?>
      <li><a href="<?php echo e(route('web.candidate.my_applications')); ?>"><i class="la la-file-alt"></i> My Applications</a></li>
      <?php endif; ?>
      
      <?php if(session('admin') || session('employer')): ?>
      <li><a href="<?php echo e(route('web.offer.create')); ?>"><i class="la la-paper-plane"></i> Post a Job</a></li>
      <?php endif; ?>

      <?php if(session('admin') || session('employer')): ?>
      <li><a href="<?php echo e(route('web.candidate.index')); ?>"><i class="la la-users"></i> Candidates</a></li>
      <?php endif; ?>

      <?php if(session('employer')): ?>
      <li><a href="<?php echo e(route('web.company.create')); ?>"><i class="la la-user-tie"></i> Company Profile</a></li>
      <?php endif; ?>

      <li><a href="<?php echo e(route('web.profile.edit')); ?>"><i class="la la-user-alt"></i> My Profile</a></li>
      <li><a href="#"><i class="la la-bell"></i> Notifications</a></li>
      
      <li><a href="<?php echo e(route('web.profile.change_password')); ?>"><i class="la la-lock"></i> Change Password</a></li>
      <li><a href="<?php echo e(route('log_out')); ?>"><i class="la la-sign-out"></i> Logout</a></li>
    </ul>
  </div>
</div>

<style>
/* ===== Sidebar Improvements ===== */
.user-sidebar {
  background: #ffffff !important;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
  border-radius: 12px;
  margin: 20px;
  margin-right: 10px;
  overflow: hidden;
  position: fixed;
  top: 0;
  left: 0;
  width: 260px;
  height: calc(100vh - 40px);
  display: flex;
  flex-direction: column;
}

/* Sidebar Logo */
.sidebar-logo {
  padding: 18px 15px;
  text-align: center;
  border-bottom: 1px solid #e5e7eb;
  background: #ffffff;
  flex-shrink: 0;
}

.sidebar-logo img {
  max-width: 110px;
  height: auto;
  opacity: 0.9;
}

/* Navigation Improvements */
.user-sidebar .navigation {
  padding: 12px 0;
  flex: 1;
  overflow-y: auto;
  overflow-x: hidden;
}

.user-sidebar .navigation li {
  margin: 2px 10px;
  border-radius: 6px;
  transition: all 0.2s ease;
}

.user-sidebar .navigation li a {
  color: #6b7280 !important;
  padding: 10px 12px;
  border-radius: 6px;
  font-size: 0.938rem;
  font-weight: 500;
  display: flex;
  align-items: center;
  transition: all 0.2s ease;
}

.user-sidebar .navigation li a i {
  font-size: 1.125rem;
  width: 24px;
  margin-right: 10px;
  color: #9ca3af;
  transition: all 0.2s ease;
}

.user-sidebar .navigation li:hover a,
.user-sidebar .navigation li.active a {
  background: #ffffff;
  color: #1f2937 !important;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.user-sidebar .navigation li:hover a i,
.user-sidebar .navigation li.active a i {
  color: #4f46e5;
}

/* Mobile Header */
.mobile-header {
  background: #ffffff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  padding: 10px 0;
}

/* Mobile Sidebar */
.mobile-sidebar .navigation {
  list-style: none;
  padding: 10px;
}

.mobile-sidebar .navigation li {
  border-bottom: none;
  margin-bottom: 3px;
  border-radius: 6px;
  transition: all 0.2s ease;
}

.mobile-sidebar .navigation li:hover {
  background: #f8f9fa;
}

.mobile-sidebar .navigation li a {
  display: flex;
  align-items: center;
  padding: 9px 12px;
  text-decoration: none;
  color: #374151;
  font-size: 0.813rem;
  font-weight: 500;
  transition: all 0.2s ease;
}

.mobile-sidebar .navigation li:hover a {
  color: #4f46e5;
}

.mobile-sidebar .navigation li a i {
  font-size: 1rem;
  margin-right: 9px;
  width: 22px;
  text-align: center;
  color: #4f46e5;
}

.mobile-nav-toggler {
  background: transparent;
  border: none;
  font-size: 20px;
  padding: 8px;
  cursor: pointer;
  color: #4f46e5;
}

/* Hide main header */
.main-header {
  display: none;
}

/* Responsive adjustments */
@media (max-width: 991.98px) {
  .user-sidebar {
    display: none;
  }
}
</style>

<!--End Main Header --><?php /**PATH C:\laragon\www\isyours\resources\views\partials\header_candidate.blade.php ENDPATH**/ ?>
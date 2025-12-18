<?php $__env->startSection('content'); ?>
 
    <!--Page Title-->
    <section class="page-title">
      <div class="auto-container">
        <div class="title-outer">
          <h1>Showing All Resumes</h1>
        </div>
      </div>
    </section>
    <!--End Page Title-->

    <!-- Listing Section -->
    <section class="ls-section">
      <div class="auto-container">
        <div class="filters-backdrop"></div>

        <div class="row">

          <!-- Filters Column -->
          


          <!-- Content Column -->
          
          <div class="content-column col-lg-12 col-md-12 col-sm-12">
            <div class="ls-outer">
              <button type="button" class="theme-btn btn-style-two toggle-filters">Show Filters</button>

              <!-- ls Switcher -->
              <div class="ls-switcher">
                <div class="showing-result">
                  <div class="text">Showing  <strong><?php echo e(count($candidates)); ?></strong> candidates</div>
                </div>
                
              </div>


              <!-- Candidate block three -->
              <?php $__currentLoopData = $candidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="candidate-block-three">
                <div class="inner-box">
                  <div class="content">
                  <figure class="image"><img src="<?php echo e(asset('images/resource/candidate-1.png')); ?>" alt=""></figure>
                  <h4 class="name"><a href="#"><?php echo e($candidate->first_name ?? ''); ?> <?php echo e($candidate->last_name ?? ''); ?></a></h4>
                  <ul class="candidate-info">
                    <li class="designation"><?php echo e($candidate->email ?? ''); ?></li>
                    
                  </ul>
                  <ul class="post-tags">
                    <li><i class="icon flaticon-diploma"></i>
                      <?php echo e($candidate->educationLevel->name ?? '-'); ?></li>
                    <li><span class="icon flaticon-notebook"></span>
                      <?php echo e($candidate->visa->name ?? '-'); ?></li>
                    <li><span class="icon flaticon-pin"></span> <?php echo e($candidate->city->name ?? ''); ?>, <?php echo e($candidate->city->state->code ?? ''); ?></li>
        
                      
                    <?php if($candidate->have_vehicle): ?>
                      <li><span class="icon flaticon-car"></span><?php echo e(' '); ?>

                        <span class="icon flaticon-checked"> <?php echo e($candidate->license_plates); ?></span>
                      </li>
                    <?php else: ?>
                      <li><span class="icon flaticon-car"></span><?php echo e(' '); ?>

                        <span class="icon flaticon-cancel"></span>
                      </li>
                    <?php endif; ?>
                  </ul>
                  </div>
                  <div class="btn-box">
                  <a href="tel:<?php echo e($candidate->phone_number); ?>" class="theme-btn btn-style-three"><span class="icon flaticon-phone"></span></a>
                  <a href="<?php echo e(route('web.candidate.show', $candidate->id)); ?>"  class="theme-btn btn-style-three">
                    <i class="fas fa-user-circle"></i>
                  </a>
                  </div> 
                  
                </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <!-- Listing Show More -->
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Listing Page Section -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\candidates\index.blade.php ENDPATH**/ ?>
 <!-- Job Detail Section -->
 <section class="job-detail-section">
     <!-- Upper Box -->
     <div class="upper-box">
         <div class="auto-container <?php echo e(!is_null($offer->company) ? 'row' : ''); ?>">
             <!-- Job Block -->
             <div class="job-block-seven  <?php echo e(!is_null($offer->company) ? 'col-lg-8' : 'col-lg-12'); ?> col-md-12 col-sm-12">
                 <div class="inner-box">
                     <div class="content" style="padding-left:0px;">
                         
                         <h4><a id="server_position" href="#"><?php echo e($offer->jobLevel->name ?? ''); ?> /
                                 <?php echo e($offer->jobLevel->name ?? ''); ?></a></h4>
                         <ul class="job-other-info">
                             <li class="time"><?php echo e($offer->jobType->name ?? ''); ?></li>
                             <li class="time"><span class="icon flaticon-clock-3"></span>
                                 <?php echo e(\Carbon\Carbon::parse($offer->created_at)->diffForHumans()); ?></li>
                         </ul>
                     </div>
                    <?php if(!session('admin') && !session('employer')): ?>    
                        <?php if($company == null): ?>
                                <a href="<?php echo e(route('web.offer.apply_offer', ['offer_id' => $offer->id])); ?>"
                                    class="theme-btn btn-style-one">Apply For Job</a>
                                <!-- <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button> -->
                            </div>
                        <?php else: ?>
                            <div class="btn-box">
                                <a href="<?php echo e(route('web_login')); ?>"
                                    class="theme-btn btn-style-one">Login to Apply</a>
                                <!-- <button class="bookmark-btn"><i class="flaticon-bookmark"></i></button> -->
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                     


                 </div>

                 <div class="job-overview-two">
                     <ul>
                         <li>
                             <i class="icon icon-calendar"></i>
                             <h5>Experience:</h5>
                             <span><?php echo e($offer->years_of_experience); ?>

                                 <?php echo e(Illuminate\Support\Str::plural('year', $offer->years_of_experience)); ?></span>
                         </li>
                         <li>
                             <i class="icon icon-degree"></i>
                             <h5>Education Level:</h5>
                             <span><?php echo e($offer->educationLevel->name); ?></span>
                         </li>
                         <li>
                             <i class="icon icon-expiry"></i>
                             <h5>Expiration date:</h5>
                             <span><?php echo e(\Carbon\Carbon::parse($offer->expiration_date)->diffForHumans()); ?></span>
                         </li>
                         <li>
                             <i class="icon icon-location"></i>
                             <h5>Location:</h5>
                             <span><?php echo e($offer->city->name ?? ''); ?>, <?php echo e($offer->city->state->code ?? ''); ?></span>
                         </li>
                         
                         
                         <li>
                             <i class="icon icon-rate"></i>
                             <h5>Rate:</h5>
                             <span>$<?php echo e($offer->rate ?? ''); ?> / hour</span>
                         </li>
                         <li>
                             <i class="icon icon-salary"></i>
                             <h5>Salary:</h5>
                             <span>$<?php echo e($offer->offered_salary ?? ''); ?></span>
                         </li>
                     </ul>
                 </div>
                 <div class="job-detail-outer" style="padding: 0px;">
                     <div class="auto-container">
                         <div class="row">
                             <div class="content-column col-lg-8 col-md-12 col-sm-12">
                                 <div class="job-detail">
                                     <h4>Job Description</h4>
                                     <p id="job_description"><?php echo e($offer->description ?? ''); ?></h4>
                                 </div>

                                 <div class="job-detail">
                                     <h4>Key Responsibilities</h4>
                                     <ul id="skill_list" class="list-style-three">
                                         <?php $__currentLoopData = $offer->keyResponsabilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $responsability): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li><?php echo e($responsability->responsability); ?></li>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

             <?php if(!is_null($offer->company)): ?>
             <div class="col-lg-4 col-md-12 col-sm-12">
              <aside class="sidebar">
                  <div class="sidebar-widget company-widget">
                      <div class="widget-content">
                          
        
                          <ul class="company-info">
                              <li>Company: <span><?php echo e($offer->company->name); ?></span></li>
                              
                              <li>Phone: <span><?php echo e($offer->company->phone); ?></span></li>
                              <li>Email: <span><?php echo e($offer->company->email); ?></span></li>
                          </ul>
        
                          <div class="btn-box"><a target="_blank" href="<?php echo e($offer->company->website); ?>"
                                  class="theme-btn btn-style-three"><?php echo e($offer->company->website); ?></a></div>
                      </div>
                  </div>
              </aside>
          </div>
          <?php endif; ?>
            

         </div>
        
     

    



 </section>
 <!-- End Job Detail Section -->
<?php /**PATH C:\laragon\www\isyours\resources\views\offer\partial_job_detail.blade.php ENDPATH**/ ?>
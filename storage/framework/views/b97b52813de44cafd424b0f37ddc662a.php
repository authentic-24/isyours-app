<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials/errors_div', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Company Profile</h1>
            </div>
        </div>
    </section>

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                <div class="col-lg-12">

                    <!-- Ls widget -->
                    <div class="ls-widget">
                        

                        <div class="widget-content">

                            

                            <form class="default-form" action="<?php echo e(isset($company) ? route('edit_company_profile') : route('create_company_profile')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php if(isset($company)): ?>
                                    <input type="hidden" name="id" id="id" value="<?php echo e($company->id); ?>">
                                <?php endif; ?>
                                <div class="row">
                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Company name</label>
                                        <input type="text" name="name" placeholder="Company Name" value="<?php echo e(isset($company) ? $company->name : old('name')); ?>" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Email address</label>
                                        <input type="email" name="email" placeholder="" value="<?php echo e(isset($company) ? $company->email : old('email')); ?>" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Phone</label>
                                        <input type="text" name="phone" placeholder="" value="<?php echo e(isset($company) ? $company->phone : old('phone')); ?>" required>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>Website</label>
                                        <input type="text" name="website" value="<?php echo e(isset($company) ? $company->website : old('website')); ?>" placeholder="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12">
                                        <label>LLC</label>
                                        <input type="text" name="llc" value="<?php echo e(isset($company) ? $company->llc : old('llc')); ?>" placeholder="">
                                    </div>

                                    <!-- Search Select -->
                                    

                                    <!-- Input -->
                                    

                                    <!-- About Company -->
                                    <div class="form-group col-lg-12 col-md-12">
                                        <label>About Company</label>
                                        <textarea name="about" placeholder="" required><?php echo e(isset($company) ? $company->about : old('about')); ?></textarea>
                                    </div>

                                    <!-- Input -->
                                    <div class="form-group col-lg-6 col-md-12">
                                        <button type="submit" class="theme-btn btn-style-one">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                </div>

                <!-- Ls widget -->
                

                <!-- Ls widget -->
                

            </div>


        </div>  
        </div>
    </section>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\isyours\resources\views\company\create.blade.php ENDPATH**/ ?>
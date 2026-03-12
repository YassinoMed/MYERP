<?php if(isset($users) && !empty($users) && count($users) > 0): ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-sm-6">
            <div class="card hover-shadow-lg">
                <div class="card-body text-center">
                    <div class="avatar-parent-child">
                        <img <?php echo e($user->img_avatar); ?> class="avatar rounded-circle avatar-lg">
                    </div>
                    <h5 class="h6 mt-4 mb-0">
                        <p><?php echo e($user->name); ?></p>
                    </h5>
                    <p class="d-block text-sm text-muted mb-3"><?php echo e($user->email); ?></p>
                </div>
                <div class="card-body border-top">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-6 text-center">
                            <span class="d-block h4 mb-0"><?php echo e(count($user->contacts)); ?></span>
                            <span class="d-block text-sm text-muted"><?php echo e(__('Contacts')); ?></span>
                        </div>
                        <div class="col-6 text-center">
                            <span class="d-block h4 mb-0"><?php echo e($user->projects->count()); ?></span>
                            <span class="d-block text-sm text-muted"><?php echo e(__('Projects')); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <div class="col-xl-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h6 class="text-center mb-0"><?php echo e(__('No User Found.')); ?></h6>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/dashboard/view.blade.php ENDPATH**/ ?>
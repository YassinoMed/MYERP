<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Visitor Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('visitors.index')); ?>"><?php echo e(__('Visitors')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detail')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5><?php echo e($visitor->visitor_name); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Company')); ?>:</strong> <?php echo e($visitor->company_name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Host')); ?>:</strong> <?php echo e(optional($visitor->host)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($visitor->email ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e($visitor->phone ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Visit Date')); ?>:</strong> <?php echo e(Auth::user()->dateFormat($visitor->visit_date)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Visit Time')); ?>:</strong> <?php echo e($visitor->visit_time ? Auth::user()->timeFormat($visitor->visit_time) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $visitor->status)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Badge Number')); ?>:</strong> <?php echo e($visitor->badge_number ?: '-'); ?></div>
                        <div class="col-12"><strong><?php echo e(__('Purpose')); ?>:</strong><p class="text-muted mb-0"><?php echo e($visitor->purpose ?: '-'); ?></p></div>
                        <div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="text-muted mb-0"><?php echo e($visitor->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/visitors/show.blade.php ENDPATH**/ ?>
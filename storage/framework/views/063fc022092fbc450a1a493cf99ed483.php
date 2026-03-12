<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cap Table Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('cap-table.index')); ?>"><?php echo e(__('Cap Table')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detail')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5><?php echo e($capTable->holder_name); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e(__(ucfirst($capTable->holder_type))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Share Class')); ?>:</strong> <?php echo e($capTable->share_class ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Share Count')); ?>:</strong> <?php echo e($capTable->share_count); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Issue Price')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($capTable->issue_price)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Ownership %')); ?>:</strong> <?php echo e($capTable->ownership_percentage); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Voting %')); ?>:</strong> <?php echo e($capTable->voting_percentage); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($capTable->contact_email ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e($capTable->contact_phone ?: '-'); ?></div>
                        <div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="text-muted mb-0"><?php echo e($capTable->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/cap_table/show.blade.php ENDPATH**/ ?>
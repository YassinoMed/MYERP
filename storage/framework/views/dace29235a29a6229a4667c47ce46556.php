<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Partner Details')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('partners.index')); ?>"><?php echo e(__('Partners')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($partner->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row"><div class="col-12"><div class="card"><div class="card-body">
        <div class="row gy-3">
            <div class="col-md-4"><strong><?php echo e(__('Code')); ?>:</strong> <?php echo e($partner->partner_code); ?></div>
            <div class="col-md-4"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e(__(ucfirst($partner->partner_type))); ?></div>
            <div class="col-md-4"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($partner->status))); ?></div>
            <div class="col-md-4"><strong><?php echo e(__('Contact')); ?>:</strong> <?php echo e($partner->contact_name ?: '-'); ?></div>
            <div class="col-md-4"><strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($partner->email ?: '-'); ?></div>
            <div class="col-md-4"><strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e($partner->phone ?: '-'); ?></div>
            <div class="col-md-6"><strong><?php echo e(__('Customer')); ?>:</strong> <?php echo e(optional($partner->customer)->name ?: '-'); ?></div>
            <div class="col-md-6"><strong><?php echo e(__('Vendor')); ?>:</strong> <?php echo e(optional($partner->vender)->name ?: '-'); ?></div>
            <div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><div class="text-muted"><?php echo e($partner->notes ?: '-'); ?></div></div>
        </div>
    </div></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/partners/show.blade.php ENDPATH**/ ?>
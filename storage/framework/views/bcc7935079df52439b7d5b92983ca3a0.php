<?php $__env->startSection('page-title'); ?><?php echo e(__('Data Consent')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('data-consents.index')); ?>"><?php echo e(__('Data Consents')); ?></a></li><li class="breadcrumb-item"><?php echo e($dataConsent->subject_name); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><div class="row gy-2">
<div class="col-md-6"><strong><?php echo e(__('Subject')); ?>:</strong> <?php echo e($dataConsent->subject_name); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e($dataConsent->subject_type ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Reference')); ?>:</strong> <?php echo e($dataConsent->subject_reference ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Purpose')); ?>:</strong> <?php echo e($dataConsent->purpose ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Channel')); ?>:</strong> <?php echo e($dataConsent->channel ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(ucfirst($dataConsent->status)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Consented At')); ?>:</strong> <?php echo e($dataConsent->consented_at ? Auth::user()->dateFormat($dataConsent->consented_at) : '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Expires At')); ?>:</strong> <?php echo e($dataConsent->expires_at ? Auth::user()->dateFormat($dataConsent->expires_at) : '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Evidence Reference')); ?>:</strong> <?php echo e($dataConsent->evidence_reference ?: '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><div class="text-muted"><?php echo e($dataConsent->notes ?: '-'); ?></div></div>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/data_consents/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?><?php echo e(__('GDPR Activity')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('gdpr-activities.index')); ?>"><?php echo e(__('GDPR Register')); ?></a></li><li class="breadcrumb-item"><?php echo e($gdprActivity->activity_code); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><div class="row gy-2">
<div class="col-md-6"><strong><?php echo e(__('Activity')); ?>:</strong> <?php echo e($gdprActivity->activity_name); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(ucfirst(str_replace('_', ' ', $gdprActivity->status))); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Data Category')); ?>:</strong> <?php echo e($gdprActivity->data_category ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Purpose')); ?>:</strong> <?php echo e($gdprActivity->purpose ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Lawful Basis')); ?>:</strong> <?php echo e($gdprActivity->lawful_basis ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Processor')); ?>:</strong> <?php echo e($gdprActivity->processor_name ?: '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Retention Period')); ?>:</strong> <?php echo e($gdprActivity->retention_period ?: '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><div class="text-muted"><?php echo e($gdprActivity->notes ?: '-'); ?></div></div>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/gdpr_processing_activities/show.blade.php ENDPATH**/ ?>
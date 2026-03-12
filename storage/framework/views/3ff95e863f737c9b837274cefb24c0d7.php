<?php $__env->startSection('page-title'); ?><?php echo e(__('Configuration Item')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('configuration-items.index')); ?>"><?php echo e(__('CMDB')); ?></a></li><li class="breadcrumb-item"><?php echo e($configurationItem->name); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><div class="row gy-2">
<div class="col-md-6"><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($configurationItem->name); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e($configurationItem->ci_type ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(ucfirst($configurationItem->status)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Criticality')); ?>:</strong> <?php echo e(ucfirst($configurationItem->criticality ?: '-')); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Owner')); ?>:</strong> <?php echo e(optional($configurationItem->owner)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Asset')); ?>:</strong> <?php echo e(optional($configurationItem->asset)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Asset Tag')); ?>:</strong> <?php echo e($configurationItem->asset_tag ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Serial Number')); ?>:</strong> <?php echo e($configurationItem->serial_number ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Location')); ?>:</strong> <?php echo e($configurationItem->location ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Environment')); ?>:</strong> <?php echo e($configurationItem->environment ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Vendor')); ?>:</strong> <?php echo e($configurationItem->vendor_name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Acquired At')); ?>:</strong> <?php echo e($configurationItem->acquired_at ? Auth::user()->dateFormat($configurationItem->acquired_at) : '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><div class="text-muted"><?php echo e($configurationItem->notes ?: '-'); ?></div></div>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/configuration_items/show.blade.php ENDPATH**/ ?>
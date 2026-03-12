<?php $__env->startSection('page-title'); ?><?php echo e(__('Software License')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('software-licenses.index')); ?>"><?php echo e(__('Software Licenses')); ?></a></li><li class="breadcrumb-item"><?php echo e($softwareLicense->name); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><div class="row gy-2">
<div class="col-md-6"><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($softwareLicense->name); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(ucfirst($softwareLicense->status)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Vendor')); ?>:</strong> <?php echo e($softwareLicense->vendor_name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e($softwareLicense->license_type ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Assigned User')); ?>:</strong> <?php echo e(optional($softwareLicense->assignedUser)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Configuration Item')); ?>:</strong> <?php echo e(optional($softwareLicense->configurationItem)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Seats')); ?>:</strong> <?php echo e($softwareLicense->seats_used); ?>/<?php echo e($softwareLicense->seats_total); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Renewal Date')); ?>:</strong> <?php echo e($softwareLicense->renewal_date ? Auth::user()->dateFormat($softwareLicense->renewal_date) : '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Cost')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($softwareLicense->cost)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('License Key')); ?>:</strong> <?php echo e($softwareLicense->license_key ?: '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><div class="text-muted"><?php echo e($softwareLicense->notes ?: '-'); ?></div></div>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/software_licenses/show.blade.php ENDPATH**/ ?>
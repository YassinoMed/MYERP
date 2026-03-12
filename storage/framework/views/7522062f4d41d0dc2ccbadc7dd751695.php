<?php $__env->startSection('page-title'); ?><?php echo e(__('Security Incident')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><a href="<?php echo e(route('security-incidents.index')); ?>"><?php echo e(__('Security Incidents')); ?></a></li><li class="breadcrumb-item"><?php echo e($securityIncident->incident_reference); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><div class="row gy-2">
<div class="col-md-6"><strong><?php echo e(__('Title')); ?>:</strong> <?php echo e($securityIncident->title); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Reference')); ?>:</strong> <?php echo e($securityIncident->incident_reference); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e($securityIncident->incident_type ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Severity')); ?>:</strong> <?php echo e(ucfirst($securityIncident->severity)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(ucfirst($securityIncident->status)); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Affected Module')); ?>:</strong> <?php echo e($securityIncident->affected_module ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Reported By')); ?>:</strong> <?php echo e(optional($securityIncident->reporter)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Owner')); ?>:</strong> <?php echo e(optional($securityIncident->owner)->name ?: '-'); ?></div>
<div class="col-md-6"><strong><?php echo e(__('Detected At')); ?>:</strong> <?php echo e($securityIncident->detected_at ? Auth::user()->dateFormat($securityIncident->detected_at) : '-'); ?></div>
<div class="col-12"><strong><?php echo e(__('Summary')); ?>:</strong><div class="text-muted"><?php echo e($securityIncident->summary ?: '-'); ?></div></div>
<div class="col-md-6"><strong><?php echo e(__('Containment Actions')); ?>:</strong><div class="text-muted"><?php echo e($securityIncident->containment_actions ?: '-'); ?></div></div>
<div class="col-md-6"><strong><?php echo e(__('Resolution Notes')); ?>:</strong><div class="text-muted"><?php echo e($securityIncident->resolution_notes ?: '-'); ?></div></div>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/security_incidents/show.blade.php ENDPATH**/ ?>
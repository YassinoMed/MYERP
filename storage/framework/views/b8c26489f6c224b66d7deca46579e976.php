<?php $__env->startSection('page-title', __('Saved Reports')); ?>
<?php $__env->startSection('page-subtitle', __('Share operational reports, track usage and schedule recurring deliveries.')); ?>
<?php $__env->startSection('action-btn'); ?><a href="<?php echo e(route('core.reports.create')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mb-3">
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Reports')); ?></span><h3 class="mb-0"><?php echo e($reportStats['total']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Shared')); ?></span><h3 class="mb-0"><?php echo e($reportStats['shared']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Schedules')); ?></span><h3 class="mb-0"><?php echo e($reportStats['scheduled']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Active schedules')); ?></span><h3 class="mb-0"><?php echo e($reportStats['activeSchedules']); ?></h3></div></div></div>
</div>
<div class="d-flex justify-content-end mb-3">
    <form method="POST" action="<?php echo e(route('core.reports.schedule.dispatch-due')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-sm btn-primary"><?php echo e(__('Queue Due Report Deliveries')); ?></button>
    </form>
</div>
<div class="card"><div class="card-body table-border-style"><table class="table"><thead><tr><th><?php echo e(__('Name')); ?></th><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Shared')); ?></th><th><?php echo e(__('Last Run')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead><tbody><?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($report->name); ?></td><td><?php echo e($report->report_type); ?></td><td><?php echo e($report->is_shared ? __('Yes') : __('No')); ?></td><td><?php echo e(optional($report->last_run_at)->diffForHumans() ?: '-'); ?></td><td><a class="btn btn-sm btn-warning" href="<?php echo e(route('core.reports.show', $report)); ?>"><?php echo e(__('Open')); ?></a></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/reports.blade.php ENDPATH**/ ?>
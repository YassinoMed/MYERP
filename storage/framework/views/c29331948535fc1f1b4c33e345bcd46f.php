<?php $__env->startSection('page-title', __('Automation Rules')); ?>
<?php $__env->startSection('breadcrumb'); ?><li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li><li class="breadcrumb-item"><?php echo e(__('Automation Rules')); ?></li><?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?><a href="<?php echo e(route('automation-rules.create')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mb-3">
<div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Rules')); ?></span><h3 class="mb-0"><?php echo e($stats['rules']); ?></h3></div></div></div>
<div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Active')); ?></span><h3 class="mb-0"><?php echo e($stats['active']); ?></h3></div></div></div>
<div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Triggered')); ?></span><h3 class="mb-0"><?php echo e($stats['triggered']); ?></h3></div></div></div>
<div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Failed Logs')); ?></span><h3 class="mb-0"><?php echo e($stats['failedLogs']); ?></h3></div></div></div>
</div>
<div class="card mb-3"><div class="card-body table-border-style"><div class="table-responsive"><table class="table">
<thead><tr><th><?php echo e(__('Name')); ?></th><th><?php echo e(__('Event')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Priority')); ?></th><th><?php echo e(__('Last Triggered')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
<tbody>
<?php $__empty_0 = true; $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
<tr><td><?php echo e($rule->name); ?></td><td><code><?php echo e($rule->event_name); ?></code></td><td><span class="badge <?php echo e($rule->is_active ? 'bg-success' : 'bg-secondary'); ?>"><?php echo e($rule->is_active ? __('Active') : __('Paused')); ?></span></td><td><?php echo e($rule->priority); ?></td><td><?php echo e(optional($rule->last_triggered_at)->diffForHumans() ?: '-'); ?></td><td class="d-flex gap-2 flex-wrap"><a class="btn btn-sm btn-warning" href="<?php echo e(route('automation-rules.show', $rule)); ?>"><?php echo e(__('View')); ?></a><a class="btn btn-sm btn-info" href="<?php echo e(route('automation-rules.edit', $rule)); ?>"><?php echo e(__('Edit')); ?></a><form method="POST" action="<?php echo e(route('automation-rules.toggle-status', $rule)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-secondary"><?php echo e($rule->is_active ? __('Pause') : __('Activate')); ?></button></form><form method="POST" action="<?php echo e(route('automation-rules.duplicate', $rule)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-light"><?php echo e(__('Duplicate')); ?></button></form><form method="POST" action="<?php echo e(route('automation-rules.destroy', $rule)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-danger"><?php echo e(__('Delete')); ?></button></form></td></tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
<tr><td colspan="6" class="text-muted"><?php echo e(__('No automation rules found.')); ?></td></tr>
<?php endif; ?>
</tbody></table></div></div></div>

<div class="card">
    <div class="card-header"><h5 class="mb-0"><?php echo e(__('Recent Failed Executions')); ?></h5></div>
    <div class="card-body table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead><tr><th><?php echo e(__('Rule')); ?></th><th><?php echo e(__('Event')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Triggered')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
                <tbody>
                <?php $__empty_0 = true; $__currentLoopData = $recentFailedLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                    <tr>
                        <td><?php echo e(optional($log->automationRule)->name ?: ('#'.$log->automation_rule_id)); ?></td>
                        <td><code><?php echo e($log->event_name); ?></code></td>
                        <td><?php echo e(ucfirst($log->status)); ?></td>
                        <td><?php echo e(optional($log->triggered_at)->diffForHumans() ?: '-'); ?></td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <?php if($log->automationRule): ?>
                                    <a class="btn btn-sm btn-warning" href="<?php echo e(route('automation-rules.show', $log->automationRule)); ?>"><?php echo e(__('Open Rule')); ?></a>
                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('automation-logs.retry', $log)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-primary"><?php echo e(__('Retry')); ?></button></form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                    <tr><td colspan="5" class="text-muted"><?php echo e(__('No failed automation execution found.')); ?></td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/automation_rule/index.blade.php ENDPATH**/ ?>
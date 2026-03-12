<?php $__env->startSection('page-title', $automationRule->name); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-md-5">
    <div class="card mb-3"><div class="card-header"><h5><?php echo e(__('Rule Definition')); ?></h5></div><div class="card-body"><pre class="small"><?php echo e(json_encode(['conditions' => $automationRule->conditions, 'actions' => $automationRule->actions], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre></div></div>
    <div class="card"><div class="card-header"><h5><?php echo e(__('Rule Catalog')); ?></h5></div><div class="card-body small">
        <div class="mb-2"><strong><?php echo e(__('Suggested events')); ?>:</strong> <?php echo e(implode(', ', $eventCatalog ?? [])); ?></div>
        <div class="mb-2"><strong><?php echo e(__('Suggested fields')); ?>:</strong> <?php echo e(implode(', ', $conditionFields ?? [])); ?></div>
        <div><strong><?php echo e(__('Available actions')); ?>:</strong> <?php echo e(implode(', ', array_keys($actionCatalog ?? []))); ?></div>
    </div></div>
</div>
<div class="col-md-7">
    <div class="card mb-3">
        <div class="card-header"><h5><?php echo e(__('Simulation')); ?></h5></div>
        <div class="card-body">
            <p class="text-muted small"><?php echo e(__('Run the rule again against a previously logged record to validate conditions and actions without editing the rule.')); ?></p>
            <form method="POST" action="<?php echo e(route('automation-rules.simulate', $automationRule)); ?>" class="row g-2 align-items-end">
                <?php echo csrf_field(); ?>
                <div class="col-md-9">
                    <label class="form-label"><?php echo e(__('Execution sample')); ?></label>
                    <select name="automation_log_id" class="form-control" required>
                        <option value=""><?php echo e(__('Select a previous execution context')); ?></option>
                        <?php $__currentLoopData = $simulationCandidates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($candidate->id); ?>">#<?php echo e($candidate->id); ?> · <?php echo e($candidate->event_name); ?> · <?php echo e($candidate->model_type); ?>#<?php echo e($candidate->model_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3 d-grid">
                    <button class="btn btn-primary" <?php if($simulationCandidates->isEmpty()): echo 'disabled'; endif; ?>><?php echo e(__('Simulate')); ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card"><div class="card-header"><h5><?php echo e(__('Execution Logs')); ?></h5></div><div class="card-body"><table class="table"><thead><tr><th>ID</th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Triggered')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead><tbody><?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td>#<?php echo e($log->id); ?></td><td><?php echo e(ucfirst($log->status)); ?></td><td><?php echo e(optional($log->triggered_at)->format('Y-m-d H:i')); ?></td><td class="d-flex gap-2"><?php if(in_array($log->status, ['failed','partial_failed'])): ?><form method="POST" action="<?php echo e(route('automation-logs.retry', $log)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-warning"><?php echo e(__('Retry')); ?></button></form><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table></div></div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/automation_rule/show.blade.php ENDPATH**/ ?>
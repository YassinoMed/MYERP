<?php $__env->startSection('page-title', __('Edit Key Result')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('okr-objectives.index')); ?>"><?php echo e(__('OKR Workspace')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Key Result')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card"><div class="card-body"><form method="POST" action="<?php echo e(route('okr-key-results.update', $okrKeyResult)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Metric')); ?></label><input type="text" name="metric_name" class="form-control" value="<?php echo e(old('metric_name', $okrKeyResult->metric_name)); ?>" required></div>
            <div class="col-md-2 mb-3"><label class="form-label"><?php echo e(__('Start')); ?></label><input type="number" step="0.01" name="start_value" class="form-control" value="<?php echo e(old('start_value', $okrKeyResult->start_value)); ?>"></div>
            <div class="col-md-2 mb-3"><label class="form-label"><?php echo e(__('Target')); ?></label><input type="number" step="0.01" name="target_value" class="form-control" value="<?php echo e(old('target_value', $okrKeyResult->target_value)); ?>" required></div>
            <div class="col-md-2 mb-3"><label class="form-label"><?php echo e(__('Current')); ?></label><input type="number" step="0.01" name="current_value" class="form-control" value="<?php echo e(old('current_value', $okrKeyResult->current_value)); ?>"></div>
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Unit')); ?></label><input type="text" name="unit" class="form-control" value="<?php echo e(old('unit', $okrKeyResult->unit)); ?>"></div>
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Status')); ?></label><select name="status" class="form-control"><?php $__currentLoopData = $keyResultStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($statusKey); ?>" <?php if(old('status', $okrKeyResult->status) == $statusKey): echo 'selected'; endif; ?>><?php echo e(__($statusLabel)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Due date')); ?></label><input type="date" name="due_date" class="form-control" value="<?php echo e(old('due_date', $okrKeyResult->due_date)); ?>"></div>
        </div>
        <div class="text-end"><a href="<?php echo e(route('okr-objectives.show', $okrKeyResult->okr_objective_id)); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a><button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button></div></form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/okr_objectives/edit_key_result.blade.php ENDPATH**/ ?>
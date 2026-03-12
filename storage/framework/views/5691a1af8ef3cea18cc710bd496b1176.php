<?php $__env->startSection('page-title', $approvalFlow->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('approval-flows.index')); ?>"><?php echo e(__('Approval Flows')); ?></a></li>
<li class="breadcrumb-item"><?php echo e($approvalFlow->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <div class="card"><div class="card-header"><h5><?php echo e(__('Steps')); ?></h5></div><div class="card-body">
            <ul class="list-group">
                <?php $__currentLoopData = $approvalFlow->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <strong><?php echo e($step->sequence); ?>. <?php echo e($step->name); ?></strong><br>
                        <small><?php echo e(__('Approver')); ?>: <?php echo e($step->approver_type ?: '-'); ?> #<?php echo e($step->approver_id ?: '-'); ?> | <?php echo e(__('SLA')); ?>: <?php echo e($step->sla_hours ?: '-'); ?>h</small>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div></div>
    </div>
    <div class="col-md-6">
        <div class="card"><div class="card-header"><h5><?php echo e(__('Recent Requests')); ?></h5></div><div class="card-body">
            <table class="table"><thead><tr><th>ID</th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead><tbody>
                <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr><td>#<?php echo e($request->id); ?></td><td><?php echo e(ucfirst($request->status)); ?></td><td><?php echo e(optional($request->due_at)->format('Y-m-d H:i') ?: '-'); ?></td></tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr><td colspan="3" class="text-muted"><?php echo e(__('No requests yet.')); ?></td></tr>
                <?php endif; ?>
            </tbody></table>
        </div></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/approval_flow/show.blade.php ENDPATH**/ ?>
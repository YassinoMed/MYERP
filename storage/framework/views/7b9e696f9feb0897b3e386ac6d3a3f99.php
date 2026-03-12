<?php $__env->startSection('page-title', __('Approval Flows')); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Approval Flows')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<a href="<?php echo e(route('approval-flows.create')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body table-border-style"><div class="table-responsive">
<table class="table">
    <thead><tr><th><?php echo e(__('Name')); ?></th><th><?php echo e(__('Resource')); ?></th><th><?php echo e(__('Steps')); ?></th><th><?php echo e(__('SLA')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
    <tbody>
    <?php $__empty_1 = true; $__currentLoopData = $flows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($flow->name); ?></td>
            <td><?php echo e($flow->resource_type ?: __('Any')); ?></td>
            <td><?php echo e($flow->steps_count); ?></td>
            <td><?php echo e($flow->default_sla_hours ?: '-'); ?></td>
            <td class="d-flex gap-2">
                <a class="btn btn-sm btn-warning" href="<?php echo e(route('approval-flows.show', $flow)); ?>"><?php echo e(__('View')); ?></a>
                <a class="btn btn-sm btn-info" href="<?php echo e(route('approval-flows.edit', $flow)); ?>"><?php echo e(__('Edit')); ?></a>
                <form method="POST" action="<?php echo e(route('approval-flows.destroy', $flow)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn btn-sm btn-danger"><?php echo e(__('Delete')); ?></button></form>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr><td colspan="5" class="text-muted"><?php echo e(__('No approval flows found.')); ?></td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/approval_flow/index.blade.php ENDPATH**/ ?>
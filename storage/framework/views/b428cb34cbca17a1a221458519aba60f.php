<?php $__env->startSection('page-title', __('Approval Request').' #'.$approvalRequest->id); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('approval-requests.index')); ?>"><?php echo e(__('Approval Requests')); ?></a></li>
<li class="breadcrumb-item"><?php echo e('#'.$approvalRequest->id); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-4">
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Request Overview')); ?></h5></div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-5"><?php echo e(__('Flow')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->approvalFlow)->name ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Status')); ?></dt>
                    <dd class="col-sm-7"><span class="badge bg-light text-dark"><?php echo e(ucfirst($approvalRequest->status)); ?></span></dd>
                    <dt class="col-sm-5"><?php echo e(__('Current Step')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->currentStep)->name ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Requested By')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->requester)->name ?: ('#'.$approvalRequest->requested_by)); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Delegated To')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->delegatedUser)->name ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Due At')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->due_at)->format('Y-m-d H:i') ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Escalated')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($approvalRequest->escalated_at)->format('Y-m-d H:i') ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Resource')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(class_basename($approvalRequest->resource_type)); ?>#<?php echo e($approvalRequest->resource_id); ?></dd>
                </dl>
            </div>
        </div>

        <?php if($approvalRequest->status === 'pending'): ?>
            <div class="card mb-3">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Workflow Actions')); ?></h5></div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('approval-requests.approve', $approvalRequest)); ?>" class="mb-3">
                        <?php echo csrf_field(); ?>
                        <label class="form-label"><?php echo e(__('Approval Comment')); ?></label>
                        <textarea name="comment" class="form-control mb-2" rows="2" placeholder="<?php echo e(__('Optional comment')); ?>"></textarea>
                        <button class="btn btn-success"><?php echo e(__('Approve')); ?></button>
                    </form>
                    <form method="POST" action="<?php echo e(route('approval-requests.reject', $approvalRequest)); ?>" class="mb-3">
                        <?php echo csrf_field(); ?>
                        <label class="form-label"><?php echo e(__('Rejection Reason')); ?></label>
                        <textarea name="comment" class="form-control mb-2" rows="2" placeholder="<?php echo e(__('Required when configured by the step')); ?>"></textarea>
                        <button class="btn btn-danger"><?php echo e(__('Reject')); ?></button>
                    </form>
                    <form method="POST" action="<?php echo e(route('approval-requests.delegate', $approvalRequest)); ?>" class="mb-2">
                        <?php echo csrf_field(); ?>
                        <label class="form-label"><?php echo e(__('Delegate To')); ?></label>
                        <select name="delegate_user_id" class="form-control mb-2" required>
                            <option value=""><?php echo e(__('Select user')); ?></option>
                            <?php $__currentLoopData = $delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($delegate->id); ?>"><?php echo e($delegate->name); ?> (<?php echo e($delegate->email); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <button class="btn btn-secondary"><?php echo e(__('Delegate')); ?></button>
                    </form>
                    <form method="POST" action="<?php echo e(route('approval-requests.escalate', $approvalRequest)); ?>">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-warning"><?php echo e(__('Escalate Overdue Requests')); ?></button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-xl-8">
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Context Payload')); ?></h5></div>
            <div class="card-body">
                <pre class="small mb-0"><?php echo e(json_encode($approvalRequest->context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Action History')); ?></h5></div>
            <div class="card-body table-border-style">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Action')); ?></th>
                        <th><?php echo e(__('Step')); ?></th>
                        <th><?php echo e(__('Actor')); ?></th>
                        <th><?php echo e(__('Comment')); ?></th>
                        <th><?php echo e(__('When')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $approvalRequest->actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(ucfirst($action->action)); ?></td>
                            <td><?php echo e(optional($action->step)->name ?: '-'); ?></td>
                            <td><?php echo e(optional($action->actor)->name ?: ('#'.$action->acted_by)); ?></td>
                            <td><?php echo e($action->comment ?: '-'); ?></td>
                            <td><?php echo e(optional($action->created_at)->format('Y-m-d H:i')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No actions recorded yet.')); ?></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/approval_request/show.blade.php ENDPATH**/ ?>
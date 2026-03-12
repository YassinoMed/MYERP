<?php $__env->startSection('page-title', __('Approval Requests')); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Approval Requests')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle', __('Track pending approvals, overdue escalations and delegated workload from one queue.')); ?>
<?php $__env->startSection('content'); ?>
<div class="row mb-3">
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Pending')); ?></span><h3 class="mb-0"><?php echo e($pendingCount); ?></h3></div></div></div>
    <div class="col-md-2"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Assigned To Me')); ?></span><h3 class="mb-0"><?php echo e($assignedCount); ?></h3></div></div></div>
    <div class="col-md-2"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Overdue')); ?></span><h3 class="mb-0"><?php echo e($overdueCount); ?></h3></div></div></div>
    <div class="col-md-2"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Approved')); ?></span><h3 class="mb-0"><?php echo e($approvedCount); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Rejected')); ?></span><h3 class="mb-0"><?php echo e($rejectedCount); ?></h3></div></div></div>
</div>

<?php if($overdueCount > 0): ?>
    <div class="alert alert-warning d-flex justify-content-between align-items-center">
        <div>
            <strong><?php echo e(__('Escalation required')); ?></strong>
            <div class="small text-muted"><?php echo e(__('You have :count overdue requests still pending in the queue.', ['count' => $overdueCount])); ?></div>
        </div>
        <form method="POST" action="<?php echo e(route('approval-requests.escalate-all')); ?>">
            <?php echo csrf_field(); ?>
            <button class="btn btn-sm btn-warning"><?php echo e(__('Run escalation now')); ?></button>
        </form>
    </div>
<?php endif; ?>

<?php if(Auth::user()->can('create approval request') || Auth::user()->can('manage approval request')): ?>
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0"><?php echo e(__('Create Approval Request')); ?></h5>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('approval-requests.store')); ?>" class="row g-3 align-items-end">
                <?php echo csrf_field(); ?>
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Resource')); ?></label>
                    <select name="resource_target" class="form-control" required>
                        <option value=""><?php echo e(__('Select a recent record')); ?></option>
                        <?php $__currentLoopData = $requestableResources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <optgroup label="<?php echo e($group['label']); ?>">
                                <?php $__currentLoopData = $group['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item['value']); ?>"><?php echo e($item['label']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label"><?php echo e(__('Approval Flow')); ?></label>
                    <select name="approval_flow_id" class="form-control">
                        <option value=""><?php echo e(__('Auto-resolve')); ?></option>
                        <?php $__currentLoopData = $flows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($flow->id); ?>"><?php echo e($flow->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label"><?php echo e(__('Amount Override')); ?></label>
                    <input type="number" min="0" step="0.01" name="amount" class="form-control" placeholder="0.00">
                </div>
                <div class="col-md-2 d-grid">
                    <button class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

<div class="card mb-3">
    <div class="card-body">
        <form method="GET" action="<?php echo e(route('approval-requests.index')); ?>" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label"><?php echo e(__('Search')); ?></label>
                <input type="text" name="q" value="<?php echo e($query); ?>" class="form-control" placeholder="<?php echo e(__('Flow, requester, delegate or resource reference')); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label"><?php echo e(__('Flow')); ?></label>
                <select name="flow" class="form-control">
                    <option value=""><?php echo e(__('All flows')); ?></option>
                    <?php $__currentLoopData = $flows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($flow->id); ?>" <?php if((string) $flowId === (string) $flow->id): echo 'selected'; endif; ?>><?php echo e($flow->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label"><?php echo e(__('Status')); ?></label>
                <select name="status" class="form-control">
                    <option value=""><?php echo e(__('All statuses')); ?></option>
                    <option value="pending" <?php if($status === 'pending'): echo 'selected'; endif; ?>><?php echo e(__('Pending')); ?></option>
                    <option value="approved" <?php if($status === 'approved'): echo 'selected'; endif; ?>><?php echo e(__('Approved')); ?></option>
                    <option value="rejected" <?php if($status === 'rejected'): echo 'selected'; endif; ?>><?php echo e(__('Rejected')); ?></option>
                </select>
            </div>
            <div class="col-md-2">
                <div class="form-check mt-4 pt-2">
                    <input class="form-check-input" type="checkbox" name="assigned" value="1" id="assignedFilter" <?php if($assigned): echo 'checked'; endif; ?>>
                    <label class="form-check-label" for="assignedFilter"><?php echo e(__('Only mine')); ?></label>
                </div>
            </div>
            <div class="col-md-1 d-grid">
                <button class="btn btn-primary"><?php echo e(__('Apply')); ?></button>
            </div>
        </form>
    </div>
</div>

<div class="card">
<div class="card-body table-border-style"><div class="table-responsive">
<table class="table">
    <thead><tr><th>#</th><th><?php echo e(__('Flow')); ?></th><th><?php echo e(__('Requester')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Current Step')); ?></th><th><?php echo e(__('Delegated To')); ?></th><th><?php echo e(__('Due')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
    <tbody>
    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>#<?php echo e($request->id); ?></td>
            <td><?php echo e(optional($request->approvalFlow)->name ?: '-'); ?></td>
            <td><?php echo e(optional($request->requester)->name ?: ('#'.$request->requested_by)); ?></td>
            <td>
                <span class="badge <?php echo e($request->status === 'pending' ? 'bg-warning text-dark' : ($request->status === 'approved' ? 'bg-success' : 'bg-danger')); ?>">
                    <?php echo e(ucfirst($request->status)); ?>

                </span>
            </td>
            <td><?php echo e(optional($request->currentStep)->name ?: '-'); ?></td>
            <td><?php echo e(optional($request->delegatedUser)->name ?: '-'); ?></td>
            <td>
                <?php echo e(optional($request->due_at)->format('Y-m-d H:i') ?: '-'); ?>

                <?php if($request->status === 'pending' && $request->due_at && $request->due_at->isPast()): ?>
                    <div class="small text-danger"><?php echo e(__('Overdue')); ?></div>
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo e(route('approval-requests.show', $request)); ?>" class="btn btn-sm btn-light mb-1"><?php echo e(__('Open')); ?></a>
                <?php if($request->status === 'pending'): ?>
                    <div class="d-flex gap-2 flex-wrap">
                        <form method="POST" action="<?php echo e(route('approval-requests.approve', $request)); ?>"><?php echo csrf_field(); ?> <input type="hidden" name="comment" value="Approved from dashboard"><button class="btn btn-sm btn-success"><?php echo e(__('Approve')); ?></button></form>
                        <form method="POST" action="<?php echo e(route('approval-requests.reject', $request)); ?>"><?php echo csrf_field(); ?> <input type="text" name="comment" class="form-control form-control-sm mb-1" placeholder="<?php echo e(__('Reject reason')); ?>"><button class="btn btn-sm btn-danger"><?php echo e(__('Reject')); ?></button></form>
                        <form method="POST" action="<?php echo e(route('approval-requests.delegate', $request)); ?>"><?php echo csrf_field(); ?> <select name="delegate_user_id" class="form-control form-control-sm mb-1" required><option value=""><?php echo e(__('Delegate to')); ?></option><?php $__currentLoopData = $delegates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delegate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($delegate->id); ?>"><?php echo e($delegate->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select><button class="btn btn-sm btn-secondary"><?php echo e(__('Delegate')); ?></button></form>
                        <form method="POST" action="<?php echo e(route('approval-requests.escalate', $request)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-warning"><?php echo e(__('Escalate')); ?></button></form>
                    </div>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php echo e($requests->links()); ?>

</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/approval_request/index.blade.php ENDPATH**/ ?>
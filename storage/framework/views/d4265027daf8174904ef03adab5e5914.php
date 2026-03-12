<?php $__env->startSection('page-title', __('Tenant Onboarding')); ?>
<?php $__env->startSection('page-subtitle', __('Guide tenant setup, monitor quota pressure and activate paid add-ons from a single cockpit.')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-md-5">
    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('Subscription Overview')); ?></h5></div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <div class="text-muted small"><?php echo e(__('Current plan')); ?></div>
                    <h4 class="mb-0"><?php echo e($currentPlan->name ?? __('No active plan')); ?></h4>
                    <div class="small text-muted"><?php echo e($currentPlan ? $currentPlan->price.' / '.$currentPlan->duration : __('Assign a plan to unlock quotas and modules.')); ?></div>
                </div>
                <?php if($pendingPlanRequest): ?>
                    <span class="badge bg-warning text-dark"><?php echo e(__('Pending request')); ?></span>
                <?php endif; ?>
            </div>
            <form method="POST" action="<?php echo e(route('core.onboarding.plan-request.store')); ?>" class="row g-2">
                <?php echo csrf_field(); ?>
                <div class="col-md-7">
                    <label class="form-label"><?php echo e(__('Request plan change')); ?></label>
                    <select name="plan_id" class="form-control" required>
                        <option value=""><?php echo e(__('Select target plan')); ?></option>
                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($plan->id); ?>"><?php echo e($plan->name); ?> · <?php echo e($plan->price); ?> / <?php echo e($plan->duration); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Internal note')); ?></label>
                    <input type="text" name="request_note" class="form-control" placeholder="<?php echo e(__('Why change plan?')); ?>">
                </div>
                <div class="col-12 d-grid">
                    <button class="btn btn-outline-primary" <?php if($pendingPlanRequest): echo 'disabled'; endif; ?>><?php echo e($pendingPlanRequest ? __('Plan request already pending') : __('Submit plan request')); ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <span class="text-muted d-block small"><?php echo e(__('Completion progress')); ?></span>
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h3 class="mb-0"><?php echo e($progress); ?>%</h3>
                <span class="badge bg-light text-dark"><?php echo e(count($checklist->completed_steps ?? [])); ?>/<?php echo e(count($checklist->checklist ?? [])); ?></span>
            </div>
            <div class="progress" style="height:10px;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo e($progress); ?>%;" aria-valuenow="<?php echo e($progress); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <?php if($nextSteps->isNotEmpty()): ?>
                <div class="mt-3">
                    <div class="text-muted small mb-2"><?php echo e(__('Next recommended steps')); ?></div>
                    <ul class="mb-0 ps-3">
                        <?php $__currentLoopData = $nextSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($step['label']); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><?php echo e(__('Activation Checklist')); ?></h5>
            <form method="POST" action="<?php echo e(route('core.onboarding.reset')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-light"><?php echo e(__('Reset assistant')); ?></button></form>
        </div>
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('core.onboarding.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php $__currentLoopData = ($checklist->checklist ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="completed_steps[]" value="<?php echo e($item['key']); ?>" <?php echo e(in_array($item['key'], $checklist->completed_steps ?? []) ? 'checked' : ''); ?>>
                        <label class="form-check-label"><?php echo e($item['label']); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <button class="btn btn-primary mt-2"><?php echo e(__('Save Checklist')); ?></button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5><?php echo e(__('Tenant Usage & Active Addons')); ?></h5>
            <form method="POST" action="<?php echo e(route('core.usages.sync')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn btn-sm btn-outline-primary"><?php echo e(__('Sync quotas from plan')); ?></button>
            </form>
        </div>
        <div class="card-body">
            <?php if($quotaAlerts->isNotEmpty()): ?>
                <div class="alert alert-warning">
                    <strong><?php echo e(__('Quota pressure detected')); ?></strong>
                    <ul class="mb-0 mt-2 ps-3">
                        <?php $__currentLoopData = $quotaAlerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($alert['metric_key']); ?>: <?php echo e($alert['usage_value']); ?> / <?php echo e($alert['limit_value']); ?> (<?php echo e($alert['percent']); ?>%)</li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <h6><?php echo e(__('Usages')); ?></h6>
            <table class="table mb-4">
                <thead><tr><th><?php echo e(__('Metric')); ?></th><th><?php echo e(__('Usage')); ?></th><th><?php echo e(__('Limit')); ?></th><th><?php echo e(__('Health')); ?></th></tr></thead>
                <tbody>
                <?php $__empty_2 = true; $__currentLoopData = $usageSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <tr>
                        <td><?php echo e($usage['metric_key']); ?></td>
                        <td><?php echo e($usage['usage_value']); ?></td>
                        <td><?php echo e($usage['limit_value'] ?: '-'); ?></td>
                        <td>
                            <?php if(!is_null($usage['percent'])): ?>
                                <div class="progress" style="height:8px;"><div class="progress-bar <?php echo e($usage['percent'] >= 90 ? 'bg-danger' : ($usage['percent'] >= 70 ? 'bg-warning' : 'bg-success')); ?>" style="width: <?php echo e($usage['percent']); ?>%"></div></div>
                                <div class="small text-muted mt-1"><?php echo e($usage['percent']); ?>%</div>
                            <?php else: ?>
                                <span class="text-muted"><?php echo e(__('Unlimited')); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <tr><td colspan="4" class="text-muted"><?php echo e(__('No usage records.')); ?></td></tr>
                <?php endif; ?>
                </tbody>
            </table>

            <h6><?php echo e(__('Update quota snapshot')); ?></h6>
            <form method="POST" action="<?php echo e(route('core.usages.store')); ?>" class="row g-2 mb-4">
                <?php echo csrf_field(); ?>
                <div class="col-md-4"><input type="text" name="metric_key" class="form-control" placeholder="<?php echo e(__('Metric key')); ?>" required></div>
                <div class="col-md-3"><input type="number" step="0.01" name="usage_value" class="form-control" placeholder="<?php echo e(__('Usage')); ?>" required></div>
                <div class="col-md-3"><input type="number" step="0.01" name="limit_value" class="form-control" placeholder="<?php echo e(__('Limit')); ?>"></div>
                <div class="col-md-2 d-grid"><button class="btn btn-light"><?php echo e(__('Save')); ?></button></div>
            </form>

            <h6><?php echo e(__('Active Addons')); ?></h6>
            <ul class="list-group">
                <?php $__empty_2 = true; $__currentLoopData = $activeAddons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start gap-3">
                        <div>
                            <strong><?php echo e(optional($subscription->addon)->name ?: __('Addon')); ?></strong>
                            <div class="small text-muted"><?php echo e(ucfirst($subscription->status)); ?> • <?php echo e($subscription->billing_cycle ?: optional($subscription->addon)->billing_cycle ?: __('N/A')); ?></div>
                            <div class="small text-muted"><?php echo e(__('Renews')); ?>: <?php echo e(optional($subscription->renews_at)->format('Y-m-d') ?: '-'); ?></div>
                        </div>
                        <div class="d-flex gap-2 flex-wrap">
                            <?php if($subscription->status === 'active'): ?>
                                <form method="POST" action="<?php echo e(route('core.addons.renew', $subscription)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-outline-primary"><?php echo e(__('Renew')); ?></button></form>
                                <form method="POST" action="<?php echo e(route('core.addons.deactivate', $subscription)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-outline-danger"><?php echo e(__('Deactivate')); ?></button></form>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <li class="list-group-item text-muted"><?php echo e(__('No active addons.')); ?></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('Plan Request History')); ?></h5></div>
        <div class="card-body table-border-style">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Requested by')); ?></th>
                        <th><?php echo e(__('Current')); ?></th>
                        <th><?php echo e(__('Target')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Review')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php $__empty_2 = true; $__currentLoopData = $planRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planRequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <tr>
                        <td>
                            <div><?php echo e(optional($planRequest->user)->name ?: $planRequest->user_id); ?></div>
                            <?php if($planRequest->request_note): ?>
                                <div class="small text-muted"><?php echo e($planRequest->request_note); ?></div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(optional($planRequest->currentPlan)->name ?: __('N/A')); ?></td>
                        <td><?php echo e(optional($planRequest->plan)->name ?: __('N/A')); ?></td>
                        <td><span class="badge bg-light text-dark"><?php echo e(ucfirst($planRequest->status)); ?></span></td>
                        <td>
                            <?php if($planRequest->reviewer): ?>
                                <div><?php echo e($planRequest->reviewer->name); ?></div>
                                <div class="small text-muted"><?php echo e(optional($planRequest->reviewed_at)->format('Y-m-d H:i')); ?></div>
                                <?php if($planRequest->review_note): ?>
                                    <div class="small text-muted"><?php echo e($planRequest->review_note); ?></div>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-muted"><?php echo e(__('Pending review')); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(\Auth::user()->type === 'super admin' && $planRequest->status === 'pending'): ?>
                                <div class="d-flex gap-2 flex-wrap">
                                    <form method="POST" action="<?php echo e(route('core.onboarding.plan-requests.approve', $planRequest)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-sm btn-success"><?php echo e(__('Approve')); ?></button>
                                    </form>
                                    <form method="POST" action="<?php echo e(route('core.onboarding.plan-requests.reject', $planRequest)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="review_note" value="<?php echo e(__('Rejected from onboarding cockpit')); ?>">
                                        <button class="btn btn-sm btn-outline-danger"><?php echo e(__('Reject')); ?></button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <span class="text-muted"><?php echo e(ucfirst($planRequest->status)); ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <tr><td colspan="6" class="text-muted"><?php echo e(__('No plan requests recorded yet.')); ?></td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('Recent Subscription Billing Events')); ?></h5></div>
        <div class="card-body table-border-style">
            <table class="table">
                <thead><tr><th><?php echo e(__('Order')); ?></th><th><?php echo e(__('Plan')); ?></th><th><?php echo e(__('Amount')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('When')); ?></th></tr></thead>
                <tbody>
                <?php $__empty_2 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <tr>
                        <td><code><?php echo e($order->order_id); ?></code></td>
                        <td><?php echo e($order->plan_name ?: '-'); ?></td>
                        <td><?php echo e($order->price); ?> <?php echo e($order->price_currency); ?></td>
                        <td><?php echo e(ucfirst($order->payment_status)); ?></td>
                        <td><?php echo e(optional($order->created_at)->format('Y-m-d H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <tr><td colspan="5" class="text-muted"><?php echo e(__('No billing events found for this tenant yet.')); ?></td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_platform/onboarding.blade.php ENDPATH**/ ?>
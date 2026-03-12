<?php $__env->startSection('page-title', __('Core Consolidation')); ?>
<?php $__env->startSection('page-subtitle', __('Review cross-module readiness, security posture, API operations and production checklist from a single control point.')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Core Consolidation')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('core.security.index')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Security Center')); ?></a>
        <a href="<?php echo e(route('api-clients.index')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('API Clients')); ?></a>
        <a href="<?php echo e(route('approval-requests.index')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Approvals')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Pending approvals')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['pending_approvals']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Automation failures')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['automation_failures']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Active API clients')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['api_clients_active']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('API logs today')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['api_logs_today']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Sensitive access today')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['sensitive_access_today']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Notification backlog')); ?></span><strong class="ux-kpi-value"><?php echo e($metrics['notification_backlog']); ?></strong></div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card mb-4">
                <div class="card-header"><h5><?php echo e(__('Cross-Module Health')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Domain')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Volume')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $moduleHealth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $domain => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(ucfirst($domain)); ?></td>
                                    <td>
                                        <span class="badge <?php echo e($item['status'] === 'ready' ? 'bg-success' : 'bg-warning'); ?>">
                                            <?php echo e(ucfirst($item['status'])); ?>

                                        </span>
                                    </td>
                                    <td><?php echo e($item['volume']); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Production Readiness Checklist')); ?></h5></div>
                <div class="card-body">
                    <div class="list-group">
                        <?php $__currentLoopData = $checklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <strong><?php echo e(__($item['name'])); ?></strong>
                                    <span class="badge <?php echo e($item['status'] === 'ready' ? 'bg-success' : 'bg-warning text-dark'); ?>">
                                        <?php echo e(ucfirst($item['status'])); ?>

                                    </span>
                                </div>
                                <div class="text-muted small mt-1"><?php echo e(__($item['detail'])); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header"><h5><?php echo e(__('Operational Guardrails')); ?></h5></div>
                <div class="card-body">
                    <ul class="mb-0">
                        <li><?php echo e(__('Warm caches after deployments that affect menus, permissions or settings.')); ?></li>
                        <li><?php echo e(__('Review API logs and failed automations every day before tenant traffic peaks.')); ?></li>
                        <li><?php echo e(__('Keep security scopes aligned with branch, warehouse and department changes.')); ?></li>
                        <li><?php echo e(__('Review saved reports and scheduled exports after any schema update.')); ?></li>
                        <li><?php echo e(__('Validate sensitive access logs on medical, document and finance screens.')); ?></li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Execution Links')); ?></h5></div>
                <div class="card-body d-grid gap-2">
                    <a href="<?php echo e(route('core.onboarding')); ?>" class="btn btn-light"><?php echo e(__('Tenant Onboarding Cockpit')); ?></a>
                    <a href="<?php echo e(route('core.addons.index')); ?>" class="btn btn-light"><?php echo e(__('Plan Addons')); ?></a>
                    <a href="<?php echo e(route('core.saved-views.index')); ?>" class="btn btn-light"><?php echo e(__('Saved Views')); ?></a>
                    <a href="<?php echo e(route('core.preferences')); ?>" class="btn btn-light"><?php echo e(__('User Preferences')); ?></a>
                    <a href="<?php echo e(route('core.help-center')); ?>" class="btn btn-light"><?php echo e(__('Help Center')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_platform/consolidation.blade.php ENDPATH**/ ?>
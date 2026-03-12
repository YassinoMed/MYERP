<?php $__env->startSection('page-title', $apiClient->name); ?>
<?php $__env->startSection('page-subtitle', __('Inspect API usage, error rates and credential governance for this integration client.')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="row mb-3">
            <div class="col-md-6"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Total calls')); ?></span><h4 class="mb-0"><?php echo e($stats['totalRequests']); ?></h4></div></div></div>
            <div class="col-md-6"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Last 24h')); ?></span><h4 class="mb-0"><?php echo e($stats['requests24h']); ?></h4></div></div></div>
            <div class="col-md-6"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Errors')); ?></span><h4 class="mb-0"><?php echo e($stats['errorRequests']); ?></h4></div></div></div>
            <div class="col-md-6"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Routes')); ?></span><h4 class="mb-0"><?php echo e($stats['uniqueRoutes']); ?></h4></div></div></div>
        </div>
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Client Overview')); ?></h5></div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4"><?php echo e(__('Key')); ?></dt>
                    <dd class="col-sm-8"><code><?php echo e($apiClient->client_key); ?></code></dd>
                    <dt class="col-sm-4"><?php echo e(__('Status')); ?></dt>
                    <dd class="col-sm-8"><span class="badge <?php echo e($apiClient->is_active ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($apiClient->is_active ? __('Active') : __('Inactive')); ?></span></dd>
                    <dt class="col-sm-4"><?php echo e(__('Abilities')); ?></dt>
                    <dd class="col-sm-8"><?php echo e(implode(', ', $apiClient->abilities ?? []) ?: '-'); ?></dd>
                    <dt class="col-sm-4"><?php echo e(__('Last Used')); ?></dt>
                    <dd class="col-sm-8"><?php echo e(optional($apiClient->last_used_at)->diffForHumans() ?: '-'); ?></dd>
                    <dt class="col-sm-4"><?php echo e(__('Expires')); ?></dt>
                    <dd class="col-sm-8"><?php echo e(optional($apiClient->expires_at)->format('Y-m-d H:i') ?: '-'); ?></dd>
                </dl>
            </div>
            <div class="card-footer d-flex gap-2 flex-wrap">
                <form method="POST" action="<?php echo e(route('api-clients.toggle-status', $apiClient)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-secondary"><?php echo e($apiClient->is_active ? __('Deactivate key') : __('Activate key')); ?></button></form>
                <form method="POST" action="<?php echo e(route('api-clients.rotate-secret', $apiClient)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-warning"><?php echo e(__('Rotate secret')); ?></button></form>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Authentication Headers')); ?></h5></div>
            <div class="card-body"><pre class="small mb-0">X-Api-Client: <?php echo e($apiClient->client_key); ?>

X-Api-Secret: ******** (shown only at creation)</pre></div>
        </div>
        <div class="card mt-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Ability Catalog')); ?></h5></div>
            <div class="card-body small">
                <?php $__currentLoopData = $abilityCatalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ability => $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2">
                        <code><?php echo e($ability); ?></code>
                        <div class="text-muted"><?php echo e($description); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Recent API Logs')); ?></h5></div>
            <div class="card-body table-border-style">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('When')); ?></th>
                        <th><?php echo e(__('Route')); ?></th>
                        <th><?php echo e(__('Method')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Actor')); ?></th>
                        <th><?php echo e(__('IP')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e(optional($log->requested_at)->format('Y-m-d H:i')); ?></td>
                            <td><code><?php echo e($log->route); ?></code></td>
                            <td><?php echo e($log->method); ?></td>
                            <td><?php echo e($log->status_code ?: '-'); ?></td>
                            <td><?php echo e(optional($log->user)->name ?: '-'); ?></td>
                            <td><code><?php echo e($log->ip_address ?: '-'); ?></code></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No API traffic logged for this client yet.')); ?></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($logs->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/api_client/show.blade.php ENDPATH**/ ?>
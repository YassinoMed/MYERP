<?php $__env->startSection('page-title', __('API Client Documentation')); ?>
<?php $__env->startSection('page-subtitle', __('Dedicated client endpoints use long-lived integration credentials, request logging and scoped abilities.')); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body">
    <p><?php echo e(__('Use X-Api-Client and X-Api-Secret headers for dedicated client endpoints.')); ?></p>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Authentication Headers')); ?></div>
        <pre class="small mb-0">X-Api-Client: erp_xxxxxxxxxxxxxxxxxxxxxxxx
X-Api-Secret: your-issued-plain-secret</pre>
    </div>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Dedicated client endpoints')); ?></div>
        <ul class="mb-0">
            <li><code>GET /api/client/v1/customers</code> <span class="text-muted">customers:read</span></li>
            <li><code>GET /api/client/v1/products</code> <span class="text-muted">products:read</span></li>
            <li><code>GET /api/client/v1/invoices</code> <span class="text-muted">invoices:read</span></li>
            <li><code>GET /api/client/v1/purchases</code> <span class="text-muted">purchases:read</span></li>
            <li><code>GET /api/client/v1/patients</code> <span class="text-muted">patients:read</span></li>
            <li><code>GET /api/client/v1/delivery-notes</code> <span class="text-muted">delivery-notes:read</span></li>
        </ul>
    </div>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Conventions')); ?></div>
        <ul class="mb-0">
            <li><?php echo e(__('Dedicated integration endpoints use the /api/client/v1 prefix and always return the same response envelope.')); ?></li>
            <li><?php echo e(__('User-scoped Sanctum endpoints remain available for interactive clients, but should progressively follow the same resource naming and pagination semantics.')); ?></li>
            <li><?php echo e(__('Rotate secrets from the API Clients screen whenever a partner or connector is rotated.')); ?></li>
        </ul>
    </div>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Response envelope')); ?></div>
        <pre class="small mb-0">{
  "success": true,
  "request_id": "uuid",
  "resource": "customers",
  "client": "erp_xxxxxxxxxxxxxxxxxxxxxxxx",
  "data": [ ... items ... ],
  "meta": {
    "filters": { "q": null, "per_page": 20 },
    "pagination": { "current_page": 1, "per_page": 20, "total": 42, "last_page": 3 }
  }
}</pre>
    </div>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Supported abilities')); ?></div>
        <ul class="mb-0">
            <?php $__currentLoopData = $abilityCatalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ability => $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><code><?php echo e($ability); ?></code> <span class="text-muted"><?php echo e($description); ?></span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="mb-3">
        <div class="fw-semibold"><?php echo e(__('Standard user-scoped API')); ?></div>
        <p class="mb-0"><?php echo e(__('Sanctum endpoints remain available in parallel for authenticated user tokens, including tenant-scoped finance routes and module APIs.')); ?></p>
    </div>
    <div>
        <div class="fw-semibold"><?php echo e(__('Logging & governance')); ?></div>
        <p class="mb-0"><?php echo e(__('Every API request is logged with route, method, status code, IP and payload preview. Use the API Clients screen to inspect recent traffic.')); ?></p>
    </div>
</div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/api_client/docs.blade.php ENDPATH**/ ?>
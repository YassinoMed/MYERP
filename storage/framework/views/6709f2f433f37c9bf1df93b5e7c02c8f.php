<?php $__env->startSection('page-title', __('Create API Client')); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <form method="POST" action="<?php echo e(route('api-clients.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label"><?php echo e(__('Name')); ?></label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label"><?php echo e(__('Abilities')); ?></label>
                    <input type="text" name="abilities" class="form-control" placeholder="customers:read,products:read,invoices:read">
                    <div class="form-text"><?php echo e(__('Use comma-separated abilities from the catalog below.')); ?></div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label"><?php echo e(__('Expires At')); ?></label>
                    <input type="date" name="expires_at" class="form-control">
                </div>
            </div>
            <div class="border rounded p-3 mb-3 bg-light">
                <div class="fw-semibold mb-2"><?php echo e(__('Supported abilities')); ?></div>
                <div class="row">
                    <?php $__currentLoopData = $abilityCatalog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ability => $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 small mb-2">
                            <code><?php echo e($ability); ?></code>
                            <div class="text-muted"><?php echo e($description); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <button class="btn btn-primary"><?php echo e(__('Create Client')); ?></button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/api_client/create.blade.php ENDPATH**/ ?>
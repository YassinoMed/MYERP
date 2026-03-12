<?php $__env->startSection('page-title', __('Import Job').' #'.$importJob->id); ?>
<?php $__env->startSection('page-subtitle', __('Validate mappings, inspect preview rows and roll back imports when needed.')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
<div class="col-md-7">
    <div class="card mb-3">
        <div class="card-header"><h5><?php echo e(__('Import Overview')); ?></h5></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4"><span class="text-muted d-block small"><?php echo e(__('Module')); ?></span><strong><?php echo e($importJob->module); ?></strong></div>
                <div class="col-md-4"><span class="text-muted d-block small"><?php echo e(__('Status')); ?></span><strong><?php echo e(ucfirst($importJob->status)); ?></strong></div>
                <div class="col-md-4"><span class="text-muted d-block small"><?php echo e(__('Processed')); ?></span><strong><?php echo e(optional($importJob->processed_at)->format('Y-m-d H:i') ?: '-'); ?></strong></div>
            </div>
        </div>
    </div>
    <div class="card"><div class="card-header"><h5><?php echo e(__('Preview')); ?></h5></div><div class="card-body"><pre class="small"><?php echo e(json_encode($importJob->preview_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre></div></div>
</div>
<div class="col-md-5">
    <div class="card"><div class="card-header"><h5><?php echo e(__('Column Mapping')); ?></h5></div><div class="card-body">
        <form method="POST" action="<?php echo e(route('core.imports.mapping', $importJob)); ?>"><?php echo csrf_field(); ?>
            <?php $__currentLoopData = (data_get($importJob->preview_data, 'headers', [])); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="mb-2"><label class="form-label"><?php echo e($header); ?></label><input type="text" name="mapping[<?php echo e($header); ?>]" class="form-control" value="<?php echo e(data_get($importJob->mapping, $header)); ?>"></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="btn btn-primary"><?php echo e(__('Save Mapping')); ?></button>
        </form>
        <div class="alert alert-light mt-3">
            <div class="fw-semibold mb-1"><?php echo e(__('Rollback payload')); ?></div>
            <div class="small text-muted"><?php echo e(__('Created record IDs are stored to support module-aware rollback when available.')); ?></div>
        </div>
        <form method="POST" action="<?php echo e(route('core.imports.rollback', $importJob)); ?>" class="mt-3"><?php echo csrf_field(); ?> <button class="btn btn-danger"><?php echo e(__('Rollback Import')); ?></button></form>
    </div></div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/import_show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title', __('Schedule Export')); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><form method="POST" action="<?php echo e(route('core.exports.store')); ?>"><?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Module')); ?></label><select name="module" class="form-control" required><option value="customers">customers</option><option value="venders">venders</option><option value="patients">patients</option><option value="product_services">product_services</option></select></div>
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Format')); ?></label><select name="format" class="form-control"><option value="csv">CSV</option><option value="json">JSON</option></select></div>
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Scheduled For')); ?></label><input type="datetime-local" name="scheduled_for" class="form-control"></div>
</div>
<div class="alert alert-info small"><?php echo e(__('Rollback support is currently enabled for customers, venders, patients and product services imports.')); ?></div>
<button class="btn btn-primary"><?php echo e(__('Schedule Export')); ?></button>
</form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/export_create.blade.php ENDPATH**/ ?>
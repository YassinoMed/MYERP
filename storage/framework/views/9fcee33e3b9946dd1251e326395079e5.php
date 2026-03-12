<?php $__env->startSection('page-title', __('Create Saved Report')); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body"><form method="POST" action="<?php echo e(route('core.reports.store')); ?>"><?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Name')); ?></label><input type="text" name="name" class="form-control" required></div>
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Report Type')); ?></label><select name="report_type" class="form-control"><option value="invoices">Invoices</option><option value="customers">Customers</option><option value="purchases">Purchases</option></select></div>
    <div class="col-md-4 mb-3"><div class="form-check mt-4"><input type="checkbox" class="form-check-input" name="is_shared" value="1"><label class="form-check-label"><?php echo e(__('Shared')); ?></label></div></div>
    <div class="col-md-12 mb-3"><label class="form-label"><?php echo e(__('Columns')); ?></label><input type="text" name="columns[]" class="form-control mb-2" placeholder="id"><input type="text" name="columns[]" class="form-control" placeholder="invoice_id / name / status"></div>
</div>
<button class="btn btn-primary"><?php echo e(__('Create Report')); ?></button>
</form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/report_create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title', __('Export Job').' #'.$exportJob->id); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-5">
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Execution Summary')); ?></h5></div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-5"><?php echo e(__('Module')); ?></dt>
                    <dd class="col-sm-7"><?php echo e($exportJob->module); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Format')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(strtoupper($exportJob->format)); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Status')); ?></dt>
                    <dd class="col-sm-7"><span class="badge bg-light text-dark"><?php echo e(ucfirst($exportJob->status)); ?></span></dd>
                    <dt class="col-sm-5"><?php echo e(__('Scheduled')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($exportJob->scheduled_for)->format('Y-m-d H:i') ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Started')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($exportJob->started_at)->format('Y-m-d H:i') ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Completed')); ?></dt>
                    <dd class="col-sm-7"><?php echo e(optional($exportJob->completed_at)->format('Y-m-d H:i') ?: '-'); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('Attempts')); ?></dt>
                    <dd class="col-sm-7"><?php echo e($exportJob->attempts); ?></dd>
                    <dt class="col-sm-5"><?php echo e(__('File')); ?></dt>
                    <dd class="col-sm-7 text-break"><?php echo e($exportJob->file_path ?: '-'); ?></dd>
                </dl>
                <div class="d-flex gap-2 flex-wrap mt-3">
                    <form method="POST" action="<?php echo e(route('core.exports.run', $exportJob)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-primary"><?php echo e(__('Run Now')); ?></button></form>
                    <?php if($exportJob->file_path): ?>
                        <a href="<?php echo e(route('core.exports.download', $exportJob)); ?>" class="btn btn-light"><?php echo e(__('Download')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Filters')); ?></h5></div>
            <div class="card-body"><pre class="small mb-0"><?php echo e(json_encode($exportJob->filters, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)); ?></pre></div>
        </div>
        <div class="card">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Error / Diagnostics')); ?></h5></div>
            <div class="card-body">
                <?php if($exportJob->error_message): ?>
                    <div class="alert alert-danger mb-0"><?php echo e($exportJob->error_message); ?></div>
                <?php else: ?>
                    <div class="text-muted"><?php echo e(__('No execution errors recorded for this export job.')); ?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/export_show.blade.php ENDPATH**/ ?>
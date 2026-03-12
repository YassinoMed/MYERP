<?php $__env->startSection('page-title', __('Export Jobs')); ?>
<?php $__env->startSection('page-subtitle', __('Schedule exports, rerun failed jobs and download generated files from one queue.')); ?>
<?php $__env->startSection('action-btn'); ?><a href="<?php echo e(route('core.exports.create')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a><?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row mb-3">
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Queued')); ?></span><h3 class="mb-0"><?php echo e($exportStats['queued']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Processing')); ?></span><h3 class="mb-0"><?php echo e($exportStats['processing']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Completed')); ?></span><h3 class="mb-0"><?php echo e($exportStats['completed']); ?></h3></div></div></div>
    <div class="col-md-3"><div class="card"><div class="card-body"><span class="text-muted d-block small"><?php echo e(__('Failed')); ?></span><h3 class="mb-0"><?php echo e($exportStats['failed']); ?></h3></div></div></div>
</div>
<div class="d-flex justify-content-end mb-3">
    <form method="POST" action="<?php echo e(route('core.exports.dispatch-due')); ?>">
        <?php echo csrf_field(); ?>
        <button class="btn btn-sm btn-primary"><?php echo e(__('Queue Due Exports')); ?></button>
    </form>
</div>
<div class="card">
    <div class="card-body table-border-style">
        <table class="table">
            <thead><tr><th>ID</th><th><?php echo e(__('Module')); ?></th><th><?php echo e(__('Format')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Scheduled')); ?></th><th><?php echo e(__('Attempts')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
            <tbody>
            <?php $__currentLoopData = $exports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>#<?php echo e($job->id); ?></td>
                    <td><?php echo e($job->module); ?></td>
                    <td><?php echo e(strtoupper($job->format)); ?></td>
                    <td>
                        <span class="badge <?php echo e($job->status === 'completed' ? 'bg-success' : ($job->status === 'failed' ? 'bg-danger' : ($job->status === 'processing' ? 'bg-info text-dark' : 'bg-warning text-dark'))); ?>">
                            <?php echo e(ucfirst($job->status)); ?>

                        </span>
                    </td>
                    <td><?php echo e(optional($job->scheduled_for)->format('Y-m-d H:i') ?: '-'); ?></td>
                    <td><?php echo e($job->attempts); ?></td>
                    <td>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="<?php echo e(route('core.exports.show', $job)); ?>" class="btn btn-sm btn-light"><?php echo e(__('Open')); ?></a>
                            <form method="POST" action="<?php echo e(route('core.exports.run', $job)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-primary"><?php echo e(__('Run')); ?></button></form>
                            <?php if($job->file_path): ?>
                                <a href="<?php echo e(route('core.exports.download', $job)); ?>" class="btn btn-sm btn-success"><?php echo e(__('Download')); ?></a>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($exports->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_data/exports.blade.php ENDPATH**/ ?>
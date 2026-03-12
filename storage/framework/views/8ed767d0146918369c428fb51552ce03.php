<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Workflow Executions')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('workflows.index')); ?>"><?php echo e(__('Workflows')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Executions')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex gap-2">
        <a href="<?php echo e(route('workflows.show', $workflow->id)); ?>" class="btn btn-sm btn-secondary">
            <?php echo e(__('Back')); ?>

        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Model')); ?></th>
                                    <th><?php echo e(__('Triggered By')); ?></th>
                                    <th><?php echo e(__('Created')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $executions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $execution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($execution->id); ?></td>
                                        <td><?php echo e($execution->status); ?></td>
                                        <td><?php echo e(class_basename($execution->model_type)); ?> #<?php echo e($execution->model_id); ?></td>
                                        <td><?php echo e($execution->triggered_by ?? '-'); ?></td>
                                        <td><?php echo e($execution->created_at ? $execution->created_at->format('Y-m-d H:i') : '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-muted"><?php echo e(__('No executions found.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        <?php echo e($executions->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/workflow/executions.blade.php ENDPATH**/ ?>
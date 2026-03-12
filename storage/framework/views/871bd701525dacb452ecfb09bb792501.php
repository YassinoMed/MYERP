<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Workflow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('workflows.index')); ?>"><?php echo e(__('Workflows')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex gap-2">
        <a href="<?php echo e(route('workflows.executions', $workflow->id)); ?>" class="btn btn-sm btn-secondary">
            <?php echo e(__('Executions')); ?>

        </a>
        <a href="<?php echo e(route('workflows.edit', $workflow->id)); ?>" class="btn btn-sm btn-info">
            <?php echo e(__('Edit')); ?>

        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-2"><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($workflow->name); ?></div>
                    <div class="mb-2"><strong><?php echo e(__('Trigger')); ?>:</strong> <?php echo e($workflow->trigger_model); ?></div>
                    <div class="mb-2"><strong><?php echo e(__('Active')); ?>:</strong> <?php echo e($workflow->is_active ? __('Yes') : __('No')); ?></div>
                    <?php if(!empty($workflow->description)): ?>
                        <div class="mb-2"><strong><?php echo e(__('Description')); ?>:</strong> <?php echo e($workflow->description); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Recent Executions')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('ID')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Model')); ?></th>
                                    <th><?php echo e(__('Created')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $executions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $execution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($execution->id); ?></td>
                                        <td><?php echo e($execution->status); ?></td>
                                        <td><?php echo e(class_basename($execution->model_type)); ?> #<?php echo e($execution->model_id); ?></td>
                                        <td><?php echo e($execution->created_at ? $execution->created_at->format('Y-m-d H:i') : '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="4" class="text-muted"><?php echo e(__('No executions yet.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/workflow/show.blade.php ENDPATH**/ ?>
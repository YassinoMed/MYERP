<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Workflows')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Workflows')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <a href="<?php echo e(route('workflows.create')); ?>" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Trigger')); ?></th>
                                    <th><?php echo e(__('Active')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $workflows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workflow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($workflow->name); ?></td>
                                        <td><?php echo e($workflow->trigger_model); ?></td>
                                        <td><?php echo e($workflow->is_active ? __('Yes') : __('No')); ?></td>
                                        <td class="d-flex gap-2">
                                            <a href="<?php echo e(route('workflows.show', $workflow->id)); ?>" class="btn btn-warning btn-sm">
                                                <?php echo e(__('View')); ?>

                                            </a>
                                            <a href="<?php echo e(route('workflows.edit', $workflow->id)); ?>" class="btn btn-info btn-sm">
                                                <?php echo e(__('Edit')); ?>

                                            </a>
                                            <form method="POST" action="<?php echo e(route('workflows.toggle', $workflow->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e(__('Toggle')); ?></button>
                                            </form>
                                            <form method="POST" action="<?php echo e(route('workflows.destroy', $workflow->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="4" class="text-muted"><?php echo e(__('No workflows found.')); ?></td>
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


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/workflow/index.blade.php ENDPATH**/ ?>
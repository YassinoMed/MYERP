<?php $__env->startSection('page-title'); ?>
    <?php echo e($resource->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('production.resources.index')); ?>"><?php echo e(__('Industrial Resources')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($resource->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e($resource->name); ?></h5>
                    <p class="mb-1"><?php echo e(__('Type')); ?>: <?php echo e(ucfirst($resource->type)); ?></p>
                    <p class="mb-1"><?php echo e(__('Code')); ?>: <?php echo e($resource->code ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Status')); ?>: <?php echo e(ucfirst($resource->status)); ?></p>
                    <p class="mb-1"><?php echo e(__('Parent')); ?>: <?php echo e($resource->parent?->name ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Branch')); ?>: <?php echo e($resource->branch?->name ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Manager')); ?>: <?php echo e($resource->manager?->name ?: '-'); ?></p>
                    <p class="mb-0"><?php echo e(__('Capacity')); ?>: <?php echo e($resource->capacity_hours_per_day); ?>h / <?php echo e($resource->capacity_workers); ?> <?php echo e(__('workers')); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Work Centers')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Machine Code')); ?></th>
                                    <th><?php echo e(__('Cost / Hour')); ?></th>
                                    <th><?php echo e(__('Bottleneck')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $resource->workCenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workCenter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($workCenter->name); ?></td>
                                        <td><?php echo e($workCenter->machine_code ?: '-'); ?></td>
                                        <td><?php echo e(\Auth::user()->priceFormat($workCenter->cost_per_hour)); ?></td>
                                        <td><?php echo e($workCenter->is_bottleneck ? __('Yes') : __('No')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr><td colspan="4" class="text-center"><?php echo e(__('No work centers linked.')); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/industrial_resources/show.blade.php ENDPATH**/ ?>
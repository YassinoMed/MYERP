<?php $__env->startSection('page-title'); ?>
    <?php echo e($routing->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('production.routings.index')); ?>"><?php echo e(__('Routings')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($routing->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e($routing->name); ?></h5>
                    <p class="mb-1"><?php echo e(__('Code')); ?>: <?php echo e($routing->code ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Product')); ?>: <?php echo e($routing->product?->name ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Status')); ?>: <?php echo e(ucfirst($routing->status)); ?></p>
                    <p class="mb-0"><?php echo e(__('Orders using this routing')); ?>: <?php echo e($routing->orders->count()); ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Steps')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Work Center')); ?></th>
                                    <th><?php echo e(__('Resource')); ?></th>
                                    <th><?php echo e(__('Minutes')); ?></th>
                                    <th><?php echo e(__('Scrap %')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $routing->steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($step->sequence); ?></td>
                                        <td><?php echo e($step->name); ?></td>
                                        <td><?php echo e($step->workCenter?->name ?: '-'); ?></td>
                                        <td><?php echo e($step->resource?->name ?: '-'); ?></td>
                                        <td><?php echo e($step->planned_minutes); ?></td>
                                        <td><?php echo e($step->scrap_percent); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/routings/show.blade.php ENDPATH**/ ?>
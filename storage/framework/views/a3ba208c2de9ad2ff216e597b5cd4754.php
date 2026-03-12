<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Industrial Analytics')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Industrial Analytics')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track completion, labor pressure and shopfloor delays in a single reporting view.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Order Completion')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $orderMetrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($metric['order']->order_number); ?></strong>
                                <span><?php echo e($metric['completion']); ?>%</span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e($metric['order']->product?->name ?: '-'); ?> /
                                <?php echo e($metric['order']->workCenter?->name ?: '-'); ?> /
                                <?php echo e($metric['order']->quantity_produced); ?> / <?php echo e($metric['order']->quantity_planned); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No production orders to analyze.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Labor Pressure')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Operator')); ?></th>
                                <th><?php echo e(__('Hours')); ?></th>
                                <th><?php echo e(__('Logs')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $laborPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($item->employee_name); ?></td>
                                    <td><?php echo e(round($item->total_minutes / 60, 2)); ?></td>
                                    <td><?php echo e($item->log_count); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="3" class="text-center text-muted"><?php echo e(__('No labor logs available.')); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Operation Delays')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Operation')); ?></th>
                                <th><?php echo e(__('Order')); ?></th>
                                <th><?php echo e(__('Work Center')); ?></th>
                                <th><?php echo e(__('Variance')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $operationDelays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($operation->name); ?></td>
                                    <td><?php echo e($operation->productionOrder?->order_number ?: '-'); ?></td>
                                    <td><?php echo e($operation->workCenter?->name ?: '-'); ?></td>
                                    <td><?php echo e(max(((int) $operation->actual_minutes - (int) $operation->planned_minutes), 0)); ?> <?php echo e(__('min')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No delayed operations found.')); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Shopfloor Timeline')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $shopfloorTimeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($event->workCenter?->name ?: '-'); ?></strong>
                                <span><?php echo e($event->happened_at?->format('Y-m-d H:i')); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e(ucfirst(str_replace('_', ' ', $event->event_type))); ?> /
                                <?php echo e($event->status); ?> /
                                <?php echo e($event->order?->product?->name ?: __('No product')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No shopfloor timeline available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Quality Overview')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo e(__('Pass')); ?></span>
                        <span><?php echo e($qualitySummary['pass'] ?? 0); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo e(__('Hold')); ?></span>
                        <span><?php echo e($qualitySummary['hold'] ?? 0); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><?php echo e(__('Fail')); ?></span>
                        <span><?php echo e($qualitySummary['fail'] ?? 0); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Maintenance Impact')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo e(__('Open')); ?></span>
                        <span><?php echo e($maintenanceImpact['open'] ?? 0); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span><?php echo e(__('In Progress')); ?></span>
                        <span><?php echo e($maintenanceImpact['in_progress'] ?? 0); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span><?php echo e(__('Closed')); ?></span>
                        <span><?php echo e($maintenanceImpact['closed'] ?? 0); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/planning/analytics.blade.php ENDPATH**/ ?>
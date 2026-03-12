<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shopfloor Realtime')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Shopfloor Realtime')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Monitor live work center status, current order flow and recent plant events from a single realtime board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Active Orders')); ?></small><h4><?php echo e($activeOrders->count()); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Status Events (8h)')); ?></small><h4><?php echo e($summary['status'] ?? 0); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Downtime Events (8h)')); ?></small><h4><?php echo e($summary['downtime'] ?? 0); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Quality Holds (8h)')); ?></small><h4><?php echo e($summary['quality_hold'] ?? 0); ?></h4></div></div></div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Live Work Center Board')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Work Center')); ?></th>
                                <th><?php echo e(__('Resource')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Event')); ?></th>
                                <th><?php echo e(__('Updated At')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $liveBoard; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($row['work_center']->name); ?></td>
                                    <td><?php echo e($row['work_center']->resource?->name ?: '-'); ?></td>
                                    <td><span class="badge bg-primary"><?php echo e(ucfirst(str_replace('_', ' ', $row['status']))); ?></span></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $row['event_type']))); ?></td>
                                    <td><?php echo e($row['happened_at'] ? $row['happened_at']->format('Y-m-d H:i') : '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No live work center activity available.')); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Current Orders')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($order->order_number); ?></strong>
                                <span><?php echo e(ucfirst($order->status)); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e($order->product?->name ?: '-'); ?> /
                                <?php echo e($order->workCenter?->name ?: '-'); ?> /
                                <?php echo e($order->quantity_produced); ?> / <?php echo e($order->quantity_planned); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No active orders found.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Recent Event Timeline')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($event->workCenter?->name ?: '-'); ?></strong>
                                <span><?php echo e($event->happened_at?->format('Y-m-d H:i')); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e(ucfirst(str_replace('_', ' ', $event->event_type))); ?> /
                                <?php echo e($event->status); ?> /
                                <?php echo e($event->order?->order_number ?: __('No order')); ?> /
                                <?php echo e($event->employee?->name ?: __('No operator')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No shopfloor timeline available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/planning/realtime.blade.php ENDPATH**/ ?>
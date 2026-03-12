<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Industrial Planning')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Industrial Planning')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Balance machine load, labor load and shopfloor execution from a single industrial board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Active Orders')); ?></small><h4><?php echo e($orders->count()); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Active Work Centers')); ?></small><h4><?php echo e($workCenters->count()); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Open Maintenance')); ?></small><h4><?php echo e($maintenanceSummary['open'] ?? 0); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Subcontract In Progress')); ?></small><h4><?php echo e($subcontractSummary['in_progress'] ?? 0); ?></h4></div></div></div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Capacity Board')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Work Center')); ?></th><th><?php echo e(__('Resource')); ?></th><th><?php echo e(__('Hours / Day')); ?></th><th><?php echo e(__('Workers')); ?></th><th><?php echo e(__('Active Orders')); ?></th><th><?php echo e(__('Bottleneck')); ?></th></tr></thead>
                            <tbody>
                                <?php $__currentLoopData = $workCenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workCenter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($workCenter->name); ?></td>
                                        <td><?php echo e($workCenter->resource?->name ?: '-'); ?></td>
                                        <td><?php echo e($workCenter->capacity_hours_per_day); ?></td>
                                        <td><?php echo e($workCenter->capacity_workers); ?></td>
                                        <td><?php echo e($workCenter->active_orders_count); ?></td>
                                        <td><?php echo e($workCenter->is_bottleneck ? __('Yes') : __('No')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0"><?php echo e(__('Machine Load')); ?></h5><a href="<?php echo e(route('production.planning.bi')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('BI View')); ?></a></div>
                <div class="card-body">
                    <?php $__empty_2 = true; $__currentLoopData = $machineLoadSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($metric['name']); ?></strong>
                                <span><?php echo e($metric['utilization_percent']); ?>%</span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e(__('Planned')); ?>: <?php echo e($metric['planned_hours']); ?>h /
                                <?php echo e(__('Actual')); ?>: <?php echo e($metric['actual_hours']); ?>h /
                                <?php echo e(__('Downtime')); ?>: <?php echo e($metric['downtime_minutes']); ?> <?php echo e(__('min')); ?> /
                                <?php echo e(__('Gap')); ?>: <?php echo e($metric['load_gap_hours']); ?>h /
                                <?php echo e(__('State')); ?>: <?php echo e(ucfirst($metric['saturation_status'])); ?>

                            </div>
                            <div class="small text-muted"><?php echo e(__('Downtime rate')); ?>: <?php echo e($metric['downtime_rate']); ?>%</div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No machine load data available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Industrial Cost Mix')); ?></h5></div>
                <div class="card-body">
                    <?php $__currentLoopData = $costSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costType => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between mb-2">
                            <span><?php echo e(ucfirst($costType)); ?></span>
                            <span><?php echo e(\Auth::user()->priceFormat($total)); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No cost records found.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Shift Teams')); ?></h5></div>
                <div class="card-body">
                    <?php $__currentLoopData = $shiftTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shiftTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <span><?php echo e($shiftTeam->name); ?></span>
                            <span><?php echo e($shiftTeam->start_time ?: '--:--'); ?> - <?php echo e($shiftTeam->end_time ?: '--:--'); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No shift teams configured.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Shopfloor Capture')); ?></h5></div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('production.planning.shopfloor-events.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Work Center')); ?></label>
                            <select name="production_work_center_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select work center')); ?></option>
                                <?php $__currentLoopData = $workCenters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workCenter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($workCenter->id); ?>"><?php echo e($workCenter->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Order')); ?></label>
                            <select name="production_order_id" class="form-control">
                                <option value=""><?php echo e(__('Select order')); ?></option>
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($order->id); ?>"><?php echo e($order->order_number); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Event Type')); ?></label>
                                <select name="event_type" class="form-control" required>
                                    <option value="status"><?php echo e(__('Status')); ?></option>
                                    <option value="downtime"><?php echo e(__('Downtime')); ?></option>
                                    <option value="output"><?php echo e(__('Output')); ?></option>
                                    <option value="quality_hold"><?php echo e(__('Quality Hold')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <input type="text" name="status" class="form-control" required placeholder="<?php echo e(__('running / blocked / closed')); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                                <input type="number" step="0.001" name="quantity" class="form-control" value="0">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Downtime')); ?></label>
                                <input type="number" name="downtime_minutes" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Happened At')); ?></label>
                            <input type="datetime-local" name="happened_at" class="form-control" required value="<?php echo e(now()->format('Y-m-d\TH:i')); ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Notes')); ?></label>
                            <textarea name="notes" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Capture Event')); ?></button>
                        <a href="<?php echo e(route('production.planning.realtime')); ?>" class="btn btn-outline-dark"><?php echo e(__('Realtime')); ?></a>
                        <a href="<?php echo e(route('production.planning.analytics')); ?>" class="btn btn-outline-primary"><?php echo e(__('Analytics')); ?></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Labor Load')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $laborLoadSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <strong><?php echo e($metric['name']); ?></strong>
                                <div class="small text-muted"><?php echo e($metric['workers']); ?> <?php echo e(__('workers')); ?></div>
                            </div>
                            <div class="text-end">
                                <div><?php echo e($metric['planned_hours']); ?>h / <?php echo e($metric['actual_hours']); ?>h</div>
                                <div class="small text-muted"><?php echo e($metric['hours_per_worker']); ?>h/<?php echo e(__('worker')); ?> / <?php echo e(__('Gap')); ?> <?php echo e($metric['gap_hours']); ?>h / <?php echo e($metric['utilization_percent']); ?>%</div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No labor load data available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Recent Shopfloor Events')); ?></h5></div>
                <div class="card-body">
                    <div class="small text-muted mb-3">
                        <?php echo e(__('24h summary')); ?>:
                        <?php echo e(__('Status')); ?> <?php echo e($shopfloorSummary['status'] ?? 0); ?>,
                        <?php echo e(__('Downtime')); ?> <?php echo e($shopfloorSummary['downtime'] ?? 0); ?>,
                        <?php echo e(__('Output')); ?> <?php echo e($shopfloorSummary['output'] ?? 0); ?>,
                        <?php echo e(__('Quality Hold')); ?> <?php echo e($shopfloorSummary['quality_hold'] ?? 0); ?>

                    </div>
                    <?php $__empty_0 = true; $__currentLoopData = $shopfloorEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($event->workCenter?->name ?: '-'); ?></strong>
                                <span><?php echo e($event->happened_at?->format('Y-m-d H:i')); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e(ucfirst(str_replace('_', ' ', $event->event_type))); ?> /
                                <?php echo e($event->status); ?> /
                                <?php echo e($event->order?->order_number ?: __('No order')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No shopfloor events captured yet.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/planning/index.blade.php ENDPATH**/ ?>
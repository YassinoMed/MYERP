<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Industrial BI')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Industrial BI')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Review machine utilization, quality mix, schedule risk and industrial cost structure from a BI-oriented control room.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Planned Machine Hours')); ?></small><h4><?php echo e($kpis['planned_machine_hours']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Actual Machine Hours')); ?></small><h4><?php echo e($kpis['actual_machine_hours']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Downtime Minutes')); ?></small><h4><?php echo e($kpis['downtime_minutes']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><small><?php echo e(__('Completion Rate')); ?></small><h4><?php echo e($kpis['completion_rate']); ?>%</h4></div></div></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Cost Mix')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $costMix; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <span><?php echo e(ucfirst($type)); ?></span>
                            <span><?php echo e(\Auth::user()->priceFormat($total)); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No industrial cost data available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Quality Mix')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Pass')); ?></span><span><?php echo e($qualitySummary['pass'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Hold')); ?></span><span><?php echo e($qualitySummary['hold'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between py-2"><span><?php echo e(__('Fail')); ?></span><span><?php echo e($qualitySummary['fail'] ?? 0); ?></span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Top Bottlenecks')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $topBottlenecks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $center): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="d-flex justify-content-between border-bottom py-2">
                            <div>
                                <strong><?php echo e($center->name); ?></strong>
                                <div class="small text-muted"><?php echo e($center->resource?->name ?: '-'); ?></div>
                            </div>
                            <span><?php echo e($center->active_orders_count); ?> <?php echo e(__('active orders')); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No bottleneck data available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Schedule Risk')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $scheduleRisk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $risk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($risk['order']->order_number); ?></strong>
                                <span><?php echo e($risk['completion']); ?>%</span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e($risk['order']->planned_end_date ? \Carbon\Carbon::parse($risk['order']->planned_end_date)->format('Y-m-d') : '-'); ?>

                                / <?php echo e($risk['late'] ? __('Late') : __('On track')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No schedule risk detected.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/planning/business_intelligence.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Agriculture Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Agriculture Dashboard')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Pilot parcels, crop plans, weather exposure and lot aging from a single agricultural control room.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Parcels')); ?></span><strong class="ux-kpi-value"><?php echo e($parcelSummary->total_parcels ?? 0); ?></strong><span class="ux-kpi-meta"><?php echo e(__('registered plots')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Managed Area')); ?></span><strong class="ux-kpi-value"><?php echo e(round($parcelSummary->total_area ?? 0, 2)); ?></strong><span class="ux-kpi-meta"><?php echo e(__('hectares declared')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Active Plans')); ?></span><strong class="ux-kpi-value"><?php echo e($planSummary['in_progress'] ?? 0); ?></strong><span class="ux-kpi-meta"><?php echo e(__('campaigns underway')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('High Weather Alerts')); ?></span><strong class="ux-kpi-value"><?php echo e($weatherSummary['high'] ?? 0); ?></strong><span class="ux-kpi-meta"><?php echo e(__('high severity alerts')); ?></span></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Crop Plan Pipeline')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Planned')); ?></span><span><?php echo e($planSummary['planned'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('In Progress')); ?></span><span><?php echo e($planSummary['in_progress'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between py-2"><span><?php echo e(__('Completed')); ?></span><span><?php echo e($planSummary['completed'] ?? 0); ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Weather Exposure')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Low')); ?></span><span><?php echo e($weatherSummary['low'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Medium')); ?></span><span><?php echo e($weatherSummary['medium'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between py-2"><span><?php echo e(__('High')); ?></span><span><?php echo e($weatherSummary['high'] ?? 0); ?></span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Active Campaigns')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $activePlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($plan->crop_name); ?></strong>
                                <span><?php echo e(ucfirst($plan->status)); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e($plan->variety ?: '-'); ?> / <?php echo e($plan->start_date?->format('Y-m-d')); ?> -> <?php echo e($plan->end_date?->format('Y-m-d')); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No active crop plans available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Lot Aging / Expiry')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $lotAging; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom py-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($lot->code); ?></strong>
                                <span><?php echo e(optional($lot->expiry_date)->format('Y-m-d') ?: '-'); ?></span>
                            </div>
                            <div class="small text-muted">
                                <?php echo e($lot->name); ?> / <?php echo e($lot->crop_type); ?> / <?php echo e($lot->quantity); ?> <?php echo e($lot->unit); ?>

                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No lots with expiry tracking available.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/agriculture_dashboard.blade.php ENDPATH**/ ?>
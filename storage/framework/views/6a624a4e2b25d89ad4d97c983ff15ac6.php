<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Agri Reports')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Agri Reports')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Monitor quality release, FEFO pressure, transformation yield and export mix.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Pass checks')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($qualitySummary['pass'] ?? 0); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('released lots')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Warnings')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($qualitySummary['warning'] ?? 0); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('lots under review')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Fails')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($qualitySummary['fail'] ?? 0); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('blocked lots')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('FEFO queue')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($fefoQueue->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('stored lots ordered by expiry')); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Destination Mix')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Country')); ?></th><th><?php echo e(__('Shipped quantity')); ?></th></tr></thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $destinationSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($item->destination_country); ?></td>
                                    <td><?php echo e($item->total_quantity); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="2" class="text-center text-muted"><?php echo e(__('No shipment data available.')); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Transformation Yield by Process')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Process')); ?></th><th><?php echo e(__('Input')); ?></th><th><?php echo e(__('Output')); ?></th><th><?php echo e(__('Waste')); ?></th></tr></thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $transformationYield; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($item->process_step); ?></td>
                                    <td><?php echo e($item->total_input); ?></td>
                                    <td><?php echo e($item->total_output); ?></td>
                                    <td><?php echo e($item->total_waste); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No transformation data available.')); ?></td></tr>
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
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Origin / Parcel Mix')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Origin')); ?></th><th><?php echo e(__('Lots')); ?></th><th><?php echo e(__('Quantity')); ?></th></tr></thead>
                        <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $sourceSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e($item->parcel_origin ?: __('Unknown')); ?></td>
                                    <td><?php echo e($item->total_lots); ?></td>
                                    <td><?php echo e($item->total_quantity); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="3" class="text-center text-muted"><?php echo e(__('No origin data available.')); ?></td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Cold Chain Status')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Stored')); ?></span><span><?php echo e($coldChainSummary['stored'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between border-bottom py-2"><span><?php echo e(__('Released')); ?></span><span><?php echo e($coldChainSummary['released'] ?? 0); ?></span></div>
                    <div class="d-flex justify-content-between py-2"><span><?php echo e(__('Blocked')); ?></span><span><?php echo e($coldChainSummary['blocked'] ?? 0); ?></span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('FEFO Queue')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead><tr><th><?php echo e(__('Lot')); ?></th><th><?php echo e(__('Facility')); ?></th><th><?php echo e(__('Expiry')); ?></th><th><?php echo e(__('Qty')); ?></th></tr></thead>
                <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $fefoQueue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td><?php echo e(optional($record->lot)->code ?? '-'); ?></td>
                            <td><?php echo e($record->facility_name); ?></td>
                            <td><?php echo e(optional($record->expiry_date)->format('Y-m-d')); ?></td>
                            <td><?php echo e($record->quantity); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No FEFO queue available.')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('Cooperative Supply Volume')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead><tr><th><?php echo e(__('Cooperative ID')); ?></th><th><?php echo e(__('Delivered Qty')); ?></th></tr></thead>
                <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $cooperativeSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td><?php echo e($item->cooperative_id); ?></td>
                            <td><?php echo e($item->total_net_weight); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="2" class="text-center text-muted"><?php echo e(__('No cooperative delivery data available.')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/reports.blade.php ENDPATH**/ ?>
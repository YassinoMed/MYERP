<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Property Unit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('property-units.index')); ?>"><?php echo e(__('Property Units')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($propertyUnit->unit_code); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12"><strong><?php echo e(__('Unit')); ?>:</strong> <?php echo e($propertyUnit->unit_code); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Property')); ?>:</strong> <?php echo e(optional($propertyUnit->property)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Floor')); ?>:</strong> <?php echo e($propertyUnit->floor ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Area')); ?>:</strong> <?php echo e($propertyUnit->area); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Monthly Rent')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($propertyUnit->monthly_rent)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($propertyUnit->status))); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($propertyUnit->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Lease History')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Tenant')); ?></th><th><?php echo e(__('Period')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__empty_2 = true; $__currentLoopData = $propertyUnit->leases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <tr>
                                    <td><?php echo e($lease->reference); ?></td>
                                    <td><?php echo e(optional($lease->customer)->name ?: '-'); ?></td>
                                    <td><?php echo e(Auth::user()->dateFormat($lease->start_date)); ?> - <?php echo e($lease->end_date ? Auth::user()->dateFormat($lease->end_date) : '-'); ?></td>
                                    <td><?php echo e(__(ucfirst(str_replace('_', ' ', $lease->status)))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No leases attached to this unit.')); ?></td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/property_units/show.blade.php ENDPATH**/ ?>
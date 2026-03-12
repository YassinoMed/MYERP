<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Property')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('managed-properties.index')); ?>"><?php echo e(__('Properties')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($managedProperty->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12"><strong><?php echo e(__('Property')); ?>:</strong> <?php echo e($managedProperty->name); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Code')); ?>:</strong> <?php echo e($managedProperty->property_code); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e($managedProperty->property_type ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($managedProperty->status))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Manager')); ?>:</strong> <?php echo e(optional($managedProperty->manager)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('City')); ?>:</strong> <?php echo e($managedProperty->city ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Address')); ?>:</strong> <?php echo e($managedProperty->address ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($managedProperty->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Units')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Unit')); ?></th><th><?php echo e(__('Floor')); ?></th><th><?php echo e(__('Rent')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__empty_2 = true; $__currentLoopData = $managedProperty->units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <tr>
                                    <td><?php echo e($unit->unit_code); ?></td>
                                    <td><?php echo e($unit->floor ?: '-'); ?></td>
                                    <td><?php echo e(Auth::user()->priceFormat($unit->monthly_rent)); ?></td>
                                    <td><?php echo e(__(ucfirst($unit->status))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No units created yet.')); ?></td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Leases')); ?></h5></div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Unit')); ?></th><th><?php echo e(__('Tenant')); ?></th><th><?php echo e(__('Rent')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__empty_2 = true; $__currentLoopData = $managedProperty->leases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                <tr>
                                    <td><?php echo e($lease->reference); ?></td>
                                    <td><?php echo e(optional($lease->unit)->unit_code ?: '-'); ?></td>
                                    <td><?php echo e(optional($lease->customer)->name ?: '-'); ?></td>
                                    <td><?php echo e(Auth::user()->priceFormat($lease->rent_amount)); ?></td>
                                    <td><?php echo e(__(ucfirst(str_replace('_', ' ', $lease->status)))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No leases linked yet.')); ?></td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/managed_properties/show.blade.php ENDPATH**/ ?>
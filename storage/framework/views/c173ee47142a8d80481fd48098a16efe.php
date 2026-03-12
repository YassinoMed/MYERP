<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Property Lease')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('property-leases.index')); ?>"><?php echo e(__('Property Leases')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($propertyLease->reference); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <div class="row gy-3">
                <div class="col-md-4"><strong><?php echo e(__('Reference')); ?>:</strong> <?php echo e($propertyLease->reference); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Property')); ?>:</strong> <?php echo e(optional($propertyLease->property)->name ?: '-'); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Unit')); ?>:</strong> <?php echo e(optional($propertyLease->unit)->unit_code ?: '-'); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Tenant')); ?>:</strong> <?php echo e(optional($propertyLease->customer)->name ?: '-'); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Billing Cycle')); ?>:</strong> <?php echo e(__(ucfirst($propertyLease->billing_cycle))); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $propertyLease->status)))); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Start Date')); ?>:</strong> <?php echo e(Auth::user()->dateFormat($propertyLease->start_date)); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('End Date')); ?>:</strong> <?php echo e($propertyLease->end_date ? Auth::user()->dateFormat($propertyLease->end_date) : '-'); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Renewal Date')); ?>:</strong> <?php echo e($propertyLease->renewal_date ? Auth::user()->dateFormat($propertyLease->renewal_date) : '-'); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Rent Amount')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($propertyLease->rent_amount)); ?></div>
                <div class="col-md-4"><strong><?php echo e(__('Deposit Amount')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($propertyLease->deposit_amount)); ?></div>
                <div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($propertyLease->notes ?: '-'); ?></p></div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/property_leases/show.blade.php ENDPATH**/ ?>
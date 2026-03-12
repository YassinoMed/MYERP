<?php $__env->startSection('page-title'); ?><?php echo e($subcontractOrder->reference ?: ('SUB-'.$subcontractOrder->id)); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('production.subcontract-orders.index')); ?>"><?php echo e(__('Subcontract Orders')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($subcontractOrder->reference ?: ('SUB-'.$subcontractOrder->id)); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card"><div class="card-body">
        <p><?php echo e(__('Production Order')); ?>: <?php echo e($subcontractOrder->order?->order_number ?: '-'); ?></p>
        <p><?php echo e(__('Routing Step')); ?>: <?php echo e($subcontractOrder->step?->name ?: '-'); ?></p>
        <p><?php echo e(__('Vendor')); ?>: <?php echo e($subcontractOrder->vendor?->name ?: '-'); ?></p>
        <p><?php echo e(__('Status')); ?>: <?php echo e(ucfirst(str_replace('_',' ', $subcontractOrder->status))); ?></p>
        <p><?php echo e(__('Quantity')); ?>: <?php echo e($subcontractOrder->quantity); ?></p>
        <p><?php echo e(__('Unit Cost')); ?>: <?php echo e(\Auth::user()->priceFormat($subcontractOrder->unit_cost)); ?></p>
        <p class="mb-0"><?php echo e(__('Quality Notes')); ?>: <?php echo e($subcontractOrder->quality_notes ?: '-'); ?></p>
    </div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/subcontract_orders/show.blade.php ENDPATH**/ ?>
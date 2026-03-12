<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('FEFO Board')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('FEFO Board')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Prioritize stored lots by expiry date to support FEFO picking, cold-chain discipline and spoilage reduction.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header"><h5 class="mb-0"><?php echo e(__('Expiry Priority Queue')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Lot')); ?></th>
                        <th><?php echo e(__('Facility')); ?></th>
                        <th><?php echo e(__('Expiry Date')); ?></th>
                        <th><?php echo e(__('Days to Expiry')); ?></th>
                        <th><?php echo e(__('Risk')); ?></th>
                        <th><?php echo e(__('Qty')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td><?php echo e(optional($row['record']->lot)->code ?: '-'); ?></td>
                            <td><?php echo e($row['record']->facility_name); ?></td>
                            <td><?php echo e(optional($row['record']->expiry_date)->format('Y-m-d') ?: '-'); ?></td>
                            <td><?php echo e($row['days_to_expiry']); ?></td>
                            <td><span class="badge bg-<?php echo e($row['risk'] === 'critical' ? 'danger' : ($row['risk'] === 'warning' ? 'warning' : 'success')); ?>"><?php echo e(ucfirst($row['risk'])); ?></span></td>
                            <td><?php echo e($row['record']->quantity); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No FEFO records available.')); ?></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/fefo.blade.php ENDPATH**/ ?>
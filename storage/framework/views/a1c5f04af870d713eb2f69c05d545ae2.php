<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Biomedical Assets')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Biomedical')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Manage maintenance readiness, calibration due dates and asset availability for clinical equipment.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Operational')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['operational']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('In maintenance')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['maintenance']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Calibration due')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['due']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Out of service')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['out_of_service']); ?></strong></div>
    </div>

    <div class="card">
        <div class="card-header"><h5><?php echo e(__('Asset Readiness')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Asset')); ?></th>
                        <th><?php echo e(__('Code')); ?></th>
                        <th><?php echo e(__('Type')); ?></th>
                        <th><?php echo e(__('Location')); ?></th>
                        <th><?php echo e(__('Calibration due')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Update')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $biomedicalAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($asset->name); ?></td>
                            <td><?php echo e($asset->asset_code); ?></td>
                            <td><?php echo e($asset->equipment_type ?: '-'); ?></td>
                            <td><?php echo e($asset->location ?: '-'); ?></td>
                            <td><?php echo e($asset->calibration_due_date?->format('Y-m-d') ?: '-'); ?></td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $asset->maintenance_status))); ?></td>
                            <td>
                                <form action="<?php echo e(route('medical.operations.biomedical-assets.status', $asset->id)); ?>" method="post" class="d-flex gap-2">
                                    <?php echo csrf_field(); ?>
                                    <select name="maintenance_status" class="form-control form-control-sm">
                                        <option value="operational" <?php if($asset->maintenance_status === 'operational'): echo 'selected'; endif; ?>><?php echo e(__('Operational')); ?></option>
                                        <option value="maintenance" <?php if($asset->maintenance_status === 'maintenance'): echo 'selected'; endif; ?>><?php echo e(__('Maintenance')); ?></option>
                                        <option value="due" <?php if($asset->maintenance_status === 'due'): echo 'selected'; endif; ?>><?php echo e(__('Due')); ?></option>
                                        <option value="out_of_service" <?php if($asset->maintenance_status === 'out_of_service'): echo 'selected'; endif; ?>><?php echo e(__('Out of Service')); ?></option>
                                    </select>
                                    <button class="btn btn-sm btn-primary"><?php echo e(__('Save')); ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/biomedical.blade.php ENDPATH**/ ?>
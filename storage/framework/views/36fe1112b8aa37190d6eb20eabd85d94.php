<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Surgery Board')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Surgery Board')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Follow theatre workload, procedure status and surgical backlog from one perioperative board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Planned')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['planned']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('In progress')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['in_progress']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Completed')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['completed']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Cancelled')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['cancelled']); ?></strong></div>
    </div>

    <div class="card">
        <div class="card-header"><h5><?php echo e(__('Perioperative Schedule')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Patient')); ?></th>
                        <th><?php echo e(__('Procedure')); ?></th>
                        <th><?php echo e(__('Surgeon')); ?></th>
                        <th><?php echo e(__('Theatre')); ?></th>
                        <th><?php echo e(__('Scheduled')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Update')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(optional($procedure->patient)->first_name); ?> <?php echo e(optional($procedure->patient)->last_name); ?></td>
                            <td><?php echo e($procedure->procedure_name); ?></td>
                            <td><?php echo e($procedure->surgeon_name ?: '-'); ?></td>
                            <td><?php echo e($procedure->theatre_name ?: '-'); ?></td>
                            <td><?php echo e($procedure->scheduled_at?->format('Y-m-d H:i')); ?></td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $procedure->status))); ?></td>
                            <td>
                                <form action="<?php echo e(route('medical.operations.surgical-procedures.status', $procedure->id)); ?>" method="post" class="d-flex gap-2">
                                    <?php echo csrf_field(); ?>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="planned" <?php if($procedure->status === 'planned'): echo 'selected'; endif; ?>><?php echo e(__('Planned')); ?></option>
                                        <option value="in_progress" <?php if($procedure->status === 'in_progress'): echo 'selected'; endif; ?>><?php echo e(__('In Progress')); ?></option>
                                        <option value="completed" <?php if($procedure->status === 'completed'): echo 'selected'; endif; ?>><?php echo e(__('Completed')); ?></option>
                                        <option value="cancelled" <?php if($procedure->status === 'cancelled'): echo 'selected'; endif; ?>><?php echo e(__('Cancelled')); ?></option>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/surgery.blade.php ENDPATH**/ ?>
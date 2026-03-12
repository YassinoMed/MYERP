<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Medical Laboratory')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Laboratory')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track panels, collection flow, validation throughput and critical patient samples from a dedicated laboratory board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Ordered')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['ordered']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Collected')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['collected']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Validated')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['validated']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Critical')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['critical']); ?></strong></div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><h5><?php echo e(__('Lab Order Workflow')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Patient')); ?></th>
                        <th><?php echo e(__('Panel')); ?></th>
                        <th><?php echo e(__('Ordered')); ?></th>
                        <th><?php echo e(__('Critical')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Update')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $labOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(optional($order->patient)->first_name); ?> <?php echo e(optional($order->patient)->last_name); ?></td>
                            <td><?php echo e($order->panel_name); ?></td>
                            <td><?php echo e($order->ordered_at?->format('Y-m-d H:i')); ?></td>
                            <td><?php echo e($order->critical_flag ? __('Yes') : __('No')); ?></td>
                            <td><?php echo e(ucfirst($order->status)); ?></td>
                            <td>
                                <form action="<?php echo e(route('medical.operations.lab-orders.status', $order->id)); ?>" method="post" class="d-flex gap-2">
                                    <?php echo csrf_field(); ?>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="ordered" <?php if($order->status === 'ordered'): echo 'selected'; endif; ?>><?php echo e(__('Ordered')); ?></option>
                                        <option value="collected" <?php if($order->status === 'collected'): echo 'selected'; endif; ?>><?php echo e(__('Collected')); ?></option>
                                        <option value="validated" <?php if($order->status === 'validated'): echo 'selected'; endif; ?>><?php echo e(__('Validated')); ?></option>
                                        <option value="completed" <?php if($order->status === 'completed'): echo 'selected'; endif; ?>><?php echo e(__('Completed')); ?></option>
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

    <div class="card">
        <div class="card-header"><h5><?php echo e(__('Recent Lab Results')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Patient')); ?></th>
                        <th><?php echo e(__('Test')); ?></th>
                        <th><?php echo e(__('Result')); ?></th>
                        <th><?php echo e(__('Date')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $labResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(optional($result->patient)->first_name); ?> <?php echo e(optional($result->patient)->last_name); ?></td>
                            <td><?php echo e($result->test_name); ?></td>
                            <td><?php echo e($result->result_value); ?></td>
                            <td><?php echo e($result->result_date ? \Auth::user()->dateFormat($result->result_date) : '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/laboratory.blade.php ENDPATH**/ ?>
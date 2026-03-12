<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Customer Recoveries')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Customer Recoveries')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Monitor overdue exposure, escalation pressure and collection workload in one queue.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create customer recovery')): ?>
            <a href="#" data-url="<?php echo e(route('customer-recoveries.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Recovery Case')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $recoveryCollection = collect($recoveries);
        $openRecoveries = $recoveryCollection->filter(function ($recovery) {
            return !in_array($recovery->status, ['closed', 'resolved', 'paid'], true);
        })->count();
        $priorityRecoveries = $recoveryCollection->where('priority', 'high')->count() + $recoveryCollection->where('priority', 'critical')->count();
        $totalRecoveryDue = $recoveryCollection->sum('due_amount');
        $escalatedRecoveries = $recoveryCollection->where('stage', 'legal')->count() + $recoveryCollection->where('stage', 'escalated')->count();
    ?>

    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Open recovery cases')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($openRecoveries); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('Cases still requiring action')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('High priority cases')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($priorityRecoveries); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('Accounts with immediate follow-up pressure')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Outstanding amount')); ?></span>
            <strong class="ux-kpi-value"><?php echo e(Auth::user()->priceFormat($totalRecoveryDue)); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('Overdue exposure managed by the team')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Escalated files')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($escalatedRecoveries); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('Cases already pushed to advanced treatment')); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Reference')); ?></th>
                                    <th><?php echo e(__('Customer')); ?></th>
                                    <th><?php echo e(__('Invoice')); ?></th>
                                    <th><?php echo e(__('Stage')); ?></th>
                                    <th><?php echo e(__('Priority')); ?></th>
                                    <th><?php echo e(__('Due Amount')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th width="220px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $recoveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recovery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-bulk-id="<?php echo e($recovery->id); ?>">
                                        <td><?php echo e($recovery->reference ?: ('REC-' . $recovery->id)); ?></td>
                                        <td><?php echo e(optional($recovery->customer)->name ?: '-'); ?></td>
                                        <td><?php echo e(optional($recovery->invoice)->invoice_id ?: '-'); ?></td>
                                        <td><?php echo e(__(ucfirst(str_replace('_', ' ', $recovery->stage)))); ?></td>
                                        <td><?php echo e(__(ucfirst($recovery->priority))); ?></td>
                                        <td><?php echo e(Auth::user()->priceFormat($recovery->due_amount)); ?></td>
                                        <td><?php echo e(__(ucfirst(str_replace('_', ' ', $recovery->status)))); ?></td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="<?php echo e(route('customer-recoveries.show', $recovery->id)); ?>"
                                                    class="mx-3 btn btn-sm align-items-center bg-warning">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit customer recovery')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" data-url="<?php echo e(URL::to('customer-recoveries/' . $recovery->id . '/edit')); ?>"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Edit Recovery Case')); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-info">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete customer recovery')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['customer-recoveries.destroy', $recovery->id], 'id' => 'delete-form-' . $recovery->id]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($recovery->id); ?>').submit();">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/customer_recoveries/index.blade.php ENDPATH**/ ?>
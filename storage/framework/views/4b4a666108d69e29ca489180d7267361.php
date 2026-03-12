<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Insurance Claims')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Insurance Claims')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create insurance claim')): ?>
            <a href="#" data-url="<?php echo e(route('insurance-claims.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Insurance Claim')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Claim')); ?></th>
                                    <th><?php echo e(__('Policy')); ?></th>
                                    <th><?php echo e(__('Customer')); ?></th>
                                    <th><?php echo e(__('Incident Date')); ?></th>
                                    <th><?php echo e(__('Amount Claimed')); ?></th>
                                    <th><?php echo e(__('Priority')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th width="220px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($claim->claim_number); ?></td>
                                        <td><?php echo e(optional($claim->policy)->policy_name ?: '-'); ?></td>
                                        <td><?php echo e(optional($claim->customer)->name ?: '-'); ?></td>
                                        <td><?php echo e($claim->incident_date ? Auth::user()->dateFormat($claim->incident_date) : '-'); ?></td>
                                        <td><?php echo e(Auth::user()->priceFormat($claim->amount_claimed)); ?></td>
                                        <td><?php echo e(__(ucfirst($claim->priority))); ?></td>
                                        <td><?php echo e(__(ucfirst(str_replace('_', ' ', $claim->status)))); ?></td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="<?php echo e(route('insurance-claims.show', $claim->id)); ?>"
                                                    class="mx-3 btn btn-sm align-items-center bg-warning">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit insurance claim')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" data-url="<?php echo e(route('insurance-claims.edit', $claim->id)); ?>"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Edit Insurance Claim')); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-info">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete insurance claim')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['insurance-claims.destroy', $claim->id], 'id' => 'delete-form-claim-' . $claim->id]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-claim-<?php echo e($claim->id); ?>').submit();">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/insurance_claims/index.blade.php ENDPATH**/ ?>
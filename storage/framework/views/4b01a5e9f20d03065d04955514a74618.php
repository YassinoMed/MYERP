<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Insurance Policy')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('insurance-policies.index')); ?>"><?php echo e(__('Insurance Policies')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($insurancePolicy->policy_name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12"><strong><?php echo e(__('Policy')); ?>:</strong> <?php echo e($insurancePolicy->policy_name); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Number')); ?>:</strong> <?php echo e($insurancePolicy->policy_number); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Provider')); ?>:</strong> <?php echo e($insurancePolicy->provider_name); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Coverage Type')); ?>:</strong> <?php echo e($insurancePolicy->coverage_type ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $insurancePolicy->status)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Insured Party')); ?>:</strong> <?php echo e($insurancePolicy->insured_party ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Insured Asset')); ?>:</strong> <?php echo e($insurancePolicy->insured_asset ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Premium')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($insurancePolicy->premium_amount)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Coverage Amount')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($insurancePolicy->coverage_amount)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Start Date')); ?>:</strong> <?php echo e($insurancePolicy->start_date ? Auth::user()->dateFormat($insurancePolicy->start_date) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('End Date')); ?>:</strong> <?php echo e($insurancePolicy->end_date ? Auth::user()->dateFormat($insurancePolicy->end_date) : '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($insurancePolicy->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Linked Claims')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Claim')); ?></th>
                                    <th><?php echo e(__('Customer')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Assignee')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $insurancePolicy->claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($claim->claim_number); ?></td>
                                        <td><?php echo e(optional($claim->customer)->name ?: '-'); ?></td>
                                        <td><?php echo e(Auth::user()->priceFormat($claim->amount_claimed)); ?></td>
                                        <td><?php echo e(__(ucfirst(str_replace('_', ' ', $claim->status)))); ?></td>
                                        <td><?php echo e(optional($claim->assignee)->name ?: '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-center text-muted"><?php echo e(__('No claims linked to this policy yet.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/insurance_policies/show.blade.php ENDPATH**/ ?>
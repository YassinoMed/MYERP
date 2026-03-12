<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Customer Portal')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('retail.operations.index')); ?>"><?php echo e(__('Retail Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Customer Portal')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Review customer invoices, recoveries, contracts and deliveries from an internal self-service perspective.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?php echo e(route('retail.customer-portal')); ?>" class="row align-items-end">
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Customer')); ?></label>
                    <select name="customer_id" class="form-control">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($customer->id); ?>" <?php if(optional($selectedCustomer)->id === $customer->id): echo 'selected'; endif; ?>><?php echo e($customer->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary"><?php echo e(__('Open Portal View')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <?php if($selectedCustomer): ?>
        <div class="ux-kpi-grid mb-4">
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Invoices')); ?></span><strong class="ux-kpi-value"><?php echo e($invoices->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Open recoveries')); ?></span><strong class="ux-kpi-value"><?php echo e($recoveries->where('status', '!=', 'closed')->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Delivery notes')); ?></span><strong class="ux-kpi-value"><?php echo e($deliveryNotes->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Contracts')); ?></span><strong class="ux-kpi-value"><?php echo e($contracts->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Invoice exposure')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat(data_get($customerSummary, 'invoice_due', 0))); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Matching promotions')); ?></span><strong class="ux-kpi-value"><?php echo e(data_get($customerSummary, 'promotion_matches', 0)); ?></strong></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Invoices')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Invoice')); ?></th><th><?php echo e(__('Issue date')); ?></th><th><?php echo e(__('Total')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></td>
                                    <td><?php echo e($invoice->issue_date ? \Auth::user()->dateFormat($invoice->issue_date) : '-'); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->getTotal())); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->getDue())); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Recoveries')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Stage')); ?></th><th><?php echo e(__('Priority')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $recoveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recovery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($recovery->reference); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $recovery->stage))); ?></td>
                                    <td><?php echo e(ucfirst($recovery->priority)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($recovery->due_amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Deliveries')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Tracking')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $deliveryNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($note->reference ?: ('#' . $note->id)); ?></td>
                                    <td><?php echo e($note->delivery_date?->format('Y-m-d')); ?></td>
                                    <td><?php echo e($note->tracking_number ?: '-'); ?></td>
                                    <td><?php echo e(ucfirst($note->status)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Contracts')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Contract')); ?></th><th><?php echo e(__('Cycle')); ?></th><th><?php echo e(__('Amount')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contract->contract_number); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $contract->billing_cycle ?: 'one_off'))); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($contract->amount)); ?></td>
                                    <td><?php echo e(ucfirst($contract->status)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/retail/customer_portal.blade.php ENDPATH**/ ?>
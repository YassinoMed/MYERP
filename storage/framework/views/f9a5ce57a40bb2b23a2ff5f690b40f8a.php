<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Retail Reports')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('retail.operations.index')); ?>"><?php echo e(__('Retail Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reports')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track store activation, promotion pressure, contract exposure and recent commercial flow.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Active stores')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['active_stores']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Open sessions')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['open_sessions']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Active promotions')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['active_promotions']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Contract value')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($kpis['contract_value'])); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Payment mix')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat(data_get($paymentMix, 'payments_total', 0))); ?></strong></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Recent Sales')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Customer')); ?></th><th><?php echo e(__('Invoice')); ?></th><th><?php echo e(__('Total')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($invoice->customer)->name ?: '-'); ?></td>
                                <td><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></td>
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
                <div class="card-header"><h5><?php echo e(__('Recent Purchases')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Supplier')); ?></th><th><?php echo e(__('Purchase')); ?></th><th><?php echo e(__('Total')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($purchase->vender)->name ?: '-'); ?></td>
                                <td><?php echo e($purchase->purchase_number ?: ('#' . $purchase->id)); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($purchase->getTotal())); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($purchase->getDue())); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Promotion Pipeline')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Code')); ?></th><th><?php echo e(__('Name')); ?></th><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($promotion->code); ?></td>
                                <td><?php echo e($promotion->name); ?></td>
                                <td><?php echo e(ucfirst($promotion->promotion_type)); ?></td>
                                <td><?php echo e(ucfirst($promotion->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Commercial Contracts')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Number')); ?></th><th><?php echo e(__('Party')); ?></th><th><?php echo e(__('Cycle')); ?></th><th><?php echo e(__('Amount')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($contract->contract_number); ?></td>
                                <td><?php echo e($contract->party_name ?: ucfirst($contract->party_type)); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $contract->billing_cycle ?: 'one_off'))); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($contract->amount)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Store Performance')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Store')); ?></th><th><?php echo e(__('Sessions')); ?></th><th><?php echo e(__('Transactions')); ?></th><th><?php echo e(__('Variance')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $storePerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row['store']->name); ?></td>
                                <td><?php echo e($row['sessions']); ?></td>
                                <td><?php echo e($row['transactions']); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($row['variance'])); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Procurement Pipeline')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Store')); ?></th><th><?php echo e(__('Budget')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $procurementRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($request->reference); ?></td>
                                <td><?php echo e(optional($request->retailStore)->name ?: '-'); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($request->budget_amount)); ?></td>
                                <td><?php echo e(ucfirst($request->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Replenishment Flow')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Product')); ?></th><th><?php echo e(__('To')); ?></th><th><?php echo e(__('Qty')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $replenishments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($request->product)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($request->destinationStore)->name ?: '-'); ?></td>
                                <td><?php echo e($request->suggested_quantity); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $request->status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Top Products By Sales')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Product')); ?></th><th><?php echo e(__('Sold Qty')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $topProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($item->product)->name ?: ('#' . $item->product_id)); ?></td>
                                <td><?php echo e($item->sold_quantity); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/retail/reports.blade.php ENDPATH**/ ?>
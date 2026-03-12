<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Commercial BI')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('retail.operations.index')); ?>"><?php echo e(__('Retail Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Commercial BI')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track retail network health, contract exposure, procurement load and top selling items from one distribution analytics board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Stores')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['store_count']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('POS sessions')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['sessions_count']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Transactions')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['transactions_count']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Mixed payment sessions')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['mixed_payment_sessions']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Promotion budget')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($scoreboard['promotion_budget'])); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Contract exposure')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($scoreboard['contract_exposure'])); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Procurement backlog')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['procurement_backlog']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Replenishment backlog')); ?></span><strong class="ux-kpi-value"><?php echo e($scoreboard['replenishment_backlog']); ?></strong></div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Store Network')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Store')); ?></th><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Target revenue')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($store->name); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $store->store_type ?? 'store'))); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($store->target_revenue)); ?></td>
                                <td><?php echo e(ucfirst($store->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Promotion Portfolio')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Promotion')); ?></th><th><?php echo e(__('Store')); ?></th><th><?php echo e(__('Audience')); ?></th><th><?php echo e(__('Budget')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($promotion->name); ?></td>
                                <td><?php echo e(optional($promotion->retailStore)->name ?: __('Global')); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $promotion->audience_type ?? 'all'))); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($promotion->budget_amount)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Top Sales Products')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Product')); ?></th><th><?php echo e(__('Qty sold')); ?></th><th><?php echo e(__('Revenue')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $invoiceItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($item->product)->name ?: ('#' . $item->product_id)); ?></td>
                                <td><?php echo e($item->quantity_sold); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($item->total_revenue)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Top Purchase Products')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Product')); ?></th><th><?php echo e(__('Qty bought')); ?></th><th><?php echo e(__('Spend')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $purchaseItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($item->product)->name ?: ('#' . $item->product_id)); ?></td>
                                <td><?php echo e($item->quantity_bought); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($item->spend_total)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/retail/bi.blade.php ENDPATH**/ ?>
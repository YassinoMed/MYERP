<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Supplier Portal')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('retail.operations.index')); ?>"><?php echo e(__('Retail Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Supplier Portal')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track purchase exposure and supplier commercial agreements through one supplier-facing workspace.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?php echo e(route('retail.supplier-portal')); ?>" class="row align-items-end">
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Supplier')); ?></label>
                    <select name="vender_id" class="form-control">
                        <?php $__currentLoopData = $venders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($vender->id); ?>" <?php if(optional($selectedVender)->id === $vender->id): echo 'selected'; endif; ?>><?php echo e($vender->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary"><?php echo e(__('Open Portal View')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <?php if($selectedVender): ?>
        <div class="ux-kpi-grid mb-4">
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Purchases')); ?></span><strong class="ux-kpi-value"><?php echo e($purchases->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Open due')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($purchases->sum(fn($purchase) => $purchase->getDue()))); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Contracts')); ?></span><strong class="ux-kpi-value"><?php echo e($contracts->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Purchase exposure')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat(data_get($supplierSummary, 'purchase_total', 0))); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Monthly contracts')); ?></span><strong class="ux-kpi-value"><?php echo e(data_get($supplierSummary, 'monthly_contracts', 0)); ?></strong></div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Purchases')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Purchase')); ?></th><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Total')); ?></th><th><?php echo e(__('Due')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($purchase->purchase_number ?: ('#' . $purchase->id)); ?></td>
                                    <td><?php echo e($purchase->purchase_date ? \Auth::user()->dateFormat($purchase->purchase_date) : '-'); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($purchase->getTotal())); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($purchase->getDue())); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Commercial Contracts')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Contract')); ?></th><th><?php echo e(__('Amount')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contract->contract_number); ?></td>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/retail/supplier_portal.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Delivery Notes')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Monitor shipping progress, partial deliveries and field execution from the sales flow.')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Delivery Notes')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create delivery note')): ?>
            <a href="<?php echo e(route('delivery-note.create')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $statusCounts = $deliveryNotes->groupBy('status')->map->count();
        $totalQuantity = $deliveryNotes->sum(function ($deliveryNote) {
            return $deliveryNote->getTotalQuantity();
        });
    ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Total delivery notes')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($deliveryNotes->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('sales logistics records')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Dispatched')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($statusCounts['dispatched'] ?? 0); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('in transit')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Delivered')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($statusCounts['delivered'] ?? 0); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('completed notes')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Quantity moved')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($totalQuantity); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('units delivered')); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Delivery Note')); ?></th>
                                    <th><?php echo e(__('Invoice')); ?></th>
                                    <th><?php echo e(__('Customer')); ?></th>
                                    <th><?php echo e(__('Delivery Date')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Quantity')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $deliveryNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryNote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-bulk-id="<?php echo e($deliveryNote->id); ?>">
                                        <td>
                                            <a href="<?php echo e(route('delivery-note.show', $deliveryNote->id)); ?>" class="btn btn-outline-primary">
                                                <?php echo e(sprintf('DN-%05d', $deliveryNote->delivery_note_id)); ?>

                                            </a>
                                        </td>
                                        <td><?php echo e(optional($deliveryNote->invoice)->invoice_id ? \Auth::user()->invoiceNumberFormat($deliveryNote->invoice->invoice_id) : '-'); ?></td>
                                        <td><?php echo e(optional($deliveryNote->customer)->name ?: '-'); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($deliveryNote->delivery_date)); ?></td>
                                        <td>
                                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\DeliveryNote::$statuses[$deliveryNote->status] ?? ucfirst($deliveryNote->status))); ?></span>
                                        </td>
                                        <td><?php echo e($deliveryNote->getTotalQuantity()); ?></td>
                                        <td class="Action">
                                            <span class="d-flex">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show delivery note')): ?>
                                                    <div class="action-btn me-2">
                                                        <a href="<?php echo e(route('delivery-note.show', $deliveryNote->id)); ?>" class="btn btn-sm bg-warning">
                                                            <i class="ti ti-eye text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit delivery note')): ?>
                                                    <div class="action-btn me-2">
                                                        <a href="<?php echo e(route('delivery-note.edit', $deliveryNote->id)); ?>" class="btn btn-sm bg-info">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete delivery note')): ?>
                                                    <div class="action-btn">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['delivery-note.destroy', $deliveryNote->id], 'id' => 'delete-form-' . $deliveryNote->id]); ?>

                                                        <a href="#" class="btn btn-sm bg-danger bs-pass-para">
                                                            <i class="ti ti-trash text-white"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </span>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/delivery_note/index.blade.php ENDPATH**/ ?>
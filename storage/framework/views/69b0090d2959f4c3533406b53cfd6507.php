<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Delivery Note Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('delivery-note.index')); ?>"><?php echo e(__('Delivery Notes')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(sprintf('DN-%05d', $deliveryNote->delivery_note_id)); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit delivery note')): ?>
            <a href="<?php echo e(route('delivery-note.edit', $deliveryNote->id)); ?>" class="btn btn-sm btn-info me-2">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e(sprintf('DN-%05d', $deliveryNote->delivery_note_id)); ?></h5>
                    <p class="mb-1"><?php echo e(__('Status')); ?>: <strong><?php echo e(__(\App\Models\DeliveryNote::$statuses[$deliveryNote->status] ?? ucfirst($deliveryNote->status))); ?></strong></p>
                    <p class="mb-1"><?php echo e(__('Delivery Date')); ?>: <?php echo e(\Auth::user()->dateFormat($deliveryNote->delivery_date)); ?></p>
                    <p class="mb-1"><?php echo e(__('Invoice')); ?>: <?php echo e(optional($deliveryNote->invoice)->invoice_id ? \Auth::user()->invoiceNumberFormat($deliveryNote->invoice->invoice_id) : '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Customer')); ?>: <?php echo e(optional($deliveryNote->customer)->name ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Driver')); ?>: <?php echo e($deliveryNote->driver_name ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Vehicle')); ?>: <?php echo e($deliveryNote->vehicle_number ?: '-'); ?></p>
                    <p class="mb-1"><?php echo e(__('Tracking')); ?>: <?php echo e($deliveryNote->tracking_number ?: '-'); ?></p>
                    <p class="mb-0"><?php echo e(__('Shipping Address')); ?>: <?php echo e($deliveryNote->shipping_address ?: '-'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Product')); ?></th>
                                    <th><?php echo e(__('Quantity')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $deliveryNote->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(optional($item->product)->name ?: __('Unknown product')); ?></td>
                                        <td><?php echo e($item->quantity); ?></td>
                                        <td><?php echo e($item->description ?: '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($deliveryNote->notes): ?>
                        <div class="mt-3">
                            <h6><?php echo e(__('Notes')); ?></h6>
                            <p class="mb-0"><?php echo e($deliveryNote->notes); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/delivery_note/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Edit Delivery Note')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('delivery-note.index')); ?>"><?php echo e(__('Delivery Notes')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(sprintf('DN-%05d', $deliveryNote->delivery_note_id)); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo Form::model($deliveryNote, ['route' => ['delivery-note.update', $deliveryNote->id], 'method' => 'PUT']); ?>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Delivery Date')); ?></label>
                                <input type="date" class="form-control" name="delivery_date" value="<?php echo e($deliveryNote->delivery_date->format('Y-m-d')); ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control" required>
                                    <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e($deliveryNote->status === $key ? 'selected' : ''); ?>><?php echo e(__($label)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Reference')); ?></label>
                                <input type="text" class="form-control" name="reference" value="<?php echo e($deliveryNote->reference); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Tracking Number')); ?></label>
                                <input type="text" class="form-control" name="tracking_number" value="<?php echo e($deliveryNote->tracking_number); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Driver Name')); ?></label>
                                <input type="text" class="form-control" name="driver_name" value="<?php echo e($deliveryNote->driver_name); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Vehicle Number')); ?></label>
                                <input type="text" class="form-control" name="vehicle_number" value="<?php echo e($deliveryNote->vehicle_number); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Shipping Address')); ?></label>
                                <input type="text" class="form-control" name="shipping_address" value="<?php echo e($deliveryNote->shipping_address); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label"><?php echo e(__('Notes')); ?></label>
                                <textarea name="notes" rows="2" class="form-control"><?php echo e($deliveryNote->notes); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <?php
                        $delivered = [];
                        foreach ($deliveryNote->invoice->deliveryNotes as $existingDelivery) {
                            if ($existingDelivery->id === $deliveryNote->id || $existingDelivery->status === 'cancelled') {
                                continue;
                            }
                            foreach ($existingDelivery->items as $existingItem) {
                                $delivered[$existingItem->invoice_product_id] = ($delivered[$existingItem->invoice_product_id] ?? 0) + (float) $existingItem->quantity;
                            }
                        }
                        $currentItems = $deliveryNote->items->keyBy('invoice_product_id');
                    ?>

                    <div class="table-responsive mt-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Product')); ?></th>
                                    <th><?php echo e(__('Invoiced Qty')); ?></th>
                                    <th><?php echo e(__('Already Delivered')); ?></th>
                                    <th><?php echo e(__('Remaining')); ?></th>
                                    <th><?php echo e(__('Deliver Qty')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $deliveryNote->invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $alreadyDelivered = (float) ($delivered[$invoiceItem->id] ?? 0);
                                        $currentQuantity = (float) optional($currentItems->get($invoiceItem->id))->quantity;
                                        $remaining = max(0, (float) $invoiceItem->quantity - $alreadyDelivered);
                                    ?>
                                    <tr>
                                        <td><?php echo e(optional($invoiceItem->product)->name ?: __('Unknown product')); ?></td>
                                        <td><?php echo e($invoiceItem->quantity); ?></td>
                                        <td><?php echo e($alreadyDelivered); ?></td>
                                        <td><?php echo e($remaining); ?></td>
                                        <td>
                                            <input type="number" step="0.01" min="0" max="<?php echo e($remaining); ?>" name="items[<?php echo e($invoiceItem->id); ?>][quantity]" class="form-control" value="<?php echo e($currentQuantity); ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="items[<?php echo e($invoiceItem->id); ?>][description]" class="form-control" value="<?php echo e(optional($currentItems->get($invoiceItem->id))->description ?: $invoiceItem->description); ?>">
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 text-end">
                        <a href="<?php echo e(route('delivery-note.index')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/delivery_note/edit.blade.php ENDPATH**/ ?>
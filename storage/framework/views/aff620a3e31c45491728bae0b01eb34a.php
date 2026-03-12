<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Delivery Note')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('delivery-note.index')); ?>"><?php echo e(__('Delivery Notes')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        function reloadDeliveryInvoice(select) {
            const value = select.value;
            const target = "<?php echo e(route('delivery-note.create')); ?>";
            window.location = value ? `${target}?invoice_id=${value}` : target;
        }
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label"><?php echo e(__('Invoice')); ?></label>
                            <select class="form-control" onchange="reloadDeliveryInvoice(this)">
                                <option value=""><?php echo e(__('Select Invoice')); ?></option>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($invoice->id); ?>" <?php echo e(optional($selectedInvoice)->id === $invoice->id ? 'selected' : ''); ?>>
                                        <?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?> - <?php echo e(optional($invoice->customer)->name ?: __('Unknown customer')); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <?php if($selectedInvoice): ?>
                        <?php echo Form::open(['route' => 'delivery-note.store', 'method' => 'post']); ?>

                        <input type="hidden" name="invoice_id" value="<?php echo e($selectedInvoice->id); ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Delivery Date')); ?></label>
                                    <input type="date" class="form-control" name="delivery_date" value="<?php echo e(date('Y-m-d')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Status')); ?></label>
                                    <select name="status" class="form-control" required>
                                        <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e(__($label)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Reference')); ?></label>
                                    <input type="text" class="form-control" name="reference">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Tracking Number')); ?></label>
                                    <input type="text" class="form-control" name="tracking_number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Driver Name')); ?></label>
                                    <input type="text" class="form-control" name="driver_name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Vehicle Number')); ?></label>
                                    <input type="text" class="form-control" name="vehicle_number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Shipping Address')); ?></label>
                                    <input type="text" class="form-control" name="shipping_address" value="<?php echo e(optional($selectedInvoice->customer)->shipping_address); ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Notes')); ?></label>
                                    <textarea name="notes" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <?php
                            $delivered = [];
                            foreach ($selectedInvoice->deliveryNotes as $existingDelivery) {
                                if ($existingDelivery->status === 'cancelled') {
                                    continue;
                                }
                                foreach ($existingDelivery->items as $existingItem) {
                                    $delivered[$existingItem->invoice_product_id] = ($delivered[$existingItem->invoice_product_id] ?? 0) + (float) $existingItem->quantity;
                                }
                            }
                        ?>

                        <div class="table-responsive mt-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Product')); ?></th>
                                        <th><?php echo e(__('Invoiced Qty')); ?></th>
                                        <th><?php echo e(__('Already Delivered')); ?></th>
                                        <th><?php echo e(__('Remaining')); ?></th>
                                        <th><?php echo e(__('Deliver Now')); ?></th>
                                        <th><?php echo e(__('Description')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $selectedInvoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoiceItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $alreadyDelivered = (float) ($delivered[$invoiceItem->id] ?? 0);
                                            $remaining = max(0, (float) $invoiceItem->quantity - $alreadyDelivered);
                                        ?>
                                        <tr>
                                            <td><?php echo e(optional($invoiceItem->product)->name ?: __('Unknown product')); ?></td>
                                            <td><?php echo e($invoiceItem->quantity); ?></td>
                                            <td><?php echo e($alreadyDelivered); ?></td>
                                            <td><?php echo e($remaining); ?></td>
                                            <td>
                                                <input type="number" step="0.01" min="0" max="<?php echo e($remaining); ?>" name="items[<?php echo e($invoiceItem->id); ?>][quantity]" class="form-control" value="<?php echo e($remaining); ?>">
                                            </td>
                                            <td>
                                                <input type="text" name="items[<?php echo e($invoiceItem->id); ?>][description]" class="form-control" value="<?php echo e($invoiceItem->description); ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3 text-end">
                            <a href="<?php echo e(route('delivery-note.index')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
                        </div>
                        <?php echo Form::close(); ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/delivery_note/create.blade.php ENDPATH**/ ?>
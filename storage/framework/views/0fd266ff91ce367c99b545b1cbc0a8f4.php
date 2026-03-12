<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('BTP Price Breakdown')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('BTP Price Breakdown')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Items')); ?></h6>
                            <h3 class="mb-0"><?php echo e($totals['items']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Quotes')); ?></h6>
                            <h3 class="mb-0"><?php echo e($totals['quotes']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Total Quote Value')); ?></h6>
                            <h3 class="mb-0"><?php echo e(\Auth::user()->priceFormat($totals['quote_total'])); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Price Item')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.price-breakdowns.items.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Unit')); ?></label>
                            <input type="text" name="unit" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Unit Price')); ?></label>
                            <input type="number" step="0.01" name="unit_price" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Description')); ?></label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Item')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Quote')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.price-breakdowns.quotes.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Project')); ?></label>
                            <select name="project_id" class="form-control" required>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Reference')); ?></label>
                            <input type="text" name="reference" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('VAT Rate (%)')); ?></label>
                            <input type="number" step="0.01" name="vat_rate" class="form-control" value="19">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Quote')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Add Quote Item')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.price-breakdowns.quote-items.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quote')); ?></label>
                            <select name="quote_id" class="form-control" required>
                                <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($quote->id); ?>"><?php echo e($quote->reference); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Item')); ?></label>
                            <select name="price_item_id" class="form-control">
                                <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?> - <?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                            <input type="number" step="0.01" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Unit Price')); ?></label>
                            <input type="number" step="0.01" name="unit_price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Description')); ?></label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Add Item')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Price Items')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Unit')); ?></th>
                                <th><?php echo e(__('Unit Price')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->unit); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($item->unit_price)); ?></td>
                                    <td><?php echo e($item->description); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center"><?php echo e(__('No items found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Quotes')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Reference')); ?></th>
                                <th><?php echo e(__('Project')); ?></th>
                                <th><?php echo e(__('Created')); ?></th>
                                <th><?php echo e(__('Items')); ?></th>
                                <th><?php echo e(__('Total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($quote->reference); ?></td>
                                    <td><?php echo e($projects->firstWhere('id', $quote->project_id)?->project_name); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($quote->created_at)); ?></td>
                                    <td><?php echo e($quote->items_count); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($quote->total)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center"><?php echo e(__('No quotes found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Quote Items')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Quote')); ?></th>
                                <th><?php echo e(__('Item')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Line Total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $quoteItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($quotes->firstWhere('id', $quoteItem->quote_id)?->reference); ?></td>
                                    <td><?php echo e($items->firstWhere('id', $quoteItem->price_item_id)?->name ?? $quoteItem->description); ?></td>
                                    <td><?php echo e($quoteItem->quantity); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($quoteItem->line_total)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No quote items found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/btp/price-breakdowns.blade.php ENDPATH**/ ?>
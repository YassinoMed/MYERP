<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('BTP Subcontractors')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('BTP Subcontractors')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Outstanding')); ?></h6>
                            <h3 class="mb-0"><?php echo e(\Auth::user()->priceFormat($totalOutstanding)); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Retention')); ?></h6>
                            <h3 class="mb-0"><?php echo e(\Auth::user()->priceFormat($totalRetention)); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('VAT')); ?></h6>
                            <h3 class="mb-0"><?php echo e(\Auth::user()->priceFormat($totalVat)); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Subcontractor')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.subcontractors.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Contact Name')); ?></label>
                            <input type="text" name="contact_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Phone')); ?></label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Email')); ?></label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Address')); ?></label>
                            <textarea name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Invoice')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.subcontractors.invoices.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Subcontractor')); ?></label>
                            <select name="subcontractor_id" class="form-control" required>
                                <?php $__currentLoopData = $subcontractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcontractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($subcontractor->id); ?>"><?php echo e($subcontractor->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
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
                            <label class="form-label"><?php echo e(__('Amount')); ?></label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Retention Rate (%)')); ?></label>
                            <input type="number" step="0.01" name="retention_rate" class="form-control" value="10">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('VAT Rate (%)')); ?></label>
                            <input type="number" step="0.01" name="vat_rate" class="form-control" value="19">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Due Date')); ?></label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Invoice')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Record Payment')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.subcontractors.payments.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Invoice')); ?></label>
                            <select name="invoice_id" class="form-control" required>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($invoice->id); ?>"><?php echo e($invoice->reference ?? $invoice->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Amount')); ?></label>
                            <input type="number" step="0.01" name="amount" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Payment Date')); ?></label>
                            <input type="date" name="payment_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Payment')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Subcontractors')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Contact')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $subcontractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcontractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($subcontractor->name); ?></td>
                                    <td><?php echo e($subcontractor->contact_name); ?></td>
                                    <td><?php echo e($subcontractor->phone); ?></td>
                                    <td><?php echo e($subcontractor->email); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No subcontractors found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Invoices')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Reference')); ?></th>
                                <th><?php echo e(__('Subcontractor')); ?></th>
                                <th><?php echo e(__('Project')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Retention')); ?></th>
                                <th><?php echo e(__('VAT')); ?></th>
                                <th><?php echo e(__('Total Due')); ?></th>
                                <th><?php echo e(__('Paid')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($invoice->reference); ?></td>
                                    <td><?php echo e($invoice->subcontractor?->name); ?></td>
                                    <td><?php echo e($projects->firstWhere('id', $invoice->project_id)?->project_name); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->amount)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->retention_amount)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->vat_amount)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->total_due)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($paymentTotals[$invoice->id] ?? 0)); ?></td>
                                    <td><?php echo e(ucfirst($invoice->status)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="text-center"><?php echo e(__('No invoices found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Payments')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Invoice')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Payment Date')); ?></th>
                                <th><?php echo e(__('Note')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $recentPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($invoices->firstWhere('id', $payment->invoice_id)?->reference); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($payment->payment_date)); ?></td>
                                    <td><?php echo e($payment->note); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No payments recorded.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/btp/subcontractors.blade.php ENDPATH**/ ?>
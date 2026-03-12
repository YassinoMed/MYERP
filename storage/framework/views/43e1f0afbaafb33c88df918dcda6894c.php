<?php $__env->startSection('page-title'); ?><?php echo e($invoice->invoice_number); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical-invoices.index')); ?>"><?php echo e(__('Medical Billing')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($invoice->invoice_number); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-4">
        <div class="card"><div class="card-body">
            <h5><?php echo e(__('Invoice Summary')); ?></h5>
            <div><?php echo e(__('Patient')); ?>: <?php echo e(optional($invoice->patient)->first_name); ?> <?php echo e(optional($invoice->patient)->last_name); ?></div>
            <div><?php echo e(__('Status')); ?>: <?php echo e(ucfirst($invoice->status)); ?></div>
            <div><?php echo e(__('Total')); ?>: <?php echo e(\Auth::user()->priceFormat($invoice->total_amount)); ?></div>
            <div><?php echo e(__('Insurance')); ?>: <?php echo e(\Auth::user()->priceFormat($invoice->insurance_amount)); ?></div>
            <div><?php echo e(__('Patient Due')); ?>: <?php echo e(\Auth::user()->priceFormat($invoice->patient_amount)); ?></div>
            <div><?php echo e(__('Paid')); ?>: <?php echo e(\Auth::user()->priceFormat($invoice->paidAmount())); ?></div>
            <div><?php echo e(__('Remaining')); ?>: <?php echo e(\Auth::user()->priceFormat($invoice->dueAmount())); ?></div>
        </div></div>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create medical invoice payment')): ?>
        <div class="card"><div class="card-body">
            <h5><?php echo e(__('Add Payment')); ?></h5>
            <?php echo e(Form::open(['route' => ['medical-invoice-payments.store', $invoice->id], 'method' => 'post'])); ?>

            <?php echo e(Form::label('payment_date', __('Payment Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('payment_date', now()->format('Y-m-d'), ['class' => 'form-control'])); ?>

            <?php echo e(Form::label('amount', __('Amount'), ['class' => 'form-label mt-2'])); ?><?php echo e(Form::number('amount', null, ['class' => 'form-control', 'step' => '0.01'])); ?>

            <?php echo e(Form::label('payment_method', __('Method'), ['class' => 'form-label mt-2'])); ?><?php echo e(Form::text('payment_method', null, ['class' => 'form-control'])); ?>

            <?php echo e(Form::label('reference', __('Reference'), ['class' => 'form-label mt-2'])); ?><?php echo e(Form::text('reference', null, ['class' => 'form-control'])); ?>

            <button class="btn btn-primary mt-3"><?php echo e(__('Save')); ?></button>
            <?php echo e(Form::close()); ?>

        </div></div>
        <?php endif; ?>
    </div>
    <div class="col-lg-8">
        <div class="card"><div class="card-body table-border-style"><div class="table-responsive">
            <table class="table"><thead><tr><th><?php echo e(__('Description')); ?></th><th><?php echo e(__('Qty')); ?></th><th><?php echo e(__('Unit Price')); ?></th><th><?php echo e(__('Coverage')); ?></th><th><?php echo e(__('Patient Due')); ?></th></tr></thead><tbody><?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><tr><td><?php echo e($item->description); ?></td><td><?php echo e($item->quantity); ?></td><td><?php echo e(\Auth::user()->priceFormat($item->unit_price)); ?></td><td><?php echo e($item->coverage_rate); ?>%</td><td><?php echo e(\Auth::user()->priceFormat($item->patient_amount)); ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></tbody></table>
        </div></div></div>
        <div class="card"><div class="card-body table-border-style"><div class="table-responsive">
            <table class="table"><thead><tr><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Amount')); ?></th><th><?php echo e(__('Method')); ?></th><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead><tbody><?php $__empty_1 = true; $__currentLoopData = $invoice->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php echo e(\Auth::user()->dateFormat($payment->payment_date)); ?></td><td><?php echo e(\Auth::user()->priceFormat($payment->amount)); ?></td><td><?php echo e($payment->payment_method ?? '-'); ?></td><td><?php echo e($payment->reference ?? '-'); ?></td><td><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete medical invoice payment')): ?><?php echo Form::open(['method'=>'DELETE','route'=>['medical-invoice-payments.destroy',$payment->id],'id'=>'delete-medpay-'.$payment->id,'class'=>'d-inline']); ?><a href="#" class="btn btn-sm bg-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-medpay-<?php echo e($payment->id); ?>').submit();"><i class="ti ti-trash text-white"></i></a><?php echo Form::close(); ?><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="5" class="text-center"><?php echo e(__('No payments available')); ?></td></tr><?php endif; ?></tbody></table>
        </div></div></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical_invoice/show.blade.php ENDPATH**/ ?>
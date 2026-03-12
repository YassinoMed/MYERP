<?php $__env->startSection('page-title'); ?><?php echo e(__('Medical Billing')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Medical Billing')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create medical invoice')): ?><a href="#" data-size="xl" data-url="<?php echo e(route('medical-invoices.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Medical Invoice')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a><?php endif; ?></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="card"><div class="card-body table-border-style"><div class="table-responsive">
    <table class="table datatable">
        <thead><tr><th><?php echo e(__('Invoice')); ?></th><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Total')); ?></th><th><?php echo e(__('Patient Due')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(route('medical-invoices.show', $invoice->id)); ?>" class="text-primary"><?php echo e($invoice->invoice_number); ?></a></td>
                <td><?php echo e(optional($invoice->patient)->first_name); ?> <?php echo e(optional($invoice->patient)->last_name); ?></td>
                <td><?php echo e(\Auth::user()->dateFormat($invoice->invoice_date)); ?></td>
                <td><?php echo e(\Auth::user()->priceFormat($invoice->total_amount)); ?></td>
                <td><?php echo e(\Auth::user()->priceFormat($invoice->patient_amount)); ?></td>
                <td><?php echo e(ucfirst($invoice->status)); ?></td>
                <td>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show medical invoice')): ?><a href="<?php echo e(route('medical-invoices.show', $invoice->id)); ?>" class="btn btn-sm bg-warning"><i class="ti ti-eye text-white"></i></a><?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit medical invoice')): ?><a href="#" class="btn btn-sm bg-info" data-url="<?php echo e(route('medical-invoices.edit', $invoice->id)); ?>" data-ajax-popup="true" data-size="xl" data-title="<?php echo e(__('Edit Medical Invoice')); ?>"><i class="ti ti-pencil text-white"></i></a><?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete medical invoice')): ?><?php echo Form::open(['method'=>'DELETE','route'=>['medical-invoices.destroy',$invoice->id],'id'=>'delete-minvoice-'.$invoice->id,'class'=>'d-inline']); ?><a href="#" class="btn btn-sm bg-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-minvoice-<?php echo e($invoice->id); ?>').submit();"><i class="ti ti-trash text-white"></i></a><?php echo Form::close(); ?><?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical_invoice/index.blade.php ENDPATH**/ ?>
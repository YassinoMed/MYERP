<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Recovery Case Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('customer-recoveries.index')); ?>"><?php echo e(__('Customer Recoveries')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detail')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5><?php echo e($customerRecovery->reference ?: ('REC-' . $customerRecovery->id)); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Customer')); ?>:</strong> <?php echo e(optional($customerRecovery->customer)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Invoice')); ?>:</strong> <?php echo e(optional($customerRecovery->invoice)->invoice_id ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Stage')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $customerRecovery->stage)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Priority')); ?>:</strong> <?php echo e(__(ucfirst($customerRecovery->priority))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $customerRecovery->status)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Assigned To')); ?>:</strong> <?php echo e(optional($customerRecovery->assignee)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Due Amount')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($customerRecovery->due_amount)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Last Contact')); ?>:</strong> <?php echo e($customerRecovery->last_contact_date ? Auth::user()->dateFormat($customerRecovery->last_contact_date) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Next Follow Up')); ?>:</strong> <?php echo e($customerRecovery->next_follow_up_date ? Auth::user()->dateFormat($customerRecovery->next_follow_up_date) : '-'); ?></div>
                        <div class="col-12"><strong><?php echo e(__('Notes')); ?>:</strong><p class="text-muted mb-0"><?php echo e($customerRecovery->notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/customer_recoveries/show.blade.php ENDPATH**/ ?>
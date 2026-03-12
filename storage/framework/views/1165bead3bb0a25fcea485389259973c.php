<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Insurance Claim')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('insurance-claims.index')); ?>"><?php echo e(__('Insurance Claims')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($insuranceClaim->claim_number); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Claim Number')); ?>:</strong> <?php echo e($insuranceClaim->claim_number); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Policy')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->policy_name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Customer')); ?>:</strong> <?php echo e(optional($insuranceClaim->customer)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Assignee')); ?>:</strong> <?php echo e(optional($insuranceClaim->assignee)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Incident Date')); ?>:</strong> <?php echo e($insuranceClaim->incident_date ? Auth::user()->dateFormat($insuranceClaim->incident_date) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Reported Date')); ?>:</strong> <?php echo e($insuranceClaim->reported_date ? Auth::user()->dateFormat($insuranceClaim->reported_date) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Priority')); ?>:</strong> <?php echo e(__(ucfirst($insuranceClaim->priority))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $insuranceClaim->status)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Amount Claimed')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($insuranceClaim->amount_claimed)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Amount Settled')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($insuranceClaim->amount_settled)); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Incident Type')); ?>:</strong> <?php echo e($insuranceClaim->incident_type ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Location')); ?>:</strong> <?php echo e($insuranceClaim->location ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Description')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($insuranceClaim->description ?: '-'); ?></p></div>
                        <div class="col-md-12"><strong><?php echo e(__('Resolution Notes')); ?>:</strong><p class="mb-0 mt-2"><?php echo e($insuranceClaim->resolution_notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-12"><strong><?php echo e(__('Policy Number')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->policy_number ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Provider')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->provider_name ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Coverage Type')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->coverage_type ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Insured Party')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->insured_party ?: '-'); ?></div>
                        <div class="col-md-12"><strong><?php echo e(__('Insured Asset')); ?>:</strong> <?php echo e(optional($insuranceClaim->policy)->insured_asset ?: '-'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/insurance_claims/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title', __('Edit NPS Response')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('nps-campaigns.index')); ?>"><?php echo e(__('NPS Campaigns')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Response')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card"><div class="card-body"><form method="POST" action="<?php echo e(route('nps-responses.update', $npsResponse)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="row">
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Customer')); ?></label><select name="customer_id" class="form-control"><option value=""><?php echo e(__('Anonymous / external')); ?></option><?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerId => $customerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($customerId); ?>" <?php if(old('customer_id', $npsResponse->customer_id) == $customerId): echo 'selected'; endif; ?>><?php echo e($customerName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Score')); ?></label><input type="number" min="0" max="10" name="score" class="form-control" value="<?php echo e(old('score', $npsResponse->score)); ?>" required></div>
            <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Responded at')); ?></label><input type="datetime-local" name="responded_at" class="form-control" value="<?php echo e(old('responded_at', $npsResponse->responded_at ? \Carbon\Carbon::parse($npsResponse->responded_at)->format('Y-m-d\\TH:i') : '')); ?>"></div>
            <div class="col-md-12 mb-3"><label class="form-label"><?php echo e(__('Feedback')); ?></label><textarea name="feedback" class="form-control" rows="4"><?php echo e(old('feedback', $npsResponse->feedback)); ?></textarea></div>
        </div>
        <div class="text-end"><a href="<?php echo e(route('nps-campaigns.show', $npsResponse->nps_campaign_id)); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a><button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button></div>
    </form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/nps_campaigns/edit_response.blade.php ENDPATH**/ ?>
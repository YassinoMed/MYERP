<?php $__env->startSection('page-title', __('Edit Objective')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('okr-objectives.index')); ?>"><?php echo e(__('OKR Workspace')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card"><div class="card-body"><form method="POST" action="<?php echo e(route('okr-objectives.update', $okrObjective)); ?>"><?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?> <?php echo $__env->make('okr_objectives._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><div class="text-end"><a href="<?php echo e(route('okr-objectives.show', $okrObjective)); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a><button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button></div></form></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/okr_objectives/edit.blade.php ENDPATH**/ ?>
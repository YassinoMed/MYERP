<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Innovation Idea Detail')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('innovation-ideas.index')); ?>"><?php echo e(__('Innovation Ideas')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detail')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5><?php echo e($innovationIdea->title); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Category')); ?>:</strong> <?php echo e($innovationIdea->category ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Submitted By')); ?>:</strong> <?php echo e(optional($innovationIdea->submitter)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Priority')); ?>:</strong> <?php echo e(__(ucfirst($innovationIdea->priority))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $innovationIdea->status)))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Expected Value')); ?>:</strong> <?php echo e(Auth::user()->priceFormat($innovationIdea->expected_value)); ?></div>
                        <div class="col-12"><strong><?php echo e(__('Description')); ?>:</strong><p class="text-muted mb-0"><?php echo e($innovationIdea->description ?: '-'); ?></p></div>
                        <div class="col-12"><strong><?php echo e(__('Business Case')); ?>:</strong><p class="text-muted mb-0"><?php echo e($innovationIdea->business_case ?: '-'); ?></p></div>
                        <div class="col-12"><strong><?php echo e(__('Implementation Notes')); ?>:</strong><p class="text-muted mb-0"><?php echo e($innovationIdea->implementation_notes ?: '-'); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/innovation_ideas/show.blade.php ENDPATH**/ ?>
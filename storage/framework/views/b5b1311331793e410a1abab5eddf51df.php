<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Knowledge Base Article')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('knowledge-base.index')); ?>"><?php echo e(__('Knowledge Base')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Article')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header"><h5><?php echo e($knowledgeBase->title); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6"><strong><?php echo e(__('Category')); ?>:</strong> <?php echo e(optional($knowledgeBase->category)->name ?: '-'); ?></div>
                        <div class="col-md-3"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($knowledgeBase->status))); ?></div>
                        <div class="col-md-3"><strong><?php echo e(__('Featured')); ?>:</strong> <?php echo e($knowledgeBase->is_featured ? __('Yes') : __('No')); ?></div>
                        <div class="col-12"><strong><?php echo e(__('Summary')); ?>:</strong><p class="text-muted mb-0"><?php echo e($knowledgeBase->summary ?: '-'); ?></p></div>
                        <div class="col-12"><strong><?php echo e(__('Content')); ?>:</strong><div class="text-muted"><?php echo nl2br(e($knowledgeBase->content ?: '-')); ?></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/knowledge_base/show.blade.php ENDPATH**/ ?>
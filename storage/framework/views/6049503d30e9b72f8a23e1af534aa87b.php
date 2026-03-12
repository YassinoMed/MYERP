<?php $__env->startSection('page-title', __('Help Center')); ?>
<?php $__env->startSection('page-subtitle', __('Search published knowledge base content without leaving the workspace.')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-header"><h5><?php echo e(__('Guided Topics')); ?></h5></div>
            <div class="card-body">
                <p class="text-muted"><?php echo e(__('Shortcuts to the most important tenant onboarding, API and security help content.')); ?></p>
                <div class="list-group">
                    <?php $__empty_2 = true; $__currentLoopData = $guidedArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <a href="<?php echo e(route('knowledge-base.show', $article)); ?>" class="list-group-item list-group-item-action">
                            <strong><?php echo e($article->title); ?></strong>
                            <div class="text-muted small"><?php echo e($article->summary); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <div class="text-muted"><?php echo e(__('No guided articles available yet.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h5><?php echo e(__('Integrated Help')); ?></h5></div>
            <div class="card-body">
                <p><?php echo e(__('This center aggregates published knowledge-base content for tenant users.')); ?></p>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage security center')): ?>
                    <div class="alert alert-info">
                        <a href="<?php echo e(route('core.consolidation')); ?>" class="alert-link"><?php echo e(__('Open the consolidation cockpit')); ?></a>
                        <?php echo e(__('to review production readiness, API governance and cross-module health.')); ?>

                    </div>
                <?php endif; ?>
                <form method="GET" action="<?php echo e(route('core.help-center')); ?>" class="row g-2 mb-3">
                    <div class="col-md-10"><input type="text" name="q" class="form-control" value="<?php echo e($search); ?>" placeholder="<?php echo e(__('Search help articles, onboarding, modules...')); ?>"></div>
                    <div class="col-md-2 d-grid"><button class="btn btn-light"><?php echo e(__('Search')); ?></button></div>
                </form>
                <div class="list-group">
                    <?php $__empty_2 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <a href="<?php echo e(route('knowledge-base.show', $article)); ?>" class="list-group-item list-group-item-action">
                            <strong><?php echo e($article->title); ?></strong>
                            <div class="text-muted small"><?php echo e($article->summary); ?></div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <div class="text-muted"><?php echo e(__('No published help articles available.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_platform/help_center.blade.php ENDPATH**/ ?>
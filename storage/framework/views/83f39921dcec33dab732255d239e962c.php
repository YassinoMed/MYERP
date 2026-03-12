<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Knowledge Base')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Surface reusable answers, featured content and publication quality from one support knowledge hub.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Knowledge Base')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex gap-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage knowledge base category')): ?>
            <a href="<?php echo e(route('kb-categories.index')); ?>" class="btn btn-sm btn-primary-subtle">
                <i class="ti ti-category"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create knowledge base')): ?>
            <a href="#" data-url="<?php echo e(route('knowledge-base.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Article')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $publishedArticles = $articles->where('status', 'published')->count();
        $draftArticles = $articles->where('status', 'draft')->count();
        $featuredArticles = $articles->where('is_featured', 1)->count();
        $categoryCoverage = $articles->pluck('knowledge_base_category_id')->filter()->unique()->count();
    ?>
    <div class="row">
        <div class="col-12">
            <div class="ux-kpi-grid mb-4">
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Published')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($publishedArticles); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('live knowledge articles')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Drafts')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($draftArticles); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('still being prepared')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Featured')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($featuredArticles); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('priority articles')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Active categories')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($categoryCoverage); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('taxonomy coverage')); ?></span>
                </div>
            </div>
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Featured')); ?></th>
                                    <th width="220px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-bulk-id="<?php echo e($article->id); ?>">
                                        <td><?php echo e($article->title); ?></td>
                                        <td><?php echo e(optional($article->category)->name ?: '-'); ?></td>
                                        <td><?php echo e(__(ucfirst($article->status))); ?></td>
                                        <td><?php echo e($article->is_featured ? __('Yes') : __('No')); ?></td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="<?php echo e(route('knowledge-base.show', $article->id)); ?>"
                                                    class="mx-3 btn btn-sm align-items-center bg-warning">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit knowledge base')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" data-url="<?php echo e(URL::to('knowledge-base/' . $article->id . '/edit')); ?>"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Edit Article')); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-info">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete knowledge base')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['knowledge-base.destroy', $article->id], 'id' => 'delete-form-' . $article->id]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($article->id); ?>').submit();">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/knowledge_base/index.blade.php ENDPATH**/ ?>
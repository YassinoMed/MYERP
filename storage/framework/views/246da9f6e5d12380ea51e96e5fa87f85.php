<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Support Categories')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Support Categories')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('support.index')); ?>"><?php echo e(__('Support')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Categories')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <a href="<?php echo e(route('support.index')); ?>" class="btn btn-sm btn-primary-subtle me-1" data-bs-toggle="tooltip"
            title="<?php echo e(__('Back to Support')); ?>">
            <i class="ti ti-arrow-left"></i>
        </a>
        <a href="#" data-size="md" data-url="<?php echo e(route('support-categories.create')); ?>" data-ajax-popup="true"
            data-bs-toggle="tooltip" title="<?php echo e(__('Create Category')); ?>" data-title="<?php echo e(__('Create Category')); ?>"
            class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Tickets')); ?></th>
                                    <th width="200px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="rounded-circle d-inline-block"
                                                    style="width:12px;height:12px;background-color: <?php echo e($category->color); ?>;"></span>
                                                <span><?php echo e($category->name); ?></span>
                                            </div>
                                        </td>
                                        <td><?php echo e($category->description ?: '-'); ?></td>
                                        <td>
                                            <?php if($category->is_active): ?>
                                                <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary p-2 px-3 rounded"><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($category->supports_count); ?></td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="#" class="mx-3 btn btn-sm align-items-center bg-info"
                                                    data-url="<?php echo e(route('support-categories.edit', $category->id)); ?>"
                                                    data-ajax-popup="true" data-size="md" data-bs-toggle="tooltip"
                                                    title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Category')); ?>">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            </div>
                                            <div class="action-btn">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['support-categories.destroy', $category->id]]); ?>

                                                <a href="#"
                                                    class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>">
                                                    <i class="ti ti-trash text-white"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            </div>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/support_categories/index.blade.php ENDPATH**/ ?>
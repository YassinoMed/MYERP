<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('manage performance type')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Performance Type')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Performance Type')); ?></li>
<?php $__env->stopSection(); ?>




<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <?php echo $__env->make('layouts.hrm_setup', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div class="col-12">
            <div class="my-3 d-flex justify-content-end">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create performance type')): ?>
                    <a href="#" data-url="<?php echo e(route('performanceType.create')); ?>" data-ajax-popup="true"
                        data-title="<?php echo e(__('Create New Performance Type')); ?>" data-bs-toggle="tooltip"
                        title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary">
                        <i class="ti ti-plus"></i>
                    </a>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class=""><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="font-style">
                                                <td><?php echo e($type->name); ?></td>
                                                <td class="">
                                                    <div class="action-btn me-2">
                                                        <a href="#"
                                                            data-url="<?php echo e(route('performanceType.edit', $type->id)); ?>"
                                                            data-ajax-popup="true" title="<?php echo e(__('Edit')); ?>"
                                                            data-title="<?php echo e(__('Edit Performance Type')); ?>"
                                                            class="mx-3 btn btn-sm align-items-center bg-info"
                                                            data-bs-toggle="tooltip"
                                                            data-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                    <div class="action-btn ">
                                                        <?php echo Form::open([
                                                            'method' => 'DELETE',
                                                            'route' => ['performanceType.destroy', $type->id],
                                                            'id' => 'delete-form-' . $type->id,
                                                        ]); ?>

                                                        <a href="#!"
                                                            class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                            data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                            data-original-title="<?php echo e(__('Delete')); ?>"
                                                            data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                            data-confirm-yes="document.getElementById('delete-form-<?php echo e($type->id); ?>').submit();">
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

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/performanceType/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Termination Type')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Termination Type')); ?></li>
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
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create termination type')): ?>
                    <a href="#" data-url="<?php echo e(route('terminationtype.create')); ?>" data-ajax-popup="true"
                        data-title="<?php echo e(__('Create New Termination Type')); ?>" data-bs-toggle="tooltip"
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
                                            <th><?php echo e(__('Termination Type')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-style">
                                        <?php $__currentLoopData = $terminationtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $terminationtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($terminationtype->name); ?></td>
                                                <td>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit termination type')): ?>
                                                        <div class="action-btn me-2">
                                                            <a href="#" class="mx-3 btn btn-sm align-items-center bg-info"
                                                                data-url="<?php echo e(URL::to('terminationtype/' . $terminationtype->id . '/edit')); ?>"
                                                                data-ajax-popup="true"
                                                                data-title="<?php echo e(__('Edit Document Type')); ?>"
                                                                data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                data-original-title="<?php echo e(__('Edit')); ?>">
                                                                <i class="ti ti-pencil text-white"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete termination type')): ?>
                                                        <div class="action-btn ">
                                                            <?php echo Form::open([
                                                                'method' => 'DELETE',
                                                                'route' => ['terminationtype.destroy', $terminationtype->id],
                                                                'id' => 'delete-form-' . $terminationtype->id,
                                                            ]); ?>

                                                            <a href="#"
                                                                class="mx-3 btn btn-sm  align-items-center bs-pass-para bg-danger"
                                                                data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"><i
                                                                    class="ti ti-trash text-white text-white"></i></a>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/terminationtype/index.blade.php ENDPATH**/ ?>
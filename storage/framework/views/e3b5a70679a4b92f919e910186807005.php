<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Bill of Materials')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Bill of Materials')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create production bom')): ?>
            <a href="#" data-size="xl" data-url="<?php echo e(route('production.boms.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create BOM')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Product')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Code')); ?></th>
                                    <th><?php echo e(__('Active Version')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $boms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="font-style">
                                        <td><?php echo e($bom->product?->name); ?></td>
                                        <td><?php echo e($bom->name); ?></td>
                                        <td><?php echo e($bom->code); ?></td>
                                        <td><?php echo e($bom->activeVersion?->version); ?></td>
                                        <td class="Action">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show production bom')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="<?php echo e(route('production.boms.show', $bom->id)); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-warning"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('View')); ?>"><i
                                                            class="ti ti-eye text-white"></i></a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production bom')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bg-info"
                                                        data-url="<?php echo e(route('production.boms.edit', $bom->id)); ?>"
                                                        data-ajax-popup="true" data-size="xl" data-bs-toggle="tooltip"
                                                        title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit BOM')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete production bom')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open([
                                                        'method' => 'DELETE',
                                                        'route' => ['production.boms.destroy', $bom->id],
                                                        'id' => 'delete-form-' . $bom->id,
                                                    ]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"><i
                                                            class="ti ti-trash text-white"></i></a>
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


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/boms/index.blade.php ENDPATH**/ ?>
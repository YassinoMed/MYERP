<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Industrial Resources')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Industrial Resources')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create industrial resource')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('production.resources.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Industrial Resource')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Code')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Type')); ?></th>
                                    <th><?php echo e(__('Parent')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Capacity')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $resources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($resource->code ?: '-'); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show industrial resource')): ?>
                                                <a href="<?php echo e(route('production.resources.show', $resource->id)); ?>"><?php echo e($resource->name); ?></a>
                                            <?php else: ?>
                                                <?php echo e($resource->name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(ucfirst($resource->type)); ?></td>
                                        <td><?php echo e($resource->parent?->name ?: '-'); ?></td>
                                        <td><?php echo e(ucfirst($resource->status)); ?></td>
                                        <td><?php echo e($resource->capacity_hours_per_day); ?>h / <?php echo e($resource->capacity_workers); ?> <?php echo e(__('workers')); ?></td>
                                        <td class="Action">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit industrial resource')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bg-info"
                                                        data-url="<?php echo e(route('production.resources.edit', $resource->id)); ?>"
                                                        data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                                        title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Industrial Resource')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete industrial resource')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['production.resources.destroy', $resource->id], 'id' => 'delete-form-resource-' . $resource->id]); ?>

                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/industrial_resources/index.blade.php ENDPATH**/ ?>
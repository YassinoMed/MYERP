<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Property Management')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Properties')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create managed property')): ?>
            <a href="#" data-url="<?php echo e(route('managed-properties.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Property')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Property')); ?></th>
                            <th><?php echo e(__('Type')); ?></th>
                            <th><?php echo e(__('Manager')); ?></th>
                            <th><?php echo e(__('City')); ?></th>
                            <th><?php echo e(__('Units')); ?></th>
                            <th><?php echo e(__('Leases')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th width="220px"><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div><?php echo e($property->name); ?></div>
                                    <small class="text-muted"><?php echo e($property->property_code); ?></small>
                                </td>
                                <td><?php echo e($property->property_type ?: '-'); ?></td>
                                <td><?php echo e(optional($property->manager)->name ?: '-'); ?></td>
                                <td><?php echo e($property->city ?: '-'); ?></td>
                                <td><?php echo e($property->units_count); ?></td>
                                <td><?php echo e($property->leases_count); ?></td>
                                <td><?php echo e(__(ucfirst($property->status))); ?></td>
                                <td class="Action">
                                    <div class="action-btn me-2">
                                        <a href="<?php echo e(route('managed-properties.show', $property->id)); ?>" class="mx-3 btn btn-sm align-items-center bg-warning">
                                            <i class="ti ti-eye text-white"></i>
                                        </a>
                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit managed property')): ?>
                                        <div class="action-btn me-2">
                                            <a href="#" data-url="<?php echo e(route('managed-properties.edit', $property->id)); ?>" data-size="lg" data-ajax-popup="true"
                                                data-title="<?php echo e(__('Edit Property')); ?>" class="mx-3 btn btn-sm align-items-center bg-info">
                                                <i class="ti ti-pencil text-white"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete managed property')): ?>
                                        <div class="action-btn">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['managed-properties.destroy', $property->id], 'id' => 'delete-property-' . $property->id]); ?>

                                            <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                data-confirm-yes="document.getElementById('delete-property-<?php echo e($property->id); ?>').submit();">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/managed_properties/index.blade.php ENDPATH**/ ?>
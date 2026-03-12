<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Shift Teams')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Shift Teams')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create production shift team')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('production.shift-teams.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Shift Team')); ?>"
                class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a>
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
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Supervisor')); ?></th>
                            <th><?php echo e(__('Hours')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $shiftTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shiftTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($shiftTeam->name); ?></td>
                                <td><?php echo e($shiftTeam->supervisor?->name ?: '-'); ?></td>
                                <td><?php echo e($shiftTeam->start_time ?: '--:--'); ?> - <?php echo e($shiftTeam->end_time ?: '--:--'); ?></td>
                                <td><?php echo e(ucfirst($shiftTeam->status)); ?></td>
                                <td class="Action">
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production shift team')): ?>
                                        <div class="action-btn me-2">
                                            <a href="#" class="mx-3 btn btn-sm align-items-center bg-info"
                                                data-url="<?php echo e(route('production.shift-teams.edit', $shiftTeam->id)); ?>" data-ajax-popup="true" data-size="lg"
                                                data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Shift Team')); ?>">
                                                <i class="ti ti-pencil text-white"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete production shift team')): ?>
                                        <div class="action-btn">
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['production.shift-teams.destroy', $shiftTeam->id], 'id' => 'delete-form-shift-' . $shiftTeam->id]); ?>

                                            <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/shift_teams/index.blade.php ENDPATH**/ ?>
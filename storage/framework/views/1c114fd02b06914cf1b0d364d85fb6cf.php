<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Channel Manager')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Channel Manager')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <form action="<?php echo e(route('hotel.channels.sync')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button class="btn btn-sm btn-primary"><?php echo e(__('Sync All')); ?></button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Add Channel')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.channels.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Active')); ?></label>
                            <select name="is_active" class="form-control">
                                <option value="1"><?php echo e(__('Yes')); ?></option>
                                <option value="0"><?php echo e(__('No')); ?></option>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Sync Alerts')); ?></h5>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $alerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span><?php echo e($alert->name); ?></span>
                            <span class="badge bg-danger"><?php echo e($alert->sync_status); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No alerts.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Channel Performance')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Channel')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Reservations')); ?></th>
                                <th><?php echo e(__('Revenue')); ?></th>
                                <th><?php echo e(__('Last Sync')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $channels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($channel->name); ?></td>
                                    <td><?php echo e($channel->sync_status); ?></td>
                                    <td><?php echo e(optional($reservations->get($channel->id))->total ?? 0); ?></td>
                                    <td><?php echo e(optional($reservations->get($channel->id))->revenue ?? 0); ?></td>
                                    <td><?php echo e($channel->last_synced_at ? $channel->last_synced_at->format('Y-m-d H:i') : '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Sync Logs')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Channel')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Direction')); ?></th>
                                <th><?php echo e(__('Time')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($log->channel?->name); ?></td>
                                    <td><?php echo e($log->status); ?></td>
                                    <td><?php echo e($log->direction); ?></td>
                                    <td><?php echo e($log->synced_at ? $log->synced_at->format('Y-m-d H:i') : '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/hotel/channel_manager.blade.php ENDPATH**/ ?>
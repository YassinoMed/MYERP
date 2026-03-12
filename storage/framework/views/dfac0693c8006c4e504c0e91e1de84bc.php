<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('BTP Equipment Control')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('BTP Equipment Control')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Equipment')); ?></h6>
                            <h3 class="mb-0"><?php echo e($totalEquipment); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Available')); ?></h6>
                            <h3 class="mb-0"><?php echo e($availableEquipment); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Pending Maintenance')); ?></h6>
                            <h3 class="mb-0"><?php echo e($pendingMaintenances); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Fuel Consumed')); ?></h6>
                            <h3 class="mb-0"><?php echo e($fuelConsumed); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Equipment')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.equipment-control.equipment.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Category')); ?></label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Type')); ?></label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control">
                                <option value="available"><?php echo e(__('Available')); ?></option>
                                <option value="maintenance"><?php echo e(__('Maintenance')); ?></option>
                                <option value="inactive"><?php echo e(__('Inactive')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Purchase Date')); ?></label>
                            <input type="date" name="purchase_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Rental Rate')); ?></label>
                            <input type="number" step="0.01" name="rental_rate" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Fuel Type')); ?></label>
                            <input type="text" name="fuel_type" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Equipment')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Log Usage')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.equipment-control.usages.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Equipment')); ?></label>
                            <select name="equipment_id" class="form-control" required>
                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Project')); ?></label>
                            <select name="project_id" class="form-control" required>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Start Date')); ?></label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('End Date')); ?></label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Hours Used')); ?></label>
                            <input type="number" step="0.1" name="hours_used" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Fuel Consumed')); ?></label>
                            <input type="number" step="0.01" name="fuel_consumed" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Usage')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Schedule Maintenance')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.equipment-control.maintenances.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Equipment')); ?></label>
                            <select name="equipment_id" class="form-control" required>
                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Scheduled Date')); ?></label>
                            <input type="date" name="scheduled_at" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Type')); ?></label>
                            <input type="text" name="maintenance_type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cost')); ?></label>
                            <input type="number" step="0.01" name="cost" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Maintenance')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Equipment List')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->code); ?></td>
                                    <td><?php echo e($item->type); ?></td>
                                    <td><?php echo e(ucfirst($item->status)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No equipment found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Usage')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Equipment')); ?></th>
                                <th><?php echo e(__('Project')); ?></th>
                                <th><?php echo e(__('Start')); ?></th>
                                <th><?php echo e(__('End')); ?></th>
                                <th><?php echo e(__('Hours')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $usages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($equipments->firstWhere('id', $usage->equipment_id)?->name); ?></td>
                                    <td><?php echo e($projects->firstWhere('id', $usage->project_id)?->project_name); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($usage->start_date)); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($usage->end_date)); ?></td>
                                    <td><?php echo e($usage->hours_used); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center"><?php echo e(__('No usage logs found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Upcoming Maintenance')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Equipment')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Cost')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $maintenance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($equipments->firstWhere('id', $maintenance->equipment_id)?->name); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($maintenance->scheduled_at)); ?></td>
                                    <td><?php echo e($maintenance->maintenance_type); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($maintenance->cost)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No maintenance scheduled.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/btp/equipment-control.blade.php ENDPATH**/ ?>
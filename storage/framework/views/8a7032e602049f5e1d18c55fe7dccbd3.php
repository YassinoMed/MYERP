<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Housekeeping & Maintenance')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Housekeeping')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Task')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.housekeeping.tasks.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Room')); ?></label>
                            <select name="room_id" class="form-control" required>
                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($room->id); ?>"><?php echo e($room->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Priority')); ?></label>
                            <select name="priority" class="form-control">
                                <option value="normal"><?php echo e(__('Normal')); ?></option>
                                <option value="high"><?php echo e(__('High')); ?></option>
                                <option value="urgent"><?php echo e(__('Urgent')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Scheduled At')); ?></label>
                            <input type="datetime-local" name="scheduled_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Checklist Items')); ?></label>
                            <select name="checklist_items[]" class="form-control" multiple>
                                <?php $__currentLoopData = $checklistItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->item_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Task')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Report Issue')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.housekeeping.issues.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Room')); ?></label>
                            <select name="room_id" class="form-control" required>
                                <?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($room->id); ?>"><?php echo e($room->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Title')); ?></label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Priority')); ?></label>
                            <select name="priority" class="form-control">
                                <option value="normal"><?php echo e(__('Normal')); ?></option>
                                <option value="high"><?php echo e(__('High')); ?></option>
                                <option value="urgent"><?php echo e(__('Urgent')); ?></option>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Inventory Movement')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.housekeeping.inventory.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Item')); ?></label>
                            <select name="inventory_item_id" class="form-control" required>
                                <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Type')); ?></label>
                            <select name="type" class="form-control">
                                <option value="issue"><?php echo e(__('Issue')); ?></option>
                                <option value="receive"><?php echo e(__('Receive')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                            <input type="number" step="0.01" name="quantity" class="form-control" required>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Active Tasks')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Room')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Priority')); ?></th>
                                <th><?php echo e(__('Actions')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($task->room?->name); ?></td>
                                    <td><?php echo e($task->status); ?></td>
                                    <td><?php echo e($task->priority); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('hotel.housekeeping.tasks.update', $task->id)); ?>" method="post" class="d-flex gap-2">
                                            <?php echo csrf_field(); ?>
                                            <select name="status" class="form-control">
                                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                                                <option value="in_progress"><?php echo e(__('In Progress')); ?></option>
                                                <option value="completed"><?php echo e(__('Completed')); ?></option>
                                            </select>
                                            <select name="room_status" class="form-control">
                                                <option value=""><?php echo e(__('Room Status')); ?></option>
                                                <option value="dirty"><?php echo e(__('Dirty')); ?></option>
                                                <option value="cleaning"><?php echo e(__('Cleaning')); ?></option>
                                                <option value="clean"><?php echo e(__('Clean')); ?></option>
                                                <option value="repair"><?php echo e(__('Repair')); ?></option>
                                                <option value="blocked"><?php echo e(__('Blocked')); ?></option>
                                            </select>
                                            <button class="btn btn-sm btn-primary"><?php echo e(__('Update')); ?></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Maintenance Issues')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Room')); ?></th>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Priority')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($issue->room?->name); ?></td>
                                    <td><?php echo e($issue->title); ?></td>
                                    <td><?php echo e($issue->status); ?></td>
                                    <td><?php echo e($issue->priority); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Inventory Levels')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Item')); ?></th>
                                <th><?php echo e(__('On Hand')); ?></th>
                                <th><?php echo e(__('Reorder Level')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->quantity_on_hand); ?></td>
                                    <td><?php echo e($item->reorder_level); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/hotel/housekeeping.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Workflow')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('workflows.index')); ?>"><?php echo e(__('Workflows')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('workflows.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Trigger')); ?></label>
                                <select name="trigger_model" class="form-select" required>
                                    <?php $__currentLoopData = $triggers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $trigger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($trigger['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label"><?php echo e(__('Description')); ?></label>
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                                    <label class="form-check-label"><?php echo e(__('Active')); ?></label>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <h6 class="mb-3"><?php echo e(__('Condition (optional)')); ?></h6>
                        <div class="row">
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="form-label"><?php echo e(__('Field')); ?></label>
                                <input type="text" name="trigger_conditions[0][field]" class="form-control" placeholder="status">
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="form-label"><?php echo e(__('Operator')); ?></label>
                                <select name="trigger_conditions[0][operator]" class="form-select">
                                    <option value="equals"><?php echo e(__('equals')); ?></option>
                                    <option value="not_equals"><?php echo e(__('not_equals')); ?></option>
                                    <option value="contains"><?php echo e(__('contains')); ?></option>
                                    <option value="greater_than"><?php echo e(__('greater_than')); ?></option>
                                    <option value="less_than"><?php echo e(__('less_than')); ?></option>
                                    <option value="is_empty"><?php echo e(__('is_empty')); ?></option>
                                    <option value="is_not_empty"><?php echo e(__('is_not_empty')); ?></option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="form-label"><?php echo e(__('Value')); ?></label>
                                <input type="text" name="trigger_conditions[0][value]" class="form-control">
                            </div>
                        </div>

                        <hr>

                        <h6 class="mb-3"><?php echo e(__('Action')); ?></h6>
                        <div class="row">
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="form-label"><?php echo e(__('Type')); ?></label>
                                <select name="actions[0][type]" class="form-select" required>
                                    <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($action['name']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Email To')); ?></label>
                                <input type="text" name="actions[0][data][to]" class="form-control" placeholder="client@example.com">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Email Subject')); ?></label>
                                <input type="text" name="actions[0][data][subject]" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label"><?php echo e(__('Email Body / Webhook Body / Message')); ?></label>
                                <textarea name="actions[0][data][body]" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Notification User ID')); ?></label>
                                <input type="text" name="actions[0][data][user_id]" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Notification Message')); ?></label>
                                <input type="text" name="actions[0][data][message]" class="form-control">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Task Title')); ?></label>
                                <input type="text" name="actions[0][data][title]" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Assign To')); ?></label>
                                <input type="text" name="actions[0][data][assign_to]" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Due Date')); ?></label>
                                <input type="text" name="actions[0][data][due_date]" class="form-control" placeholder="YYYY-MM-DD">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Update Field')); ?></label>
                                <input type="text" name="actions[0][data][field]" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Update Value')); ?></label>
                                <input type="text" name="actions[0][data][value]" class="form-control">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Webhook URL')); ?></label>
                                <input type="text" name="actions[0][data][url]" class="form-control">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('Webhook Method')); ?></label>
                                <input type="text" name="actions[0][data][method]" class="form-control" placeholder="POST">
                            </div>

                            <div class="col-12 col-lg-6 mb-3">
                                <label class="form-label"><?php echo e(__('List ID')); ?></label>
                                <input type="text" name="actions[0][data][list_id]" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?php echo e(route('workflows.index')); ?>" class="btn btn-secondary"><?php echo e(__('Cancel')); ?></a>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/workflow/create.blade.php ENDPATH**/ ?>
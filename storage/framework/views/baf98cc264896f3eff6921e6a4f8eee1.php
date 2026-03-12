<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Production Order')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('production.orders.index')); ?>"><?php echo e(__('Production Orders')); ?></a></li>
    <li class="breadcrumb-item">#<?php echo e($order->order_number); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production order')): ?>
            <a href="#" data-size="xl" data-url="<?php echo e(route('production.orders.edit', $order->id)); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Production Order')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3"><?php echo e(__('Details')); ?></h5>
                    <div class="mb-2"><b><?php echo e(__('Order')); ?>:</b> #<?php echo e($order->order_number); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Product')); ?>:</b> <?php echo e($order->product?->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Planned Qty')); ?>:</b> <?php echo e($order->quantity_planned); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Produced Qty')); ?>:</b> <?php echo e($order->quantity_produced); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Warehouse')); ?>:</b> <?php echo e($order->warehouse?->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Work Center')); ?>:</b> <?php echo e($order->workCenter?->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Employee')); ?>:</b> <?php echo e($order->employee?->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Priority')); ?>:</b> <?php echo e(ucfirst($order->priority)); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Status')); ?>:</b> <?php echo e(ucfirst(str_replace('_', ' ', $order->status))); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Planned Start')); ?>:</b> <?php echo e($order->planned_start_date); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Planned End')); ?>:</b> <?php echo e($order->planned_end_date); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Notes')); ?>:</b> <?php echo e($order->notes); ?></div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class="mb-3"><?php echo e(__('Materials')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Component')); ?></th>
                                    <th><?php echo e(__('Required')); ?></th>
                                    <th><?php echo e(__('Reserved')); ?></th>
                                    <th><?php echo e(__('Consumed')); ?></th>
                                    <th><?php echo e(__('Remaining')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $move): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($move->component?->name); ?></td>
                                        <td><?php echo e($move->required_qty); ?></td>
                                        <td><?php echo e($move->reserved_qty); ?></td>
                                        <td><?php echo e($move->consumed_qty); ?></td>
                                        <td><?php echo e(max(0, (float) $move->required_qty - (float) $move->consumed_qty)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class="mb-3"><?php echo e(__('Operations')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Seq')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Work Center')); ?></th>
                                    <th><?php echo e(__('Planned Minutes')); ?></th>
                                    <th><?php echo e(__('Actual Minutes')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->operations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($op->sequence); ?></td>
                                        <td><?php echo e($op->name); ?></td>
                                        <td><?php echo e($op->workCenter?->name); ?></td>
                                        <td><?php echo e($op->planned_minutes); ?></td>
                                        <td><?php echo e($op->actual_minutes); ?></td>
                                        <td><?php echo e(ucfirst(str_replace('_', ' ', $op->status))); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class="mb-3"><?php echo e(__('Quality Checks')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Check Point')); ?></th>
                                    <th><?php echo e(__('Result')); ?></th>
                                    <th><?php echo e(__('Operation')); ?></th>
                                    <th><?php echo e(__('Employee')); ?></th>
                                    <th><?php echo e(__('Checked At')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->qualityChecks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($qc->check_point); ?></td>
                                        <td><?php echo e(ucfirst($qc->result)); ?></td>
                                        <td><?php echo e($qc->operation?->name); ?></td>
                                        <td><?php echo e($qc->employee?->name); ?></td>
                                        <td><?php echo e($qc->checked_at); ?></td>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/orders/show.blade.php ENDPATH**/ ?>
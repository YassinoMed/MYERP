<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Internal ITSM')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Internal ITSM')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create internal itsm')): ?>
            <a href="#" data-url="<?php echo e(route('internal-itsm.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create ITSM Ticket')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row mb-4 gy-3">
        <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted"><?php echo e(__('Total')); ?></div><h4><?php echo e($stats['total']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted"><?php echo e(__('Open')); ?></div><h4><?php echo e($stats['open']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted"><?php echo e(__('On Hold')); ?></div><h4><?php echo e($stats['on_hold']); ?></h4></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted"><?php echo e(__('Closed')); ?></div><h4><?php echo e($stats['close']); ?></h4></div></div></div>
    </div>
    <div class="card">
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Ticket')); ?></th>
                        <th><?php echo e(__('Type')); ?></th>
                        <th><?php echo e(__('Assignee')); ?></th>
                        <th><?php echo e(__('CI')); ?></th>
                        <th><?php echo e(__('Priority')); ?></th>
                        <th><?php echo e(__('SLA Due')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th width="220px"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><div><?php echo e($ticket->subject); ?></div><small class="text-muted"><?php echo e($ticket->ticket_code); ?></small></td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $ticket->ticket_type ?: '-'))); ?></td>
                            <td><?php echo e(optional($ticket->assignUser)->name ?: '-'); ?></td>
                            <td><?php echo e(optional($ticket->configurationItem)->name ?: '-'); ?></td>
                            <td><?php echo e($ticket->priority); ?></td>
                            <td><?php echo e($ticket->resolution_due_at ? Auth::user()->dateFormat($ticket->resolution_due_at) : '-'); ?></td>
                            <td><?php echo e($ticket->status); ?></td>
                            <td class="Action">
                                <div class="action-btn me-2">
                                    <a href="<?php echo e(route('internal-itsm.show', $ticket->id)); ?>" class="mx-3 btn btn-sm align-items-center bg-warning">
                                        <i class="ti ti-eye text-white"></i>
                                    </a>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit internal itsm')): ?>
                                    <div class="action-btn me-2">
                                        <a href="#" data-url="<?php echo e(route('internal-itsm.edit', $ticket->id)); ?>" data-size="lg" data-ajax-popup="true"
                                            data-title="<?php echo e(__('Edit ITSM Ticket')); ?>" class="mx-3 btn btn-sm align-items-center bg-info">
                                            <i class="ti ti-pencil text-white"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete internal itsm')): ?>
                                    <div class="action-btn">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['internal-itsm.destroy', $ticket->id], 'id' => 'delete-form-itsm-' . $ticket->id]); ?>

                                        <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                           data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                           data-confirm-yes="document.getElementById('delete-form-itsm-<?php echo e($ticket->id); ?>').submit();">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/internal_itsm/index.blade.php ENDPATH**/ ?>
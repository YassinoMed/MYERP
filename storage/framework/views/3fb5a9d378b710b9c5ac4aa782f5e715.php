<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Appointments')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Coordinate medical schedules, waiting list pressure and reminder execution from one screen.')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Appointments')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create medical appointment')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('medical-appointments.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Appointment')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $waitingListCount = $appointments->where('is_waiting_list', 1)->count();
        $confirmedCount = $appointments->where('status', 'confirmed')->count();
        $checkedInCount = $appointments->where('status', 'checked_in')->count();
        $reminderCount = $appointments->filter(function ($appointment) {
            return !empty($appointment->reminder_channel) && !empty($appointment->reminder_at);
        })->count();
    ?>
    <div class="row">
        <div class="col-12 mb-4">
            <div class="ux-kpi-grid">
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Confirmed appointments')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($confirmedCount); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('ready for care delivery')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Checked-in patients')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($checkedInCount); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('already on site')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Waiting list')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($waitingListCount); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('patients still pending slot')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Reminders configured')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($reminderCount); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('email, SMS or WhatsApp')); ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Patient')); ?></th>
                                <th><?php echo e(__('Doctor')); ?></th>
                                <th><?php echo e(__('Start')); ?></th>
                                <th><?php echo e(__('End')); ?></th>
                                <th><?php echo e(__('Room')); ?></th>
                                <th><?php echo e(__('Specialty')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Queue')); ?></th>
                                <th><?php echo e(__('Reminder')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-bulk-id="<?php echo e($appointment->id); ?>">
                                    <td>
                                        <?php if($appointment->patient): ?>
                                            <a href="<?php echo e(route('patients.show', $appointment->patient->id)); ?>" class="text-primary">
                                                <?php echo e($appointment->patient->first_name); ?> <?php echo e($appointment->patient->last_name); ?>

                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($appointment->doctor ? $appointment->doctor->name : '-'); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($appointment->start_at)); ?> <?php echo e(\Auth::user()->timeFormat($appointment->start_at)); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($appointment->end_at)); ?> <?php echo e(\Auth::user()->timeFormat($appointment->end_at)); ?></td>
                                    <td><?php echo e($appointment->room ?? '-'); ?></td>
                                    <td><?php echo e($appointment->specialty ?? '-'); ?></td>
                                    <td><?php echo e($appointment->appointment_type ?? '-'); ?></td>
                                    <td>
                                        <?php if($appointment->is_waiting_list): ?>
                                            <?php echo e(__('Waiting List')); ?>

                                        <?php elseif($appointment->queue_number): ?>
                                            #<?php echo e($appointment->queue_number); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($appointment->reminder_channel && $appointment->reminder_at): ?>
                                            <?php echo e(strtoupper($appointment->reminder_channel)); ?> · <?php echo e(\Auth::user()->dateFormat($appointment->reminder_at)); ?> <?php echo e(\Auth::user()->timeFormat($appointment->reminder_at)); ?>

                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(ucwords(str_replace('_', ' ', $appointment->status))); ?></td>
                                    <td>
                                        <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit medical appointment')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bg-info" data-url="<?php echo e(route('medical-appointments.edit', $appointment->id)); ?>" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Appointment')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete medical appointment')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['medical-appointments.destroy', $appointment->id],'id'=>'delete-form-'.$appointment->id]); ?>

                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($appointment->id); ?>').submit();">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </span>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical_appointment/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Board Meetings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track upcoming governance sessions, attendance load and meeting execution from one board view.')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Board Meetings')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create board meeting')): ?>
            <a href="#" data-url="<?php echo e(route('board-meeting.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Board Meeting')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $plannedMeetings = $meetings->where('status', 'planned')->count();
        $completedMeetings = $meetings->where('status', 'completed')->count();
        $cancelledMeetings = $meetings->where('status', 'cancelled')->count();
        $attendeeVolume = $meetings->sum('attendees_count');
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="ux-kpi-grid mb-4">
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Planned meetings')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($plannedMeetings); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('scheduled governance sessions')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Completed meetings')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($completedMeetings); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('already closed')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Cancelled meetings')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($cancelledMeetings); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('sessions interrupted')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Attendee volume')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($attendeeVolume); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('total participant assignments')); ?></span>
                </div>
            </div>
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Branch')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Time')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Attendees')); ?></th>
                                    <th width="220px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="font-style">
                                <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr data-bulk-id="<?php echo e($meeting->id); ?>">
                                        <td><?php echo e($meeting->title); ?></td>
                                        <td><?php echo e(!empty($meeting->branch) ? $meeting->branch->name : '-'); ?></td>
                                        <td><?php echo e(\Auth::user()->dateFormat($meeting->meeting_date)); ?></td>
                                        <td><?php echo e(\Auth::user()->timeFormat($meeting->meeting_time)); ?></td>
                                        <td>
                                            <span class="badge bg-light-primary p-2 px-3 rounded">
                                                <?php echo e(__(\App\Models\BoardMeeting::$status[$meeting->status] ?? ucfirst($meeting->status))); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($meeting->attendees_count); ?></td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="<?php echo e(route('board-meeting.show', $meeting->id)); ?>"
                                                    class="mx-3 btn btn-sm align-items-center bg-warning"
                                                    data-bs-toggle="tooltip" title="<?php echo e(__('View')); ?>">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit board meeting')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" data-url="<?php echo e(URL::to('board-meeting/' . $meeting->id . '/edit')); ?>"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Edit Board Meeting')); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-info"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete board meeting')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['board-meeting.destroy', $meeting->id], 'id' => 'delete-form-' . $meeting->id]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                        data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($meeting->id); ?>').submit();">
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/board_meeting/index.blade.php ENDPATH**/ ?>
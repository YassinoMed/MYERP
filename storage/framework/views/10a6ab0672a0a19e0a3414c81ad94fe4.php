<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Board Meeting Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('board-meeting.index')); ?>"><?php echo e(__('Board Meetings')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Detail')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit board meeting')): ?>
            <a href="#" data-url="<?php echo e(URL::to('board-meeting/' . $boardMeeting->id . '/edit')); ?>" data-size="lg"
                data-ajax-popup="true" data-title="<?php echo e(__('Edit Board Meeting')); ?>"
                class="btn btn-sm btn-primary me-2">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e($boardMeeting->title); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <p class="mb-1"><strong><?php echo e(__('Branch')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e(!empty($boardMeeting->branch) ? $boardMeeting->branch->name : '-'); ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-1"><strong><?php echo e(__('Date')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e(\Auth::user()->dateFormat($boardMeeting->meeting_date)); ?></p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-1"><strong><?php echo e(__('Time')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e(\Auth::user()->timeFormat($boardMeeting->meeting_time)); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong><?php echo e(__('Location')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e($boardMeeting->location ?: '-'); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong><?php echo e(__('Status')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e(__(\App\Models\BoardMeeting::$status[$boardMeeting->status] ?? ucfirst($boardMeeting->status))); ?></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong><?php echo e(__('Meeting Link')); ?>:</strong></p>
                            <p class="text-muted">
                                <?php if($boardMeeting->meeting_link): ?>
                                    <a href="<?php echo e($boardMeeting->meeting_link); ?>" target="_blank"><?php echo e($boardMeeting->meeting_link); ?></a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong><?php echo e(__('Agenda')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e($boardMeeting->agenda ?: '-'); ?></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong><?php echo e(__('Minutes')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e($boardMeeting->minutes ?: '-'); ?></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong><?php echo e(__('Decision Summary')); ?>:</strong></p>
                            <p class="text-muted"><?php echo e($boardMeeting->resolution_summary ?: '-'); ?></p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1"><strong><?php echo e(__('External Guests')); ?>:</strong></p>
                            <p class="text-muted"><?php echo nl2br(e($boardMeeting->external_guests ?: '-')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Board Members')); ?></h5>
                </div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $boardMeeting->attendees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="border-bottom pb-2 mb-2">
                            <strong><?php echo e(!empty($attendee->employee) ? $attendee->employee->name : __('Deleted employee')); ?></strong>
                            <div class="text-muted"><?php echo e(!empty($attendee->employee) ? $attendee->employee->email : '-'); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No board members assigned.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/board_meeting/show.blade.php ENDPATH**/ ?>
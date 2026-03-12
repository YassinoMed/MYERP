<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Interview Schedule')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
<?php $__env->stopPush(); ?>
<?php
    $setting = \App\Models\Utility::settings();
?>


<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Interview Schedule')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create interview schedule')): ?>
            <a href="#" data-url="<?php echo e(route('interview-schedule.create')); ?>" data-bs-toggle="tooltip"
                title="<?php echo e(__('Create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Interview Schedule')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-7 mb-4">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5><?php echo e(__('Calendar')); ?></h5>
                        </div>
                        <div class="col-lg-6">
                            <?php if(isset($setting['google_calendar_enable']) && $setting['google_calendar_enable'] == 'on'): ?>
                                <select class="form-control" name="calender_type" id="calender_type" onchange="get_data()">
                                    <option value="goggle_calender"><?php echo e(__('Google Calender')); ?></option>
                                    <option value="local_calender" selected="true"><?php echo e(__('Local Calender')); ?></option>
                                </select>
                            <?php endif; ?>
                            <input type="hidden" id="interview_calendar" value="<?php echo e(url('/')); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Schedule List')); ?></h5>
                </div>
                <div class="card-body task-calendar-scroll">
                    <div class="schedule-wrp">
                        <?php if(!$schedules->isEmpty()): ?>
                            <?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="schedule-item d-flex align-items-center">
                                    <div class="schedule-item-left">
                                        <span class="date f-w-600 d-block mb-2">
                                            <?php echo e(\Auth::user()->dateFormat($schedule->date)); ?>

                                        </span>
                                        <span>
                                            <?php echo e(\Auth::user()->timeFormat($schedule->time)); ?>

                                        </span>
                                    </div>
                                    <div class="schedule-item-right d-flex align-items-center flex-1">
                                        <div class="schedule-info flex-1">
                                            <h6 class="mb-2">
                                                <a href="#!"
                                                    class="dashboard-link"><?php echo e(!empty($schedule->applications) ? (!empty($schedule->applications->jobs) ? $schedule->applications->jobs->title : '') : ''); ?></a>
                                            </h6>
                                            <p class="mb-0">
                                                <?php echo e(!empty($schedule->applications) ? $schedule->applications->name : ''); ?>

                                            </p>
                                        </div>
                                        <div class="action-btns d-flex flex-column gap-2">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit interview schedule')): ?>
                                                <a href="#"
                                                    data-url="<?php echo e(route('interview-schedule.edit', $schedule->id)); ?>"
                                                    data-title="<?php echo e(__('Edit Interview Schedule')); ?>" data-ajax-popup="true"
                                                    class="btn btn-sm bg-info shadow-sm d-flex" data-bs-toggle="tooltip"
                                                    title="<?php echo e(__('Edit')); ?>" data-original-title="<?php echo e(__('Edit')); ?>">
                                                    <i class="ti ti-pencil text-white"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete interview schedule')): ?>
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['interview-schedule.destroy', $schedule->id],
                                                    'id' => 'delete-form-' . $schedule->id,
                                                ]); ?>

                                                <a href="#" class="btn btn-sm bs-pass-para bg-danger shadow-sm d-flex"
                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                    data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($schedule->id); ?>').submit();">
                                                    <i class="ti ti-trash text-white"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="text-center">
                                <h6><?php echo e(__('No Interview Scheduled!')); ?></h6>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            get_data();
        });

        function get_data() {
            var calender_type = $('#calender_type :selected').val();
            $('#calendar').removeClass('local_calender');
            $('#calendar').removeClass('goggle_calender');
            if (calender_type == undefined) {
                $('#calendar').addClass('local_calender');
            }
            $('#calendar').addClass(calender_type);
            $.ajax({
                url: $("#interview_calendar").val() + "/interview-schedule/get_interview_data",
                method: "POST",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    'calender_type': calender_type
                },
                success: function(data) {
                    (function() {
                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'timeGridDay,timeGridWeek,dayGridMonth'
                            },
                            buttonText: {
                                timeGridDay: "<?php echo e(__('Day')); ?>",
                                timeGridWeek: "<?php echo e(__('Week')); ?>",
                                dayGridMonth: "<?php echo e(__('Month')); ?>"
                            },
                            slotLabelFormat: {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: false,
                            },
                            themeSystem: 'bootstrap',
                            // slotDuration: '00:10:00',
                            allDaySlot: false,
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            height: 'auto',
                            timeFormat: 'H(:mm)',
                            events: data,
                        });
                        calendar.render();
                    })();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/interviewSchedule/index.blade.php ENDPATH**/ ?>
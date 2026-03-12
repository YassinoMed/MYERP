<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Task Calendar')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php
    $setting = \App\Models\Utility::settings();
?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Task Calendar')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-xl-8 col-lg-7 mb-4">
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
                            <input type="hidden" id="task_calendar" value="<?php echo e(url('/')); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <h5><?php echo e(__('Tasks')); ?></h5>
                </div>
                <div class="card-body task-calendar-scroll">
                    <ul class="task-item-wrp m-0">
                        <?php $__empty_1 = true; $__currentLoopData = $arrTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="task-item d-flex align-items-center gap-3">
                            <div class="task-item-info flex-1">
                                <h5><?php echo e($task['title']); ?></h5>
                                <div class="d-flex align-items-center flex-wrap gap-1">
                                    <span><?php echo e($task['start']); ?> to</span>
                                    <span><?php echo e($task['end']); ?></span>
                                </div>
                            </div>
                            <div class="task-item-icon">
                                    <i class="f-20 ti ti-calendar-event text-white"></i>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h6 class="text-dark text-center mb-0"><?php echo e(__('No Data Found')); ?></h6>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>

    <script type="text/javascript">

        $(document).ready(function()
        {
            get_data();
        });
        function get_data()
        {
            var calender_type=$('#calender_type :selected').val();
            $('#calendar').removeClass('local_calender');
            $('#calendar').removeClass('goggle_calender');
            if(calender_type==undefined){
                $('#calendar').addClass('local_calender');
            }
            $('#calendar').addClass(calender_type);
            $.ajax({
                url: $("#task_calendar").val()+"/calendar/get_task_data" ,

                method:"POST",
                data: {"_token": "<?php echo e(csrf_token()); ?>",'calender_type':calender_type},
                success: function(data) {
                    (function() {
                        var etitle;
                        var etype;
                        var etypeclass;
                        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                            headerToolbar: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'dayGridMonth,timeGridWeek,timeGridDay'
                            },
                            buttonText: {
                                timeGridDay: "<?php echo e(__('Day')); ?>",
                                timeGridWeek: "<?php echo e(__('Week')); ?>",
                                dayGridMonth: "<?php echo e(__('Month')); ?>"
                            },
                            themeSystem: 'bootstrap',
                            slotDuration: '00:10:00',
                            navLinks: true,
                            droppable: true,
                            selectable: true,
                            selectMirror: true,
                            editable: true,
                            dayMaxEvents: true,
                            handleWindowResize: true,
                            events: data,
                        });

                        calendar.render();
                    })();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/tasks/calendar.blade.php ENDPATH**/ ?>
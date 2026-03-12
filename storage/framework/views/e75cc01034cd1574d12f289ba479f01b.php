<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Zoom-Meeting')); ?>

<?php $__env->stopSection(); ?>
<?php
    $setting = \App\Models\Utility::settings();
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Zoom Meeting')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <a href="<?php echo e(route('zoom-meeting.index')); ?>" class="btn btn-sm btn-primary-subtle me-1" data-bs-toggle="tooltip" title="<?php echo e(__('List View')); ?>" data-original-title="<?php echo e(__('List View')); ?>">
            <i class="ti ti-list"></i>
        </a>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create zoom meeting')): ?>
        <a href="#" data-size="lg" data-url="<?php echo e(route('zoom-meeting.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New Meeting')); ?>" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
        <?php endif; ?>

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
                url: $("#zoom_calendar").val()+"/zoom-meeting/get_zoom_meeting_data" ,
                method:"POST",
                data: {"_token": "<?php echo e(csrf_token()); ?>",'calender_type':calender_type},
                success: function(data) {
                    (function () {
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
                            allDaySlot:false,
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
                            <input type="hidden" id="zoom_calendar" value="<?php echo e(url('/')); ?>">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar' class='calendar' data-toggle="calendar"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <h5><?php echo e(__('Mettings')); ?></h5>
                </div>
                <div class="card-body task-calendar-scroll">
                    <ul class="task-item-wrp m-0">
                        <?php $__currentLoopData = $calandar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $month = date("m",strtotime($event['start']));
                        ?>
                        <?php if($month == date('m')): ?>
                            <li class="task-item d-flex align-items-center gap-3">
                                <div class="task-item-info flex-1">
                                    <h5>
                                        <a href="#!" data-size="lg" data-url="<?php echo e($event['url']); ?>" data-ajax-popup="true" class="dashboard-link"><?php echo e($event['title']); ?></a>
                                    </h5>
                                    <span class="text-muted"><?php echo e($event['start']); ?></span>
                                </div>
                                <div class="task-item-icon">
                                        <i class="f-20 ti ti-video text-white"></i>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/zoom-meeting/calender.blade.php ENDPATH**/ ?>
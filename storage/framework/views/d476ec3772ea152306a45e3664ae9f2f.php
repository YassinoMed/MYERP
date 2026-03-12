<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Meeting')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php
    $setting = \App\Models\Utility::settings();
?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Meeting')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create meeting')): ?>
        <div class="float-end d-flex">
            <a href="<?php echo e(route('meeting.index')); ?>" class="btn btn-sm bg-light-blue-subtitle me-2" data-bs-toggle="tooltip"
                title="<?php echo e(__('List View')); ?>" data-original-title="<?php echo e(__('List View')); ?>">
                <i class="ti ti-list"></i>
            </a>
            <a href="#" data-size="lg" data-url="<?php echo e(route('meeting.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create New Meeting')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mt-2" id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <?php echo e(Form::open(['route' => ['meeting.calender'], 'method' => 'get', 'id' => 'meeting_filter'])); ?>

                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box"></div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::date('start_date', isset($_GET['start_date']) ? $_GET['start_date'] : '', ['class' => 'month-btn form-control'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::date('end_date', isset($_GET['end_date']) ? $_GET['end_date'] : '', ['class' => 'month-btn form-control '])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto mt-4">
                                        <a href="#" class="btn btn-sm btn-primary me-1"
                                            onclick="document.getElementById('meeting_filter').submit(); return false;"
                                            data-bs-toggle="tooltip" title="<?php echo e(__('Apply')); ?>"
                                            data-original-title="<?php echo e(__('apply')); ?>">
                                            <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                        </a>
                                        <a href="<?php echo e(route('meeting.calender')); ?>" class="btn btn-sm btn-danger "
                                            data-bs-toggle="tooltip" title="<?php echo e(__('Reset')); ?>"
                                            data-original-title="<?php echo e(__('Reset')); ?>">
                                            <span class="btn-inner--icon"><i
                                                    class="ti ti-refresh text-white-off "></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

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
                                <select class="form-control" name="calender_type" id="calender_type"
                                    onchange="get_data()">
                                    <option value="goggle_calender"><?php echo e(__('Google Calender')); ?></option>
                                    <option value="local_calender" selected="true"><?php echo e(__('Local Calender')); ?></option>
                                </select>
                            <?php endif; ?>
                            <input type="hidden" id="meeting_calendar" value="<?php echo e(url('/')); ?>">
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
                    <h5 class="mb-0"><?php echo e(__('Meeting List')); ?></h5>
                </div>
                <div class="card-body  task-calendar-scroll">
                    <div class="event-wrp holiday-wrp">
                        <?php if(!$meetings->isEmpty()): ?>
                            <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="event-item d-flex align-items-center">
                                    <div class="event-content flex-1">
                                        <h6 class="mb-2">
                                            <?php echo e($meeting->title); ?>

                                        </h6>
                                        <div class="date-wrp d-flex flex-wrap align-items-center">
                                            <div class="date">
                                                <span
                                                    class="f-w-600"><?php echo e(__('Meeting Date : ')); ?></span><?php echo e(\Auth::user()->dateFormat($meeting->date)); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="action-btns d-flex flex-column gap-2">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit interview schedule')): ?>
                                            <a href="#" data-url="<?php echo e(route('meeting.edit', $meeting->id)); ?>"
                                                data-title="<?php echo e(__('Edit Interview Schedule')); ?>" data-ajax-popup="true"
                                                class="btn btn-sm bg-info shadow-sm d-flex" data-bs-toggle="tooltip"
                                                title="<?php echo e(__('Edit')); ?>" data-original-title="<?php echo e(__('Edit')); ?>"><i
                                                    class="ti ti-pencil text-white"></i></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete interview schedule')): ?>
                                            <div class="action-btn ">
                                                <?php echo Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['meeting.destroy', $meeting->id],
                                                    'id' => 'delete-form-' . $meeting->id,
                                                ]); ?>

                                                <a href="#"
                                                    class="btn btn-sm bs-pass-para bg-danger shadow-sm d-flex"
                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                    data-original-title="<?php echo e(__('Delete')); ?>"
                                                    data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                    data-confirm-yes="document.getElementById('delete-form-<?php echo e($meeting->id); ?>').submit();"><i
                                                        class="ti ti-trash text-white"></i></a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="text-center">
                                <h6><?php echo e(__('There is no meeting in this month')); ?></h6>
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
                url: $("#meeting_calendar").val() + "/meeting/get_meeting_data",
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


    <script>
        $(document).ready(function() {
            var b_id = $('#branch_id').val();
            getDepartment(b_id);
        });
        $(document).on('change', 'select[name=branch_id]', function() {

            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        function getDepartment(bid) {

            $.ajax({
                url: '<?php echo e(route('meeting.getdepartment')); ?>',
                type: 'POST',
                data: {
                    "branch_id": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },

                success: function(data) {
                    $('#department_id').empty();

                    $("#department_div").html('');
                    $('#department_div').append(
                        '<select class="form-control" id="department_id" name="department_id[]"  multiple></select>'
                        );

                    $('#department_id').append('<option value=""><?php echo e(__('Select Department')); ?></option>');

                    $('#department_id').append('<option value="0"> <?php echo e(__('All Department')); ?> </option>');
                    $.each(data, function(key, value) {
                        $('#department_id').append('<option value="' + key + '">' + value +
                        '</option>');
                    });
                    var multipleCancelButton = new Choices('#department_id', {
                        removeItemButton: true,
                    });


                }

            });
        }

        $(document).on('change', '#department_id', function() {
            var department_id = $(this).val();
            getEmployee(department_id);
        });

        function getEmployee(did) {

            $.ajax({
                url: '<?php echo e(route('meeting.getemployee')); ?>',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#employee_id').empty();

                    $("#employee_div").html('');
                    $('#employee_div').append(
                        '<select class="form-control" id="employee_id" name="employee_id[]"  multiple></select>'
                        );


                    $('#employee_id').append('<option value=""><?php echo e(__('Select Employee')); ?></option>');
                    $('#employee_id').append('<option value="0"> <?php echo e(__('All Employee')); ?> </option>');

                    $.each(data, function(key, value) {
                        $('#employee_id').append('<option value="' + key + '">' + value + '</option>');
                    });

                    var multipleCancelButton = new Choices('#employee_id', {
                        removeItemButton: true,
                    });
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/meeting/calender.blade.php ENDPATH**/ ?>
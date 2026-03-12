<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Education')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Education')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('New Course')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.courses.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Training Type')); ?></label>
                            <select name="training_type_id" class="form-control">
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $trainingTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Trainer')); ?></label>
                            <select name="trainer_id" class="form-control">
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trainer->id); ?>"><?php echo e($trainer->firstname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Delivery Mode')); ?></label>
                            <select name="delivery_mode" class="form-control" required>
                                <option value="classroom"><?php echo e(__('Classroom')); ?></option>
                                <option value="online"><?php echo e(__('Online')); ?></option>
                                <option value="blended"><?php echo e(__('Blended')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Start Date')); ?></label>
                            <input type="date" name="start_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('End Date')); ?></label>
                            <input type="date" name="end_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Description')); ?></label>
                            <textarea name="description" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('New Module')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.modules.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Course')); ?></label>
                            <select name="course_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Title')); ?></label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Content URL')); ?></label>
                            <input type="text" name="content_url" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Duration (minutes)')); ?></label>
                            <input type="number" name="duration_minutes" class="form-control" min="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Order')); ?></label>
                            <input type="number" name="sort_order" class="form-control" min="0">
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Enrollment')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.enrollments.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Course')); ?></label>
                            <select name="course_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Employee')); ?></label>
                            <select name="employee_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control">
                                <option value="enrolled"><?php echo e(__('Enrolled')); ?></option>
                                <option value="in_progress"><?php echo e(__('In progress')); ?></option>
                                <option value="completed"><?php echo e(__('Completed')); ?></option>
                                <option value="cancelled"><?php echo e(__('Cancelled')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Enrolled At')); ?></label>
                            <input type="date" name="enrolled_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Completed At')); ?></label>
                            <input type="date" name="completed_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Progress (%)')); ?></label>
                            <input type="number" name="progress_percent" class="form-control" min="0" max="100">
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Session Planning')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.sessions.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Course')); ?></label>
                            <select name="course_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Scheduled At')); ?></label>
                            <input type="datetime-local" name="scheduled_at" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Duration (hours)')); ?></label>
                            <input type="number" name="duration_hours" class="form-control" step="0.25" min="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Location')); ?></label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Attendance')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.attendances.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Session')); ?></label>
                            <select name="session_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($session->id); ?>"><?php echo e($session->id); ?> - <?php echo e($session->scheduled_at); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Employee')); ?></label>
                            <select name="employee_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Status')); ?></label>
                            <select name="status" class="form-control" required>
                                <option value="present"><?php echo e(__('Present')); ?></option>
                                <option value="absent"><?php echo e(__('Absent')); ?></option>
                                <option value="late"><?php echo e(__('Late')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Grades')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.grades.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Course')); ?></label>
                            <select name="course_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Employee')); ?></label>
                            <select name="employee_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Score')); ?></label>
                            <input type="number" name="score" class="form-control" step="0.1" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Grade')); ?></label>
                            <input type="text" name="grade" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Certificates')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.certificates.issue')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Enrollment')); ?></label>
                            <select name="enrollment_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($enrollment->id); ?>"><?php echo e($enrollment->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Send To Email')); ?></label>
                            <input type="email" name="sent_to_email" class="form-control">
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Issue')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Trainer Hours')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.trainer-hours.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Trainer')); ?></label>
                            <select name="trainer_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trainer->id); ?>"><?php echo e($trainer->firstname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Course')); ?></label>
                            <select name="course_id" class="form-control">
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Session')); ?></label>
                            <select name="session_id" class="form-control">
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($session->id); ?>"><?php echo e($session->id); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Hours')); ?></label>
                            <input type="number" name="hours" class="form-control" step="0.25" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Rate')); ?></label>
                            <input type="number" name="rate" class="form-control" step="0.01" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Declared At')); ?></label>
                            <input type="date" name="declared_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Save')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Trainer Invoice')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('education.trainer-invoices.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Trainer')); ?></label>
                            <select name="trainer_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select')); ?></option>
                                <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($trainer->id); ?>"><?php echo e($trainer->firstname); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Period Start')); ?></label>
                            <input type="date" name="period_start" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Period End')); ?></label>
                            <input type="date" name="period_end" class="form-control" required>
                        </div>
                        <button class="btn btn-primary w-100"><?php echo e(__('Generate')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Courses')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Code')); ?></th>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Mode')); ?></th>
                                    <th><?php echo e(__('Dates')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($course->code); ?></td>
                                        <td><?php echo e($course->name); ?></td>
                                        <td><?php echo e(ucfirst($course->delivery_mode)); ?></td>
                                        <td><?php echo e($course->start_date); ?> - <?php echo e($course->end_date); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Modules')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Course')); ?></th>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($courses->firstWhere('id', $module->course_id))->name); ?></td>
                                        <td><?php echo e($module->title); ?></td>
                                        <td><?php echo e($module->duration_minutes); ?> <?php echo e(__('min')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Enrollments')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Course')); ?></th>
                                    <th><?php echo e(__('Employee')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Progress')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $enrollments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrollment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($courses->firstWhere('id', $enrollment->course_id))->name); ?></td>
                                        <td><?php echo e(optional($employees->firstWhere('id', $enrollment->employee_id))->name); ?></td>
                                        <td><?php echo e($enrollment->status); ?></td>
                                        <td><?php echo e($enrollment->progress_percent); ?>%</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Sessions')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Course')); ?></th>
                                    <th><?php echo e(__('Scheduled At')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($courses->firstWhere('id', $session->course_id))->name); ?></td>
                                        <td><?php echo e($session->scheduled_at); ?></td>
                                        <td><?php echo e($session->duration_hours); ?> <?php echo e(__('h')); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Attendances')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Session')); ?></th>
                                    <th><?php echo e(__('Employee')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($attendance->session_id); ?></td>
                                        <td><?php echo e(optional($employees->firstWhere('id', $attendance->employee_id))->name); ?></td>
                                        <td><?php echo e($attendance->status); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Grades')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Course')); ?></th>
                                    <th><?php echo e(__('Employee')); ?></th>
                                    <th><?php echo e(__('Score')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($courses->firstWhere('id', $grade->course_id))->name); ?></td>
                                        <td><?php echo e(optional($employees->firstWhere('id', $grade->employee_id))->name); ?></td>
                                        <td><?php echo e($grade->score); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="3"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Certificates')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Certificate')); ?></th>
                                    <th><?php echo e(__('Enrollment')); ?></th>
                                    <th><?php echo e(__('Issued')); ?></th>
                                    <th><?php echo e(__('Verify')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($certificate->certificate_number); ?></td>
                                        <td><?php echo e($certificate->enrollment_id); ?></td>
                                        <td><?php echo e($certificate->issued_at); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('education.certificates.verify', $certificate->verification_hash)); ?>" class="btn btn-sm btn-primary" target="_blank">
                                                <?php echo e(__('Open')); ?>

                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <h5><?php echo e(__('Trainer Hours')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Trainer')); ?></th>
                                    <th><?php echo e(__('Hours')); ?></th>
                                    <th><?php echo e(__('Rate')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $trainerHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($trainers->firstWhere('id', $hour->trainer_id))->firstname); ?></td>
                                        <td><?php echo e($hour->hours); ?></td>
                                        <td><?php echo e($hour->rate); ?></td>
                                        <td><?php echo e($hour->amount); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Trainer Invoices')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Trainer')); ?></th>
                                    <th><?php echo e(__('Period')); ?></th>
                                    <th><?php echo e(__('Hours')); ?></th>
                                    <th><?php echo e(__('Amount')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $trainerInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e(optional($trainers->firstWhere('id', $invoice->trainer_id))->firstname); ?></td>
                                        <td><?php echo e($invoice->period_start); ?> - <?php echo e($invoice->period_end); ?></td>
                                        <td><?php echo e($invoice->total_hours); ?></td>
                                        <td><?php echo e($invoice->total_amount); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4"><?php echo e(__('No data found')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/education/index.blade.php ENDPATH**/ ?>
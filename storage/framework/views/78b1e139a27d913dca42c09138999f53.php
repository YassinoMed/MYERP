<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Advanced Medical Operations')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Advanced Medical Operations')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Supervise emergency intake, imaging, lab, surgery, nursing, biomed and telecare from one operational care board.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('medical.operations.reports')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Medical Reports')); ?></a>
        <a href="<?php echo e(route('medical.patient-portal')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Patient Portal')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Emergency queue')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($emergencyVisits->where('status', 'waiting')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('patients awaiting triage or care')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Imaging backlog')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($imagingOrders->whereIn('status', ['ordered', 'scheduled'])->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('orders pending completion')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Open lab orders')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($labOrders->whereIn('status', ['ordered', 'collected'])->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('samples awaiting validation')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Telemedicine')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($telemedicineSessions->whereIn('status', ['planned', 'in_progress'])->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('remote sessions scheduled')); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Emergency Intake')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.emergency-visits.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Arrival')); ?></label>
                                <input type="datetime-local" name="arrived_at" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Triage level')); ?></label>
                                <select name="triage_level" class="form-control">
                                    <option value="red"><?php echo e(__('Red')); ?></option>
                                    <option value="orange"><?php echo e(__('Orange')); ?></option>
                                    <option value="yellow"><?php echo e(__('Yellow')); ?></option>
                                    <option value="green"><?php echo e(__('Green')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Doctor')); ?></label>
                                <input type="text" name="attending_doctor" class="form-control">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label"><?php echo e(__('Chief complaint')); ?></label>
                                <input type="text" name="chief_complaint" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Register Emergency Visit')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Imaging Order')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.imaging-orders.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Consultation')); ?></label>
                                <select name="consultation_id" class="form-control">
                                    <option value=""><?php echo e(__('Select consultation')); ?></option>
                                    <?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($consultation->id); ?>">#<?php echo e($consultation->id); ?> - <?php echo e($consultation->consultation_date?->format('Y-m-d')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Modality')); ?></label>
                                <input type="text" name="modality" class="form-control" placeholder="XR / CT / MRI" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Body part')); ?></label>
                                <input type="text" name="body_part" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Imaging Order')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Lab Order')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.lab-orders.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Ordered at')); ?></label>
                                <input type="datetime-local" name="ordered_at" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Panel')); ?></label>
                                <input type="text" name="panel_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Sample type')); ?></label>
                                <input type="text" name="sample_type" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control">
                                    <option value="ordered"><?php echo e(__('Ordered')); ?></option>
                                    <option value="collected"><?php echo e(__('Collected')); ?></option>
                                    <option value="validated"><?php echo e(__('Validated')); ?></option>
                                    <option value="completed"><?php echo e(__('Completed')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="critical_flag" value="1" id="critical_flag">
                                    <label class="form-check-label" for="critical_flag"><?php echo e(__('Critical result expected')); ?></label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Lab Order')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Medical Specialty')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.specialties.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Code')); ?></label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Department')); ?></label>
                                <input type="text" name="department_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Head of specialty')); ?></label>
                                <input type="text" name="head_name" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Specialty')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Nursing Care')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.nursing-cares.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Admission')); ?></label>
                                <select name="hospital_admission_id" class="form-control">
                                    <option value=""><?php echo e(__('Select admission')); ?></option>
                                    <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($admission->id); ?>"><?php echo e($admission->admission_number ?? ('#' . $admission->id)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Care type')); ?></label>
                                <input type="text" name="care_type" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Scheduled at')); ?></label>
                                <input type="datetime-local" name="scheduled_at" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Plan Nursing Care')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Telemedicine Session')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.telemedicine-sessions.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Appointment')); ?></label>
                                <select name="appointment_id" class="form-control">
                                    <option value=""><?php echo e(__('Select appointment')); ?></option>
                                    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($appointment->id); ?>">#<?php echo e($appointment->id); ?> - <?php echo e($appointment->start_at?->format('Y-m-d H:i')); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Provider')); ?></label>
                                <input type="text" name="provider_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Session link')); ?></label>
                                <input type="url" name="session_link" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><?php echo e(__('Scheduled at')); ?></label>
                                <input type="datetime-local" name="scheduled_at" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Telemedicine')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Surgical Procedure')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.surgical-procedures.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Patient')); ?></label>
                                <select name="patient_id" class="form-control" required>
                                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($patient->id); ?>"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Admission')); ?></label>
                                <select name="hospital_admission_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($admission->id); ?>"><?php echo e($admission->admission_number ?? ('#' . $admission->id)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Procedure')); ?></label>
                                <input type="text" name="procedure_name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Surgeon')); ?></label>
                                <input type="text" name="surgeon_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Theatre')); ?></label>
                                <input type="text" name="theatre_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Scheduled at')); ?></label>
                                <input type="datetime-local" name="scheduled_at" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Schedule Surgery')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Biomedical Asset')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('medical.operations.biomedical-assets.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Asset name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Asset code')); ?></label>
                                <input type="text" name="asset_code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Equipment type')); ?></label>
                                <input type="text" name="equipment_type" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Serial number')); ?></label>
                                <input type="text" name="serial_number" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Location')); ?></label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Calibration due')); ?></label>
                                <input type="date" name="calibration_due_date" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Asset')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Lab Orders')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Panel')); ?></th><th><?php echo e(__('Sample')); ?></th><th><?php echo e(__('Critical')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_2 = true; $__currentLoopData = $labOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <tr>
                                <td><?php echo e(optional($order->patient)->first_name); ?> <?php echo e(optional($order->patient)->last_name); ?></td>
                                <td><?php echo e($order->panel_name); ?></td>
                                <td><?php echo e($order->sample_type ?: '-'); ?></td>
                                <td><?php echo e($order->critical_flag ? __('Yes') : __('No')); ?></td>
                                <td><?php echo e(ucfirst($order->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No lab orders yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Surgical Board')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Procedure')); ?></th><th><?php echo e(__('Surgeon')); ?></th><th><?php echo e(__('Scheduled')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_2 = true; $__currentLoopData = $surgicalProcedures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <tr>
                                <td><?php echo e(optional($procedure->patient)->first_name); ?> <?php echo e(optional($procedure->patient)->last_name); ?></td>
                                <td><?php echo e($procedure->procedure_name); ?></td>
                                <td><?php echo e($procedure->surgeon_name ?: '-'); ?></td>
                                <td><?php echo e($procedure->scheduled_at?->format('Y-m-d H:i')); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $procedure->status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No surgical procedures yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Biomedical Assets')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Asset')); ?></th><th><?php echo e(__('Code')); ?></th><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Calibration due')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_2 = true; $__currentLoopData = $biomedicalAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <tr>
                                <td><?php echo e($asset->name); ?></td>
                                <td><?php echo e($asset->asset_code); ?></td>
                                <td><?php echo e($asset->equipment_type ?: '-'); ?></td>
                                <td><?php echo e($asset->calibration_due_date?->format('Y-m-d') ?: '-'); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $asset->maintenance_status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No biomedical assets yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Medical Specialties')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Name')); ?></th><th><?php echo e(__('Code')); ?></th><th><?php echo e(__('Department')); ?></th><th><?php echo e(__('Head')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_2 = true; $__currentLoopData = $medicalSpecialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                            <tr>
                                <td><?php echo e($specialty->name); ?></td>
                                <td><?php echo e($specialty->code); ?></td>
                                <td><?php echo e($specialty->department_name ?: '-'); ?></td>
                                <td><?php echo e($specialty->head_name ?: '-'); ?></td>
                                <td><?php echo e(ucfirst($specialty->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No specialties yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/operations.blade.php ENDPATH**/ ?>
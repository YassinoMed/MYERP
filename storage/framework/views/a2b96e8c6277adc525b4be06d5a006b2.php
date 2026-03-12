<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Patient Portal')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Patient Portal')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Review appointments, lab flow, billing, telemedicine and secure patient communication from a single portal view.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?php echo e(route('medical.patient-portal')); ?>" class="row align-items-end">
                <div class="col-md-5">
                    <label class="form-label"><?php echo e(__('Patient')); ?></label>
                    <select name="patient_id" class="form-control">
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($patient->id); ?>" <?php if(optional($selectedPatient)->id === $patient->id): echo 'selected'; endif; ?>><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-primary"><?php echo e(__('Open Portal View')); ?></button>
                </div>
            </form>
        </div>
    </div>

    <?php if($selectedPatient): ?>
        <div class="ux-kpi-grid mb-4">
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Appointments')); ?></span><strong class="ux-kpi-value"><?php echo e($appointments->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Lab orders')); ?></span><strong class="ux-kpi-value"><?php echo e($labOrders->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Invoices')); ?></span><strong class="ux-kpi-value"><?php echo e($medicalInvoices->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Telemedicine')); ?></span><strong class="ux-kpi-value"><?php echo e($telemedicineSessions->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Admissions')); ?></span><strong class="ux-kpi-value"><?php echo e($admissions->count()); ?></strong></div>
            <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Nursing care')); ?></span><strong class="ux-kpi-value"><?php echo e($nursingCares->count()); ?></strong></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Clinical Summary')); ?></h5></div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6"><strong><?php echo e(__('Patient')); ?>:</strong> <?php echo e($selectedPatient->first_name); ?> <?php echo e($selectedPatient->last_name); ?></div>
                            <div class="col-md-6"><strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e($selectedPatient->contact ?? $selectedPatient->phone ?? '-'); ?></div>
                            <div class="col-md-6"><strong><?php echo e(__('Emergency visits')); ?>:</strong> <?php echo e($emergencyVisits->count()); ?></div>
                            <div class="col-md-6"><strong><?php echo e(__('Outstanding due')); ?>:</strong> <?php echo e(\Auth::user()->priceFormat($medicalInvoices->sum(fn($invoice) => $invoice->dueAmount()))); ?></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Portal Message')); ?></h5></div>
                    <div class="card-body">
                        <form action="<?php echo e(route('medical.patient-portal.messages.store', $selectedPatient->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label"><?php echo e(__('Subject')); ?></label>
                                <input type="text" name="subject" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"><?php echo e(__('Message')); ?></label>
                                <textarea name="message" class="form-control" rows="4" required></textarea>
                            </div>
                            <button class="btn btn-primary"><?php echo e(__('Send Message')); ?></button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Portal Messages')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('When')); ?></th><th><?php echo e(__('Direction')); ?></th><th><?php echo e(__('Subject')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $portalMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($message->sent_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e(ucfirst($message->direction)); ?></td>
                                    <td><?php echo e($message->subject); ?></td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <span><?php echo e(ucfirst($message->status)); ?></span>
                                            <form action="<?php echo e(route('medical.patient-portal.messages.status', $message->id)); ?>" method="post" class="d-flex gap-2">
                                                <?php echo csrf_field(); ?>
                                                <select name="status" class="form-control form-control-sm">
                                                    <option value="sent" <?php if($message->status === 'sent'): echo 'selected'; endif; ?>><?php echo e(__('Sent')); ?></option>
                                                    <option value="read" <?php if($message->status === 'read'): echo 'selected'; endif; ?>><?php echo e(__('Read')); ?></option>
                                                    <option value="closed" <?php if($message->status === 'closed'): echo 'selected'; endif; ?>><?php echo e(__('Closed')); ?></option>
                                                </select>
                                                <button class="btn btn-sm btn-outline-primary"><?php echo e(__('Save')); ?></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Appointments & Telemedicine')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Link')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($appointment->start_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e($appointment->appointment_type ?: __('Appointment')); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $appointment->status ?? 'scheduled'))); ?></td>
                                    <td>-</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $telemedicineSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($session->scheduled_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e(__('Telemedicine')); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $session->status))); ?></td>
                                    <td>
                                        <?php if($session->session_link): ?>
                                            <a href="<?php echo e($session->session_link); ?>" target="_blank"><?php echo e(__('Open')); ?></a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Laboratory & Surgery')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Date')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $labOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Lab')); ?></td>
                                    <td><?php echo e($order->panel_name); ?></td>
                                    <td><?php echo e(ucfirst($order->status)); ?></td>
                                    <td><?php echo e($order->ordered_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $labResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Lab Result')); ?></td>
                                    <td><?php echo e($result->test_name); ?></td>
                                    <td><?php echo e(__('Validated')); ?></td>
                                    <td><?php echo e($result->result_date ? \Auth::user()->dateFormat($result->result_date) : '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $surgicalProcedures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Surgery')); ?></td>
                                    <td><?php echo e($procedure->procedure_name); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $procedure->status))); ?></td>
                                    <td><?php echo e($procedure->scheduled_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Admissions & Nursing')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Type')); ?></th><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Date')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $admissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Admission')); ?></td>
                                    <td><?php echo e($admission->admission_number ?? ('#' . $admission->id)); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $admission->status ?? 'active'))); ?></td>
                                    <td><?php echo e($admission->admission_date?->format('Y-m-d') ?: '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $nursingCares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $care): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Nursing')); ?></td>
                                    <td><?php echo e($care->care_type); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $care->status))); ?></td>
                                    <td><?php echo e($care->scheduled_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $emergencyVisits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(__('Emergency')); ?></td>
                                    <td><?php echo e(strtoupper($visit->triage_level)); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $visit->status))); ?></td>
                                    <td><?php echo e($visit->arrived_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h5><?php echo e(__('Billing')); ?></h5></div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Invoice')); ?></th><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Patient due')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                            <tbody>
                            <?php $__currentLoopData = $medicalInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($invoice->invoice_number); ?></td>
                                    <td><?php echo e($invoice->invoice_date?->format('Y-m-d')); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->dueAmount())); ?></td>
                                    <td><?php echo e(ucfirst(str_replace('_', ' ', $invoice->status))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/patient_portal.blade.php ENDPATH**/ ?>
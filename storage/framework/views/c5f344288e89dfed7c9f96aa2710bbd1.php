<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Medical Reports')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Reports')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Monitor care throughput, critical laboratory activity, surgical load, telecare and biomedical readiness.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Emergency waiting')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['emergency_waiting']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Critical lab orders')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['critical_lab_orders']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Planned surgeries')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['planned_surgeries']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Telemedicine open')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['telemedicine_open']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Biomed due')); ?></span><strong class="ux-kpi-value"><?php echo e($kpis['biomedical_due']); ?></strong></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Medical revenue')); ?></span><strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($kpis['medical_revenue'])); ?></strong></div>
    </div>

    <div class="card mb-4">
        <div class="card-body d-flex flex-wrap gap-2">
            <a href="<?php echo e(route('medical.operations.laboratory')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Open Laboratory Board')); ?></a>
            <a href="<?php echo e(route('medical.operations.surgery')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Open Surgery Board')); ?></a>
            <a href="<?php echo e(route('medical.operations.biomedical')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Open Biomedical Board')); ?></a>
            <a href="<?php echo e(route('medical.operations.specialties')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Open Specialties')); ?></a>
            <a href="<?php echo e(route('medical.patient-portal')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Open Patient Portal')); ?></a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Emergency Visits')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Triage')); ?></th><th><?php echo e(__('Complaint')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $emergencyVisits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($visit->patient)->first_name); ?> <?php echo e(optional($visit->patient)->last_name); ?></td>
                                <td><?php echo e(strtoupper($visit->triage_level)); ?></td>
                                <td><?php echo e($visit->chief_complaint); ?></td>
                                <td><?php echo e(ucfirst($visit->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Lab Activity')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Panel')); ?></th><th><?php echo e(__('Critical')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $labOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($order->patient)->first_name); ?> <?php echo e(optional($order->patient)->last_name); ?></td>
                                <td><?php echo e($order->panel_name); ?></td>
                                <td><?php echo e($order->critical_flag ? __('Yes') : __('No')); ?></td>
                                <td><?php echo e(ucfirst($order->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Surgeries')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Procedure')); ?></th><th><?php echo e(__('Scheduled')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $surgeries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procedure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(optional($procedure->patient)->first_name); ?> <?php echo e(optional($procedure->patient)->last_name); ?></td>
                                <td><?php echo e($procedure->procedure_name); ?></td>
                                <td><?php echo e($procedure->scheduled_at?->format('Y-m-d H:i')); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $procedure->status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Biomedical Assets')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Asset')); ?></th><th><?php echo e(__('Location')); ?></th><th><?php echo e(__('Calibration due')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $biomedicalAssets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asset): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($asset->name); ?></td>
                                <td><?php echo e($asset->location ?: '-'); ?></td>
                                <td><?php echo e($asset->calibration_due_date?->format('Y-m-d') ?: '-'); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $asset->maintenance_status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Medical Revenue Snapshot')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Invoice')); ?></th><th><?php echo e(__('Patient')); ?></th><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Patient Amount')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__currentLoopData = $medicalInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($invoice->invoice_number); ?></td>
                                <td><?php echo e(optional($invoice->patient)->first_name); ?> <?php echo e(optional($invoice->patient)->last_name); ?></td>
                                <td><?php echo e($invoice->invoice_date?->format('Y-m-d')); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($invoice->patient_amount)); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $invoice->status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/reports.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Medical Specialties')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('medical.operations.index')); ?>"><?php echo e(__('Advanced Medical Operations')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Specialties')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Maintain the specialty catalog, responsible heads and the operational footprint of clinical disciplines.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-header"><h5><?php echo e(__('Specialty Register')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Code')); ?></th>
                        <th><?php echo e(__('Department')); ?></th>
                        <th><?php echo e(__('Head')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $medicalSpecialties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specialty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($specialty->name); ?></td>
                            <td><?php echo e($specialty->code); ?></td>
                            <td><?php echo e($specialty->department_name ?: '-'); ?></td>
                            <td><?php echo e($specialty->head_name ?: '-'); ?></td>
                            <td><?php echo e(ucfirst($specialty->status ?: 'active')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h5><?php echo e(__('Recent Clinical Demand')); ?></h5></div>
        <div class="card-body table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Appointment')); ?></th>
                        <th><?php echo e(__('Patient')); ?></th>
                        <th><?php echo e(__('Date')); ?></th>
                        <th><?php echo e(__('Type')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>#<?php echo e($appointment->id); ?></td>
                            <td><?php echo e(optional($appointment->patient)->first_name); ?> <?php echo e(optional($appointment->patient)->last_name); ?></td>
                            <td><?php echo e($appointment->start_at?->format('Y-m-d H:i')); ?></td>
                            <td><?php echo e($appointment->appointment_type ?: __('Consultation')); ?></td>
                            <td><?php echo e(ucfirst(str_replace('_', ' ', $appointment->status ?? 'scheduled'))); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical/specialties.blade.php ENDPATH**/ ?>
<div class="modal-body">
    <div class="row">
        <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col text-center">
                <div class="card p-4 mb-4">
                    <h7 class="report-text gray-text mb-0"><?php echo e($leave->title); ?> :</h7>
                    <h6 class="report-text mb-0"><?php echo e($leave->total); ?></h6>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="row mt-2">
        <div class="table-responsive">
        <table class="table datatable">
            <thead>
            <tr>
                <th><?php echo e(__('Leave Type')); ?></th>
                <th><?php echo e(__('Leave Date')); ?></th>
                <th><?php echo e(__('Leave Days')); ?></th>
                <th><?php echo e(__('Leave Reason')); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php $__empty_0 = true; $__currentLoopData = $leaveData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                <?php
                    $startDate               = new \DateTime($leave->start_date);
                   $endDate                 = new \DateTime($leave->end_date);
                   $total_leave_days        = $startDate->diff($endDate)->days;
                ?>
                <tr>
                    <td><?php echo e(!empty($leave->leaveType)?$leave->leaveType->title:''); ?></td>
                    <td><?php echo e($leave->start_date.' to '.$leave->end_date); ?></td>
                    <td><?php echo e($total_leave_days); ?></td>
                    <td><?php echo e($leave->leave_reason); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                <tr>
                    <td colspan="4" class="text-center"><?php echo e(__('No Data Found.!')); ?></td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    </div>
</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/report/leaveShow.blade.php ENDPATH**/ ?>
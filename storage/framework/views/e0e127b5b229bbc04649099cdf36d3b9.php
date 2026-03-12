<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Employee Salary')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Employee Salary')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
    <div class="col-xl-12">
            <div class="card">
            <div class="card-body table-border-style">
                    <div class="table-responsive">
                    <table class="table datatable">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Employee Id')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Payroll Type')); ?></th>
                                <th><?php echo e(__('Salary')); ?></th>
                                <th><?php echo e(__('Net Salary')); ?></th>
                                <th width="200px"><?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="Id">
                                        <a href="<?php echo e(route('setsalary.show',$employee->id)); ?>" class="btn btn-outline-primary" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                            <?php echo e(\Auth::user()->employeeIdFormat($employee->employee_id)); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e($employee->name); ?></td>
                                    <td><?php echo e(!empty($employee->salaryType) ? $employee->salaryType->name : '-'); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($employee->salary)); ?></td>
                                    <td><?php echo e(!empty($employee->get_net_salary()) ?\Auth::user()->priceFormat($employee->get_net_salary()):''); ?></td>
                                    <td>
                                    <div class="action-btn me-2">
                                        <a href="<?php echo e(route('setsalary.show',$employee->id)); ?>" class="mx-3 btn btn-sm align-items-center bg-warning" data-bs-toggle="tooltip" title="<?php echo e(__('Set Salary')); ?>" data-original-title="<?php echo e(__('View')); ?>">
                                            <i class="ti ti-eye text-white"></i>
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/setsalary/index.blade.php ENDPATH**/ ?>
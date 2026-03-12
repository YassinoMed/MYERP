<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Last Login')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                       <table class="table datatable">                            <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Last Login')); ?></th>
                                <th><?php echo e(__('Role')); ?></th>
                            </tr>
                            </thead>
                            <tbody class="font-style">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if($user->type=='Employee'): ?>
                                        <td><?php echo e(\Auth::user()->employeeIdFormat($user->id)); ?></td>
                                    <?php else: ?>
                                        <td>--</td>
                                    <?php endif; ?>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->last_login); ?></td>
                                    <td><?php echo e($user->type); ?></td>
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



<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/employee/lastLogin.blade.php ENDPATH**/ ?>
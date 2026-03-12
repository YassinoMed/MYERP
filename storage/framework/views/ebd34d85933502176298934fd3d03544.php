<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Expenses')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white">(<?php echo e($total); ?>)</h5>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center">
                        <thead>
                        <tr>
                            <th scope="col"><?php echo e(__('Attachment')); ?></th>
                            <th scope="col"><?php echo e(__('Project')); ?></th>
                            <th scope="col"><?php echo e(__('Name')); ?></th>
                            <th scope="col"><?php echo e(__('Date')); ?></th>
                            <th scope="col"><?php echo e(__('Amount')); ?></th>
                        </tr>
                        </thead>
                        <tbody class="list">
                        <?php if(count($expenses) > 0): ?>
                            <?php $__currentLoopData = $expenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row">
                                        <?php if(!empty($expense->attachment)): ?>
                                            <a href="<?php echo e(asset(Storage::url($expense->attachment))); ?>" class="btn btn-sm btn-secondary btn-icon rounded-pill" download>
                                                <span class="btn-inner--icon"><i class="ti ti-download"></i></span>
                                            </a>
                                        <?php else: ?>
                                            <a href="#" class="btn btn-sm btn-secondary btn-icon rounded-pill">
                                                <span class="btn-inner--icon"><i class="ti ti-times-circle"></i></span>
                                            </a>
                                        <?php endif; ?>
                                    </th>
                                    <td>
                                        <span class="h6 text-sm font-weight-bold mb-0"><?php echo e($expense->project->name); ?> <span class="badge badge-xs badge-<?php echo e((\Auth::user()->checkProject($expense->project->id) == 'Owner') ? 'success' : 'warning'); ?>"><?php echo e(\Auth::user()->checkProject($expense->project->id)); ?></span></span>
                                    </td>
                                    <td>
                                        <span class="h6 text-sm font-weight-bold mb-0"><?php echo e($expense->name); ?></span>
                                        <?php if(!empty($expense->task)): ?><span class="d-block text-sm text-muted"><?php echo e($expense->task->name); ?></span><?php endif; ?>
                                    </td>
                                    <td><?php echo e((!empty($expense->date)) ? Utility::getDateFormated($expense->date) : '-'); ?></td>
                                    <td><?php echo e(Utility::projectCurrencyFormat($expense->project->id,$expense->amount)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <th scope="col" colspan="5"><h6 class="text-center"><?php echo e(__('No Expense Found.')); ?></h6></th>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/project_expense/list.blade.php ENDPATH**/ ?>
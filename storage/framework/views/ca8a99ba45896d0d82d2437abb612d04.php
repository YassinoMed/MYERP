<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Cheques')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Cheques')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import cheque')): ?>
            <a href="#" data-size="md" data-url="<?php echo e(route('cheques.import.form')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Import')); ?>" data-title="<?php echo e(__('Import Cheques')); ?>" class="btn btn-sm btn-secondary me-2">
                <i class="ti ti-upload"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('export cheque')): ?>
            <a href="<?php echo e(route('cheques.export')); ?>" class="btn btn-sm btn-secondary me-2" data-bs-toggle="tooltip" title="<?php echo e(__('Export')); ?>">
                <i class="ti ti-download"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create cheque')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('cheques.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Cheque')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Cheque')); ?></th>
                                <th><?php echo e(__('Bank')); ?></th>
                                <th><?php echo e(__('Issue Date')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Status Date')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $cheques; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cheque): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div><?php echo e($cheque->cheque_number ?? '-'); ?></div>
                                        <small class="text-muted"><?php echo e($cheque->beneficiary_name); ?></small>
                                    </td>
                                    <td><?php echo e($cheque->bank_name ?? '-'); ?></td>
                                    <td><?php echo e(\Auth::user()->dateFormat($cheque->issue_date)); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($cheque->amount)); ?></td>
                                    <td><?php echo e(ucfirst($cheque->status)); ?></td>
                                    <td><?php echo e($cheque->status_date ? \Auth::user()->dateFormat($cheque->status_date) : '-'); ?></td>
                                    <td>
                                        <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('print cheque')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="<?php echo e(route('cheques.print', $cheque->id)); ?>" class="mx-3 btn btn-sm align-items-center bg-secondary" target="_blank" data-bs-toggle="tooltip" title="<?php echo e(__('Print')); ?>">
                                                        <i class="ti ti-printer text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit cheque')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bg-info" data-url="<?php echo e(route('cheques.edit', $cheque->id)); ?>" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Cheque')); ?>">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete cheque')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['cheques.destroy', $cheque->id],'id'=>'delete-form-'.$cheque->id]); ?>

                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($cheque->id); ?>').submit();">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </span>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/cheque/index.blade.php ENDPATH**/ ?>
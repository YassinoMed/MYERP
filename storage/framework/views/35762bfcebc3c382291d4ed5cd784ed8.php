<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Contract')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Contract')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage contract')): ?>
            <a href="<?php echo e(route('contract.index')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('List View')); ?>"
                class="btn btn-sm bg-light-blue-subtitle">
                <i class="ti ti-list"></i>
            </a>
        <?php endif; ?>
        <?php if(\Auth::user()->type == 'company'): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('contract.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Create New Contract')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xxl-3 col-lg-4 col-sm-6 col-12 mb-4">
                <div class="card h-100 mb-0">
                    <div class="card-header d-flex align-items-center gap-2 justify-content-between p-3">
                        <h6 class="mb-0"><a href="<?php echo e(route('contract.show', $contract->id)); ?>"
                                class="dashboard-link"><?php echo e($contract->subject); ?></a></h6>
                        <?php if(\Auth::user()->type == 'company'): ?>
                            <div class="btn-group card-option">
                                <button type="button" class="btn p-0 border-0" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu icon-dropdown dropdown-menu-end">
                                    <a href="#!" data-size="lg" data-url="<?php echo e(route('contract.edit', $contract->id)); ?>"
                                        data-ajax-popup="true" class="dropdown-item"
                                        data-bs-original-title="<?php echo e(__('Edit User')); ?>">
                                        <i class="ti ti-pencil"></i>
                                        <span><?php echo e(__('Edit')); ?></span>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['contract.destroy', $contract->id]]); ?>

                                    <a href="#!" class="dropdown-item bs-pass-para">
                                        <i class="ti ti-trash"></i>
                                        <span> <?php echo e(__('Delete')); ?></span>
                                    </a>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body p-3 text-center">
                        <p class="mb-0 f-w-500 text-dark">
                            <?php echo e($contract->description); ?>

                        </p>
                    </div>
                    <div class="card-footer py-0 p-3">
                        <ul class="list-group list-group-flush">
                            <?php if(\Auth::user()->type != 'client'): ?>
                                <li class="list-group-item px-0 border-0 pb-0">
                                    <div class="d-flex align-items-center justify-content-center gap-2 f-w-600 client-name">
                                        <span><?php echo e(__('Client')); ?>:</span>
                                        <?php echo e(!empty($contract->clients) ? $contract->clients->name : ''); ?>

                                    </div>
                                </li>
                            <?php endif; ?>
                            <li class="list-group-item px-0 d-flex justify-content-between">
                                <div class="d-flex align-items-center justify-content-between gap-2 flex-column">
                                    <span><?php echo e(__('Contract Type')); ?>:</span>
                                    <span
                                        class="badge status_badge bg-secondary p-2 rounded"><?php echo e(!empty($contract->types) ? $contract->types->name : ''); ?></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between gap-2 flex-column">
                                    <span><?php echo e(__('Contract Value')); ?>:</span>
                                    <span
                                        class="badge status_badge bg-secondary p-2 rounded"><?php echo e(\Auth::user()->priceFormat($contract->value)); ?></span>
                                </div>
                            </li>

                            <li class="list-group-item px-0">
                                <div class="d-flex align-items-center justify-content-between gap-2">
                                    <div>
                                        <small><?php echo e(__('Start Date')); ?>:</small>
                                        <div class="h6 mt-1 mb-0"><?php echo e(\Auth::user()->dateFormat($contract->start_date)); ?>

                                        </div>
                                    </div>
                                    <div>
                                        <small><?php echo e(__('End Date')); ?>:</small>
                                        <div class="h6 mt-1 mb-0"><?php echo e(\Auth::user()->dateFormat($contract->end_date)); ?>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/contract/grid.blade.php ENDPATH**/ ?>
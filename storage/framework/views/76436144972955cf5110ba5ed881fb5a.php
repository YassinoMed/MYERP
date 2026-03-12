<?php $__env->startPush('script-page'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Support')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0 "><?php echo e(__('Support')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Support')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if(\Auth::user()->type == 'company'): ?>
            <a href="<?php echo e(route('support-categories.index')); ?>" class="btn btn-sm btn-primary-subtle me-1"
                data-bs-toggle="tooltip" title="<?php echo e(__('Categories')); ?>">
                <i class="ti ti-category"></i>
            </a>
        <?php endif; ?>
        <a href="<?php echo e(route('support.index')); ?>" class="btn btn-sm btn-primary-subtle me-1" data-bs-toggle="tooltip" title="<?php echo e(__('List View')); ?>">
            <i class="ti ti-list"></i>
        </a>

        <a href="#" data-size="lg" data-url="<?php echo e(route('support.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Support')); ?>" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(count($supports) > 0): ?>
            <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xxl-3 col-lg-4 col-sm-6 mb-4">
                    <div class="support-user-card d-flex flex-column h-100">
                        <div class="user-info-wrp d-flex flex-1 align-items-center gap-3 border-bottom pb-3 mb-3">
                            <div class="user-image rounded-1 border-1 border border-primary">
                                <img alt=""
                                    <?php if(!empty($support->createdBy) && !empty($support->createdBy->avatar)): ?> src="<?php echo e(asset(Storage::url('uploads/avatar')) . '/' . $support->createdBy->avatar); ?>" <?php else: ?>  src="<?php echo e(asset(Storage::url('uploads/avatar')) . '/avatar.png'); ?>" <?php endif; ?>
                                    height="100%" width="100%">
                                <?php if($support->replyUnread() > 0): ?>
                                    <span class="avatar-child avatar-badge bg-success"></span>
                                <?php endif; ?>
                            </div>
                            <div class="user-info d-flex align-items-center flex-1">
                                <div class="user-content flex-1">
                                    <h5 class="mb-1">
                                        <a href="<?php echo e(route('support.reply', \Crypt::encrypt($support->id))); ?>"
                                            class="dashboard-link"><?php echo e(!empty($support->createdBy) ? $support->createdBy->name : ''); ?></a>
                                    </h5>
                                    <span class="text-sm text-muted text-break"><?php echo e($support->subject); ?></span>
                                </div>
                                <?php if(!empty($support->attachment)): ?>
                                    <a href="<?php echo e(asset(Storage::url('uploads/supports')) . '/' . $support->attachment); ?>"
                                        download="" class="btn btn-sm btn-light shadow" target="_blank"
                                        data-bs-toggle="tooltip" title="<?php echo e(__('Download')); ?>">
                                        <span class="btn-inner--icon"><i class="ti ti-download"></i></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div
                            class="project-info-wrp d-flex align-items-center justify-content-between gap-3 border-bottom pb-3 mb-3">
                            <div class="project-info flex-1 f-w-600">
                                <span class="text-muted"><?php echo e(__('Code: ')); ?></span>
                                <span><?php echo e($support->ticket_code); ?></span>
                            </div>
                            <div class="project-info flex-1 text-end f-w-600">
                                <span class="text-muted"><?php echo e(__('Priority: ')); ?></span>
                                <?php if($support->priority == 0): ?>
                                    <span
                                        class="badge bg-primary p-1 px-2"><?php echo e(__(\App\Models\Support::$priority[$support->priority])); ?></span>
                                <?php elseif($support->priority == 1): ?>
                                    <span
                                        class="badge bg-info p-1 px-2"><?php echo e(__(\App\Models\Support::$priority[$support->priority])); ?></span>
                                <?php elseif($support->priority == 2): ?>
                                    <span
                                        class="badge bg-warning p-1 px-2"><?php echo e(__(\App\Models\Support::$priority[$support->priority])); ?></span>
                                <?php elseif($support->priority == 3): ?>
                                    <span
                                        class="badge bg-danger p-1 px-2"><?php echo e(__(\App\Models\Support::$priority[$support->priority])); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if(!empty($support->category)): ?>
                            <div class="mb-3">
                                <span class="text-muted"><?php echo e(__('Category: ')); ?></span>
                                <span class="badge text-white" style="background-color: <?php echo e($support->category->color); ?>;">
                                    <?php echo e($support->category->name); ?>

                                </span>
                            </div>
                        <?php endif; ?>
                        <div class="date-wrp d-flex flex-wrap align-items-center justify-content-between gap-2">
                            <div class="date d-flex align-items-center gap-2">
                                <div class="date-icon d-flex align-items-center justify-content-center">
                                    <i class="ti ti-calendar text-white"></i>
                                </div>
                                <span class="text-sm"><?php echo e(\Auth::user()->dateFormat($support->created_at)); ?></span>
                            </div>
                            <div class="action-btn-wrp d-flex align-items-center gap-2">
                                <a href="<?php echo e(route('support.reply', \Crypt::encrypt($support->id))); ?>"
                                    data-title="<?php echo e(__('Support Reply')); ?>"
                                    class="btn btn-sm bg-warning" data-bs-toggle="tooltip"
                                    title="<?php echo e(__('Reply')); ?>" data-original-title="<?php echo e(__('Reply')); ?>">
                                    <i class="ti ti-corner-up-left text-white"></i>
                                </a>
                                <?php if(\Auth::user()->id == $support->ticket_created): ?>
                                    <a href="#" data-size="lg"
                                        data-url="<?php echo e(route('support.edit', $support->id)); ?>"
                                        data-ajax-popup="true" data-title="<?php echo e(__('Edit Support')); ?>"
                                        class="btn btn-sm bg-info"
                                        data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                        data-original-title="<?php echo e(__('Edit')); ?>">
                                        <i class="ti ti-pencil text-white"></i>
                                    </a>
                                    <?php echo Form::open([
                                        'method' => 'DELETE',
                                        'route' => ['support.destroy', $support->id],
                                        'id' => 'delete-form-' . $support->id,
                                    ]); ?>

                                    <a href="#!"
                                        class="btn btn-sm bs-pass-para bg-danger"
                                        data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                        data-original-title="<?php echo e(__('Delete')); ?>"
                                        data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($support->id); ?>').submit();">
                                        <i class="ti ti-trash text-white"></i>
                                    </a>
                                    <?php echo Form::close(); ?>

                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center">
                <i class="fas fa-folder-open text-primary fs-40"></i>
                <h3><?php echo e(__('Opps...')); ?></h3>
                <h6> <?php echo __('No Data Found'); ?> </h6>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/support/grid.blade.php ENDPATH**/ ?>
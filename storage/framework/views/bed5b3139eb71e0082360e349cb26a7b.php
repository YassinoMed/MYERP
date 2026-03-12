<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('ITSM Ticket')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('internal-itsm.index')); ?>"><?php echo e(__('Internal ITSM')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($ticket->ticket_code); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Ticket Details')); ?></h5></div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-12"><strong><?php echo e($ticket->subject); ?></strong><div class="text-muted"><?php echo e($ticket->description); ?></div></div>
                        <div class="col-md-6"><strong><?php echo e(__('Type')); ?>:</strong> <?php echo e(ucfirst(str_replace('_', ' ', $ticket->ticket_type ?: '-'))); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e($ticket->status); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Priority')); ?>:</strong> <?php echo e($ticket->priority); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Assignee')); ?>:</strong> <?php echo e(optional($ticket->assignUser)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Impact')); ?>:</strong> <?php echo e(ucfirst($ticket->impact_level ?: '-')); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Urgency')); ?>:</strong> <?php echo e(ucfirst($ticket->urgency_level ?: '-')); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Category')); ?>:</strong> <?php echo e(optional($ticket->category)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('CI')); ?>:</strong> <?php echo e(optional($ticket->configurationItem)->name ?: '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Due')); ?>:</strong> <?php echo e($ticket->resolution_due_at ? Auth::user()->dateFormat($ticket->resolution_due_at) : '-'); ?></div>
                        <div class="col-md-6"><strong><?php echo e(__('Resolved')); ?>:</strong> <?php echo e($ticket->resolved_at ? Auth::user()->dateFormat($ticket->resolved_at) : '-'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><h5 class="mb-0"><?php echo e(__('Replies')); ?></h5></div>
                <div class="card-body">
                    <div class="d-flex flex-column gap-3 mb-4">
                        <?php $__empty_0 = true; $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <div class="border rounded p-3">
                                <strong><?php echo e(optional($reply->users)->name ?: __('Unknown')); ?></strong>
                                <div class="text-muted small"><?php echo e(optional($reply->created_at)->diffForHumans()); ?></div>
                                <div class="mt-2"><?php echo e($reply->description); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <div class="text-muted"><?php echo e(__('No replies yet.')); ?></div>
                        <?php endif; ?>
                    </div>
                    <?php echo e(Form::open(['route' => ['internal-itsm.reply', $ticket->id], 'method' => 'post'])); ?>

                    <div class="form-group">
                        <?php echo e(Form::label('description', __('Post Reply'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                    <div class="text-end mt-3"><input type="submit" value="<?php echo e(__('Send Reply')); ?>" class="btn btn-primary"></div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/internal_itsm/show.blade.php ENDPATH**/ ?>
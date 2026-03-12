<div class="modal-body">
    <div class="row text-sm">
        <div class="col-md-4">
            <div class="mb-4">
                <b><?php echo e(__('Status')); ?></b>
                <?php if($task->status): ?>
                    <div class="badge status_badge badge-pill badge-success mb-1"><?php echo e(__(\App\Models\DealTask::$status[$task->status])); ?></div>
                <?php else: ?>
                    <div class="badge status_badge badge-pill badge-warning mb-1"><?php echo e(__(\App\Models\DealTask::$status[$task->status])); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <b><?php echo e(__('Priority')); ?></b>
                <p><?php echo e(__(\App\Models\DealTask::$priorities[$task->priority])); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <b><?php echo e(__('Deal Name')); ?></b>
                <p><?php echo e($deal->name); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <b><?php echo e(__('Date')); ?></b>
                <p><?php echo e(Auth::user()->dateFormat($task->date)); ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-4">
                <b><?php echo e(__('Time')); ?></b>
                <p><?php echo e(Auth::user()->timeFormat($task->time)); ?></p>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-0">
                <b><?php echo e(__('Asigned')); ?></b>
                <p class="mt-2">
                    <?php $__currentLoopData = $deal->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="#" class="btn btn-sm mr-1 p-0 rounded-circle">
                            <img alt="image" data-toggle="tooltip" data-original-title="<?php echo e($user->name); ?>" title="<?php echo e($user->name); ?>" <?php if($user->avatar): ?> src="<?php echo e(asset('/storage/uploads/avatar/'.$user->avatar)); ?>" <?php else: ?> src="<?php echo e(asset('/storage/uploads/avatar/avatar.png')); ?>" <?php endif; ?> class="rounded-circle" width="25" height="25">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
            </div>
        </div>
    </div>
</div>


<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/deals/tasksShow.blade.php ENDPATH**/ ?>
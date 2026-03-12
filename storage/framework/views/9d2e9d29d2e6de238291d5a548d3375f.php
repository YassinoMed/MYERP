<?php $__env->startSection('page-title', __('Edit Initiative')); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('ppm-portfolios.index')); ?>"><?php echo e(__('Portfolio Management')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit Initiative')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="<?php echo e(route('ppm-initiatives.update', $ppmInitiative)); ?>">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Name')); ?></label><input type="text" name="name" class="form-control" value="<?php echo e(old('name', $ppmInitiative->name)); ?>" required></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Project')); ?></label><select name="project_id" class="form-control"><option value=""><?php echo e(__('Linked project')); ?></option><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectId => $projectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($projectId); ?>" <?php if(old('project_id', $ppmInitiative->project_id) == $projectId): echo 'selected'; endif; ?>><?php echo e($projectName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Sponsor')); ?></label><select name="sponsor_id" class="form-control"><option value=""><?php echo e(__('Select sponsor')); ?></option><?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ownerId => $ownerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($ownerId); ?>" <?php if(old('sponsor_id', $ppmInitiative->sponsor_id) == $ownerId): echo 'selected'; endif; ?>><?php echo e($ownerName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Status')); ?></label><select name="status" class="form-control"><?php $__currentLoopData = $initiativeStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($statusKey); ?>" <?php if(old('status', $ppmInitiative->status) == $statusKey): echo 'selected'; endif; ?>><?php echo e(__($statusLabel)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Health')); ?></label><select name="health_status" class="form-control"><?php $__currentLoopData = $healthStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($statusKey); ?>" <?php if(old('health_status', $ppmInitiative->health_status) == $statusKey): echo 'selected'; endif; ?>><?php echo e(__($statusLabel)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Budget')); ?></label><input type="number" step="0.01" name="budget" class="form-control" value="<?php echo e(old('budget', $ppmInitiative->budget)); ?>"></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Target')); ?></label><input type="number" step="0.01" name="target_value" class="form-control" value="<?php echo e(old('target_value', $ppmInitiative->target_value)); ?>"></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Achieved')); ?></label><input type="number" step="0.01" name="achieved_value" class="form-control" value="<?php echo e(old('achieved_value', $ppmInitiative->achieved_value)); ?>"></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('Start date')); ?></label><input type="date" name="start_date" class="form-control" value="<?php echo e(old('start_date', $ppmInitiative->start_date)); ?>"></div>
                    <div class="col-md-3 mb-3"><label class="form-label"><?php echo e(__('End date')); ?></label><input type="date" name="end_date" class="form-control" value="<?php echo e(old('end_date', $ppmInitiative->end_date)); ?>"></div>
                    <div class="col-md-12 mb-3"><label class="form-label"><?php echo e(__('Description')); ?></label><textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $ppmInitiative->description)); ?></textarea></div>
                </div>
                <div class="text-end"><a href="<?php echo e(route('ppm-portfolios.show', $ppmInitiative->ppm_portfolio_id)); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a><button type="submit" class="btn btn-primary"><?php echo e(__('Save changes')); ?></button></div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/ppm_portfolios/edit_initiative.blade.php ENDPATH**/ ?>
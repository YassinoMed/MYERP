<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><?php echo e(__('Name')); ?></label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $ppmPortfolio->name ?? '')); ?>" required>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Owner')); ?></label>
        <select name="owner_id" class="form-control">
            <option value=""><?php echo e(__('Select owner')); ?></option>
            <?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ownerId => $ownerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($ownerId); ?>" <?php if(old('owner_id', $ppmPortfolio->owner_id ?? '') == $ownerId): echo 'selected'; endif; ?>><?php echo e($ownerName); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Status')); ?></label>
        <select name="status" class="form-control" required>
            <?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($statusKey); ?>" <?php if(old('status', $ppmPortfolio->status ?? 'active') == $statusKey): echo 'selected'; endif; ?>><?php echo e(__($statusLabel)); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Priority')); ?></label>
        <input type="text" name="priority" class="form-control" value="<?php echo e(old('priority', $ppmPortfolio->priority ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Start date')); ?></label>
        <input type="date" name="start_date" class="form-control" value="<?php echo e(old('start_date', $ppmPortfolio->start_date ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('End date')); ?></label>
        <input type="date" name="end_date" class="form-control" value="<?php echo e(old('end_date', $ppmPortfolio->end_date ?? '')); ?>">
    </div>
    <div class="col-md-12 mb-3">
        <label class="form-label"><?php echo e(__('Description')); ?></label>
        <textarea name="description" class="form-control" rows="4"><?php echo e(old('description', $ppmPortfolio->description ?? '')); ?></textarea>
    </div>
</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/ppm_portfolios/_form.blade.php ENDPATH**/ ?>
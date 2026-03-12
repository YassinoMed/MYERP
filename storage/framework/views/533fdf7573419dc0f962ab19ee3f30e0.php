<?php $__env->startSection('page-title', $ppmPortfolio->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('ppm-portfolios.index')); ?>"><?php echo e(__('Portfolio Management')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($ppmPortfolio->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit ppm portfolio')): ?>
            <a href="<?php echo e(route('ppm-portfolios.edit', $ppmPortfolio)); ?>" class="btn btn-sm btn-info me-2"><i class="ti ti-pencil"></i></a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Initiatives')); ?></span><strong class="ux-kpi-value"><?php echo e($ppmPortfolio->initiatives->count()); ?></strong><span class="ux-kpi-meta"><?php echo e(__('portfolio workload')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Budget')); ?></span><strong class="ux-kpi-value"><?php echo e(Auth::user()->priceFormat($ppmPortfolio->initiatives->sum('budget'))); ?></strong><span class="ux-kpi-meta"><?php echo e(__('tracked across initiatives')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('At risk')); ?></span><strong class="ux-kpi-value"><?php echo e($ppmPortfolio->initiatives->where('health_status', 'red')->count()); ?></strong><span class="ux-kpi-meta"><?php echo e(__('items needing intervention')); ?></span></div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5><?php echo e(__('Portfolio Summary')); ?></h5>
                    <p class="text-muted mb-2"><?php echo e($ppmPortfolio->description ?: __('No description provided.')); ?></p>
                    <div><strong><?php echo e(__('Owner')); ?>:</strong> <?php echo e(optional($ppmPortfolio->owner)->name ?: '-'); ?></div>
                    <div><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst(str_replace('_', ' ', $ppmPortfolio->status)))); ?></div>
                    <div><strong><?php echo e(__('Priority')); ?>:</strong> <?php echo e($ppmPortfolio->priority ?: '-'); ?></div>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create ppm initiative')): ?>
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo e(__('Add Initiative')); ?></h5>
                        <form method="POST" action="<?php echo e(route('ppm-initiatives.store', $ppmPortfolio)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3"><label class="form-label"><?php echo e(__('Name')); ?></label><input type="text" name="name" class="form-control" required></div>
                            <div class="mb-3"><label class="form-label"><?php echo e(__('Project')); ?></label><select name="project_id" class="form-control"><option value=""><?php echo e(__('Linked project')); ?></option><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectId => $projectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($projectId); ?>"><?php echo e($projectName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                            <div class="mb-3"><label class="form-label"><?php echo e(__('Sponsor')); ?></label><select name="sponsor_id" class="form-control"><option value=""><?php echo e(__('Select sponsor')); ?></option><?php $__currentLoopData = $owners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ownerId => $ownerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($ownerId); ?>"><?php echo e($ownerName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                            <div class="row">
                                <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Status')); ?></label><select name="status" class="form-control"><?php $__currentLoopData = $initiativeStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($statusKey); ?>"><?php echo e(__($statusLabel)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                                <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Health')); ?></label><select name="health_status" class="form-control"><?php $__currentLoopData = $healthStatuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statusKey => $statusLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($statusKey); ?>"><?php echo e(__($statusLabel)); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Budget')); ?></label><input type="number" step="0.01" name="budget" class="form-control"></div>
                                <div class="col-md-6 mb-3"><label class="form-label"><?php echo e(__('Achieved')); ?></label><input type="number" step="0.01" name="achieved_value" class="form-control"></div>
                            </div>
                            <div class="mb-3"><label class="form-label"><?php echo e(__('Target value')); ?></label><input type="number" step="0.01" name="target_value" class="form-control"></div>
                            <div class="mb-3"><label class="form-label"><?php echo e(__('Description')); ?></label><textarea name="description" class="form-control" rows="3"></textarea></div>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Add initiative')); ?></button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-8">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Initiative')); ?></th><th><?php echo e(__('Sponsor')); ?></th><th><?php echo e(__('Delivery')); ?></th><th><?php echo e(__('Budget')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
                            <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $ppmPortfolio->initiatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $initiative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><div><?php echo e($initiative->name); ?></div><small class="text-muted"><?php echo e(optional($initiative->project)->project_name ?: __('No linked project')); ?></small></td>
                                    <td><?php echo e(optional($initiative->sponsor)->name ?: '-'); ?></td>
                                    <td><span class="badge bg-info"><?php echo e(__(ucfirst(str_replace('_', ' ', $initiative->status)))); ?></span> <span class="badge bg-secondary"><?php echo e(__(ucfirst($initiative->health_status))); ?></span></td>
                                    <td><?php echo e(Auth::user()->priceFormat($initiative->budget)); ?></td>
                                    <td class="Action">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit ppm initiative')): ?>
                                            <div class="action-btn me-2"><a href="<?php echo e(route('ppm-initiatives.edit', $initiative)); ?>" class="mx-3 btn btn-sm bg-info"><i class="ti ti-pencil text-white"></i></a></div>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete ppm initiative')): ?>
                                            <div class="action-btn">
                                                <form method="POST" action="<?php echo e(route('ppm-initiatives.destroy', $initiative)); ?>" id="delete-initiative-<?php echo e($initiative->id); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                    <a href="#" class="mx-3 btn btn-sm bg-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-initiative-<?php echo e($initiative->id); ?>').submit();"><i class="ti ti-trash text-white"></i></a>
                                                </form>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No initiatives created yet.')); ?></td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/ppm_portfolios/show.blade.php ENDPATH**/ ?>
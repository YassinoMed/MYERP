<?php $__env->startSection('page-title', __('Portfolio Management')); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Portfolio Management')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Consolidate strategic initiatives, sponsors and delivery risk from a single portfolio workspace.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create ppm portfolio')): ?>
            <a href="<?php echo e(route('ppm-portfolios.create')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Portfolios')); ?></span><strong class="ux-kpi-value"><?php echo e($portfolios->count()); ?></strong><span class="ux-kpi-meta"><?php echo e(__('active planning containers')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Initiatives')); ?></span><strong class="ux-kpi-value"><?php echo e($portfolios->sum('initiatives_count')); ?></strong><span class="ux-kpi-meta"><?php echo e(__('linked transformation items')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Owners assigned')); ?></span><strong class="ux-kpi-value"><?php echo e($portfolios->whereNotNull('owner_id')->count()); ?></strong><span class="ux-kpi-meta"><?php echo e(__('named sponsors')); ?></span></div>
    </div>

    <div class="card ux-list-card">
        <div class="card-body table-border-style">
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Portfolio')); ?></th>
                        <th><?php echo e(__('Owner')); ?></th>
                        <th><?php echo e(__('Status')); ?></th>
                        <th><?php echo e(__('Window')); ?></th>
                        <th><?php echo e(__('Initiatives')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <div><?php echo e($portfolio->name); ?></div>
                                <small class="text-muted"><?php echo e($portfolio->priority ?: __('No priority set')); ?></small>
                            </td>
                            <td><?php echo e(optional($portfolio->owner)->name ?: '-'); ?></td>
                            <td><span class="badge bg-info"><?php echo e(__(ucfirst(str_replace('_', ' ', $portfolio->status)))); ?></span></td>
                            <td><?php echo e($portfolio->start_date ? Auth::user()->dateFormat($portfolio->start_date) : '-'); ?> / <?php echo e($portfolio->end_date ? Auth::user()->dateFormat($portfolio->end_date) : '-'); ?></td>
                            <td><?php echo e($portfolio->initiatives_count); ?></td>
                            <td class="Action">
                                <div class="action-btn me-2"><a href="<?php echo e(route('ppm-portfolios.show', $portfolio)); ?>" class="mx-3 btn btn-sm bg-warning"><i class="ti ti-eye text-white"></i></a></div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit ppm portfolio')): ?>
                                    <div class="action-btn me-2"><a href="<?php echo e(route('ppm-portfolios.edit', $portfolio)); ?>" class="mx-3 btn btn-sm bg-info"><i class="ti ti-pencil text-white"></i></a></div>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete ppm portfolio')): ?>
                                    <div class="action-btn">
                                        <form method="POST" action="<?php echo e(route('ppm-portfolios.destroy', $portfolio)); ?>" id="delete-portfolio-<?php echo e($portfolio->id); ?>">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <a href="#" class="mx-3 btn btn-sm bg-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-portfolio-<?php echo e($portfolio->id); ?>').submit();"><i class="ti ti-trash text-white"></i></a>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/ppm_portfolios/index.blade.php ENDPATH**/ ?>
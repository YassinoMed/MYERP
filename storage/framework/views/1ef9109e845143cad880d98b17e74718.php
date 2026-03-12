<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('BOM')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('production.boms.index')); ?>"><?php echo e(__('Bill of Materials')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($bom->name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production bom')): ?>
            <a href="#" data-size="xl" data-url="<?php echo e(route('production.boms.edit', $bom->id)); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit BOM')); ?>"
                class="btn btn-sm btn-primary">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3"><?php echo e(__('Details')); ?></h5>
                    <div class="mb-2"><b><?php echo e(__('Product')); ?>:</b> <?php echo e($bom->product?->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Name')); ?>:</b> <?php echo e($bom->name); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Code')); ?>:</b> <?php echo e($bom->code); ?></div>
                    <div class="mb-2"><b><?php echo e(__('Active Version')); ?>:</b> <?php echo e($bom->activeVersion?->version); ?></div>
                </div>
            </div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production bom')): ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3"><?php echo e(__('Create Version')); ?></h5>
                        <?php echo e(Form::open(['route' => ['production.boms.versions.store', $bom->id], 'method' => 'POST', 'class' => 'needs-validation', 'novalidate'])); ?>

                        <div class="form-group">
                            <?php echo e(Form::label('version', __('Version'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                            <?php echo e(Form::text('version', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Version')])); ?>

                        </div>
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class="mb-3"><?php echo e(__('Versions')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Version')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Components')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bom->versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($version->version); ?></td>
                                        <td>
                                            <?php if($version->is_active): ?>
                                                <span class="badge bg-success"><?php echo e(__('Active')); ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary"><?php echo e(__('Inactive')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($version->lines?->count() ?? 0); ?></td>
                                        <td>
                                            <?php if(!$version->is_active): ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit production bom')): ?>
                                                    <?php echo e(Form::open(['route' => ['production.boms.versions.activate', $bom->id, $version->id], 'method' => 'POST', 'class' => 'd-inline'])); ?>

                                                    <button type="submit"
                                                        class="btn btn-sm btn-primary"><?php echo e(__('Activate')); ?></button>
                                                    <?php echo e(Form::close()); ?>

                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class="mb-3"><?php echo e(__('Active Version Components')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Component')); ?></th>
                                    <th><?php echo e(__('Quantity')); ?></th>
                                    <th><?php echo e(__('Scrap %')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = ($bom->activeVersion?->lines ?? collect()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($line->component?->name); ?></td>
                                        <td><?php echo e($line->quantity); ?></td>
                                        <td><?php echo e($line->scrap_percent); ?></td>
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


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/boms/show.blade.php ENDPATH**/ ?>
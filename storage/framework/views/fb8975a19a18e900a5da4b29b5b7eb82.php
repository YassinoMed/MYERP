<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Traceability Network')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Traceability Network')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Visualize the upstream and downstream network of each lot with events, checks and export evidence.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card mb-4">
        <div class="card-body">
            <form method="get" action="<?php echo e(route('agri.traceability.network')); ?>" class="row">
                <div class="col-md-6">
                    <label class="form-label"><?php echo e(__('Lot')); ?></label>
                    <select name="lot_id" class="form-control" onchange="this.form.submit()">
                        <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($lot->id); ?>" <?php echo e($selectedLot && $selectedLot->id === $lot->id ? 'selected' : ''); ?>>
                                <?php echo e($lot->code); ?> - <?php echo e($lot->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </form>
        </div>
    </div>

    <?php if($selectedLot): ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><?php echo e(__('Upstream / Downstream Batches')); ?></h5></div>
                    <div class="card-body">
                        <h6><?php echo e(__('Transformations involving selected lot')); ?></h6>
                        <?php $__empty_0 = true; $__currentLoopData = $upstreamBatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <div class="border-bottom py-2">
                                <strong><?php echo e($batch->batch_number); ?></strong>
                                <div class="small text-muted">
                                    <?php echo e(optional($batch->inputLot)->code ?: '-'); ?> -> <?php echo e(optional($batch->outputLot)->code ?: '-'); ?> /
                                    <?php echo e($batch->process_step); ?> / <?php echo e($batch->processed_at?->format('Y-m-d H:i')); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <p class="text-muted mb-0"><?php echo e(__('No transformation chain found.')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0"><?php echo e(__('Export & Compliance')); ?></h5></div>
                    <div class="card-body">
                        <h6><?php echo e(__('Shipments')); ?></h6>
                        <?php $__empty_0 = true; $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <div class="border-bottom py-2">
                                <strong><?php echo e($shipment->shipment_ref); ?></strong>
                                <div class="small text-muted"><?php echo e($shipment->destination_country); ?> / <?php echo e($shipment->status); ?> / <?php echo e($shipment->departure_date?->format('Y-m-d')); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <p class="text-muted mb-3"><?php echo e(__('No shipment linked.')); ?></p>
                        <?php endif; ?>

                        <h6 class="mt-3"><?php echo e(__('Compliance Checks')); ?></h6>
                        <?php $__empty_0 = true; $__currentLoopData = $checks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <div class="border-bottom py-2">
                                <strong><?php echo e($check->control_type); ?></strong>
                                <div class="small text-muted"><?php echo e($check->result); ?> / <?php echo e($check->checked_at?->format('Y-m-d H:i')); ?> / <?php echo e($check->certificate_ref ?: '-'); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <p class="text-muted mb-0"><?php echo e(__('No compliance checks linked.')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Trace Timeline')); ?></h5></div>
            <div class="card-body">
                <?php $__empty_0 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                    <div class="border-bottom py-2">
                        <div class="d-flex justify-content-between">
                            <strong><?php echo e($event->step); ?></strong>
                            <span><?php echo e($event->occurred_at?->format('Y-m-d H:i')); ?></span>
                        </div>
                        <div class="small text-muted"><?php echo e($event->location ?: '-'); ?> / <?php echo e($event->actor ?: '-'); ?></div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                    <p class="text-muted mb-0"><?php echo e(__('No trace events found for this lot.')); ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/network.blade.php ENDPATH**/ ?>
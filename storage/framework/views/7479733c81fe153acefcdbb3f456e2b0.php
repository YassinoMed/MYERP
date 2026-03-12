<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Traceability')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Traceability')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track upstream origins, downstream transformations and export proofs for each agricultural lot.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Lot')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.traceability.lots.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Crop Type')); ?></label>
                            <input type="text" name="crop_type" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Source Reference')); ?></label>
                            <input type="text" name="source_reference" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Parcel Origin')); ?></label>
                            <input type="text" name="parcel_origin" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Harvest Date')); ?></label>
                            <input type="date" name="harvest_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Expiry Date')); ?></label>
                            <input type="date" name="expiry_date" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                            <input type="number" step="0.001" name="quantity" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Unit')); ?></label>
                            <input type="text" name="unit" class="form-control" value="kg">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Lot')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Trace Event')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.traceability.events.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control" required>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Step')); ?></label>
                            <input type="text" name="step" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Location')); ?></label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Actor')); ?></label>
                            <input type="text" name="actor" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Occurred At')); ?></label>
                            <input type="datetime-local" name="occurred_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Notes')); ?></label>
                            <textarea name="notes" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Add Event')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Certificate')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.traceability.certificates.issue')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control" required>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Issue Certificate')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="d-flex flex-wrap gap-2 mb-3">
                <a href="<?php echo e(route('agri.traceability.network')); ?>" class="btn btn-outline-primary"><?php echo e(__('Open Network View')); ?></a>
                <a href="<?php echo e(route('agri.reports.index')); ?>" class="btn btn-outline-secondary"><?php echo e(__('Open Agro Reports')); ?></a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Lots')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Crop')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($lot->code); ?></td>
                                    <td><?php echo e($lot->name); ?></td>
                                    <td><?php echo e($lot->crop_type); ?></td>
                                    <td><?php echo e($lot->quantity); ?> <?php echo e($lot->unit); ?></td>
                                    <td><?php echo e($lot->status); ?> / <?php echo e($lot->quality_status); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Events')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Lot')); ?></th>
                                <th><?php echo e(__('Step')); ?></th>
                                <th><?php echo e(__('Location')); ?></th>
                                <th><?php echo e(__('Occurred')); ?></th>
                                <th><?php echo e(__('Hash')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($event->lot_id); ?></td>
                                    <td><?php echo e($event->step); ?></td>
                                    <td><?php echo e($event->location); ?></td>
                                    <td><?php echo e($event->occurred_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e($event->current_hash); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Certificates')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Certificate')); ?></th>
                                <th><?php echo e(__('Lot')); ?></th>
                                <th><?php echo e(__('Issued At')); ?></th>
                                <th><?php echo e(__('Hash')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $certificates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certificate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($certificate->certificate_number); ?></td>
                                    <td><?php echo e($certificate->lot_id); ?></td>
                                    <td><?php echo e($certificate->issued_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e($certificate->verification_hash); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Trace Chain')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="get" action="<?php echo e(route('agri.traceability.index')); ?>" class="row mb-3">
                        <div class="col-md-6">
                            <select name="lot_id" class="form-control" onchange="this.form.submit()">
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>" <?php echo e($selectedLot && $selectedLot->id === $lot->id ? 'selected' : ''); ?>>
                                        <?php echo e($lot->code); ?> - <?php echo e($lot->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Step')); ?></th>
                                    <th><?php echo e(__('Occurred')); ?></th>
                                    <th><?php echo e(__('Prev Hash')); ?></th>
                                    <th><?php echo e(__('Hash')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $traceChain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($event->step); ?></td>
                                        <td><?php echo e($event->occurred_at?->format('Y-m-d H:i')); ?></td>
                                        <td><?php echo e($event->previous_hash); ?></td>
                                        <td><?php echo e($event->current_hash); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if($selectedLot): ?>
                        <div class="mt-4">
                            <h6><?php echo e(__('Selected Lot Context')); ?></h6>
                            <div class="small text-muted mb-2">
                                <?php echo e(__('Source')); ?>: <?php echo e($selectedLot->source_reference ?: '-'); ?> /
                                <?php echo e(__('Parcel')); ?>: <?php echo e($selectedLot->parcel_origin ?: '-'); ?> /
                                <?php echo e(__('Expiry')); ?>: <?php echo e(optional($selectedLot->expiry_date)->format('Y-m-d') ?: '-'); ?>

                            </div>
                            <?php $__currentLoopData = $coldAlerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-warning py-2">
                                    <?php echo e($alert['message']); ?> <?php echo e(optional($alert['expiry_date'])->format('Y-m-d')); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Upstream / Downstream')); ?></h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6><?php echo e(__('Upstream Batches')); ?></h6>
                            <?php $__empty_0 = true; $__currentLoopData = $upstreamBatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <div class="border-bottom py-2">
                                    <strong><?php echo e($batch->batch_number); ?></strong>
                                    <div class="small text-muted"><?php echo e(optional($batch->inputLot)->code ?? '-'); ?> -> <?php echo e(optional($batch->outputLot)->code ?? '-'); ?></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <p class="text-muted"><?php echo e(__('No upstream transformation.')); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <h6><?php echo e(__('Downstream Batches')); ?></h6>
                            <?php $__empty_0 = true; $__currentLoopData = $downstreamBatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <div class="border-bottom py-2">
                                    <strong><?php echo e($batch->batch_number); ?></strong>
                                    <div class="small text-muted"><?php echo e(optional($batch->inputLot)->code ?? '-'); ?> -> <?php echo e(optional($batch->outputLot)->code ?? '-'); ?></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <p class="text-muted"><?php echo e(__('No downstream transformation.')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Compliance & Export')); ?></h5></div>
                <div class="card-body">
                    <div class="table-responsive mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Control')); ?></th>
                                    <th><?php echo e(__('Result')); ?></th>
                                    <th><?php echo e(__('Checked At')); ?></th>
                                    <th><?php echo e(__('Certificate')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_0 = true; $__currentLoopData = $complianceChecks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                    <tr>
                                        <td><?php echo e($check->control_type); ?></td>
                                        <td><?php echo e(ucfirst($check->result)); ?></td>
                                        <td><?php echo e($check->checked_at?->format('Y-m-d H:i')); ?></td>
                                        <td><?php echo e($check->certificate_ref ?: '-'); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                    <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No compliance checks for this lot.')); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Shipment')); ?></th>
                                    <th><?php echo e(__('Country')); ?></th>
                                    <th><?php echo e(__('Qty')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_0 = true; $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                    <tr>
                                        <td><?php echo e($shipment->shipment_ref); ?></td>
                                        <td><?php echo e($shipment->destination_country); ?></td>
                                        <td><?php echo e($shipment->shipped_quantity); ?></td>
                                        <td><?php echo e(ucfirst($shipment->status)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                    <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No export movement for this lot.')); ?></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/traceability.blade.php ENDPATH**/ ?>
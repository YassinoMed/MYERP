<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Agri Operations')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Agri Operations')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Run weighing, cold chain, transformation and export execution from a single agro operations desk.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Weighings')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($weighings->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('recent lot entries')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Cold storage')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($coldStorages->where('status', 'stored')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('lots currently stored')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Export shipments')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($exportShipments->whereIn('status', ['ready', 'shipped'])->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('ready or in transit')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('FEFO alerts')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($fefoAlerts->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('lots approaching expiry')); ?></span>
        </div>
    </div>
    <div class="mb-3">
        <a href="<?php echo e(route('agri.operations.fefo')); ?>" class="btn btn-outline-danger"><?php echo e(__('Open FEFO Board')); ?></a>
        <a href="<?php echo e(route('agri.reports.index')); ?>" class="btn btn-outline-primary"><?php echo e(__('Open Agri Reports')); ?></a>
        <a href="<?php echo e(route('agri.planning.dashboard')); ?>" class="btn btn-outline-dark"><?php echo e(__('Agriculture Dashboard')); ?></a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Weighing Ticket')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.operations.weighings.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control">
                                <option value=""><?php echo e(__('Select lot')); ?></option>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cooperative')); ?></label>
                            <select name="cooperative_id" class="form-control">
                                <option value=""><?php echo e(__('Select cooperative')); ?></option>
                                <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cooperative->id); ?>"><?php echo e($cooperative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Producer')); ?></label>
                            <input type="text" name="producer_name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Gross')); ?></label>
                                <input type="number" step="0.001" name="gross_weight" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Tare')); ?></label>
                                <input type="number" step="0.001" name="tare_weight" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Moisture %')); ?></label>
                                <input type="number" step="0.01" name="moisture_percent" class="form-control" value="0">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Quality grade')); ?></label>
                                <input type="text" name="quality_grade" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Weighing date')); ?></label>
                            <input type="date" name="weighing_date" class="form-control" required value="<?php echo e(date('Y-m-d')); ?>">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Record Weighing')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Cold Storage Entry')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.operations.cold-storage.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control">
                                <option value=""><?php echo e(__('Select lot')); ?></option>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Facility')); ?></label>
                            <input type="text" name="facility_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Chamber')); ?></label>
                            <input type="text" name="chamber_name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Temp')); ?></label>
                                <input type="number" step="0.01" name="temperature" class="form-control">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Humidity')); ?></label>
                                <input type="number" step="0.01" name="humidity" class="form-control">
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Qty')); ?></label>
                                <input type="number" step="0.001" name="quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Entry date')); ?></label>
                                <input type="date" name="entry_date" class="form-control" required value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Expiry')); ?></label>
                                <input type="date" name="expiry_date" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Storage Record')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Export Shipment')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.operations.export-shipments.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control">
                                <option value=""><?php echo e(__('Select lot')); ?></option>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Shipment ref')); ?></label>
                            <input type="text" name="shipment_ref" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Customer')); ?></label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Destination country')); ?></label>
                            <input type="text" name="destination_country" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Container')); ?></label>
                                <input type="text" name="container_no" class="form-control">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Incoterm')); ?></label>
                                <input type="text" name="incoterm" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Shipped qty')); ?></label>
                                <input type="number" step="0.001" name="shipped_quantity" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Departure')); ?></label>
                                <input type="date" name="departure_date" class="form-control" required value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Shipment')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Transformation Batch')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.operations.transformation-batches.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Input lot')); ?></label>
                            <select name="input_lot_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select lot')); ?></option>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Output lot code')); ?></label>
                                <input type="text" name="output_lot_code" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Output lot name')); ?></label>
                                <input type="text" name="output_lot_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Process step')); ?></label>
                            <input type="text" name="process_step" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Facility')); ?></label>
                            <input type="text" name="facility_name" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Input qty')); ?></label>
                                <input type="number" step="0.001" name="input_quantity" class="form-control" required>
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Output qty')); ?></label>
                                <input type="number" step="0.001" name="output_quantity" class="form-control" required>
                            </div>
                            <div class="col-md-4 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Waste qty')); ?></label>
                                <input type="number" step="0.001" name="waste_quantity" class="form-control" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Processed at')); ?></label>
                                <input type="datetime-local" name="processed_at" class="form-control" required value="<?php echo e(now()->format('Y-m-d\\TH:i')); ?>">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Expiry date')); ?></label>
                                <input type="date" name="expiry_date" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Record Transformation')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Compliance Check')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.operations.compliance-checks.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot')); ?></label>
                            <select name="lot_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select lot')); ?></option>
                                <?php $__currentLoopData = $lots; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lot->id); ?>"><?php echo e($lot->code); ?> - <?php echo e($lot->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Control type')); ?></label>
                                <input type="text" name="control_type" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Result')); ?></label>
                                <select name="result" class="form-control" required>
                                    <option value="pass"><?php echo e(__('Pass')); ?></option>
                                    <option value="warning"><?php echo e(__('Warning')); ?></option>
                                    <option value="fail"><?php echo e(__('Fail')); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Measured value')); ?></label>
                                <input type="text" name="measured_value" class="form-control">
                            </div>
                            <div class="col-md-6 form-group mb-3">
                                <label class="form-label"><?php echo e(__('Threshold value')); ?></label>
                                <input type="text" name="threshold_value" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Checked at')); ?></label>
                            <input type="datetime-local" name="checked_at" class="form-control" required value="<?php echo e(now()->format('Y-m-d\\TH:i')); ?>">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Compliance Check')); ?></button>
                        <a href="<?php echo e(route('agri.reports.index')); ?>" class="btn btn-outline-primary"><?php echo e(__('Reports')); ?></a>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Recent Weighings')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Date')); ?></th><th><?php echo e(__('Lot')); ?></th><th><?php echo e(__('Producer')); ?></th><th><?php echo e(__('Net')); ?></th><th><?php echo e(__('Grade')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_0 = true; $__currentLoopData = $weighings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weighing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <tr>
                                <td><?php echo e($weighing->weighing_date?->format('Y-m-d')); ?></td>
                                <td><?php echo e(optional($weighing->lot)->code ?? '-'); ?></td>
                                <td><?php echo e($weighing->producer_name ?: optional($weighing->cooperative)->name ?: '-'); ?></td>
                                <td><?php echo e($weighing->net_weight); ?></td>
                                <td><?php echo e($weighing->quality_grade ?: '-'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No weighings recorded yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Transformation Yield')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Batch')); ?></th><th><?php echo e(__('Input lot')); ?></th><th><?php echo e(__('Output lot')); ?></th><th><?php echo e(__('Yield')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_0 = true; $__currentLoopData = $transformationBatches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <tr>
                                <td><?php echo e($batch->batch_number); ?></td>
                                <td><?php echo e(optional($batch->inputLot)->code ?? '-'); ?></td>
                                <td><?php echo e(optional($batch->outputLot)->code ?? '-'); ?></td>
                                <td><?php echo e($batch->output_quantity); ?> / <?php echo e($batch->input_quantity); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No transformation batches yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Cold Chain Monitoring')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Lot')); ?></th><th><?php echo e(__('Facility')); ?></th><th><?php echo e(__('Temp')); ?></th><th><?php echo e(__('Qty')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_0 = true; $__currentLoopData = $coldStorages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <tr>
                                <td><?php echo e(optional($record->lot)->code ?? '-'); ?></td>
                                <td><?php echo e($record->facility_name); ?> / <?php echo e($record->chamber_name ?: '-'); ?></td>
                                <td><?php echo e($record->temperature ?? '-'); ?></td>
                                <td><?php echo e($record->quantity); ?></td>
                                <td><?php echo e(ucfirst($record->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No cold storage records yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Compliance & FEFO')); ?></h5></div>
                <div class="card-body">
                    <?php $__empty_0 = true; $__currentLoopData = $fefoAlerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="alert alert-warning py-2">
                            <?php echo e(optional($alert->lot)->code ?? '-'); ?>:
                            <?php echo e(__('expiry on')); ?> <?php echo e(optional($alert->expiry_date)->format('Y-m-d')); ?>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <p class="text-muted"><?php echo e(__('No FEFO alert in the next 14 days.')); ?></p>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table class="table">
                            <thead><tr><th><?php echo e(__('Lot')); ?></th><th><?php echo e(__('Control')); ?></th><th><?php echo e(__('Result')); ?></th><th><?php echo e(__('Checked')); ?></th></tr></thead>
                            <tbody>
                            <?php $__empty_0 = true; $__currentLoopData = $complianceChecks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                                <tr>
                                    <td><?php echo e(optional($check->lot)->code ?? '-'); ?></td>
                                    <td><?php echo e($check->control_type); ?></td>
                                    <td><?php echo e(ucfirst($check->result)); ?></td>
                                    <td><?php echo e($check->checked_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                                <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No compliance checks recorded yet.')); ?></td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Export Desk')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead><tr><th><?php echo e(__('Shipment')); ?></th><th><?php echo e(__('Country')); ?></th><th><?php echo e(__('Lot')); ?></th><th><?php echo e(__('Qty')); ?></th><th><?php echo e(__('Status')); ?></th></tr></thead>
                        <tbody>
                        <?php $__empty_0 = true; $__currentLoopData = $exportShipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <tr>
                                <td><?php echo e($shipment->shipment_ref); ?></td>
                                <td><?php echo e($shipment->destination_country); ?></td>
                                <td><?php echo e(optional($shipment->lot)->code ?? '-'); ?></td>
                                <td><?php echo e($shipment->shipped_quantity); ?></td>
                                <td><?php echo e(ucfirst($shipment->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No export shipments yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/operations.blade.php ENDPATH**/ ?>
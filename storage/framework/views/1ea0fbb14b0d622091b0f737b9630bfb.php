<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Crop Planning')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Crop Planning')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Parcel')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.planning.parcels.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Code')); ?></label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Area')); ?></label>
                            <input type="number" step="0.01" name="area" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Area Unit')); ?></label>
                            <input type="text" name="area_unit" class="form-control" value="ha">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Soil Type')); ?></label>
                            <input type="text" name="soil_type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Location')); ?></label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Parcel')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Crop Plan')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.planning.plans.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Parcel')); ?></label>
                            <select name="parcel_id" class="form-control" required>
                                <?php $__currentLoopData = $parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($parcel->id); ?>"><?php echo e($parcel->code); ?> - <?php echo e($parcel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Crop Name')); ?></label>
                            <input type="text" name="crop_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Variety')); ?></label>
                            <input type="text" name="variety" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Start Date')); ?></label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('End Date')); ?></label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Expected Yield')); ?></label>
                            <input type="number" step="0.001" name="expected_yield" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Yield Unit')); ?></label>
                            <input type="text" name="yield_unit" class="form-control" value="kg">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Plan')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Rotation Rule')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.planning.rotation.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Crop Name')); ?></label>
                            <input type="text" name="crop_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Follow Crop')); ?></label>
                            <input type="text" name="follow_crop_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Min Gap Days')); ?></label>
                            <input type="number" name="min_gap_days" class="form-control" value="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Recommendation')); ?></label>
                            <textarea name="recommendation" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Rule')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Weather Alert')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.planning.alerts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Parcel')); ?></label>
                            <select name="parcel_id" class="form-control">
                                <option value=""><?php echo e(__('All')); ?></option>
                                <?php $__currentLoopData = $parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($parcel->id); ?>"><?php echo e($parcel->code); ?> - <?php echo e($parcel->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Alert Type')); ?></label>
                            <input type="text" name="alert_type" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Severity')); ?></label>
                            <select name="severity" class="form-control">
                                <option value="low"><?php echo e(__('Low')); ?></option>
                                <option value="medium" selected><?php echo e(__('Medium')); ?></option>
                                <option value="high"><?php echo e(__('High')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Alert Date')); ?></label>
                            <input type="datetime-local" name="alert_date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Message')); ?></label>
                            <textarea name="message" class="form-control" rows="2" required></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Alert')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="d-flex flex-wrap gap-2 mb-3">
                <a href="<?php echo e(route('agri.planning.dashboard')); ?>" class="btn btn-outline-primary"><?php echo e(__('Open Agriculture Dashboard')); ?></a>
                <a href="<?php echo e(route('agri.operations.fefo')); ?>" class="btn btn-outline-secondary"><?php echo e(__('Review FEFO Queue')); ?></a>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Parcels')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Area')); ?></th>
                                <th><?php echo e(__('Soil')); ?></th>
                                <th><?php echo e(__('Location')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($parcel->code); ?></td>
                                    <td><?php echo e($parcel->name); ?></td>
                                    <td><?php echo e($parcel->area); ?> <?php echo e($parcel->area_unit); ?></td>
                                    <td><?php echo e($parcel->soil_type); ?></td>
                                    <td><?php echo e($parcel->location); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Crop Plans')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Parcel')); ?></th>
                                <th><?php echo e(__('Crop')); ?></th>
                                <th><?php echo e(__('Dates')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Yield')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($plan->parcel_id); ?></td>
                                    <td><?php echo e($plan->crop_name); ?></td>
                                    <td><?php echo e($plan->start_date?->format('Y-m-d')); ?> → <?php echo e($plan->end_date?->format('Y-m-d')); ?></td>
                                    <td><?php echo e($plan->status); ?></td>
                                    <td><?php echo e($plan->expected_yield); ?> <?php echo e($plan->yield_unit); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Rotation Recommendations')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="get" action="<?php echo e(route('agri.planning.index')); ?>" class="row mb-3">
                        <div class="col-md-6">
                            <select name="parcel_id" class="form-control" onchange="this.form.submit()">
                                <?php $__currentLoopData = $parcels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parcel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($parcel->id); ?>" <?php echo e($selectedParcel && $selectedParcel->id === $parcel->id ? 'selected' : ''); ?>>
                                        <?php echo e($parcel->code); ?> - <?php echo e($parcel->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Current Crop')); ?></th>
                                    <th><?php echo e(__('Next Crop')); ?></th>
                                    <th><?php echo e(__('Gap Days')); ?></th>
                                    <th><?php echo e(__('Recommendation')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $rotationRecommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($recommendation['crop_name']); ?></td>
                                        <td><?php echo e($recommendation['follow_crop_name']); ?></td>
                                        <td><?php echo e($recommendation['min_gap_days']); ?></td>
                                        <td><?php echo e($recommendation['recommendation']); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Weather Alerts')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Parcel')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Severity')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Message')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $weatherAlerts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($alert->parcel_id ?? __('All')); ?></td>
                                    <td><?php echo e($alert->alert_type); ?></td>
                                    <td><?php echo e($alert->severity); ?></td>
                                    <td><?php echo e($alert->alert_date?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e($alert->message); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/planning.blade.php ENDPATH**/ ?>
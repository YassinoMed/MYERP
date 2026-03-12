<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Yield Management')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Yield Management')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Pricing Rule')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.yield.rules.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Room Type')); ?></label>
                            <select name="room_type_id" class="form-control">
                                <option value=""><?php echo e(__('All')); ?></option>
                                <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($roomType->id); ?>"><?php echo e($roomType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Occupancy Threshold')); ?></label>
                            <input type="number" step="0.01" name="occupancy_threshold" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Min Rate')); ?></label>
                            <input type="number" step="0.01" name="min_rate" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Max Rate')); ?></label>
                            <input type="number" step="0.01" name="max_rate" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Margin')); ?></label>
                            <input type="number" step="0.01" name="margin" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Rule')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Demand Forecast')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('hotel.yield.forecasts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Room Type')); ?></label>
                            <select name="room_type_id" class="form-control" required>
                                <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($roomType->id); ?>"><?php echo e($roomType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Date')); ?></label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Demand Score')); ?></label>
                            <input type="number" step="0.01" name="demand_score" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Occupancy Rate')); ?></label>
                            <input type="number" step="0.01" name="occupancy_rate" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Seasonal Factor')); ?></label>
                            <input type="number" step="0.01" name="seasonal_factor" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Event Factor')); ?></label>
                            <input type="number" step="0.01" name="event_factor" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Forecast')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?php echo e(__('Price Recommendations')); ?></h5>
                    <form action="<?php echo e(route('hotel.yield.generate')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex gap-2">
                            <select name="room_type_id" class="form-control">
                                <option value=""><?php echo e(__('All Room Types')); ?></option>
                                <?php $__currentLoopData = $roomTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($roomType->id); ?>"><?php echo e($roomType->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="date" name="date" class="form-control">
                            <button class="btn btn-primary"><?php echo e(__('Generate')); ?></button>
                        </div>
                    </form>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Room Type')); ?></th>
                                <th><?php echo e(__('Rate Plan')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Recommended')); ?></th>
                                <th><?php echo e(__('Reason')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($recommendation->roomType?->name); ?></td>
                                    <td><?php echo e($recommendation->ratePlan?->name); ?></td>
                                    <td><?php echo e($recommendation->date?->format('Y-m-d')); ?></td>
                                    <td><?php echo e($recommendation->recommended_rate); ?></td>
                                    <td><?php echo e($recommendation->reason); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Pricing Rules')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Room Type')); ?></th>
                                <th><?php echo e(__('Min')); ?></th>
                                <th><?php echo e(__('Max')); ?></th>
                                <th><?php echo e(__('Margin')); ?></th>
                                <th><?php echo e(__('Occupancy')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $rules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($rule->name); ?></td>
                                    <td><?php echo e($rule->roomType?->name ?? __('All')); ?></td>
                                    <td><?php echo e($rule->min_rate); ?></td>
                                    <td><?php echo e($rule->max_rate); ?></td>
                                    <td><?php echo e($rule->margin); ?></td>
                                    <td><?php echo e($rule->occupancy_threshold); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/hotel/yield_management.blade.php ENDPATH**/ ?>
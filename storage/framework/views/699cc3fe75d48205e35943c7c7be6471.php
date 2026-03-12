<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Purchase Contracts')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Purchase Contracts')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Contract')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.contracts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cooperative')); ?></label>
                            <select name="cooperative_id" class="form-control">
                                <option value=""><?php echo e(__('Independent')); ?></option>
                                <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cooperative->id); ?>"><?php echo e($cooperative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Contract Number')); ?></label>
                            <input type="text" name="contract_number" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Buyer Name')); ?></label>
                            <input type="text" name="buyer_name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Crop Type')); ?></label>
                            <input type="text" name="crop_type" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                            <input type="number" step="0.001" name="quantity" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Unit')); ?></label>
                            <input type="text" name="unit" class="form-control" value="kg">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Fixed Price')); ?></label>
                            <input type="number" step="0.01" name="fixed_price" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Currency')); ?></label>
                            <input type="text" name="price_currency" class="form-control" value="USD">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Delivery Start')); ?></label>
                            <input type="date" name="delivery_start" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Delivery End')); ?></label>
                            <input type="date" name="delivery_end" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Hedge Ratio %')); ?></label>
                            <input type="number" step="0.01" name="hedge_ratio" class="form-control" value="0">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Contract')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Hedge Position')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.contracts.hedges.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Contract')); ?></label>
                            <select name="contract_id" class="form-control" required>
                                <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($contract->id); ?>"><?php echo e($contract->contract_number); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Instrument')); ?></label>
                            <input type="text" name="instrument" class="form-control" value="FUT">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Position Type')); ?></label>
                            <select name="position_type" class="form-control">
                                <option value="future"><?php echo e(__('Future')); ?></option>
                                <option value="option"><?php echo e(__('Option')); ?></option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Quantity')); ?></label>
                            <input type="number" step="0.001" name="quantity" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Price')); ?></label>
                            <input type="number" step="0.01" name="price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Opened At')); ?></label>
                            <input type="date" name="opened_at" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Hedge')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Price Index')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.contracts.price-indices.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Crop Type')); ?></label>
                            <input type="text" name="crop_type" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Market')); ?></label>
                            <input type="text" name="market" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Price')); ?></label>
                            <input type="number" step="0.01" name="price" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Currency')); ?></label>
                            <input type="text" name="currency" class="form-control" value="USD">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Recorded At')); ?></label>
                            <input type="datetime-local" name="recorded_at" class="form-control" required>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Index')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Contracts')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Contract')); ?></th>
                                <th><?php echo e(__('Buyer')); ?></th>
                                <th><?php echo e(__('Crop')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Delivery')); ?></th>
                                <th><?php echo e(__('Hedge %')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($contract->contract_number); ?></td>
                                    <td><?php echo e($contract->buyer_name); ?></td>
                                    <td><?php echo e($contract->crop_type); ?></td>
                                    <td><?php echo e($contract->quantity); ?> <?php echo e($contract->unit); ?></td>
                                    <td><?php echo e($contract->fixed_price); ?> <?php echo e($contract->price_currency); ?></td>
                                    <td><?php echo e($contract->delivery_start?->format('Y-m-d')); ?> → <?php echo e($contract->delivery_end?->format('Y-m-d')); ?></td>
                                    <td><?php echo e($contract->hedge_ratio); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Hedge Positions')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Contract')); ?></th>
                                <th><?php echo e(__('Instrument')); ?></th>
                                <th><?php echo e(__('Type')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $hedgePositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hedge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($hedge->contract_id); ?></td>
                                    <td><?php echo e($hedge->instrument); ?></td>
                                    <td><?php echo e($hedge->position_type); ?></td>
                                    <td><?php echo e($hedge->quantity); ?></td>
                                    <td><?php echo e($hedge->price); ?></td>
                                    <td><?php echo e($hedge->status); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Price Indices')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Crop')); ?></th>
                                <th><?php echo e(__('Market')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Recorded At')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $priceIndices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index->crop_type); ?></td>
                                    <td><?php echo e($index->market); ?></td>
                                    <td><?php echo e($index->price); ?> <?php echo e($index->currency); ?></td>
                                    <td><?php echo e($index->recorded_at?->format('Y-m-d H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/contracts.blade.php ENDPATH**/ ?>
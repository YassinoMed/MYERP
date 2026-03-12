<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Cooperatives')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Cooperatives')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Cooperative')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.cooperatives.store')); ?>" method="post">
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
                            <label class="form-label"><?php echo e(__('Region')); ?></label>
                            <input type="text" name="region" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Currency')); ?></label>
                            <input type="text" name="currency" class="form-control" value="USD">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Cooperative')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('New Member')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.cooperatives.members.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cooperative')); ?></label>
                            <select name="cooperative_id" class="form-control" required>
                                <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cooperative->id); ?>"><?php echo e($cooperative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Member Code')); ?></label>
                            <input type="text" name="member_code" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Share %')); ?></label>
                            <input type="number" step="0.01" name="share_percent" class="form-control" value="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Advance Balance')); ?></label>
                            <input type="number" step="0.01" name="advance_balance" class="form-control" value="0">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Phone')); ?></label>
                            <input type="text" name="contact_phone" class="form-control">
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Member')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Harvest Delivery')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.cooperatives.deliveries.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cooperative')); ?></label>
                            <select name="cooperative_id" class="form-control" required>
                                <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cooperative->id); ?>"><?php echo e($cooperative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Member')); ?></label>
                            <select name="member_id" class="form-control" required>
                                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($member->id); ?>"><?php echo e($member->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Lot ID')); ?></label>
                            <input type="number" name="lot_id" class="form-control">
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
                            <label class="form-label"><?php echo e(__('Price / Unit')); ?></label>
                            <input type="number" step="0.01" name="price_per_unit" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Delivery Date')); ?></label>
                            <input type="date" name="delivery_date" class="form-control" required>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Record Delivery')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Revenue Distribution')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('agri.cooperatives.distributions.create')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Cooperative')); ?></label>
                            <select name="cooperative_id" class="form-control" required>
                                <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cooperative->id); ?>"><?php echo e($cooperative->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Period Start')); ?></label>
                            <input type="date" name="period_start" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Period End')); ?></label>
                            <input type="date" name="period_end" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Method')); ?></label>
                            <select name="distribution_method" class="form-control">
                                <option value="quantity"><?php echo e(__('Quantity')); ?></option>
                                <option value="share"><?php echo e(__('Share')); ?></option>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Distribution')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Cooperatives')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Region')); ?></th>
                                <th><?php echo e(__('Currency')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cooperatives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooperative): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($cooperative->name); ?></td>
                                    <td><?php echo e($cooperative->code); ?></td>
                                    <td><?php echo e($cooperative->region); ?></td>
                                    <td><?php echo e($cooperative->currency); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Members')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Code')); ?></th>
                                <th><?php echo e(__('Share %')); ?></th>
                                <th><?php echo e(__('Advance')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($member->name); ?></td>
                                    <td><?php echo e($member->member_code); ?></td>
                                    <td><?php echo e($member->share_percent); ?></td>
                                    <td><?php echo e($member->advance_balance); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Deliveries')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Member')); ?></th>
                                <th><?php echo e(__('Crop')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Total')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($delivery->member_id); ?></td>
                                    <td><?php echo e($delivery->crop_type); ?></td>
                                    <td><?php echo e($delivery->quantity); ?> <?php echo e($delivery->unit); ?></td>
                                    <td><?php echo e($delivery->total_value); ?></td>
                                    <td><?php echo e($delivery->delivery_date?->format('Y-m-d')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Distributions')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Period')); ?></th>
                                <th><?php echo e(__('Total')); ?></th>
                                <th><?php echo e(__('Method')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $distributions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distribution): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($distribution->period_start?->format('Y-m-d')); ?> → <?php echo e($distribution->period_end?->format('Y-m-d')); ?></td>
                                    <td><?php echo e($distribution->total_revenue); ?></td>
                                    <td><?php echo e($distribution->distribution_method); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Payouts')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Member')); ?></th>
                                <th><?php echo e(__('Gross')); ?></th>
                                <th><?php echo e(__('Advance')); ?></th>
                                <th><?php echo e(__('Net')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payout): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($payout->member_id); ?></td>
                                    <td><?php echo e($payout->gross_amount); ?></td>
                                    <td><?php echo e($payout->advance_deducted); ?></td>
                                    <td><?php echo e($payout->net_amount); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/agri/cooperatives.blade.php ENDPATH**/ ?>
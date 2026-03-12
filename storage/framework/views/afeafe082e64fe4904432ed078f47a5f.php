<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Retail Operations')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Retail Operations')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Run stores, sessions, promotions, contracts and customer-facing retail coordination from one distribution cockpit.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="d-flex gap-2">
        <a href="<?php echo e(route('retail.operations.reports')); ?>" class="btn btn-sm btn-primary"><?php echo e(__('Retail Reports')); ?></a>
        <a href="<?php echo e(route('retail.operations.bi')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Commercial BI')); ?></a>
        <a href="<?php echo e(route('retail.customer-portal')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Customer Portal')); ?></a>
        <a href="<?php echo e(route('retail.supplier-portal')); ?>" class="btn btn-sm btn-outline-primary"><?php echo e(__('Supplier Portal')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Open cash registers')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($cashRegisters->where('status', 'open')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('active tills right now')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Open POS sessions')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($posSessions->where('status', 'open')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('store sessions still running')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Retail stores')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($retailStores->where('status', 'active')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('active points of sale')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Active promotions')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($promotions->where('status', 'active')->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('campaigns live in stores')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Procurement backlog')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($procurementRequests->whereIn('status', ['pending', 'approved', 'ordered'])->count()); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('retail demand waiting for sourcing')); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Cash Register')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.cash-registers.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Location')); ?></label>
                                <input type="text" name="location" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Opening balance')); ?></label>
                                <input type="number" step="0.01" name="opening_balance" class="form-control" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control">
                                    <option value="open"><?php echo e(__('Open')); ?></option>
                                    <option value="closed"><?php echo e(__('Closed')); ?></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Register')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('POS Session')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.pos-sessions.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Store')); ?></label>
                                <select name="retail_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Select store')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Register')); ?></label>
                                <select name="cash_register_id" class="form-control">
                                    <option value=""><?php echo e(__('Select register')); ?></option>
                                    <?php $__currentLoopData = $cashRegisters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $register): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($register->id); ?>"><?php echo e($register->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Opened at')); ?></label>
                                <input type="datetime-local" name="opened_at" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Closed at')); ?></label>
                                <input type="datetime-local" name="closed_at" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Expected')); ?></label>
                                <input type="number" step="0.01" name="expected_amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Actual')); ?></label>
                                <input type="number" step="0.01" name="actual_amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control">
                                    <option value="open"><?php echo e(__('Open')); ?></option>
                                    <option value="closed"><?php echo e(__('Closed')); ?></option>
                                    <option value="reconciled"><?php echo e(__('Reconciled')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Transactions')); ?></label>
                                <input type="number" name="transactions_count" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Session mode')); ?></label>
                                <select name="session_mode" class="form-control">
                                    <option value="counter"><?php echo e(__('Counter')); ?></option>
                                    <option value="mobile"><?php echo e(__('Mobile')); ?></option>
                                    <option value="self_checkout"><?php echo e(__('Self checkout')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Mixed payments')); ?></label>
                                <select name="mixed_payment_enabled" class="form-control">
                                    <option value="1"><?php echo e(__('Enabled')); ?></option>
                                    <option value="0"><?php echo e(__('Disabled')); ?></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Session')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Retail Store')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.retail-stores.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Store name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Store code')); ?></label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Region')); ?></label>
                                <input type="text" name="region" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Manager')); ?></label>
                                <input type="text" name="manager_name" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Type')); ?></label>
                                <select name="store_type" class="form-control">
                                    <option value="store"><?php echo e(__('Store')); ?></option>
                                    <option value="hq"><?php echo e(__('Head office')); ?></option>
                                    <option value="kiosk"><?php echo e(__('Kiosk')); ?></option>
                                    <option value="warehouse_hub"><?php echo e(__('Warehouse hub')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Parent store')); ?></label>
                                <select name="parent_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Warehouse')); ?></label>
                                <select name="warehouse_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Revenue target')); ?></label>
                                <input type="number" step="0.01" name="target_revenue" class="form-control" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Margin target %')); ?></label>
                                <input type="number" step="0.01" name="target_margin" class="form-control" value="0">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Store')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Commercial Contract')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.contracts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Contract number')); ?></label>
                                <input type="text" name="contract_number" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Party type')); ?></label>
                                <select name="party_type" class="form-control">
                                    <option value="customer"><?php echo e(__('Customer')); ?></option>
                                    <option value="vender"><?php echo e(__('Supplier')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Customer')); ?></label>
                                <select name="party_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $venders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vender->id); ?>"><?php echo e($vender->name); ?> (<?php echo e(__('Supplier')); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Amount')); ?></label>
                                <input type="number" step="0.01" name="amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Store')); ?></label>
                                <select name="retail_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Category')); ?></label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Owner')); ?></label>
                                <input type="text" name="owner_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Billing cycle')); ?></label>
                                <select name="billing_cycle" class="form-control">
                                    <option value="one_off"><?php echo e(__('One off')); ?></option>
                                    <option value="monthly"><?php echo e(__('Monthly')); ?></option>
                                    <option value="quarterly"><?php echo e(__('Quarterly')); ?></option>
                                    <option value="yearly"><?php echo e(__('Yearly')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Renewal notice days')); ?></label>
                                <input type="number" name="renewal_notice_days" class="form-control" value="30">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label"><?php echo e(__('Start')); ?></label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label"><?php echo e(__('End')); ?></label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Contract')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Cash Movement')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.cash-movements.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Register')); ?></label>
                                <select name="cash_register_id" class="form-control" required>
                                    <?php $__currentLoopData = $cashRegisters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $register): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($register->id); ?>"><?php echo e($register->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label"><?php echo e(__('Type')); ?></label>
                                <select name="type" class="form-control">
                                    <option value="in"><?php echo e(__('In')); ?></option>
                                    <option value="out"><?php echo e(__('Out')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label"><?php echo e(__('Amount')); ?></label>
                                <input type="number" step="0.01" name="amount" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Date')); ?></label>
                                <input type="date" name="movement_date" class="form-control" required value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Reference')); ?></label>
                                <input type="text" name="reference" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Record Movement')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Loyalty Account')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.loyalty-accounts.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Customer')); ?></label>
                                <select name="customer_id" class="form-control" required>
                                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Code')); ?></label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Points')); ?></label>
                                <input type="number" name="points_balance" class="form-control" value="0">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Tier')); ?></label>
                                <input type="text" name="tier" class="form-control" value="standard">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Loyalty')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Promotion')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.promotions.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Code')); ?></label>
                                <input type="text" name="code" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Type')); ?></label>
                                <select name="promotion_type" class="form-control">
                                    <option value="discount"><?php echo e(__('Discount')); ?></option>
                                    <option value="bundle"><?php echo e(__('Bundle')); ?></option>
                                    <option value="cashback"><?php echo e(__('Cashback')); ?></option>
                                    <option value="gift"><?php echo e(__('Gift')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Scope')); ?></label>
                                <select name="scope_type" class="form-control">
                                    <option value="global"><?php echo e(__('Global')); ?></option>
                                    <option value="store"><?php echo e(__('Store')); ?></option>
                                    <option value="customer"><?php echo e(__('Customer')); ?></option>
                                    <option value="product"><?php echo e(__('Product')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Discount')); ?></label>
                                <input type="number" step="0.01" name="discount_value" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Store')); ?></label>
                                <select name="retail_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Audience')); ?></label>
                                <select name="audience_type" class="form-control">
                                    <option value="all"><?php echo e(__('All')); ?></option>
                                    <option value="vip"><?php echo e(__('VIP')); ?></option>
                                    <option value="wholesale"><?php echo e(__('Wholesale')); ?></option>
                                    <option value="new_customers"><?php echo e(__('New customers')); ?></option>
                                    <option value="loyalty"><?php echo e(__('Loyalty members')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Minimum basket')); ?></label>
                                <input type="number" step="0.01" name="minimum_amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Budget')); ?></label>
                                <input type="number" step="0.01" name="budget_amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Auto apply')); ?></label>
                                <select name="auto_apply" class="form-control">
                                    <option value="0"><?php echo e(__('No')); ?></option>
                                    <option value="1"><?php echo e(__('Yes')); ?></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Promotion')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Delivery Route')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.delivery-routes.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Route name')); ?></label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Delivery note')); ?></label>
                                <select name="delivery_note_id" class="form-control">
                                    <option value=""><?php echo e(__('Select delivery note')); ?></option>
                                    <?php $__currentLoopData = $deliveryNotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($note->id); ?>"><?php echo e(\Auth::user()->invoiceNumberFormat($note->invoice_id)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Driver')); ?></label>
                                <input type="text" name="driver_name" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Vehicle')); ?></label>
                                <input type="text" name="vehicle_no" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Route date')); ?></label>
                                <input type="date" name="route_date" class="form-control" required value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Route')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Retail Procurement Request')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.procurement.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Reference')); ?></label>
                                <input type="text" name="reference" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><?php echo e(__('Title')); ?></label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Store')); ?></label>
                                <select name="retail_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Supplier')); ?></label>
                                <select name="vender_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $venders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vender): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($vender->id); ?>"><?php echo e($vender->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Category')); ?></label>
                                <select name="category_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Budget')); ?></label>
                                <input type="number" step="0.01" name="budget_amount" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Needed by')); ?></label>
                                <input type="date" name="needed_by" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Status')); ?></label>
                                <select name="status" class="form-control">
                                    <option value="draft"><?php echo e(__('Draft')); ?></option>
                                    <option value="pending"><?php echo e(__('Pending')); ?></option>
                                    <option value="approved"><?php echo e(__('Approved')); ?></option>
                                    <option value="ordered"><?php echo e(__('Ordered')); ?></option>
                                    <option value="closed"><?php echo e(__('Closed')); ?></option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Procurement Request')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Store Replenishment')); ?></h5></div>
                <div class="card-body">
                    <form action="<?php echo e(route('retail.operations.replenishments.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Source store')); ?></label>
                                <select name="source_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Destination store')); ?></label>
                                <select name="destination_store_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($store->id); ?>"><?php echo e($store->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Product')); ?></label>
                                <select name="product_id" class="form-control">
                                    <option value=""><?php echo e(__('Optional')); ?></option>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Suggested qty')); ?></label>
                                <input type="number" step="0.001" name="suggested_quantity" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Approved qty')); ?></label>
                                <input type="number" step="0.001" name="approved_quantity" class="form-control" value="0">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><?php echo e(__('Needed by')); ?></label>
                                <input type="date" name="needed_by" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Create Replenishment')); ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Stores & Sessions')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Store')); ?></th>
                            <th><?php echo e(__('Code')); ?></th>
                            <th><?php echo e(__('Type')); ?></th>
                            <th><?php echo e(__('Manager')); ?></th>
                            <th><?php echo e(__('Sessions')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $retailStores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($store->name); ?></td>
                                <td><?php echo e($store->code); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $store->store_type ?? 'store'))); ?></td>
                                <td><?php echo e($store->manager_name ?: '-'); ?></td>
                                <td><?php echo e($store->pos_sessions_count); ?></td>
                                <td><?php echo e(ucfirst($store->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No stores yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('POS Sessions')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Store')); ?></th>
                            <th><?php echo e(__('Register')); ?></th>
                            <th><?php echo e(__('Opened')); ?></th>
                            <th><?php echo e(__('Transactions')); ?></th>
                            <th><?php echo e(__('Variance')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $posSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(optional($session->retailStore)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($session->cashRegister)->name ?: '-'); ?></td>
                                <td><?php echo e($session->opened_at?->format('Y-m-d H:i')); ?></td>
                                <td><?php echo e($session->transactions_count); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($session->variance_amount)); ?></td>
                                <td><?php echo e(ucfirst($session->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No POS sessions yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Promotions')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Code')); ?></th>
                            <th><?php echo e(__('Type')); ?></th>
                            <th><?php echo e(__('Audience')); ?></th>
                            <th><?php echo e(__('Discount')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $promotions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $promotion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($promotion->name); ?></td>
                                <td><?php echo e($promotion->code); ?></td>
                                <td><?php echo e(ucfirst($promotion->promotion_type)); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $promotion->audience_type ?? 'all'))); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($promotion->discount_value)); ?></td>
                                <td><?php echo e(ucfirst($promotion->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No promotions yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Commercial Contracts')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Number')); ?></th>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Party')); ?></th>
                            <th><?php echo e(__('Store')); ?></th>
                            <th><?php echo e(__('Amount')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $commercialContracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($contract->contract_number); ?></td>
                                <td><?php echo e($contract->title); ?></td>
                                <td><?php echo e($contract->party_name ?: ucfirst($contract->party_type)); ?></td>
                                <td><?php echo e(optional($contract->retailStore)->name ?: '-'); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($contract->amount)); ?></td>
                                <td><?php echo e(ucfirst($contract->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6" class="text-center text-muted"><?php echo e(__('No contracts yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Procurement Requests')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Reference')); ?></th>
                            <th><?php echo e(__('Store')); ?></th>
                            <th><?php echo e(__('Supplier')); ?></th>
                            <th><?php echo e(__('Budget')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $procurementRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($request->reference); ?></td>
                                <td><?php echo e(optional($request->retailStore)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($request->vender)->name ?: '-'); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($request->budget_amount)); ?></td>
                                <td><?php echo e(ucfirst($request->status)); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No procurement requests yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Replenishment Pipeline')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Product')); ?></th>
                            <th><?php echo e(__('From')); ?></th>
                            <th><?php echo e(__('To')); ?></th>
                            <th><?php echo e(__('Suggested')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $replenishments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $replenishment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(optional($replenishment->product)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($replenishment->sourceStore)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($replenishment->destinationStore)->name ?: '-'); ?></td>
                                <td><?php echo e($replenishment->suggested_quantity); ?></td>
                                <td><?php echo e(ucfirst(str_replace('_', ' ', $replenishment->status))); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No replenishment requests yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header"><h5><?php echo e(__('Recent POS Sales')); ?></h5></div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('POS')); ?></th>
                            <th><?php echo e(__('Customer')); ?></th>
                            <th><?php echo e(__('Warehouse')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Total')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $posSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e(\Auth::user()->posNumberFormat($sale->pos_id)); ?></td>
                                <td><?php echo e(optional($sale->customer)->name ?: '-'); ?></td>
                                <td><?php echo e(optional($sale->warehouse)->name ?: '-'); ?></td>
                                <td><?php echo e($sale->pos_date ? \Auth::user()->dateFormat($sale->pos_date) : '-'); ?></td>
                                <td><?php echo e(\Auth::user()->priceFormat($sale->getTotal())); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No POS sales found.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/retail/operations.blade.php ENDPATH**/ ?>
<?php
$profile=\App\Models\Utility::get_file('uploads/avatar/');
?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function () {
            $("[name='shipping_name']").val($("[name='billing_name']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_phone']").val($("[name='billing_phone']").val());
            $("[name='shipping_zip']").val($("[name='billing_zip']").val());
            $("[name='shipping_address']").val($("[name='billing_address']").val());
        })

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Customers')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track customer health, credit exposure and recent commercial activity from one place.')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Customer')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <a href="#" data-size="md"  data-bs-toggle="tooltip" title="<?php echo e(__('Import')); ?>" data-url="<?php echo e(route('customer.file.import')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Import customer CSV file')); ?>" class="btn btn-sm bg-brown-subtitle me-2">
            <i class="ti ti-file-import"></i>
        </a>
        <a href="<?php echo e(route('customer.export')); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Export')); ?>" class="btn btn-sm btn-secondary me-2">
            <i class="ti ti-file-export"></i>
        </a>

        <a href="#" data-size="lg" data-url="<?php echo e(route('customer.create')); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Create Customer')); ?>" class="btn btn-sm btn-primary me-2">
            <i class="ti ti-plus"></i>
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $activeCustomers = $customers->where('is_active', 1)->count();
        $limitedCreditCustomers = $customers->filter(function ($customer) {
            return (float) ($customer['credit_limit'] ?? 0) > 0;
        })->count();
        $totalCreditExposure = $customers->sum(function ($customer) {
            return (float) ($customer['credit_balance'] ?? 0);
        });
        $customersOnHold = $customers->filter(function ($customer) {
            return (int) ($customer['credit_hold'] ?? 0) === 1;
        })->count();
    ?>

    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Active customers')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($activeCustomers); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('of :count total records', ['count' => $customers->count()])); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Customers with credit policy')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($limitedCreditCustomers); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('controlled accounts')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Current credit exposure')); ?></span>
            <strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($totalCreditExposure)); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('open receivables under credit')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Customers on hold')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($customersOnHold); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('validation blocked')); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> <?php echo e(__('Name')); ?></th>
                                <th> <?php echo e(__('Contact')); ?></th>
                                <th> <?php echo e(__('Email')); ?></th>
                                <th> <?php echo e(__('Balance')); ?></th>
                                <th> <?php echo e(__('Credit Limit')); ?></th>
                                <th> <?php echo e(__('Credit Used')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="cust_tr" id="cust_detail" data-url="<?php echo e(route('customer.show',$customer['id'])); ?>" data-id="<?php echo e($customer['id']); ?>" data-bulk-id="<?php echo e($customer['id']); ?>">
                                    <td class="Id">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show customer')): ?>
                                            <a href="<?php echo e(route('customer.show',\Crypt::encrypt($customer['id']))); ?>" class="btn btn-outline-primary">
                                                <?php echo e(AUth::user()->customerNumberFormat($customer['customer_id'])); ?>

                                            </a>
                                        <?php else: ?>
                                            <a href="#" class="btn btn-outline-primary">
                                                <?php echo e(AUth::user()->customerNumberFormat($customer['customer_id'])); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td class="font-style"><?php echo e($customer['name']); ?></td>
                                    <td><?php echo e($customer['contact']); ?></td>
                                    <td><?php echo e($customer['email']); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($customer['balance'])); ?></td>
                                    <td><?php echo e((float)($customer['credit_limit'] ?? 0) > 0 ? \Auth::user()->priceFormat($customer['credit_limit']) : __('Unlimited')); ?></td>
                                    <td><?php echo e(\Auth::user()->priceFormat($customer['credit_balance'] ?? 0)); ?></td>
                                    <td class="Action">
                                        <span>
                                        <?php if($customer['is_active']==0): ?>
                                                <i class="ti ti-lock" title="Inactive"></i>
                                            <?php else: ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show customer')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="<?php echo e(route('customer.show',\Crypt::encrypt($customer['id']))); ?>" class="mx-3 btn btn-sm align-items-center bg-warning"
                                                       data-bs-toggle="tooltip" title="<?php echo e(__('View')); ?>">
                                                        <i class="ti ti-eye text-white text-white"></i>
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit customer')): ?>
                                                        <div class="action-btn me-2">
                                                        <a href="#" class="mx-3 btn btn-sm  align-items-center bg-info" data-url="<?php echo e(route('customer.edit',$customer['id'])); ?>" data-ajax-popup="true"  data-size="lg" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"  data-title="<?php echo e(__('Edit Customer')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete customer')): ?>
                                                    <div class="action-btn ">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['customer.destroy', $customer['id']],'id'=>'delete-form-'.$customer['id']]); ?>

                                                        <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" ><i class="ti ti-trash text-white text-white"></i></a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </span>
                                    </td>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/customer/index.blade.php ENDPATH**/ ?>
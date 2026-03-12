<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('click', '#billing_data', function() {
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
    <?php echo e(__('Manage Vendor Detail')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('vender.index')); ?>"><?php echo e(__('Vendor')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($vendor['name']); ?></li>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create bill')): ?>
            <a href="<?php echo e(route('bill.create',$vendor->id)); ?>" class="btn btn-sm btn-primary me-2">
                <?php echo e(__('Create Bill')); ?>

            </a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit vender')): ?>
            <a href="#" class="btn btn-sm btn-info me-2" data-size="xl" data-url="<?php echo e(route('vender.edit',$vendor['id'])); ?>" data-ajax-popup="true" title="<?php echo e(__('Edit')); ?>" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete vender')): ?>
            <?php echo Form::open(['method' => 'DELETE', 'route' => ['vender.destroy', $vendor['id']],'class'=>'delete-form-btn','id'=>'delete-form-'.$vendor['id']]); ?>

            <a href="#" class="btn btn-sm btn-danger bs-pass-para" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($vendor['id']); ?>').submit();">
                <i class="ti ti-trash text-white"></i>
            </a>
            <?php echo Form::close(); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card pb-0 customer-detail-box vendor_card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Vendor Info')); ?></h5>
                    <p class="card-text mb-0"><?php echo e($vendor->name); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->email); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->contact); ?></p>
                    <?php if(count($vendor->customField) > 0): ?>
                        <?php $__currentLoopData = $vendor->customField; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p class="card-text mb-0"><strong><?php echo e($field->name); ?> : </strong><?php echo e($field->value ?? '-'); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card pb-0 customer-detail-box vendor_card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Billing Info')); ?></h5>
                    <p class="card-text mb-0"><?php echo e($vendor->billing_name); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->billing_address); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->billing_city.', '. $vendor->billing_state .', '.$vendor->billing_zip); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->billing_country); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->billing_phone); ?></p>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
            <div class="card pb-0 customer-detail-box vendor_card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Shipping Info')); ?></h5>
                    <p class="card-text mb-0"><?php echo e($vendor->shipping_name); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->shipping_address); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->shipping_city.', '. $vendor->shipping_state .', '.$vendor->shipping_zip); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->shipping_country); ?></p>
                    <p class="card-text mb-0"><?php echo e($vendor->shipping_phone); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card pb-0">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e(__('Company Info')); ?></h5>
                    <div class="row">
                        <?php
                            $totalBillSum=$vendor->vendorTotalBillSum($vendor['id']);
                            $totalBill=$vendor->vendorTotalBill($vendor['id']);
                            $averageSale=($totalBillSum!=0)?$totalBillSum/$totalBill:0;
                        ?>
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4">
                                <p class="card-text mb-0"><?php echo e(__('Vendor Id')); ?></p>
                                <h6 class="report-text mb-3"><?php echo e(\Auth::user()->venderNumberFormat($vendor->vender_id)); ?></h6>
                                <p class="card-text mb-0"><?php echo e(__('Total Sum of Bills')); ?></p>
                                <h6 class="report-text mb-0"><?php echo e(\Auth::user()->priceFormat($totalBillSum)); ?></h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4">
                                <p class="card-text mb-0"><?php echo e(__('Date of Creation')); ?></p>
                                <h6 class="report-text mb-3"><?php echo e(\Auth::user()->dateFormat($vendor->created_at)); ?></h6>
                                <p class="card-text mb-0"><?php echo e(__('Quantity of Bills')); ?></p>
                                <h6 class="report-text mb-0"><?php echo e($totalBill); ?></h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4">
                                <p class="card-text mb-0"><?php echo e(__('Balance')); ?></p>
                                <h6 class="report-text mb-3"><?php echo e(\Auth::user()->priceFormat($vendor->balance)); ?></h6>
                                <p class="card-text mb-0"><?php echo e(__('Average Sales')); ?></p>
                                <h6 class="report-text mb-0"><?php echo e(\Auth::user()->priceFormat($averageSale)); ?></h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="p-4">
                                <p class="card-text mb-0"><?php echo e(__('Overdue')); ?></p>
                                <h6 class="report-text mb-3"><?php echo e(\Auth::user()->priceFormat($vendor->vendorOverdue($vendor->id))); ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <h5 class=" d-inline-block mb-5"><?php echo e(__('Bills')); ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th><?php echo e(__('Bill')); ?></th>
                                <th><?php echo e(__('Bill Date')); ?></th>
                                <th><?php echo e(__('Due Date')); ?></th>
                                <th><?php echo e(__('Due Amount')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill')): ?>
                                    <th width="10%"> <?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $vendor->vendorBill($vendor->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="font-style">
                                    <td class="Id">
                                        <a href="<?php echo e(route('bill.show',\Crypt::encrypt($bill->id))); ?>" class="btn btn-outline-primary"><?php echo e(AUth::user()->billNumberFormat($bill->bill_id)); ?>

                                        </a>
                                    </td>
                                    <td><?php echo e(Auth::user()->dateFormat($bill->bill_date)); ?></td>
                                    <td>
                                        <?php if(($bill->due_date < date('Y-m-d'))): ?>
                                            <p class="text-danger"> <?php echo e(\Auth::user()->dateFormat($bill->due_date)); ?></p>
                                        <?php else: ?>
                                            <?php echo e(\Auth::user()->dateFormat($bill->due_date)); ?>

                                            <?php endif; ?>
                                        </td>
                                    <td><?php echo e(\Auth::user()->priceFormat($bill->getDue())); ?></td>
                                    <td>
                                        <?php if($bill->status == 0): ?>
                                            <span class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$bill->status])); ?></span>
                                        <?php elseif($bill->status == 1): ?>
                                            <span class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$bill->status])); ?></span>
                                        <?php elseif($bill->status == 2): ?>
                                            <span class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$bill->status])); ?></span>
                                        <?php elseif($bill->status == 3): ?>
                                            <span class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$bill->status])); ?></span>
                                        <?php elseif($bill->status == 4): ?>
                                            <span class="status_badge badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$bill->status])); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if(Gate::check('edit bill') || Gate::check('delete bill') || Gate::check('show bill')): ?>
                                        <td class="Action">
                                            <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('duplicate bill')): ?>
                                                    <div class="action-btn me-2">
                                                        <?php echo Form::open(['method' => 'get', 'route' => ['bill.duplicate', $bill->id],'id'=>'duplicate-form-'.$bill->id]); ?>

                                                        <a href="#" class="mx-3 btn btn-sm  align-items-center bg-secondary bs-pass-para" data-bs-toggle="tooltip" title="<?php echo e(__('Duplicate Bill')); ?>" data-original-title="<?php echo e(__('Duplicate')); ?>" data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back" data-confirm-yes="document.getElementById('duplicate-form-<?php echo e($bill->id); ?>').submit();">
                                                            <i class="ti ti-copy text-white text-white"></i>
                                                        </a>
                                                        <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show bill')): ?>

                                                    <div class="action-btn me-2">
                                                            <a href="<?php echo e(route('bill.show',\Crypt::encrypt($bill->id))); ?>" class="mx-3 btn btn-sm  align-items-center bg-warning" data-bs-toggle="tooltip" title="<?php echo e(__('Show')); ?>" data-original-title="<?php echo e(__('Detail')); ?>">
                                                                <i class="ti ti-eye text-white text-white"></i>
                                                            </a>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit bill')): ?>
                                                    <div class="action-btn me-2">
                                                        <a href="<?php echo e(route('bill.edit',\Crypt::encrypt($bill->id))); ?>" class="mx-3 btn btn-sm  align-items-center bg-info" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-original-title="<?php echo e(__('Edit')); ?>">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete bill')): ?>
                                                    <div class="action-btn ">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['bill.destroy', $bill->id],'id'=>'delete-form-'.$bill->id]); ?>


                                                        <a href="#" class="mx-3 btn btn-sm  align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($bill->id); ?>').submit();">
                                                            <i class="ti ti-trash text-white text-white"></i>
                                                        </a>
                                                    <?php echo Form::close(); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </span>
                                        </td>
                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/vender/show.blade.php ENDPATH**/ ?>
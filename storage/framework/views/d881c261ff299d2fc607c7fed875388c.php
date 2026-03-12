<?php $__env->startSection('page-title'); ?>
    <?php echo e(__("Estimation Detail")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <div class="all-button-box row d-flex justify-content-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Estimation')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="#" data-url="<?php echo e(URL::to('estimations/'.$estimation->id.'/edit')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Estimation')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto"><i class="ti ti-pencil text-white"></i> <?php echo e(__('Edit')); ?></a>
            </div>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Estimation')): ?>
            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6">
                <a href="<?php echo e(route('get.estimation',$estimation->id)); ?>" class="btn btn-xs btn-white btn-icon-only bg-warning width-auto" title="<?php echo e(__('Print Estimation')); ?>" target="_blanks"><span><i class="fa fa-print"></i> <?php echo e(__('Print')); ?></span></a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="invoice-title"><?php echo e(Auth::user()->estimateNumberFormat($estimation->estimation_id)); ?></div>
        <div class="invoice-detail pb-2">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="address-detail">
                        <strong><?php echo e(__('From')); ?> :</strong>
                        <?php echo e($settings['company_name']); ?><br>
                        <?php echo e($settings['company_address']); ?><br>
                        <?php echo e($settings['company_city']); ?>

                        <?php if(isset($settings['company_city']) && !empty($settings['company_city'])): ?>, <?php endif; ?>
                        <?php echo e($settings['company_state']); ?>

                        <?php if(isset($settings['company_zipcode']) && !empty($settings['company_zipcode'])): ?>-<?php endif; ?> <?php echo e($settings['company_zipcode']); ?><br>
                        <?php echo e($settings['company_country']); ?>

                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <?php if($client): ?>
                        <div class="address-detail text-end float-right">
                            <strong><?php echo e(__('To')); ?> :</strong>
                            <?php echo e($client->name); ?> <br>
                            <?php echo e($client->email); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="status-section">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class="text-status"><strong><?php echo e(__('Status')); ?> :</strong>
                            <?php if($estimation->status == 0): ?>
                                <span class="badge badge-pill badge-primary"><?php echo e(__(\App\Models\Estimation::$statues[$estimation->status])); ?></span>
                            <?php elseif($estimation->status == 1): ?>
                                <span class="badge badge-pill badge-danger"><?php echo e(__(\App\Models\Estimation::$statues[$estimation->status])); ?></span>
                            <?php elseif($estimation->status == 2): ?>
                                <span class="badge badge-pill badge-warning"><?php echo e(__(\App\Models\Estimation::$statues[$estimation->status])); ?></span>
                            <?php elseif($estimation->status == 3): ?>
                                <span class="badge badge-pill badge-success"><?php echo e(__(\App\Models\Estimation::$statues[$estimation->status])); ?></span>
                            <?php elseif($estimation->status == 4): ?>
                                <span class="badge badge-pill badge-info"><?php echo e(__(\App\Models\Estimation::$statues[$estimation->status])); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-9">
                        <div class="text-status text-end"><?php echo e(__('Issue Date')); ?>:<strong><?php echo e(Auth::user()->dateFormat($estimation->issue_date)); ?></strong></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="justify-content-between align-items-center d-flex">
                        <h4 class="h4 font-weight-400 float-left"><?php echo e(__('Order Summary')); ?></h4>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Estimation Add Product')): ?>
                            <a href="#" class="btn btn-sm btn-white float-right add-small" data-url="<?php echo e(route('estimations.products.add',$estimation->id)); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Add Product')); ?>">
                                <i class="ti ti-plus"></i> <?php echo e(__('Add Product')); ?>

                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="card">
                        <div class="table-responsive order-table">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('Action')); ?></th>
                                    <th><?php echo e(__('#')); ?></th>
                                    <th><?php echo e(__('Item')); ?></th>
                                    <th><?php echo e(__('Price')); ?></th>
                                    <th><?php echo e(__('Quantity')); ?></th>
                                    <th class="text-end"><?php echo e(__('Totals')); ?></th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                <?php
                                    $i=0;
                                ?>
                                <?php $__currentLoopData = $estimation->getProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="Action">
                                        <span>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Estimation Edit Product')): ?>
                                                <a href="#" class="edit-icon" data-url="<?php echo e(route('estimations.products.edit',[$estimation->id,$product->pivot->id])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Estimation Product')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Estimation Delete Product')): ?>
                                                <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($product->pivot->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['estimations.products.delete', $estimation->id,$product->pivot->id],'id'=>'delete-form-'.$product->pivot->id]); ?>

                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </span>
                                        </td>
                                        <td class="invoice-order"><?php echo e(++$i); ?></td>
                                        <td class="small-order"><?php echo e($product->name); ?></td>
                                        <td class="small-order"><?php echo e(Auth::user()->priceFormat($product->pivot->price)); ?></td>
                                        <td class="small-order"><?php echo e($product->pivot->quantity); ?></td>
                                        <?php
                                            $price = $product->pivot->price * $product->pivot->quantity;
                                        ?>
                                        <td class="invoice-order text-end"><?php echo e(Auth::user()->priceFormat($price)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-end">
                <div class="col-md-3">
                    <?php
                        $subTotal = $estimation->getSubTotal();
                    ?>
                    <div class="text-status"><strong><?php echo e(__('Subtotal')); ?> :</strong> <?php echo e(Auth::user()->priceFormat($subTotal)); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="text-status"><strong><?php echo e(__('Discount')); ?> :</strong> <?php echo e(Auth::user()->priceFormat($estimation->discount)); ?></div>
                </div>
                <div class="col-md-3">
                    <?php
                        $tax = $estimation->getTax();
                    ?>
                    <div class="text-status"><strong><?php echo e($estimation->tax->name); ?> (<?php echo e($estimation->tax->rate); ?> %) :</strong> <?php echo e(Auth::user()->priceFormat($tax)); ?></div>
                </div>
                <div class="col-md-3">
                    <div class="text-status"><strong><?php echo e(__('Total')); ?> :</strong> <?php echo e(Auth::user()->priceFormat($subTotal-$estimation->discount+$tax)); ?></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/estimations/show.blade.php ENDPATH**/ ?>
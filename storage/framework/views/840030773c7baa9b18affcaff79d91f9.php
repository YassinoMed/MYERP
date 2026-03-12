<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee Salary Pay Slip')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Home</a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee Salary Pay Slip')); ?></div>
                </div>
            </div>
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between w-100">
                                <h4><?php echo e(__('Employee Salary Pay Slip')); ?></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="setting-tab">
                                <ul class="nav nav-pills mb-0" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#salary" role="tab" aria-controls="" aria-selected="true"><?php echo e(__('Salary')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#allowance" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Allowance')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#commission" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Commission')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#loan" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Loan')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#saturation-deduction" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Saturation Deduction')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#other-payment" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Other Payment')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#overtime" role="tab" aria-controls="" aria-selected="false"><?php echo e(__('Overtime')); ?></a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent2">
                                    <div class="tab-pane fade show active" id="salary" role="tabpanel" aria-labelledby="salary-tab3">
                                        <div class="company-setting-wrap">
                                            <?php echo e(Form::model($employee, array('route' => array('employee.update', $employee->id), 'method' => 'PUT' , 'enctype' => 'multipart/form-data'))); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('salary_type', __('Payslip Type*'))); ?>

                                                        <?php echo e(Form::select('salary_type',$payslip_type,null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('salary', __('Salary'))); ?>

                                                        <?php echo e(Form::number('salary',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>

                                            <?php echo e(Form::close()); ?>


                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="allowance" role="tabpanel" aria-labelledby="allowance-tab3">
                                        <div class="company-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'allowance','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('allowance_option', __('Allowance Options*'))); ?>

                                                        <?php echo e(Form::select('allowance_option',$allowance_options,null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Title'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('amount', __('Amount'))); ?>

                                                        <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>


                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="allowance-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Employee Name')); ?></th>
                                                        <th><?php echo e(__('Allownace Option')); ?></th>
                                                        <th><?php echo e(__('Title')); ?></th>
                                                        <th><?php echo e(__('Amount')); ?></th>
                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($allowance->employee()->name); ?></td>
                                                            <td><?php echo e($allowance->allowance_option()->name); ?></td>
                                                            <td><?php echo e($allowance->title); ?></td>
                                                            <td><?php echo e($allowance->amount); ?></td>
                                                            <td class="text-end">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit allowance')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('allowance/'.$allowance->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete allowance')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($allowance->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['allowance.destroy', $allowance->id],'id'=>'delete-form-'.$allowance->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="commission" role="tabpanel" aria-labelledby="commission-tab3">
                                        <div class="email-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'commission','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Title'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('amount', __('Amount'))); ?>

                                                        <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>

                                            <?php echo e(Form::close()); ?>


                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="commission-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Employee Name')); ?></th>
                                                        <th><?php echo e(__('Title')); ?></th>
                                                        <th><?php echo e(__('Amount')); ?></th>
                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($commission->employee()->name); ?></td>
                                                            <td><?php echo e($commission->title); ?></td>
                                                            <td><?php echo e($commission->amount); ?></td>
                                                            <td class="text-end">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit allowance')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('commission/'.$commission->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete allowance')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($commission->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['commission.destroy', $commission->id],'id'=>'delete-form-'.$commission->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="loan" role="tabpanel" aria-labelledby="loan-tab4">
                                        <div class="email-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'loan','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('loan_option', __('Loan Options*'))); ?>

                                                        <?php echo e(Form::select('loan_option',$loan_options,null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Title'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('amount', __('Loan Amount'))); ?>

                                                        <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('start_date', __('Start Date'))); ?>

                                                        <?php echo e(Form::text('start_date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('end_date', __('End Date'))); ?>

                                                        <?php echo e(Form::text('end_date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('reason', __('Reason'))); ?>

                                                        <?php echo e(Form::textarea('reason',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>


                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="loan-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('employee')); ?></th>
                                                        <th><?php echo e(__('Loan Options')); ?></th>
                                                        <th><?php echo e(__('Title')); ?></th>
                                                        <th><?php echo e(__('Loan Amount')); ?></th>
                                                        <th><?php echo e(__('Start Date')); ?></th>
                                                        <th><?php echo e(__('End Date')); ?></th>
                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loan->employee()->name); ?></td>
                                                            <td><?php echo e($loan->loan_option()->name); ?></td>
                                                            <td><?php echo e($loan->title); ?></td>
                                                            <td><?php echo e($loan->amount); ?></td>
                                                            <td><?php echo e($loan->start_date); ?></td>
                                                            <td><?php echo e($loan->end_date); ?></td>
                                                            <td class="text-end">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit loan')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('loan/'.$loan->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete loan')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($loan->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['loan.destroy', $loan->id],'id'=>'delete-form-'.$loan->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="saturation-deduction" role="tabpanel" aria-labelledby="saturation-deduction-tab3">
                                        <div class="email-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'saturationdeduction','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('deduction_option', __('Deduction Options*'))); ?>

                                                        <?php echo e(Form::select('deduction_option',$deduction_options,null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Title'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('amount', __('Amount'))); ?>

                                                        <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>


                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="saturation-deduction-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Employee Name')); ?></th>
                                                        <th><?php echo e(__('Deduction Option')); ?></th>
                                                        <th><?php echo e(__('Title')); ?></th>
                                                        <th><?php echo e(__('Amount')); ?></th>
                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $saturationdeductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saturationdeduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>

                                                            <td><?php echo e($saturationdeduction->employee()->name); ?></td>
                                                            <td><?php echo e($saturationdeduction->deduction_option()->name); ?></td>
                                                            <td><?php echo e($saturationdeduction->title); ?></td>
                                                            <td><?php echo e($saturationdeduction->amount); ?></td>
                                                            <td class="text-end">

                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit saturation deduction')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('saturationdeduction/'.$saturationdeduction->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete saturation deduction')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($saturationdeduction->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['saturationdeduction.destroy', $saturationdeduction->id],'id'=>'delete-form-'.$saturationdeduction->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="other-payment" role="tabpanel" aria-labelledby="other-payment-tab4">
                                        <div class="email-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'otherpayment','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Title'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('amount', __('Amount'))); ?>

                                                        <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>


                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="other-payment-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('employee')); ?></th>
                                                        <th><?php echo e(__('Title')); ?></th>
                                                        <th><?php echo e(__('Amount')); ?></th>
                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $otherpayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($otherpayment->employee()->name); ?></td>
                                                            <td><?php echo e($otherpayment->title); ?></td>
                                                            <td><?php echo e($otherpayment->amount); ?></td>
                                                            <td class="text-end">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit other payment')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('otherpayment/'.$otherpayment->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete other payment')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($otherpayment->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['otherpayment.destroy', $otherpayment->id],'id'=>'delete-form-'.$otherpayment->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="overtime" role="tabpanel" aria-labelledby="overtime-tab4">
                                        <div class="email-setting-wrap">
                                            <?php echo e(Form::open(array('url'=>'overtime','method'=>'post'))); ?>

                                            <?php echo csrf_field(); ?>
                                            <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('title', __('Overtime Title*'))); ?>

                                                        <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('number_of_days', __('Number of days'))); ?>

                                                        <?php echo e(Form::number('number_of_days',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('hours', __('Hours'))); ?>

                                                        <?php echo e(Form::number('hours',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('rate', __('Rate'))); ?>

                                                        <?php echo e(Form::number('rate',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 text-end mt-1">
                                                    <?php echo e(Form::button('<i class="ti ti-plus"></i> '.__('Save Change'), ['type' => 'submit','class' => 'btn btn-primary'])); ?>

                                                </div>
                                            </div>
                                            <?php echo e(Form::close()); ?>



                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-striped mb-0" id="overtime-dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo e(__('Employee Name')); ?></th>
                                                        <th><?php echo e(__('Overtime Title')); ?></th>
                                                        <th><?php echo e(__('Number of days')); ?></th>
                                                        <th><?php echo e(__('Hours')); ?></th>
                                                        <th><?php echo e(__('Rate')); ?></th>

                                                        <th class="text-end" width="200px"><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($overtime->employee()->name); ?></td>
                                                            <td><?php echo e($overtime->title); ?></td>
                                                            <td><?php echo e($overtime->number_of_days); ?></td>
                                                            <td><?php echo e($overtime->hours); ?></td>
                                                            <td><?php echo e($overtime->rate); ?></td>

                                                            <td class="text-end">
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('adit allowance')): ?>
                                                                    <a href="#" data-url="<?php echo e(URL::to('overtime/'.$overtime->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                                <?php endif; ?>
                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete allowance')): ?>
                                                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($overtime->id); ?>').submit();"><i class="ti ti-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['overtime.destroy', $overtime->id],'id'=>'delete-form-'.$overtime->id]); ?>

                                                                    <?php echo Form::close(); ?>

                                                                <?php endif; ?>
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
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            var designation_id = '<?php echo e($employee->designation_id); ?>';
            getDesignation(d_id);


            $("#allowance-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#commission-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#loan-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#saturation-deduction-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#other-payment-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });

            $("#overtime-dataTable").dataTable({
                "columnDefs": [
                    {"sortable": false, "targets": [1]}
                ]
            });


        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDesignation(did) {
            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">Select any Designation</option>');
                    $.each(data, function (key, value) {
                        var select = '';
                        if (key == '<?php echo e($employee->designation_id); ?>') {
                            select = 'selected';
                        }

                        $('#designation_id').append('<option value="' + key + '"  ' + select + '>' + value + '</option>');
                    });
                }
            });
        }

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/payslip/edit.blade.php ENDPATH**/ ?>
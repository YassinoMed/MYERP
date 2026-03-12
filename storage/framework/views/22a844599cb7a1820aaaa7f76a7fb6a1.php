<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Employee  Salary List')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="nav-tabs">
                <div class="col-lg-12 our-system">
                    <div class="row">
                        <ul class="nav nav-tabs my-4">
                            <li>
                                <a data-toggle="tab" href="#salary" class="active"><?php echo e(__('Salary')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#allowance" class=""><?php echo e(__('Allowance')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#commission" class=""><?php echo e(__('Commission')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#loan" class=""><?php echo e(__('Loan')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#saturation-deduction" class=""><?php echo e(__('Saturation Deduction')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#other-payment" class=""><?php echo e(__('Other Payment')); ?></a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#overtime" class=""><?php echo e(__('Overtime')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="salary" class="tab-pane in active">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::model($employee, array('route' => array('employee.salary.update', $employee->id), 'method' => 'POST'))); ?>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('salary_type', __('Payslip Type'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
                                            <?php echo e(Form::select('salary_type',$payslip_type,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('salary', __('Salary'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('salary',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create set salary')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div id="allowance" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'allowance','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('allowance_option', __('Allowance Options'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
                                            <?php echo e(Form::select('allowance_option',$allowance_options,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Title'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('title',null, array('class' => 'form-control','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Amount'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create allowance')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $allowances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($allowance->employee()->name); ?></td>
                                                <td><?php echo e($allowance->allowance_option()->name); ?></td>
                                                <td><?php echo e($allowance->title); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat($allowance->amount)); ?></td>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete set salary')): ?>
                                                    <td>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit allowance')): ?>
                                                            <a href="#" data-url="<?php echo e(URL::to('allowance/'.$allowance->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Allowance')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete allowance')): ?>
                                                            <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('allowance-delete-form-<?php echo e($allowance->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['allowance.destroy', $allowance->id],'id'=>'allowance-delete-form-'.$allowance->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        <?php endif; ?>
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
                    <div id="commission" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'commission','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Title'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Amount'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create commission')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>

                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="commission-dataTable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('Employee Name')); ?></th>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $commissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($commission->employee()->name); ?></td>
                                                <td><?php echo e($commission->title); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat($commission->amount )); ?></td>

                                                <td class="text-end">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit commission')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('commission/'.$commission->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Commission')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete commission')): ?>
                                                        <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('commission-delete-form-<?php echo e($commission->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['commission.destroy', $commission->id],'id'=>'commission-delete-form-'.$commission->id]); ?>

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
                    <div id="loan" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'loan','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('loan_option', __('Loan Options'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
                                            <?php echo e(Form::select('loan_option',$loan_options,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Title'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Loan Amount'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('start_date', __('Start Date'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('start_date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('end_date', __('End Date'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('end_date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('reason', __('Reason'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::textarea('reason',null, array('class' => 'form-control','rows'=>1,'required'=>'required'))); ?>

                                        </div>
                                    </div>
                                </div>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create loan')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $loans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loan->employee()->name); ?></td>
                                                <td><?php echo e($loan->loan_option()->name); ?></td>
                                                <td><?php echo e($loan->title); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat($loan->amount)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($loan->start_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat( $loan->end_date)); ?></td>

                                                <td class="text-end">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit loan')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('loan/'.$loan->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Loan')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete loan')): ?>
                                                        <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('loan-delete-form-<?php echo e($loan->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['loan.destroy', $loan->id],'id'=>'loan-delete-form-'.$loan->id]); ?>

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
                    <div id="saturation-deduction" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'saturationdeduction','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('deduction_option', __('Deduction Options'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
                                            <?php echo e(Form::select('deduction_option',$deduction_options,null, array('class' => 'form-control select2','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Title'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Amount'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create saturation deduction')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
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
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $saturationdeductions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saturationdeduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>

                                                <td><?php echo e($saturationdeduction->employee()->name); ?></td>
                                                <td><?php echo e($saturationdeduction->deduction_option()->name); ?></td>
                                                <td><?php echo e($saturationdeduction->title); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat( $saturationdeduction->amount )); ?></td>

                                                <td class="text-end">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit saturation deduction')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('saturationdeduction/'.$saturationdeduction->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Saturation Deduction')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete saturation deduction')): ?>
                                                        <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('deduction-delete-form-<?php echo e($saturationdeduction->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['saturationdeduction.destroy', $saturationdeduction->id],'id'=>'deduction-delete-form-'.$saturationdeduction->id]); ?>

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
                    <div id="other-payment" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'otherpayment','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Title'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Amount'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('amount',null, array('class' => 'form-control ','required'=>'required' ,'step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create other payment')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php echo e(Form::close()); ?>



                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="other-payment-dataTable">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('employee')); ?></th>
                                            <th><?php echo e(__('Title')); ?></th>
                                            <th><?php echo e(__('Amount')); ?></th>
                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $otherpayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherpayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($otherpayment->employee()->name); ?></td>
                                                <td><?php echo e($otherpayment->title); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat($otherpayment->amount )); ?></td>

                                                <td class="text-end">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit other payment')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('otherpayment/'.$otherpayment->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Other Payment')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete other payment')): ?>
                                                        <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('payment-delete-form-<?php echo e($otherpayment->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['otherpayment.destroy', $otherpayment->id],'id'=>'payment-delete-form-'.$otherpayment->id]); ?>

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
                    <div id="overtime" class="tab-pane">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('url'=>'overtime','method'=>'post'))); ?>

                                <?php echo csrf_field(); ?>
                                <?php echo e(Form::hidden('employee_id',$employee->id, array())); ?>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('title', __('Overtime Title'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
                                            <?php echo e(Form::text('title',null, array('class' => 'form-control ','required'=>'required'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('number_of_days', __('Number of days'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('number_of_days',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('hours', __('Hours'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('hours',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('rate', __('Rate'),['class'=>'form-label'])); ?>

                                            <?php echo e(Form::number('rate',null, array('class' => 'form-control ','required'=>'required','step'=>'0.01'))); ?>

                                        </div>
                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create overtime')): ?>
                                    <div class="row">
                                        <div class="col-12 text-end mt-1">
                                            <input type="submit" value="<?php echo e(__('Save Change')); ?>" class="btn-create badge-blue">
                                        </div>
                                    </div>
                                <?php endif; ?>
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

                                            <th width="200px"><?php echo e(__('Action')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $overtimes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overtime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($overtime->employee()->name); ?></td>
                                                <td><?php echo e($overtime->title); ?></td>
                                                <td><?php echo e($overtime->number_of_days); ?></td>
                                                <td><?php echo e($overtime->hours); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat( $overtime->rate)); ?></td>

                                                <td class="text-end">
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit overtime')): ?>
                                                        <a href="#" data-url="<?php echo e(URL::to('overtime/'.$overtime->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit OverTime')); ?>" class="edit-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete overtime')): ?>
                                                        <a href="#" class="delete-icon" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('overtime-delete-form-<?php echo e($overtime->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['overtime.destroy', $overtime->id],'id'=>'overtime-delete-form-'.$overtime->id]); ?>

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
            </section>
        </div>
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
                    $('#designation_id').append('<option value=""><?php echo e(__('Select any Designation')); ?></option>');
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

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/setsalary/edit.blade.php ENDPATH**/ ?>
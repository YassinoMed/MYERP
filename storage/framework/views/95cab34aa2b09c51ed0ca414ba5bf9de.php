<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Employee')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Employee')); ?></div>
                </div>
            </div>
            <form method="post" action="<?php echo e(route('employee.store')); ?>" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <div class="section-body">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Personal Detail')); ?></h4></div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <?php echo Form::label('name', 'Name'); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('name', null, ['class' => 'form-control','required' => 'required', 'placeholder' => __('Enter Name')]); ?>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('dob', 'Date of Birth'); ?>

                                                <?php echo Form::text('dob', null, ['class' => 'form-control datepicker', 'placeholder' => __('Enter Date of Birth')]); ?>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo Form::label('gender', 'Gender'); ?><span class="text-danger pl-1">*</span>
                                                <br>
                                                <?php echo e(Form::radio('gender', 'Male' , true,['class' => 'mt-2'])); ?><?php echo e(__('Male')); ?> &nbsp&nbsp&nbsp
                                                <?php echo e(Form::radio('gender', 'Female' , false)); ?><?php echo e(__('Female')); ?>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <?php echo Form::label('phone', 'Phone'); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::number('phone',null, ['class' => 'form-control', 'placeholder' => 'Enter Phone Number']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('address', 'Address'); ?>

                                        <?php echo Form::textarea('address',null, ['class' => 'form-control', 'placeholder' => 'Enter Address']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('email', 'Email'); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::email('email',null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Enter Email']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('password', 'Password'); ?><span class="text-danger pl-1">*</span>
                                        <?php echo Form::text('password',null, ['class' => 'form-control','required' => 'required', 'placeholder' => 'Enter Password']); ?>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Company Detail')); ?></h4></div>
                                <div class="card-body">

                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <?php echo Form::label('employee_id', 'Employee ID'); ?>

                                        <?php echo Form::text('employee_id', \Illuminate\Support\Facades\Auth::user()->employeeIdFormat(1), ['class' => 'form-control','disabled'=>'disabled', 'placeholder' => 'Enter Employee ID']); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('branch_id', __('Branch'))); ?>

                                        <?php echo e(Form::select('branch_id', $branches,null, array('class' => 'form-control select2','required'=>'required', 'placeholder' => 'Select Branch'))); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('department_id', __('Department'))); ?>

                                        <?php echo e(Form::select('department_id', $departments,null, array('class' => 'form-control select2','id'=>'department_id','required'=>'required', 'placeholder' => 'Select Department'))); ?>

                                    </div>

                                    <div class="form-group">
                                        <?php echo e(Form::label('designation_id', __('Designation'))); ?>

                                        <select class="select2 form-control select2-multiple" id="designation_id" name="designation_id" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>">
                                            <option value=""><?php echo e(__('Select any Designation')); ?></option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <?php echo Form::label('company_doj', 'Company Date Of Joining'); ?>

                                        <?php echo Form::text('company_doj', null, ['class' => 'form-control datepicker','required' => 'required', 'placeholder' => 'Company Date of Joining']); ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Document')); ?></h4></div>
                                <div class="card-body">
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="row">
                                            <div class="form-group col-10">
                                                <div class="float-left">
                                                    <label for="document" class="float-left pt-1"><?php echo e($document->name); ?> <?php if($document->is_required == 1): ?> <span class="text-danger">*</span> <?php endif; ?></label>
                                                </div>
                                                <div class="float-right">
                                                    <input class="form-control float-right <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> border-0" <?php if($document->is_required == 1): ?> required <?php endif; ?> name="document[<?php echo e($document->id); ?>]" type="file" id="document[<?php echo e($document->id); ?>]" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-header"><h4><?php echo e(__('Bank Account Detail')); ?></h4></div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <?php echo Form::label('account_holder_name', 'Account Holder Name'); ?>

                                        <?php echo Form::text('account_holder_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Account Holder Name']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('account_number', 'Account Number'); ?>

                                        <?php echo Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => 'Enter Account Number']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('bank_name', 'Bank Name'); ?>

                                        <?php echo Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Bank Name']); ?>


                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('bank_identifier_code', 'Bank Identifier Code'); ?>

                                        <?php echo Form::text('bank_identifier_code',null, ['class' => 'form-control', 'placeholder' => 'Enter Bank Identifier Code']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('branch_location', 'Branch Location'); ?>

                                        <?php echo Form::text('branch_location',null, ['class' => 'form-control', 'placeholder' => 'Enter Branch Location']); ?>

                                    </div>
                                    <div class="form-group">
                                        <?php echo Form::label('tax_payer_id', 'Tax Payer Id'); ?>

                                        <?php echo Form::text('tax_payer_id',null, ['class' => 'form-control', 'placeholder' => 'Enter Tax Payer Id']); ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo Form::submit('save', ['class' => 'btn btn-primary btn-lg float-right']); ?>

            <?php echo Form::close(); ?>

        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>

    <script>

        $(document).ready(function () {
            var d_id = $('#department_id').val();
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=department_id]', function () {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        $(function getDesignation(did) {
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
                        $('#designation_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/payslip/create.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Employee')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(url('employee')); ?>"><?php echo e(__('Employee')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create Employee')); ?></li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <?php echo e(Form::open(['route' => ['employee.store'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class'=>'needs-validation', 'novalidate'])); ?>

    <div class="">
        <div class="">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card em-card">
                        <div class="card-header">
                            <h5><?php echo e(__('Personal Detail')); ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('name', __('Name'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <?php echo Form::text('name', old('name'), ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>__('Enter employee name')]); ?>

                                </div>
                                <div class="col-md-6">
                                    <?php if (isset($component)) { $__componentOriginal5d1845474bd0b0647eed674e26ea3910 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5d1845474bd0b0647eed674e26ea3910 = $attributes; } ?>
<?php $component = App\View\Components\Mobile::resolve(['label' => ''.e(__('Phone')).'','name' => 'phone','value' => ''.e(old('phone')).'','required' => true,'placeholder' => 'Enter employee phone'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mobile'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Mobile::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5d1845474bd0b0647eed674e26ea3910)): ?>
<?php $attributes = $__attributesOriginal5d1845474bd0b0647eed674e26ea3910; ?>
<?php unset($__attributesOriginal5d1845474bd0b0647eed674e26ea3910); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d1845474bd0b0647eed674e26ea3910)): ?>
<?php $component = $__componentOriginal5d1845474bd0b0647eed674e26ea3910; ?>
<?php unset($__componentOriginal5d1845474bd0b0647eed674e26ea3910); ?>
<?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo Form::label('dob', __('Date of Birth'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                        <?php echo e(Form::date('dob', null, ['class' => 'form-control ', 'required' => 'required', 'autocomplete' => 'off','placeholder'=>'Select Date of Birth', 'max' => date('Y-m-d')])); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <?php echo Form::label('gender', __('Gender'), ['class' => 'form-label' , 'required' => 'required' ]); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                        <div class="d-flex radio-check">
                                            <div class="form-check form-check-inline form-group">
                                                <input type="radio" id="g_male" value="Male" name="gender"
                                                    class="form-check-input" checked>
                                                <label class="form-check-label" for="g_male"><?php echo e(__('Male')); ?></label>
                                            </div>
                                            <div class="form-check form-check-inline form-group">
                                                <input type="radio" id="g_female" value="Female" name="gender"
                                                    class="form-check-input" >
                                                <label class="form-check-label" for="g_female"><?php echo e(__('Female')); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('email', __('Email'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <?php echo Form::email('email', old('email'), ['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Enter employee email']); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('password', __('Password'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <?php echo Form::password('password',['class' => 'form-control', 'required' => 'required' ,'placeholder'=>'Enter employee new password']); ?>

                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <?php echo Form::label('address', __('Address'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                <?php echo Form::textarea('address', old('address'), ['class' => 'form-control', 'rows' => 2 ,'placeholder'=>__('Enter employee address') , 'required' => 'required']); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card em-card">
                        <div class="card-header">
                            <h5><?php echo e(__('Company Detail')); ?></h5>
                        </div>
                        <div class="card-body employee-detail-create-body">
                            <div class="row">
                                <?php echo csrf_field(); ?>
                                <div class="form-group ">
                                    <?php echo Form::label('employee_id', __('Employee ID'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('employee_id', $employeesId, ['class' => 'form-control', 'disabled' => 'disabled']); ?>

                                </div>

                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('branch_id', __('Select Branch'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::select('branch_id', $branches, null, ['class' => 'form-control ', 'id' => 'branch_id', 'placeholder' => 'Select Branch','required' => 'required'])); ?>

                                        <div class="text-xs mt-1">
                                            <?php echo e(__('Create branch here.')); ?> <a href="<?php echo e(route('branch.index')); ?>"><b><?php echo e(__('Create branch')); ?></b></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('department_id', __('Select Department'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::select('department_id', $departments, null, ['class' => 'form-control ', 'id' => 'department_id' , 'placeholder' => 'Select Department','required' => 'required'])); ?>

                                        <div class="text-xs mt-1">
                                            <?php echo e(__('Create department here.')); ?> <a href="<?php echo e(route('department.index')); ?>"><b><?php echo e(__('Create department')); ?></b></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <?php echo e(Form::label('designation_id', __('Select Designation'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>

                                    <div class="form-icon-user">
                                        <?php echo e(Form::select('designation_id', $designations, null, ['class' => 'form-control ', 'id' => 'designation_id' , 'placeholder' => 'Select Designation','required' => 'required'])); ?>

                                        <div class="text-xs mt-1">
                                            <?php echo e(__('Create designation here.')); ?> <a href="<?php echo e(route('designation.index')); ?>"><b><?php echo e(__('Create designation')); ?></b></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('company_doj', __('Company Date Of Joining'), ['class' => '  form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                    <?php echo e(Form::date('company_doj', null, ['class' => 'form-control ', 'required' => 'required', 'autocomplete' => 'off' ,'placeholder'=>'Select company date of joining'])); ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="card em-card w-100">
                        <div class="card-header">
                            <h5><?php echo e(__('Document')); ?></h6>
                        </div>
                        <div class="card-body employee-detail-create-body">
                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row">
                                    <div class="form-group col-12 d-flex">
                                        <div class="float-left col-4">
                                            <label for="document"
                                                class="float-left form-label"><?php echo e($document->name); ?>

                                                <?php if($document->is_required == 1): ?>
                                                    <?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                                <?php endif; ?>
                                            </label>
                                        </div>
                                        <div class="float-right col-8">
                                            <input type="hidden" name="emp_doc_id[<?php echo e($document->id); ?>]" id=""
                                                value="<?php echo e($document->id); ?>">
                                            <div class="choose-files">
                                                <label for="document[<?php echo e($document->id); ?>]">
                                                    <div class=" bg-primary document "> <i
                                                            class="ti ti-upload "></i><?php echo e(__('Choose file here')); ?>

                                                    </div>
                                                    <input type="file"
                                                        class="form-control file file-validate d-none <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                        <?php if($document->is_required == 1): ?> required <?php endif; ?>
                                                        name="document[<?php echo e($document->id); ?>]" id="document[<?php echo e($document->id); ?>]"
                                                        data-filename="<?php echo e($document->id . '_filename'); ?>" onchange="document.getElementById('<?php echo e('blah'.$key); ?>').src = window.URL.createObjectURL(this.files[0])">
                                                    <p id="" class="file-error text-danger"></p>
                                                </label>
                                                <img id="<?php echo e('blah'.$key); ?>" src=""  width="50%" />

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="card em-card">
                        <div class="card-header">
                            <h5><?php echo e(__('Bank Account Detail')); ?></h5>
                        </div>
                        <div class="card-body employee-detail-create-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('account_holder_name', __('Account Holder Name'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('account_holder_name', old('account_holder_name'), ['class' => 'form-control' ,'placeholder'=>__('Enter account holder name')]); ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('account_number', __('Account Number'), ['class' => 'form-label']); ?>

                                    <?php echo Form::number('account_number', old('account_number'), ['class' => 'form-control' ,'placeholder'=>__('Enter account number')]); ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('bank_name', __('Bank Name'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('bank_name', old('bank_name'), ['class' => 'form-control'  ,'placeholder'=>__('Enter bank name')]); ?>


                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('bank_identifier_code', __('Bank Identifier Code'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('bank_identifier_code', old('bank_identifier_code'), ['class' => 'form-control' ,'placeholder'=>__('Enter bank identifier code')]); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('branch_location', __('Branch Location'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('branch_location', old('branch_location'), ['class' => 'form-control' ,'placeholder'=>__('Enter branch location')]); ?>

                                </div>
                                <div class="form-group col-md-6">
                                    <?php echo Form::label('tax_payer_id', __('Tax Payer Id'), ['class' => 'form-label']); ?>

                                    <?php echo Form::text('tax_payer_id', old('tax_payer_id'), ['class' => 'form-control' ,'placeholder'=>__('Enter tax payer id')]); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="float-end">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" onclick="location.href = '<?php echo e(route("employee.index")); ?>';" class="btn btn-secondary me-2">
            <button type="submit" class="btn  btn-primary"><?php echo e('Create'); ?></button>
        </div>
    </div>
    <?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script>
        $('input[type="file"]').change(function(e) {
            var file = e.target.files[0].name;
            var file_name = $(this).attr('data-filename');
            $('.' + file_name).append(file);
        });
    </script>
    <script>
        $(document).ready(function() {
            var b_id = $('#branch_id').val();
            var d_id = $('#department_id').val();
            getDepartment(b_id);
            getDesignation(d_id);
        });

        $(document).on('change', 'select[name=branch_id]', function() {
            var branch_id = $(this).val();
            getDepartment(branch_id);
        });

        $(document).on('change', 'select[name=department_id]', function() {
            var department_id = $(this).val();
            getDesignation(department_id);
        });

        function getDepartment(bid) {
            $.ajax({
                url: '<?php echo e(route('employee.getdepartment')); ?>',
                type: 'POST',
                data: {
                    "branch_id": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append('<option value="">Select Department</option>');
                    $.each(data, function (key, value) {
                        $('#department_id').append('<option value="' + key + '"  >' + value + '</option>');
                    });
                }
            });
        }

        function getDesignation(did) {

            $.ajax({
                url: '<?php echo e(route('employee.json')); ?>',
                type: 'POST',
                data: {
                    "department_id": did,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    $('#designation_id').empty();
                    $('#designation_id').append('<option value="">Select Designation</option>');
                    $.each(data, function (key, value) {
                        $('#designation_id').append('<option value="' + key + '"  >' + value + '</option>');
                    });
                }


            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/employee/create.blade.php ENDPATH**/ ?>
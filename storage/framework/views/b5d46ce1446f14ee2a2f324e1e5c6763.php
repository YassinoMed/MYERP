
<?php echo e(Form::open(['url' => 'appraisal', 'method' => 'post', 'class'=>'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('branch', __('Branch'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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

                <select name="branch" id="branch" required class="form-control ">
                    <option selected disabled value=""><?php echo e(__('Select Branch')); ?></option>

                    <?php $__currentLoopData = $brances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="text-xs mt-1">
                    <?php echo e(__('Create branch here.')); ?> <a href="<?php echo e(route('branch.index')); ?>"><b><?php echo e(__('Create branch')); ?></b></a>
                </div>
            </div>
        </div>


        <div class="col-md-6 mt-2">
            <div class="form-group">
                <?php echo e(Form::label('employee', __('Employee'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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

                <div class="employee_div">

                    <select name="employee" id="employee" class="form-control" required>
                    </select>
                    <div class="text-xs mt-1">
                        <?php echo e(__('Create employee here.')); ?> <a href="<?php echo e(route('employee.index')); ?>"><b><?php echo e(__('Create employee')); ?></b></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('appraisal_date', __('Select Month'), ['class' => 'col-form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::month('appraisal_date', '', ['class' => 'form-control ','autocomplete'=>'off' ,'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('remark', __('Remarks'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::textarea('remark', null, ['class' => 'form-control', 'rows' => '3','placeholder'=>'Enter remark'])); ?>

            </div>
        </div>
    </div>
    <div class="row" id="stares">
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>




<script>
    $(document).ready(function() {
        $('#employee').empty();
        $('#employee').append('<option value=""><?php echo e(__('Select Employee')); ?></option>');
    });
    $('#employee').change(function(){

        var emp_id = $('#employee').val();
        $.ajax({
            url: "<?php echo e(route('empByStar')); ?>",
            type: "post",
            data:{
                "employee": emp_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },

            cache: false,
            success: function(data) {
                $('#stares').html(data.html);
            }
        })
    });
</script>

<script>
    $('#branch').on('change', function() {
        var branch_id = this.value;

        $.ajax({
            url: "<?php echo e(route('getemployee')); ?>",
            type: "post",
            data:{
                "branch_id": branch_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },

            cache: false,
            success: function(data) {

                $('#employee').html('<option value="">Select Employee</option>');
                $.each(data.employee, function (key, value) {
                    $("#employee").append('<option value="' + value.id + '">' + value.name + '</option>');
                });

            }
        })


    });
</script>







<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/appraisal/create.blade.php ENDPATH**/ ?>
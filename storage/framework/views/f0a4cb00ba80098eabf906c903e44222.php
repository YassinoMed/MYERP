<?php echo e(Form::open(array('url'=>'indicator','method'=>'post', 'class'=>'needs-validation', 'novalidate'))); ?>

<div class="modal-body">
    <div class="row row-gap-1">
        <div class="col-md-12">
            <div class="form-group mb-0">
                <?php echo e(Form::label('branch',__('Branch'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::select('branch',$brances,null,array('class'=>'form-control select','required'=>'required'))); ?>

                <div class="text-xs mt-1">
                    <?php echo e(__('Create branch here.')); ?> <a href="<?php echo e(route('branch.index')); ?>"><b><?php echo e(__('Create branch')); ?></b></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <?php echo e(Form::label('department',__('Department'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::select('department',$departments,null,array('class'=>'form-control select','required'=>'required'))); ?>

                <div class="text-xs mt-1">
                    <?php echo e(__('Create department here.')); ?> <a href="<?php echo e(route('department.index')); ?>"><b><?php echo e(__('Create department')); ?></b></a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <?php echo e(Form::label('designation',__('Designation'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <select class="select form-control select2-multiple" id="designation_id" name="designation" data-toggle="select2" data-placeholder="<?php echo e(__('Select Designation ...')); ?>" required>
                </select>
                <div class="text-xs mt-1">
                    <?php echo e(__('Create designation here.')); ?> <a href="<?php echo e(route('designation.index')); ?>"><b><?php echo e(__('Create designation')); ?></b></a>
                </div>
            </div>
        </div>

    </div>
    <?php $__currentLoopData = $performance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $performances): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-12 mt-3">
                    <h6><?php echo e($performances->name); ?></h6>
            <hr class="mt-0">
        </div>

        <?php $__currentLoopData = $performances->types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6">
                    <?php echo e($types->name); ?>

            </div>
            <div class="col-6">
                <fieldset id='demo1' class="rating">
                    <input class="stars" type="radio" id="technical-5-<?php echo e($types->id); ?>" name="rating[<?php echo e($types->id); ?>]" value="5"/>
                    <label class="full" for="technical-5-<?php echo e($types->id); ?>" title="Awesome - 5 stars"></label>
                    <input class="stars" type="radio" id="technical-4-<?php echo e($types->id); ?>" name="rating[<?php echo e($types->id); ?>]" value="4"/>
                    <label class="full" for="technical-4-<?php echo e($types->id); ?>" title="Pretty good - 4 stars"></label>
                    <input class="stars" type="radio" id="technical-3-<?php echo e($types->id); ?>" name="rating[<?php echo e($types->id); ?>]" value="3"/>
                    <label class="full" for="technical-3-<?php echo e($types->id); ?>" title="Meh - 3 stars"></label>
                    <input class="stars" type="radio" id="technical-2-<?php echo e($types->id); ?>" name="rating[<?php echo e($types->id); ?>]" value="2"/>
                    <label class="full" for="technical-2-<?php echo e($types->id); ?>" title="Kinda bad - 2 stars"></label>
                    <input class="stars" type="radio" id="technical-1-<?php echo e($types->id); ?>" name="rating[<?php echo e($types->id); ?>]" value="1"/>
                    <label class="full" for="technical-1-<?php echo e($types->id); ?>" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>


<script>
    $(document).ready(function() {
        $('#designation_id').empty();
        $('#designation_id').append('<option value=""><?php echo e(__('Select Designation')); ?></option>');
    });
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/indicator/create.blade.php ENDPATH**/ ?>
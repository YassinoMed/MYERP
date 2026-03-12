<?php echo e(Form::model($workCenter, ['route' => ['production.work-centers.update', $workCenter->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Name')])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::select('type', ['machine' => __('Machine'), 'workshop' => __('Workshop'), 'employee' => __('Employee')], null, ['class' => 'form-control', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('industrial_resource_id', __('Industrial Resource'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('industrial_resource_id', $resources, null, ['class' => 'form-control', 'placeholder' => __('Select Industrial Resource')])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('machine_code', __('Machine Code'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('machine_code', null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('cost_per_hour', __('Cost / Hour'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('cost_per_hour', null, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('capacity_hours_per_day', __('Capacity Hours / Day'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('capacity_hours_per_day', null, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('capacity_workers', __('Capacity Workers'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('capacity_workers', null, ['class' => 'form-control', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-12">
            <div class="form-check form-switch mt-2">
                <input class="form-check-input" type="checkbox" name="is_bottleneck" id="is_bottleneck" <?php echo e($workCenter->is_bottleneck ? 'checked' : ''); ?>>
                <label class="form-check-label" for="is_bottleneck"><?php echo e(__('Bottleneck Resource')); ?></label>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/work_centers/edit.blade.php ENDPATH**/ ?>
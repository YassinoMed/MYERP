<?php echo e(Form::model($resource, ['route' => ['production.resources.update', $resource->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
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
            <?php echo e(Form::select('type', ['site' => __('Site'), 'workshop' => __('Workshop'), 'line' => __('Line'), 'station' => __('Station')], null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('parent_id', __('Parent Resource'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('parent_id', $parentResources, null, ['class' => 'form-control', 'placeholder' => __('Select Parent Resource')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('code', __('Code'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('code', null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-6">
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
            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('branch_id', __('Branch'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('branch_id', $branches, null, ['class' => 'form-control', 'placeholder' => __('Select Branch')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('manager_id', __('Manager'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('manager_id', $managers, null, ['class' => 'form-control', 'placeholder' => __('Select Manager')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('status', ['active' => __('Active'), 'inactive' => __('Inactive'), 'maintenance' => __('Maintenance')], null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('capacity_hours_per_day', __('Hours / Day'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('capacity_hours_per_day', null, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('capacity_workers', __('Workers'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('capacity_workers', null, ['class' => 'form-control', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/industrial_resources/edit.blade.php ENDPATH**/ ?>
<?php echo e(Form::open(['route' => 'medical-services.store', 'method' => 'post'])); ?>

<div class="modal-body"><div class="row">
    <div class="col-md-6"><?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?></div>
    <div class="col-md-6"><?php echo e(Form::label('code', __('Code'), ['class' => 'form-label'])); ?><?php echo e(Form::text('code', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('service_type', __('Type'), ['class' => 'form-label'])); ?><?php echo e(Form::text('service_type', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('product_service_id', __('Linked Product/Service'), ['class' => 'form-label'])); ?><?php echo e(Form::select('product_service_id', $products, null, ['class' => 'form-control', 'placeholder' => __('Select')])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('price', __('Price'), ['class' => 'form-label'])); ?><?php echo e(Form::number('price', 0, ['class' => 'form-control', 'step' => '0.01', 'min' => '0'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('default_coverage_rate', __('Default Coverage %'), ['class' => 'form-label'])); ?><?php echo e(Form::number('default_coverage_rate', 0, ['class' => 'form-control', 'step' => '0.01', 'min' => '0', 'max' => '100'])); ?></div>
    <div class="col-12 mt-2"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical_service/create.blade.php ENDPATH**/ ?>
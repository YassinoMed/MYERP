<?php echo e(Form::model($medication, ['route' => ['pharmacy-medications.update', $medication->id], 'method' => 'put'])); ?>

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
    <div class="col-md-6"><?php echo e(Form::label('product_service_id', __('Linked Product/Service'), ['class' => 'form-label'])); ?><?php echo e(Form::select('product_service_id', $products, null, ['class' => 'form-control', 'placeholder' => __('Select')])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('sku', __('SKU'), ['class' => 'form-label'])); ?><?php echo e(Form::text('sku', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('dosage_form', __('Dosage Form'), ['class' => 'form-label'])); ?><?php echo e(Form::text('dosage_form', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('strength', __('Strength'), ['class' => 'form-label'])); ?><?php echo e(Form::text('strength', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('lot_number', __('Lot Number'), ['class' => 'form-label'])); ?><?php echo e(Form::text('lot_number', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('expiry_date', __('Expiry Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('expiry_date', $medication->expiry_date?->format('Y-m-d'), ['class' => 'form-control'])); ?></div>
    <div class="col-md-4 mt-2"><?php echo e(Form::label('unit_price', __('Unit Price'), ['class' => 'form-label'])); ?><?php echo e(Form::number('unit_price', null, ['class' => 'form-control', 'step' => '0.01'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('stock_quantity', __('Stock Quantity'), ['class' => 'form-label'])); ?><?php echo e(Form::number('stock_quantity', null, ['class' => 'form-control', 'step' => '0.01'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('reorder_level', __('Reorder Level'), ['class' => 'form-label'])); ?><?php echo e(Form::number('reorder_level', null, ['class' => 'form-control', 'step' => '0.01'])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/pharmacy_medication/edit.blade.php ENDPATH**/ ?>
<?php echo e(Form::open(['url' => 'configuration-items', 'method' => 'post'])); ?>

<div class="modal-body"><div class="row">
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('name', __('Name'), ['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('name', null, ['class'=>'form-control','required'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('ci_type', __('Type'), ['class'=>'form-label'])); ?><?php echo e(Form::text('ci_type', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('status', __('Status'), ['class'=>'form-label'])); ?><?php echo e(Form::select('status', $statuses, 'active', ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('criticality', __('Criticality'), ['class'=>'form-label'])); ?><?php echo e(Form::select('criticality', $criticalities, null, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('asset_id', __('Linked Asset'), ['class'=>'form-label'])); ?><?php echo e(Form::select('asset_id', $assets, null, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('owner_user_id', __('Owner'), ['class'=>'form-label'])); ?><?php echo e(Form::select('owner_user_id', $users, null, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('asset_tag', __('Asset Tag'), ['class'=>'form-label'])); ?><?php echo e(Form::text('asset_tag', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('serial_number', __('Serial Number'), ['class'=>'form-label'])); ?><?php echo e(Form::text('serial_number', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('vendor_name', __('Vendor'), ['class'=>'form-label'])); ?><?php echo e(Form::text('vendor_name', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('location', __('Location'), ['class'=>'form-label'])); ?><?php echo e(Form::text('location', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('environment', __('Environment'), ['class'=>'form-label'])); ?><?php echo e(Form::text('environment', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('acquired_at', __('Acquired At'), ['class'=>'form-label'])); ?><?php echo e(Form::date('acquired_at', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-12"><div class="form-group"><?php echo e(Form::label('notes', __('Notes'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class'=>'form-control'])); ?></div></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/configuration_items/create.blade.php ENDPATH**/ ?>
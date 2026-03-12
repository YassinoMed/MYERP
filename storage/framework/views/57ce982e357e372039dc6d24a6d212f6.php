<?php echo e(Form::model($softwareLicense, ['route' => ['software-licenses.update', $softwareLicense->id], 'method' => 'PUT'])); ?>

<div class="modal-body"><div class="row">
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('name', __('License Name'), ['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('license_type', __('Type'), ['class'=>'form-label'])); ?><?php echo e(Form::text('license_type', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('status', __('Status'), ['class'=>'form-label'])); ?><?php echo e(Form::select('status', $statuses, $softwareLicense->status, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('vendor_name', __('Vendor'), ['class'=>'form-label'])); ?><?php echo e(Form::text('vendor_name', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('configuration_item_id', __('Configuration Item'), ['class'=>'form-label'])); ?><?php echo e(Form::select('configuration_item_id', $configurationItems, $softwareLicense->configuration_item_id, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('assigned_user_id', __('Assigned User'), ['class'=>'form-label'])); ?><?php echo e(Form::select('assigned_user_id', $users, $softwareLicense->assigned_user_id, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('license_key', __('License Key'), ['class'=>'form-label'])); ?><?php echo e(Form::text('license_key', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('seats_total', __('Seats Total'), ['class'=>'form-label'])); ?><?php echo e(Form::number('seats_total', null, ['class'=>'form-control','min'=>'1'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('seats_used', __('Seats Used'), ['class'=>'form-label'])); ?><?php echo e(Form::number('seats_used', null, ['class'=>'form-control','min'=>'0'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('renewal_date', __('Renewal Date'), ['class'=>'form-label'])); ?><?php echo e(Form::date('renewal_date', optional($softwareLicense->renewal_date)->format('Y-m-d'), ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('cost', __('Cost'), ['class'=>'form-label'])); ?><?php echo e(Form::number('cost', null, ['class'=>'form-control','step'=>'0.01','min'=>'0'])); ?></div></div>
<div class="col-12"><div class="form-group"><?php echo e(Form::label('notes', __('Notes'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class'=>'form-control'])); ?></div></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/software_licenses/edit.blade.php ENDPATH**/ ?>
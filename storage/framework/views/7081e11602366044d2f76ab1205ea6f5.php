<?php echo e(Form::open(['url' => 'security-incidents', 'method' => 'post'])); ?>

<div class="modal-body"><div class="row">
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('title', __('Title'), ['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('title', null, ['class'=>'form-control','required'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('incident_type', __('Type'), ['class'=>'form-label'])); ?><?php echo e(Form::text('incident_type', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-3"><div class="form-group"><?php echo e(Form::label('status', __('Status'), ['class'=>'form-label'])); ?><?php echo e(Form::select('status', $statuses, 'open', ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('severity', __('Severity'), ['class'=>'form-label'])); ?><?php echo e(Form::select('severity', $severities, 'medium', ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('reported_by', __('Reported By'), ['class'=>'form-label'])); ?><?php echo e(Form::select('reported_by', $users, Auth::id(), ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-4"><div class="form-group"><?php echo e(Form::label('owner_id', __('Owner'), ['class'=>'form-label'])); ?><?php echo e(Form::select('owner_id', $users, null, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('affected_module', __('Affected Module'), ['class'=>'form-label'])); ?><?php echo e(Form::text('affected_module', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('detected_at', __('Detected At'), ['class'=>'form-label'])); ?><?php echo e(Form::datetimeLocal('detected_at', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-12"><div class="form-group"><?php echo e(Form::label('summary', __('Summary'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('summary', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('containment_actions', __('Containment Actions'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('containment_actions', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('resolution_notes', __('Resolution Notes'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('resolution_notes', null, ['class'=>'form-control'])); ?></div></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/security_incidents/create.blade.php ENDPATH**/ ?>
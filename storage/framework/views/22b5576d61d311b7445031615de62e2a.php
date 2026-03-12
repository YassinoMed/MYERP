<?php echo e(Form::model($gdprActivity, ['route' => ['gdpr-activities.update', $gdprActivity->id], 'method' => 'PUT'])); ?>

<div class="modal-body"><div class="row">
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('activity_name', __('Activity Name'), ['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('activity_name', null, ['class'=>'form-control','required'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('status', __('Status'), ['class'=>'form-label'])); ?><?php echo e(Form::select('status', $statuses, $gdprActivity->status, ['class'=>'form-control select'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('data_category', __('Data Category'), ['class'=>'form-label'])); ?><?php echo e(Form::text('data_category', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('purpose', __('Purpose'), ['class'=>'form-label'])); ?><?php echo e(Form::text('purpose', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('lawful_basis', __('Lawful Basis'), ['class'=>'form-label'])); ?><?php echo e(Form::text('lawful_basis', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-md-6"><div class="form-group"><?php echo e(Form::label('processor_name', __('Processor'), ['class'=>'form-label'])); ?><?php echo e(Form::text('processor_name', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-12"><div class="form-group"><?php echo e(Form::label('retention_period', __('Retention Period'), ['class'=>'form-label'])); ?><?php echo e(Form::text('retention_period', null, ['class'=>'form-control'])); ?></div></div>
<div class="col-12"><div class="form-group"><?php echo e(Form::label('notes', __('Notes'), ['class'=>'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class'=>'form-control'])); ?></div></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/gdpr_processing_activities/edit.blade.php ENDPATH**/ ?>
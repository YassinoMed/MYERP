<?php echo e(Form::model($visitor, ['route' => ['visitors.update', $visitor->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('visitor_name', __('Visitor Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('visitor_name', null, ['class' => 'form-control', 'required' => 'required'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('company_name', __('Company'), ['class' => 'form-label'])); ?><?php echo e(Form::text('company_name', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?><?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('phone', __('Phone'), ['class' => 'form-label'])); ?><?php echo e(Form::text('phone', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('host_employee_id', __('Host Employee'), ['class' => 'form-label'])); ?><?php echo e(Form::select('host_employee_id', $employees, $visitor->host_employee_id, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-3"><div class="form-group"><?php echo e(Form::label('visit_date', __('Visit Date'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::date('visit_date', $visitor->visit_date, ['class' => 'form-control', 'required' => 'required'])); ?></div></div>
        <div class="col-md-3"><div class="form-group"><?php echo e(Form::label('visit_time', __('Visit Time'), ['class' => 'form-label'])); ?><?php echo e(Form::time('visit_time', $visitor->visit_time, ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('purpose', __('Purpose'), ['class' => 'form-label'])); ?><?php echo e(Form::text('purpose', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-3"><div class="form-group"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::select('status', $statuses, $visitor->status, ['class' => 'form-control select', 'required' => 'required'])); ?></div></div>
        <div class="col-md-3"><div class="form-group"><?php echo e(Form::label('badge_number', __('Badge Number'), ['class' => 'form-label'])); ?><?php echo e(Form::text('badge_number', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-12"><div class="form-group"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control'])); ?></div></div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/visitors/edit.blade.php ENDPATH**/ ?>
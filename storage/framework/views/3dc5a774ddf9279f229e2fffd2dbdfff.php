<?php echo e(Form::open(['url' => 'internal-itsm', 'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('subject', __('Subject'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::text('subject', null, ['class' => 'form-control', 'required'])); ?></div></div>
        <div class="col-md-3"><div class="form-group"><?php echo e(Form::label('ticket_type', __('Type'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
<?php endif; ?><?php echo e(Form::select('ticket_type', $ticketTypes, null, ['class' => 'form-control select', 'required'])); ?></div></div>
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
<?php endif; ?><?php echo e(Form::select('status', $statuses, 'Open', ['class' => 'form-control select', 'required'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('user', __('Assignee'), ['class' => 'form-label'])); ?><?php echo e(Form::select('user', $users, null, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('support_category_id', __('Category'), ['class' => 'form-label'])); ?><?php echo e(Form::select('support_category_id', $categories, null, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('configuration_item_id', __('Configuration Item'), ['class' => 'form-label'])); ?><?php echo e(Form::select('configuration_item_id', $configurationItems, null, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('priority', __('Priority'), ['class' => 'form-label'])); ?><?php echo e(Form::select('priority', $priorities, 'Medium', ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('impact_level', __('Impact'), ['class' => 'form-label'])); ?><?php echo e(Form::select('impact_level', $impactLevels, null, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-4"><div class="form-group"><?php echo e(Form::label('urgency_level', __('Urgency'), ['class' => 'form-label'])); ?><?php echo e(Form::select('urgency_level', $urgencyLevels, null, ['class' => 'form-control select'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('end_date', __('Target Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('end_date', now()->format('Y-m-d'), ['class' => 'form-control'])); ?></div></div>
        <div class="col-md-6"><div class="form-group"><?php echo e(Form::label('resolution_due_at', __('Resolution Due At'), ['class' => 'form-label'])); ?><?php echo e(Form::datetimeLocal('resolution_due_at', null, ['class' => 'form-control'])); ?></div></div>
        <div class="col-12"><div class="form-group"><?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('description', null, ['class' => 'form-control'])); ?></div></div>
    </div>
</div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/internal_itsm/create.blade.php ENDPATH**/ ?>
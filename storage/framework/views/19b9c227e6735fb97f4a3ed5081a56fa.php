<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Name')); ?></label><input type="text" name="name" class="form-control" value="<?php echo e(old('name', $automationRule->name ?? '')); ?>" required></div>
    <div class="col-md-4 mb-3"><label class="form-label"><?php echo e(__('Event Name')); ?></label><input type="text" name="event_name" class="form-control" list="automation-event-catalog" value="<?php echo e(old('event_name', $automationRule->event_name ?? '')); ?>" required></div>
    <div class="col-md-2 mb-3"><label class="form-label"><?php echo e(__('Priority')); ?></label><input type="number" name="priority" class="form-control" value="<?php echo e(old('priority', $automationRule->priority ?? 0)); ?>"></div>
    <div class="col-md-2 mb-3"><div class="form-check mt-4"><input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $automationRule->is_active ?? true) ? 'checked' : ''); ?>><label class="form-check-label"><?php echo e(__('Active')); ?></label></div></div>
    <div class="col-12 mb-3"><label class="form-label"><?php echo e(__('Description')); ?></label><textarea name="description" class="form-control"><?php echo e(old('description', $automationRule->description ?? '')); ?></textarea></div>
    <div class="col-12">
        <div class="alert alert-light border">
            <div class="fw-semibold mb-1"><?php echo e(__('Available rule building blocks')); ?></div>
            <div class="small text-muted mb-2"><?php echo e(__('Use existing event names and placeholders to keep rules consistent across modules.')); ?></div>
            <div class="mb-2"><strong><?php echo e(__('Events')); ?>:</strong> <?php echo e(implode(', ', $eventCatalog ?? [])); ?></div>
            <div><strong><?php echo e(__('Condition fields')); ?>:</strong> <?php echo e(implode(', ', $conditionFields ?? [])); ?></div>
        </div>
    </div>
</div>
<datalist id="automation-event-catalog">
    <?php $__currentLoopData = $eventCatalog ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($eventName); ?>"></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</datalist>
<div class="card mb-3"><div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0"><?php echo e(__('Conditions')); ?></h5><button type="button" class="btn btn-sm btn-primary" onclick="addConditionRow()"><?php echo e(__('Add Condition')); ?></button></div><div class="card-body" id="conditions-wrap">
<?php ($conditions = old('conditions', $automationRule->conditions ?? [['field' => '', 'operator' => 'equals', 'value' => '']])); ?>
<?php $__currentLoopData = $conditions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $condition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row mb-2 condition-row">
    <div class="col-md-4"><input type="text" name="conditions[<?php echo e($index); ?>][field]" class="form-control" list="automation-condition-fields" value="<?php echo e($condition['field'] ?? ''); ?>" placeholder="amount"></div>
    <div class="col-md-3"><select name="conditions[<?php echo e($index); ?>][operator]" class="form-control"><?php $__currentLoopData = ['equals','not_equals','contains','greater_than','less_than','in']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($op); ?>" <?php echo e(($condition['operator'] ?? '') === $op ? 'selected' : ''); ?>><?php echo e($op); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
    <div class="col-md-4"><input type="text" name="conditions[<?php echo e($index); ?>][value]" class="form-control" value="<?php echo e($condition['value'] ?? ''); ?>" placeholder="1000"></div>
    <div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.condition-row').remove()">×</button></div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div></div>
<datalist id="automation-condition-fields">
    <?php $__currentLoopData = $conditionFields ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($fieldName); ?>"></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</datalist>
<div class="card mb-3"><div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0"><?php echo e(__('Actions')); ?></h5><button type="button" class="btn btn-sm btn-primary" onclick="addActionRow()"><?php echo e(__('Add Action')); ?></button></div><div class="card-body" id="actions-wrap">
<?php ($actions = old('actions', $automationRule->actions ?? [['type' => 'notification', 'data' => ['message' => '']]])); ?>
<?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="border rounded p-3 mb-3 action-row">
    <div class="row">
        <div class="col-md-3"><select name="actions[<?php echo e($index); ?>][type]" class="form-control"><?php $__currentLoopData = ($actionCatalog ?? ['notification' => 'notification','email' => 'email','task' => 'task','update_field' => 'update_field','webhook' => 'webhook','audit_log' => 'audit_log','approval_request' => 'approval_request','zapier_hook' => 'zapier_hook']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type); ?>" <?php echo e(($action['type'] ?? '') === $type ? 'selected' : ''); ?>><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
        <div class="col-md-8"><input type="text" name="actions[<?php echo e($index); ?>][data][message]" class="form-control" value="<?php echo e(data_get($action, 'data.message') ?? ''); ?>" placeholder="Message / body"></div>
        <div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.action-row').remove()">×</button></div>
        <div class="col-md-3 mt-2"><input type="text" name="actions[<?php echo e($index); ?>][data][title]" class="form-control" value="<?php echo e(data_get($action, 'data.title') ?? ''); ?>" placeholder="Title"></div>
        <div class="col-md-3 mt-2"><input type="text" name="actions[<?php echo e($index); ?>][data][field]" class="form-control" value="<?php echo e(data_get($action, 'data.field') ?? ''); ?>" placeholder="Field"></div>
        <div class="col-md-3 mt-2"><input type="text" name="actions[<?php echo e($index); ?>][data][value]" class="form-control" value="<?php echo e(data_get($action, 'data.value') ?? ''); ?>" placeholder="Value"></div>
        <div class="col-md-3 mt-2"><input type="text" name="actions[<?php echo e($index); ?>][data][url]" class="form-control" value="<?php echo e(data_get($action, 'data.url') ?? ''); ?>" placeholder="URL"></div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div></div>
<div><button class="btn btn-primary"><?php echo e(__('Save')); ?></button> <a href="<?php echo e(route('automation-rules.index')); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a></div>
<script>
let conditionIndex = <?php echo e(count($conditions ?? [])); ?>;
let actionIndex = <?php echo e(count($actions ?? [])); ?>;
function addConditionRow(){document.getElementById('conditions-wrap').insertAdjacentHTML('beforeend', `<div class="row mb-2 condition-row"><div class="col-md-4"><input type="text" name="conditions[${conditionIndex}][field]" class="form-control" list="automation-condition-fields" placeholder="amount"></div><div class="col-md-3"><select name="conditions[${conditionIndex}][operator]" class="form-control"><option value="equals">equals</option><option value="not_equals">not_equals</option><option value="contains">contains</option><option value="greater_than">greater_than</option><option value="less_than">less_than</option><option value="in">in</option></select></div><div class="col-md-4"><input type="text" name="conditions[${conditionIndex}][value]" class="form-control" placeholder="1000"></div><div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.condition-row').remove()">×</button></div></div>`); conditionIndex++;}
function addActionRow(){document.getElementById('actions-wrap').insertAdjacentHTML('beforeend', `<div class="border rounded p-3 mb-3 action-row"><div class="row"><div class="col-md-3"><select name="actions[${actionIndex}][type]" class="form-control"><?php $__currentLoopData = ($actionCatalog ?? ['notification' => 'notification','email' => 'email','task' => 'task','update_field' => 'update_field','webhook' => 'webhook','audit_log' => 'audit_log','approval_request' => 'approval_request','zapier_hook' => 'zapier_hook']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($type); ?>"><?php echo e($label); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div><div class="col-md-8"><input type="text" name="actions[${actionIndex}][data][message]" class="form-control" placeholder="Message / body"></div><div class="col-md-1"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.action-row').remove()">×</button></div><div class="col-md-3 mt-2"><input type="text" name="actions[${actionIndex}][data][title]" class="form-control" placeholder="Title"></div><div class="col-md-3 mt-2"><input type="text" name="actions[${actionIndex}][data][field]" class="form-control" placeholder="Field"></div><div class="col-md-3 mt-2"><input type="text" name="actions[${actionIndex}][data][value]" class="form-control" placeholder="Value"></div><div class="col-md-3 mt-2"><input type="text" name="actions[${actionIndex}][data][url]" class="form-control" placeholder="URL"></div></div></div>`); actionIndex++;}
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/automation_rule/_form.blade.php ENDPATH**/ ?>
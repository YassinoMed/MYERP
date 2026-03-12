<?php echo csrf_field(); ?>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label"><?php echo e(__('Name')); ?></label>
        <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $approvalFlow->name ?? '')); ?>" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label"><?php echo e(__('Resource Type')); ?></label>
        <input type="text" name="resource_type" class="form-control" value="<?php echo e(old('resource_type', $approvalFlow->resource_type ?? '')); ?>" placeholder="App\Models\Invoice">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Min Amount')); ?></label>
        <input type="number" step="0.01" name="min_amount" class="form-control" value="<?php echo e(old('min_amount', $approvalFlow->min_amount ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Max Amount')); ?></label>
        <input type="number" step="0.01" name="max_amount" class="form-control" value="<?php echo e(old('max_amount', $approvalFlow->max_amount ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Default SLA (hours)')); ?></label>
        <input type="number" name="default_sla_hours" class="form-control" value="<?php echo e(old('default_sla_hours', $approvalFlow->default_sla_hours ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label"><?php echo e(__('Escalation User ID')); ?></label>
        <input type="number" name="escalation_user_id" class="form-control" value="<?php echo e(old('escalation_user_id', $approvalFlow->escalation_user_id ?? '')); ?>">
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="allow_delegation" value="1" <?php echo e(old('allow_delegation', $approvalFlow->allow_delegation ?? false) ? 'checked' : ''); ?>>
            <label class="form-check-label"><?php echo e(__('Allow Delegation')); ?></label>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="form-check mt-4">
            <input class="form-check-input" type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $approvalFlow->is_active ?? true) ? 'checked' : ''); ?>>
            <label class="form-check-label"><?php echo e(__('Active')); ?></label>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?php echo e(__('Approval Steps')); ?></h5>
        <button type="button" class="btn btn-sm btn-primary" onclick="addApprovalStep()"><?php echo e(__('Add Step')); ?></button>
    </div>
    <div class="card-body">
        <div id="approval-steps">
            <?php ($steps = old('steps', isset($approvalFlow) ? $approvalFlow->steps->toArray() : [['name' => '', 'approver_type' => 'user']])); ?>
            <?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border rounded p-3 mb-3 approval-step-row">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="text" name="steps[<?php echo e($index); ?>][name]" class="form-control" value="<?php echo e($step['name'] ?? ''); ?>" placeholder="<?php echo e(__('Step name')); ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <select name="steps[<?php echo e($index); ?>][approver_type]" class="form-control">
                                <option value="user" <?php echo e(($step['approver_type'] ?? '') === 'user' ? 'selected' : ''); ?>><?php echo e(__('User')); ?></option>
                                <option value="role" <?php echo e(($step['approver_type'] ?? '') === 'role' ? 'selected' : ''); ?>><?php echo e(__('Role')); ?></option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="number" name="steps[<?php echo e($index); ?>][approver_id]" class="form-control" value="<?php echo e($step['approver_id'] ?? ''); ?>" placeholder="<?php echo e(__('Approver ID')); ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="number" name="steps[<?php echo e($index); ?>][sla_hours]" class="form-control" value="<?php echo e($step['sla_hours'] ?? ''); ?>" placeholder="<?php echo e(__('SLA hours')); ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="number" name="steps[<?php echo e($index); ?>][escalation_user_id]" class="form-control" value="<?php echo e($step['escalation_user_id'] ?? ''); ?>" placeholder="<?php echo e(__('Escalation user')); ?>">
                        </div>
                        <div class="col-md-1 mb-2 text-end">
                            <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.approval-step-row').remove()">×</button>
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="number" step="0.01" name="steps[<?php echo e($index); ?>][threshold_min]" class="form-control" value="<?php echo e($step['threshold_min'] ?? ''); ?>" placeholder="<?php echo e(__('Threshold min')); ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <input type="number" step="0.01" name="steps[<?php echo e($index); ?>][threshold_max]" class="form-control" value="<?php echo e($step['threshold_max'] ?? ''); ?>" placeholder="<?php echo e(__('Threshold max')); ?>">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" name="steps[<?php echo e($index); ?>][rule_note]" class="form-control" value="<?php echo e(data_get($step, 'rule.note') ?? ($step['rule_note'] ?? '')); ?>" placeholder="<?php echo e(__('Step note / rule explanation')); ?>">
                        </div>
                        <div class="col-md-2 mb-2">
                            <div class="form-check pt-2">
                                <input type="checkbox" class="form-check-input" name="steps[<?php echo e($index); ?>][require_reject_reason]" value="1" <?php echo e(!empty($step['require_reject_reason']) ? 'checked' : ''); ?>>
                                <label class="form-check-label"><?php echo e(__('Reject reason')); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<div class="mt-3">
    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
    <a href="<?php echo e(route('approval-flows.index')); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a>
</div>

<script>
    let approvalStepIndex = <?php echo e(count($steps ?? [])); ?>;
    function addApprovalStep() {
        const container = document.getElementById('approval-steps');
        const html = `
            <div class="border rounded p-3 mb-3 approval-step-row">
                <div class="row">
                    <div class="col-md-3 mb-2"><input type="text" name="steps[${approvalStepIndex}][name]" class="form-control" placeholder="Step name"></div>
                    <div class="col-md-2 mb-2">
                        <select name="steps[${approvalStepIndex}][approver_type]" class="form-control">
                            <option value="user">User</option>
                            <option value="role">Role</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2"><input type="number" name="steps[${approvalStepIndex}][approver_id]" class="form-control" placeholder="Approver ID"></div>
                    <div class="col-md-2 mb-2"><input type="number" name="steps[${approvalStepIndex}][sla_hours]" class="form-control" placeholder="SLA hours"></div>
                    <div class="col-md-2 mb-2"><input type="number" name="steps[${approvalStepIndex}][escalation_user_id]" class="form-control" placeholder="Escalation user"></div>
                    <div class="col-md-1 mb-2 text-end"><button type="button" class="btn btn-sm btn-danger" onclick="this.closest('.approval-step-row').remove()">×</button></div>
                    <div class="col-md-2 mb-2"><input type="number" step="0.01" name="steps[${approvalStepIndex}][threshold_min]" class="form-control" placeholder="Threshold min"></div>
                    <div class="col-md-2 mb-2"><input type="number" step="0.01" name="steps[${approvalStepIndex}][threshold_max]" class="form-control" placeholder="Threshold max"></div>
                    <div class="col-md-6 mb-2"><input type="text" name="steps[${approvalStepIndex}][rule_note]" class="form-control" placeholder="Step note / rule explanation"></div>
                    <div class="col-md-2 mb-2"><div class="form-check pt-2"><input type="checkbox" class="form-check-input" name="steps[${approvalStepIndex}][require_reject_reason]" value="1"><label class="form-check-label">Reject reason</label></div></div>
                </div>
            </div>`;
        container.insertAdjacentHTML('beforeend', html);
        approvalStepIndex++;
    }
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/approval_flow/_form.blade.php ENDPATH**/ ?>
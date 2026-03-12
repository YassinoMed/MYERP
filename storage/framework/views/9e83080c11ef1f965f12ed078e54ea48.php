<?php echo e(Form::open(['url' => route('production.quality-plans.store'), 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body"><div class="row">
    <div class="form-group col-md-6"><?php echo e(Form::label('product_id', __('Product'), ['class' => 'form-label'])); ?><?php echo e(Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => __('Select Product')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('production_routing_id', __('Routing'), ['class' => 'form-label'])); ?><?php echo e(Form::select('production_routing_id', $routings, null, ['class' => 'form-control', 'placeholder' => __('Select Routing')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php echo e(Form::text('name', null, ['class' => 'form-control','required'])); ?></div>
    <div class="form-group col-md-3"><?php echo e(Form::label('check_stage', __('Stage'), ['class' => 'form-label'])); ?><?php echo e(Form::select('check_stage', ['incoming'=>__('Incoming'),'in_process'=>__('In Process'),'final'=>__('Final')], 'in_process', ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-3"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['active'=>__('Active'),'inactive'=>__('Inactive')], 'active', ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('sampling_rule', __('Sampling Rule'), ['class' => 'form-label'])); ?><?php echo e(Form::text('sampling_rule', null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('acceptance_criteria', __('Acceptance Criteria'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('acceptance_criteria', null, ['class' => 'form-control','rows'=>2])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control','rows'=>2])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/quality_plans/create.blade.php ENDPATH**/ ?>
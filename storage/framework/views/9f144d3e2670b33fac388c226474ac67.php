<?php echo e(Form::open(['url' => route('production.subcontract-orders.store'), 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body"><div class="row">
    <div class="form-group col-md-6"><?php echo e(Form::label('production_order_id', __('Production Order'), ['class' => 'form-label'])); ?><?php echo e(Form::select('production_order_id', $orders, null, ['class' => 'form-control', 'placeholder' => __('Select Production Order')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('production_routing_step_id', __('Routing Step'), ['class' => 'form-label'])); ?><?php echo e(Form::select('production_routing_step_id', $steps, null, ['class' => 'form-control', 'placeholder' => __('Select Routing Step')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('vender_id', __('Vendor'), ['class' => 'form-label'])); ?><?php echo e(Form::select('vender_id', $vendors, null, ['class' => 'form-control', 'placeholder' => __('Select Vendor')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('reference', __('Reference'), ['class' => 'form-label'])); ?><?php echo e(Form::text('reference', null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['draft'=>__('Draft'),'sent'=>__('Sent'),'in_progress'=>__('In Progress'),'received'=>__('Received'),'closed'=>__('Closed'),'cancelled'=>__('Cancelled')], 'draft', ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('quantity', __('Quantity'), ['class' => 'form-label'])); ?><?php echo e(Form::number('quantity', 1, ['class' => 'form-control','step'=>'0.0001','min'=>0.0001])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('unit_cost', __('Unit Cost'), ['class' => 'form-label'])); ?><?php echo e(Form::number('unit_cost', 0, ['class' => 'form-control','step'=>'0.01','min'=>0])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('planned_send_date', __('Planned Send Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('planned_send_date', null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('planned_receive_date', __('Planned Receive Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('planned_receive_date', null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('quality_notes', __('Quality Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('quality_notes', null, ['class' => 'form-control','rows'=>2])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control','rows'=>2])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/subcontract_orders/create.blade.php ENDPATH**/ ?>
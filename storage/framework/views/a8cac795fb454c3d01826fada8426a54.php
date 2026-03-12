<?php echo e(Form::model($maintenanceOrder, ['route' => ['production.maintenance-orders.update', $maintenanceOrder->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body"><div class="row">
    <div class="form-group col-md-6"><?php echo e(Form::label('work_center_id', __('Work Center'), ['class' => 'form-label'])); ?><?php echo e(Form::select('work_center_id', $workCenters, null, ['class' => 'form-control', 'placeholder' => __('Select Work Center')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('industrial_resource_id', __('Resource'), ['class' => 'form-label'])); ?><?php echo e(Form::select('industrial_resource_id', $resources, null, ['class' => 'form-control', 'placeholder' => __('Select Resource')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('assigned_to', __('Assigned To'), ['class' => 'form-label'])); ?><?php echo e(Form::select('assigned_to', $employees, null, ['class' => 'form-control', 'placeholder' => __('Select Employee')])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('reference', __('Reference'), ['class' => 'form-label'])); ?><?php echo e(Form::text('reference', null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?><?php echo e(Form::select('type', ['preventive'=>__('Preventive'),'corrective'=>__('Corrective'),'predictive'=>__('Predictive')], null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['open'=>__('Open'),'in_progress'=>__('In Progress'),'completed'=>__('Completed'),'cancelled'=>__('Cancelled')], null, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-4"><?php echo e(Form::label('cost', __('Cost'), ['class' => 'form-label'])); ?><?php echo e(Form::number('cost', null, ['class' => 'form-control','step'=>'0.01','min'=>0])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('planned_date', __('Planned Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('planned_date', $maintenanceOrder->planned_date, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('completed_date', __('Completed Date'), ['class' => 'form-label'])); ?><?php echo e(Form::date('completed_date', $maintenanceOrder->completed_date, ['class' => 'form-control'])); ?></div>
    <div class="form-group col-md-6"><?php echo e(Form::label('downtime_minutes', __('Downtime Minutes'), ['class' => 'form-label'])); ?><?php echo e(Form::number('downtime_minutes', null, ['class' => 'form-control','min'=>0])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('checklist', __('Checklist'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('checklist', null, ['class' => 'form-control','rows'=>2])); ?></div>
    <div class="form-group col-md-12"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control','rows'=>2])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/maintenance_orders/edit.blade.php ENDPATH**/ ?>
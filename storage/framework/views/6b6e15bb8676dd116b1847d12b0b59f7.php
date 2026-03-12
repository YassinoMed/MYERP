<?php echo e(Form::open(['route' => 'hospital-beds.store', 'method' => 'post'])); ?>

<div class="modal-body"><div class="row">
    <div class="col-md-6"><?php echo e(Form::label('hospital_room_id', __('Room'), ['class' => 'form-label'])); ?><?php echo e(Form::select('hospital_room_id', $rooms, null, ['class' => 'form-control', 'required' => 'required'])); ?></div>
    <div class="col-md-6"><?php echo e(Form::label('bed_number', __('Bed Number'), ['class' => 'form-label'])); ?><?php echo e(Form::text('bed_number', null, ['class' => 'form-control', 'required' => 'required'])); ?></div>
    <div class="col-md-12 mt-2"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['available' => __('Available'), 'occupied' => __('Occupied'), 'maintenance' => __('Maintenance')], 'available', ['class' => 'form-control'])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/hospital_bed/create.blade.php ENDPATH**/ ?>
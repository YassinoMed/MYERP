<?php echo e(Form::model($room, ['route' => ['hospital-rooms.update', $room->id], 'method' => 'put'])); ?>

<div class="modal-body"><div class="row">
    <div class="col-md-6"><?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php echo e(Form::text('name', null, ['class' => 'form-control', 'required' => 'required'])); ?></div>
    <div class="col-md-6"><?php echo e(Form::label('department', __('Department'), ['class' => 'form-label'])); ?><?php echo e(Form::text('department', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('room_type', __('Room Type'), ['class' => 'form-label'])); ?><?php echo e(Form::text('room_type', null, ['class' => 'form-control'])); ?></div>
    <div class="col-md-6 mt-2"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['available' => __('Available'), 'maintenance' => __('Maintenance'), 'occupied' => __('Occupied')], $room->status, ['class' => 'form-control'])); ?></div>
</div></div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/hospital_room/edit.blade.php ENDPATH**/ ?>
<?php echo e(Form::model($shiftTeam, ['route' => ['production.shift-teams.update', $shiftTeam->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6"><?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php echo e(Form::text('name', null, ['class' => 'form-control', 'required'])); ?></div>
        <div class="form-group col-md-6"><?php echo e(Form::label('code', __('Code'), ['class' => 'form-label'])); ?><?php echo e(Form::text('code', null, ['class' => 'form-control'])); ?></div>
        <div class="form-group col-md-6"><?php echo e(Form::label('supervisor_id', __('Supervisor'), ['class' => 'form-label'])); ?><?php echo e(Form::select('supervisor_id', $supervisors, null, ['class' => 'form-control', 'placeholder' => __('Select Supervisor')])); ?></div>
        <div class="form-group col-md-3"><?php echo e(Form::label('start_time', __('Start Time'), ['class' => 'form-label'])); ?><?php echo e(Form::time('start_time', $shiftTeam->start_time, ['class' => 'form-control'])); ?></div>
        <div class="form-group col-md-3"><?php echo e(Form::label('end_time', __('End Time'), ['class' => 'form-label'])); ?><?php echo e(Form::time('end_time', $shiftTeam->end_time, ['class' => 'form-control'])); ?></div>
        <div class="form-group col-md-6"><?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?><?php echo e(Form::select('status', ['active' => __('Active'), 'inactive' => __('Inactive')], null, ['class' => 'form-control'])); ?></div>
        <div class="form-group col-md-12"><?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?><?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3])); ?></div>
    </div>
</div>
<div class="modal-footer"><input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal"><input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary"></div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/shift_teams/edit.blade.php ENDPATH**/ ?>
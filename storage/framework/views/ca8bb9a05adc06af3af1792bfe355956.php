<?php echo e(Form::model($attendanceEmployee,array('route' => array('attendanceemployee.update', $attendanceEmployee->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-lg-6  ">
            <?php echo e(Form::label('employee_id',__('Employee'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('employee_id',$employees,null,array('class'=>'form-control select'))); ?>

            <div class="text-xs mt-1">
                <?php echo e(__('Create employee here.')); ?> <a href="<?php echo e(route('employee.index')); ?>"><b><?php echo e(__('Create employee')); ?></b></a>
            </div>
        </div>
        <div class="form-group col-lg-6 ">
            <?php echo e(Form::label('date',__('Date'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::date('date',null,array('class'=>'form-control'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-lg-6 ">
            <?php echo e(Form::label('clock_in',__('Clock In'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::time('clock_in',null,array('class'=>'form-control '))); ?>

        </div>

        <div class="form-group col-lg-6 ">
            <?php echo e(Form::label('clock_out',__('Clock Out'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::time('clock_out',null,array('class'=>'form-control '))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>




<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/attendance/edit.blade.php ENDPATH**/ ?>
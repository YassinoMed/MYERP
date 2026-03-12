<?php echo e(Form::open(array('url'=>'attendanceemployee','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('employee_id',__('Employee'))); ?>

            <?php echo e(Form::select('employee_id',$employees,null,array('class'=>'form-control select2'))); ?>

            <div class="text-xs mt-1">
                <?php echo e(__('Create employee here.')); ?> <a href="<?php echo e(route('employee.index')); ?>"><b><?php echo e(__('Create employee')); ?></b></a>
            </div>
        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('date',__('Date'))); ?>

            <?php echo e(Form::text('date',null,array('class'=>'form-control datepicker'))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('clock_in',__('Clock In'))); ?>

            <?php echo e(Form::time('clock_in',null,array('class'=>'form-control '))); ?>


        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('clock_out',__('Clock Out'))); ?>

            <?php echo e(Form::time('clock_out',null,array('class'=>'form-control '))); ?>

        </div>
    </div>
</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/attendance/create.blade.php ENDPATH**/ ?>
<div class="card bg-none card-box">
    <?php echo e(Form::model($leadstages, array('route' => array('projectstages.update', $leadstages->id), 'method' => 'PUT'))); ?>

    <div class="row">
        <div class="form-group col-12">
            <?php echo e(Form::label('name', __('Project Stage Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name', null, array('class' => 'form-control ','required'=>'required', 'placeholder'=>__('Enter Project Stage Name')))); ?>

        </div>
        <div class="form-group col-12">
            <?php echo e(Form::label('color', __('Color'),['class'=>'form-label'])); ?>

            <input class="jscolor form-control " value="<?php echo e($leadstages->color); ?>" name="color" id="color" required>
            <small class="small"><?php echo e(__('For chart representation')); ?></small>
        </div>
        <div class="col-12 text-end">
            <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/projectstages/edit.blade.php ENDPATH**/ ?>
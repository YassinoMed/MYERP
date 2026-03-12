<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url' => 'clients'))); ?>

    <div class="row">
        <div class="col-6 form-group">
            <?php echo e(Form::label('name', __('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('email', __('E-Mail Address'),['class'=>'form-label'])); ?>

            <?php echo e(Form::email('email', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('password', __('Password'),['class'=>'form-label'])); ?>

            <?php echo e(Form::password('password', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>

        <div class="form-group mt-4 mb-0">
            <?php echo e(Form::hidden('ajax',true)); ?>

            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/clients/createAjax.blade.php ENDPATH**/ ?>
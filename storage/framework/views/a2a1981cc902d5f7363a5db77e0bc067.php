<?php echo e(Form::open(array('url' => 'email_template','method' =>'post'))); ?>

<div class="row">
    <div class="form-group col-md-12">
        <?php echo e(Form::label('name',__('Name'))); ?>

        <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','required'=>'required'))); ?>

    </div>
    <div class="form-group col-md-12 text-end">
        <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/email_templates/create.blade.php ENDPATH**/ ?>
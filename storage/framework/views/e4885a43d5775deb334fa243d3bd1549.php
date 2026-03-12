<?php echo e(Form::model($deal, array('route' => array('deals.clients.update', $deal->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-12 form-group">
            <?php echo e(Form::label('clients', __('Clients'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('clients[]', $clients,false, array('class' => 'form-control select2','id'=>'choices-multiple1','multiple'=>'','required' => 'required'))); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/deals/clients.blade.php ENDPATH**/ ?>
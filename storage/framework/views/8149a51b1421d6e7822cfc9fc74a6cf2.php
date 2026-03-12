<?php echo e(Form::model($ip, ['route' => ['edit.ip', $ip->id], 'method' => 'POST'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group">
            <?php echo e(Form::label('ip', __('IP'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::text('ip', null, ['class' => 'form-control', 'placeholder' => __('Enter IP')])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/restrict_ip/edit.blade.php ENDPATH**/ ?>
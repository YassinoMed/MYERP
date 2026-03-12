<div class="card bg-none card-box">
    <?php echo e(Form::open(array('route' => array('vender.bill.send.mail',$bill_id)))); ?>

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('email', __('Email'))); ?>

            <?php echo e(Form::text('email', '', array('class' => 'form-control','required'=>'required'))); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-email" role="alert">
            <strong class="text-danger"><?php echo e($message); ?></strong>
        </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="col-md-12 px-0">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
    </div>
    <?php echo e(Form::close()); ?>


</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/vender/bill_send.blade.php ENDPATH**/ ?>
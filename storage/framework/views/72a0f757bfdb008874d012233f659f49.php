<?php echo e(Form::model($deal, array('route' => array('deals.client.permissions.store', $deal->id,$client->id), 'method' => 'PUT'))); ?>

<div class="modal-body">
    <ul class="list-group">
        <div class="row">
            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 py-2 px-2">
                    <li class="list-group-item">
                        <div class="col-12 custom-control custom-checkbox mt-2 mb-2 p-0">
                            <?php echo e(Form::checkbox('permissions[]',$permission,(in_array($permission,$selected))?true:false,['class' => 'custom-control-input','id'=>'permissions_'.$key])); ?>

                            <?php echo e(Form::label('permissions_'.$key, ucfirst($permission),['class'=>'custom-control-label ml-4'])); ?>

                        </div>
                    </li>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </ul>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/deals/permissions.blade.php ENDPATH**/ ?>
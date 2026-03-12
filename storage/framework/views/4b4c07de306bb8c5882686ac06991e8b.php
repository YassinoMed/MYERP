<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1 class="d-inline"><?php echo e(__('Role')); ?> </h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo e(__('Update Role')); ?> </h4>
                    </div>

                    <?php echo e(Form::model($role,array('route' => array('roles.update', $role->id), 'method' => 'PUT'))); ?>

                    <div class="card-body">
                        <div class="form-group">
                            <?php echo e(Form::label('name',__('Name'))); ?>

                            <?php echo e(Form::text('name',null,array('class'=>'form-control'))); ?>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-name" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <?php if(!empty($permissions)): ?>
                                <h6><?php echo e(__('Assign Permission to Roles')); ?> </h6>
                                <table class="table table-striped mb-0" id="dataTable-1">
                                    <thead>
                                    <tr>
                                        <th><?php echo e(__('Module')); ?> </th>
                                        <th><?php echo e(__('Permissions')); ?> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $modules=['user','language','account'];
                                    ?>
                                    <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(ucfirst($module)); ?></td>
                                            <td>
                                                <?php if(in_array('manage '.$module,(array) $permissions)): ?>
                                                    <?php if($key = array_search('manage '.$module,$permissions)): ?>
                                                        <div class="form-check form-check-inline">
                                                            <?php echo e(Form::checkbox('permissions[]',$key,$role->permission, ['id' =>'permission'.$key])); ?>

                                                            <?php echo e(Form::label('permission'.$key,'Manage')); ?><br>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if(in_array('create '.$module,(array) $permissions)): ?>
                                                    <?php if($key = array_search('create '.$module,$permissions)): ?>
                                                        <div class="form-check form-check-inline">
                                                            <?php echo e(Form::checkbox('permissions[]',$key,$role->permission, ['id' =>'permission'.$key])); ?>

                                                            <?php echo e(Form::label('permission'.$key,'Create')); ?><br>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if(in_array('edit '.$module,(array) $permissions)): ?>
                                                    <?php if($key = array_search('edit '.$module,$permissions)): ?>
                                                        <div class="form-check form-check-inline">
                                                            <?php echo e(Form::checkbox('permissions[]',$key,$role->permission, ['id' =>'permission'.$key])); ?>

                                                            <?php echo e(Form::label('permission'.$key,'Edit')); ?><br>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <?php if(in_array('delete '.$module,(array) $permissions)): ?>
                                                    <?php if($key = array_search('delete '.$module,$permissions)): ?>
                                                        <div class="form-check form-check-inline">
                                                            <?php echo e(Form::checkbox('permissions[]',$key,$role->permission, ['id' =>'permission'.$key])); ?>

                                                            <?php echo e(Form::label('permission'.$key,'Delete')); ?><br>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                            <?php $__errorArgs = ['permissions'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-permissions" role="alert">
                            <strong class="text-danger"><?php echo e($message); ?></strong>
                        </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <?php echo e(Form::submit(__('Update'),array('class'=>'btn btn-primary'))); ?>

                        <a href="<?php echo e(route('roles.index')); ?>" class="btn btn-danger"><?php echo e(__('Cancel')); ?> </a>
                    </div>
                    <?php echo e(Form::close()); ?>


                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<script>

</script>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/settings/edit.blade.php ENDPATH**/ ?>
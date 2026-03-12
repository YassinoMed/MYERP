<?php
    $logo=\App\Models\Utility::get_file('uploads/logo');
 $company_logo=Utility::getValByName('company_logo');
?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Forgot Password')); ?>

<?php $__env->stopSection(); ?>

<?php
    $languages = App\Models\Utility::languages();
?>


<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Reset Password')); ?></h2>
        </div>
    <?php echo e(Form::open(array('route'=>'password.update','method'=>'post','id'=>'loginForm'))); ?>

    <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
    <div class="">
        <div class="form-group mb-3">
            <?php echo e(Form::label('email',__('E-Mail Address'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control' , 'placeholder'=>__('Enter email')))); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-email text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-3">
            <?php echo e(Form::label('password',__('Password'),['class'=>'form-label'])); ?>

            <?php echo e(Form::password('password',array('class'=>'form-control' , 'placeholder'=>__('Enter Password')))); ?>

            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-password text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group mb-3">
            <?php echo e(Form::label('password_confirmation',__('Password Confirmation'),['class'=>'form-label'])); ?>

            <?php echo e(Form::password('password_confirmation',array('class'=>'form-control' , 'placeholder'=>__('Enter Confirm Password')))); ?>

            <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-password_confirmation text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="d-grid">
            <?php echo e(Form::submit(__('Reset'),array('class'=>'btn btn-primary btn-block mt-2','id'=>'resetBtn'))); ?>

        </div>

    </div>

    <?php echo e(Form::close()); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>
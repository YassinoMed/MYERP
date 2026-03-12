<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Confirm Password')); ?>

<?php $__env->stopSection(); ?>
<?php
    $logo=\App\Models\Utility::get_file('uploads/logo');
 $company_logo=Utility::getValByName('company_logo');
?>

<?php $__env->startSection('content'); ?>
<div class="card-body">
    <div class="">
        <h2 class="mb-3 f-w-600"><?php echo e(__('Confirm Password')); ?></h2>
        <p class="mb-4 text-muted">
            <?php echo e(__(' Please confirm your password before continuing.')); ?>

        </p>
    </div>
    <form method="POST" action="<?php echo e(route('password.confirm')); ?>">
        <?php echo csrf_field(); ?>
        <div class="">
            <div class="form-group mb-3">
                <label for="password" class="form-label"><?php echo e(__('Password')); ?></label>
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="<?php echo e(__('Enter Password')); ?>">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn-login btn btn-primary btn-block mt-2"><?php echo e(__('Confirm Password')); ?></button>
            </div>
            <?php if(Route::has('password.request')): ?>
                <p class="my-4 text-center"><?php echo e(__("OR")); ?> <a href="<?php echo e(route('password.request')); ?>" class="text-primary"><?php echo e(__('Forgot Your Password?')); ?></a></p>
            <?php endif; ?>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/auth/passwords/confirm.blade.php ENDPATH**/ ?>
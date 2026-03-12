<?php
    use App\Models\Utility;
    $logo=\App\Models\Utility::get_file('uploads/logo');
    $company_logo=Utility::getValByName('company_logo');
    $settings = Utility::settings();

?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Copylink')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth-topbar'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="card-body">
    <div class="">
        <h2 class="h3"><?php echo e(__('Password required')); ?></h2>
        <h6><?php echo e(__('This document is password-protected. Please enter a password.')); ?></h6>
    </div>
    <form method="POST" action="<?php echo e(route('projects.link', \Illuminate\Support\Facades\Crypt::encrypt($id))); ?>" class="needs-validation" novalidate>
        <?php echo csrf_field(); ?>
            <div class="">
                <div class="form-group ">
                    <label class="form-control-label mt-2 mb-2"><?php echo e(__('Password')); ?></label>
                    <div class="input-group input-group-merge">
                        <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="new-password" placeholder="<?php echo e(__('Enter Password')); ?>">
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
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn-login btn btn-primary btn-block mt-2" ><?php echo e(__('Save')); ?></button>
                </div>
            </div>
    </form>
</div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/projects/copylink_password.blade.php ENDPATH**/ ?>
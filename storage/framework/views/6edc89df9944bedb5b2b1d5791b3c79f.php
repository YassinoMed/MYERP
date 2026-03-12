<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Confirm Password')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card-body">
        <div>
            <h2 class="mb-3 f-w-600"><?php echo e(__('Confirm Password')); ?></h2>
        </div>

        <p class="mb-4 text-muted">
            <?php echo e(__('This is a secure area of the application. Please confirm your password before continuing.')); ?>

        </p>

        <?php echo e(Form::open(['url' => 'confirm-password', 'method' => 'post', 'class' => 'needs-validation', 'novalidate'])); ?>

        <div class="custom-login-form">
            <div class="form-group mb-3">
                <label class="form-label"><?php echo e(__('Password')); ?></label>
                <?php echo e(Form::password('password', ['class' => 'form-control', 'placeholder' => __('Enter Your Password'), 'required' => 'required'])); ?>

                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error invalid-password text-danger" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="d-grid">
                <?php echo e(Form::submit(__('Confirm'), ['class' => 'btn btn-primary mt-2'])); ?>

            </div>
        </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/auth/confirm-password.blade.php ENDPATH**/ ?>
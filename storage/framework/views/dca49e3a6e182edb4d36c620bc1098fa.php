<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(config('app.name')); ?></title>
</head>
<body>
    <div>
        <div>
            <div>
                <h2>Processing payment ...</h2>
                <p>Please wait few seconds to continue. you will be automatically redirect to payment page</p>
            </div>
            <form id="payhere-form" action="<?php echo e($action); ?>" method="POST">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <input type="hidden" name="<?php echo e($key); ?>" value="<?php echo e($value); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </form>
        </div>
    </div>

    <script type="text/javascript">

        document.getElementById('payhere-form').submit()

    </script>
</body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/vendor/lahirulhr/laravel-payhere/resources/views/recurring.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', trans('installer_messages.updater.final.title')); ?>
<?php $__env->startSection('container'); ?>
    <p class="paragraph text-center"><?php echo e(session('message')['message']); ?></p>
    <div class="buttons">
        <a href="<?php echo e(url('/')); ?>" class="button"><?php echo e(trans('installer_messages.updater.final.exit')); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('vendor.installer.layouts.master-update', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/vendor/installer/update/finished.blade.php ENDPATH**/ ?>
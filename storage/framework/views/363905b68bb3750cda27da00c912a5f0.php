<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript">

        $(document).on("click", ".email-template-checkbox", function () {
            var chbox = $(this);
            $.ajax({
                url: chbox.attr('data-url'),
                data: {_token: $('meta[name="csrf-token"]').attr('content'), status: chbox.val()},
                type: 'PUT',
                success: function (response) {
                    if (response.is_success) {
                        show_toastr('success', response.success, 'success');
                        if (chbox.val() == 1) {
                            $('#' + chbox.attr('id')).val(0);
                        } else {
                            $('#' + chbox.attr('id')).val(1);
                        }
                    } else {
                        show_toastr('error', response.error, 'error');
                    }
                },
                error: function (response) {
                    response = response.responseJSON;
                    if (response.is_success) {
                        show_toastr('error', response.error, 'error');
                    } else {
                        show_toastr('error', response, 'error');
                    }
                }
            })
        });

    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php if(\Auth::user()->type=='company'): ?>
        <?php echo e(__('Email Notification')); ?>

    <?php else: ?>
        <?php echo e(__('Email Templates')); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <?php if(\Auth::user()->type=='company'): ?>
            <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Email Notification')); ?></h5>
        <?php else: ?>
            <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Email Templates')); ?></h5>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <?php if(\Auth::user()->type=='company'): ?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Email Notification')); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Email Template')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header card-body table-border-style">
                <h5></h5>
                <div class="table-responsive">
                    <table class="table datatable" id="pc-dt-simple">
                        <thead>
                        <tr>
                            <th scope="col" class="sort" data-sort="name"> <?php echo e(__('Name')); ?></th>
                            <?php if(\Auth::user()->type=='company'): ?>
                                <th class=""><?php echo e(__('On / Off')); ?></th>
                            <?php else: ?>
                                <th class=""><?php echo e(__('Action')); ?></th>
                            <?php endif; ?>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $EmailTemplates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $EmailTemplate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($EmailTemplate->name); ?></td>
                                <td>
                                    <?php if(\Auth::user()->type=='super admin'): ?>
                                        <div class="">
                                            <div class="action-btn ms-2">
                                                <a href="<?php echo e(route('manage.email.language',[$EmailTemplate->id,\Auth::user()->lang])); ?>" class="mx-3 btn btn-sm align-items-center  bg-warning" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('View')); ?>">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(\Auth::user()->type=='company'): ?>
                                        <div class="">

                                            <div class="form-check form-switch d-inline-block">
                                                <label class="form-check-label form-switch">
                                                    <input type="checkbox" class="form-check-input email-template-checkbox" id="email_tempalte_<?php echo e(!empty($EmailTemplate->template)?$EmailTemplate->template->id:''); ?>"
                                                           <?php if(!empty($EmailTemplate->template)?$EmailTemplate->template->is_active:'0' == 1): ?> checked="checked" <?php endif; ?> type="checkbox" value="<?php echo e(!empty($EmailTemplate->template)?$EmailTemplate->template->is_active:''); ?> "
                                                           data-url="<?php echo e(route('status.email.language',[!empty($EmailTemplate->template)?$EmailTemplate->template->id:''])); ?>"/>
                                                    <span class="slider1 round"></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/email_templates/index.blade.php ENDPATH**/ ?>
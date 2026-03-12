<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <table class="footable-details table table-striped table-hover toggle-circle">
                <tbody>
                <tr>
                    <td class="text-dark"><?php echo e(__('Company')); ?></td>
                    <td style="display: table-cell;"> <?php echo e(!empty($trainer->branches)?$trainer->branches->name:''); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('First Name')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->firstname); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Last Name')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->lastname); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Contact Number')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->contact); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Email')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->email); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Expertise')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->expertise); ?></td>
                </tr>
                <tr>
                    <td class="text-dark"><?php echo e(__('Address')); ?></td>
                    <td style="display: table-cell;"><?php echo e($trainer->address); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/trainer/show.blade.php ENDPATH**/ ?>
<?php
    $path =\App\Models\Utility::get_file('uploads/order');
?>
<?php echo e(Form::open(['route' => ['order.changestatus',$order->id],'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <table class="table modal-table">
                <tr role="row">
                    <th><?php echo e(__('Order Id')); ?></th>
                    <td><?php echo e($order->order_id); ?></td>
                </tr>

                <tr>
                    <th><?php echo e(__('Plan Name')); ?></th>
                    <td><?php echo e($order->plan_name); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Plan Price')); ?></th>
                    <td><?php echo e($order->price); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Payment Type')); ?></th>
                    <td><?php echo e($order->payment_type); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Payment Status')); ?></th>
                    <td><?php echo e($order->payment_status); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Bank Details')); ?></th>
                    <td><?php echo $admin_payment_setting['bank_details']; ?></td>
                </tr>
                <?php if(!empty( $order->receipt)): ?>
                    <tr>
                        <th><?php echo e(__('Payment Receipt')); ?></th>
                        <td>
                            <div class="action-btn">
                                <a  class=" bg-primary ms-2 btn btn-sm align-items-center" href="<?php echo e($path . '/' . $order->receipt); ?>" download=""  data-bs-toggle="tooltip" title="<?php echo e(__('Download')); ?>" target="_blank">
                                    <i class="ti ti-download text-white"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                <input type="hidden" value="<?php echo e($order->id); ?>" name="order_id">
            </table>
        </div>
    </div>

</div>
<div class="modal-footer">
    <input type="submit" value="<?php echo e(__('Approval')); ?>" class="btn btn-success" data-bs-dismiss="modal" name="status">
    <input type="submit" value="<?php echo e(__('Reject')); ?>" class="btn btn-danger" name="status">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/order/action.blade.php ENDPATH**/ ?>
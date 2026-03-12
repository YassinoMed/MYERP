<?php
    $path =\App\Models\Utility::get_file('uploads/order');
?>
<?php echo e(Form::open(['route' => ['invoice.changestatus',$invoiceBankTransfer->id],'method' => 'post'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <table class="table modal-table">
                <tr>
                    <th><?php echo e(__('Invoice Number')); ?></th>
                    <td><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></td>

                </tr>
                <tr >
                    <th><?php echo e(__('Order Id')); ?></th>
                    <td><?php echo e($invoiceBankTransfer->order_id); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Amount')); ?></th>
                    <td><?php echo e($invoiceBankTransfer->amount); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Payment Type')); ?></th>
                    <td><?php echo e(__('Bank Transfer')); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Payment Status')); ?></th>
                    <td><?php echo e($invoiceBankTransfer->status); ?></td>
                </tr>
                <tr>
                    <th><?php echo e(__('Bank Details')); ?></th>
                    <td><?php echo $company_payment_setting['bank_details']; ?></td>
                </tr>
                <?php if(!empty( $invoiceBankTransfer->receipt)): ?>
                    <tr>
                        <th><?php echo e(__('Payment Receipt')); ?></th>
                        <td>
                            <div class="action-btn">
                                <a  class=" bg-primary ms-2 btn btn-sm align-items-center" href="<?php echo e($path . '/' . $invoiceBankTransfer->receipt); ?>" download=""  data-bs-toggle="tooltip" title="<?php echo e(__('Download')); ?>" target="_blank">
                                    <i class="ti ti-download text-white"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                <input type="hidden" value="<?php echo e($invoiceBankTransfer->id); ?>" name="order_id">
            </table>
        </div>
    </div>

</div>
<div class="modal-footer">
    <input type="submit" value="<?php echo e(__('Approval')); ?>" class="btn btn-success" data-bs-dismiss="modal" name="status">
    <input type="submit" value="<?php echo e(__('Reject')); ?>" class="btn btn-danger" name="status">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/invoice/action.blade.php ENDPATH**/ ?>
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<?php
    $invoice = $data['invoice_id'];
    $invoice_id = \Illuminate\Support\Facades\Crypt::decrypt($invoice);
    $invoice = \App\Models\Invoice::find($invoice_id);
    $user = \App\Models\User::find($invoice->created_by);
    $price = $data['amount'];

?>
<script src="https://api.paymentwall.com/brick/build/brick-default.1.5.0.min.js"> </script>
<div id="payment-form-container"> </div>
<script>
  var brick = new Brick({
    public_key: '<?php echo e($company_payment_setting['paymentwall_public_key']); ?>', // please update it to Brick live key before launch your project
    amount: '<?php echo e($price); ?>',
    currency: '<?php echo e(App\Models\Utility::getValByName('site_currency')); ?>',
    container: 'payment-form-container',
    action: '<?php echo e(route("invoice.pay.with.paymentwall",[$data["invoice_id"],"amount" => $data["amount"]])); ?>',
    form: {
      merchant: 'Paymentwall',
      product: '<?php echo e($user->invoiceNumberFormat($invoice_id)); ?>',
      pay_button: 'Pay',
      show_zip: true, // show zip code
      show_cardholder: true // show card holder name
    }
});
brick.showPaymentForm(function(data) {
      if(data.flag == 1){
        window.location.href ='<?php echo e(route("error.invoice.show",[1, 'invoice_id'])); ?>'.replace('invoice_id',data.invoice);
      }else{
        window.location.href ='<?php echo e(route("error.invoice.show",[2, 'invoice_id'])); ?>'.replace('invoice_id',data.invoice);
      }
    }, function(errors) {
      if(errors.flag == 1){
        window.location.href ='<?php echo e(route("error.invoice.show",[1,'invoice_id'])); ?>'.replace('invoice_id',errors.invoice);
      }else{
        window.location.href ='<?php echo e(route("error.invoice.show",[2, 'invoice_id'])); ?>'.replace('invoice_id',errors.invoice);
      }

    });

</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/invoice/paymentwall.blade.php ENDPATH**/ ?>
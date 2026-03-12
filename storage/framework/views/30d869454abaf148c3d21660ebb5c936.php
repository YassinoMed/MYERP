<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e(__('Paymentwall Plan Payment')); ?></title>
  <style>
    body {
      margin: 0;
      font-family: Poppins, sans-serif;
      background: radial-gradient(circle at top, #f3f0e7 0%, #eef3f8 45%, #f8fafc 100%);
      color: #142235;
    }
    .pay-shell {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 32px 18px;
    }
    .pay-card {
      width: 100%;
      max-width: 760px;
      background: rgba(255,255,255,0.95);
      border: 1px solid rgba(20,34,53,0.08);
      border-radius: 28px;
      box-shadow: 0 30px 60px rgba(15, 23, 42, 0.12);
      overflow: hidden;
    }
    .pay-hero {
      padding: 28px 30px 20px;
      background: linear-gradient(135deg, #132238 0%, #1f4b6e 100%);
      color: #fff;
    }
    .pay-hero h1 {
      margin: 0;
      font-size: 1.7rem;
      font-weight: 700;
      letter-spacing: -0.04em;
    }
    .pay-hero p {
      margin: 8px 0 0;
      color: rgba(255,255,255,0.78);
    }
    .pay-body {
      padding: 24px 30px 30px;
    }
    .pay-meta {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 999px;
      background: #eef6ff;
      color: #0f5ea8;
      font-weight: 600;
      margin-bottom: 18px;
    }
    #payment-form-container {
      min-height: 320px;
      border-radius: 18px;
      background: #fff;
    }
  </style>
</head>
<?php
    $plan = $data['plan_id'];
    $plan_id = \Illuminate\Support\Facades\Crypt::decrypt($plan);
    $plan   = App\Models\Plan::find($plan_id);

?>
<body>
<section class="pay-shell">
  <div class="pay-card">
    <div class="pay-hero">
      <h1><?php echo e(__('Paymentwall Checkout')); ?></h1>
      <p><?php echo e(__('Proceed with the selected plan in a focused payment screen.')); ?></p>
    </div>
    <div class="pay-body">
      <div class="pay-meta"><?php echo e($plan->name); ?> · <?php echo e(App\Models\Utility::getValByName('site_currency')); ?> <?php echo e($plan->price); ?></div>
<script src="https://api.paymentwall.com/brick/build/brick-default.1.5.0.min.js"> </script>
<div id="payment-form-container"> </div>
<script>
var brick = new Brick({
  public_key: '<?php echo e($admin_payment_setting['paymentwall_public_key']); ?>', // please update it to Brick live key before launch your project
  amount: '<?php echo e($plan->price); ?>' ,
  currency: '<?php echo e(App\Models\Utility::getValByName('site_currency')); ?>',
  container: 'payment-form-container',
  action: '<?php echo e(route("plan.pay.with.paymentwall",[$data["plan_id"],$data["coupon"]])); ?>',
  form: {
    merchant: 'Paymentwall',
    product: '<?php echo e($plan->name); ?>',
    pay_button: 'Pay',
    show_zip: true, // show zip code
    show_cardholder: true // show card holder name
  }
});
brick.showPaymentForm(function(data) {
    if(data.flag == 1){
      window.location.href ='<?php echo e(route("error.plan.show",1)); ?>';
    }else{
      window.location.href ='<?php echo e(route("error.plan.show",2)); ?>';
    }
  }, function(errors) {
    if(errors.flag == 1){
      window.location.href ='<?php echo e(route("error.plan.show",1)); ?>';
    }else{
      window.location.href ='<?php echo e(route("error.plan.show",2)); ?>';
    }
  });
</script>
    </div>
  </div>
</section>
</body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/plan/paymentwall.blade.php ENDPATH**/ ?>
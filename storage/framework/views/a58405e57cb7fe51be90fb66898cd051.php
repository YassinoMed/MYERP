<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="authorizenet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title><?php echo e(__('Authorizenet Plan Payment')); ?></title>
    <meta name="description" content="authorizenet">
    <meta name="keywords" content="authorizenet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="assets/images/favicon.png">

    <link rel="stylesheet" href="resources/css/AuthorizeNet/style.css">
    <link rel="stylesheet" href="resources/css/AuthorizeNet/main-style.css">
    <link rel="stylesheet" href="resources/css/AuthorizeNet/responsive.css">
    <link rel="stylesheet" href="resources/css/AuthorizeNet/daterangepicker.css">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
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
            background: rgba(255,255,255,0.94);
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
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: -0.04em;
        }

        .pay-hero p {
            margin: 8px 0 0;
            color: rgba(255,255,255,0.78);
        }

        .pay-body {
            padding: 28px 30px 30px;
        }

        .pay-summary {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 22px;
        }

        .pay-summary-card {
            background: #f8fafc;
            border: 1px solid rgba(20,34,53,0.08);
            border-radius: 18px;
            padding: 14px 16px;
        }

        .pay-summary-card span {
            display: block;
            color: #617185;
            font-size: .8rem;
        }

        .pay-summary-card strong {
            display: block;
            margin-top: 4px;
            font-size: 1rem;
            color: #142235;
        }

        .payment-form .form-control,
        .payment-form .input-group-text,
        .expiration {
            border-radius: 14px;
        }

        .expiration {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0 12px;
        }

        .expiration input {
            border: 0;
            background: transparent;
            width: 100%;
            outline: none;
        }

        .pay-submit {
            margin-top: 10px;
            border-radius: 16px;
            padding: 14px 18px;
            font-weight: 700;
            letter-spacing: .04em;
        }

        @media (max-width: 767px) {
            .pay-summary {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="theme-1">
<?php
    $payment_setting = Utility::getAdminPaymentSetting();
    $currency = isset($payment_setting['currency']) ? $payment_setting['currency'] : 'USD';

?>
    <section class="pay-shell">
        <div class="pay-card">
            <div class="pay-hero">
                <h1><?php echo e(__('Secure Plan Payment')); ?></h1>
                <p><?php echo e(__('Finalize your subscription with a cleaner payment flow and a clear recap before validation.')); ?></p>
            </div>
            <div class="pay-body">
                    <div class="pay-summary">
                        <div class="pay-summary-card">
                            <span><?php echo e(__('Owner')); ?></span>
                            <strong><?php echo e(Auth::user()->name); ?></strong>
                        </div>
                        <div class="pay-summary-card">
                            <span><?php echo e(__('Amount')); ?></span>
                            <strong><?php echo e($currency ? $currency : 'USD'); ?> <?php echo e($price); ?></strong>
                        </div>
                    </div>
                    <form class="payment-form" method="post" action="<?php echo e(route('plan.get.authorizenet.status')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="data"  value="<?php echo e($data); ?>">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="d-block mb-1"><?php echo e(__('Owner Name')); ?> <sup aria-hidden="true" class="text-danger">*</sup></label>
                                    <input class="form-control" type="text" placeholder="Name" value="<?php echo e(Auth::user()->name); ?>" disabled placeholder="<?php echo e(__('Owner Name')); ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="d-block mb-1"><?php echo e(__('Amount')); ?><sup aria-hidden="true" class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-prepend"><span
                                                class="input-group-text"><?php echo e($currency ? $currency : 'USD'); ?></span></span>
                                                <input class="form-control" type="number" placeholder="Amount" value="<?php echo e($price); ?>" disabled placeholder="<?php echo e(__('Amount')); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="d-block mb-1"><?php echo e(__('Card Number')); ?><sup aria-hidden="true" class="text-danger">*</sup></label>
                                    <input class="form-control" pattern="\d{16}"  type="text" placeholder="Enter Card Number" name="cardNumber" required>
                                    <small class="form-text text-muted"><?php echo e(__('Please enter a 16-digit card number.')); ?></small>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group ">
                                    <label class="d-block mb-1"><?php echo e(__('CVV')); ?><sup aria-hidden="true" class="text-danger" class="text-danger">*</sup></label>
                                    <input class="form-control" type="text" placeholder="Enter CVV" name="cvv" maxlength="3" size="3" required>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group" >
                                <label class="d-block mb-1"><?php echo e(__('Expiration')); ?><sup aria-hidden="true" class="text-danger">*</sup></label>
                                <div class=" expiration form-control">
                                    <input type="text" class="" name="month" placeholder="MM" maxlength="2" size="2" />
                                    <span>/</span>
                                    <input type="text" class="" name="year" placeholder="YYYY" maxlength="4" size="4" />
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary text-uppercase w-100 pay-submit"><?php echo e(__('pay')); ?></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </section>
    <script src="Modules/AuthorizeNet/Resources/assets/js/jquery.min.js"></script>
    <script src="Modules/AuthorizeNet/Resources/assets/js/custom.js"></script>
</body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/plan/request.blade.php ENDPATH**/ ?>
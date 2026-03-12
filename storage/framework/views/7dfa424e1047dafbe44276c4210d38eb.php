<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="authorizenet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title><?php echo e(__('Authorizenet Invoice Payment')); ?></title>
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
        .expiration input {
            border: 0;
        }
    </style>
</head>
<body class="theme-1">
    <?php
    $payment_setting = Utility::getCompanyPaymentSetting($user->id);
    $currency = isset($payment_setting['currency']) ? $payment_setting['currency'] : 'USD';

?>
    <section class="payment-sec">
        <div class="container">
            <div class="card">
                <div class="card-body w-100">
                    <div class="payment-logo text-center pb-3">
                        <img src="assets/images/payment-logo.jpg" alt="payment-logo" loading="lazy">
                    </div>
                    <form class="payment-form" method="post" action="<?php echo e(route('invoice.get.authorizenet.status')); ?>" id="authorizenetForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="data"  value="<?php echo e($data); ?>">

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="d-block mb-1"><?php echo e(__('Owner Name')); ?> <sup aria-hidden="true" class="text-danger">*</sup></label>
                                    <input class="form-control" type="text" placeholder="Name" value="<?php echo e($user->name); ?>" disabled  placeholder="<?php echo e(__('Enter Owner Name')); ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    <label class="d-block mb-1"><?php echo e(__('Amount')); ?><sup aria-hidden="true" class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-prepend"><span
                                                class="input-group-text"><?php echo e($currency ? $currency : 'USD'); ?></span></span>
                                                <input class="form-control" type="number" placeholder="Amount" value="<?php echo e($get_amount); ?>" disabled  placeholder="<?php echo e(__('Enter Amount')); ?>">
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
                                    <label class="d-block mb-1"><?php echo e(__('CVV')); ?><sup aria-hidden="true" class="text-danger"> *</sup></label>
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
                            <div class="col-12 w-50 m-auto">
                                <button class="btn btn-primary text-uppercase w-100"><?php echo e(__('pay')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <script src="Modules/AuthorizeNet/Resources/assets/js/jquery.min.js"></script>
    <script src="Modules/AuthorizeNet/Resources/assets/js/custom.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Find the form and the card number input
                var form = document.getElementById('authorizenetForm'); // Replace 'yourFormId' with the actual ID of your form
                var cardNumberInput = form.querySelector('input[name="cardNumber"]');

                // Add an event listener to the form for the 'submit' event
                form.addEventListener('submit', function (event) {
                    // Perform your custom validation
                    if (!validateCardNumber(cardNumberInput.value)) {
                        // Prevent the form submission if validation fails
                        event.preventDefault();
                        alert('Please enter a valid 16-digit card number.');
                    }
                });

                // Custom validation function for card number
                function validateCardNumber(cardNumber) {
                    var cardNumberRegex = /^\d{16}$/;
                    return cardNumberRegex.test(cardNumber);
                }
            });
        </script>
</body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/invoice/request.blade.php ENDPATH**/ ?>
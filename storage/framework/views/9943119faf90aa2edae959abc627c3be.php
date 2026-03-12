<?php
    $logo = \App\Models\Utility::get_file('uploads/logo');
    $company_favicon = Utility::companyData($user->created_by, 'company_favicon');
    $setting = DB::table('settings')->where('created_by', $user->creatorId())->pluck('value', 'name')->toArray();
    $settings_data = \App\Models\Utility::settingsById($user->created_by);
    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

    if (isset($setting['color_flag']) && $setting['color_flag'] == 'true') {
        $themeColor = 'custom-color';
    } else {
        $themeColor = $color;
    }
    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metsdesc = isset($getseo['meta_desc']) ? $getseo['meta_desc'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $get_cookie = \App\Models\Utility::getCookieSetting();
    $company_logo=Utility::getValByName('company_logo');

?>
<!DOCTYPE html>

<html lang="en" dir="<?php echo e($settings_data['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo e($settings_data['company_name']. ' - ' . __('Paylip')); ?></title>

    <meta name="title" content="<?php echo e($metatitle); ?>">
    <meta name="description" content="<?php echo e($metsdesc); ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:title" content="<?php echo e($metatitle); ?>">
    <meta property="og:description" content="<?php echo e($metsdesc); ?>">
    <meta property="og:image" content="<?php echo e($meta_image . $meta_logo); ?>">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:title" content="<?php echo e($metatitle); ?>">
    <meta property="twitter:description" content="<?php echo e($metsdesc); ?>">
    <meta property="twitter:image" content="<?php echo e($meta_image . $meta_logo); ?>">

    <link rel="icon"
        href="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')); ?>"
        type="image" sizes="16x16">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/main.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">


    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!-- vendor css -->
    <?php if($settings_data['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>">
    <?php endif; ?>
    <?php if($settings_data['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>" id="style">
    <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="style">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>" id="main-style-link">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">

    <style>
        :root {
            --color-customColor: <?=$color ?>;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <style>
        #card-element {
            border: 1px solid #a3afbb !important;
            border-radius: 10px !important;
            padding: 10px !important;
        }
    </style>
</head>

<body class="<?php echo e($themeColor); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="main-content">
                    <div class="text-md-right text-end my-3">
                        <a href="#" class="btn btn-warning" onclick="saveAsPDF()"><span class="fa fa-download"></span></a>
                    </div>
                    <div class="card invoice" id="printableArea">
                        <div class="card-body invoice-print">
                            <div class="invoice-title">
                                <h4 class="mb-4 fs-3"><?php echo e(__('Payslip')); ?></h4>
                                <div class="payslip-number">
                                    <img src="<?php echo e($logo.'/'.(isset($company_logo) && !empty($company_logo)?$company_logo:'logo-dark.png')); ?>" width="170px;" alt="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-unstyled mb-1">
                                        <li class="mb-1"><strong><?php echo e(__('Name')); ?> :</strong> <?php echo e($employee->name); ?></li>
                                        <li class="mb-1"><strong><?php echo e(__('Position')); ?> :</strong> <?php echo e(__('Employee')); ?></li>
                                        <li> <strong><?php echo e(__('Salary Date')); ?> :</strong> <?php echo e($user->dateFormat( $employee->created_at)); ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 text-md-right mb-0">
                                    <ul class="list-unstyled mb-md-2 mb-0">
                                        <li class="mb-1"> <strong class="d-block"><?php echo e($settings_data['company_name'] ?? 'ERPGo'); ?> : </strong><?php echo e($settings_data['company_address']); ?> , <?php echo e($settings_data['company_city']); ?>,
                                            <?php echo e($settings_data['company_state']); ?>-<?php echo e($settings_data['company_zipcode']); ?></li>
                                            <li><strong><?php echo e(__('Salary Slip')); ?> : </strong><?php echo e($user->dateFormat( $payslip->salary_month)); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="table-responsive m-0 w-100">
                                        <table class="table table-striped table-hover table-md">
                                            <tbody>
                                            <tr>
                                                <th><?php echo e(__('Earning')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th class="text-end"><?php echo e(__('Amount')); ?></th>
                                            </tr>
                                            <tr>
                                                <td><?php echo e(__('Basic Salary')); ?></td>
                                                <td>-</td>
                                                <td class="text-end"><?php echo e($user->priceFormat( $payslip->basic_salary)); ?></td>
                                            </tr>
                                            <?php $__currentLoopData = $payslipDetail['earning']['allowance']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('Allowance')); ?></td>
                                                    <td><?php echo e($allowance->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $allowance->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $payslipDetail['earning']['commission']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('Commission')); ?></td>
                                                    <td><?php echo e($commission->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $commission->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $payslipDetail['earning']['otherPayment']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otherPayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('Other Payment')); ?></td>
                                                    <td><?php echo e($otherPayment->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $otherPayment->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $payslipDetail['earning']['overTime']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('OverTime')); ?></td>
                                                    <td><?php echo e($overTime->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $overTime->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive m-0 w-100 mt-4">
                                        <table class="table table-striped table-hover table-md">
                                            <tbody>
                                            <tr>
                                                <th><?php echo e(__('Deduction')); ?></th>
                                                <th><?php echo e(__('Title')); ?></th>
                                                <th class="text-end"><?php echo e(__('Amount')); ?></th>
                                            </tr>

                                            <?php $__currentLoopData = $payslipDetail['deduction']['loan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('Loan')); ?></td>
                                                    <td><?php echo e($loan->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $loan->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $payslipDetail['deduction']['deduction']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e(__('Saturation Deduction')); ?></td>
                                                    <td><?php echo e($deduction->title); ?></td>
                                                    <td class="text-end"><?php echo e($user->priceFormat( $deduction->amount)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row mt-4 justify-content-end">
                                        <div class="col-lg-3 col-md-5 text-end">
                                            <ul class="list-unstyled">
                                                <li class="d-flex align-items-center justify-content-between mb-1"><strong><?php echo e(__('Total Earning')); ?></strong><p class="mb-0"><?php echo e($user->priceFormat($payslipDetail['totalEarning'])); ?></p></li>
                                                <li class="d-flex align-items-center justify-content-between mb-1"><strong><?php echo e(__('Total Deduction')); ?></strong><p class="mb-0"><?php echo e($user->priceFormat($payslipDetail['totalDeduction'])); ?></p></li>
                                                <li class="d-flex align-items-center justify-content-between pt-2 border-top mt-2"><strong><?php echo e(__('Net Salary')); ?></strong><p class="mb-0 f-w-600"><?php echo e($user->priceFormat($payslip->net_payble)); ?></p></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-md-right pt-2 border-top mt-2">
                                <div class="float-lg-left mb-lg-0 mb-3 ">
                                    <p class="mt-2"><?php echo e(__('Employee Signature')); ?></p>
                                </div>
                                <p class="mt-2 "> <?php echo e(__('Paid By')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer id="footer-main">
        <div class="footer-dark">
            <div class="container">
                <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top">
                    <div class="col-md-6">
                        <div class="copyright text-sm font-weight-bold text-center text-md-left">
                            <?php echo e(!empty($companySettings['footer_text']) ? $companySettings['footer_text']->value : ''); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dash.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/bootstrap-switch-button.min.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/plugins/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/simple-datatables.js')); ?>"></script>

    <!-- Apex Chart -->
    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>


    <script src="<?php echo e(asset('js/jscolor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>

    <?php if($message = Session::get('success')): ?>
        <script>
            show_toastr('success', '<?php echo $message; ?>');
        </script>
    <?php endif; ?>
    <?php if($message = Session::get('error')): ?>
        <script>
            show_toastr('error', '<?php echo $message; ?>');
        </script>
    <?php endif; ?>

    <?php if($get_cookie['enable_cookie'] == 'on'): ?>
        <?php echo $__env->make('layouts.cookie_consent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>

    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: '<?php echo e($employee->name); ?>',
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A4'}
            };
            html2pdf().set(opt).from(element).save();
        }

        // $(document).ready(function() {
        //     saveAsPDF();
        //     setTimeout(() => {
        //         window.close();
        //     }, 2000);
        // });
    </script>

</body>

</html>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/payslip/payslipPdf.blade.php ENDPATH**/ ?>
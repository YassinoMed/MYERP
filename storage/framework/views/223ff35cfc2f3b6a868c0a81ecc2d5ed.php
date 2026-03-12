<?php
    use App\Models\Utility;
    $setting = \App\Models\Utility::settings();

    $logo = \App\Models\Utility::get_file('uploads/logo');

    $company_favicon = $setting['company_favicon'] ?? '';

    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

    if(isset($setting['color_flag']) && $setting['color_flag'] == 'true')
    {
        $themeColor = 'custom-color';
    }
    else {
        $themeColor = $color;
    }

    $SITE_RTL = $setting['SITE_RTL'] ?? '';

    $lang = \App::getLocale('lang');
    if ($lang == 'ar' || $lang == 'he') {
        $SITE_RTL = 'on';
    }

    $segment = request()->segment(1);
    $moduleKey = 'default';
    $moduleMap = [
        'account' => ['invoice', 'bill', 'expense', 'revenue', 'bank-account', 'taxes', 'customer', 'vender', 'productservice', 'proposal', 'report', 'transaction', 'order', 'purchase', 'quotation'],
        'crm' => ['leads', 'deals', 'clients', 'contracts'],
        'hrm' => ['employee', 'attendanceemployee', 'leave', 'payslip', 'award', 'training', 'job', 'holiday', 'meeting', 'announcement', 'event', 'goal-tracking', 'appraisal'],
        'project' => ['projects', 'tasks', 'time-tracker'],
        'pos' => ['pos', 'promotion'],
    ];
    foreach ($moduleMap as $key => $segments) {
        if (in_array($segment, $segments)) {
            $moduleKey = $key;
            break;
        }
    }

    $lightStyle = $SITE_RTL == 'on' ? asset('assets/css/style-rtl.css') : asset('assets/css/style.css');
    $darkStyle = asset('assets/css/style-dark.css');
    $moduleColorDefault = !empty($setting['module_color_default']) ? $setting['module_color_default'] : 'var(--theme-color)';
    $moduleColorAccount = !empty($setting['module_color_account']) ? $setting['module_color_account'] : $moduleColorDefault;
    $moduleColorCrm = !empty($setting['module_color_crm']) ? $setting['module_color_crm'] : $moduleColorDefault;
    $moduleColorHrm = !empty($setting['module_color_hrm']) ? $setting['module_color_hrm'] : $moduleColorDefault;
    $moduleColorProject = !empty($setting['module_color_project']) ? $setting['module_color_project'] : $moduleColorDefault;
    $moduleColorPos = !empty($setting['module_color_pos']) ? $setting['module_color_pos'] : $moduleColorDefault;

    $metatitle = isset($setting['meta_title']) ? $setting['meta_title'] : '';
    $metsdesc = isset($setting['meta_desc']) ? $setting['meta_desc'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($setting['meta_image']) ? $setting['meta_image'] : '';

?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e($SITE_RTL == 'on' ? 'rtl' : ''); ?>">

<meta name="csrf-token" id="csrf-token" content="<?php echo e(csrf_token()); ?>">
<meta name="global-search-url" content="<?php echo e(route('global.search')); ?>">
<meta name="notifications-panel-url" content="<?php echo e(route('notifications.panel')); ?>">
<meta name="notifications-read-all-url" content="<?php echo e(route('notifications.read.all')); ?>">
<meta name="notifications-read-url-template" content="<?php echo e(route('notifications.read', ['notification' => 0])); ?>">
<meta name="audit-log-feed-url" content="<?php echo e(route('audit.log.feed')); ?>">
<meta name="audit-log-export-csv-url" content="<?php echo e(route('audit.log.export.csv')); ?>">
<meta name="dark-layout-setting" content="<?php echo e($setting['cust_darklayout'] ?? 'off'); ?>">
<meta name="dark-layout-auto" content="<?php echo e($setting['cust_darklayout_auto'] ?? 'off'); ?>">

<head>
    <title><?php echo e($setting['title_text'] ? $setting['title_text'] : config('app.name', 'ERPGo SaaS')); ?> - <?php echo $__env->yieldContent('page-title'); ?>
    </title>

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


    <script src="<?php echo e(asset('js/html5shiv.js')); ?>"></script>


    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="url" content="<?php echo e(url('') . '/' . config('chatify.path')); ?>" data-user="<?php echo e(Auth::user()->id); ?>">
    <link rel="icon"
        href="<?php echo e($logo . '/' . (isset($company_favicon) && !empty($company_favicon) ? $company_favicon : 'favicon.png')  . '?' . time()); ?>"
        type="image" sizes="16x16">

    <!-- Favicon icon -->
    <!-- Calendar-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/main.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/flatpickr.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">

    <!-- font css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

    <!--bootstrap switch-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">

    <!-- vendor css -->

    <link rel="stylesheet" href="<?php echo e($setting['cust_darklayout'] == 'on' ? $darkStyle : $lightStyle); ?>" id="main-style-link" data-light="<?php echo e($lightStyle); ?>" data-dark="<?php echo e($darkStyle); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/ux-enhancements.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-dark.css')); ?>" id="custom-dark-link" <?php echo e($setting['cust_darklayout'] == 'on' ? '' : 'disabled'); ?>>

    <style>
        :root {
            --color-customColor: <?= $color ?>;
            --module-accent-default: <?= $moduleColorDefault ?>;
            --module-accent-account: <?= $moduleColorAccount ?>;
            --module-accent-crm: <?= $moduleColorCrm ?>;
            --module-accent-hrm: <?= $moduleColorHrm ?>;
            --module-accent-project: <?= $moduleColorProject ?>;
            --module-accent-pos: <?= $moduleColorPos ?>;
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
    <?php echo $__env->yieldPushContent('css-page'); ?>


</head>



<body class="<?php echo e($themeColor); ?>" data-module="<?php echo e($moduleKey); ?>">

    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <?php echo $__env->make('partials.admin.menu', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <?php echo $__env->make('partials.admin.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Modal -->
    <div class="modal notification-modal fade" id="notification-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <h6 class="mt-2">
                        <i data-feather="monitor" class="me-2"></i>Desktop settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting1" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting1">Allow desktop notification</label>
                    </div>
                    <p class="text-muted ms-5">
                        you get lettest content at a time when data will updated
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting2" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting2">Store Cookie</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="save" class="me-2"></i>Application settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting3" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting3">Backup Storage</label>
                    </div>
                    <p class="text-muted mb-4 ms-5">
                        Automaticaly take backup as par schedule
                    </p>
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting4" />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting4">Allow guest to print
                            file</label>
                    </div>
                    <h6 class="mb-0 mt-5">
                        <i data-feather="cpu" class="me-2"></i>System settings
                    </h6>
                    <hr />
                    <div class="form-check form-switch">
                        <input type="checkbox" class="form-check-input" id="pcsetting5" checked />
                        <label class="form-check-label f-w-600 pl-1" for="pcsetting5">View other user chat</label>
                    </div>
                    <p class="text-muted ms-5">Allow to show public user message</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger btn-sm" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-light-primary btn-sm">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div>
                            <div class="page-header-title">
                                <h4 class="mb-2"><?php echo $__env->yieldContent('page-title'); ?></h4>
                            </div>
                            <ul class="breadcrumb">
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </ul>
                        </div>
                        <div class="action-btn-col">
                            <?php echo $__env->yieldContent('action-btn'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->yieldContent('content'); ?>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="body">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="commonModalOver" tabindex="-1" role="dialog" aria-labelledby="commonModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="commonModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast text-white fade" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php echo $__env->make('partials.admin.copilot', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.admin.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('Chatify::layouts.footerLinks', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/admin.blade.php ENDPATH**/ ?>
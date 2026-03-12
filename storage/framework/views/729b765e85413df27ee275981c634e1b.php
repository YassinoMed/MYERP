<?php
    $logo = \App\Models\Utility::get_file('uploads/logo/');
    $company_logo = Utility::getValByName('company_logo_light');
    $setting = App\Models\Utility::settingsById($job->created_by);


    $color = !empty($setting['color']) ? $setting['color'] : 'theme-3';

if(isset($setting['color_flag']) && $setting['color_flag'] == 'true')
{
    $themeColor = 'custom-color';
}
else {
    $themeColor = $color;
}

    $getseo = App\Models\Utility::getSeoSetting();
    $metatitle = isset($getseo['meta_title']) ? $getseo['meta_title'] : '';
    $metsdesc = isset($getseo['meta_desc']) ? $getseo['meta_desc'] : '';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image']) ? $getseo['meta_image'] : '';
    $get_cookie = \App\Models\Utility::getCookieSetting();

?>

<!DOCTYPE html>

<html lang="en" dir="<?php echo e(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php echo e(!empty($companySettings['header_text']) ? $companySettings['header_text']->value : config('app.name', 'ERPGO SaaS')); ?>

        - <?php echo e(__('Career')); ?></title>

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

    <link rel="icon" href="<?php echo e($logo . '/' . (isset($favicon) && !empty($favicon) ? $favicon : 'favicon.png')); ?>"
        type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/site.css')); ?>" id="stylesheet">

    <?php if(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-rtl.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style-dark.css')); ?>">
    <?php endif; ?>

    <?php if(isset($setting['SITE_RTL']) && $setting['SITE_RTL'] != 'on' && isset($setting['cust_darklayout']) && $setting['cust_darklayout'] != 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    <?php if(isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/custom-dark.css')); ?>">
    <?php endif; ?>

    <style>
        :root {
            --color-customColor: <?= $color ?>;    
        }
    </style>

    <link rel="stylesheet" href="<?php echo e(asset('css/custom-color.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>

<body class="<?php echo e($themeColor); ?>">
    <div class="job-wrapper">
        <div class="job-content">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <img src="<?php echo e($logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-light.png')); ?>"
                            alt="logo" style="width: 90px">

                    </a>
                </div>
            </nav>
            <section class="job-banner">
                <div class="job-banner-bg">
                    <img src="<?php echo e(asset('/storage/uploads/job/banner.png')); ?>" alt="">

                </div>
                <div class="container">
                    <div class="job-banner-content text-center text-white">
                        <h1 class="text-white mb-3">
                            <?php echo e(__(' We help')); ?> <br> <?php echo e(__('businesses grow')); ?>

                        </h1>
                        <p><?php echo e(__('Work there. Find the dream job you’ve always wanted..')); ?></p>
                        </p>
                    </div>
                </div>
            </section>
            <section class="apply-job-section">
                <div class="container">
                    <div class="apply-job-wrapper bg-light">
                        <div class="section-title text-center">
                            <p><b><?php echo e($job->title); ?></b></p>
                            <div class="d-flex flex-wrap justify-content-center gap-1 mb-4">
                                <?php $__currentLoopData = explode(',', $job->skill); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge rounded p-2 bg-primary"><?php echo e($skill); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <?php if(!empty($job->branches) ? $job->branches->name : ''): ?>
                                <p> <i class="ti ti-map-pin ms-1"></i>
                                    <?php echo e(!empty($job->branches) ? $job->branches->name : ''); ?></p>
                            <?php endif; ?>

                            <a href="<?php echo e(route('job.apply', [$job->code, $currantLang])); ?>"
                                class="btn btn-primary rounded"><?php echo e(__('Apply now')); ?> <i class="ti ti-send ms-2"></i>
                            </a>
                        </div>
                        <h3><?php echo e(__('Requirements')); ?></h3>
                        <p><?php echo $job->requirement; ?></p>

                        <hr>
                        <h3><?php echo e(__('Description')); ?></h3><br>
                        <?php echo $job->description; ?>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <script src="<?php echo e(asset('assets/js/plugins/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/site.core.js')); ?>"></script>
    <script src="<?php echo e(asset('js/site.js')); ?>"></script>
    <script src="<?php echo e(asset('js/demo.js')); ?> "></script>
</body>

<?php if($get_cookie['enable_cookie'] == 'on'): ?>
    <?php echo $__env->make('layouts.cookie_consent', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>


</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/job/requirement.blade.php ENDPATH**/ ?>
<?php
    $users=\Auth::user();
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
    $languages=\App\Models\Utility::languages();

    $lang = isset($users->lang)?$users->lang:'en';
    if ($lang == null) {
        $lang = 'en';
    }
    $LangName = cache()->remember('full_language_data_' . $lang, now()->addHours(24), function () use ($lang) {
    return \App\Models\Language::languageData($lang);
    });

    $setting = \App\Models\Utility::settings();

    $unseenCounter=App\Models\ChMessage::where('to_id', Auth::user()->id)->where('seen', 0)->count();
    $savedViews = \App\Models\SavedView::query()
        ->where('user_id', Auth::id())
        ->latest('is_default')
        ->latest('id')
        ->limit(6)
        ->get();
?>
<?php if(isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on'): ?>
    <header class="dash-header transprent-bg erp-header-shell">
<?php else: ?>
    <header class="dash-header erp-header-shell">
<?php endif; ?>
    <div class="header-wrapper erp-header-wrapper">
        <div class="me-auto dash-mob-drp">
            <ul class="list-unstyled erp-header-cluster erp-header-cluster-start">
                <li class="dash-h-item mob-hamburger">
                    <a href="#!" class="dash-head-link" id="mobile-collapse">
                        <div class="hamburger hamburger--arrowturn">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="dash-h-item d-none d-lg-inline-flex">
                    <a href="#!" class="dash-head-link" data-sidebar-pin-toggle="1" aria-label="<?php echo e(__('Toggle compact sidebar')); ?>">
                        <i class="ti ti-layout-sidebar-left-collapse"></i>
                    </a>
                </li>

                <li class="dropdown dash-h-item drp-company">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="theme-avtar">
                             <img src="<?php echo e(!empty(\Auth::user()->avatar) ? $profile . \Auth::user()->avatar :  $profile.'avatar.png'); ?>" class="img-fluid rounded border-2 border border-primary">
                        </span>
                        <span class="hide-mob ms-2"><?php echo e(__('Hi, ')); ?><?php echo e(\Auth::user()->name); ?>!</span>
                        <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown">

                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <i class="ti ti-user text-dark"></i><span><?php echo e(__('Profile')); ?></span>
                        </a>

                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item">
                            <i class="ti ti-power text-dark"></i><span><?php echo e(__('Logout')); ?></span>
                        </a>

                        <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo e(csrf_field()); ?>

                        </form>

                    </div>
                </li>

            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled erp-header-cluster erp-header-cluster-end">
                <?php if(\Auth::user()->type == 'company' ): ?>
                <?php if (is_impersonating($guard = null)) : ?>
                <li class="dropdown dash-h-item drp-company">
                    <a class="btn btn-danger btn-sm" href="<?php echo e(route('exit.company')); ?>"><i class="ti ti-ban"></i>
                        <?php echo e(__('Exit Company Login')); ?>

                    </a>
                </li>
                <?php endif; ?>
                <?php endif; ?>

                <?php if(\Auth::user()->type != 'client'): ?>
                    <li class="dropdown dash-h-item drp-create">
                        <a class="dash-head-link dropdown-toggle arrow-none me-0" href="#" id="quickCreateToggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-plus"></i>
                        </a>
                        <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create invoice')): ?>
                                <a href="<?php echo e(route('invoice.create', 0)); ?>" class="dropdown-item">
                                    <i class="ti ti-file-invoice text-dark"></i><span><?php echo e(__('Invoice')); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create customer')): ?>
                                <a href="<?php echo e(route('customer.create')); ?>" class="dropdown-item">
                                    <i class="ti ti-users text-dark"></i><span><?php echo e(__('Customer')); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create client')): ?>
                                <a href="<?php echo e(route('clients.create')); ?>" class="dropdown-item">
                                    <i class="ti ti-user-plus text-dark"></i><span><?php echo e(__('Client')); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create project')): ?>
                                <a href="<?php echo e(route('projects.create')); ?>" class="dropdown-item">
                                    <i class="ti ti-briefcase text-dark"></i><span><?php echo e(__('Project')); ?></span>
                                </a>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create employee')): ?>
                                <a href="<?php echo e(route('employee.create')); ?>" class="dropdown-item">
                                    <i class="ti ti-id text-dark"></i><span><?php echo e(__('Employee')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endif; ?>

                <li class="dropdown dash-h-item drp-workspace">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="ti ti-layout-grid"></i>
                        <span class="drp-text hide-mob"><?php echo e(__('Workspace')); ?></span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                        <span class="dropdown-item-text workspace-menu-label"><?php echo e(__('Navigate')); ?></span>
                        <a href="<?php echo e(route('executive.dashboard')); ?>" class="dropdown-item">
                            <i class="ti ti-layout-dashboard text-dark"></i><span><?php echo e(__('Executive Overview')); ?></span>
                        </a>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage invoice')): ?>
                            <a href="<?php echo e(route('invoice.index')); ?>" class="dropdown-item">
                                <i class="ti ti-file-invoice text-dark"></i><span><?php echo e(__('Finance Desk')); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage lead')): ?>
                            <a href="<?php echo e(route('leads.index')); ?>" class="dropdown-item">
                                <i class="ti ti-users text-dark"></i><span><?php echo e(__('CRM Pipeline')); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage employee')): ?>
                            <a href="<?php echo e(route('employee.index')); ?>" class="dropdown-item">
                                <i class="ti ti-user-heart text-dark"></i><span><?php echo e(__('People Hub')); ?></span>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage projects')): ?>
                            <a href="<?php echo e(route('projects.index')); ?>" class="dropdown-item">
                                <i class="ti ti-briefcase text-dark"></i><span><?php echo e(__('Projects')); ?></span>
                            </a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item-text workspace-menu-label"><?php echo e(__('Shortcuts')); ?></span>
                        <a href="<?php echo e(route('core.saved-views.index')); ?>" class="dropdown-item">
                            <i class="ti ti-bookmarks text-dark"></i><span><?php echo e(__('Saved Views')); ?></span>
                        </a>
                        <a href="javascript:void(0)" class="dropdown-item" onclick="if(window.toggleNotifPanel){window.toggleNotifPanel();}">
                            <i class="ti ti-bell-ringing text-dark"></i><span><?php echo e(__('Notifications')); ?></span>
                        </a>
                        <a href="<?php echo e(route('core.onboarding')); ?>" class="dropdown-item">
                            <i class="ti ti-building-store text-dark"></i><span><?php echo e(__('Tenant Cockpit')); ?></span>
                        </a>
                        <a href="<?php echo e(route('core.security.index')); ?>" class="dropdown-item">
                            <i class="ti ti-shield-lock text-dark"></i><span><?php echo e(__('Security Center')); ?></span>
                        </a>
                        <a href="<?php echo e(route('core.help-center')); ?>" class="dropdown-item">
                            <i class="ti ti-lifebuoy text-dark"></i><span><?php echo e(__('Help Center')); ?></span>
                        </a>
                        <?php if($savedViews->isNotEmpty()): ?>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item-text workspace-menu-label"><?php echo e(__('Recent Views')); ?></span>
                            <?php $__currentLoopData = $savedViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $savedView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(route('core.saved-views.index')); ?>" class="dropdown-item">
                                    <i class="ti ti-arrow-forward-up text-dark"></i>
                                    <span><?php echo e($savedView->name); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </li>

                <li class="dropdown dash-h-item">
                    <a class="dash-head-link arrow-none me-0 dash-command-launcher" href="javascript:void(0)" onclick="openSearch()" data-global-search-trigger="1" aria-haspopup="false" aria-expanded="false">
                        <span class="command-icon">
                            <i class="ti ti-search"></i>
                        </span>
                        <span class="command-copy d-none d-xl-flex">
                            <span class="command-title"><?php echo e(__('Search, commands, clients...')); ?></span>
                            <span class="command-shortcut">Ctrl K</span>
                        </span>
                    </a>
                </li>

                <?php if( \Auth::user()->type !='client' && \Auth::user()->type !='super admin' ): ?>
                    <li class="dropdown dash-h-item drp-notification">
                        <a class="dash-head-link arrow-none me-0" href="<?php echo e(url('chats')); ?>" aria-haspopup="false"
                           aria-expanded="false">
                            <i class="ti ti-brand-hipchat"></i>
                            <span class="bg-danger dash-h-badge message-toggle-msg  message-counter custom_messanger_counter beep"> <?php echo e($unseenCounter); ?><span
                                    class="sr-only"></span>
                            </span>
                        </a>
                    </li>
                <?php endif; ?>

                <li class="dropdown dash-h-item drp-language">
                    <a
                        class="dash-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="ti ti-world nocolor"></i>
                        <span class="drp-text hide-mob"><?php echo e(ucfirst(optional($LangName)->full_name ?? ($languages[$lang] ?? $lang ?? 'en'))); ?></span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                    <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('change.language', $code)); ?>"
                               class="dropdown-item <?php echo e($lang == $code ? 'text-primary' : ''); ?>">
                                <span><?php echo e(ucFirst($language)); ?></span>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <h></h>
                            <?php if(\Auth::user()->type=='super admin'): ?>
                                <a data-url="<?php echo e(route('create.language')); ?>" class="dropdown-item text-primary" data-ajax-popup="true" data-title="<?php echo e(__('Create New Language')); ?>" style="cursor: pointer">
                                    <?php echo e(__('Create Language')); ?>

                                </a>
                                <a class="dropdown-item text-primary" href="<?php echo e(route('manage.language',[isset($lang)?$lang:'english'])); ?>"><?php echo e(__('Manage Language')); ?></a>
                            <?php endif; ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </header>
<?php /**PATH /var/www/html/resources/views/partials/admin/header.blade.php ENDPATH**/ ?>
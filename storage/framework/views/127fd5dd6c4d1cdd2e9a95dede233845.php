<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Executive Overview')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Executive Overview')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track cross-functional signals, urgent approvals and the latest financial activity from one role-aware control room.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="ux-kpi-grid mb-4">
        <?php $__currentLoopData = $summary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e($item['route']); ?>" class="ux-kpi-card executive-metric executive-metric-<?php echo e($item['accent']); ?>">
                <span class="ux-kpi-label"><?php echo e($item['label']); ?></span>
                <strong class="ux-kpi-value"><?php echo e($item['value']); ?></strong>
                <span class="ux-kpi-caption"><?php echo e($item['headline']); ?></span>
                <small class="ux-kpi-meta"><?php echo e($item['meta']); ?></small>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if(!empty($operationalPulse)): ?>
        <div class="card executive-section mb-4">
            <div class="card-header">
                <h5 class="mb-1"><?php echo e(__('Operational Pulse')); ?></h5>
                <p class="text-muted text-sm mb-0"><?php echo e(__('Cross-module operational signals from retail, medical, agro and industrial operations.')); ?></p>
            </div>
            <div class="card-body">
                <div class="ux-kpi-grid">
                    <?php $__currentLoopData = $operationalPulse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['route']); ?>" class="ux-kpi-card executive-metric executive-metric-<?php echo e($item['accent']); ?>">
                            <span class="ux-kpi-label"><?php echo e($item['label']); ?></span>
                            <strong class="ux-kpi-value"><?php echo e($item['value']); ?></strong>
                            <span class="ux-kpi-caption"><?php echo e($item['headline']); ?></span>
                            <small class="ux-kpi-meta"><?php echo e($item['meta']); ?></small>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        <div class="col-xxl-4">
            <div class="card h-100 executive-section">
                <div class="card-header">
                    <h5 class="mb-1"><?php echo e(__('Business Snapshot')); ?></h5>
                    <p class="text-muted text-sm mb-0"><?php echo e(__('The latest usage context and shortcuts for day-to-day steering.')); ?></p>
                </div>
                <div class="card-body">
                    <div class="executive-quick-links">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show crm dashboard')): ?>
                            <a href="<?php echo e(route('crm.dashboard')); ?>" class="executive-link-tile">
                                <i class="ti ti-target-arrow"></i>
                                <div>
                                    <strong><?php echo e(__('Commercial cockpit')); ?></strong>
                                    <span><?php echo e(__('Watch lead flow, deals and contracts.')); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show account dashboard')): ?>
                            <a href="<?php echo e(route('dashboard')); ?>" class="executive-link-tile">
                                <i class="ti ti-report-money"></i>
                                <div>
                                    <strong><?php echo e(__('Finance overview')); ?></strong>
                                    <span><?php echo e(__('Review invoices, bills and bank performance.')); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show project dashboard')): ?>
                            <a href="<?php echo e(route('project.dashboard')); ?>" class="executive-link-tile">
                                <i class="ti ti-briefcase"></i>
                                <div>
                                    <strong><?php echo e(__('Delivery overview')); ?></strong>
                                    <span><?php echo e(__('Open projects, tasks and execution load.')); ?></span>
                                </div>
                            </a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('approval-requests.index')); ?>" class="executive-link-tile">
                            <i class="ti ti-checkup-list"></i>
                            <div>
                                <strong><?php echo e(__('Pending validations')); ?></strong>
                                <span><?php echo e(__('Process delayed approvals before they escalate.')); ?></span>
                            </div>
                        </a>
                    </div>

                    <?php if($savedViews->isNotEmpty()): ?>
                        <div class="mt-4">
                            <h6 class="mb-3"><?php echo e(__('Recent saved views')); ?></h6>
                            <div class="d-flex flex-column gap-2">
                                <?php $__currentLoopData = $savedViews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $savedView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="executive-approval-row">
                                        <div>
                                            <strong><?php echo e($savedView->name); ?></strong>
                                            <div class="text-muted text-sm"><?php echo e(ucfirst(str_replace('_', ' ', $savedView->module))); ?></div>
                                        </div>
                                        <?php if($savedView->is_default): ?>
                                            <span class="badge bg-primary"><?php echo e(__('Default')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xxl-4">
            <div class="card h-100 executive-section">
                <div class="card-header">
                    <h5 class="mb-1"><?php echo e(__('Recent invoices')); ?></h5>
                    <p class="text-muted text-sm mb-0"><?php echo e(__('Latest commercial cash events across your tenant.')); ?></p>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $recentInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('invoice.show', $invoice->id)); ?>" class="executive-approval-row executive-row-link">
                            <div>
                                <strong><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></strong>
                                <div class="text-muted text-sm"><?php echo e(optional($invoice->customer)->name ?: __('No customer')); ?></div>
                            </div>
                            <div class="text-end">
                                <strong><?php echo e(\Auth::user()->priceFormat($invoice->getTotal())); ?></strong>
                                <div class="text-muted text-sm"><?php echo e(optional($invoice->created_at)->diffForHumans()); ?></div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="search-no-results">
                            <i class="ti ti-file-invoice"></i>
                            <p><?php echo e(__('No recent invoices available.')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xxl-4">
            <div class="card h-100 executive-section">
                <div class="card-header">
                    <h5 class="mb-1"><?php echo e(__('Recent purchases')); ?></h5>
                    <p class="text-muted text-sm mb-0"><?php echo e(__('Supplier spend and replenishment signals from the last entries.')); ?></p>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $recentPurchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('purchase.show', $purchase->id)); ?>" class="executive-approval-row executive-row-link">
                            <div>
                                <strong><?php echo e(\Auth::user()->purchaseNumberFormat($purchase->purchase_id)); ?></strong>
                                <div class="text-muted text-sm"><?php echo e(optional($purchase->vender)->name ?: __('No vendor')); ?></div>
                            </div>
                            <div class="text-end">
                                <strong><?php echo e(\Auth::user()->priceFormat($purchase->getTotal())); ?></strong>
                                <div class="text-muted text-sm"><?php echo e(optional($purchase->created_at)->diffForHumans()); ?></div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="search-no-results">
                            <i class="ti ti-shopping-cart"></i>
                            <p><?php echo e(__('No recent purchases available.')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card executive-section">
                <div class="card-header">
                    <h5 class="mb-1"><?php echo e(__('Urgent approvals')); ?></h5>
                    <p class="text-muted text-sm mb-0"><?php echo e(__('Escalated or due approvals that require immediate attention.')); ?></p>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $urgentApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('approval-requests.show', $approval->id)); ?>" class="executive-approval-row executive-row-link">
                            <div>
                                <strong><?php echo e(optional($approval->approvalFlow)->name ?: __('Approval flow')); ?></strong>
                                <div class="text-muted text-sm">
                                    <?php echo e(__('Step: :step', ['step' => optional($approval->currentStep)->name ?: __('Pending routing')])); ?>

                                </div>
                            </div>
                            <div>
                                <span class="badge bg-light text-dark"><?php echo e(ucfirst(str_replace('_', ' ', $approval->status))); ?></span>
                            </div>
                            <div class="text-muted text-sm text-end">
                                <?php if($approval->due_at): ?>
                                    <?php echo e(__('Due :date', ['date' => $approval->due_at->format('Y-m-d H:i')])); ?>

                                <?php else: ?>
                                    <?php echo e(__('No due date')); ?>

                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="search-no-results">
                            <i class="ti ti-checkup-list"></i>
                            <p><?php echo e(__('No urgent approvals right now.')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/dashboard/executive-dashboard.blade.php ENDPATH**/ ?>
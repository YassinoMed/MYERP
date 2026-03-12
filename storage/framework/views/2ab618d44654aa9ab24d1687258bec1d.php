<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Invoices')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Track billing status, due exposure and collection pressure from one finance workspace.')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        function copyToClipboard(element) {

            var copyText = element.id;
            navigator.clipboard.writeText(copyText);
            // document.addEventListener('copy', function (e) {
            //     e.clipboardData.setData('text/plain', copyText);
            //     e.preventDefault();
            // }, true);
            //
            // document.execCommand('copy');
            show_toastr('success', 'Url copied to clipboard', 'success');
        }

        (function () {
            var listUrl = <?php echo json_encode(route('invoice.filters.list'), 15, 512) ?>;
            var saveUrl = <?php echo json_encode(route('invoice.filters.save'), 15, 512) ?>;
            var applyUrlTemplate = <?php echo json_encode(route('invoice.filters.apply', '___ID___'), 512) ?>;
            var deleteUrlTemplate = <?php echo json_encode(route('invoice.filters.delete', '___ID___'), 512) ?>;
            var csrfToken = <?php echo json_encode(csrf_token(), 15, 512) ?>;

            function buildApplyUrl(id) {
                return applyUrlTemplate.replace('___ID___', encodeURIComponent(id));
            }

            function buildDeleteUrl(id) {
                return deleteUrlTemplate.replace('___ID___', encodeURIComponent(id));
            }

            function refreshSavedFilters() {
                $.ajax({
                    url: listUrl,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        var $select = $('#invoiceSavedFilters');
                        var current = $select.val();
                        $select.empty();
                        $select.append($('<option>', { value: '' }).text(<?php echo json_encode(__('Saved Filters'), 15, 512) ?>));

                        var filters = (data && data.filters) ? data.filters : [];
                        filters.forEach(function (filter) {
                            if (!filter || !filter.id || !filter.name || !filter.apply_url) {
                                return;
                            }
                            var $opt = $('<option>', { value: filter.apply_url }).text(filter.name);
                            $opt.attr('data-id', filter.id);
                            $select.append($opt);
                        });

                        if (current) {
                            $select.val(current);
                        }
                    }
                });
            }

            function askFilterName(callback) {
                if (typeof Swal !== 'undefined' && Swal && Swal.fire) {
                    Swal.fire({
                        title: <?php echo json_encode(__('Save Filter'), 15, 512) ?>,
                        input: 'text',
                        inputPlaceholder: <?php echo json_encode(__('Filter name'), 15, 512) ?>,
                        showCancelButton: true,
                        confirmButtonText: <?php echo json_encode(__('Save'), 15, 512) ?>,
                        cancelButtonText: <?php echo json_encode(__('Cancel'), 15, 512) ?>,
                        inputValidator: function (value) {
                            if (!value) {
                                return <?php echo json_encode(__('This field is required.'), 15, 512) ?>;
                            }
                        }
                    }).then(function (result) {
                        if (result && result.isConfirmed) {
                            callback(result.value);
                        }
                    });
                } else {
                    var name = window.prompt(<?php echo json_encode(__('Filter name'), 15, 512) ?>);
                    if (name) {
                        callback(name);
                    }
                }
            }

            $(document).ready(function () {
                refreshSavedFilters();

                $('#invoiceSavedFilters').on('change', function () {
                    var url = $(this).val();
                    if (url) {
                        window.location.href = url;
                    }
                });

                $('#invoiceSaveFilterBtn').on('click', function (e) {
                    e.preventDefault();
                    askFilterName(function (name) {
                        $.ajax({
                            url: saveUrl,
                            type: 'POST',
                            dataType: 'json',
                            headers: { 'X-CSRF-TOKEN': csrfToken },
                            data: {
                                name: name,
                                issue_date: $('[name="issue_date"]').val(),
                                customer: $('[name="customer"]').val(),
                                status: $('[name="status"]').val()
                            },
                            success: function (res) {
                                if (res && res.flag === 1) {
                                    show_toastr('success', (res.msg || <?php echo json_encode(__('Saved.'), 15, 512) ?>), 'success');
                                    refreshSavedFilters();
                                } else {
                                    show_toastr('error', (res && res.msg ? res.msg : <?php echo json_encode(__('Unable to save.'), 15, 512) ?>), 'error');
                                }
                            },
                            error: function (xhr) {
                                var msg = <?php echo json_encode(__('Unable to save.'), 15, 512) ?>;
                                if (xhr && xhr.responseJSON && xhr.responseJSON.msg) {
                                    msg = xhr.responseJSON.msg;
                                }
                                show_toastr('error', msg, 'error');
                            }
                        });
                    });
                });

                $('#invoiceDeleteFilterBtn').on('click', function (e) {
                    e.preventDefault();

                    var $selected = $('#invoiceSavedFilters option:selected');
                    var id = $selected.data('id');
                    if (!id) {
                        return;
                    }

                    var runDelete = function () {
                        $.ajax({
                            url: buildDeleteUrl(id),
                            type: 'DELETE',
                            dataType: 'json',
                            headers: { 'X-CSRF-TOKEN': csrfToken },
                            success: function (res) {
                                if (res && res.flag === 1) {
                                    show_toastr('success', (res.msg || <?php echo json_encode(__('Deleted.'), 15, 512) ?>), 'success');
                                    $('#invoiceSavedFilters').val('');
                                    refreshSavedFilters();
                                } else {
                                    show_toastr('error', (res && res.msg ? res.msg : <?php echo json_encode(__('Unable to delete.'), 15, 512) ?>), 'error');
                                }
                            },
                            error: function () {
                                show_toastr('error', <?php echo json_encode(__('Unable to delete.'), 15, 512) ?>, 'error');
                            }
                        });
                    };

                    if (typeof Swal !== 'undefined' && Swal && Swal.fire) {
                        Swal.fire({
                            title: <?php echo json_encode(__('Are You Sure?'), 15, 512) ?>,
                            text: <?php echo json_encode(__('This action can not be undone. Do you want to continue?'), 15, 512) ?>,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: <?php echo json_encode(__('Yes'), 15, 512) ?>,
                            cancelButtonText: <?php echo json_encode(__('Cancel'), 15, 512) ?>
                        }).then(function (result) {
                            if (result && result.isConfirmed) {
                                runDelete();
                            }
                        });
                    } else {
                        if (window.confirm(<?php echo json_encode(__('Are You Sure?'), 15, 512) ?>)) {
                            runDelete();
                        }
                    }
                });
            });
        })();
    </script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Invoice')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <a href="<?php echo e(route('invoice.export')); ?>" class="btn btn-sm btn-secondary me-2" data-bs-toggle="tooltip" title="<?php echo e(__('Export')); ?>">
            <i class="ti ti-file-export"></i>
        </a>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create invoice')): ?>
            <a href="<?php echo e(route('invoice.create', 0)); ?>" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php
        $draftInvoices = $invoices->where('status', 0)->count();
        $unpaidInvoices = $invoices->whereIn('status', [1, 2])->count();
        $paidInvoices = $invoices->where('status', 4)->count();
        $dueExposure = $invoices->sum(function ($invoice) {
            return (float) $invoice->getDue();
        });
    ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card ux-filter-card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start justify-content-between gap-3 mb-3">
                            <div>
                                <h6 class="mb-1"><?php echo e(__('Filter receivables and billing activity')); ?></h6>
                                <p class="text-muted mb-0"><?php echo e(__('Use saved views for recurring review sessions and keep collection follow-up consistent across teams.')); ?></p>
                            </div>
                        </div>
                        <?php echo e(Form::open(['route' => ['invoice.index'], 'method' => 'GET', 'id' => 'customer_submit', 'data-autosave' => '1'])); ?>

                        <div class="row d-flex align-items-center justify-content-end">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                <div class="btn-box">
                                    <?php echo e(Form::label('issue_date', __('Issue Date'),['class'=>'form-label'])); ?>

                                    <?php echo e(Form::date('issue_date', isset($_GET['issue_date'])?$_GET['issue_date']:'', array('class' => 'form-control month-btn','id'=>'pc-daterangepicker-1', 'placeholder' => __('Issue Date')))); ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12 mr-2">
                                    <div class="btn-box">
                                        <?php echo e(Form::label('customer', __('Customer'),['class'=>'form-label'])); ?>

                                        <?php echo e(Form::select('customer', $customer, isset($_GET['customer']) ? $_GET['customer'] : '', ['class' => 'form-control select'])); ?>

                                    </div>
                                </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="btn-box">
                                    <?php echo e(Form::label('status', __('Status'),['class'=>'form-label'])); ?>

                                    <?php echo e(Form::select('status', [''=>'Select Status'] + $status,isset($_GET['status'])?$_GET['status']:'', array('class' => 'form-control select'))); ?>

                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                <div class="btn-box">
                                    <?php echo e(Form::label('saved_filters', __('Saved Filters'),['class'=>'form-label'])); ?>

                                    <select id="invoiceSavedFilters" class="form-control">
                                        <option value=""><?php echo e(__('Saved Filters')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto float-end ms-2 mt-4 ux-filter-actions">
                                <a href="#" class="btn btn-sm btn-primary me-1"
                                   onclick="document.getElementById('customer_submit').submit(); return false;"
                                   data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Apply')); ?>">
                                    <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                </a>
                                <a href="#" class="btn btn-sm btn-secondary me-1" id="invoiceSaveFilterBtn"
                                   data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Save Filter')); ?>">
                                    <span class="btn-inner--icon"><i class="ti ti-device-floppy"></i></span>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-danger me-1" id="invoiceDeleteFilterBtn"
                                   data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Delete')); ?>">
                                    <span class="btn-inner--icon"><i class="ti ti-trash"></i></span>
                                </a>
                                <a href="<?php echo e(route('invoice.index')); ?>" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                   data-bs-original-title="<?php echo e(__('Reset')); ?>">
                                    <span class="btn-inner--icon"><i class="ti ti-refresh text-white-off"></i></span>
                                </a>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Draft invoices')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($draftInvoices); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('awaiting validation')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Invoices to collect')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($unpaidInvoices); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('open or partially paid')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Paid invoices')); ?></span>
            <strong class="ux-kpi-value"><?php echo e($paidInvoices); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('closed cash cycle')); ?></span>
        </div>
        <div class="ux-kpi-card">
            <span class="ux-kpi-label"><?php echo e(__('Due exposure')); ?></span>
            <strong class="ux-kpi-value"><?php echo e(\Auth::user()->priceFormat($dueExposure)); ?></strong>
            <span class="ux-kpi-meta"><?php echo e(__('remaining receivable amount')); ?></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <h5></h5>
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th> <?php echo e(__('Invoice')); ?></th>
                                <th><?php echo e(__('Issue Date')); ?></th>
                                <th><?php echo e(__('Due Date')); ?></th>
                                <th><?php echo e(__('Due Amount')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice')): ?>
                                    <th><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-bulk-id="<?php echo e($invoice->id); ?>">
                                    <td class="Id">
                                        <a href="<?php echo e(route('invoice.show', \Crypt::encrypt($invoice->id))); ?>" class="btn btn-outline-primary"><?php echo e(AUth::user()->invoiceNumberFormat($invoice->invoice_id)); ?></a>
                                    </td>
                                    <td><?php echo e(Auth::user()->dateFormat($invoice->issue_date)); ?></td>
                                    <td>
                                        <?php if($invoice->due_date < date('Y-m-d')): ?>
                                            <p class="text-danger mt-3">
                                                <?php echo e(\Auth::user()->dateFormat($invoice->due_date)); ?></p>
                                        <?php else: ?>
                                            <?php echo e(\Auth::user()->dateFormat($invoice->due_date)); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(\Auth::user()->priceFormat($invoice->getDue())); ?></td>
                                    <td>
                                        <?php if($invoice->status == 0): ?>
                                            <span
                                                class="status_badge badge bg-secondary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 1): ?>
                                            <span
                                                class="status_badge badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 2): ?>
                                            <span
                                                class="status_badge badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 3): ?>
                                            <span
                                                class="status_badge badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php elseif($invoice->status == 4): ?>
                                            <span
                                                class="status_badge badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$statues[$invoice->status])); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if(Gate::check('edit invoice') || Gate::check('delete invoice') || Gate::check('show invoice')): ?>
                                        <td class="Action">
                                                <span>
                                                <?php $invoiceID= Crypt::encrypt($invoice->id); ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('copy invoice')): ?>
                                                        <div class="action-btn me-2">
                                                            <a href="#" id="<?php echo e(route('invoice.link.copy',[$invoiceID])); ?>" class="mx-3 btn btn-sm align-items-center bg-secondary"
                                                               onclick="copyToClipboard(this)" data-bs-toggle="tooltip" title="<?php echo e(__('Copy Invoice')); ?>" data-original-title="<?php echo e(__('Copy Invoice')); ?>"><i class="ti ti-link text-white"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('duplicate invoice')): ?>
                                                        <div class="action-btn me-2">
                                                            <?php echo Form::open(['method' => 'get', 'route' => ['invoice.duplicate', $invoice->id], 'id' => 'duplicate-form-' . $invoice->id]); ?>

                                                            <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-primary" data-toggle="tooltip"
                                                               data-original-title="<?php echo e(__('Duplicate')); ?>" data-bs-toggle="tooltip" title="Duplicate Invoice"
                                                               data-original-title="<?php echo e(__('Delete')); ?>"
                                                               data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back"
                                                               data-confirm-yes="document.getElementById('duplicate-form-<?php echo e($invoice->id); ?>').submit();">
                                                                <i class="ti ti-copy text-white"></i>
                                                            </a>
                                                            <?php echo Form::close(); ?>

                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show invoice')): ?>
                                                            <div class="action-btn me-2">
                                                                    <a href="<?php echo e(route('invoice.show', \Crypt::encrypt($invoice->id))); ?>"
                                                                       class="mx-3 btn btn-sm align-items-center bg-warning" data-bs-toggle="tooltip" title="Show "
                                                                       data-original-title="<?php echo e(__('Detail')); ?>">
                                                                        <i class="ti ti-eye text-white"></i>
                                                                    </a>
                                                                </div>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit invoice')): ?>
                                                        <?php if($invoice->status != 3 && $invoice->status != 4): ?>
                                                            <div class="action-btn me-2">
                                                                <a href="<?php echo e(route('invoice.edit', \Crypt::encrypt($invoice->id))); ?>"
                                                                   class="mx-3 btn btn-sm align-items-center  bg-info" data-bs-toggle="tooltip" title="Edit "
                                                                   data-original-title="<?php echo e(__('Edit')); ?>">
                                                                    <i class="ti ti-pencil text-white"></i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete invoice')): ?>
                                                        <div class="action-btn ">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $invoice->id], 'id' => 'delete-form-' . $invoice->id]); ?>

                                                                    <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger " data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"
                                                                       data-original-title="<?php echo e(__('Delete')); ?>"
                                                                       data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                                       data-confirm-yes="document.getElementById('delete-form-<?php echo e($invoice->id); ?>').submit();">
                                                                        <i class="ti ti-trash text-white"></i>
                                                                    </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                    <?php endif; ?>
                                                </span>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/invoice/index.blade.php ENDPATH**/ ?>
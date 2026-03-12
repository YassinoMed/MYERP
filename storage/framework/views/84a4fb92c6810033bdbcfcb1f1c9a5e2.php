<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Proposal Detail')); ?>

<?php $__env->stopSection(); ?>
<?php
    $settings = Utility::settings();
?>
<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).on('change', '.status_change', function () {
            var status = this.value;
            var url = $(this).data('url');
            $.ajax({
                url: url + '?status=' + status,
                type: 'GET',
                cache: false,
                success: function (data) {
                },
            });
        });

        $('.cp_link').on('click', function () {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            show_toastr('success', '<?php echo e(__('Link Copy on Clipboard')); ?>')
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('proposal.index')); ?>"><?php echo e(__('Proposal')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Proposal Details')); ?></li>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send proposal')): ?>
        <?php if($proposal->status!=4): ?>
        <div class="row">
            <div class="col-12">
                <div class="bill-timeline-card mb-4">
                    <div class="row timeline-wrapper">
                        <div class="col-xl-4 col-md-5 col-sm-7 create-invoice invoice">
                            <div class="progress mb-3">
                                <div class="progress-value"></div>
                            </div>
                            <div class="bill-timeline-inner d-flex gap-3">
                                <div class="timeline-icon d-flex align-items-center justify-content-center">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_69_767)">
                                            <path
                                                d="M9.15642 18C8.92315 18 8.69942 17.9074 8.53447 17.7426C8.36952 17.5777 8.27686 17.3542 8.27686 17.1211V0.878906C8.27686 0.645806 8.36952 0.422253 8.53447 0.257426C8.69942 0.0925988 8.92315 0 9.15642 0C9.3897 0 9.61342 0.0925988 9.77837 0.257426C9.94332 0.422253 10.036 0.645806 10.036 0.878906V17.1211C10.036 17.3542 9.94332 17.5777 9.77837 17.7426C9.61342 17.9074 9.3897 18 9.15642 18Z"
                                                fill="white" />
                                            <path
                                                d="M17.2838 9.87891H1.02947C0.796193 9.87891 0.572472 9.78631 0.407521 9.62148C0.242571 9.45665 0.149902 9.2331 0.149902 9C0.149902 8.7669 0.242571 8.54335 0.407521 8.37852C0.572472 8.21369 0.796193 8.12109 1.02947 8.12109H17.2838C17.5171 8.12109 17.7408 8.21369 17.9058 8.37852C18.0707 8.54335 18.1634 8.7669 18.1634 9C18.1634 9.2331 18.0707 9.45665 17.9058 9.62148C17.7408 9.78631 17.5171 9.87891 17.2838 9.87891Z"
                                                fill="white" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_69_767">
                                                <rect width="18.0135" height="18" fill="white"
                                                    transform="translate(0.149902)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="timeline-content text-start">
                                    <h5 class="mb-2"><?php echo e(__('Create Proposal')); ?></h5>
                                    <p class="text-muted mb-2">
                                        <?php echo e(__('Created on ')); ?><?php echo e(\Auth::user()->dateFormat($proposal->issue_date)); ?></p>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit proposal')): ?>
                                        <a href="<?php echo e(route('proposal.edit', \Crypt::encrypt($proposal->id))); ?>"
                                            class="btn btn-sm d-inline-flex align-items-center gap-2" data-bs-toggle="tooltip"
                                            data-original-title="<?php echo e(__('Edit')); ?>">
                                            <i class="ti ti-pencil mr-2"></i>
                                            <?php echo e(__('Edit')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-5 col-sm-7 send-invoice invoice">
                            <div class="progress mb-3">
                                <div class="<?php echo e($proposal->status !== 0 ? 'progress-value' : ''); ?>"></div>
                            </div>
                            <div class="bill-timeline-inner d-flex gap-3">
                                <div class="timeline-icon d-flex align-items-center justify-content-center">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.3797 5.12359L7.43524 9.24773L1.21757 7.17645C0.783563 7.03159 0.491171 6.62471 0.493668 6.16758C0.496198 5.71046 0.791942 5.30607 1.22762 5.16627L17.1241 0.0508648C17.502 -0.0705155 17.9167 0.0290971 18.1974 0.309582C18.4781 0.590066 18.5778 1.00447 18.4563 1.38208L13.337 17.2666C13.1971 17.702 12.7924 17.9975 12.335 18C11.8775 18.0025 11.4703 17.7103 11.3253 17.2767L9.24246 11.0335L13.3797 5.12359Z"
                                            fill="white" />
                                    </svg>
                                </div>
                                <div class="timeline-content text-start">
                                    <h5 class="mb-2"><?php echo e(__('Send Proposal')); ?></h5>
                                    <p class="text-muted mb-2">
                                        <?php if($proposal->status != 0): ?>
                                            <?php echo e(__('Sent on')); ?> <?php echo e(\Auth::user()->dateFormat($proposal->send_date)); ?>

                                        <?php else: ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send proposal')): ?>
                                                <small><?php echo e(__('Status')); ?> : <?php echo e(__('Not Sent')); ?></small>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </p>
                                    <?php if($proposal->status == 0): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('send proposal')): ?>
                                            <a href="<?php echo e(route('proposal.sent', $proposal->id)); ?>"
                                                class="btn btn-sm d-inline-flex align-items-center gap-2 btn-warning border-0"
                                                data-bs-toggle="tooltip" data-original-title="<?php echo e(__('Mark Sent')); ?>"><i
                                                    class="ti ti-send mr-2"></i><?php echo e(__('Send')); ?></a>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-5 col-sm-7 get-paid invoice">
                            <div class="progress mb-3">
                                <div class="<?php echo e($proposal->status !== 0 ? 'progress-value' : ''); ?>"></div>
                            </div>
                            <div class="bill-timeline-inner d-flex gap-3">
                                <div class="timeline-icon d-flex align-items-center justify-content-center">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.386719 5.30859H8.47266V6.36328H0.386719V5.30859Z" fill="white" />
                                        <path
                                            d="M8.47266 7.06641H0.386719V9.52734H8.47266V7.06641ZM3.72656 8.47266H1.79297C1.5988 8.47266 1.44141 8.31526 1.44141 8.12109C1.44141 7.92693 1.5988 7.76953 1.79297 7.76953H3.72656C3.92073 7.76953 4.07812 7.92693 4.07812 8.12109C4.07812 8.31526 3.92073 8.47266 3.72656 8.47266ZM7.06641 8.47266H5.13281C4.93864 8.47266 4.78125 8.31526 4.78125 8.12109C4.78125 7.92693 4.93864 7.76953 5.13281 7.76953H7.06641C7.26057 7.76953 7.41797 7.92693 7.41797 8.12109C7.41797 8.31526 7.26057 8.47266 7.06641 8.47266Z"
                                            fill="white" />
                                        <path
                                            d="M10.5981 3.55005C10.5708 3.55131 4.92694 3.55075 3.55078 3.55086V4.60555H9.17578V10.2305H3.55078V14.4493H14.4492V7.06648C12.4352 7.06648 10.776 5.51852 10.5981 3.55005Z"
                                            fill="white" />
                                        <path
                                            d="M10.598 2.84846C10.7029 1.68683 11.3235 0.671766 12.2291 0.0351562H4.95703C4.18148 0.0351562 3.55078 0.665859 3.55078 1.44141V2.84766C4.94831 2.84776 10.5702 2.8472 10.598 2.84846ZM9.52734 1.79297H7.76953C7.57536 1.79297 7.41797 1.63557 7.41797 1.44141C7.41797 1.24724 7.57536 1.08984 7.76953 1.08984H9.52734C9.72148 1.08984 9.87891 1.24724 9.87891 1.44141C9.87891 1.63557 9.72148 1.79297 9.52734 1.79297Z"
                                            fill="white" />
                                        <path
                                            d="M3.55078 16.5586C3.55078 17.3341 4.18148 17.9648 4.95703 17.9648H13.043C13.8185 17.9648 14.4492 17.3341 14.4492 16.5586V15.1523H3.55078V16.5586ZM8.12109 16.207H9.87891C10.073 16.207 10.2305 16.3645 10.2305 16.5586C10.2305 16.7527 10.073 16.9102 9.87891 16.9102H8.12109C7.92703 16.9102 7.76953 16.7527 7.76953 16.5586C7.76953 16.3645 7.92703 16.207 8.12109 16.207Z"
                                            fill="white" />
                                        <path
                                            d="M14.4492 0.0351562C12.7017 0.0351562 11.2852 1.45174 11.2852 3.19922C11.2852 4.9467 12.7017 6.36328 14.4492 6.36328C16.1967 6.36328 17.6133 4.9467 17.6133 3.19922C17.6133 1.45174 16.1967 0.0351562 14.4492 0.0351562ZM16.0162 2.52496L14.1705 4.37066C14.0331 4.50795 13.8106 4.50795 13.6733 4.37066L12.8822 3.57964C12.7449 3.44236 12.7449 3.21975 12.8822 3.08243C13.0196 2.94514 13.2421 2.94514 13.3794 3.08243L13.9219 3.62489L15.519 2.02778C15.6563 1.89049 15.8788 1.89049 16.0162 2.02778C16.1535 2.16506 16.1535 2.38767 16.0162 2.52496Z"
                                            fill="white" />
                                    </svg>
                                </div>
                                <div class="timeline-content text-start">
                                    <h5 class="mb-2"><?php echo e(__('Proposal Status')); ?></h5>
                                    <span>
                                        <?php if($proposal->status == 0): ?>
                                            <span
                                                class="badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 1): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 2): ?>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 3): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 4): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php endif; ?>
                                    </span>
                                    <div class="mt-3" data-toggle="tooltip"
                                        data-original-title="<?php echo e(__('Click to change status')); ?>">
                                        <select class="form-control status_change select2" name="status"
                                            data-url="<?php echo e(route('proposal.status.change', $proposal->id)); ?>">
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($k); ?>"
                                                    <?php echo e($proposal->status == $k ? 'selected' : ''); ?>><?php echo e($val); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php endif; ?>
    <?php endif; ?>

    <?php if(\Auth::user()->type=='company'): ?>
        <?php if($proposal->status!=0): ?>
            <div class="row justify-content-between align-items-center mb-3">
                <div class="col-md-12 d-flex align-items-center justify-content-between justify-content-md-end">
                    <div class="all-button-box mx-2">
                        <a href="<?php echo e(route('proposal.resent',$proposal->id)); ?>" class="btn btn-primary"><?php echo e(__('Resend Proposal')); ?></a>
                    </div>
                    <div class="all-button-box">
                        <a href="<?php echo e(route('proposal.pdf', Crypt::encrypt($proposal->id))); ?>" class="btn btn-primary" target="_blank" ><?php echo e(__('Download')); ?></a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-md-12 d-flex align-items-center justify-content-between justify-content-md-end">
                <div class="all-button-box">
                    <a href="<?php echo e(route('proposal.pdf', Crypt::encrypt($proposal->id))); ?>" class="btn btn-xs btn-white btn-icon-only width-auto" target="_blank" ><?php echo e(__('Download')); ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice">
                        <div class="invoice-print">
                            <div class="row invoice-title mt-2">
                                <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12">
                                    <h4><?php echo e(__('Proposal')); ?></h4>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12 text-end">
                                    <h4 class="invoice-number"><?php echo e(Auth::user()->proposalNumberFormat($proposal->proposal_id)); ?></h4>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="me-4">
                                            <small>
                                                <strong><?php echo e(__('Issue Date')); ?> :</strong><br>
                                                <?php echo e(\Auth::user()->dateFormat($proposal->issue_date)); ?><br><br>
                                            </small>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <small class="font-style">
                                        <strong><?php echo e(__('Billed To')); ?> :</strong><br>
                                        <?php if(!empty($customer->billing_name)): ?>
                                            <?php echo e(!empty($customer->billing_name)?$customer->billing_name:''); ?><br>
                                            <?php echo e(!empty($customer->billing_address)?$customer->billing_address:''); ?><br>
                                            <?php echo e(!empty($customer->billing_city)?$customer->billing_city:'' .', '); ?><br>
                                            <?php echo e(!empty($customer->billing_state)?$customer->billing_state:'',', '); ?>,
                                            <?php echo e(!empty($customer->billing_zip)?$customer->billing_zip:''); ?><br>
                                            <?php echo e(!empty($customer->billing_country)?$customer->billing_country:''); ?><br>
                                            <?php echo e(!empty($customer->billing_phone)?$customer->billing_phone:''); ?><br>

                                            <?php if($settings['vat_gst_number_switch'] == 'on'): ?>
                                                <?php if(!empty($settings['tax_type']) && !empty($settings['vat_number'])): ?><?php echo e($settings['tax_type'].' '. __('Number')); ?> : <?php echo e($settings['vat_number']); ?> <br><?php endif; ?>

                                                <strong><?php echo e(__('Tax Number ')); ?> : </strong><?php echo e(!empty($customer->tax_number)?$customer->tax_number:''); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </small>
                                </div>

                                <?php if(App\Models\Utility::getValByName('shipping_display')=='on'): ?>
                                    <div class="col">
                                        <small>
                                            <strong><?php echo e(__('Shipped To')); ?> :</strong><br>
                                            <?php if(!empty($customer->shipping_name)): ?>
                                                <?php echo e(!empty($customer->shipping_name)?$customer->shipping_name:''); ?><br>
                                                <?php echo e(!empty($customer->shipping_address)?$customer->shipping_address:''); ?><br>
                                                <?php echo e(!empty($customer->shipping_city)?$customer->shipping_city:'' . ', '); ?><br>
                                                <?php echo e(!empty($customer->shipping_state)?$customer->shipping_state:'' .', '); ?>,
                                                <?php echo e(!empty($customer->shipping_zip)?$customer->shipping_zip:''); ?><br>
                                                <?php echo e(!empty($customer->shipping_country)?$customer->shipping_country:''); ?><br>
                                                <?php echo e(!empty($customer->shipping_phone)?$customer->shipping_phone:''); ?><br>
                                            <?php else: ?>
                                            -
                                            <?php endif; ?>
                                        </small>
                                    </div>
                                <?php endif; ?>
                                    <div class="col">
                                        <div class="float-end mt-3">
                                        <?php if($settings['qr_display'] == 'on'): ?>
                                            <?php echo DNS2D::getBarcodeHTML( route('proposal.link.copy',\Illuminate\Support\Facades\Crypt::encrypt($proposal->id)), "QRCODE",2,2); ?>

                                        <?php endif; ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <small>
                                        <strong><?php echo e(__('Status')); ?> :</strong><br>
                                        <?php if($proposal->status == 0): ?>
                                            <span class="badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 1): ?>
                                            <span class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 2): ?>
                                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 3): ?>
                                            <span class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php elseif($proposal->status == 4): ?>
                                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                        <?php endif; ?>
                                    </small>
                                </div>


                            </div>

                            <?php if(!empty($customFields) && count($proposal->customField)>0): ?>
                                <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col text-end">
                                        <small>
                                            <strong><?php echo e($field->name); ?> :</strong><br>
                                            <?php echo e(!empty($proposal->customField)?$proposal->customField[$field->id]:'-'); ?>

                                            <br><br>
                                        </small>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="font-weight-bold"><?php echo e(__('Product Summary')); ?></div>
                                    <small><?php echo e(__('All items here cannot be deleted.')); ?></small>
                                    <div class="table-responsive mt-2">
                                        <table class="table mb-0 invoice-body">
                                            <thead>
                                                <tr>
                                                <th class="text-dark" data-width="40">#</th>
                                                <th class="text-dark"><?php echo e(__('Product')); ?></th>
                                                <th class="text-dark"><?php echo e(__('Quantity')); ?></th>
                                                <th class="text-dark"><?php echo e(__('Rate')); ?></th>
                                                    <th class="text-dark"> <?php echo e(__('Discount')); ?></th>
                                                <th class="text-dark"><?php echo e(__('Tax')); ?></th>

                                                <th class="text-dark"><?php echo e(__('Description')); ?></th>
                                                <th class="text-end text-dark" width="12%"><?php echo e(__('Price')); ?><br>
                                                    <small class="text-danger font-weight-bold"><?php echo e(__('after tax & discount')); ?></small>
                                                </th>
                                            </tr>
                                            </thead>

                                            <?php
                                                $totalQuantity=0;
                                                $totalRate=0;
                                                $totalTaxPrice=0;
                                                $totalDiscount=0;
                                                $taxesData=[];
                                            ?>

                                            <?php $__currentLoopData = $iteams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$iteam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key + 1); ?></td>
                                                    <?php
                                                        $productName = $iteam->product;
                                                        $totalQuantity += $iteam->quantity;
                                                        $totalRate += $iteam->price;
                                                        $totalDiscount += $iteam->discount;
                                                    ?>
                                                    <td><?php echo e(!empty($productName) ? $productName->name : ''); ?></td>
                                                    <td><?php echo e($iteam->quantity . ' (' . $productName->unit->name . ')'); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($iteam->price)); ?></td>
                                                    <td><?php echo e(\Auth::user()->priceFormat($iteam->discount)); ?></td>
                                                    <td>
                                                        <?php if(!empty($iteam->tax)): ?>
                                                            <table>
                                                                <?php
                                                                    $itemTaxes = [];
                                                                    $getTaxData = Utility::getTaxData();
                                                                    $itemTaxPrice = 0;

                                                                    if (!empty($iteam->tax)) {
                                                                        foreach (explode(',', $iteam->tax) as $tax) {
                                                                            $taxPrice = \Utility::taxRate($getTaxData[$tax]['rate'], $iteam->price, $iteam->quantity, $iteam->discount);
                                                                            $itemTaxPrice += $taxPrice;
                                                                            $totalTaxPrice += $taxPrice;
                                                                            $itemTax['name'] = $getTaxData[$tax]['name'];
                                                                            $itemTax['rate'] = $getTaxData[$tax]['rate'] . '%';
                                                                            $itemTax['price'] = \Auth::user()->priceFormat($taxPrice);

                                                                            $itemTaxes[] = $itemTax;
                                                                            if (array_key_exists($getTaxData[$tax]['name'], $taxesData)) {
                                                                                $taxesData[$getTaxData[$tax]['name']] = $taxesData[$getTaxData[$tax]['name']] + $taxPrice;
                                                                            } else {
                                                                                $taxesData[$getTaxData[$tax]['name']] = $taxPrice;
                                                                            }
                                                                        }
                                                                        $iteam->itemTax = $itemTaxes;
                                                                    } else {
                                                                        $iteam->itemTax = [];
                                                                    }
                                                                ?>
                                                                <?php $__currentLoopData = $iteam->itemTax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                        <tr>
                                                                            <td><?php echo e($tax['name'] .' ('.$tax['rate'] .')'); ?></td>
                                                                            <td><?php echo e($tax['price']); ?></td>
                                                                        </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </table>
                                                        <?php else: ?>
                                                            <?php
                                                                $itemTaxPrice = 0;
                                                            ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>

                                                    <td><?php echo e(!empty($iteam->description)?$iteam->description:'-'); ?></td>
                                                    <td class="text-end"><?php echo e(\Auth::user()->priceFormat(($iteam->price * $iteam->quantity - $iteam->discount) + $itemTaxPrice)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><b><?php echo e(__('Total')); ?></b></td>
                                                <td><b><?php echo e($totalQuantity); ?></b></td>
                                                <td><b><?php echo e(\Auth::user()->priceFormat($totalRate)); ?></b></td>
                                                <td><b><?php echo e(\Auth::user()->priceFormat($totalDiscount)); ?></b>
                                                <td><b><?php echo e(\Auth::user()->priceFormat($totalTaxPrice)); ?></b></td>

                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class="text-end"><b><?php echo e(__('Sub Total')); ?></b></td>
                                                <td class="text-end"><?php echo e(\Auth::user()->priceFormat($proposal->getSubTotal())); ?></td>
                                            </tr>

                                                <tr>
                                                    <td colspan="6"></td>
                                                    <td class="text-end"><b><?php echo e(__('Discount')); ?></b></td>
                                                    <td class="text-end"><?php echo e(\Auth::user()->priceFormat($proposal->getTotalDiscount())); ?></td>
                                                </tr>

                                            <?php if(!empty($taxesData)): ?>
                                                <?php $__currentLoopData = $taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                        <td class="text-end"><b><?php echo e($taxName); ?></b></td>
                                                        <td class="text-end"><?php echo e(\Auth::user()->priceFormat($taxPrice)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class="blue-text text-end"><b><?php echo e(__('Total')); ?></b></td>
                                                <td class="blue-text text-end"><?php echo e(\Auth::user()->priceFormat($proposal->getTotal())); ?></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="invoice-footer">
                                            <b><?php echo e($settings['footer_title']); ?></b> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/proposal/view.blade.php ENDPATH**/ ?>
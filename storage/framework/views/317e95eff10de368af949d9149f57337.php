<!DOCTYPE html>
<?php
    $settings = \App\Models\Utility::settingsById($invoice->created_by);
?>

<html lang="en" dir="<?php echo e($settings['SITE_RTL'] == 'on' ? 'rtl' : ''); ?>">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?php echo e(\App\Models\Utility::invoiceNumberFormat($settings , $invoice->invoice_id)); ?>

            |
            
        </title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
            rel="stylesheet">

        <?php if($settings['SITE_RTL'] == 'on'): ?>
            <link rel="stylesheet" href="<?php echo e(asset('css/template-rtl.css')); ?>">
        <?php else: ?>
            <link rel="stylesheet" href="<?php echo e(asset('css/template.css')); ?>">
        <?php endif; ?>
        <style type="text/css">
            :root {
                --theme-color:<?php echo e($color); ?>;
                --white: #ffffff;
                --black: #000000;
            }
            /*  */

                .hg-pdf table tr {
                page-break-inside: avoid;           
                }

        </style>
    </head>
    <body>
        <div class="invoice-preview-main no-padding-table" id="boxes">
            <div class="invoice-header" style="background-color: var(--theme-color); color: <?php echo e($font_color); ?>;">

                <header>
                    <div class="navbar d-flex justify-content-between align-items-center" style="margin-right: 21px;">
                        <div class="logo">
                            <div class="view-qrcode" style="margin-left: 0; margin-right: 0;">
                                <img src="<?php echo e($img); ?>" alt="">
                            </div>
                        </div>
                        <div class="text-center" style="margin: auto;"><h1><?php echo e(__('INVOICE')); ?></h1></div>
                    </div>
                </header>
                <div class="table-responsive">
                    <table class="vertical-align-top">
                        <tbody>
                        <tr>
                            <td>
                                <p>
                                    <?php if($settings['company_name']): ?><?php echo e($settings['company_name']); ?><?php endif; ?><br>
                                    <?php if($settings['mail_from_address']): ?><?php echo e($settings['mail_from_address']); ?><?php endif; ?><br><br>
                                    <?php if($settings['company_address']): ?><?php echo e($settings['company_address']); ?><?php endif; ?>
                                    <?php if($settings['company_city']): ?> <br> <?php echo e($settings['company_city']); ?>, <?php endif; ?>
                                    <?php if($settings['company_state']): ?><?php echo e($settings['company_state']); ?><?php endif; ?>
                                    <?php if($settings['company_zipcode']): ?> - <?php echo e($settings['company_zipcode']); ?><?php endif; ?>
                                    <?php if($settings['company_country']): ?> <br><?php echo e($settings['company_country']); ?><?php endif; ?>
                                    <?php if($settings['company_telephone']): ?><?php echo e($settings['company_telephone']); ?><?php endif; ?><br>
                                    <?php if(!empty($settings['registration_number'])): ?><?php echo e(__('Registration Number')); ?> : <?php echo e($settings['registration_number']); ?> <?php endif; ?><br>
                                    <?php if($settings['vat_gst_number_switch'] == 'on'): ?>
                                        <?php if(!empty($settings['tax_type']) && !empty($settings['vat_number'])): ?><?php echo e($settings['tax_type'].' '. __('Number')); ?> : <?php echo e($settings['vat_number']); ?> <br><?php endif; ?>
                                    <?php endif; ?>
                                </p>
                            </td>
                            <td>
                                <table class="no-space" style="">
                                    <tbody>
                                    <tr>
                                        <td><?php echo e(__('Number')); ?>:</td>
                                        <td class="text-right"><?php echo e(Utility::invoiceNumberFormat($settings,$invoice->invoice_id)); ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo e(__('Issue Date')); ?>:</td>
                                        <td class="text-right"><?php echo e(Utility::dateFormat($settings,$invoice->issue_date)); ?></td>
                                    </tr>
            
                                    <tr>
                                        <td><b><?php echo e(__('Due Date:')); ?></b></td>
                                        <td class="text-right"><?php echo e(Utility::dateFormat($settings,$invoice->due_date)); ?></td>
                                    </tr>
                                    <?php if(!empty($customFields) && count($invoice->customField)>0): ?>
                                        <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($field->name); ?> :</td>
                                                <td> <?php echo e(!empty($invoice->customField)?$invoice->customField[$field->id]:'-'); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="2">
                                            <div class="view-qrcode">
                                                <?php echo DNS2D::getBarcodeHTML(route('invoice.link.copy',\Crypt::encrypt($invoice->invoice_id)), "QRCODE",2,2); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="invoice-body">
                <div class="table-responsive" style="margin-bottom: 30px;">
                <table class="vertical-align-top">
                    <tbody>
                        <tr>
                            <td>
                                <strong style="margin-bottom: 10px;"><?php echo e(__('Bill To')); ?>:</strong>
                                <?php if(!empty($customer->billing_name)): ?>
                                    <p>
                                        <?php echo e(!empty($customer->billing_name)?$customer->billing_name:''); ?><br>
                                        <?php echo e(!empty($customer->billing_address)?$customer->billing_address:''); ?><br>
                                        <?php echo e(!empty($customer->billing_city)?$customer->billing_city:'' .', '); ?><br>
                                        <?php echo e(!empty($customer->billing_state)?$customer->billing_state:'',', '); ?>,
                                        <?php echo e(!empty($customer->billing_zip)?$customer->billing_zip:''); ?><br>
                                        <?php echo e(!empty($customer->billing_country)?$customer->billing_country:''); ?><br>
                                        <?php echo e(!empty($customer->billing_phone)?$customer->billing_phone:''); ?><br>
                                    </p>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
            
                            <?php if($settings['shipping_display']=='on'): ?>
                                <td class="text-right">
                                    <strong style="margin-bottom: 10px;"><?php echo e(__('Ship To')); ?>:</strong>
                                    <?php if(!empty($customer->shipping_name)): ?>
                                    <p>
                                        <?php echo e(!empty($customer->shipping_name)?$customer->shipping_name:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_address)?$customer->shipping_address:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_city)?$customer->shipping_city:'' . ', '); ?><br>
                                        <?php echo e(!empty($customer->shipping_state)?$customer->shipping_state:'' .', '); ?>,
                                        <?php echo e(!empty($customer->shipping_zip)?$customer->shipping_zip:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_country)?$customer->shipping_country:''); ?><br>
                                        <?php echo e(!empty($customer->shipping_phone)?$customer->shipping_phone:''); ?><br>
                                    </p>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
            </div>

                <h3 style="margin-bottom: 10px;padding: 0 15px;"><?php echo e(__('Service Description')); ?></h3>
                <div class="table-responsive" style="margin-bottom: 30px;">
                    <table class="border">
                        <thead style="background-color: var(--theme-color);color: <?php echo e($font_color); ?>;">
                            <tr>
                                <th><?php echo e(__('Item')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th><?php echo e(__('Quantity')); ?></th>
                                <th><?php echo e(__('Rate')); ?></th>
                                <th><?php echo e(__('Discount')); ?></th>
                                <th><?php echo e(__('Tax')); ?> (%)</th>
                                <th><?php echo e(__('Price')); ?> <small>after tax & discount</small></th>
                            </tr>
                        </thead>

                        <?php if(isset($invoice->itemData) && count($invoice->itemData) > 0): ?>
                        <?php $__currentLoopData = $invoice->itemData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->name); ?></td>
                            <?php
                            $unitName = App\Models\ProductServiceUnit::find($item->unit);
                            ?>
                            <?php if(!empty($item->description)): ?>
                                <td><?php echo e($item->description); ?></td>
                            <?php endif; ?>
                            <td><?php echo e($item->quantity); ?> <?php echo e(($unitName != null) ?  '('. $unitName->name .')' : ''); ?></td>
                            <td><?php echo e(Utility::priceFormat($settings,$item->price)); ?></td>
                            <td><?php echo e(($item->discount!=0)?Utility::priceFormat($settings,$item->discount):'-'); ?></td>
                            <?php
                                $itemtax = 0;
                            ?>
                            <td>
                                <?php if(!empty($item->itemTax)): ?>
                                    <?php $__currentLoopData = $item->itemTax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $itemtax += $taxes['tax_price'];
                                        ?>
                                        <p><?php echo e($taxes['name']); ?> (<?php echo e($taxes['rate']); ?>) <?php echo e($taxes['price']); ?></p>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <span>-</span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e(Utility::priceFormat($settings,$item->price * $item->quantity -  $item->discount + $itemtax)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <?php endif; ?>
                        <tr>
                            <td><?php echo e(__('Total')); ?></td>
                            <td></td>
                            <td><?php echo e($invoice->totalQuantity); ?></td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->totalRate)); ?></td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->totalDiscount)); ?></td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->totalTaxPrice)); ?></td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->getSubTotal())); ?></td>
                        </tr>
                    </table>
                </div>

                <h3 style="margin-bottom: 10px;padding: 0 15px;"><?php echo e(__('Total Amounts')); ?></h3>
                <div class="table-responsive hg-pdf">
                    <table class="border invoice-summary" style="min-width: 400px;">
                        <tr>
                            <td><?php echo e(__('Subtotal')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->getSubTotal())); ?></td>
                        </tr>
                        <?php if($invoice->getTotalDiscount()): ?>
                        <tr>
                            <td><?php echo e(__('Discount')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->getTotalDiscount())); ?></td>
                        </tr>
                        <?php endif; ?>
                        <?php if(!empty($invoice->taxesData)): ?>
                            <?php $__currentLoopData = $invoice->taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($taxName); ?> :</td>
                                <td><?php echo e(Utility::priceFormat($settings,$taxPrice)); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <tr>
                            <td><?php echo e(__('Total')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->getSubTotal()-$invoice->getTotalDiscount()+$invoice->getTotalTax())); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Paid')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,($invoice->getTotal()-$invoice->getDue())-($invoice->invoiceTotalCreditNote()))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Credit Note')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,($invoice->invoiceTotalCreditNote()))); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('Due Amount')); ?>:</td>
                            <td><?php echo e(Utility::priceFormat($settings,$invoice->getDue())); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="invoice-footer">
                    <p> <?php echo e($settings['footer_title']); ?> <br>
                        <?php echo e($settings['footer_notes']); ?> </p>
                </div>
            </div>
        </div>
        <?php if(!isset($preview)): ?>
            <?php echo $__env->make('invoice.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
        <?php endif; ?>
    </body>
</html>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/invoice/templates/__template1.blade.php ENDPATH**/ ?>
<?php
    // $logo=asset(Storage::url('uploads/logo/'));
     $logo=\App\Models\Utility::get_file('uploads/logo');
     $company_favicon=Utility::companyData($proposal->created_by,'company_favicon');
     $setting = \App\Models\Utility::colorset();
     $color = (!empty($setting['color'])) ? $setting['color'] : 'theme-3';
     $company_setting=\App\Models\Utility::settingsById($proposal->created_by);

    $getseo= App\Models\Utility::getSeoSetting();
    $metatitle =  isset($getseo['meta_title']) ? $getseo['meta_title'] :'';
    $metsdesc= isset($getseo['meta_desc'])?$getseo['meta_desc']:'';
    $meta_image = \App\Models\Utility::get_file('uploads/meta/');
    $meta_logo = isset($getseo['meta_image'])?$getseo['meta_image']:'';
    $get_cookie = \App\Models\Utility::getCookieSetting();
    $settings = DB::table('settings')->where('created_by', $user->creatorId())->pluck('value', 'name')->toArray();

?>
    <!DOCTYPE html>

 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
   <title><?php echo e((Utility::companyData($proposal->created_by,'title_text')) ? Utility::companyData($proposal->created_by,'title_text') : config('app.name', 'ERPGO')); ?> - <?php echo e(__('Proposal')); ?></title>

     <meta name="title" content="<?php echo e($metatitle); ?>">
     <meta name="description" content="<?php echo e($metsdesc); ?>">

     <!-- Open Graph / Facebook -->
     <meta property="og:type" content="website">
     <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
     <meta property="og:title" content="<?php echo e($metatitle); ?>">
     <meta property="og:description" content="<?php echo e($metsdesc); ?>">
     <meta property="og:image" content="<?php echo e($meta_image.$meta_logo); ?>">

     <!-- Twitter -->
     <meta property="twitter:card" content="summary_large_image">
     <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
     <meta property="twitter:title" content="<?php echo e($metatitle); ?>">
     <meta property="twitter:description" content="<?php echo e($metsdesc); ?>">
     <meta property="twitter:image" content="<?php echo e($meta_image.$meta_logo); ?>">


     <link rel="icon" href="<?php echo e($logo.'/'.(isset($company_favicon) && !empty($company_favicon)?$company_favicon:'favicon.png')); ?>" type="image" sizes="16x16">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/main.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/style.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/animate.min.css')); ?>">

     <!-- font css -->
     <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/tabler-icons.min.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/feather.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/fontawesome.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('assets/fonts/material.css')); ?>">

     <!-- vendor css -->
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>" id="main-style-link">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/customizer.css')); ?>">
     <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>" id="main-style-link">
     <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/bootstrap-switch-button.min.css')); ?>">

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

 <body class="<?php echo e($color); ?>">
 <header class="header header-transparent" id="header-main">

 </header>

 <div class="main-content container">
     <div class="row justify-content-between align-items-center mb-3">
         <div class="col-md-12 d-flex align-items-center justify-content-between justify-content-md-end">
             <div class="all-button-box mx-2">
                 <a href="<?php echo e(route('proposal.pdf', Crypt::encrypt($proposal->id))); ?>" target="_blank" class="btn btn-primary mt-3" >
                     <?php echo e(__('Download')); ?>

                 </a>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-body">
                     <div class="proposal">
                         <div class="proposal-print">
                            <div class="row invoice-title mt-2">
                                 <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12">
                                     <h2><?php echo e(__('Proposal')); ?></h2>
                                 </div>
                                 <div class="col-12">
                                     <hr>
                                 </div>
                             </div>
                             <div class="row">
                                 <?php if(!empty($customer->billing_name)): ?>
                                     <div class="col">
                                         <small class="font-style">
                                             <strong><?php echo e(__('Billed To')); ?> :</strong><br>
                                             <?php echo e(!empty($customer->billing_name)?$customer->billing_name:''); ?><br>
                                             <?php echo e(!empty($customer->billing_phone)?$customer->billing_phone:''); ?><br>
                                             <?php echo e(!empty($customer->billing_address)?$customer->billing_address:''); ?><br>
                                             <?php echo e(!empty($customer->billing_zip)?$customer->billing_zip:''); ?><br>
                                             <?php echo e(!empty($customer->billing_city)?$customer->billing_city:'' .', '); ?> <?php echo e(!empty($customer->billing_state)?$customer->billing_state:'',', '); ?> <?php echo e(!empty($customer->billing_country)?$customer->billing_country:''); ?>

                                         </small>
                                     </div>
                                 <?php endif; ?>
                                 <?php if(\Utility::companyData($proposal->created_by,'shipping_display')=='on'): ?>
                                     <div class="col">
                                         <small>
                                             <strong><?php echo e(__('Shipped To')); ?> :</strong><br>
                                             <?php echo e(!empty($customer->shipping_name)?$customer->shipping_name:''); ?><br>
                                             <?php echo e(!empty($customer->shipping_phone)?$customer->shipping_phone:''); ?><br>
                                             <?php echo e(!empty($customer->shipping_address)?$customer->shipping_address:''); ?><br>
                                             <?php echo e(!empty($customer->shipping_zip)?$customer->shipping_zip:''); ?><br>
                                             <?php echo e(!empty($customer->shipping_city)?$customer->shipping_city:'' . ', '); ?> <?php echo e(!empty($customer->shipping_state)?$customer->shipping_state:'' .', '); ?>,<?php echo e(!empty($customer->shipping_country)?$customer->shipping_country:''); ?>

                                         </small>
                                     </div>
                                 <?php endif; ?>
                                 <div class="col">
                                     <div class="float-end mt-3">
                                        <?php if($settings['qr_display'] == 'on'): ?>
                                         <?php echo DNS2D::getBarcodeHTML(route('proposal.link.copy',\Illuminate\Support\Facades\Crypt::encrypt($proposal->id)), "QRCODE",2,2); ?>

                                        <?php endif; ?>
                                     </div>
                                 </div>

                             </div>
                             <div class="row mt-2">
                                <div class="col">
                                    <?php if($company_setting['vat_gst_number_switch'] == 'on'): ?>
                                    <?php if(!empty($company_setting['tax_type']) && !empty($company_setting['vat_number'])): ?><?php echo e($company_setting['tax_type'].' '. __('Number')); ?> : <?php echo e($company_setting['vat_number']); ?> <br><?php endif; ?>

                                    <strong><?php echo e(__('Tax Number ')); ?> : </strong><?php echo e(!empty($customer->tax_number)?$customer->tax_number:'--'); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                             <div class="row mt-3">
                                 <div class="col">
                                     <small>
                                         <strong><?php echo e(__('Status')); ?> :</strong><br>
                                         <?php if($proposal->status == 0): ?>
                                             <span class="badge badge-pill badge-primary"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                         <?php elseif($proposal->status == 1): ?>
                                             <span class="badge badge-pill badge-info"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                         <?php elseif($proposal->status == 2): ?>
                                             <span class="badge badge-pill badge-success"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                         <?php elseif($proposal->status == 3): ?>
                                             <span class="badge badge-pill badge-warning"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                         <?php elseif($proposal->status == 4): ?>
                                             <span class="badge badge-pill badge-danger"><?php echo e(__(\App\Models\Proposal::$statues[$proposal->status])); ?></span>
                                         <?php endif; ?>
                                     </small>
                                 </div>

                                 <div class="row">
                                     <div class="col text-end">
                                         <div class="d-flex align-items-center justify-content-end">
                                             <div class="me-4">
                                                 <small>
                                                     <strong><?php echo e(__('Issue Date')); ?> :</strong><br>
                                                     <?php echo e($user->dateFormat($proposal->issue_date)); ?><br><br>
                                                 </small>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                             <?php if(!empty($customFields) && count($proposal->customField)>0): ?>
                                     <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <div class="col text-md-right">
                                             <small>
                                                 <strong><?php echo e($field->name); ?> :</strong><br>
                                                 <?php echo e(!empty($proposal->customField)?$proposal->customField[$field->id]:'-'); ?>

                                                 <br><br>
                                             </small>
                                         </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 <?php endif; ?>
                             </div>
                             <div class="row mt-4">
                                 <div class="col-md-12">
                                     <div class="font-weight-bold"><?php echo e(__('Product Summary')); ?></div>
                                     <small><?php echo e(__('All items here cannot be deleted.')); ?></small>
                                     <div class="table-responsive mt-2">
                                         <table class="table mb-0 table-striped">
                                             <tr>
                                                 <th class="text-dark" data-width="40">#</th>
                                                 <th class="text-dark"><?php echo e(__('Product')); ?></th>
                                                 <th class="text-dark"><?php echo e(__('Quantity')); ?></th>
                                                 <th class="text-dark"><?php echo e(__('Rate')); ?></th>
                                                 <th class="text-dark"><?php echo e(__('Tax')); ?></th>
                                                 <th class="text-dark"> <?php echo e(__('Discount')); ?></th>
                                                 <th class="text-dark"><?php echo e(__('Description')); ?></th>
                                                 <th class="text-end text-dark" width="12%"><?php echo e(__('Price')); ?><br>
                                                     <small class="text-danger font-weight-bold"><?php echo e(__('after tax & discount')); ?></small>
                                                 </th>
                                             </tr>
                                             <?php
                                                 $totalQuantity=0;
                                                 $totalRate=0;
                                                 $totalTaxPrice=0;
                                                 $totalDiscount=0;
                                                 $taxesData=[];
                                            ?>

                                            <?php $__currentLoopData = $iteams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$iteam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($iteam->tax)): ?>
                                                    <?php
                                                        $taxes=\Utility::tax($iteam->tax);
                                                        $totalQuantity+=$iteam->quantity;
                                                        $totalRate+=$iteam->price;
                                                        $totalDiscount+=$iteam->discount;
                                                        foreach($taxes as $taxe){
                                                            $taxDataPrice=\Utility::taxRate($taxe->rate,$iteam->price,$iteam->quantity);
                                                            if (array_key_exists($taxe->name,$taxesData))
                                                            {
                                                                $taxesData[$taxe->name] = $taxesData[$taxe->name]+$taxDataPrice;
                                                            }
                                                            else
                                                            {
                                                                $taxesData[$taxe->name] = $taxDataPrice;
                                                            }
                                                        }
                                                    ?>
                                                <?php endif; ?>
                                                <tr>
                                                    <td><?php echo e($key+1); ?></td>
                                                    <td><?php echo e(!empty($iteam->product)?$iteam->product->name:''); ?></td>
                                                    <td><?php echo e($iteam->quantity); ?></td>
                                                    <td><?php echo e(\App\Models\Utility::priceFormat($settings,$iteam->price)); ?></td>
                                                    <td>
                                                        <?php if(!empty($iteam->tax)): ?>
                                                            <table>
                                                                <?php $totalTaxRate = 0;?>
                                                                <?php $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                        $taxPrice=\Utility::taxRate($tax->rate,$iteam->price,$iteam->quantity);
                                                                        $totalTaxPrice+=$taxPrice;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo e($tax->name .' ('.$tax->rate .'%)'); ?></td>
                                                                        <td><?php echo e(\App\Models\Utility::priceFormat($settings,$taxPrice)); ?></td>
                                                                    </tr>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </table>
                                                        <?php else: ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo e(\App\Models\Utility::priceFormat($settings,$iteam->discount)); ?></td>
                                                    <td><?php echo e(!empty($iteam->description)?$iteam->description:'-'); ?></td>
                                                    <td class="text-end"><?php echo e(\App\Models\Utility::priceFormat($settings,$iteam->price*$iteam->quantity)); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tfoot>
                                            <tr>
                                                <td></td>
                                                <td><b><?php echo e(__('Total')); ?></b></td>
                                                <td><b><?php echo e($totalQuantity); ?></b></td>
                                                <td><b><?php echo e(\App\Models\Utility::priceFormat($settings,$totalRate)); ?></b></td>
                                                <td><b><?php echo e(\App\Models\Utility::priceFormat($settings,$totalTaxPrice)); ?></b></td>
                                                <td><b><?php echo e(\App\Models\Utility::priceFormat($settings,$totalDiscount)); ?></b></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class="text-end"><b><?php echo e(__('Sub Total')); ?></b></td>
                                                <td class="text-end"><?php echo e(\App\Models\Utility::priceFormat($settings,$proposal->getSubTotal())); ?></td>
                                            </tr>
                                            <tr>
                                                    <td colspan="6"></td>
                                                    <td class="text-end"><b><?php echo e(__('Discount')); ?></b></td>
                                                    <td class="text-end"><?php echo e(\App\Models\Utility::priceFormat($settings,$proposal->getTotalDiscount())); ?></td>
                                                </tr>

                                            <?php if(!empty($taxesData)): ?>
                                                <?php $__currentLoopData = $taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxName => $taxPrice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td colspan="6"></td>
                                                        <td class="text-end"><b><?php echo e($taxName); ?></b></td>
                                                        <td class="text-end"><?php echo e(\App\Models\Utility::priceFormat($settings,$taxPrice)); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="6"></td>
                                                <td class="blue-text text-end"><b><?php echo e(__('Total')); ?></b></td>
                                                <td class="blue-text text-end"><?php echo e(\App\Models\Utility::priceFormat($settings,$proposal->getTotal())); ?></td>
                                            </tr>
                                            </tfoot>
                                        </table>
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

<footer id="footer-main">
    <div class="footer-dark">
        <div class="container">
            <div class="row align-items-center justify-content-md-between py-4 mt-4 delimiter-top">
                <div class="col-md-6">
                    <div class="copyright text-sm font-weight-bold text-center text-md-left">
                        <?php echo e(!empty($companySettings['footer_text']) ? $companySettings['footer_text']->value : ''); ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">
                                <i class="fab fa-facebook"></i>
                            </a>
                        </li>
                    </ul>
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





<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/proposal/customer_proposal.blade.php ENDPATH**/ ?>
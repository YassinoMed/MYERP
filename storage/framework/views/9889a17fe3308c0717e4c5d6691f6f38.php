<?php
    $chatgpt_key = App\Models\Utility::getValByName('chat_gpt_key');
    $chatgpt_enable = !empty($chatgpt_key);
    $lang = isset($currEmailTempLang->lang) ? $currEmailTempLang->lang : 'en';
    if ($lang == null) {
        $lang = 'en';
    }


?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($emailTemplate->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-page'); ?>


    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Email Template')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php if($chatgpt_enable): ?>
        <div class="text-end mb-3">
            <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['email template'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

            </a>
        </div>
    <?php endif; ?>

    <div class="row invoice-row">
        <div class="col-md-4 col-12">
            <div class="card mb-0 h-100">
                <div class="card-header card-body">
                    <h5></h5>
                    <?php echo e(Form::model($emailTemplate, ['route' => ['email_template.update', $emailTemplate->id], 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('name', null, ['class' => 'form-control font-style', 'disabled' => 'disabled'])); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('from', __('From'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('from', null, ['class' => 'form-control font-style', 'required' => 'required', 'placeholder' => __('Enter From Name')])); ?>

                        </div>
                        <?php echo e(Form::hidden('lang', $currEmailTempLang->lang, ['class' => ''])); ?>

                        <div class="col-12 text-end">
                            <input type="submit" value="<?php echo e(__('Save')); ?>"
                                class="btn btn-print-invoice  btn-primary m-r-10">
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card mb-0 h-100">
                <div class="card-header card-body">
                    <h5></h5>
                    <div class="row text-xs">

                        <h6 class="font-weight-bold mb-4"><?php echo e(__('Variables')); ?></h6>

                        <?php if($emailTemplate->slug=='new_user'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Email')); ?> : <span class="pull-right text-primary">{email}</span></p>
                                <p class="col-4"><?php echo e(__('Password')); ?> : <span class="pull-right text-primary">{password}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_client'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Client Name')); ?> : <span class="pull-right text-primary">{client_name}</span></p>
                                <p class="col-4"><?php echo e(__('Email')); ?> : <span class="pull-right text-primary">{client_email}</span></p>
                                <p class="col-4"><?php echo e(__('Password')); ?> : <span class="pull-right text-primary">{client_password}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_support_ticket'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('User Name')); ?> : <span class="pull-right text-primary">{support_name}</span></p>
                                <p class="col-4"><?php echo e(__('Support Title')); ?> : <span class="pull-right text-primary">{support_title}</span></p>
                                <p class="col-4"><?php echo e(__('Support Priority')); ?> : <span class="pull-right text-primary">{support_priority}</span></p>
                                <p class="col-4"><?php echo e(__('Support End Date')); ?> : <span class="pull-right text-primary">{support_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Support Description')); ?> : <span class="pull-right text-primary">{support_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_contract'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Contract Subject')); ?> : <span class="pull-right text-primary">{contract_subject}</span></p>
                                <p class="col-4"><?php echo e(__('Client Name')); ?> : <span class="pull-right text-primary">{contract_client}</span></p>
                                <p class="col-4"><?php echo e(__('Contract Title')); ?> : <span class="pull-right text-primary">{contract_value}</span></p>
                                <p class="col-4"><?php echo e(__('Contract Priority')); ?> : <span class="pull-right text-primary">{contract_start_date}</span></p>
                                <p class="col-4"><?php echo e(__('Contract End Date')); ?> : <span class="pull-right text-primary">{contract_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Contract Description')); ?> : <span class="pull-right text-primary">{contract_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='lead_assigned'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('Lead Name')); ?> : <span class="pull-right text-primary">{lead_name}</span></p>
                                <p class="col-4"><?php echo e(__('Lead Email')); ?> : <span class="pull-right text-primary">{lead_email}</span></p>
                                <p class="col-4"><?php echo e(__('Lead Subject')); ?> : <span class="pull-right text-primary">{lead_subject}</span></p>
                                <p class="col-4"><?php echo e(__('Lead Pipeline')); ?> : <span class="pull-right text-primary">{lead_pipeline}</span></p>
                                <p class="col-4"><?php echo e(__('Lead Stage')); ?> : <span class="pull-right text-primary">{lead_stage}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='deal_assigned'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('Deal Name')); ?> : <span class="pull-right text-primary">{deal_name}</span></p>
                                <p class="col-4"><?php echo e(__('Deal Pipeline')); ?> : <span class="pull-right text-primary">{deal_pipeline}</span></p>
                                <p class="col-4"><?php echo e(__('Deal Stage')); ?> : <span class="pull-right text-primary">{deal_stage}</span></p>
                                <p class="col-4"><?php echo e(__('Deal Status')); ?> : <span class="pull-right text-primary">{deal_status}</span></p>
                                <p class="col-4"><?php echo e(__('Deal Price')); ?> : <span class="pull-right text-primary">{deal_price}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='award_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Award Name')); ?> : <span class="pull-right text-primary">{award_name}</span></p>
                                <p class="col-4"><?php echo e(__('Award Email')); ?> : <span class="pull-right text-primary">{award_email}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='customer_invoice_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Customer Name')); ?> : <span class="pull-right text-primary">{customer_name}</span></p>
                                <p class="col-4"><?php echo e(__('Customer Email')); ?> : <span class="pull-right text-primary">{customer_email}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Name')); ?> : <span class="pull-right text-primary">{invoice_name}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Number')); ?> : <span class="pull-right text-primary">{invoice_number}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Url')); ?> : <span class="pull-right text-primary">{invoice_url}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_invoice_payment'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Customer Name')); ?> : <span class="pull-right text-primary">{invoice_payment_name}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Number')); ?> : <span class="pull-right text-primary">{invoice_number}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Payment Amount')); ?> : <span class="pull-right text-primary">{invoice_payment_amount}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Payment Date')); ?> : <span class="pull-right text-primary">{invoice_payment_date}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Payment Method')); ?> : <span class="pull-right text-primary">{invoice_payment_method}</span></p>

                            </div>
                        <?php elseif($emailTemplate->slug=='new_payment_reminder'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Customer Name')); ?> : <span class="pull-right text-primary">{customer_name}</span></p>
                                <p class="col-4"><?php echo e(__('Customer Email')); ?> : <span class="pull-right text-primary">{customer_email}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Reminder Name')); ?> : <span class="pull-right text-primary">{payment_reminder_name}</span></p>
                                <p class="col-4"><?php echo e(__('Invoice Payment Number')); ?> : <span class="pull-right text-primary">{invoice_payment_number}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Due Amount')); ?> : <span class="pull-right text-primary">{invoice_payment_dueAmount}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Reminder Date')); ?> : <span class="pull-right text-primary">{payment_reminder_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_bill_payment'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Name')); ?> : <span class="pull-right text-primary">{payment_name}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Bill')); ?> : <span class="pull-right text-primary">{payment_bill}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Amount')); ?> : <span class="pull-right text-primary">{payment_amount}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Date')); ?> : <span class="pull-right text-primary">{payment_date}</span></p>
                                <p class="col-4"><?php echo e(__('Payment Method')); ?> : <span class="pull-right text-primary">{payment_method}</span></p>

                            </div>
                        <?php elseif($emailTemplate->slug=='bill_resent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Vendor Name')); ?> : <span class="pull-right text-primary">{vender_name}</span></p>
                                <p class="col-4"><?php echo e(__('Vendor Email')); ?> : <span class="pull-right text-primary">{vender_email}</span></p>
                                <p class="col-4"><?php echo e(__('Bill Name')); ?> : <span class="pull-right text-primary">{bill_name}</span></p>
                                <p class="col-4"><?php echo e(__('Bill Number')); ?> : <span class="pull-right text-primary">{bill_number}</span></p>
                                <p class="col-4"><?php echo e(__('Bill Url')); ?> : <span class="pull-right text-primary">{bill_url}</span></p>

                            </div>
                        <?php elseif($emailTemplate->slug=='proposal_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Proposal Name')); ?> : <span class="pull-right text-primary">{proposal_name}</span></p>
                                <p class="col-4"><?php echo e(__('Proposal Email')); ?> : <span class="pull-right text-primary">{proposal_number}</span></p>
                                <p class="col-4"><?php echo e(__('Proposal Url')); ?> : <span class="pull-right text-primary">{proposal_url}</span></p>


                            </div>
                        <?php elseif($emailTemplate->slug=='complaint_resent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Complaint Name')); ?> : <span class="pull-right text-primary">{complaint_name}</span></p>
                                <p class="col-4"><?php echo e(__('Complaint Title')); ?> : <span class="pull-right text-primary">{complaint_title}</span></p>
                                <p class="col-4"><?php echo e(__('Complaint Against')); ?> : <span class="pull-right text-primary">{complaint_against}</span></p>
                                <p class="col-4"><?php echo e(__('Complaint Date')); ?> : <span class="pull-right text-primary">{complaint_date}</span></p>
                                <p class="col-4"><?php echo e(__('Complaint Date')); ?> : <span class="pull-right text-primary">{complaint_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='leave_action_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Name')); ?> : <span class="pull-right text-primary">{leave_name}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Status')); ?> : <span class="pull-right text-primary">{leave_status}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Reason')); ?> : <span class="pull-right text-primary">{leave_reason}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Start Date')); ?> : <span class="pull-right text-primary">{leave_start_date}</span></p>
                                <p class="col-4"><?php echo e(__('Leave End Date')); ?> : <span class="pull-right text-primary">{leave_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Days')); ?> : <span class="pull-right text-primary">{total_leave_days}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='payslip_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{employee_name}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Email')); ?> : <span class="pull-right text-primary">{employee_email}</span></p>
                                <p class="col-4"><?php echo e(__('Payslip Name')); ?> : <span class="pull-right text-primary">{payslip_name}</span></p>
                                <p class="col-4"><?php echo e(__('Payslip Salary Month ')); ?> : <span class="pull-right text-primary">{payslip_salary_month}</span></p>
                                <p class="col-4"><?php echo e(__('Payslip Url')); ?> : <span class="pull-right text-primary">{payslip_url}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='promotion_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p clss="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{employee_name}</span></p>
                                <p class="col-4"><?php echo e(__('Designation')); ?> : <span class="pull-right text-primary">{promotion_designation}</span></p>
                                <p class="col-4"><?php echo e(__('Promotion Title')); ?> : <span class="pull-right text-primary">{promotion_title}</span></p>
                                <p class="col-4"><?php echo e(__('Promotion Date')); ?> : <span class="pull-right text-primary">{promotion_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='resignation_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Email')); ?> : <span class="pull-right text-primary">{resignation_email}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{assign_user}</span></p>
                                <p class="col-4"><?php echo e(__('Last Working Date')); ?> : <span class="pull-right text-primary">{resignation_date}</span></p>
                                <p class="col-4"><?php echo e(__('Resignation Date')); ?> : <span class="pull-right text-primary">{notice_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='termination_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{termination_name}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Email')); ?> : <span class="pull-right text-primary">{termination_email}</span></p>
                                <p class="col-4"><?php echo e(__('Notice Date')); ?> : <span class="pull-right text-primary">{notice_date}</span></p>
                                <p class="col-4"><?php echo e(__('Termination Date')); ?> : <span class="pull-right text-primary">{termination_date}</span></p>
                                <p class="col-4"><?php echo e(__('Termination Type')); ?> : <span class="pull-right text-primary">{termination_type}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='transfer_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{transfer_name}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Email')); ?> : <span class="pull-right text-primary">{transfer_email}</span></p>
                                <p class="col-4"><?php echo e(__('Transfer Date')); ?> : <span class="pull-right text-primary">{transfer_date}</span></p>
                                <p class="col-4"><?php echo e(__('Transfer Department')); ?> : <span class="pull-right text-primary">{transfer_department}</span></p>
                                <p class="col-4"><?php echo e(__('Transfer Branch')); ?> : <span class="pull-right text-primary">{transfer_branch}</span></p>
                                <p class="col-4"><?php echo e(__('Transfer Desciption')); ?> : <span class="pull-right text-primary">{transfer_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='trip_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee ')); ?> : <span class="pull-right text-primary">{trip_name}</span></p>
                                <p class="col-4"><?php echo e(__('Purpose of Trip')); ?> : <span class="pull-right text-primary">{purpose_of_visit}</span></p>
                                <p class="col-4"><?php echo e(__('Start Date')); ?> : <span class="pull-right text-primary">{start_date}</span></p>
                                <p class="col-4"><?php echo e(__('End Date')); ?> : <span class="pull-right text-primary">{end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Country')); ?> : <span class="pull-right text-primary">{place_of_visit}</span></p>
                                <p class="col-4"><?php echo e(__('Description')); ?> : <span class="pull-right text-primary">{trip_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='vender_bill_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Vendor Name')); ?> : <span class="pull-right text-primary">{vender_bill_name}</span></p>
                                <p class="col-4"><?php echo e(__('Bill Number')); ?> : <span class="pull-right text-primary">{vender_bill_number}</span></p>
                                <p class="col-4"><?php echo e(__('Bill Url')); ?> : <span class="pull-right text-primary">{vender_bill_url}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='warning_sent'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{employee_warning_name}</span></p>
                                <p class="col-4"><?php echo e(__('Subject')); ?> : <span class="pull-right text-primary">{warning_subject}</span></p>
                                <p class="col-4"><?php echo e(__('Description')); ?> : <span class="pull-right text-primary">{warning_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_project'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Project User')); ?> : <span class="pull-right text-primary">{project_user}</span></p>
                                <p class="col-4"><?php echo e(__('Project Name')); ?> : <span class="pull-right text-primary">{project_name}</span></p>
                                <p class="col-4"><?php echo e(__('Project Start Date')); ?> : <span class="pull-right text-primary">{project_start_date}</span></p>
                                <p class="col-4"><?php echo e(__('Project End Date')); ?> : <span class="pull-right text-primary">{project_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Hours')); ?> : <span class="pull-right text-primary">{hours}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_task'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Task User')); ?> : <span class="pull-right text-primary">{task_user}</span></p>
                                <p class="col-4"><?php echo e(__('Task Name')); ?> : <span class="pull-right text-primary">{task_name}</span></p>
                                <p class="col-4"><?php echo e(__('Task Start Date')); ?> : <span class="pull-right text-primary">{task_start_date}</span></p>
                                <p class="col-4"><?php echo e(__('Task End Date')); ?> : <span class="pull-right text-primary">{task_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Hours')); ?> : <span class="pull-right text-primary">{hours}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='task_status_updated'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Task User')); ?> : <span class="pull-right text-primary">{task_user}</span></p>
                                <p class="col-4"><?php echo e(__('Task Name')); ?> : <span class="pull-right text-primary">{task_name}</span></p>
                                <p class="col-4"><?php echo e(__('Old Stage Name')); ?> : <span class="pull-right text-primary">{old_stage_name}</span></p>
                                <p class="col-4"><?php echo e(__('New Stage Name')); ?> : <span class="pull-right text-primary">{new_stage_name}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='new_leave'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('User Name')); ?> : <span class="pull-right text-primary">{user_name}</span></p>
                                <p class="col-4"><?php echo e(__('Start Date')); ?> : <span class="pull-right text-primary">{start_date}</span></p>
                                <p class="col-4"><?php echo e(__('End Date')); ?> : <span class="pull-right text-primary">{end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Leave Reason')); ?> : <span class="pull-right text-primary">{leave_reason}</span></p>
                                <p class="col-4"><?php echo e(__('Employee Name')); ?> : <span class="pull-right text-primary">{employee_name}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug=='project_assign_member'): ?>
                            <div class="row">
                                <p class="col-4"><?php echo e(__('App Name')); ?> : <span class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-4"><?php echo e(__('Company Name')); ?> : <span class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-4"><?php echo e(__('App Url')); ?> : <span class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-4"><?php echo e(__('Project User')); ?> : <span class="pull-right text-primary">{project_user}</span></p>
                                <p class="col-4"><?php echo e(__('Project Name')); ?> : <span class="pull-right text-primary">{project_name}</span></p>
                                <p class="col-4"><?php echo e(__('Project Start Date')); ?> : <span class="pull-right text-primary">{project_start_date}</span></p>
                                <p class="col-4"><?php echo e(__('Project End Date')); ?> : <span class="pull-right text-primary">{project_end_date}</span></p>
                                <p class="col-4"><?php echo e(__('Hours')); ?> : <span class="pull-right text-primary">{hours}</span></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h5></h5>
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="card sticky-top language-sidebar mb-0 email-sidebar">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="list-group-item list-group-item-action border-0 <?php echo e($currEmailTempLang->lang == $key ? 'active' : ''); ?>"
                                    href="<?php echo e(route('manage.email.language', [$emailTemplate->id, $key])); ?>">
                                    <?php echo e(Str::ucfirst($lang)); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="card h-100 p-3">
                        <?php echo e(Form::model($currEmailTempLang, ['route' => ['store.email.language', $currEmailTempLang->parent_id], 'method' => 'POST'])); ?>

                        <div class="form-group col-12">
                            <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('subject', null, ['class' => 'form-control font-style', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-12">
                            <?php echo e(Form::label('content', __('Email Message'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::textarea('content', $currEmailTempLang->content, ['class' => 'summernote-simple', 'id' => 'content', 'required' => 'required'])); ?>

                        </div>

                        <div class="col-md-12 text-end">
                            <?php echo e(Form::hidden('lang', null)); ?>

                            <input type="submit" value="<?php echo e(__('Save')); ?>"
                                class="btn btn-print-invoice  btn-primary">
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/email_templates/show.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Ledger Summary')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Ledger Summary')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        var filename = $('#filename').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 4,
                    dpi: 72,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'in',
                    format: 'A2'
                }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <a href="#" class="btn btn-sm btn-primary" onclick="saveAsPDF()"data-bs-toggle="tooltip"
            title="<?php echo e(__('Download')); ?>" data-original-title="<?php echo e(__('Download')); ?>">
            <span class="btn-inner--icon"><i class="ti ti-download"></i></span>
        </a>

    </div>
<?php $__env->stopSection(); ?>

<?php
        $selectAcc =     [[
    "id" => 0,
    "code" => '',
    "name" => "Select",
    "parent" => 0,
]];
       $accounts =  array_merge($selectAcc, $accounts);
?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mt-2 " id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <?php echo e(Form::open(['route' => ['report.ledger'], 'method' => 'GET', 'id' => 'report_ledger'])); ?>


                        <div class="row align-items-center justify-content-end">
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::date('start_date', $filter['startDateRange'], ['class' => 'month-btn form-control'])); ?>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::date('end_date', $filter['endDateRange'], ['class' => 'month-btn form-control'])); ?>

                                        </div>
                                    </div>



                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="btn-box">
                                            <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                                            <select name="account" class="form-control" required="required">
                                                <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($chartAccount['id']); ?>" class="subAccount" <?php echo e(isset($_GET['account']) && $chartAccount['id'] == $_GET['account'] ? 'selected' : ''); ?>><?php echo e($chartAccount['name']); ?></option>
                                                    <?php $__currentLoopData = $subAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($chartAccount['id'] == $subAccount['account']): ?>
                                                            <option value="<?php echo e($subAccount['id']); ?>" class="ms-5" <?php echo e(isset($_GET['account']) && $_GET['account'] == $subAccount['id'] ? 'selected' : ''); ?>> &nbsp; &nbsp;&nbsp; <?php echo e($subAccount['name']); ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto mt-4">
                                        <a href="#" class="btn btn-sm btn-primary me-1"
                                            onclick="document.getElementById('report_ledger').submit(); return false;"
                                            data-bs-toggle="tooltip" title="<?php echo e(__('Apply')); ?>"
                                            data-original-title="<?php echo e(__('apply')); ?>">
                                            <span class="btn-inner--icon"><i class="ti ti-search"></i></span>
                                        </a>
                                        <a href="<?php echo e(route('report.ledger')); ?>" class="btn btn-sm btn-danger "
                                            data-bs-toggle="tooltip" title="<?php echo e(__('Reset')); ?>"
                                            data-original-title="<?php echo e(__('Reset')); ?>">
                                            <span class="btn-inner--icon"><i
                                                    class="ti ti-refresh text-white-off "></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

    <div id="printableArea">

        <div class="row mb-4">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th> <?php echo e(__('Account Name')); ?></th>
                                    <th> <?php echo e(__('Name')); ?></th>
                                    <th> <?php echo e(__('Transaction Type')); ?></th>
                                    <th> <?php echo e(__('Transaction Date')); ?></th>
                                    <th> <?php echo e(__('Debit')); ?></th>
                                    <th> <?php echo e(__('Credit')); ?></th>
                                    <th> <?php echo e(__('Balance')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $balance = 0;
                                    $totalDebit = 0;
                                    $totalCredit = 0;
                                    $accountArrays = [];
                                    foreach ($chart_accounts as $key => $account) {
                                        $chartDatas = \App\Models\Utility::getAccountData($account['id'], $filter['startDateRange'], $filter['endDateRange']);
                                        $chartDatas = $chartDatas->toArray();
                                        $accountArrays[] = $chartDatas;
                                    }
                                ?>
                                <?php $__currentLoopData = $accountArrays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($account->account_name); ?></td>
                                            <?php if(!empty($account->user_name)): ?>
                                                <td><?php echo e($account->user_name); ?></td>
                                            <?php else: ?>
                                                <td>-</td>
                                            <?php endif; ?>
                                            <td><?php echo e(($account->reference)); ?></td>
                                            <td><?php echo e($account->date); ?></td>
                                            <td><?php echo e(\Auth::user()->priceFormat($account->debit)); ?></td>
                                            <?php
                                                $total = $account->debit + $account->credit;
                                                if ($account->debit != 0) {
                                                    $balance -= $total;
                                                } else {
                                                    $balance += $total;
                                                }
                                            ?>
                                            <td><?php echo e(\Auth::user()->priceFormat ($account->credit)); ?></td>
                                            <td><?php echo e(\Auth::user()->priceFormat($balance)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/doubleentry_report/ledger_summary.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Journal Entry Create')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Double Entry')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Journal Entry')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.repeater.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery-searchbox.js')); ?>"></script>

    <script>
        var selector = "body";
        if ($(selector + " .repeater").length) {
            var $repeater = $(selector + ' .repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'status': 1
                },
                show: function() {
                    $(this).slideDown();
                    var file_uploads = $(this).find('input.multi');
                    if (file_uploads.length) {
                        $(this).find('input.multi').MultiFile({
                            max: 3,
                            accept: 'png|jpg|jpeg',
                            max_size: 2048
                        });
                    }
                    // for item SearchBox ( this function is  custom Js )
                    JsSearchBox();

                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                        $(this).remove();

                        var inputs = $(".debit");
                        var totalDebit = 0;
                        for (var i = 0; i < inputs.length; i++) {
                            totalDebit = parseFloat(totalDebit) + parseFloat($(inputs[i]).val());
                        }
                        $('.totalDebit').html(totalDebit.toFixed(2));


                        var inputs = $(".credit");
                        var totalCredit = 0;
                        for (var i = 0; i < inputs.length; i++) {
                            totalCredit = parseFloat(totalCredit) + parseFloat($(inputs[i]).val());
                        }
                        $('.totalCredit').html(totalCredit.toFixed(2));


                    }
                },
                ready: function(setIndexes) {
                    // $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: true
            });
            var value = $(selector + " .repeater").attr('data-value');

            if (typeof value != 'undefined' && value.length != 0) {
                value = JSON.parse(value);
                $repeater.setList(value);
                for (var i = 0; i < value.length; i++) {
                    var tr = $('#sortable-table .id[value="' + value[i].id + '"]').parent();
                    tr.find('.item').val(value[i].product_id);
                    changeItem(tr.find('.item'));
                }
            }

        }

        $(document).on('keyup', '.debit', function() {
            var el = $(this).parent().parent().parent().parent();
            var debit = $(this).val();

            // Validate input: Allow only integers or floats
            if (!/^\d*\.?\d*$/.test(debit)) {
                $(this).val(0);
                return;
            }

            var credit = 0;
            el.find('.credit').val(credit);
            el.find('.amount').html(debit);


            var inputs = $(".debit");
            var totalDebit = 0;
            for (var i = 0; i < inputs.length; i++) {
                totalDebit = parseFloat(totalDebit) + parseFloat($(inputs[i]).val());
            }
            $('.totalDebit').html(totalDebit.toFixed(2));

            el.find('.credit').attr("disabled", true);
            if (debit == '') {
                el.find('.credit').attr("disabled", false);
            }
        })

        $(document).on('keyup', '.credit', function() {
            var el = $(this).parent().parent().parent().parent();
            var credit = $(this).val();

            // Validate input: Allow only integers or floats
            if (!/^\d*\.?\d*$/.test(credit)) {
                $(this).val(0);
                return;
            }

            var debit = 0;
            el.find('.debit').val(debit);
            el.find('.amount').html(credit);

            var inputs = $(".credit");
            var totalCredit = 0;
            for (var i = 0; i < inputs.length; i++) {
                totalCredit = parseFloat(totalCredit) + parseFloat($(inputs[i]).val());
            }
            $('.totalCredit').html(totalCredit.toFixed(2));

            el.find('.debit').attr("disabled", true);
            if (credit == '') {
                el.find('.debit').attr("disabled", false);
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php
        $user = \App\Models\User::find(\Auth::user()->creatorId());
        $plan = \App\Models\Plan::getPlan($user->plan);
    ?>
    <?php if($plan->chatgpt == 1): ?>
        <div class="float-end">
            <a href="#" data-size="md" class="btn btn-primary btn-sm d-inline-flex align-items-center gap-2" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['journal entry'])); ?>" data-bs-placement="top"
                data-title="<?php echo e(__('Generate content with AI')); ?>">
                <i class="fas fa-robot"></i> <span><?php echo e(__('Generate with AI')); ?></span>
            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['url' => 'journal-entry', 'class' => 'w-100', 'class'=>'needs-validation', 'novalidate'])); ?>

    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
    <div class="row mt-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('journal_number', __('Journal Number'), ['class' => 'form-label'])); ?>

                                <input type="text" class="form-control"
                                    value="<?php echo e(\Auth::user()->journalNumberFormat($journalId)); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('date', __('Transaction Date'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                                <?php echo e(Form::date('date', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('reference', __('Reference'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::text('reference', '', ['class' => 'form-control' , 'placeholder'=>__('Enter Reference')])); ?>

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="form-group">
                                <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                <?php echo e(Form::textarea('description', '', ['class' => 'form-control', 'rows' => '2' , 'placeholder'=>__('Enter Description')])); ?>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card repeater">
                <div class="item-section p-4 text-end">
                            <a href="#" data-repeater-create="" class="btn btn-primary " data-toggle="modal"
                                data-target="#add-bank">
                                <i class="ti ti-plus"></i> <?php echo e(__('Add Accounts')); ?>

                            </a>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table mb-0" data-repeater-list="accounts" id="sortable-table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Account')); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?></th>
                                    <th><?php echo e(__('Debit')); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?></th>
                                    <th><?php echo e(__('Credit')); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                    <th class="text-end"><?php echo e(__('Amount')); ?> </th>
                                    <th width="2%"></th>
                                </tr>
                            </thead>

                            <tbody class="ui-sortable" data-repeater-item>
                                <tr>
                                    <td width="25%" class="form-group pt-0">
                                        <select name="account" class="form-control" required="required">
                                            <option value=""><?php echo e(__('Select Chart of Account')); ?></option>
                                            <?php $__currentLoopData = $chartAccounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $typeName => $subtypes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <optgroup label="<?php echo e($typeName); ?>">
                                                    <?php $__currentLoopData = $subtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtypeId => $subtypeData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option disabled style="color: #000; font-weight: bold;"><?php echo e($subtypeData['account_name']); ?></option>
                                                        <?php $__currentLoopData = $subtypeData['chart_of_accounts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chartOfAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($chartOfAccount['id']); ?>">
                                                                &nbsp;&nbsp;&nbsp;<?php echo e($chartOfAccount['account_name']); ?>

                                                            </option>
                                                            <?php $__currentLoopData = $subtypeData['subAccounts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subAccount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($chartOfAccount['id'] == $subAccount['parent_account']): ?>
                                                                <option value="<?php echo e($subAccount['id']); ?>" class="ms-5"> &nbsp; &nbsp;&nbsp;&nbsp; <?php echo e(' - '. $subAccount['account_name']); ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </optgroup>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </td>
                                    <td>
                                        <div class="form-group price-input">
                                            <?php echo e(Form::text('debit', '', ['class' => 'form-control debit', 'required' => 'required', 'placeholder' => __('Debit'), 'required' => 'required'])); ?>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group price-input">
                                            <?php echo e(Form::text('credit', '', ['class' => 'form-control credit', 'required' => 'required', 'placeholder' => __('Credit'), 'required' => 'required'])); ?>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <?php echo e(Form::text('description', '', ['class' => 'form-control', 'placeholder' => __('Description')])); ?>

                                        </div>
                                    </td>
                                    <td class="text-end amount">0.00</td>
                                    <td>
                                        <div class="action-btn me-2">
                                            <a href="#!" class="ti ti-trash text-white btn btn-sm repeater-action-btn bg-danger ms-2" data-repeater-delete data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td class="text-end"><strong><?php echo e(__('Total Credit')); ?>

                                            (<?php echo e(\Auth::user()->currencySymbol()); ?>)</strong></td>
                                    <td class="text-end totalCredit">0.00</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td class="text-end"><strong><?php echo e(__('Total Debit')); ?>

                                            (<?php echo e(\Auth::user()->currencySymbol()); ?>)</strong></td>
                                    <td class="text-end totalDebit">0.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer d-flex align-items-center gap-2 mb-3">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" onclick="location.href = '<?php echo e(route('journal-entry.index')); ?>';"
            class="btn btn-secondary">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
    </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/journalEntry/create.blade.php ENDPATH**/ ?>
<?php echo e(Form::open(['url' => 'production/boms', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('product_id', __('Product'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::select('product_id', $products, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Select Product')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::text('name', '', ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Name')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('code', __('Code'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('code', '', ['class' => 'form-control', 'placeholder' => __('Enter Code')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('version', __('Version'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('version', '1', ['class' => 'form-control', 'placeholder' => __('Enter Version')])); ?>

        </div>
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0"><?php echo e(__('Components')); ?></h6>
                <a href="#" class="btn btn-sm btn-primary" id="bom-add-row"><?php echo e(__('Add Row')); ?></a>
            </div>
            <div class="table-responsive">
                <table class="table" id="bom-components-table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Component')); ?></th>
                            <th style="width: 160px;"><?php echo e(__('Quantity')); ?></th>
                            <th style="width: 160px;"><?php echo e(__('Scrap %')); ?></th>
                            <th style="width: 60px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php echo e(Form::select('components[]', $components, null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Select Component')])); ?>

                            </td>
                            <td>
                                <?php echo e(Form::number('quantities[]', 1, ['class' => 'form-control', 'required' => 'required', 'step' => '0.0001', 'min' => 0.0001])); ?>

                            </td>
                            <td>
                                <?php echo e(Form::number('scrap_percents[]', 0, ['class' => 'form-control', 'step' => '0.01', 'min' => 0, 'max' => 100])); ?>

                            </td>
                            <td class="text-end">
                                <a href="#" class="btn btn-sm btn-danger bom-remove-row"><i class="ti ti-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>


<script>
    (function() {
        var addBtn = document.getElementById('bom-add-row');
        var tableBody = document.querySelector('#bom-components-table tbody');

        function bindRemove(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                var rows = tableBody.querySelectorAll('tr');
                if (rows.length <= 1) {
                    return;
                }
                btn.closest('tr').remove();
            });
        }

        tableBody.querySelectorAll('.bom-remove-row').forEach(bindRemove);

        addBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var row = tableBody.querySelector('tr').cloneNode(true);
            row.querySelectorAll('select').forEach(function(select) {
                select.value = '';
            });
            row.querySelectorAll('input').forEach(function(input) {
                if (input.name === 'quantities[]') {
                    input.value = 1;
                } else {
                    input.value = 0;
                }
            });
            var removeBtn = row.querySelector('.bom-remove-row');
            removeBtn.replaceWith(removeBtn.cloneNode(true));
            bindRemove(row.querySelector('.bom-remove-row'));
            tableBody.appendChild(row);
        });
    })();
</script>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/boms/create.blade.php ENDPATH**/ ?>
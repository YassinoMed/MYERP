<form class="" method="post" action="<?php echo e(route('barcode.setting')); ?>" >
    <?php echo csrf_field(); ?>

    <div class="modal-body">
        <div class="row">
            <div class="form-group col-md-6">
                <?php echo e(Form::label('barcode_type', __('Barcode Type'), ['class' => 'form-label text-dark'])); ?>

                <?php echo e(Form::select('barcode_type', ['code128' => 'Code 128', 'code39' => 'Code 39', 'code93' => 'Code 93'], $settings['barcode_type'], ['class' => 'form-control', 'data-toggle' => 'select',  'placeholder'=> __('Select Barcode Type')])); ?>

            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('barcode_format', __('Barcode Format'), ['class' => 'form-label text-dark'])); ?>

                <?php echo e(Form::select('barcode_format', ['css' => 'CSS', 'bmp' => 'BMP'], $settings['barcode_format'], ['class' => 'form-control', 'data-toggle' => 'select', 'placeholder'=> __('Select Barcode Format')])); ?>

            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary">
    </div>
</form>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/pos/setting.blade.php ENDPATH**/ ?>
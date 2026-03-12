<div class="card bg-none card-box">
    <?php echo e(Form::open(array('url' => 'estimations'))); ?>

    <div class="row">
        <div class="col-6 form-group">
            <?php echo e(Form::label('client_id', __('Client'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('client_id', $client,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('issue_date', __('Issue Date'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('issue_date',null, array('class' => 'form-control datepicker','required'=>'required'))); ?>

        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('tax_id', __('Tax %'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('tax_id', $taxes,null, array('class' => 'form-control select2','required'=>'required'))); ?>

            <?php if(count($taxes) <= 0): ?>
                <div class="text-muted text-xs">
                    <?php echo e(__('Please create new Tax')); ?> <a href="<?php echo e(route('taxes.index')); ?>"><?php echo e(__('here')); ?></a>.
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12 form-group">
            <?php echo e(Form::label('terms', __('Terms'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('terms',null, array('class' => 'form-control'))); ?>

        </div>
        <div class="col-12 text-end">
            <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn-create badge-blue">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/estimations/create.blade.php ENDPATH**/ ?>
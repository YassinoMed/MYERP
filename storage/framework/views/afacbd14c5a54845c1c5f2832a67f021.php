<div class="card bg-none card-box">
    <?php if(isset($product)): ?>
        <?php echo e(Form::model($product, array('route' => array('estimations.products.update', $estimation->id,$product->id), 'method' => 'PUT'))); ?>

    <?php else: ?>
        <?php echo e(Form::model($estimation, array('route' => array('estimations.products.store', $estimation->id), 'method' => 'POST'))); ?>

    <?php endif; ?>
    <div class="row">
        <div class="col-6 form-group">
            <?php echo e(Form::label('product_id', __('Product'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('product_id', $products,null, array('class' => 'form-control select2','required'=>'required'))); ?>

        </div>
        <div class="col-6 form-group">
            <?php echo e(Form::label('quantity', __('Quantity'),['class'=>'form-label'])); ?>

            <?php echo e(Form::number('quantity', isset($product)?null:1, array('class' => 'form-control','required'=>'required','min'=>'1'))); ?>

        </div>
        <div class="col-12 form-group">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description', null, array('class' => 'form-control'))); ?>

        </div>
        <div class="form-group col-md-12 text-end">
            <?php if(isset($product)): ?>
                <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn-create badge-blue">
            <?php else: ?>
                <input type="submit" value="<?php echo e(__('Add')); ?>" class="btn-create badge-blue">
            <?php endif; ?>
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn-create bg-gray" data-dismiss="modal">
        </div>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/estimations/products.blade.php ENDPATH**/ ?>
<?php if($customFields): ?>
    <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($customField->type == 'text'): ?>
        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::text('customField['.$customField->id.']', null, array('class' => 'form-control'))); ?>

                </div>
            </div>
            </div>
        <?php elseif($customField->type == 'email'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::email('customField['.$customField->id.']', null, array('class' => 'form-control'))); ?>

                </div>
            </div>
            </div>
        <?php elseif($customField->type == 'number'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::number('customField['.$customField->id.']', null, array('class' => 'form-control'))); ?>

                </div>
            </div>
            </div>
        <?php elseif($customField->type == 'date'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::date('customField['.$customField->id.']', null, array('class' => 'form-control'))); ?>

                </div>
            </div>
            </div>
        <?php elseif($customField->type == 'textarea'): ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="form-group">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <div class="input-group">
                    <?php echo e(Form::textarea('customField['.$customField->id.']', null, array('class' => 'form-control', 'rows' => 1))); ?>

                </div>
            </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/customFields/formBuilder.blade.php ENDPATH**/ ?>
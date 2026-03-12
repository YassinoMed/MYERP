<?php echo e(Form::model($warning,array('route' => array('warning.update', $warning->id), 'method' => 'PUT', 'class'=>'needs-validation', 'novalidate'))); ?>

<div class="modal-body">
    
    <?php
        $plan= \App\Models\Utility::getChatGPTSettings();
    ?>
    <?php if($plan->chatgpt == 1): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['warning'])); ?>"
           data-bs-placement="top" data-title="<?php echo e(__('Generate content with AI')); ?>">
            <i class="fas fa-robot"></i> <span><?php echo e(__('Generate with AI')); ?></span>
        </a>
    </div>
    <?php endif; ?>
    

     <div class="row">
        <?php if(\Auth::user()->type != 'Employee'): ?>
            <div class="form-group col-md-6 col-lg-6">
                <?php echo e(Form::label('warning_by', __('Warning By'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('warning_by', $employees,null, array('class' => 'form-control select', 'id' => 'warning_by', 'required'=>'required'))); ?>

                <div class="text-xs mt-1">
                    <?php echo e(__('Create warning by here.')); ?> <a href="<?php echo e(route('employee.index')); ?>"><b><?php echo e(__('Create warning by')); ?></b></a>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('warning_to',__('Warning To'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('warning_to',$employees,null,array('class'=>'form-control select', 'id' => 'warning_to', 'required'=>'required'))); ?>

            <div class="text-xs mt-1">
                <?php echo e(__('Create warning to here.')); ?> <a href="<?php echo e(route('employee.index')); ?>"><b><?php echo e(__('Create warning to')); ?></b></a>
            </div>
        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('subject',__('Subject'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('subject',null,array('class'=>'form-control','required'=>'required', 'placeholder'=>__('Enter Subject')))); ?>

        </div>
        <div class="form-group col-lg-6 col-md-6">
            <?php echo e(Form::label('warning_date',__('Warning Date'),['class'=>'form-label'])); ?>

            <?php echo e(Form::date('warning_date',null,array('class'=>'form-control ','required'=>'required'))); ?>

        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','placeholder'=>__('Enter Description')))); ?>

        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>


<script>
    $(document).ready(function() {
        updateDropdowns();
    });
</script><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/warning/edit.blade.php ENDPATH**/ ?>
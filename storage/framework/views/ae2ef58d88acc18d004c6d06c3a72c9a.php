
<?php echo e(Form::open(['url' => route('timesheet.store'), 'id' => 'project_form', 'class'=>'needs-validation', 'novalidate'])); ?>

<div class="modal-body">


    <input type="hidden" name="project_id" value="<?php echo e($parseArray['project_id']); ?>">
    <input type="hidden" name="task_id" value="<?php echo e($parseArray['task_id']); ?>">
    <input type="hidden" name="date" value="<?php echo e($parseArray['date']); ?>">
    <input type="hidden" id="totaltasktime" value="<?php echo e($parseArray['totaltaskhour'] . ':' . $parseArray['totaltaskminute']); ?>">

    <div class="details mb-2">
        <div class="form-group text-center">
            <label for="descriptions" class="form-label"><?php echo e($parseArray['project_name'] . ' : ' . $parseArray['task_name']); ?></label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group mb-0">
                <label for="time"><?php echo e(__('Time')); ?></label><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control  select2" name="time_hour" id="time_hour" required="">
                    <option value=""><?php echo e(__('Hours')); ?></option>

                    <?php for ($i = 0; $i < 23; $i++) { $i = $i < 10 ? '0' . $i : $i; ?>

                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>

                    <?php } ?>

                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <select class="form-control form-control-light" name="time_minute" id="time_minute" required>
                    <option value=""><?php echo e(__('Minutes')); ?></option>

                    <?php for ($i = 0; $i < 61; $i += 10) { $i = $i < 10 ? '0' . $i : $i; ?>

                    <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>

                    <?php } ?>

                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="description"><?php echo e(__('Description')); ?></label>
        <textarea class="form-control form-control-light" id="description" rows="3" name="description"></textarea>
    </div>


    <div class="col-md-12">
        <div class="display-total-time">
            <i class="ti ti-clock"></i>
            <span><?php echo e(__('Total Time worked on this task')); ?> : <?php echo e($parseArray['totaltaskhour'] . ' ' . __('Hours') . ' ' . $parseArray['totaltaskminute'] . ' ' . __('Minutes')); ?></span>

        </div>
    </div>

</div>


<div class="modal-footer">
    <input type="submit" value="<?php echo e(__('Save')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/projects/timesheets/create.blade.php ENDPATH**/ ?>
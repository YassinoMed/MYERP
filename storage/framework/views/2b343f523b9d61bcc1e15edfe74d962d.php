<?php echo e(Form::model($order, ['route' => ['production.orders.update', $order->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('warehouse_id', __('Warehouse'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('warehouse_id', $warehouses, null, ['class' => 'form-control', 'placeholder' => __('Select Warehouse')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('work_center_id', __('Work Center'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('work_center_id', $workCenters, null, ['class' => 'form-control', 'placeholder' => __('Select Work Center')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('employee_id', __('Employee'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('employee_id', $employees, null, ['class' => 'form-control', 'placeholder' => __('Select Employee')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('production_shift_team_id', __('Shift Team'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('production_shift_team_id', $shiftTeams, null, ['class' => 'form-control', 'placeholder' => __('Select Shift Team')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('production_routing_id', __('Routing'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('production_routing_id', $routings, null, ['class' => 'form-control', 'placeholder' => __('Select Routing')])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('priority', __('Priority'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::select('priority', ['low' => __('Low'), 'normal' => __('Normal'), 'high' => __('High'), 'urgent' => __('Urgent')], null, ['class' => 'form-control', 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('planned_machine_hours', __('Planned Machine Hours'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('planned_machine_hours', null, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('planned_labor_hours', __('Planned Labor Hours'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::number('planned_labor_hours', null, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('planned_start_date', __('Planned Start Date'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::date('planned_start_date', $order->planned_start_date, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('planned_end_date', __('Planned End Date'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::date('planned_end_date', $order->planned_end_date, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/orders/edit.blade.php ENDPATH**/ ?>
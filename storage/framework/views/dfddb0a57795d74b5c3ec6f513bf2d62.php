<?php echo e(Form::model($routing, ['route' => ['production.routings.update', $routing->id], 'method' => 'PUT', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('product_id', __('Product'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('product_id', $products, null, ['class' => 'form-control', 'placeholder' => __('Select Product')])); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('code', __('Code'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('code', null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-3">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::select('status', ['active' => __('Active'), 'draft' => __('Draft'), 'archived' => __('Archived')], null, ['class' => 'form-control'])); ?>

        </div>
        <div class="form-group col-md-12">
            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required'])); ?>

        </div>
        <?php ($steps = $routing->steps->values()); ?>
        <?php for($i = 0; $i < max(5, $steps->count()); $i++): ?>
            <?php ($step = $steps[$i] ?? null); ?>
            <div class="col-md-12 border rounded p-3 mb-2">
                <div class="row">
                    <div class="form-group col-md-3">
                        <?php echo e(Form::label("steps[$i][sequence]", __('Sequence'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number("steps[$i][sequence]", $step->sequence ?? ($i + 1), ['class' => 'form-control', 'min' => 1])); ?>

                    </div>
                    <div class="form-group col-md-9">
                        <?php echo e(Form::label("steps[$i][name]", __('Step Name'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::text("steps[$i][name]", $step->name ?? null, ['class' => 'form-control'])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][work_center_id]", __('Work Center'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::select("steps[$i][work_center_id]", $workCenters, $step->work_center_id ?? null, ['class' => 'form-control', 'placeholder' => __('Select Work Center')])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][industrial_resource_id]", __('Resource'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::select("steps[$i][industrial_resource_id]", $resources, $step->industrial_resource_id ?? null, ['class' => 'form-control', 'placeholder' => __('Select Resource')])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][planned_minutes]", __('Planned Minutes'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number("steps[$i][planned_minutes]", $step->planned_minutes ?? 0, ['class' => 'form-control', 'min' => 0])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][setup_cost]", __('Setup Cost'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number("steps[$i][setup_cost]", $step->setup_cost ?? 0, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][run_cost]", __('Run Cost'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number("steps[$i][run_cost]", $step->run_cost ?? 0, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

                    </div>
                    <div class="form-group col-md-4">
                        <?php echo e(Form::label("steps[$i][scrap_percent]", __('Scrap %'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::number("steps[$i][scrap_percent]", $step->scrap_percent ?? 0, ['class' => 'form-control', 'step' => '0.01', 'min' => 0])); ?>

                    </div>
                    <div class="form-group col-md-12">
                        <?php echo e(Form::label("steps[$i][instructions]", __('Instructions'), ['class' => 'form-label'])); ?>

                        <?php echo e(Form::textarea("steps[$i][instructions]", $step->instructions ?? null, ['class' => 'form-control', 'rows' => 2])); ?>

                    </div>
                </div>
            </div>
        <?php endfor; ?>
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

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/routings/edit.blade.php ENDPATH**/ ?>
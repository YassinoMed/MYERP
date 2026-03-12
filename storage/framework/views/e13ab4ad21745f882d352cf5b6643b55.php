<?php echo e(Form::open(['route' => ['patients.consultations.store', $patient->id], 'method' => 'post', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('consultation_date', __('Consultation Date'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::date('consultation_date', null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('doctor_name', __('Doctor Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('doctor_name', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('title', __('Title'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('title', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('reason_for_visit', __('Reason for Visit'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('reason_for_visit', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('diagnosis', __('Diagnosis'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('diagnosis', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('next_visit_date', __('Next Visit Date'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::date('next_visit_date', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('temperature', __('Temperature (°C)'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('temperature', null, ['class' => 'form-control', 'step' => '0.01'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('heart_rate', __('Heart Rate'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('heart_rate', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('blood_pressure', __('Blood Pressure'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('blood_pressure', null, ['class' => 'form-control', 'placeholder' => __('120/80')])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('respiratory_rate', __('Respiratory Rate'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('respiratory_rate', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('weight', __('Weight (kg)'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('weight', null, ['class' => 'form-control', 'step' => '0.01'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('height', __('Height (cm)'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('height', null, ['class' => 'form-control', 'step' => '0.01'])); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('clinical_observations', __('Clinical Observations'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('clinical_observations', null, ['class' => 'form-control', 'rows' => 3])); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('requested_exams', __('Requested Exams'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('requested_exams', null, ['class' => 'form-control', 'rows' => 2])); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('medical_certificate', __('Medical Certificate'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('medical_certificate', null, ['class' => 'form-control', 'rows' => 2])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('sick_leave_start', __('Sick Leave Start'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::date('sick_leave_start', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('sick_leave_end', __('Sick Leave End'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::date('sick_leave_end', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 3])); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/patient/consultation_create.blade.php ENDPATH**/ ?>
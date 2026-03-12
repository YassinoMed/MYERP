<?php echo e(Form::model($patient, ['route' => ['patients.update', $patient->id], 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('first_name', __('First Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::text('first_name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('last_name', __('Last Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('customer_id', __('Linked Customer'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('customer_id', $customers, null, ['class' => 'form-control', 'data-placeholder' => __('Select customer'), 'placeholder' => __('Select customer')])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('gender', __('Gender'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('gender', ['male' => __('Male'), 'female' => __('Female'), 'other' => __('Other')], null, ['class' => 'form-control', 'placeholder' => __('Select gender')])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('cin', __('CIN'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('cin', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('cnam_number', __('CNAM Number'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('cnam_number', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('blood_group', __('Blood Group'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('blood_group', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('birth_date', __('Birth Date'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::date('birth_date', $patient->birth_date, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('phone', __('Phone'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('phone', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::email('email', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('address', __('Address'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('address', null, ['class' => 'form-control', 'rows' => 2])); ?>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('allergies', __('Allergies'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('allergies', null, ['class' => 'form-control', 'rows' => 2])); ?>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('medical_history', __('Medical History'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('medical_history', null, ['class' => 'form-control', 'rows' => 3])); ?>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('current_treatments', __('Current Treatments'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::textarea('current_treatments', null, ['class' => 'form-control', 'rows' => 3])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('emergency_contact_name', __('Emergency Contact Name'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('emergency_contact_name', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('emergency_contact_phone', __('Emergency Contact Phone'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('emergency_contact_phone', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('emergency_contact_relationship', __('Relationship'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('emergency_contact_relationship', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?php echo e(Form::label('photo', __('Photo'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::file('photo', ['class' => 'form-control'])); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/patient/edit.blade.php ENDPATH**/ ?>
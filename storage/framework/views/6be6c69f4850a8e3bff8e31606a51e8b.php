<?php echo e(Form::model($appointment, ['route' => ['medical-appointments.update', $appointment->id], 'method' => 'put', 'class' => 'needs-validation', 'novalidate'])); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('patient_id', __('Patient'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <select name="patient_id" class="form-control" required>
                    <option value=""><?php echo e(__('Select patient')); ?></option>
                    <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($patient->id); ?>" <?php echo e($appointment->patient_id == $patient->id ? 'selected' : ''); ?>><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('doctor_id', __('Doctor'), ['class' => 'form-label'])); ?>

                <select name="doctor_id" class="form-control">
                    <option value=""><?php echo e(__('Select doctor')); ?></option>
                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($doctor->id); ?>" <?php echo e($appointment->doctor_id == $doctor->id ? 'selected' : ''); ?>><?php echo e($doctor->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_at', __('Start Date & Time'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::datetimeLocal('start_at', $appointment->start_at ? \Carbon\Carbon::parse($appointment->start_at)->format('Y-m-d\TH:i') : null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_at', __('End Date & Time'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::datetimeLocal('end_at', $appointment->end_at ? \Carbon\Carbon::parse($appointment->end_at)->format('Y-m-d\TH:i') : null, ['class' => 'form-control', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('room', __('Room'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('room', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('specialty', __('Specialty'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('specialty', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('appointment_type', __('Appointment Type'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('appointment_type', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('queue_number', __('Queue Number'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::number('queue_number', null, ['class' => 'form-control', 'min' => 1])); ?>

            </div>
        </div>
        <div class="col-md-4 d-flex align-items-center">
            <div class="form-check mt-4">
                <?php echo e(Form::checkbox('is_waiting_list', 1, $appointment->is_waiting_list, ['class' => 'form-check-input', 'id' => 'is_waiting_list'])); ?>

                <?php echo e(Form::label('is_waiting_list', __('Waiting List'), ['class' => 'form-check-label'])); ?>

            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('status', ['scheduled' => __('Scheduled'), 'confirmed' => __('Confirmed'), 'in_progress' => __('Checked In'), 'completed' => __('Completed'), 'canceled' => __('Canceled')], $appointment->status, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('reminder_channel', __('Reminder Channel'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::select('reminder_channel', ['email' => __('Email'), 'sms' => __('SMS'), 'whatsapp' => __('WhatsApp')], $appointment->reminder_channel, ['class' => 'form-control', 'placeholder' => __('None')])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('reminder_at', __('Reminder Date & Time'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::datetimeLocal('reminder_at', $appointment->reminder_at ? \Carbon\Carbon::parse($appointment->reminder_at)->format('Y-m-d\TH:i') : null, ['class' => 'form-control'])); ?>

            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('cancel_reason', __('Cancel Reason'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('cancel_reason', null, ['class' => 'form-control'])); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/medical_appointment/edit.blade.php ENDPATH**/ ?>
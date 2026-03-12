<?php $__env->startSection('page-title'); ?>
    <?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('patients.index')); ?>"><?php echo e(__('Patients')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit patient')): ?>
            <a href="#" class="btn btn-sm btn-info me-2" data-url="<?php echo e(route('patients.edit', $patient->id)); ?>" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit Patient')); ?>">
                <i class="ti ti-pencil"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete patient')): ?>
            <?php echo Form::open(['method' => 'DELETE', 'route' => ['patients.destroy', $patient->id], 'id' => 'delete-form-' . $patient->id]); ?>

            <a href="#" class="btn btn-sm btn-danger bs-pass-para" data-bs-toggle="tooltip" title="<?php echo e(__('Delete')); ?>" data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($patient->id); ?>').submit();">
                <i class="ti ti-trash"></i>
            </a>
            <?php echo Form::close(); ?>

        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $avatarPath = \App\Models\Utility::get_file('uploads/avatar/');
        $photoUrl = $patient->photo_path ? asset(\Storage::url($patient->photo_path)) : $avatarPath . 'avatar.png';
        $consultationMap = $consultations->keyBy('id');
        $prescriptions = collect();
        foreach ($consultations as $consultation) {
            $prescriptions = $prescriptions->merge($consultation->prescriptions);
        }
    ?>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="<?php echo e($photoUrl); ?>" class="rounded border" width="120" height="120">
                        <h5 class="mt-3"><?php echo e($patient->first_name); ?> <?php echo e($patient->last_name); ?></h5>
                        <p class="text-muted mb-0"><?php echo e($patient->gender ? ucfirst($patient->gender) : __('Not specified')); ?></p>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('CIN')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->cin ?? '-'); ?></div>
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('CNAM')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->cnam_number ?? '-'); ?></div>
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('Blood Group')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->blood_group ?? '-'); ?></div>
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('Birth Date')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->birth_date ? \Auth::user()->dateFormat($patient->birth_date) : '-'); ?></div>
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('Phone')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->phone ?? '-'); ?></div>
                        <div class="col-6 mb-2 text-muted"><?php echo e(__('Email')); ?></div>
                        <div class="col-6 mb-2"><?php echo e($patient->email ?? '-'); ?></div>
                        <div class="col-12 mb-2 text-muted"><?php echo e(__('Address')); ?></div>
                        <div class="col-12 mb-2"><?php echo e($patient->address ?? '-'); ?></div>
                        <div class="col-12 mb-2 text-muted"><?php echo e(__('Allergies')); ?></div>
                        <div class="col-12 mb-2"><?php echo e($patient->allergies ?? '-'); ?></div>
                        <div class="col-12 mb-2 text-muted"><?php echo e(__('Medical History')); ?></div>
                        <div class="col-12 mb-2"><?php echo e($patient->medical_history ?? '-'); ?></div>
                        <div class="col-12 mb-2 text-muted"><?php echo e(__('Current Treatments')); ?></div>
                        <div class="col-12 mb-2"><?php echo e($patient->current_treatments ?? '-'); ?></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Emergency Contact')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 mb-2 text-muted"><?php echo e(__('Name')); ?></div>
                        <div class="col-7 mb-2"><?php echo e($patient->emergency_contact_name ?? '-'); ?></div>
                        <div class="col-5 mb-2 text-muted"><?php echo e(__('Phone')); ?></div>
                        <div class="col-7 mb-2"><?php echo e($patient->emergency_contact_phone ?? '-'); ?></div>
                        <div class="col-5 mb-2 text-muted"><?php echo e(__('Relationship')); ?></div>
                        <div class="col-7 mb-2"><?php echo e($patient->emergency_contact_relationship ?? '-'); ?></div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Signed Consents')); ?></h5>
                </div>
                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient consent')): ?>
                        <?php echo e(Form::open(['route' => ['patients.consents.store', $patient->id], 'method' => 'post', 'files' => true])); ?>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('title', __('Consent Title'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::select('status', ['signed' => __('Signed'), 'revoked' => __('Revoked'), 'expired' => __('Expired')], 'signed', ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('consented_at', __('Consent Date'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::date('consented_at', now()->format('Y-m-d'), ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('expires_at', __('Expires At'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::date('expires_at', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('consent_file', __('Signed File'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::file('consent_file', ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php else: ?>
                        <div class="text-muted"><?php echo e(__('You do not have permission to record consents.')); ?></div>
                    <?php endif; ?>

                    <hr>

                    <?php $__empty_2 = true; $__currentLoopData = $consents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <div class="border rounded p-2 mb-2">
                            <div class="d-flex justify-content-between">
                                <strong><?php echo e($consent->title); ?></strong>
                                <span class="badge bg-light text-dark"><?php echo e(ucfirst($consent->status)); ?></span>
                            </div>
                            <div class="small text-muted mt-1">
                                <?php echo e(__('Signed')); ?>: <?php echo e(\Auth::user()->dateFormat($consent->consented_at)); ?>

                                <?php if($consent->expires_at): ?>
                                    · <?php echo e(__('Expires')); ?>: <?php echo e(\Auth::user()->dateFormat($consent->expires_at)); ?>

                                <?php endif; ?>
                            </div>
                            <?php if($consent->notes): ?>
                                <div class="small mt-1"><?php echo e($consent->notes); ?></div>
                            <?php endif; ?>
                            <div class="mt-2 d-flex gap-2">
                                <?php if($consent->file_path): ?>
                                    <a href="<?php echo e(asset(Storage::url($consent->file_path))); ?>" class="btn btn-sm btn-outline-primary" target="_blank"><?php echo e(__('Open')); ?></a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete patient consent')): ?>
                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['patient-consents.destroy', $consent->id], 'id' => 'delete-consent-' . $consent->id]); ?>

                                    <a href="#" class="btn btn-sm btn-outline-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-consent-<?php echo e($consent->id); ?>').submit();">
                                        <?php echo e(__('Delete')); ?>

                                    </a>
                                    <?php echo Form::close(); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                        <div class="text-muted"><?php echo e(__('No consents available.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"><?php echo e(__('Consultations')); ?></h5>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient consultation')): ?>
                        <a href="#" data-size="lg" data-url="<?php echo e(route('patients.consultations.create', $patient->id)); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>" data-title="<?php echo e(__('Add Consultation')); ?>" class="btn btn-sm btn-primary">
                            <i class="ti ti-plus"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Doctor')); ?></th>
                                    <th><?php echo e(__('Reason')); ?></th>
                                    <th><?php echo e(__('Diagnosis')); ?></th>
                                    <th><?php echo e(__('Vitals')); ?></th>
                                    <th><?php echo e(__('Clinical Notes')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e(\Auth::user()->dateFormat($consultation->consultation_date)); ?></td>
                                        <td><?php echo e($consultation->doctor_name ?? '-'); ?></td>
                                        <td>
                                            <div><?php echo e($consultation->title ?? '-'); ?></div>
                                            <?php if($consultation->reason_for_visit): ?>
                                                <div class="small text-muted"><?php echo e($consultation->reason_for_visit); ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div><?php echo e($consultation->diagnosis ?? '-'); ?></div>
                                            <?php if($consultation->requested_exams): ?>
                                                <div class="small text-muted"><?php echo e(__('Exams')); ?>: <?php echo e($consultation->requested_exams); ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <td class="small">
                                            <?php echo e(__('Temp')); ?>: <?php echo e($consultation->temperature ?? '-'); ?><br>
                                            <?php echo e(__('HR')); ?>: <?php echo e($consultation->heart_rate ?? '-'); ?><br>
                                            <?php echo e(__('BP')); ?>: <?php echo e($consultation->blood_pressure ?? '-'); ?><br>
                                            <?php echo e(__('RR')); ?>: <?php echo e($consultation->respiratory_rate ?? '-'); ?>

                                        </td>
                                        <td class="small">
                                            <div><?php echo e($consultation->clinical_observations ?? ($consultation->notes ?? '-')); ?></div>
                                            <?php if($consultation->sick_leave_start || $consultation->sick_leave_end): ?>
                                                <div class="text-muted mt-1">
                                                    <?php echo e(__('Sick Leave')); ?>:
                                                    <?php echo e($consultation->sick_leave_start ? \Auth::user()->dateFormat($consultation->sick_leave_start) : '-'); ?>

                                                    -
                                                    <?php echo e($consultation->sick_leave_end ? \Auth::user()->dateFormat($consultation->sick_leave_end) : '-'); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="6" class="text-center"><?php echo e(__('No consultations available')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Medical Documents')); ?></h5>
                </div>
                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient document')): ?>
                        <?php echo e(Form::open(['route' => ['patients.documents.store', $patient->id], 'method' => 'post', 'files' => true])); ?>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('title', __('Title'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::text('title', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('category', __('Category'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('category', null, ['class' => 'form-control', 'placeholder' => __('Report, scan, imaging...')])); ?>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo e(Form::label('document_file', __('File'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::file('document_file', ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Upload')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php endif; ?>

                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Uploaded')); ?></th>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Description')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($document->uploaded_at ? \Auth::user()->dateFormat($document->uploaded_at) : '-'); ?></td>
                                        <td><?php echo e($document->title); ?></td>
                                        <td><?php echo e($document->category ?? '-'); ?></td>
                                        <td><?php echo e($document->description ?? '-'); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset(Storage::url($document->file_path))); ?>" class="btn btn-sm btn-outline-primary" target="_blank"><?php echo e(__('Open')); ?></a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete patient document')): ?>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['patient-documents.destroy', $document->id], 'id' => 'delete-document-' . $document->id, 'class' => 'd-inline']); ?>

                                                <a href="#" class="btn btn-sm btn-outline-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-document-<?php echo e($document->id); ?>').submit();">
                                                    <?php echo e(__('Delete')); ?>

                                                </a>
                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-center"><?php echo e(__('No documents available')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Add Prescription')); ?></h5>
                </div>
                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient prescription')): ?>
                        <?php echo e(Form::open(['route' => ['consultations.prescriptions.store', 0], 'method' => 'post', 'id' => 'prescription-form'])); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('consultation_id', __('Consultation'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <select name="consultation_id" class="form-control" id="prescription-consultation" required>
                                        <option value=""><?php echo e(__('Select consultation')); ?></option>
                                        <?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($consultation->id); ?>" data-store-url="<?php echo e(route('consultations.prescriptions.store', $consultation->id)); ?>"><?php echo e(\Auth::user()->dateFormat($consultation->consultation_date)); ?> - <?php echo e($consultation->title ?? __('Consultation')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('medication_name', __('Medication Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::text('medication_name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('dosage', __('Dosage'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('dosage', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('frequency', __('Frequency'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('frequency', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('duration', __('Duration'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('duration', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php else: ?>
                        <div class="text-muted"><?php echo e(__('You do not have permission to add prescriptions.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Add Lab Result')); ?></h5>
                </div>
                <div class="card-body">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient lab result')): ?>
                        <?php echo e(Form::open(['route' => ['patients.lab-results.store', $patient->id], 'method' => 'post'])); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('consultation_id', __('Consultation'), ['class' => 'form-label'])); ?>

                                    <select name="consultation_id" class="form-control">
                                        <option value=""><?php echo e(__('Select consultation')); ?></option>
                                        <?php $__currentLoopData = $consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($consultation->id); ?>"><?php echo e(\Auth::user()->dateFormat($consultation->consultation_date)); ?> - <?php echo e($consultation->title ?? __('Consultation')); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('test_name', __('Test Name'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                                    <?php echo e(Form::text('test_name', null, ['class' => 'form-control', 'required' => 'required'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('result_value', __('Result'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('result_value', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('unit', __('Unit'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('unit', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('reference_range', __('Reference Range'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::text('reference_range', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('result_date', __('Result Date'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::date('result_date', null, ['class' => 'form-control'])); ?>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('notes', __('Notes'), ['class' => 'form-label'])); ?>

                                    <?php echo e(Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                        <?php echo e(Form::close()); ?>

                    <?php else: ?>
                        <div class="text-muted"><?php echo e(__('You do not have permission to add lab results.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Lab Results')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Result Date')); ?></th>
                                    <th><?php echo e(__('Test Name')); ?></th>
                                    <th><?php echo e(__('Result')); ?></th>
                                    <th><?php echo e(__('Unit')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $labResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $labResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($labResult->result_date ? \Auth::user()->dateFormat($labResult->result_date) : '-'); ?></td>
                                        <td><?php echo e($labResult->test_name); ?></td>
                                        <td><?php echo e($labResult->result_value ?? '-'); ?></td>
                                        <td><?php echo e($labResult->unit ?? '-'); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete patient lab result')): ?>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['patient-lab-results.destroy', $labResult->id], 'id' => 'delete-lab-' . $labResult->id]); ?>

                                                <a href="#" class="btn btn-sm btn-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-lab-<?php echo e($labResult->id); ?>').submit();">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-center"><?php echo e(__('No lab results available')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Prescriptions')); ?></h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Consultation')); ?></th>
                                    <th><?php echo e(__('Medication')); ?></th>
                                    <th><?php echo e(__('Dosage')); ?></th>
                                    <th><?php echo e(__('Frequency')); ?></th>
                                    <th><?php echo e(__('Duration')); ?></th>
                                    <th><?php echo e(__('Notes')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td>
                                            <?php if($consultationMap->has($prescription->consultation_id)): ?>
                                                <?php echo e(\Auth::user()->dateFormat($consultationMap[$prescription->consultation_id]->consultation_date)); ?>

                                            <?php else: ?>
                                                <?php echo e($prescription->consultation_id); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($prescription->medication_name); ?></td>
                                        <td><?php echo e($prescription->dosage ?? '-'); ?></td>
                                        <td><?php echo e($prescription->frequency ?? '-'); ?></td>
                                        <td><?php echo e($prescription->duration ?? '-'); ?></td>
                                        <td><?php echo e($prescription->notes ?? '-'); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete patient prescription')): ?>
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['patient-prescriptions.destroy', $prescription->id], 'id' => 'delete-prescription-' . $prescription->id]); ?>

                                                <a href="#" class="btn btn-sm btn-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-prescription-<?php echo e($prescription->id); ?>').submit();">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="7" class="text-center"><?php echo e(__('No prescriptions available')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage medical record access log')): ?>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(__('Medical Record Access Log')); ?></h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('Date')); ?></th>
                                        <th><?php echo e(__('User')); ?></th>
                                        <th><?php echo e(__('Action')); ?></th>
                                        <th><?php echo e(__('Context')); ?></th>
                                        <th><?php echo e(__('IP')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_2 = true; $__currentLoopData = $accessLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accessLog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <tr>
                                            <td><?php echo e(\Auth::user()->dateFormat($accessLog->created_at)); ?> <?php echo e(\Auth::user()->timeFormat($accessLog->created_at)); ?></td>
                                            <td><?php echo e(optional($accessLog->user)->name ?? '-'); ?></td>
                                            <td><?php echo e(ucwords(str_replace('_', ' ', $accessLog->action))); ?></td>
                                            <td><?php echo e($accessLog->context ?? '-'); ?></td>
                                            <td><?php echo e($accessLog->ip_address ?? '-'); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <tr>
                                            <td colspan="5" class="text-center"><?php echo e(__('No access logs available')); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create patient prescription')): ?>
                <script>
                    (function () {
                        var select = document.getElementById('prescription-consultation');
                        var form = document.getElementById('prescription-form');
                        if (!select || !form) {
                            return;
                        }
                        var updateAction = function () {
                            var option = select.options[select.selectedIndex];
                            if (option && option.dataset.storeUrl) {
                                form.action = option.dataset.storeUrl;
                            }
                        };
                        select.addEventListener('change', updateAction);
                        updateAction();
                    })();
                </script>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/patient/show.blade.php ENDPATH**/ ?>
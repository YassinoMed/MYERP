<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Job')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('job.index')); ?>"><?php echo e(__('Job')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Job Create')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
    <link href="<?php echo e(asset('css/bootstrap-tagsinput.css')); ?>" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('js/bootstrap-tagsinput.min.js')); ?>"></script>
    <script>
        var e = $('[data-toggle="tags"]');
        e.length && e.each(function() {
            $(this).tagsinput({
                tagClass: "badge badge-primary"
            })
        });
    </script>
    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php
    $plan = \App\Models\Utility::getChatGPTSettings();
?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        

        <?php if($plan->chatgpt == 1): ?>
            <a href="#" data-size="lg" class="btn btn-primary btn-icon btn-sm" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['job'])); ?>" data-bs-placement="top"
                data-title="<?php echo e(__('Generate content with AI')); ?>">
                <i class="fas fa-robot"> </i> <span><?php echo e(__('Generate with AI')); ?></span>
            </a>
        <?php endif; ?>
        
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open(['url' => 'job', 'method' => 'post', 'class' => 'needs-validation', 'novalidate'])); ?>

    <div class="row mt-3 row-gap-1">
        <div class="col-md-6 ">
            <div class="card card-fluid mb-0 h-100">
                <div class="card-body job-create ">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo Form::label('title', __('Job Title'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo Form::text('title', old('title'), [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('Enter Job Title'),
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('branch', __('Branch'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo e(Form::select('branch', $branches, null, ['class' => 'form-control select', 'required' => 'required'])); ?>

                            <div class="text-xs mt-1">
                                <?php echo e(__('Create branch here.')); ?> <a href="<?php echo e(route('branch.index')); ?>"><b><?php echo e(__('Create branch')); ?></b></a>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('category', __('Job Category'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo e(Form::select('category', $categories, null, ['class' => 'form-control select', 'required' => 'required'])); ?>

                            <div class="text-xs mt-1">
                                <?php echo e(__('Create job category here.')); ?> <a href="<?php echo e(route('job-category.index')); ?>"><b><?php echo e(__('Create job category')); ?></b></a>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <?php echo Form::label('position', __('Positions'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo Form::number('position', old('positions'), [
                                'class' => 'form-control',
                                'required' => 'required',
                                'placeholder' => __('Enter Positions'),
                            ]); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('status', __('Status'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo e(Form::select('status', $status, null, ['class' => 'form-control select', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('start_date', __('Start Date'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo Form::date('start_date', old('start_date'), ['class' => 'form-control ', 'required' => 'required']); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <?php echo Form::label('end_date', __('End Date'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <?php echo Form::date('end_date', old('end_date'), ['class' => 'form-control ', 'required' => 'required']); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <?php echo Form::label('skill', __('Skill'), ['class' => 'form-label']); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                            <input type="text" class="form-control" value="" data-toggle="tags" name="skill"
                                placeholder="Skill" required />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="card card-fluid mb-0 h-100">
                <div class="card-body job-create">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to ask ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="gender"
                                            id="check-gender">
                                        <label class="form-check-label" for="check-gender"><?php echo e(__('Gender')); ?> </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="dob"
                                            id="check-dob">
                                        <label class="form-check-label" for="check-dob"><?php echo e(__('Date Of Birth')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="applicant[]" value="country"
                                            id="check-country">
                                        <label class="form-check-label" for="check-country"><?php echo e(__('Country')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h6><?php echo e(__('Need to show option ?')); ?></h6>
                                <div class="my-4">
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="profile"
                                            id="check-profile">
                                        <label class="form-check-label" for="check-profile"><?php echo e(__('Profile Image')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="resume"
                                            id="check-resume">
                                        <label class="form-check-label" for="check-resume"><?php echo e(__('Resume')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="letter"
                                            id="check-letter">
                                        <label class="form-check-label" for="check-letter"><?php echo e(__('Cover Letter')); ?></label>
                                    </div>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="visibility[]" value="terms"
                                            id="check-terms">
                                        <label class="form-check-label"
                                            for="check-terms"><?php echo e(__('Terms And Conditions')); ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <h6><?php echo e(__('Custom Question')); ?></h6>
                            <div class="my-4">
                                <?php $__currentLoopData = $customQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" name="custom_question[]"
                                            value="<?php echo e($question->id); ?>" id="custom_question_<?php echo e($question->id); ?>">
                                        <label class="form-check-label"
                                            for="custom_question_<?php echo e($question->id); ?>"><?php echo e($question->question); ?> </label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid mb-0 h-100">
                <div class="card-body ">
                    <div class="form-group">
                        <?php echo Form::label('description', __('Job Description'), ['class' => 'form-label mb-4']); ?>

                        <textarea class="form-control summernote-simple-2" name="description" id="exampleFormControlTextarea1"
                            rows="8" placeholder="EnterJob Description"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-fluid mb-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between gap-3 mb-3 flex-wrap">
                        <div class="form-group mb-0">
                            <?php echo Form::label('requirement', __('Job Requirement'), [
                                'class' => 'form-label',
                                'placeholder' => __('Enter Job Requirement'),
                                'required' => 'required',
                            ]); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                        <?php if($plan->chatgpt == 1): ?>
                            <a href="#" data-size="md" class="btn btn-primary btn-icon btn-sm"
                                data-ajax-popup-over="true" id="grammarCheck"
                                data-url="<?php echo e(route('grammar', ['grammar'])); ?>" data-bs-placement="top"
                                data-title="<?php echo e(__('Grammar check with AI')); ?>">
                                <i class="ti ti-rotate"></i> <span><?php echo e(__('Grammar check with AI')); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="form-group mt-2">
                        <textarea class="form-control summernote-simple" name="requirement" id="exampleFormControlTextarea2" rows="8"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 text-end">
            <div class="form-group">
                <input type="button" value="<?php echo e(__('Cancel')); ?>" onclick="location.href = '<?php echo e(route('job.index')); ?>';"
                class="btn btn-secondary me-1">
                <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
            </div>
        </div>
    </div>
    <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/job/create.blade.php ENDPATH**/ ?>
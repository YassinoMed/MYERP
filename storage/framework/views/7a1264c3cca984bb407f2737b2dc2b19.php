<?php echo e(Form::open(array('url'=>'job-application','method'=>'post', 'enctype' => "multipart/form-data", 'class'=>'needs-validation', 'novalidate'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('job',__('Job'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::select('job',$jobs,null,array('class'=>'form-control select2','id'=>'jobs','required'=>'required'))); ?>

            <div class="text-xs mt-1">
                <?php echo e(__('Create job here.')); ?> <a href="<?php echo e(route('job.index')); ?>"><b><?php echo e(__('Create job')); ?></b></a>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::text('name',null,array('class'=>'form-control name' , 'placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::text('email',null,array('class'=>'form-control' , 'placeholder'=>__('Enter email'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('phone',__('Phone'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
            <?php echo e(Form::text('phone',null,array('class'=>'form-control' , 'placeholder'=>__('Enter Phone'),'required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6 dob d-none">
            <?php echo Form::label('dob', __('Date of Birth'),['class'=>'form-label']); ?>

            <?php echo Form::date('dob', old('dob'), ['class' => 'form-control']); ?>

        </div>
        <div class="form-group col-md-6 gender d-none">
            <?php echo Form::label('gender', __('Gender'),['class'=>'form-label']); ?>

            <div class="d-flex radio-check">
                <div class="form-check form-check-inline form-group">
                    <input type="radio" id="g_male" value="Male" name="gender" class="form-check-input">
                    <label class="form-check-label" for="g_male"><?php echo e(__('Male')); ?></label>
                </div>
                <div class="form-check form-check-inline form-group">
                    <input type="radio" id="g_female" value="Female" name="gender" class="form-check-input">
                    <label class="form-check-label" for="g_female"><?php echo e(__('Female')); ?></label>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6 country d-none">
            <?php echo e(Form::label('country',__('Country'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('country',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group col-md-6 country d-none">
            <?php echo e(Form::label('state',__('State'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('state',null,array('class'=>'form-control'))); ?>

        </div>
        <div class="form-group col-md-6 country d-none">
            <?php echo e(Form::label('city',__('City'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('city',null,array('class'=>'form-control'))); ?>

        </div>

        <div class="form-group col-md-6 profile d-none">
            <?php echo e(Form::label('profile',__('Profile'),['class'=>'form-label'])); ?>

            <div class="choose-file form-group">
                <label for="profile" class="form-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="profile" id="profile" data-filename="profile_create">
                </label>
                <p class="profile_create"></p>
            </div>
        </div>
        <div class="form-group col-md-6 resume d-none">
            <?php echo e(Form::label('resume',__('CV / Resume'),['class'=>'form-label'])); ?>

            <div class="choose-file form-group">
                <label for="resume" class="form-label">
                    <div><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="resume" id="resume" data-filename="resume_create">
                </label>
                <p class="resume_create"></p>
            </div>
        </div>
        <div class="form-group col-md-12 letter d-none">
            <?php echo e(Form::label('cover_letter',__('Cover Letter'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('cover_letter',null,array('class'=>'form-control', 'placeholder' => __('Enter your cover letter')))); ?>

        </div>

        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group col-md-12  question question_<?php echo e($question->id); ?> d-none">
                <?php echo e(Form::label($question->question,$question->question,['class'=>'form-label'])); ?>

                <input type="text" class="form-control" name="question[<?php echo e($question->question); ?>]" <?php echo e(($question->is_required=='yes')? '':''); ?> placeholder="<?php echo e(__('Write here...')); ?>">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>



<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/jobApplication/create.blade.php ENDPATH**/ ?>
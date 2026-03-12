<div class="modal-body">
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4"><?php echo e(__('Schedule Detail')); ?></h5>
            <div class="row mb-0 align-items-center">
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Job')); ?></p>
                <p class="col-sm-7 text-sm"><?php echo e(!empty($interviewSchedule->applications) ? !empty($interviewSchedule->applications->jobs) ? $interviewSchedule->applications->jobs->title : '-' : '-'); ?></p>
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Interview On')); ?></p>
                <p class="col-sm-7 text-sm"> <?php echo e(\Auth::user()->dateFormat($interviewSchedule->date).' '. \Auth::user()->timeFormat($interviewSchedule->time)); ?></p>
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Assign Employee')); ?></p>
                <p class="col-sm-7 text-sm"><?php echo e(!empty($interviewSchedule->users)?$interviewSchedule->users->name:'-'); ?></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4"><?php echo e(__('Candidate Detail')); ?></h5>
            <div class="row mb-0 align-items-center">
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Name')); ?></p>
                <p class="col-sm-7 text-sm"><?php echo e(($interviewSchedule->applications)?$interviewSchedule->applications->name:'-'); ?></p>
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Email')); ?></p>
                <p class="col-sm-7 text-sm"> <?php echo e(($interviewSchedule->applications)?$interviewSchedule->applications->email:'-'); ?></p>
                <p class="col-sm-5 h6 text-sm"><?php echo e(__('Phone')); ?></p>
                <p class="col-sm-7 text-sm"><?php echo e(($interviewSchedule->applications)?$interviewSchedule->applications->phone:'-'); ?></p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-4"><?php echo e(__('Candidate Status')); ?></h5>
            <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check-control custom-radio">
                    <input type="radio" id="stage_<?php echo e($stage->id); ?>" name="stage" data-scheduleid="<?php echo e($interviewSchedule->candidate); ?>" value="<?php echo e($stage->id); ?>" class="form-check-input stages" <?php echo e(!empty($interviewSchedule->applications)?!empty($interviewSchedule->applications->stage==$stage->id)?'checked':'':''); ?>>
                    <label class="form-check-label" for="stage_<?php echo e($stage->id); ?>"><?php echo e($stage->title); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="modal-footer">
        <a href="#" data-url="<?php echo e(route('job.on.board.create', $interviewSchedule->candidate)); ?>"  data-ajax-popup="true"  class="btn btn-primary" >  <?php echo e(__('Add to Job OnBoard')); ?></a>
    </div>

</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/interviewSchedule/show.blade.php ENDPATH**/ ?>
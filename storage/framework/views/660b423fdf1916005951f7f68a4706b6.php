
<div class="modal-body">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <b class="text-sm"><?php echo e(__('Title')); ?> :</b>
                <p class="m-0 p-0 text-sm"><?php echo e($bug->title); ?></p>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <b class="text-sm"><?php echo e(__('Priority')); ?> :</b>
                <p class="m-0 p-0 text-sm"><?php echo e(ucfirst($bug->priority)); ?></p>
            </div>
        </div>

        <div class="col-6 ">
            <div class="form-group">
                <b class="text-sm"><?php echo e(__('Created Date')); ?> :</b>
                <p class="m-0 p-0 text-sm"><?php echo e($bug->created_at); ?></p>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <b class="text-sm"><?php echo e(__('Assign to')); ?> :</b>
                <p class="m-0 p-0 text-sm"><?php echo e((!empty($bug->assignTo)?$bug->assignTo->name:'')); ?></p>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <b class="text-sm"><?php echo e(__('Description')); ?> :</b>
                <p class="m-0 p-0 text-sm"><?php echo e($bug->description); ?></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item mb-2">
                    <a class="btn btn-outline-primary btn-sm ml-1 active show" data-bs-toggle="tab"
                       href="#profile" role="tab" aria-selected="false"><?php echo e(__('Comments')); ?></a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-outline-primary btn-sm ml-1" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?php echo e(__('Files')); ?></a>
                </li>
            </ul>

            <div class="tab-content pt-4" id="myTabContent">
                <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="form-group m-0">
                        <form method="post" id="form-comment" data-action="<?php echo e(route('bug.comment.store',[$bug->project_id,$bug->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <textarea class="form-control" name="comment" placeholder="<?php echo e(__('Write message')); ?>" id="example-textarea" rows="3" required></textarea>
                            <div class="text-end mt-1">
                                <div class="btn-group mb-2 ml-2 d-none d-sm-inline-block">
                                    <button type="button" class="btn btn-primary btn-sm ml-1 text-white"><?php echo e(__('Submit')); ?></button>
                                </div>
                            </div>
                        </form>
                        <div class="comment-holder" id="comments">
                            <?php $__currentLoopData = $bug->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="media">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div>
                                                <h5 class="mt-0"><?php echo e((!empty($comment->user)?$comment->user->name:'')); ?></h5>
                                                <p class="mb-0 text-xs"><?php echo e($comment->comment); ?></p>
                                            </div>
                                            <a href="#" class="btn btn-sm red btn-danger delete-comment" data-url="<?php echo e(route('bug.comment.destroy',$comment->id)); ?>">
                                                <i class="ti ti-trash"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group m-0">
                        <form method="post" id="form-file" enctype="multipart/form-data" data-url="<?php echo e(route('bug.comment.file.store',$bug->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-6">
                                <div class="choose-file form-group">
                                    <label for="file" class="form-label">
                                        <div><?php echo e(__('file here')); ?></div>
                                        <input type="file" class="form-control" name="file" id="file" data-filename="file_update">
                                    </label>
                                    <p class="file_update"></p>
                                </div>
                                    <span class="invalid-feedback" id="file-error" role="alert"></span>
                                </div>
                                <div class="col-4">
                                    <div class="btn-group  ml-2 mt-4 d-none d-sm-inline-block">
                                        <button type="submit" class="btn btn-primary btn-sm ml-1 text-white"><?php echo e(__('Upload')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row mt-3" id="comments-file">
                            <?php $__currentLoopData = $bug->bugFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-8 mb-2 file-<?php echo e($file->id); ?>">
                                    <h5 class="mt-0 mb-1 font-weight-bold text-sm"> <?php echo e($file->name); ?></h5>
                                    <p class="m-0 text-xs"><?php echo e($file->file_size); ?></p>
                                </div>
                                <div class="col-4 mb-2 file-<?php echo e($file->id); ?>">
                                    <div class="comment-trash" style="float: right">
                                        <a download href="<?php echo e(asset(Storage::url('bugs/'.$file->file))); ?>" class="btn btn-sm btn-primary me-1">
                                            <i class="ti ti-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm red btn-danger delete-comment-file m-0 px-2" data-id="<?php echo e($file->id); ?>" data-url="<?php echo e(route('bug.comment.file.destroy',[$file->id])); ?>">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/projects/bugShow.blade.php ENDPATH**/ ?>
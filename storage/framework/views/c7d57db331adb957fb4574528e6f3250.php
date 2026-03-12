<div class="modal-body">

<div class="tab-content tab-bordered">
        <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <dl class="row">
                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Name')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php echo e($zoomMeeting-> title); ?></span></dd>


                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Meeting Id')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php echo e($zoomMeeting->meeting_id); ?></span></dd>



                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Client')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php echo e(!empty($zoomMeeting->client_name)?$zoomMeeting->client_name:'-'); ?></span></dd>

                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Start Date')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($zoomMeeting->start_date)); ?></span></dd>

                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Duration')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php echo e($zoomMeeting->duration); ?></span></dd>

                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Start URl')); ?></span></dt>
                                <dd class="col-sm-8"><span class="text-sm"><?php if($zoomMeeting->created_by == \Auth::user()->id && $zoomMeeting->checkDateTime()): ?>
                                            <a href="<?php echo e($zoomMeeting->start_url); ?>" target="_blank"> <?php echo e(__('Start meeting')); ?> <i class="ti ti-external-link-square-alt "></i></a>
                                        <?php elseif($zoomMeeting->checkDateTime()): ?>
                                            <a href="<?php echo e($zoomMeeting->join_url); ?>" target="_blank"> <?php echo e(__('Join meeting')); ?> <i class="ti ti-external-link-square-alt "></i></a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?></span></dd>

                                <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Status')); ?></span></dt>
                                <dd class="col-sm-8"><?php if($zoomMeeting->checkDateTime()): ?>
                                        <?php if($zoomMeeting->status == 'waiting'): ?>
                                            <span class="badge badge-info"><?php echo e(ucfirst($zoomMeeting->status)); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-success"><?php echo e(ucfirst($zoomMeeting->status)); ?></span>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge badge-danger"><?php echo e(__("End")); ?></span>
                                    <?php endif; ?>
                                </dd>

                            </dl>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-footer py-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <dt class="col-sm-12"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned Client')); ?></span></dt>
                                        <dd class="col-sm-12"><span class="text-sm"><?php echo e(!empty($zoomMeeting->client_name)?$zoomMeeting->client_name:''); ?></span></dd>

                                        <dt class="col-sm-12"><span class="h6 text-sm mb-0">Created</span></dt>
                                        <dd class="col-sm-12"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($zoomMeeting->created_at)); ?></span></dd>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/zoom-meeting/show.blade.php ENDPATH**/ ?>
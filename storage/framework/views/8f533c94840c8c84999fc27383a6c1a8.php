<?php
    $i = 0;
?>
<?php $__empty_1 = true; $__currentLoopData = $trackers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        $tracker = $trackers->toArray();
        $first_acc = 0;
        $data = $track->toArray();
        if(isset($data['0'])){
            $year=$data['0']['start_time'];
            $year = Date('Y',strtotime($year));
        }else{
            $year = \Carbon\Carbon::now()->year;
        }
        $time = collect($track);
        $total = $time->sum('total_time');
        $day_group = $time->groupBy(function($date,$k) {
            return \Carbon\Carbon::parse($date->start_time)->format('d');
        });
        $time = Utility::second_to_time($total);
        $year=date("Y");
        $date = Utility::getStartAndEndDate($key-1,$year);

        $currentWeek = date( 'W' );
        $today = strtotime( date( 'Y-m-d' ) ) - 7*24*60*60; // last week this day
        $lastWeek = date( 'W', $today );
    ?>
    <div class="card">
        <div class="card-body timetracker_options">
            <div class="clearfix">
                <div class="float-left">
                    <h5  class="week-date">
                        <?php if($currentWeek == $key): ?>
                            <?php echo e(__('This week')); ?>

                        <?php elseif($lastWeek == $key): ?>
                            <?php echo e(__('Last week')); ?>

                        <?php else: ?>
                            <?php echo e(date('M d',strtotime($date['start_date']. ' +1 day'))); ?> - <?php echo e(date('M d',strtotime($date['end_date']. ' +1 day'))); ?>

                        <?php endif; ?>
                    </h5>
                </div>
                <div class="float-right">
                    <div> <?php echo e(__('Week total')); ?> : <b> <?php echo e($time); ?></b> </div>
                </div>
                <span class="clearfix"></span>
            </div>
            <div class="time-schrdule bg-white p-2 small">
                <div class="row">
                    <div class="col-3"> <b> <?php echo e(__('Title')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('Project Name')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('User')); ?> </b> </div>
                    <div class="col-2"> <b> <?php echo e(__('Tags')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('Date')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('Start')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('End')); ?> </b> </div>
                    <div class="col-1"> <b> <?php echo e(__('Time')); ?> </b> </div>
                    <div class="col-1"> <b> </b> </div>
                </div>
                <div class="bb1"></div>
                <div class="project-acc">
                    <?php $__currentLoopData = $day_group->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$day_tracks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $time_day = collect($day_tracks);
                            $total_day = $time_day->sum('total_time');
                            $total_day = Utility::second_to_time($total_day);
                            $name_group = $time_day->groupBy('name');
                            $class = 'open-accordion';
                        ?>
                        <?php $__currentLoopData = $name_group->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $name_array =$name->toArray();
                                $total_name = collect($name_array)->sum('total_time');
                                $total_name = Utility::second_to_time($total_name);
                                $sdates = collect($name_array)->pluck('start_time')->toArray();
                                $edates = collect($name_array)->pluck('end_time')->toArray();
                                $ttag = collect($name_array)->pluck('tag_id')->toArray();
                                $strat_time =  min($sdates);
                                $end_time = max($edates);
                                $date = '';
                                if(!empty($name)){
                                    $date = date("M-d-Y",strtotime($name[0]->start_time));
                                    $user_name = $name[0]->user_name;
                                    $project_name = $name[0]->project_name;
                                }
                                if($first_acc == 0){
                                    $class = 'open-accordion';
                                    $first_acc = 1;
                                    $aicon = 'fa-chevron-up';
                                    $disply = '';
                                    $arrow = 'close-acc';
                                }else{
                                    $arrow = 'open-acc';
                                    $disply = 'none';
                                    $class= '';
                                    $aicon = 'fa-chevron-down';
                                }
                            ?>
                            <div class="row acc-mainmenu">
                                <div class="col-3"> <i class="ti ti-plus accodian-plus"></i> <?php echo e($key); ?></div>
                                <div class="col-1"><?php echo e($project_name); ?></div>
                                <div class="col-1"><?php echo e($user_name); ?></div>
                                <div class="col-2">#</div>
                                <div class="col-1"><?php echo e($date); ?></div>
                                <div class="col-1"><?php echo e(date("H:i:s",strtotime($strat_time))); ?></div>
                                <div class="col-1"><?php echo e(date("H:i:s",strtotime($end_time))); ?></div>
                                <div class="col-1"><?php echo e($total_name); ?></div>
                                <div class="col-1"></div>
                            </div>
                            <?php if(!empty($name)): ?>
                                <div class="acc-sub-menu" style="display: none;">
                                    <?php $__currentLoopData = $name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row acc-sub-menu-div">
                                            <div class="col-3"> <?php echo e($t->name); ?></div>
                                            <div class="col-1"><?php echo e($t->project_name); ?></div>
                                            <div class="col-1"><?php echo e($t->user_name); ?></div>
                                            <div class="col-2">
                                                <?php if(empty($t->tags_name)): ?>
                                                    <p>#</p>
                                                <?php else: ?>
                                                    <p>
                                                        <?php $__currentLoopData = $t->tags_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            #<?php echo e($tag); ?>,
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-1"><?php echo e(date("M-d-Y",strtotime($t->start_time))); ?></div>
                                            <div class="col-1"><?php echo e(date("H:i:s",strtotime($t->start_time))); ?></div>
                                            <div class="col-1"><?php echo e(date("H:i:s",strtotime($t->end_time))); ?></div>
                                            <div class="col-1"><?php echo e($t->total); ?></div>
                                            <div class="col-1">
                                                <img alt="Image placeholder" src="<?php echo e(asset('assets/images/gallery.png')); ?>" class="avatar view-images rounded-circle avatar-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('View Screenshot images')); ?>" style="height: 25px;width:24px;margin-right:10px;cursor: pointer;" data-id="<?php echo e($t['id']); ?>" id="track-images-<?php echo e($t['id']); ?>">
                                                <i data-id="<?php echo e($t['id']); ?>" data-is_billable="<?php echo e($t['is_billable']); ?>" data-toggle="tooltip" data-original-title="<?php echo e($t['is_billable'] ==1? __('Click to Mark Non-Billable'):__('Click to Mark Billable')); ?>" class="change_billable ti ti-dollar-sign <?php echo e($t['is_billable'] ==1?'doller-billable':'doller-non-billable'); ?>"></i>
                                                <i class="ti ti-times text-danger mx-2 pointer remove-track " data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-id="<?php echo e($t['id']); ?>" data-url=""></i>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="timetracker_options card p-5">
        <div class="selected_date week_total text-center mx-auto">
            <span class="week-date"> <?php echo e(__('Records not found')); ?></span>
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $('[data-type="times"]').timeEntry({
        show24Hours: true,
    });
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/time_trackers/time_tracker_table.blade.php ENDPATH**/ ?>
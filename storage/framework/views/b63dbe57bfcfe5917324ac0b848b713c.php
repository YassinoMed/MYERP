<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('BTP Site Tracking')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('BTP Site Tracking')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if($ganttUrl): ?>
            <a href="<?php echo e($ganttUrl); ?>" class="btn btn-sm btn-primary">
                <span class="btn-inner--icon"><i class="ti ti-chart-bar"></i></span>
                <span class="btn-inner--text"><?php echo e(__('Gantt Chart')); ?></span>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Photos')); ?></h6>
                            <h3 class="mb-0"><?php echo e($totalPhotos); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Tasks')); ?></h6>
                            <h3 class="mb-0"><?php echo e($taskStats['total']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Completed')); ?></h6>
                            <h3 class="mb-0"><?php echo e($taskStats['completed']); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted"><?php echo e(__('Delayed')); ?></h6>
                            <h3 class="mb-0"><?php echo e($taskStats['delayed']); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Project Filter')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="get" action="<?php echo e(route('btp.site-tracking.index')); ?>">
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Project')); ?></label>
                            <select name="project_id" class="form-control">
                                <option value=""><?php echo e(__('All Projects')); ?></option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>" <?php if($selectedProject && $selectedProject->id === $project->id): ?> selected <?php endif; ?>>
                                        <?php echo e($project->project_name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Apply')); ?></button>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Upload Site Photo')); ?></h5>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('btp.site-tracking.photos.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Project')); ?></label>
                            <select name="project_id" class="form-control" required>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($project->id); ?>"><?php echo e($project->project_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Photo')); ?></label>
                            <input type="file" name="photo" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Taken At')); ?></label>
                            <input type="datetime-local" name="taken_at" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Latitude')); ?></label>
                            <input type="number" step="0.0000001" name="latitude" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Longitude')); ?></label>
                            <input type="number" step="0.0000001" name="longitude" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label"><?php echo e(__('Note')); ?></label>
                            <textarea name="note" class="form-control" rows="2"></textarea>
                        </div>
                        <button class="btn btn-primary"><?php echo e(__('Save Photo')); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Recent Photos')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Photo')); ?></th>
                                <th><?php echo e(__('Project')); ?></th>
                                <th><?php echo e(__('Taken At')); ?></th>
                                <th><?php echo e(__('Location')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(\App\Models\Utility::get_file($photo->file)); ?>" alt="photo" class="rounded" width="60" height="60">
                                    </td>
                                    <td><?php echo e($projects->firstWhere('id', $photo->project_id)?->project_name); ?></td>
                                    <td><?php echo e($photo->taken_at?->format('Y-m-d H:i')); ?></td>
                                    <td><?php echo e($photo->latitude); ?> <?php echo e($photo->longitude); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No photos found.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Delayed Tasks')); ?></h5>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Task')); ?></th>
                                <th><?php echo e(__('Project')); ?></th>
                                <th><?php echo e(__('End Date')); ?></th>
                                <th><?php echo e(__('Priority')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $delayedTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($task->name); ?></td>
                                    <td><?php echo e($selectedProject?->project_name); ?></td>
                                    <td><?php echo e(\App\Models\Utility::getDateFormated($task->end_date)); ?></td>
                                    <td><?php echo e(ucfirst($task->priority)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="text-center"><?php echo e(__('No delayed tasks.')); ?></td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/btp/site-tracking.blade.php ENDPATH**/ ?>
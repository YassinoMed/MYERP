<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Project Stages')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Project Stage')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/jscolor.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/libs/jquery-ui/jquery-ui.js')); ?>"></script>
    <script>
        $(function () {
            $(".sortable").sortable();
            $(".sortable").disableSelection();
            $(".sortable").sortable({
                stop: function () {
                    var order = [];
                    $(this).find('li').each(function (index, data) {
                        order[index] = $(data).attr('data-id');
                    });
                    $.ajax({
                        url: "<?php echo e(route('projectstages.order')); ?>",
                        data: {order: order, _token: $('meta[name="csrf-token"]').attr('content')},
                        type: 'POST',
                        success: function (data) {
                        },
                        error: function (data) {
                            data = data.responseJSON;
                            show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error')
                        }
                    })
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create project stage')): ?>
        <div class="float-end">
            <a href="#" data-url="<?php echo e(route('projectstages.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Project Stage')); ?>" class="btn btn-xs btn-white btn-icon-only width-auto"><i class="ti ti-plus"></i> <?php echo e(__('Create')); ?> </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-info note-constant text-xs">
                <p class=" mt-4"><strong><?php echo e(__('Note')); ?> : </strong><b><?php echo e(__('System will consider last stage as a completed / done task for get progress on project.')); ?></b></p>

            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group sortable">
                        <?php $__currentLoopData = $projectstages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projectstage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item" data-id="<?php echo e($projectstage->id); ?>">
                                <div class="row">
                                    <div class="col-6 text-xs text-dark"><?php echo e($projectstage->name); ?></div>
                                    <div class="col-4 text-xs text-dark"><?php echo e($projectstage->created_at); ?></div>
                                    <div class="col-2">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit project stage')): ?>
                                            <a href="#" data-url="<?php echo e(URL::to('projectstages/'.$projectstage->id.'/edit')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Edit Project Stages')); ?>" class="edit-icon">
                                                <i class="ti ti-pencil text-white"></i>
                                            </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete project stage')): ?>
                                            <a href="#" class="delete-icon" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($projectstage->id); ?>').submit();"><i class="ti ti-trash"></i></a>
                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['projectstages.destroy', $projectstage->id],'id'=>'delete-form-'.$projectstage->id]); ?>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/projectstages/index.blade.php ENDPATH**/ ?>
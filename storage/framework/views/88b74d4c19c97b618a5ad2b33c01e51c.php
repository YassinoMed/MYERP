<?php $__env->startSection('page-title'); ?><?php echo e(__('Subcontract Orders')); ?><?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Production')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Subcontract Orders')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="float-end">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create industrial subcontract order')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('production.subcontract-orders.create')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create Subcontract Order')); ?>" class="btn btn-sm btn-primary"><i class="ti ti-plus"></i></a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="card"><div class="card-body table-border-style"><div class="table-responsive"><table class="table datatable">
        <thead><tr><th><?php echo e(__('Reference')); ?></th><th><?php echo e(__('Order')); ?></th><th><?php echo e(__('Vendor')); ?></th><th><?php echo e(__('Quantity')); ?></th><th><?php echo e(__('Status')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead>
        <tbody>
        <?php $__currentLoopData = $subcontractOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcontractOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><a href="<?php echo e(route('production.subcontract-orders.show', $subcontractOrder->id)); ?>"><?php echo e($subcontractOrder->reference ?: ('SUB-'.$subcontractOrder->id)); ?></a></td>
                <td><?php echo e($subcontractOrder->order?->order_number ?: '-'); ?></td>
                <td><?php echo e($subcontractOrder->vendor?->name ?: '-'); ?></td>
                <td><?php echo e($subcontractOrder->quantity); ?></td>
                <td><?php echo e(ucfirst(str_replace('_',' ', $subcontractOrder->status))); ?></td>
                <td class="Action">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit industrial subcontract order')): ?>
                        <div class="action-btn me-2"><a href="#" class="mx-3 btn btn-sm align-items-center bg-info" data-url="<?php echo e(route('production.subcontract-orders.edit', $subcontractOrder->id)); ?>" data-ajax-popup="true" data-size="lg" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-pencil text-white"></i></a></div>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete industrial subcontract order')): ?>
                        <div class="action-btn"><?php echo Form::open(['method'=>'DELETE','route'=>['production.subcontract-orders.destroy',$subcontractOrder->id],'id'=>'delete-form-sub-'.$subcontractOrder->id]); ?><a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" title="<?php echo e(__('Delete')); ?>"><i class="ti ti-trash text-white"></i></a><?php echo Form::close(); ?></div>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table></div></div></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/production/subcontract_orders/index.blade.php ENDPATH**/ ?>
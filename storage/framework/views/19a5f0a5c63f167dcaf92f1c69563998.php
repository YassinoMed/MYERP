<div class="modal-body p-0">
    <div class="card mb-0 border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo e(__('Warehouse')); ?></th>
                        <th scope="col" class="text-center"><?php echo e(__('Quantity')); ?></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if(!empty($product->warehouse)): ?>
                            <tr>
                                <td class="align-middle"><?php echo e(!empty($product->warehouse)?$product->warehouse->name:'-'); ?></td>
                                <td class="align-middle text-center"><?php echo e($product->quantity); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="text-center"><?php echo e(__(' Product not select in warehouse')); ?></td>
                        </tr>
                    <?php endif; ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/productservice/detail.blade.php ENDPATH**/ ?>
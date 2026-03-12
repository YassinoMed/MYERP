<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Repository')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('document-repository.index')); ?>"><?php echo e(__('Document Repository')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($documentRepository->title); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $documentPath = \App\Models\Utility::get_file('uploads/document_repository');
        $documentUrl = $documentRepository->document ? $documentPath . '/' . $documentRepository->document : null;
        $extension = $documentRepository->document ? strtolower(pathinfo($documentRepository->document, PATHINFO_EXTENSION)) : null;
        $imageExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'svg'];
    ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <strong><?php echo e(__('Title')); ?>:</strong> <?php echo e($documentRepository->title); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Category')); ?>:</strong> <?php echo e(optional($documentRepository->category)->name ?: '-'); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Reference')); ?>:</strong> <?php echo e($documentRepository->reference ?: '-'); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Version')); ?>:</strong> <?php echo e($documentRepository->version); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($documentRepository->status))); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Effective Date')); ?>:</strong> <?php echo e($documentRepository->effective_date ?: '-'); ?>

                        </div>
                        <div class="col-md-6">
                            <strong><?php echo e(__('Expiry Date')); ?>:</strong> <?php echo e($documentRepository->expires_at ?: '-'); ?>

                        </div>
                        <div class="col-md-12">
                            <strong><?php echo e(__('Description')); ?>:</strong>
                            <p class="mb-0 mt-2"><?php echo e($documentRepository->description ?: '-'); ?></p>
                        </div>
                        <div class="col-md-12">
                            <strong><?php echo e(__('Document')); ?>:</strong>
                            <div class="mt-2">
                                <?php if($documentRepository->document): ?>
                                    <a class="btn btn-sm btn-primary" href="<?php echo e($documentUrl); ?>" download>
                                        <i class="ti ti-download"></i>
                                    </a>
                                    <a class="btn btn-sm btn-secondary" href="<?php echo e($documentUrl); ?>" target="_blank">
                                        <i class="ti ti-crosshair"></i>
                                    </a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($documentUrl): ?>
                            <div class="col-md-12">
                                <strong><?php echo e(__('Preview')); ?>:</strong>
                                <div class="mt-3 border rounded overflow-hidden bg-light">
                                    <?php if(in_array($extension, $imageExtensions, true)): ?>
                                        <img src="<?php echo e($documentUrl); ?>" alt="<?php echo e($documentRepository->title); ?>" class="img-fluid w-100">
                                    <?php elseif($extension === 'pdf'): ?>
                                        <iframe src="<?php echo e($documentUrl); ?>" title="<?php echo e($documentRepository->title); ?>" style="width: 100%; min-height: 560px; border: 0;"></iframe>
                                    <?php else: ?>
                                        <div class="p-4 text-muted">
                                            <?php echo e(__('Preview is not available for this file type. Use open or download to inspect the file.')); ?>

                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Document History')); ?></h5>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $documentRepository->versions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $version): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between align-items-start gap-2">
                                <div>
                                    <div class="fw-bold"><?php echo e($version->version_label ?: __('Version')); ?></div>
                                    <div class="text-muted small"><?php echo e($version->file_name ?: '-'); ?></div>
                                </div>
                                <span class="badge bg-light text-dark"><?php echo e(data_get($version->metadata, 'status', '-')); ?></span>
                            </div>
                            <div class="small text-muted mt-2">
                                <?php echo e(optional($version->created_at)->format('Y-m-d H:i') ?: '-'); ?>

                            </div>
                            <?php if(data_get($version->metadata, 'source')): ?>
                                <div class="small mt-1"><?php echo e(__('Source')); ?>: <?php echo e(data_get($version->metadata, 'source')); ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No document history available yet.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Linked Records')); ?></h5>
                </div>
                <div class="card-body">
                    <?php $__empty_1 = true; $__currentLoopData = $documentRepository->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border rounded p-3 mb-3">
                            <div class="fw-bold"><?php echo e(class_basename($link->linkable_type)); ?> #<?php echo e($link->linkable_id); ?></div>
                            <div class="small text-muted"><?php echo e(__('Relation')); ?>: <?php echo e($link->relation_type ?: '-'); ?></div>
                            <div class="small text-muted"><?php echo e(__('Linked by')); ?>: <?php echo e($link->linked_by ?: '-'); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-muted mb-0"><?php echo e(__('No cross-module links have been attached to this document.')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/document_repository/show.blade.php ENDPATH**/ ?>
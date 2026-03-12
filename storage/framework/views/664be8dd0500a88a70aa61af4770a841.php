<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Repository')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-subtitle'); ?>
    <?php echo e(__('Manage controlled documents, versioning and access to business-critical files from one repository.')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Document Repository')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="float-end d-flex gap-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage document repository category')): ?>
            <a href="<?php echo e(route('document-repository-categories.index')); ?>" class="btn btn-sm btn-primary-subtle">
                <i class="ti ti-category"></i>
            </a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create document repository')): ?>
            <a href="#" data-url="<?php echo e(route('document-repository.create')); ?>" data-size="lg" data-ajax-popup="true"
                data-title="<?php echo e(__('Create Document')); ?>" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $approvedDocuments = $documents->where('status', 'approved')->count();
        $draftDocuments = $documents->where('status', 'draft')->count();
        $archivedDocuments = $documents->where('status', 'archived')->count();
        $versionedDocuments = $documents->filter(function ($document) {
            return (float) ($document->version ?? 1) > 1;
        })->count();
    ?>
    <div class="row">
        <div class="col-12">
            <div class="ux-kpi-grid mb-4">
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Approved')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($approvedDocuments); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('ready for operational use')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Drafts')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($draftDocuments); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('pending review')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Archived')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($archivedDocuments); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('retained history')); ?></span>
                </div>
                <div class="ux-kpi-card">
                    <span class="ux-kpi-label"><?php echo e(__('Versioned files')); ?></span>
                    <strong class="ux-kpi-value"><?php echo e($versionedDocuments); ?></strong>
                    <span class="ux-kpi-meta"><?php echo e(__('documents above v1')); ?></span>
                </div>
            </div>
            <div class="card ux-list-card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Title')); ?></th>
                                    <th><?php echo e(__('Category')); ?></th>
                                    <th><?php echo e(__('Reference')); ?></th>
                                    <th><?php echo e(__('Version')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Document')); ?></th>
                                    <th width="220px"><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $documentPath = \App\Models\Utility::get_file('uploads/document_repository');
                                    ?>
                                    <tr data-bulk-id="<?php echo e($document->id); ?>">
                                        <td><?php echo e($document->title); ?></td>
                                        <td><?php echo e(optional($document->category)->name ?: '-'); ?></td>
                                        <td><?php echo e($document->reference ?: '-'); ?></td>
                                        <td><?php echo e($document->version); ?></td>
                                        <td><?php echo e(__(ucfirst($document->status))); ?></td>
                                        <td>
                                            <?php if($document->document): ?>
                                                <div class="d-flex gap-2">
                                                    <a class="btn btn-sm align-items-center bg-primary"
                                                        href="<?php echo e($documentPath . '/' . $document->document); ?>" download>
                                                        <i class="ti ti-download text-white"></i>
                                                    </a>
                                                    <a class="btn btn-sm align-items-center bg-secondary"
                                                        href="<?php echo e($documentPath . '/' . $document->document); ?>" target="_blank">
                                                        <i class="ti ti-crosshair text-white"></i>
                                                    </a>
                                                </div>
                                            <?php else: ?>
                                                -
                                            <?php endif; ?>
                                        </td>
                                        <td class="Action">
                                            <div class="action-btn me-2">
                                                <a href="<?php echo e(route('document-repository.show', $document->id)); ?>"
                                                    class="mx-3 btn btn-sm align-items-center bg-warning">
                                                    <i class="ti ti-eye text-white"></i>
                                                </a>
                                            </div>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit document repository')): ?>
                                                <div class="action-btn me-2">
                                                    <a href="#"
                                                        data-url="<?php echo e(URL::to('document-repository/' . $document->id . '/edit')); ?>"
                                                        data-size="lg" data-ajax-popup="true"
                                                        data-title="<?php echo e(__('Edit Document')); ?>"
                                                        class="mx-3 btn btn-sm align-items-center bg-info">
                                                        <i class="ti ti-pencil text-white"></i>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete document repository')): ?>
                                                <div class="action-btn">
                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['document-repository.destroy', $document->id], 'id' => 'delete-form-' . $document->id]); ?>

                                                    <a href="#"
                                                        class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger"
                                                        data-confirm="<?php echo e(__('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?')); ?>"
                                                        data-confirm-yes="document.getElementById('delete-form-<?php echo e($document->id); ?>').submit();">
                                                        <i class="ti ti-trash text-white"></i>
                                                    </a>
                                                    <?php echo Form::close(); ?>

                                                </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/document_repository/index.blade.php ENDPATH**/ ?>
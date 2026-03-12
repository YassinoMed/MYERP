<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link"><?php echo __('pagination.previous'); ?></span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev">
                        <?php echo __('pagination.previous'); ?>

                    </a>
                </li>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><?php echo __('pagination.next'); ?></a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link"><?php echo __('pagination.next'); ?></span>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/simple-bootstrap-5.blade.php ENDPATH**/ ?>
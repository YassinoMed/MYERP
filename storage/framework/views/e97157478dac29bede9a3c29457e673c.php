<?php if($paginator->hasPages()): ?>
    <nav>
        <ul class="pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="disabled" aria-disabled="true"><span><?php echo app('translator')->get('pagination.previous'); ?></span></li>
            <?php else: ?>
                <li><a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"><?php echo app('translator')->get('pagination.previous'); ?></a></li>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li><a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"><?php echo app('translator')->get('pagination.next'); ?></a></li>
            <?php else: ?>
                <li class="disabled" aria-disabled="true"><span><?php echo app('translator')->get('pagination.next'); ?></span></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/vendor/laravel/framework/src/Illuminate/Pagination/resources/views/simple-default.blade.php ENDPATH**/ ?>
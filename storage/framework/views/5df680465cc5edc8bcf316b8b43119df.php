<?php $__env->startSection('page-title', $npsCampaign->name); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('nps-campaigns.index')); ?>"><?php echo e(__('NPS Campaigns')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e($npsCampaign->name); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $responses = $npsCampaign->responses;
        $promoters = $responses->where('sentiment', 'promoter')->count();
        $detractors = $responses->where('sentiment', 'detractor')->count();
        $score = $responses->count() ? round((($promoters - $detractors) / $responses->count()) * 100) : 0;
    ?>
    <div class="ux-kpi-grid mb-4">
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('Responses')); ?></span><strong class="ux-kpi-value"><?php echo e($responses->count()); ?></strong><span class="ux-kpi-meta"><?php echo e(__('captured answers')); ?></span></div>
        <div class="ux-kpi-card"><span class="ux-kpi-label"><?php echo e(__('NPS score')); ?></span><strong class="ux-kpi-value"><?php echo e($score); ?></strong><span class="ux-kpi-meta"><?php echo e(__('promoters minus detractors')); ?></span></div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card"><div class="card-body"><h5><?php echo e(__('Campaign Summary')); ?></h5><p class="text-muted mb-2"><?php echo e($npsCampaign->description ?: __('No description provided.')); ?></p><div><strong><?php echo e(__('Channel')); ?>:</strong> <?php echo e(strtoupper($npsCampaign->channel)); ?></div><div><strong><?php echo e(__('Status')); ?>:</strong> <?php echo e(__(ucfirst($npsCampaign->status))); ?></div></div></div>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create nps response')): ?>
                <div class="card"><div class="card-body"><h5><?php echo e(__('Add Response')); ?></h5><form method="POST" action="<?php echo e(route('nps-responses.store', $npsCampaign)); ?>"><?php echo csrf_field(); ?>
                    <div class="mb-3"><label class="form-label"><?php echo e(__('Customer')); ?></label><select name="customer_id" class="form-control"><option value=""><?php echo e(__('Anonymous / external')); ?></option><?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customerId => $customerName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($customerId); ?>"><?php echo e($customerName); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div>
                    <div class="mb-3"><label class="form-label"><?php echo e(__('Score')); ?></label><input type="number" min="0" max="10" name="score" class="form-control" required></div>
                    <div class="mb-3"><label class="form-label"><?php echo e(__('Responded at')); ?></label><input type="datetime-local" name="responded_at" class="form-control"></div>
                    <div class="mb-3"><label class="form-label"><?php echo e(__('Feedback')); ?></label><textarea name="feedback" class="form-control" rows="3"></textarea></div>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Add response')); ?></button></form></div></div>
            <?php endif; ?>
        </div>
        <div class="col-lg-8">
            <div class="card ux-list-card"><div class="card-body table-border-style"><div class="table-responsive"><table class="table"><thead><tr><th><?php echo e(__('Customer')); ?></th><th><?php echo e(__('Score')); ?></th><th><?php echo e(__('Sentiment')); ?></th><th><?php echo e(__('Feedback')); ?></th><th><?php echo e(__('Action')); ?></th></tr></thead><tbody><?php $__empty_2 = true; $__currentLoopData = $responses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $response): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?><tr><td><?php echo e(optional($response->customer)->name ?: __('Anonymous')); ?></td><td><?php echo e($response->score); ?>/10</td><td><span class="badge bg-info"><?php echo e(__(ucfirst($response->sentiment))); ?></span></td><td><?php echo e($response->feedback ?: '-'); ?></td><td class="Action"><?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit nps response')): ?><div class="action-btn me-2"><a href="<?php echo e(route('nps-responses.edit', $response)); ?>" class="mx-3 btn btn-sm bg-info"><i class="ti ti-pencil text-white"></i></a></div><?php endif; ?> <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete nps response')): ?><div class="action-btn"><form method="POST" action="<?php echo e(route('nps-responses.destroy', $response)); ?>" id="delete-nps-response-<?php echo e($response->id); ?>"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><a href="#" class="mx-3 btn btn-sm bg-danger bs-pass-para" data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-nps-response-<?php echo e($response->id); ?>').submit();"><i class="ti ti-trash text-white"></i></a></form></div><?php endif; ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?><tr><td colspan="5" class="text-center text-muted"><?php echo e(__('No responses collected yet.')); ?></td></tr><?php endif; ?></tbody></table></div></div></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/nps_campaigns/show.blade.php ENDPATH**/ ?>
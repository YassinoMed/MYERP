<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Integrations')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Integrations')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        $webhookEvents = \App\Models\Integrations\Webhook::getEvents();
        $webhookMethods = \App\Models\Integrations\Webhook::getMethods();
        $zapierEvents = \App\Models\Integrations\ZapierHook::getEvents();
        $providers = \App\Models\Integrations\Integration::getAvailableProviders();
        $supportedProviders = ['google', 'microsoft', 'slack'];
    ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Connected Apps')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        <?php $__currentLoopData = $supportedProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($providers[$provider])): ?>
                                <form method="POST" action="<?php echo e(route('integrations.connect')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="provider" value="<?php echo e($provider); ?>">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo e(__('Connect')); ?> <?php echo e($providers[$provider]['name']); ?>

                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Provider')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $integrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $integration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e(ucfirst($integration->provider)); ?></td>
                                        <td><?php echo e($integration->is_active ? __('Active') : __('Inactive')); ?></td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('integrations.disconnect')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="provider" value="<?php echo e($integration->provider); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Disconnect')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="3" class="text-muted"><?php echo e(__('No integrations connected.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('API Tokens')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('integrations.tokens.store')); ?>" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Abilities (comma separated)')); ?></label>
                            <input name="abilities" class="form-control" placeholder="* or customers.read,products.read,invoices.read,employees.read">
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create Token')); ?></button>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Abilities')); ?></th>
                                    <th><?php echo e(__('Last Used')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $apiTokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($token->name); ?></td>
                                        <td><?php echo e(is_array($token->abilities) ? implode(', ', $token->abilities) : $token->abilities); ?></td>
                                        <td><?php echo e($token->last_used_at ? $token->last_used_at->format('Y-m-d H:i') : '-'); ?></td>
                                        <td>
                                            <form method="POST" action="<?php echo e(route('integrations.tokens.destroy', $token->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Revoke')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="4" class="text-muted"><?php echo e(__('No tokens created.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Webhooks')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('integrations.webhooks.store')); ?>" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Name')); ?></label>
                            <input name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('URL')); ?></label>
                            <input name="url" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Method')); ?></label>
                            <select name="method" class="form-select" required>
                                <?php $__currentLoopData = $webhookMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($method); ?>"><?php echo e($method); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Events')); ?></label>
                            <div class="d-flex flex-wrap gap-3">
                                <?php $__currentLoopData = $webhookEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventKey => $eventLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="form-check">
                                        <input class="form-check-input" type="checkbox" name="events[]" value="<?php echo e($eventKey); ?>">
                                        <span class="form-check-label"><?php echo e($eventLabel); ?></span>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><?php echo e(__('Secret (optional)')); ?></label>
                            <input name="secret" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create Webhook')); ?></button>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('URL')); ?></th>
                                    <th><?php echo e(__('Events')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $webhooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webhook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($webhook->name); ?></td>
                                        <td><?php echo e($webhook->url); ?></td>
                                        <td><?php echo e(is_array($webhook->events) ? implode(', ', $webhook->events) : ''); ?></td>
                                        <td><?php echo e($webhook->is_active ? __('Active') : __('Inactive')); ?></td>
                                        <td class="d-flex gap-2">
                                            <form method="POST" action="<?php echo e(route('integrations.webhooks.toggle', $webhook->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e(__('Toggle')); ?></button>
                                            </form>
                                            <form method="POST" action="<?php echo e(route('integrations.webhooks.destroy', $webhook->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-muted"><?php echo e(__('No webhooks configured.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><?php echo e(__('Zapier Hooks')); ?></h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('integrations.zapier.store')); ?>" class="mb-4">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-12 col-lg-4 mb-3">
                                <label class="form-label"><?php echo e(__('Name')); ?></label>
                                <input name="name" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-5 mb-3">
                                <label class="form-label"><?php echo e(__('Hook URL')); ?></label>
                                <input name="hook_url" class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-3 mb-3">
                                <label class="form-label"><?php echo e(__('Event')); ?></label>
                                <select name="event" class="form-select" required>
                                    <?php $__currentLoopData = $zapierEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventKey => $eventLabel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($eventKey); ?>"><?php echo e($eventLabel); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create Zapier Hook')); ?></button>
                    </form>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Name')); ?></th>
                                    <th><?php echo e(__('Event')); ?></th>
                                    <th><?php echo e(__('URL')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_2 = true; $__currentLoopData = $zapierHooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <tr>
                                        <td><?php echo e($hook->name); ?></td>
                                        <td><?php echo e($hook->event); ?></td>
                                        <td><?php echo e($hook->hook_url); ?></td>
                                        <td><?php echo e($hook->is_active ? __('Active') : __('Inactive')); ?></td>
                                        <td class="d-flex gap-2">
                                            <form method="POST" action="<?php echo e(route('integrations.zapier.toggle', $hook->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>
                                                <button type="submit" class="btn btn-secondary btn-sm"><?php echo e(__('Toggle')); ?></button>
                                            </form>
                                            <form method="POST" action="<?php echo e(route('integrations.zapier.destroy', $hook->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm"><?php echo e(__('Delete')); ?></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <tr>
                                        <td colspan="5" class="text-muted"><?php echo e(__('No Zapier hooks configured.')); ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/integrations/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title', __('Security Center')); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12 mb-3 d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div>
            <h5 class="mb-1"><?php echo e(__('Security Operations')); ?></h5>
            <p class="text-muted mb-0"><?php echo e(__('Manage access scope, two-factor protection, session hygiene and sensitive activity from one workspace.')); ?></p>
        </div>
        <div class="d-flex gap-2 flex-wrap">
            <form method="POST" action="<?php echo e(route('core.security.cache.warm')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-light"><?php echo e(__('Warm Cache')); ?></button></form>
            <form method="POST" action="<?php echo e(route('core.security.cache.flush')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-outline-secondary"><?php echo e(__('Flush Cache')); ?></button></form>
            <form method="POST" action="<?php echo e(route('core.security.sessions.revoke-all')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-outline-danger"><?php echo e(__('Revoke All Active Sessions')); ?></button></form>
            <form method="POST" action="<?php echo e(route('core.security.scan')); ?>">
                <?php echo csrf_field(); ?>
                <button class="btn btn-primary"><?php echo e(__('Scan Data Quality')); ?></button>
            </form>
        </div>
    </div>

    <div class="col-12 mb-3">
        <div class="row g-3">
            <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted small"><?php echo e(__('Active sessions')); ?></div><div class="h4 mb-0"><?php echo e($sessionSummary['active'] ?? 0); ?></div></div></div></div>
            <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted small"><?php echo e(__('Closed sessions')); ?></div><div class="h4 mb-0"><?php echo e($sessionSummary['closed'] ?? 0); ?></div></div></div></div>
            <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted small"><?php echo e(__('Sensitive logs')); ?></div><div class="h4 mb-0"><?php echo e($sessionSummary['sensitive_logs'] ?? 0); ?></div></div></div></div>
            <div class="col-md-3"><div class="card"><div class="card-body"><div class="text-muted small"><?php echo e(__('Cached references')); ?></div><div class="h4 mb-0"><?php echo e(array_sum($cacheSummary ?? [])); ?></div></div></div></div>
        </div>
    </div>

    <div class="col-xl-7">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?php echo e(__('Active Sessions')); ?></h5>
                <span class="badge bg-light text-dark"><?php echo e($sessions->count()); ?> <?php echo e(__('tracked')); ?></span>
            </div>
            <div class="card-body table-border-style">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Context')); ?></th>
                        <th><?php echo e(__('Last Seen')); ?></th>
                        <th class="text-end"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td>
                                <div class="fw-semibold"><?php echo e(optional($session->user)->name ?: ('#'.$session->user_id)); ?></div>
                                <small class="text-muted"><?php echo e(optional($session->user)->email); ?></small>
                            </td>
                            <td>
                                <div><?php echo e($session->ip_address ?: __('Unknown IP')); ?></div>
                                <small class="text-muted text-break"><?php echo e(\Illuminate\Support\Str::limit($session->user_agent, 60)); ?></small>
                            </td>
                            <td>
                                <div><?php echo e(optional($session->last_seen_at)->diffForHumans()); ?></div>
                                <small class="text-muted"><?php echo e(optional($session->login_at)->format('Y-m-d H:i')); ?></small>
                            </td>
                            <td class="text-end">
                                <?php if($session->is_active): ?>
                                    <div class="d-inline-flex gap-2">
                                    <form method="POST" action="<?php echo e(route('core.security.session.revoke', $session)); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-sm btn-outline-danger"><?php echo e(__('Revoke')); ?></button>
                                    </form>
                                    <form method="POST" action="<?php echo e(route('core.security.user-sessions.revoke', $session->user_id)); ?>" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-sm btn-light"><?php echo e(__('Revoke User Sessions')); ?></button>
                                    </form>
                                    </div>
                                <?php else: ?>
                                    <span class="badge bg-light text-muted"><?php echo e(__('Closed')); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="4" class="text-center text-muted"><?php echo e(__('No session logs yet.')); ?></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Sensitive Access Logs')); ?></h5></div>
            <div class="card-body table-border-style">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Action')); ?></th>
                        <th><?php echo e(__('Resource')); ?></th>
                        <th><?php echo e(__('When')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $accessLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td><?php echo e($log->action); ?></td>
                            <td><?php echo e(class_basename($log->resource_type)); ?>#<?php echo e($log->resource_id); ?></td>
                            <td><?php echo e(optional($log->created_at)->diffForHumans()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="3" class="text-center text-muted"><?php echo e(__('No sensitive access logs yet.')); ?></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Data Quality Issues')); ?></h5></div>
            <div class="card-body table-border-style">
                <table class="table">
                    <thead>
                    <tr>
                        <th><?php echo e(__('Module')); ?></th>
                        <th><?php echo e(__('Issue')); ?></th>
                        <th class="text-end"><?php echo e(__('Action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_0 = true; $__currentLoopData = $issues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <tr>
                            <td><?php echo e($issue->module); ?></td>
                            <td><?php echo e($issue->issue_type); ?></td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <form method="POST" action="<?php echo e(route('core.security.issue.archive', $issue)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-light"><?php echo e(__('Archive')); ?></button></form>
                                    <form method="POST" action="<?php echo e(route('core.security.issue.merge', $issue)); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-warning"><?php echo e(__('Merge')); ?></button></form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <tr><td colspan="3" class="text-center text-muted"><?php echo e(__('No data quality issues found.')); ?></td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-xl-5">
        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Cache Snapshot')); ?></h5></div>
            <div class="card-body">
                <div class="row g-2">
                    <?php $__currentLoopData = $cacheSummary; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segment => $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6">
                            <div class="border rounded p-2 d-flex justify-content-between align-items-center">
                                <span class="text-capitalize"><?php echo e(str_replace('_', ' ', $segment)); ?></span>
                                <span class="badge bg-light text-dark"><?php echo e($count); ?></span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Access Scopes')); ?></h5></div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('core.security.scope.store')); ?>" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label"><?php echo e(__('User')); ?></label>
                            <select name="user_id" class="form-control" required>
                                <option value=""><?php echo e(__('Select user')); ?></option>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?> (<?php echo e($user->email); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label"><?php echo e(__('Scope type')); ?></label>
                            <select name="scope_type" class="form-control js-scope-type" required>
                                <option value="branch"><?php echo e(__('Branch')); ?></option>
                                <option value="warehouse"><?php echo e(__('Warehouse')); ?></option>
                                <option value="department"><?php echo e(__('Department / Service')); ?></option>
                                <option value="service"><?php echo e(__('Catalog Service')); ?></option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label"><?php echo e(__('Scope IDs')); ?></label>
                            <select name="scope_ids[]" class="form-control js-scope-ids" multiple required size="8">
                                <?php $__currentLoopData = $accessScopeOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $options): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" data-scope-type="<?php echo e($type); ?>"><?php echo e(ucfirst($type)); ?>: <?php echo e($label); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <small class="text-muted"><?php echo e(__('If no scope exists for a type, the user keeps unrestricted access for that type.')); ?></small>
                        </div>
                        <div class="col-md-12 mb-2">
                            <input type="text" name="notes" class="form-control" placeholder="<?php echo e(__('Notes')); ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary"><?php echo e(__('Save Scope Rules')); ?></button>
                </form>
                <div class="accordion" id="scopeAccordion">
                    <?php $__empty_0 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo e($user->id); ?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($user->id); ?>">
                                    <?php echo e($user->name); ?> <span class="ms-2 text-muted small"><?php echo e($user->email); ?></span>
                                </button>
                            </h2>
                            <div id="collapse<?php echo e($user->id); ?>" class="accordion-collapse collapse" data-bs-parent="#scopeAccordion">
                                <div class="accordion-body">
                                    <?php ($userScopes = $accessScopes->get($user->id, collect())); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $userScopes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scope): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="d-flex justify-content-between align-items-center border rounded p-2 mb-2">
                                            <div>
                                                <div class="fw-semibold"><?php echo e(ucfirst($scope->scope_type)); ?></div>
                                                <small class="text-muted"><?php echo e($scopeMeta[$scope->scope_type][$scope->scope_id] ?? ($scope->scope_type.' #'.$scope->scope_id)); ?></small>
                                            </div>
                                            <form method="POST" action="<?php echo e(route('core.security.scope.destroy', $scope)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-outline-danger"><?php echo e(__('Remove')); ?></button>
                                            </form>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="text-muted"><?php echo e(__('No scoped restrictions configured.')); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <div class="text-muted"><?php echo e(__('No users available for scope assignment.')); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('2FA & IP Restrictions')); ?></h5></div>
            <div class="card-body">
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="fw-semibold"><?php echo e(__('Two-factor authentication')); ?></div>
                            <small class="text-muted">
                                <?php if($twoFactor): ?>
                                    <?php echo e(__('Enabled via :provider', ['provider' => strtoupper($twoFactor->provider)])); ?>

                                    <span class="d-block mt-1"><?php echo e(__('Configured on :date', ['date' => optional($twoFactor->enabled_at)->format('Y-m-d H:i')])); ?></span>
                                <?php else: ?>
                                    <?php echo e(__('Not configured')); ?>

                                <?php endif; ?>
                            </small>
                        </div>
                        <span class="badge <?php echo e($twoFactor ? 'bg-success' : 'bg-light text-dark'); ?>"><?php echo e($twoFactor ? __('Active') : __('Inactive')); ?></span>
                    </div>
                    <form method="POST" action="<?php echo e(route('core.security.twofactor.store')); ?>" class="mt-3">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <select name="provider" class="form-control">
                                    <option value="email"><?php echo e(__('Email')); ?></option>
                                    <option value="totp"><?php echo e(__('TOTP')); ?></option>
                                    <option value="sms"><?php echo e(__('SMS')); ?></option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" name="secret" class="form-control" placeholder="<?php echo e(__('Secret / code seed')); ?>">
                            </div>
                        </div>
                        <button class="btn btn-primary"><?php echo e($twoFactor ? __('Update 2FA') : __('Enable 2FA')); ?></button>
                    </form>
                    <?php if($twoFactor): ?>
                        <form method="POST" action="<?php echo e(route('core.security.twofactor.verify')); ?>" class="mt-3">
                            <?php echo csrf_field(); ?>
                            <div class="input-group">
                                <input type="text" name="code" class="form-control" placeholder="<?php echo e(__('Enter verification or backup code')); ?>">
                                <button class="btn btn-outline-primary"><?php echo e(__('Verify')); ?></button>
                            </div>
                        </form>
                        <?php if(!empty($twoFactor->backup_codes)): ?>
                            <div class="mt-3">
                                <div class="fw-semibold mb-2"><?php echo e(__('Backup codes')); ?> <span class="text-muted small">(<?php echo e(count($twoFactor->backup_codes)); ?> <?php echo e(__('remaining')); ?>)</span></div>
                                <div class="d-flex flex-wrap gap-2">
                                    <?php $__currentLoopData = $twoFactor->backup_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge bg-light text-dark"><?php echo e($code); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="d-flex gap-2 flex-wrap mt-2">
                            <form method="POST" action="<?php echo e(route('core.security.twofactor.backup')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-light"><?php echo e(__('Regenerate backup codes')); ?></button></form>
                            <form method="POST" action="<?php echo e(route('core.security.twofactor.disable')); ?>"><?php echo csrf_field(); ?> <button class="btn btn-sm btn-outline-danger"><?php echo e(__('Disable 2FA')); ?></button></form>
                        </div>
                    <?php endif; ?>
                </div>

                <form method="POST" action="<?php echo e(route('core.security.ip.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 mb-2"><input type="text" name="ip_address" class="form-control" placeholder="<?php echo e(__('IP address')); ?>"></div>
                        <div class="col-md-6 mb-2"><input type="text" name="description" class="form-control" placeholder="<?php echo e(__('Description')); ?>"></div>
                        <div class="col-md-6 mb-2"><input type="datetime-local" name="expires_at" class="form-control"></div>
                        <div class="col-md-6 mb-2">
                            <div class="form-check pt-2">
                                <input class="form-check-input" type="checkbox" name="is_whitelist" value="1" checked>
                                <label class="form-check-label"><?php echo e(__('Whitelist')); ?></label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-secondary"><?php echo e(__('Add IP Restriction')); ?></button>
                </form>

                <hr>
                <ul class="list-group">
                    <?php $__empty_0 = true; $__currentLoopData = $ipRestrictions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restriction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><?php echo e($restriction->ip_address); ?> <span class="text-muted">(<?php echo e($restriction->description); ?>)</span></span>
                            <span class="badge <?php echo e($restriction->is_whitelist ? 'bg-success' : 'bg-danger'); ?>"><?php echo e($restriction->is_whitelist ? __('Allow') : __('Block')); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                        <li class="list-group-item text-muted"><?php echo e(__('No IP rules configured.')); ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header"><h5 class="mb-0"><?php echo e(__('Archive Registry')); ?></h5></div>
            <div class="card-body">
                <form method="POST" action="<?php echo e(route('core.security.archive.store')); ?>" class="mb-4">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label class="form-label"><?php echo e(__('Record type')); ?></label>
                            <select name="record_type" class="form-control js-archive-type" required>
                                <option value="customer"><?php echo e(__('Customer')); ?></option>
                                <option value="vender"><?php echo e(__('Vendor')); ?></option>
                                <option value="product_service"><?php echo e(__('Product / Service')); ?></option>
                                <option value="patient"><?php echo e(__('Patient')); ?></option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <label class="form-label"><?php echo e(__('Record')); ?></label>
                            <select name="record_id" class="form-control js-archive-records" required size="8">
                                <?php $__currentLoopData = $archiveOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $records): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($id); ?>" data-archive-type="<?php echo e($type); ?>"><?php echo e($label); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-12 mb-2">
                            <textarea name="reason" class="form-control" rows="3" placeholder="<?php echo e(__('Reason for archival')); ?>"></textarea>
                        </div>
                    </div>
                    <button class="btn btn-outline-dark"><?php echo e(__('Archive Record')); ?></button>
                </form>

                <div class="table-border-style">
                    <table class="table">
                        <thead>
                        <tr>
                            <th><?php echo e(__('Record')); ?></th>
                            <th><?php echo e(__('Archived')); ?></th>
                            <th class="text-end"><?php echo e(__('Action')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_0 = true; $__currentLoopData = $archivedRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archivedRecord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_0 = false; ?>
                            <tr>
                                <td>
                                    <div class="fw-semibold"><?php echo e($archivedRecord->display_name ?: (class_basename($archivedRecord->record_type).'#'.$archivedRecord->record_id)); ?></div>
                                    <small class="text-muted"><?php echo e(class_basename($archivedRecord->record_type)); ?>#<?php echo e($archivedRecord->record_id); ?></small>
                                    <?php if($archivedRecord->reason): ?>
                                        <div class="small text-muted mt-1"><?php echo e($archivedRecord->reason); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div><?php echo e(optional($archivedRecord->archived_at)->diffForHumans()); ?></div>
                                    <?php if($archivedRecord->restored_at): ?>
                                        <small class="text-success"><?php echo e(__('Restored :date', ['date' => $archivedRecord->restored_at->format('Y-m-d H:i')])); ?></small>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?php if(!$archivedRecord->restored_at): ?>
                                        <form method="POST" action="<?php echo e(route('core.security.archive.restore', $archivedRecord)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-sm btn-outline-primary"><?php echo e(__('Restore')); ?></button>
                                        </form>
                                    <?php else: ?>
                                        <span class="badge bg-light text-success"><?php echo e(__('Restored')); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_0): ?>
                            <tr><td colspan="3" class="text-center text-muted"><?php echo e(__('No archived records tracked yet.')); ?></td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const scopeType = document.querySelector('.js-scope-type');
    const scopeIds = document.querySelector('.js-scope-ids');
    const archiveType = document.querySelector('.js-archive-type');
    const archiveRecords = document.querySelector('.js-archive-records');

    if (!scopeType || !scopeIds) {
        return;
    }

    const syncScopeOptions = () => {
        const activeType = scopeType.value;
        Array.from(scopeIds.options).forEach((option) => {
            const visible = option.dataset.scopeType === activeType;
            option.hidden = !visible;
            if (!visible) {
                option.selected = false;
            }
        });
    };

    scopeType.addEventListener('change', syncScopeOptions);
    syncScopeOptions();

    const syncArchiveOptions = () => {
        if (!archiveType || !archiveRecords) {
            return;
        }

        const activeType = archiveType.value;
        Array.from(archiveRecords.options).forEach((option) => {
            const visible = option.dataset.archiveType === activeType;
            option.hidden = !visible;
            if (!visible) {
                option.selected = false;
            }
        });

        const firstVisible = Array.from(archiveRecords.options).find((option) => !option.hidden);
        if (firstVisible) {
            firstVisible.selected = true;
        }
    };

    if (archiveType && archiveRecords) {
        archiveType.addEventListener('change', syncArchiveOptions);
        syncArchiveOptions();
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/core_security/index.blade.php ENDPATH**/ ?>
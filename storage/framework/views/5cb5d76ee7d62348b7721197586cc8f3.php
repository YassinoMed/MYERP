<style>
    .plan-modal-shell {
        --plan-card: #ffffff;
        --plan-border: rgba(20, 30, 45, 0.08);
        --plan-text: #142235;
        --plan-muted: #617185;
    }

    .plan-modal-shell {
        background: linear-gradient(180deg, #fbfaf6 0%, #f5f7fb 100%);
        border-radius: 24px;
        padding: 0.35rem;
    }

    .plan-modal-hero {
        background: linear-gradient(135deg, #132238 0%, #1f4b6e 100%);
        color: #fff;
        border-radius: 22px;
        padding: 1.2rem 1.25rem;
        margin-bottom: 1rem;
    }

    .plan-modal-hero h4 {
        margin: 0;
        font-size: 1.2rem;
        font-weight: 700;
        letter-spacing: -0.03em;
    }

    .plan-modal-hero p {
        margin: 0.4rem 0 0;
        color: rgba(255,255,255,0.78);
        font-size: 0.92rem;
    }

    .plan-section-card {
        background: var(--plan-card);
        border: 1px solid var(--plan-border);
        border-radius: 22px;
        padding: 1rem;
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.05);
        margin-bottom: 1rem;
    }

    .plan-section-head {
        margin-bottom: 0.9rem;
    }

    .plan-section-head h5 {
        margin: 0;
        color: var(--plan-text);
        font-size: 1rem;
        font-weight: 700;
    }

    .plan-section-head p {
        margin: 0.25rem 0 0;
        color: var(--plan-muted);
        font-size: 0.84rem;
    }

    .plan-modal-shell .form-control,
    .plan-modal-shell .form-select,
    .plan-modal-shell .input-group-text {
        border-radius: 14px;
    }

    .plan-switch-grid .form-group {
        margin-bottom: 0;
    }

    .plan-switch-grid .form-check {
        border: 1px solid var(--plan-border);
        border-radius: 18px;
        padding: 0.9rem 0.95rem 0.9rem 2.8rem;
        background: #fafbfc;
        min-height: 100%;
    }

    .plan-switch-grid .form-check-label {
        color: var(--plan-text);
        font-weight: 600;
    }
</style>
    <?php echo e(Form::model($plan, array('route' => array('plans.update', $plan->id), 'method' => 'PUT', 'enctype' => "multipart/form-data", 'class'=>'needs-validation', 'novalidate'))); ?>

    <div class="modal-body">
        <div class="plan-modal-shell">
        <div id="collab-indicator" class="collab-indicator mb-3" data-collab-resource="plan" data-collab-id="<?php echo e($plan->id); ?>" data-collab-label="<?php echo e($plan->name); ?>"></div>
        
        <?php
            $settings = \App\Models\Utility::settings();
        ?>
        <?php if(!empty($settings['chat_gpt_key'])): ?>
        <div class="text-end">
            <a href="#" data-size="md" class="btn  btn-primary btn-icon btn-sm" data-ajax-popup-over="true" data-url="<?php echo e(route('generate',['plan'])); ?>"
               data-bs-placement="top" data-title="<?php echo e(__('Generate content with AI')); ?>">
                <i class="fas fa-robot"></i> <span><?php echo e(__('Generate with AI')); ?></span>
            </a>
        </div>
        <?php endif; ?>
        
        <div class="plan-modal-hero">
            <h4><?php echo e(__('Edit Subscription Plan')); ?></h4>
            <p><?php echo e(__('Adjust quotas, commercial rules and ERP access without losing the current plan structure.')); ?></p>
        </div>

    <div class="row">
        <div class="col-12">
            <div class="plan-section-card">
                <div class="plan-section-head">
                    <h5><?php echo e(__('Core Information')); ?></h5>
                    <p><?php echo e(__('Commercial identity, billing cycle and operating limits.')); ?></p>
                </div>
                <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <?php echo e(Form::text('name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Plan Name'),'required'=>'required'))); ?>

        </div>
        <?php if($plan->id != 1): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('price',__('Price'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                <?php echo e(Form::number('price',null,array('class'=>'form-control','placeholder'=>__('Enter Plan Price'),'required'=>'required' ,'step' => '0.01'))); ?>

            </div>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('duration', __('Duration'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
                <?php echo Form::select('duration', $arrDuration, null,array('class' => 'form-control select','required'=>'required')); ?>

            </div>
        <?php endif; ?>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('max_users',__('Maximum Users'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <?php echo e(Form::number('max_users',null,array('class'=>'form-control','required'=>'required', 'placeholder' => __('Enter Maximum Users')))); ?>

            <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('max_customers',__('Maximum Customers'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <?php echo e(Form::number('max_customers',null,array('class'=>'form-control','required'=>'required', 'placeholder' => __('Enter Maximum Customers')))); ?>

            <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('max_venders',__('Maximum Venders'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <?php echo e(Form::number('max_venders',null,array('class'=>'form-control','required'=>'required', 'placeholder' => __('Enter Maximum Vendors')))); ?>

            <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('max_clients',__('Maximum Clients'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <?php echo e(Form::number('max_clients',null,array('class'=>'form-control','required'=>'required', 'placeholder' => __('Enter Maximum Clients')))); ?>

            <span class="small"><?php echo e(__('Note: "-1" for Unlimited')); ?></span>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('storage_limit', __('Storage limit'), ['class' => 'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbba606fec37ea04333bc269e3e165587 = $attributes; } ?>
<?php $component = App\View\Components\Required::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('required'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Required::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $attributes = $__attributesOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__attributesOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbba606fec37ea04333bc269e3e165587)): ?>
<?php $component = $__componentOriginalbba606fec37ea04333bc269e3e165587; ?>
<?php unset($__componentOriginalbba606fec37ea04333bc269e3e165587); ?>
<?php endif; ?>
            <div class="input-group">
                <?php echo e(Form::number('storage_limit', null,array('class'=>'form-control','required'=>'required', 'placeholder' => __('Maximum Storage Limit')))); ?>

                <div class="input-group-append">
                <span class="input-group-text"
                      id="basic-addon2"><?php echo e(__('MB')); ?></span>
                </div>
            </div>
        </div>


        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-label'])); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'2', 'placeholder' => __('Enter Description')]); ?>

        </div>
                </div>
            </div>
        </div>
        <?php if($plan->id != 1): ?>
        <div class="col-12">
            <div class="plan-section-card">
                <div class="plan-section-head">
                    <h5><?php echo e(__('Commercial Rules')); ?></h5>
                    <p><?php echo e(__('Enable or disable trial logic and adjust duration.')); ?></p>
                </div>
                <div class="row align-items-end">
                    <div class="col-md-6">
                        <label class="form-check-label" for="trial"></label>
                        <div class="form-group">
                            <label for="trial" class="form-label"><?php echo e(__('Trial is enable(on/off)')); ?></label>
                            <div class="form-check form-switch custom-switch-v1 float-end">
                                <input type="checkbox" name="trial" class="form-check-input input-primary pointer" value="1" id="trial"  <?php echo e($plan['trial'] == 1 ? 'checked="checked"' : ''); ?>>
                                <label class="form-check-label" for="trial"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="form-group plan_div  <?php echo e($plan['trial'] == 1 ? 'd-block' : 'd-none'); ?>">
                            <?php echo e(Form::label('trial_days', __('Trial Days'), ['class' => 'form-label'])); ?>

                            <?php echo e(Form::number('trial_days',null, ['class' => 'form-control trial_days','placeholder' => __('Enter Trial days'),'step' => '1','min'=>'1'])); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-12">
            <div class="plan-section-card">
                <div class="plan-section-head">
                    <h5><?php echo e(__('Module Access')); ?></h5>
                    <p><?php echo e(__('Toggle included ERP domains for this offer.')); ?></p>
                </div>
                <div class="row g-3 plan-switch-grid">
        <div class="form-group col-md-3 mt-2">
            <div class="form-check form-switch ">
                <input type="checkbox" class="form-check-input" name="enable_crm" id="enable_crm" <?php echo e($plan['crm'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_crm"><?php echo e(__('CRM')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3 mt-2">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_project" id="enable_project" <?php echo e($plan['project'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_project"><?php echo e(__('Project')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3 mt-2">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hrm" id="enable_hrm" <?php echo e($plan['hrm'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hrm"><?php echo e(__('HRM')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3 mt-2">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_account" id="enable_account" <?php echo e($plan['account'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_account"><?php echo e(__('Account')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_pos" id="enable_pos" <?php echo e($plan['pos'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_pos"><?php echo e(__('POS')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_chatgpt" id="enable_chatgpt" <?php echo e($plan['chatgpt'] == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_chatgpt"><?php echo e(__('Chat GPT')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_production" id="enable_production" <?php echo e(($plan['production'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_production"><?php echo e(__('Production')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_integrations" id="enable_integrations" <?php echo e(($plan['integrations'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_integrations"><?php echo e(__('Integrations')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_sales" id="enable_sales" <?php echo e(($plan['sales'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_sales"><?php echo e(__('Sales')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_wms" id="enable_wms" <?php echo e(($plan['wms'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_wms"><?php echo e(__('WMS')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_mrp" id="enable_mrp" <?php echo e(($plan['mrp'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_mrp"><?php echo e(__('MRP')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_quality" id="enable_quality" <?php echo e(($plan['quality'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_quality"><?php echo e(__('Quality')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_maintenance" id="enable_maintenance" <?php echo e(($plan['maintenance'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_maintenance"><?php echo e(__('Maintenance')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_enterprise_accounting" id="enable_enterprise_accounting" <?php echo e(($plan['enterprise_accounting'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_enterprise_accounting"><?php echo e(__('Enterprise Accounting')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_approvals" id="enable_approvals" <?php echo e(($plan['approvals'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_approvals"><?php echo e(__('Approvals')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hr_ops" id="enable_hr_ops" <?php echo e(($plan['hr_ops'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hr_ops"><?php echo e(__('HR Ops')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_saas" id="enable_saas" <?php echo e(($plan['saas'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_saas"><?php echo e(__('SaaS')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hotel" id="enable_hotel" <?php echo e(($plan['hotel'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hotel"><?php echo e(__('Hotel')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_traceability" id="enable_traceability" <?php echo e(($plan['traceability'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_traceability"><?php echo e(__('Traceability')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_crop_planning" id="enable_crop_planning" <?php echo e(($plan['crop_planning'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_crop_planning"><?php echo e(__('Crop Planning')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_cooperative" id="enable_cooperative" <?php echo e(($plan['cooperative'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_cooperative"><?php echo e(__('Cooperative')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hedging" id="enable_hedging" <?php echo e(($plan['hedging'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hedging"><?php echo e(__('Hedging')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_agri_operations" id="enable_agri_operations" <?php echo e(($plan['agri_operations'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_agri_operations"><?php echo e(__('Agri Operations')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_btp_site_tracking" id="enable_btp_site_tracking" <?php echo e(($plan['btp_site_tracking'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_btp_site_tracking"><?php echo e(__('BTP Site Tracking')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_btp_subcontractors" id="enable_btp_subcontractors" <?php echo e(($plan['btp_subcontractors'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_btp_subcontractors"><?php echo e(__('BTP Subcontractors')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_btp_price_breakdowns" id="enable_btp_price_breakdowns" <?php echo e(($plan['btp_price_breakdowns'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_btp_price_breakdowns"><?php echo e(__('BTP Price Breakdown')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_btp_equipment_control" id="enable_btp_equipment_control" <?php echo e(($plan['btp_equipment_control'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_btp_equipment_control"><?php echo e(__('BTP Equipment Control')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_board_meeting" id="enable_board_meeting" <?php echo e(($plan['board_meeting'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_board_meeting"><?php echo e(__('Board Meetings')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_cap_table" id="enable_cap_table" <?php echo e(($plan['cap_table'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_cap_table"><?php echo e(__('Cap Table')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_subsidiary" id="enable_subsidiary" <?php echo e(($plan['subsidiary'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_subsidiary"><?php echo e(__('Subsidiaries')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_customer_recovery" id="enable_customer_recovery" <?php echo e(($plan['customer_recovery'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_customer_recovery"><?php echo e(__('Customer Recovery')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_visitor" id="enable_visitor" <?php echo e(($plan['visitor'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_visitor"><?php echo e(__('Visitors')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_innovation_idea" id="enable_innovation_idea" <?php echo e(($plan['innovation_idea'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_innovation_idea"><?php echo e(__('Innovation Ideas')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_knowledge_base" id="enable_knowledge_base" <?php echo e(($plan['knowledge_base'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_knowledge_base"><?php echo e(__('Knowledge Base')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_document_repository" id="enable_document_repository" <?php echo e(($plan['document_repository'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_document_repository"><?php echo e(__('Document Repository')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_medical_service" id="enable_medical_service" <?php echo e(($plan['medical_service'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_medical_service"><?php echo e(__('Medical Services')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_medical_invoice" id="enable_medical_invoice" <?php echo e(($plan['medical_invoice'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_medical_invoice"><?php echo e(__('Medical Billing')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_pharmacy_medication" id="enable_pharmacy_medication" <?php echo e(($plan['pharmacy_medication'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_pharmacy_medication"><?php echo e(__('Pharmacy Stock')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_pharmacy_dispensation" id="enable_pharmacy_dispensation" <?php echo e(($plan['pharmacy_dispensation'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_pharmacy_dispensation"><?php echo e(__('Pharmacy Dispensing')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hospital_room" id="enable_hospital_room" <?php echo e(($plan['hospital_room'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hospital_room"><?php echo e(__('Hospital Rooms')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hospital_bed" id="enable_hospital_bed" <?php echo e(($plan['hospital_bed'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hospital_bed"><?php echo e(__('Hospital Beds')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_hospital_admission" id="enable_hospital_admission" <?php echo e(($plan['hospital_admission'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_hospital_admission"><?php echo e(__('Hospital Admissions')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_medical_operations" id="enable_medical_operations" <?php echo e(($plan['medical_operations'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_medical_operations"><?php echo e(__('Advanced Medical Ops')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_delivery_note" id="enable_delivery_note" <?php echo e(($plan['delivery_note'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_delivery_note"><?php echo e(__('Delivery Notes')); ?></label>
            </div>
        </div>
        <div class="form-group col-md-3">
            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="enable_retail_operations" id="enable_retail_operations" <?php echo e(($plan['retail_operations'] ?? 0) == 1 ? 'checked="checked"' : ''); ?>>
                <label class="custom-control-label form-label" for="enable_retail_operations"><?php echo e(__('Retail Operations')); ?></label>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn  btn-primary">
</div>
    <?php echo e(Form::close()); ?>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/plan/edit.blade.php ENDPATH**/ ?>
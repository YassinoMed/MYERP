<?php echo e(Form::open(array('route' => 'custom_page.store', 'method'=>'post', 'enctype' => "multipart/form-data", 'class'=>'needs-validation', 'novalidate'))); ?>

    <div class="modal-body">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="form-group col-md-12">
                <?php echo e(Form::label('name',__('Page Name'),['class'=>'form-label'])); ?><?php if (isset($component)) { $__componentOriginalbba606fec37ea04333bc269e3e165587 = $component; } ?>
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
                <?php echo e(Form::text('menubar_page_name',null,array('class'=>'form-control font-style','placeholder'=>__('Enter Page Name'),'required'=>'required' ))); ?>

            </div>

            <div class="form-group">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="template_name" value="page_content"
                           id="page_content" data-name="page_content">
                    <label class="form-check-label" for="page_content">
                        <?php echo e('Page Content'); ?>

                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="template_name" value="page_url" id="page_url"
                           data-name="page_url">
                    <label class="form-check-label" for="page_url">
                        <?php echo e('Page URL'); ?>

                    </label>
                </div>
            </div>

            <div class="form-group col-md-12 page_url d-none">
                <?php echo e(Form::label('page_url', __('Page URL'), ['class' => 'form-label'])); ?>

                <?php echo e(Form::text('page_url', null, ['class' => 'form-control font-style', 'placeholder' => __('Enter Page URL')])); ?>

            </div>

            <div class="form-group col-md-12 page_content">
                <?php echo e(Form::label('description', __('Page Content'), ['class' => 'form-label'])); ?>

                <?php echo Form::textarea('menubar_page_contant', null, [
                    'class' => 'form-control summernote-simple',
                    'rows' => '5', 'placeholder' => __('Enter Description')
                ]); ?>

            </div>


            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="header" name="header" />
                    <label class="form-check-label f-w-600 pl-1" for="header" ><?php echo e(__('Header')); ?></label>
                </div>
            </div>

            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="footer" name="footer"/>
                    <label class="form-check-label f-w-600 pl-1" for="footer"><?php echo e(__('Footer')); ?></label>
                </div>
            </div>
            <div class="col-lg-2 col-xl-2 col-md-2">
                <div class="form-check form-switch ml-1">
                    <input type="checkbox" class="form-check-input" id="login" name="login" />
                    <label class="form-check-label f-w-600 pl-1" for="login" ><?php echo e(__('Login')); ?></label>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" data-bs-dismiss="modal">
        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
    </div>
<?php echo e(Form::close()); ?>




<script>

  $(document).ready(function() {
      $('input[name="template_name"][id="page_content"]').prop('checked', true);
      $('input[name="template_name"]').change(function() {
          var radioValue = $('input[name="template_name"]:checked').val();
          var page_content = $('.page_content');
          if (radioValue === "page_content") {
              $('.page_content').removeClass('d-none');
              $('.page_url').addClass('d-none');
          } else {
              $('.page_content').addClass('d-none');
              $('.page_url').removeClass('d-none');
          }
      });
  });

</script>

<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/Modules/LandingPage/Resources/views/landingpage/menubar/create.blade.php ENDPATH**/ ?>
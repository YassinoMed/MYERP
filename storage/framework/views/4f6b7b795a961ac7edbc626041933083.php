
<div class="modal-header pb-2 pt-2">
    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e($tracker->project_task); ?> <small>( <?php echo e($tracker->total); ?>, <?php echo e(date('d M',strtotime($tracker->start_time))); ?> )</small></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

    </button>
  </div>
  <div class="modal-body p-3">
      <div class="row ">
        <div class="col-lg-12 product-left mb-5 mb-lg-0">
            <?php if( $images->count() > 0): ?>
            <div class="swiper-container product-slider mb-2 pb-2" style="border-bottom:solid 2px #f2f3f5">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide" id="slide-<?php echo e($image->id); ?>">
                            <img src="<?php echo e(asset(Storage::url($image->img_path))); ?>" alt="..."  class="img-fluid">
                            <div class="time_in_slider"><?php echo e(date('H:i:s, d M ',strtotime($image->time))); ?> |

                                    <!-- <a href="#" class="delete-icon"  data-confirm="<?php echo e(__('Are You Sure?').'|'.__('This action can not be undone. Do you want to continue?')); ?>" data-confirm-yes="document.getElementById('delete-form-<?php echo e($image->id); ?>').submit();">
                                                <i class="ti ti-trash"></i>
                                            </a> -->
                                <div class="action-btn">
                                    <a href="#" class="mt-2 btn btn-sm  align-items-center  bg-danger ms-2 " data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Delete')); ?>" title="<?php echo e(__('Delete')); ?>" onclick="delete_image(<?php echo e($image->id); ?>)" data-confirm-yes="removeImage(<?php echo e($image->id); ?>)">
                                        <i class="ti ti-trash text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

            <div class="swiper-container product-thumbs">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide" id="slide-thum-<?php echo e($image->id); ?>">
                        <img src="<?php echo e(asset(Storage::url($image->img_path))); ?>" alt="..." class="img-fluid">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <?php else: ?>
            <div class="no-image">
                <h5 class="text-muted">Images Not Available .</h5>
            </div>
            <?php endif; ?>
        </div>
      </div>
  </div>
<script type="text/javascript">
function delete_image(id){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "This action can not be undone. Do you want to continue?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            removeImage(id);
        }
    })
}
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/time_trackers/images.blade.php ENDPATH**/ ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Education Certificate')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-button'); ?>
    <a href="#" class="btn btn-sm btn-primary" id="download-certificate"><?php echo e(__('Download')); ?></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-4">
                <div class="card-body" id="certificate-box">
                    <div class="text-center mb-4">
                        <h2><?php echo e(__('Certificate of Completion')); ?></h2>
                        <p class="mb-0"><?php echo e(__('This certifies that')); ?></p>
                        <h4 class="mt-2"><?php echo e($employee ? $employee->name : __('Employee')); ?></h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong><?php echo e(__('Course')); ?>:</strong> <?php echo e($course ? $course->name : '-'); ?></p>
                            <p class="mb-1"><strong><?php echo e(__('Trainer')); ?>:</strong> <?php echo e($trainer ? $trainer->firstname : '-'); ?></p>
                            <p class="mb-1"><strong><?php echo e(__('Issued At')); ?>:</strong> <?php echo e($certificate->issued_at ? $certificate->issued_at->format('d/m/Y') : ''); ?></p>
                            <p class="mb-1"><strong><?php echo e(__('Certificate No')); ?>:</strong> <?php echo e($certificate->certificate_number); ?></p>
                        </div>
                        <div class="col-md-6 text-end">
                            <div class="d-inline-block text-center">
                                <?php echo DNS2D::getBarcodeHTML($certificate->qr_payload, 'QRCODE', 2, 2); ?>

                                <div class="mt-2"><?php echo e(__('Verification QR')); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p><?php echo e(__('Scan the QR code or visit the verification link to validate this certificate.')); ?></p>
                        <p><a href="<?php echo e($certificate->qr_payload); ?>"><?php echo e($certificate->qr_payload); ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        document.getElementById('download-certificate').addEventListener('click', function (event) {
            event.preventDefault();
            var element = document.getElementById('certificate-box');
            var opt = {
                filename: '<?php echo e($certificate->certificate_number); ?>.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.contractheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/education/certificate.blade.php ENDPATH**/ ?>
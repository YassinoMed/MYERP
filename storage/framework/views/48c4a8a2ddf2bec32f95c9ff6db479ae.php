<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Offer Letter')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" >

    <div class="col-lg-10">
        <div class="container">
            <div>
                <div class="card mt-5" id="printTable" style="margin-left: 200px;margin-right: -57px;">

                    <div class="card-body"  id="boxes">
                            <div class="row invoice-title mt-2">
                                <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12 ">
                                    
                                </div>

                                <p data-v-f2a183a6="">
                                    <div style="padding-left: 40px"><?php echo $Offerletter->content; ?></div>
                                    
                                </p>


                        </div>
                 </div>
            </div>
        </div>
    </div>


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script>
        function closeScript() {
            setTimeout(function () {
                window.open(window.location, '_self').close();
            }, 1000);
        }

        $(window).on('load', function () {
            var element = document.getElementById('boxes');
            var opt = {
                filename: '<?php echo e($name->name); ?>',
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A4'}
            };

            html2pdf().set(opt).from(element).save().then(closeScript);
        });


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.contractheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/jobApplication/template/offerletterpdf.blade.php ENDPATH**/ ?>
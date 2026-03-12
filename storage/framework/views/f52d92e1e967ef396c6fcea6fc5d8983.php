<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Experience Certificate')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row" >

    <div class="col-lg-10">
        <div class="container">
            <div>
                <div class="card mt-5" id="printTable" style="margin-left: 180px;margin-right: -57px;">

                    <div class="card-body" id="exportContent">
                            <div class="row invoice-title mt-2">
                                <div class="col-xs-12 col-sm-12 col-nd-6 col-lg-6 col-12 ">
                                    
                                </div>

                                <p data-v-f2a183a6="" >
                                    <div><?php echo $experience_certificate->content; ?></div>
                                    
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




                    var filename = '<?php echo e($employees->name); ?>';
                    var element = 'exportContent';
                    var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
                    var postHtml = "</body></html>";
                    var html = preHtml+document.getElementById(element).innerHTML+postHtml;

                    var blob = new Blob(['\ufeff', html], {
                        type: 'application/msword'
                    });

                    // Specify link url
                    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);

                    // Specify file name
                    filename = filename?filename+'.doc':'document.doc';

                    // Create download link element
                    var downloadLink = document.createElement("a");

                    document.body.appendChild(downloadLink);

                    if(navigator.msSaveOrOpenBlob ){
                        navigator.msSaveOrOpenBlob(blob, filename);
                    }else{
                        // Create a link to the file
                        downloadLink.href = url;

                        // Setting the file name
                        downloadLink.download = filename;

                        //triggering the function
                        downloadLink.click();
                    }

                    document.body.removeChild(downloadLink);

            });


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.contractheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/employee/template/ExpCertificatedocx.blade.php ENDPATH**/ ?>
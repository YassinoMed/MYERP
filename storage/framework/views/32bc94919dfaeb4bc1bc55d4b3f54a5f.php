<?php echo e(Form::open(array('method'=>'post', 'enctype' => "multipart/form-data", 'id' => 'upload_form', 'class' => 'needs-validation', 'novalidate'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="col-md-12 mb-6">
            <?php echo e(Form::label('file',__('Download sample employee attendance CSV file'),['class'=>'form-label'])); ?>

            <a href="<?php echo e(asset(Storage::url('uploads/sample')).'/sample_attendance.csv'); ?>" download="" class="btn btn-sm btn-primary">
                <i class="ti ti-download"></i> <?php echo e(__('Download')); ?>

            </a>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::label('file',__('Select CSV File'),['class'=>'form-label'])); ?>

            <div class="choose-file form-group">
                <label for="file" class="form-label">
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
                <input type="hidden" class="form-control" name="table" id="table" value="attendance_employees">
            </div>
        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-secondary" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Upload')); ?>" class="btn  btn-primary">

    <a href="" data-url="" data-ajax-popup-over="true" title="<?php echo e(__('Create')); ?>" data-size="xl" data-title="<?php echo e(__('Import Attendance CSV Data')); ?>"  class="d-none import_modal_show"></a>
</div>
<?php echo e(Form::close()); ?>




<script>
    $('#upload_form').on('submit', function(event) {
        event.preventDefault();
        let data = new FormData(this);
        data.append('_token', "<?php echo e(csrf_token()); ?>");
        let table = $("#table").val();
        $.ajax({
            url: "<?php echo e(route('csv.import')); ?>",
            method: "POST",
            data: data,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                if (data.error != '')
                {
                    show_toastr('Error',data.error, 'error');
                } else {
                    let url = "<?php echo e(route('csv.import.modal')); ?>";
                    $('#commonModal').modal('hide');
                    $(".import_modal_show").attr("data-url", url + "?&table=" + table + "&status=" + true);
                    $(".import_modal_show").trigger( "click");
                    setTimeout(function() {
                        SetDynamicData(data.output, data.fields);
                    }, 700);
                }
            }
        });

    });

</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/attendance/import.blade.php ENDPATH**/ ?>
<div class="modal-body">
    <div class="row">
        <div class="col-12">
            <div id="process_area" class="overflow-auto import-data-table">
            </div>
        </div>
        <div class="form-group col-12 d-flex justify-content-end col-form-label">
            <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary cancel" data-bs-dismiss="modal">
            <button type="submit" name="import" id="import" class="btn btn-primary ms-2" disabled><?php echo e(__('Import')); ?></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var total_selection = 0;
        var first_name = 0;
        var last_name = 0;
        var email = 0;
        var column_data = [];
        var data = {};

        $('.cancel').on('click', function () {
            location.reload();
        });

        $(document).on('change', '.set_column_data', function() {
            var column_data = {};
            var column_name = $(this).val();
            var column_number = $(this).data('column_number');

            $('.set_column_data').each(function() {
                var col_num = $(this).data('column_number');
                var selected = $(this).val();

                if (selected !== '') {
                    column_data[selected] = col_num;
                }
            });


            $('.set_column_data').each(function() {
                var $this = $(this);
                var col_num = $this.data('column_number');

                $this.find('option').each(function() {
                    var option_value = $(this).val();

                    if (option_value !== '' && option_value in column_data && column_data[option_value] !== col_num) {
                        $(this).prop('hidden', true);
                    } else {
                        $(this).prop('hidden', false);
                    }
                });
            });

            total_selection = Object.keys(column_data).length;

            if (total_selection == 5) {
                $("#import").removeAttr("disabled");
                data = {
                    subject: column_data.subject,
                    name: column_data.name,
                    email: column_data.email,
                    phone: column_data.phone,
                    user: []
                };
            } else {
                $('#import').attr('disabled', 'disabled');
            }
        });

        $(document).on('click', '#import', function(event) {

            event.preventDefault();
            $(".user-name-value").each(function()
            {
                data.user.push($(this).val());
            })
            data._token = "<?php echo e(csrf_token()); ?>";

            $.ajax({
                url: "<?php echo e(route('leads.import.data')); ?>",
                method: "POST",
                data: data,
                beforeSend: function() {
                    $('#import').attr('disabled', 'disabled');
                    $('#import').text('Importing...');
                },
                success: function(data) {
                    if (data.success == false) {
                        show_toastr('Error', data.message, 'error');
                    } else {
                        $('#import').attr('disabled', false);
                        $('#import').text('Import');
                        $('#upload_form')[0].reset();

                        if (data.html == true) {
                            $('#process_area').html(data.response);
                            $("button").hide();
                            show_toastr('Error', __('This data has not been inserted.'), 'error');

                        } else {
                            $('#message').html(data.response);
                            $('#commonModalOver').modal('hide')
                            show_toastr('Success', data.response, 'success');
                        }
                    }
                }
            })
        });
        $('#commonModalOver').on('hidden.bs.modal', function () {
            location.reload();
        });
    });
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/leads/import_modal.blade.php ENDPATH**/ ?>
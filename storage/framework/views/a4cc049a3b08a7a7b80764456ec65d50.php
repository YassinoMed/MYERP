
<?php echo e(Form::model($contract, array('route' => array('contract.copy.store', $contract->id),  'method' => 'POST'))); ?>

<div class="modal-body">

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('subject', __('Subject'),['class' => 'form-label'])); ?>

            <?php echo e(Form::text('subject', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
                <?php echo e(Form::label('client', __('Client'),['class'=>'form-label'])); ?>

                <?php echo e(Form::select('client', $clients, null, ['class' => 'form-control select client_select', 'id' => 'client_select'])); ?>

                <div class="text-xs mt-1">
                    <?php echo e(__('Create client here.')); ?> <a href="<?php echo e(route('clients.index')); ?>"><b><?php echo e(__('Create client')); ?></b></a>
                </div>
            </div>

            <div class="col-md-6 form-group">
                <?php echo e(Form::label('project', __('Project'), ['class' => 'form-label'])); ?>

                <div class="project-div">
                <?php echo e(Form::select('project', $project, null, ['class' => 'form-control select project_select', 'id' => 'project_id', 'name' => 'project_id[]'])); ?>

                <div class="text-xs mt-1">
                    <?php echo e(__('Create project here.')); ?> <a href="<?php echo e(route('projects.index')); ?>"><b><?php echo e(__('Create project')); ?></b></a>
                </div>
                </div>
            </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('type', __('Contract Type'),['class' => 'form-label'])); ?>

            <?php echo e(Form::select('type', $contractTypes,null, array('class' => 'form-control ','required'=>'required'))); ?>

            <div class="text-xs mt-1">
                <?php echo e(__('Create contract type here.')); ?> <a href="<?php echo e(route('contractType.index')); ?>"><b><?php echo e(__('Create contract type')); ?></b></a>
            </div>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('value', __('Contract Value'),['class' => 'form-label'])); ?>

            <?php echo e(Form::number('value', null, array('class' => 'form-control','required'=>'required','stage'=>'0.01'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('start_date', __('Start Date'),['class' => 'form-label'])); ?>

            <?php echo e(Form::date('start_date', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('end_date', __('End Date'),['class' => 'form-label'])); ?>

            <?php echo e(Form::date('end_date', null, array('class' => 'form-control','required'=>'required'))); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class' => 'form-label'])); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'3']); ?>

        </div>
    </div>

<div class="modal-footer pr-0">
    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Copy'),array('class'=>'btn  btn-primary'))); ?>

</div>
</div>
<?php echo e(Form::close()); ?>



<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script>
    if ($(".multi-select").length > 0) {
              $( $(".multi-select") ).each(function( index,element ) {
                  var id = $(element).attr('id');
                     var multipleCancelButton = new Choices(
                          '#'+id, {
                              removeItemButton: true,
                          }
                      );
              });
         }
  </script>
<script type="text/javascript">

$( ".client_select" ).change(function() {

    var client_id = $(this).val();
    getparent(client_id);
});

function getparent(bid) {

$.ajax({
    url: `<?php echo e(url('contract/clients/select')); ?>/${bid}`,
    type: 'GET',
    success: function (data) {
        $("#project_id").html('');
    $('#project_id').append('<select class="form-control" id="project_id" name="project_id[]"  ></select>');
        $.each(data, function (i, item) {
            $('#project_id').append('<option value="' + item.id + '">' + item.name + '</option>');
        });

        if (data == '') {
            $('#project_id').empty();
        }
    }
});
}
</script>
<?php /**PATH /Users/mohamedyassine/Downloads/Nouveau dossier contenant des éléments 5/erpgosaas-81nulled/codecanyon-33263426-erpgo-saas-all-in-one-business-erp-with-project-account-hrm-crm/main-file/resources/views/contract/copy.blade.php ENDPATH**/ ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('name', __('Test Name'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('code', __('Code'), ['class' => 'form-label']) }}
            {{ Form::text('code', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('sample_type', __('Sample Type'), ['class' => 'form-label']) }}
            {{ Form::text('sample_type', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('unit', __('Unit'), ['class' => 'form-label']) }}
            {{ Form::text('unit', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('reference_range', __('Reference Range'), ['class' => 'form-label']) }}
            {{ Form::text('reference_range', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('price', __('Price'), ['class' => 'form-label']) }}
            {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'min' => '0']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-check form-switch mt-4">
            {{ Form::checkbox('critical_supported', 1, isset($catalog) ? $catalog->critical_supported : false, ['class' => 'form-check-input', 'id' => 'critical_supported']) }}
            {{ Form::label('critical_supported', __('Critical Alert Supported'), ['class' => 'form-check-label']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-check form-switch mt-4">
            {{ Form::checkbox('is_active', 1, isset($catalog) ? $catalog->is_active : true, ['class' => 'form-check-input', 'id' => 'is_active']) }}
            {{ Form::label('is_active', __('Active'), ['class' => 'form-check-label']) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('instructions', __('Instructions'), ['class' => 'form-label']) }}
            {{ Form::textarea('instructions', null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>

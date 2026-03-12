<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('patient_id', __('Patient'), ['class' => 'form-label']) }}<x-required></x-required>
            <select name="patient_id" class="form-control" required>
                <option value="">{{ __('Select patient') }}</option>
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" {{ (string) old('patient_id', $order->patient_id ?? $selectedPatient ?? '') === (string) $patient->id ? 'selected' : '' }}>
                        {{ $patient->first_name }} {{ $patient->last_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('consultation_id', __('Consultation'), ['class' => 'form-label']) }}
            <select name="consultation_id" class="form-control">
                <option value="">{{ __('Select consultation') }}</option>
                @foreach ($consultations as $consultation)
                    <option value="{{ $consultation->id }}" {{ (string) old('consultation_id', $order->consultation_id ?? '') === (string) $consultation->id ? 'selected' : '' }}>
                        {{ \Auth::user()->dateFormat($consultation->consultation_date) }} - {{ $consultation->doctor_name ?? __('Consultation') }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('lab_test_catalog_id', __('Lab Test'), ['class' => 'form-label']) }}<x-required></x-required>
            <select name="lab_test_catalog_id" class="form-control" required>
                <option value="">{{ __('Select lab test') }}</option>
                @foreach ($catalogs as $catalog)
                    <option value="{{ $catalog->id }}" {{ (string) old('lab_test_catalog_id', $order->lab_test_catalog_id ?? '') === (string) $catalog->id ? 'selected' : '' }}>
                        {{ $catalog->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('sample_type', __('Sample Type'), ['class' => 'form-label']) }}
            {{ Form::text('sample_type', old('sample_type', $order->sample_type ?? null), ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('priority', __('Priority'), ['class' => 'form-label']) }}<x-required></x-required>
            {{ Form::select('priority', ['routine' => __('Routine'), 'urgent' => __('Urgent'), 'stat' => __('STAT')], old('priority', $order->priority ?? 'routine'), ['class' => 'form-control', 'required' => 'required']) }}
        </div>
    </div>
    @if(isset($order))
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}<x-required></x-required>
                {{ Form::select('status', ['requested' => __('Requested'), 'sample_collected' => __('Sample Collected'), 'processing' => __('Processing'), 'validated' => __('Validated'), 'canceled' => __('Canceled')], old('status', $order->status), ['class' => 'form-control', 'required' => 'required']) }}
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('scheduled_for', __('Scheduled For'), ['class' => 'form-label']) }}
            {{ Form::input('datetime-local', 'scheduled_for', old('scheduled_for', isset($order) && $order->scheduled_for ? $order->scheduled_for->format('Y-m-d\TH:i') : null), ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{ Form::label('clinical_notes', __('Clinical Notes'), ['class' => 'form-label']) }}
            {{ Form::textarea('clinical_notes', old('clinical_notes', $order->clinical_notes ?? null), ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
    @if(isset($order))
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('result_summary', __('Result Summary'), ['class' => 'form-label']) }}
                {{ Form::textarea('result_summary', old('result_summary', $order->result_summary), ['class' => 'form-control', 'rows' => 2]) }}
            </div>
        </div>
    @endif
</div>

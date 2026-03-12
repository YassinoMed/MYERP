@extends('layouts.admin')

@section('page-title')
    {{ $order->order_number }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('patient-lab-orders.index') }}">{{ __('Lab Orders') }}</a></li>
    <li class="breadcrumb-item">{{ $order->order_number }}</li>
@endsection

@section('action-btn')
    <div class="float-end d-flex">
        @can('edit patient lab order')
            <a href="#" class="btn btn-sm btn-info me-2" data-url="{{ route('patient-lab-orders.edit', $order->id) }}" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="{{ __('Edit') }}" data-title="{{ __('Edit Lab Order') }}">
                <i class="ti ti-pencil"></i>
            </a>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">{{ __('Order Details') }}</h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2 text-muted">{{ __('Patient') }}</div>
                        <div class="col-md-6 mb-2">
                            <a href="{{ route('patients.show', $order->patient_id) }}">{{ optional($order->patient)->first_name }} {{ optional($order->patient)->last_name }}</a>
                        </div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Test') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->labTest)->name ?? '-' }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Priority') }}</div>
                        <div class="col-md-6 mb-2">{{ ucfirst($order->priority) }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Status') }}</div>
                        <div class="col-md-6 mb-2">{{ ucfirst(str_replace('_', ' ', $order->status)) }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Ordered At') }}</div>
                        <div class="col-md-6 mb-2">{{ $order->ordered_at ? \Auth::user()->dateFormat($order->ordered_at) . ' ' . \Auth::user()->timeFormat($order->ordered_at) : '-' }}</div>
                        <div class="col-12 text-muted">{{ __('Clinical Notes') }}</div>
                        <div class="col-12">{{ $order->clinical_notes ?: '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header"><h5 class="mb-0">{{ __('Sample & Result') }}</h5></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-2 text-muted">{{ __('Sample Code') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->sample)->sample_code ?? '-' }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Collected At') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->sample)->collected_at ? \Auth::user()->dateFormat($order->sample->collected_at) . ' ' . \Auth::user()->timeFormat($order->sample->collected_at) : '-' }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Result') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->result)->result_value ?? '-' }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Validated At') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->result)->validated_at ? \Auth::user()->dateFormat($order->result->validated_at) . ' ' . \Auth::user()->timeFormat($order->result->validated_at) : '-' }}</div>
                        <div class="col-md-6 mb-2 text-muted">{{ __('Critical') }}</div>
                        <div class="col-md-6 mb-2">{{ optional($order->result)->critical_flag ? __('Yes') : __('No') }}</div>
                        <div class="col-12 text-muted">{{ __('Summary') }}</div>
                        <div class="col-12">{{ $order->result_summary ?: '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
        @can('collect patient lab sample')
            @if(!$order->sample)
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-header"><h5 class="mb-0">{{ __('Collect Sample') }}</h5></div>
                        <div class="card-body">
                            {{ Form::open(['route' => ['patient-lab-orders.collect-sample', $order->id], 'method' => 'post']) }}
                            <div class="form-group mb-3">
                                {{ Form::label('storage_location', __('Storage Location'), ['class' => 'form-label']) }}
                                {{ Form::text('storage_location', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group mb-3">
                                {{ Form::label('notes', __('Notes'), ['class' => 'form-label']) }}
                                {{ Form::textarea('notes', null, ['class' => 'form-control', 'rows' => 2]) }}
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">{{ __('Collect Sample') }}</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            @endif
        @endcan
        @can('validate patient lab result')
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header"><h5 class="mb-0">{{ __('Validate Result') }}</h5></div>
                    <div class="card-body">
                        {{ Form::open(['route' => ['patient-lab-orders.validate-result', $order->id], 'method' => 'post']) }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    {{ Form::label('result_value', __('Result Value'), ['class' => 'form-label']) }}<x-required></x-required>
                                    {{ Form::text('result_value', optional($order->result)->result_value, ['class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    {{ Form::label('result_date', __('Result Date'), ['class' => 'form-label']) }}<x-required></x-required>
                                    {{ Form::date('result_date', optional($order->result)->result_date ? optional($order->result)->result_date->format('Y-m-d') : now()->format('Y-m-d'), ['class' => 'form-control', 'required' => 'required']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    {{ Form::label('unit', __('Unit'), ['class' => 'form-label']) }}
                                    {{ Form::text('unit', optional($order->result)->unit ?? optional($order->labTest)->unit, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    {{ Form::label('reference_range', __('Reference Range'), ['class' => 'form-label']) }}
                                    {{ Form::text('reference_range', optional($order->result)->reference_range ?? optional($order->labTest)->reference_range, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch mb-3">
                                    {{ Form::checkbox('critical_flag', 1, optional($order->result)->critical_flag ?? false, ['class' => 'form-check-input', 'id' => 'critical_flag']) }}
                                    {{ Form::label('critical_flag', __('Critical Result'), ['class' => 'form-check-label']) }}
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-3">
                                    {{ Form::label('notes', __('Notes'), ['class' => 'form-label']) }}
                                    {{ Form::textarea('notes', optional($order->result)->notes, ['class' => 'form-control', 'rows' => 2]) }}
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">{{ __('Validate Result') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        @endcan
    </div>
@endsection

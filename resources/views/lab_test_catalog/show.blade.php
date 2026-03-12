@extends('layouts.admin')

@section('page-title')
    {{ $catalog->name }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('lab-test-catalogs.index') }}">{{ __('Laboratory Catalog') }}</a></li>
    <li class="breadcrumb-item">{{ $catalog->name }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3"><strong>{{ __('Code') }}:</strong> {{ $catalog->code ?? '-' }}</div>
                        <div class="col-md-4 mb-3"><strong>{{ __('Sample Type') }}:</strong> {{ $catalog->sample_type ?? '-' }}</div>
                        <div class="col-md-4 mb-3"><strong>{{ __('Unit') }}:</strong> {{ $catalog->unit ?? '-' }}</div>
                        <div class="col-md-4 mb-3"><strong>{{ __('Reference Range') }}:</strong> {{ $catalog->reference_range ?? '-' }}</div>
                        <div class="col-md-4 mb-3"><strong>{{ __('Price') }}:</strong> {{ \Auth::user()->priceFormat($catalog->price) }}</div>
                        <div class="col-md-4 mb-3"><strong>{{ __('Critical Alert') }}:</strong> {{ $catalog->critical_supported ? __('Yes') : __('No') }}</div>
                        <div class="col-12"><strong>{{ __('Instructions') }}:</strong><br>{{ $catalog->instructions ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

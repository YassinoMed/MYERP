@extends('layouts.admin')

@section('page-title')
    {{ __('Lab Orders') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Lab Orders') }}</li>
@endsection

@section('action-btn')
    <div class="float-end d-flex">
        @can('create patient lab order')
            <a href="#" data-size="lg" data-url="{{ route('patient-lab-orders.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Lab Order') }}" class="btn btn-sm btn-primary">
                <i class="ti ti-plus"></i>
            </a>
        @endcan
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>{{ __('Order') }}</th>
                                    <th>{{ __('Patient') }}</th>
                                    <th>{{ __('Test') }}</th>
                                    <th>{{ __('Priority') }}</th>
                                    <th>{{ __('Sample') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Result') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td><a href="{{ route('patient-lab-orders.show', $order->id) }}">{{ $order->order_number }}</a></td>
                                        <td>{{ optional($order->patient)->first_name }} {{ optional($order->patient)->last_name }}</td>
                                        <td>{{ optional($order->labTest)->name ?? '-' }}</td>
                                        <td>{{ ucfirst($order->priority) }}</td>
                                        <td>{{ optional($order->sample)->sample_code ?? '-' }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $order->status)) }}</td>
                                        <td>{{ optional($order->result)->result_value ?? '-' }}</td>
                                        <td class="Action">
                                            <span>
                                                @can('edit patient lab order')
                                                    <div class="action-btn me-2">
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center bg-info" data-url="{{ route('patient-lab-orders.edit', $order->id) }}" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="{{ __('Edit') }}" data-title="{{ __('Edit Lab Order') }}">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('delete patient lab order')
                                                    <div class="action-btn">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['patient-lab-orders.destroy', $order->id], 'id' => 'delete-lab-order-' . $order->id]) !!}
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-lab-order-{{ $order->id }}').submit();">
                                                            <i class="ti ti-trash text-white"></i>
                                                        </a>
                                                        {!! Form::close() !!}
                                                    </div>
                                                @endcan
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

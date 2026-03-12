@extends('layouts.admin')

@section('page-title')
    {{ __('Laboratory Catalog') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
    <li class="breadcrumb-item">{{ __('Laboratory Catalog') }}</li>
@endsection

@section('action-btn')
    <div class="float-end d-flex">
        @can('create lab test catalog')
            <a href="#" data-size="lg" data-url="{{ route('lab-test-catalogs.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('Create') }}" data-title="{{ __('Create Lab Test') }}" class="btn btn-sm btn-primary">
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
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Sample Type') }}</th>
                                    <th>{{ __('Reference Range') }}</th>
                                    <th>{{ __('Price') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($catalogs as $catalog)
                                    <tr>
                                        <td><a href="{{ route('lab-test-catalogs.show', $catalog->id) }}">{{ $catalog->name }}</a></td>
                                        <td>{{ $catalog->code ?? '-' }}</td>
                                        <td>{{ $catalog->sample_type ?? '-' }}</td>
                                        <td>{{ $catalog->reference_range ?? '-' }}</td>
                                        <td>{{ \Auth::user()->priceFormat($catalog->price) }}</td>
                                        <td>{{ $catalog->is_active ? __('Active') : __('Inactive') }}</td>
                                        <td class="Action">
                                            <span>
                                                @can('edit lab test catalog')
                                                    <div class="action-btn me-2">
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center bg-info" data-url="{{ route('lab-test-catalogs.edit', $catalog->id) }}" data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip" title="{{ __('Edit') }}" data-title="{{ __('Edit Lab Test') }}">
                                                            <i class="ti ti-pencil text-white"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                                @can('delete lab test catalog')
                                                    <div class="action-btn">
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['lab-test-catalogs.destroy', $catalog->id], 'id' => 'delete-lab-test-' . $catalog->id]) !!}
                                                        <a href="#" class="mx-3 btn btn-sm align-items-center bs-pass-para bg-danger" data-bs-toggle="tooltip" title="{{ __('Delete') }}" data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}" data-confirm-yes="document.getElementById('delete-lab-test-{{ $catalog->id }}').submit();">
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

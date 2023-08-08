@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Name</div>
                        <div class="datagrid-content">{{ $storage->name }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Email</div>
                        <div class="datagrid-content">{{ $storage->email ?? '-' }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Phone number</div>
                        <div class="datagrid-content">{{ $storage->phone ?? '-' }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Address</div>
                        <div class="datagrid-content">{{ $storage->address ?? '-' }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Capacity</div>
                        <div class="datagrid-content">{{ $storage->used() . '/' . $storage->capacity }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Status</div>
                        <div class="datagrid-content">
                            @if ($storage->active)
                                <span class="status status-green">
                                    Active
                                </span>
                            @else
                                <span class="status status-red">
                                    Inactive
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Created at</div>
                        <div class="datagrid-content">{{ $storage->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('storages.index') }}" class="btn btn-outline-secondary">Storages</a>
            </div>
        </div>
    @endsection

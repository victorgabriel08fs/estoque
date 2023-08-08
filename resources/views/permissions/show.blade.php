@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Name</div>
                        <div class="datagrid-content">{{ $permission->name }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Created at</div>
                        <div class="datagrid-content">{{ $permission->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">Permissions</a>
            </div>
        </div>
    @endsection

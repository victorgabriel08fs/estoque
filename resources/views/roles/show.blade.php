@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Name</div>
                        <div class="datagrid-content">{{ $role->name }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Created at</div>
                        <div class="datagrid-content">{{ $role->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">Roles</a>
            </div>
        </div>
    @endsection

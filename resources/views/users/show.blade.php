@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="datagrid">
                    <div class="datagrid-item">
                        <div class="datagrid-title">Creator</div>
                        <div class="datagrid-content">
                            <div class="d-flex align-items-center">
                                <span class="avatar avatar-xs me-2 rounded"
                                    style="background-image: url({{ asset('/images/logo.png') }})"></span>
                                {{ $user->name }}
                            </div>
                        </div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Email</div>
                        <div class="datagrid-content">{{ $user->email }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Phone number</div>
                        <div class="datagrid-content">{{ $user->phone }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Permission expires</div>
                        <div class="datagrid-content">{{ $user->permission_end_at->format('d/m/Y') }}</div>
                    </div>
                    <div class="datagrid-item">
                        <div class="datagrid-title">Status</div>
                        <div class="datagrid-content">
                            @if ($user->active())
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
                        <div class="datagrid-title">Role</div>
                        <div class="datagrid-content">
                            <span
                                class="status status-{{ ($user->hasRole('User') ? 'blue' : $user->hasRole('Admin')) ? 'purple' : 'red' }}">{{ $user->hasRole('User') ? 'User' : ($user->hasRole('Admin') ? 'Admin' : 'Super Admin') }}</span>
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Created at</div>
                        <div class="datagrid-content">{{ $user->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Users</a>
            </div>
        </div>
    @endsection

@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $user) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Creator</div>
                            <div class="datagrid-content">
                                <div class="d-flex align-items-center">
                                    <span class="avatar avatar-xs me-2 rounded" style="background-image: url(...)"></span>
                                    <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                        class="form-control @error('name') is-invalid @enderror" />
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Email</div>
                            <div class="datagrid-content"><input type="email" name="email"
                                    value="{{ old('email', $user->email) }}"
                                    class="form-control @error('email') is-invalid @enderror" />
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Phone number</div>
                            <div class="datagrid-content"><input type="phone" value="{{ old('phone', $user->phone) }}"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" />
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Permission expires</div>
                            <div class="datagrid-content"><input type="date"
                                    value="{{ old('permission_end_at', $user->permission_end_at->format('Y-m-d')) }}"
                                    name="permission_end_at"
                                    class="form-control @error('permission_end_at') is-invalid @enderror" />
                                @error('permission_end_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="datagrid-item">
                            <div class="datagrid-title">Edge network</div>
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
                            <div class="datagrid-title">Created at</div>
                            <div class="datagrid-content">{{ $user->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="datagrid-item">
                        </div>
                        <div class="datagrid-item">
                        </div>
                        <div class="datagrid-item">
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">Users</a>
                            <button type="submit" class="btn btn-outline-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection

@extends('layouts.app')
@section('content')
    <div class="col">
        @method('get')
        <div class="card mb-5">
            <div class="card-header">
                <h2>Roles</h2>
            </div>
            <form action="{{ route('roles.index') }}">
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Name</div>
                            <div class="datagrid-content"><input type="search" name="name" value="{{ old('name') }}"
                                    class="form-control " />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">Clear fields</a>
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
            </form>
            <div>
                @can('Create Settings')
                    @include('roles._partials.new_modal', ['permissions' => $permissions])
                @endcan
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($roles->count() == 0)
                @include('_partials.empty')
            @else
                <table class="table table-hover table-striped table-nowrap">
                    <thead class="sticky-top">
                        <tr>
                            <th class="col-1" scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th class="col-3" scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                            <tr>
                                <th scope="row">{{ $item['id'] }}</th>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-icon btn-primary" href="{{ route('roles.show', $item) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                                <path
                                                    d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6">
                                                </path>
                                            </svg></a>
                                        @can('Edit Settings')
                                            @include('roles._partials.edit_modal', ['role' => $item])
                                        @endcan
                                        @can('Delete Settings')
                                            <form id="form-{{ $item->id }}" method="post" class="btn btn-icon btn-danger"
                                                action="{{ route('roles.destroy', $item) }}">
                                                @csrf
                                                @method('delete')
                                                <svg onclick="$('#form-{{ $item->id }}').submit();" id="submit"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        @if ($roles->hasPages() != false)
            <div class="card-footer d-flex justify-content-center clearfix" style="padding-bottom: 0px;" ;>
                {{ $roles->links() }}
            </div>
        @endif
    </div>
    </div>
@endsection

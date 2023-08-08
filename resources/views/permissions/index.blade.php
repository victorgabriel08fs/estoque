@extends('layouts.app')
@section('content')
    <div class="col">
        @method('get')
        <div class="card mb-5">
            <div class="card-header">
                <h2>Permissions</h2>
            </div>
            <form action="{{ route('permissions.index') }}">
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
                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-secondary">Clear fields</a>
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                    </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($permissions->count() == 0)
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
                        @foreach ($permissions as $item)
                            <tr>
                                <th scope="row">{{ $item['id'] }}</th>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-icon btn-primary"
                                            href="{{ route('permissions.show', $item) }}"><svg
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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        @if ($permissions->hasPages() != false)
            <div class="card-footer d-flex justify-content-center clearfix" style="padding-bottom: 0px;" ;>
                {{ $permissions->links() }}
            </div>
        @endif
    </div>
    </div>
@endsection

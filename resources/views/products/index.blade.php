@extends('layouts.app')
@section('content')
    <div class="col">
        <div class="card">
            <div class="card-body">
                @if ($users->count() == 0)
                    @include('_partials.empty')
                @else
                    <table class="table table-hover table-striped table-nowrap">
                        <thead class="sticky-top">
                            <tr>
                                <th class="col-1" scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th class="col-3" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <th scope="row">{{ $item['id'] }}</th>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td><a href="{{ route('users.show', $item) }}">Show</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            @if ($users->hasPages() != false)
                <div class="card-footer d-flex justify-content-center clearfix" style="padding-bottom: 0px;" ;>
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

<button type="button" class="btn btn-icon btn-secondary" data-bs-toggle="modal"
    data-bs-target="#editModal{{ $role->id }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24"
        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
        stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
        </path>
        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
        </path>
        <path d="M16 5l3 3"></path>
    </svg>
</button>

<div class="modal" id="editModal{{ $role->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('roles.update', $role) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $role->name) }}" placeholder="Role's name" />
                    </div>
                </div>
                <div class="modal-body overflow-auto" style="height: 200px">
                    <div class="row form-label">Permissions</div>
                    <div class="row">
                        <div class="col">
                            @foreach ($permissions as $permission)
                                @if ($loop->iteration <= $permissions->count() / 2)
                                    <label class="form-check form-switch">
                                        <input name="permissions[]" value="{{ $permission->name }}"
                                            class="form-check-input" type="checkbox" @checked($role->hasPermissionTo($permission->name))>
                                        <span class="form-check-label">{{ $permission->name }}</span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                        <div class="col">
                            @foreach ($permissions as $permission)
                                @if ($loop->iteration > $permissions->count() / 2)
                                    <label class="form-check form-switch">
                                        <input name="permissions[]" value="{{ $permission->name }}"
                                            class="form-check-input" type="checkbox" @checked($role->hasPermissionTo($permission->name))>
                                        <span class="form-check-label">{{ $permission->name }}</span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Update role
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

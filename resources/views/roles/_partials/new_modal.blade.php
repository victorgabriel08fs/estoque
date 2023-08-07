<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newModal">
    New
</button>

<div class="modal" id="newModal" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                            placeholder="Role's name" />
                    </div>
                </div>
                <div class="modal-body overflow-auto" style="height: 200px">
                    <div class="row form-label">Permissions</div>
                    <div class="row">
                        <div class="col">
                            @foreach ($permissions as $permission)
                                @if ($loop->iteration <= $permissions->count() / 2)
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" @checked(is_array(old('permissions') && in_array($permission->id, old('permissions'))))>
                                        <span class="form-check-label">{{ $permission->name }}</span>
                                    </label>
                                @endif
                            @endforeach
                        </div>
                        <div class="col">
                            @foreach ($permissions as $permission)
                                @if ($loop->iteration > $permissions->count() / 2)
                                    <label class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" @checked(is_array(old('permissions') && in_array($permission->id, old('permissions'))))>
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
                        Create new role
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

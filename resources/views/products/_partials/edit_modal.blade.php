<button type="button" class="btn btn-icon btn-secondary" data-bs-toggle="modal"
    data-bs-target="#editModal{{ $user->id }}">
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

<div class="modal" id="editModal{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('users.update', $user) }}" method="post">
            @csrf
            @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $user->name) }}" placeholder="User's name" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email', $user->email) }}" placeholder="User's email" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                            data-mask="0000000000000" name="phone" value="{{ old('phone', $user->phone) }}"
                            placeholder="User's phone" />
                    </div>
                </div>
                <div class="modal-body">
                    <label class="form-label">User's type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-md-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="type" value="User" class="form-selectgroup-input"
                                    @checked(old('type') == 'User' || old('type') != 'Admin' || (!session()->has('type') && $user->hasRole('User'))) />
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">User</span>
                                        <span class="d-block text-secondary">Can access the items manegement</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-md-6">
                            <label class="form-selectgroup-item">
                                <input @checked(old('type') == 'Admin' || (!session()->has('type') && $user->hasRole('Admin'))) type="radio" name="type" value="Admin"
                                    class="form-selectgroup-input" />
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Admin</span>
                                        <span class="d-block text-secondary">Can access all the system items</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Permission end at</label>
                                <input type="date" name="permission_end_at"
                                    value="{{ old('permission_end_at', $user->permission_end_at->format('Y-m-d')) }}"
                                    class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg>
                        Update user
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

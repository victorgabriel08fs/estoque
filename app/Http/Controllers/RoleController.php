<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $roles = Role::paginate(10);
        $permissions = Permission::orderBy('name')->get();
        return view('roles.index', ['permissions' => $permissions, 'request' => $request, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data = $request->validated();
        $data['name'] = ucwords(strtolower($data['name']));
        $role = Role::create($data);

        foreach ($data['permissions'] as $permission) {
            $role->givePermissionTo($permission);
        }

        return redirect()->back()->with('message', 'Role created! The password was send to ' . $role->email);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('roles.show', ['role' => $role]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        if ($role->name == "Super Admin") {
            return redirect()->back()->with('error', 'This role cannot be changed');
        }

        $data = $request->validated();
        $data['name'] = ucwords(strtolower($data['name']));
        $role->update($data);

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            if (!in_array($permission->name, $data['permissions']) && $role->hasPermissionTo($permission->name)) {
                $role->revokePermissionTo($permission->name);
            } elseif (in_array($permission->name, $data['permissions']) && !$role->hasPermissionTo($permission->name)) {
                $role->givePermissionTo($permission->name);
            }
        }

        $request->session()->forget(['name']);
        return redirect()->back()->with('message', 'Role updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->name == "Super Admin") {
            return redirect()->back()->with('error', 'This role cannot be changed');
        }

        $role->delete();
        return redirect()->back()->with('message', 'Role deleted');
    }
}

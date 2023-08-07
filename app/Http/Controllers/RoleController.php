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
        $permissions = Permission::orderBy('name');
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
        $data = $request->validated();
        $data['name'] = ucwords(strtolower($data['name']));
        $role->update($data);
        if (!$role->hasRole($data['type'])) {
            $role = $role->roles->first();
            $role->assignRole($data['type']);
            $role->removeRole($role);
        }
        $request->session()->forget(['name', 'email']);
        return redirect()->back()->with('message', 'Role updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('message', 'Role deleted');
    }
}

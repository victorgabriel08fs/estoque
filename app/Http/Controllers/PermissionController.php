<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::orderBy('name')->paginate(10);
        return view('permissions.index', ['permissions' => $permissions]);
    }


    public function show(Permission $permission)
    {
        return view('permissions.show', ['permission' => $permission]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:View Users')->only(['index', 'show']);
        $this->middleware('permission:Edit Users')->only(['update']);
        $this->middleware('permission:Delete Users')->only(['destroy']);
        $this->middleware('permission:Create Users')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::search($request)->paginate(10)->withQueryString();
        return view('users.index', ['request' => $request, 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['name'] = ucwords(strtolower($data['name']));
        $data['password'] = bcrypt(User::createPassword());

        $user = User::create($data);

        $user->assignRole($data['type']);

        return redirect()->back()->with('message', 'User created! The password was send to ' . $user->email);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['name'] = ucwords(strtolower($data['name']));
        $user->update($data);
        if (!$user->hasRole($data['type'])) {
            $role = $user->roles->first();
            $user->assignRole($data['type']);
            $user->removeRole($role);
        }
        $request->session()->forget(['name', 'email']);
        return redirect()->back()->with('message', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('message', 'User deleted');
    }
}

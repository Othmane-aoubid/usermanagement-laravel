<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }
    public function create()
    {
        // $roles = Role::all();
        return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        // $roles = Role::all();
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index');
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validated);
        return to_route('admin.roles.index')->with('message', 'role updated successfuly');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('message', 'role deleted successfuly');
    }
    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission))
        {
            return back()->with('message', 'permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message', 'permission added');
    }
}

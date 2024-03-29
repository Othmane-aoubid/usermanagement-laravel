<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        // $roles = Role::all();
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        // $roles = Role::all();
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Permission::create($validated);
        return to_route('admin.permissions.index');
    }

    public function edit(Permission $permission)
    {
        // $roles = Role::all();
        
        return to_route('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // $roles = Role::all();
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        $permission::update($validated);
        return to_route('admin.permissions.index');
    }
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back()->with('message', 'role deleted successfuly');
    }
}

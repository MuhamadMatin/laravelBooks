<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'role_or_permission:view_role|view_any_role|create_role|edit_role|delete_role',
            new Middleware('permission:view_role|view_any_role', only: ['index']),
            new Middleware('permission:create_role', only: ['create', 'store']),
            new Middleware('permission:edit_role', only: ['edit', 'update']),
            new Middleware('permission:delete_role', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.roles.index', [
            'roles' => $roles,
            'permissions' => $permissions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::firstOrCreate(['name' => $request['name']]);
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request['name'];
        $role->save();

        return redirect()->route('admin.roles.index');
    }

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.permissions.edit', [
            'role' => $role,
            'permissions' => $permissions,
        ]);
    }

    public function updatePermissions(UpdatePermissionRequest $request, string $id)
    {
        $role = Role::findOrFail($id);

        $role->syncPermissions($request['permissions']);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        try {
            $roleNotFound = Role::find($role)->first();
            if (!$roleNotFound) {
                return redirect()->route('admin.roles.index')->withErrors('Role not found');
            }
            $role->delete();
            return redirect()->route('admin.roles.index');
        } catch (\Throwable $e) {
            return redirect()->route('admin.roles.index')->withErrors('Role not found');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function getRole()
    {
        $data = [
            'roles' => Role::all(),
        ];

        return view('viewAdmin.role.index', compact(['data']));
    }

    public function getPermission()
    {
        $data = [
            'permissions' => Permission::all(),
        ];

        return response()->json([
            'payload' => $data['permissions'],
        ]);
    }

    // Create a new role
    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Role created successfully.');
    }

    // Update role
    public function updateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'Role updated successfully.');
    }

    // Delete role
    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully.');
    }

    // Create a new permission
    public function storePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->back()->with('success', 'Permission created successfully.');
    }

    // Assign permissions to a role
    public function assignPermission(Request $request, $roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = $request->permissions;

        $role->syncPermissions($permissions);

        return redirect()->back()->with('success', 'Permissions assigned successfully.');
    }

    // Remove a permission from a role
    public function revokePermission($roleId, $permissionId)
    {
        $role = Role::findOrFail($roleId);
        $permission = Permission::findOrFail($permissionId);

        $role->revokePermissionTo($permission);

        return redirect()->back()->with('success', 'Permission revoked successfully.');
    }

    public function managePermissions($roleId)
    {
        $role = Role::findOrFail($roleId);
        $permissions = Permission::all();

        return view('viewAdmin.role.permission-management', compact('role', 'permissions'));
    }
}

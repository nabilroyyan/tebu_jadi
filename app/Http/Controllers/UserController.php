<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
        ];

        return view('viewAdmin.user.index', compact(['data']));
    }

    public function create()
    {
        $data = [
            'roles' => Role::all()->pluck('name'),
        ];
        return view('viewAdmin.user.create', compact(['data']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'role' => 'required',
            'password' => 'required|min:8',
        ]);

        $create = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($create) {
            $create->assignRole($request->role);
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index');
        }
    }

    public function edit($id)
    {
        $data = [
            'roles' => Role::all()->pluck('name'),
            'user' => User::find($id),
        ];
        return view('viewAdmin.user.update', compact(['data']));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->email == $user->email) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns',
                'role' => 'required',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email:dns|unique:users',
                'role' => 'required',
            ]);
        }

        $update = null;

        $role = $user->getRoleNames()->first();

        if ($request->password) {
            $update = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $update = $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        if ($update) {
            if ($role != $request->role) {
                $user->removeRole($role);
                $user->assignRole($request->role);
            }
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $delete = $user->delete();

        if ($delete) {
            return redirect()->route('user.index');
        } else {
            return redirect()->route('user.index');
        }
    }
    // Assign permissions to a user
    public function assignPermission(Request $request, $userId)
    {
        try {
            $user = User::findOrFail($userId);
            $permissions = $request->permissions;

            $user->syncPermissions($permissions);

            return redirect()->back()->with('success', 'Permissions assigned successfully.');
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    // Remove a permission from a user
    public function revokePermission($userId, $permissionId)
    {
        $user = User::findOrFail($userId);
        $permission = Permission::findOrFail($permissionId);

        $user->revokePermissionTo($permission);

        return redirect()->back()->with('success', 'Permission revoked successfully.');
    }

    public function revokeUserPermissions($userId)
    {
        $user = User::findOrFail($userId);

        // Ambil semua permissions yang dimiliki user
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();

        // Revoke semua permissions
        $user->revokePermissionTo($permissions);
    }

    public function managePermissions($userId)
    {
        $user = User::findOrFail($userId);
        $permissions = Permission::all();

        return view('viewAdmin.user.permission-management', compact('user', 'permissions'));
    }
}

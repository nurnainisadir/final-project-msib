<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RoleRequest;

class ACLController extends Controller
{
    /**
     * Get permission list page.
     *
     * @return View
     */
    public function permissionList()
    {
        $data['permission'] = Permission::get(['id', 'name', 'created_at']);

        return view('acl.permission-list', $data);
    }

    /**
     * Show role list page.
     *
     * @return View
     */
    public function roleList()
    {
        $data['role'] = Role::get(['id', 'name', 'created_at']);

        return view('acl.role-list', $data);
    }

    /**
     * Show create role form.
     *
     * @return View
     */
    public function createRole()
    {
        $data['permissions'] = Permission::get(['id', 'name']);

        return view('acl.role-form', $data);
    }

    /**
     * Show edit role form.
     *
     * @return View
     */
    public function editRole()
    {
        $data['permissions'] = Permission::get(['id', 'name']);
        $data['object'] = Role::findOrFail(request()->id);

        return view('acl.role-form', $data);
    }

    /**
     * Update role.
     *
     * @param RoleRequest $request
     *
     * @return Response
     */
    public function updateRole(RoleRequest $request)
    {
        $posted = $request->all();
        $role = Role::findOrFail(request()->id);

        \DB::transaction(function () use ($posted, $role) {
            $role->update([
                'name' => $posted['name'],
            ]);

            $role->permissions()->detach();
            if (isset($posted['permissions']) && count($posted['permissions']) > 0) {
                foreach ($posted['permissions'] as $permissionId) {
                    $role->givePermissionTo(intval($permissionId));
                }
            }
        });

        return redirect()->route('acl.role.index')->with('status', 'Role berhasil disimpan.');
    }

    /**
     * Store Role to Database.
     *
     * @param RoleRequest $request
     *
     * @return Response
     */
    public function storeRole(RoleRequest $request)
    {
        $posted = $request->all();
        \DB::transaction(function () use ($posted) {
            $role = Role::create([
                'name' => $posted['name'],
            ]);
            if (isset($posted['permissions']) && count($posted['permissions']) > 0) {
                foreach ($posted['permissions'] as $permissionId) {
                    $role->givePermissionTo(intval($permissionId));
                }
            }
        });

        return redirect()->route('acl.role.index')->with('status', 'Role berhasil dibuat.');
    }

    /**
     * Delete role.
     *
     * @return Response
     */
    public function deleteRole()
    {
        $role = Role::findOrFail(request()->id);
        $role->delete();

        return redirect()->back()->with('status', 'Role berhasil dihapus.');
    }
}

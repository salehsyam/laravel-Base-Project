<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        return response()->view('dashboard.roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.roles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'guard_name' => 'required|string|in:admin,web',
            'name' => 'required|string',
        ])->validate();
        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $isSaved = $role->save();
        return response()->json(
            ['message' => $isSaved ? __('User created successfully') : __('Create failed!')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );
    }

    /***
     * @param Role $role
     */
    public function show(Role $role)
    {
        $permissions = Permission::where('guard_name', '=', $role->guard_name)->get();
        $rolePermissions = $role->permissions;
        if (count($rolePermissions) > 0) {
            foreach ($permissions as $permission) {
                foreach ($rolePermissions as $rolePermission) {
                    if ($rolePermission->id == $permission->id) {
                        $permission->setAttribute('assigned', true);
                    }
                }
            }
        }
        return response()->view('dashboard.roles.role-permissions', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    /***
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRolePermission(Request $request)
    {
        $validator = Validator($request->all(), [
            'role_id' => 'required|numeric|exists:roles,id',
            'permission_id' => 'required|numeric|exists:permissions,id',
        ]);
        if (!$validator->fails()) {
            $role = Role::findOrFail($request->input('role_id'));
            $permission = Permission::findOrFail($request->input('permission_id'));
            if ($role->hasPermissionTo($permission)) {
                $role->revokePermissionTo($permission);
            } else {
                $role->givePermissionTo($permission);
            }
            return response()->json(['message' => 'Updated successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }
    /***
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return response()->view('dashboard.roles.edit', ['role' => $role]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Role $role)
    {
        $validator = Validator($request->all(), [
            'guard_name' => 'required|string|in:admin,web',
            'name' => 'required|string',
        ])->validate();
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $isSaved = $role->save();
        return response()->json(
            ['message' => $isSaved ? __('Updated successfully') : __('Update failed!')],

            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );
    }

    /**
     * @param Role $role
     */
    public function destroy(Role $role)
    {
        $isDeleted = $role->delete();
        return response()->json(
            ['message' => $isDeleted ? __('Deleted Successfully' ): __('Delete failed')],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }
}

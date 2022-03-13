<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return response()->view('dashboard.permissions.index', ['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('dashboard.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'guard_name' => 'required|string|in:admin,web',
            'name' => 'required|string',
        ])->validate();

        $role = new Permission();
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $isSaved = $role->save();
        return response()->json(
            ['message' => $isSaved ? __('User created successfully') : __('Create failed!')],
            $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
        );
    }

    /**
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(permission $permission)
    {
        return response()->view('dashboard.permissions.edit', ['permission' => $permission]);

    }

    /**
     * @param Request $request
     * @param Permission $permission
     */
    public function update(Request $request, permission $permission)
    {
        Validator::make($request->all(), [
            'guard_name' => 'required|string|in:admin,web',
            'name' => 'required|string',
        ])->validate();

        $permission->name = $request->input('name');
        $permission->guard_name = $request->input('guard_name');
        $isSaved = $permission->save();
        return response()->json(
            ['message' => $isSaved ? __('Updated successfully') : __('Update failed!')],
            $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }

    /**
     * @param Permission $permission
     */
    public function destroy(permission $permission)
    {
        $isDeleted = $permission->delete();
        return response()->json(
            ['message' => $isDeleted ? __('Deleted Successfully' ): __('Delete failed')],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
        );
    }
}

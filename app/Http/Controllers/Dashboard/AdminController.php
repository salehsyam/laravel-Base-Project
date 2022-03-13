<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Admin::class, 'admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::all();
              return response()->view('dashboard.admins.index', ['admins' => $admins]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::where('guard_name', '=', 'admin')->get();
        return response()->view('dashboard.admins.create', ['roles' => $roles]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
        $roles = Role::where('guard_name', '=', 'admin')->get();
        $adminRole = $admin->roles()->first();
        return response()->view('dashboard.admins.edit', [
            'admin' => $admin,
            'adminRole' => $adminRole,
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
            'role_id' => 'required|numeric|exists:roles,id',
        ])->validate();

            $admin = new Admin();
            $admin->name = $request->input('name');
            $admin->email = $request->input('email');
            $admin->password = Hash::make( $request->input('password'));
            $isSaved = $admin->save();
            if ($isSaved) {
                $admin->assignRole(Role::findById($request->input('role_id'), 'admin'));
            }
            return response()->json(
                ['message' => $isSaved ? __('Admin created successfully') : __('Create failed!')],
                $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST,
            );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
        $isDeleted = $admin->delete();
        return response()->json(
            ['message' => $isDeleted ? 'Deleted successfully' : 'Delete failed!'],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}

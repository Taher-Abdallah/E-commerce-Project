<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class RoleController extends Controller  implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('perm:roles', only: ['index']),
        ];
    }
    protected $roleService;
public function __construct(RoleService $roleService)
{
    $this->roleService = $roleService;
        // $this->middleware('can:roles')->only('index');
}
    public function index()
    {
        $roles= $this->roleService->getRoles();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role= $this->roleService->storeRole($request->validated());
        if($role){
            return redirect()->route('admin.roles.index')->with('success', 'Role created successfully');
        }
        return back()->with('error', __('dashboard.error_msg'));
    }



    public function edit(string $id)
    {
        $role = $this->roleService->findId($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($request->validated(), $id);
        if($role){
            return redirect()->route('admin.roles.index')->with('success', 'Role updated successfully');
        }
        return back()->with('error', __('dashboard.error_msg'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roleService->deleteRole($id);
        return redirect()->route('admin.roles.index')->with('success', 'Role deleted successfully');
    }
}

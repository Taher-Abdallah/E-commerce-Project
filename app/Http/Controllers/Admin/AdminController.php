<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller 
{
    // public static function middleware(): array
    // {
    //     return [
    //         new Middleware('perm:admins'),
    //     ];
    // }

    public function index()
    {
        $admins=Admin::with('role')->paginate(4);
        return view('admin.admins.index',get_defined_vars());
    }


    public function create()
    {
        $roles=Role::Select('id','role')->get();
        return view('admin.admins.create',get_defined_vars());
    }


    public function store(AdminRequest $request)
    {
        $data=$request->validated();
        Admin::create($data);
        return redirect()->route('admin.admins.index')->with('success', 'Admin created successfully');
    }



    public function edit(Admin $admin)
    {
        $roles=Role::Select('id','role')->get();
        return view('admin.admins.edit',get_defined_vars());
    }


    public function update(AdminRequest $request, Admin $admin)
    {
        $data=$request->validated();
        if($data['password'] == null){
            unset($data['password']);
        }
        $admin->update($data);
        return redirect()->route('admin.admins.index')->with('success', 'Admin updated successfully');
    }

    public function changeStatus(Admin $admin)
    {
        $status = $admin->status == '1' ? 0 : 1;
        $admin->update(['status' => $status,]);
        return redirect()->route('admin.admins.index')->with('success', 'Admin status updated successfully');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Admin deleted successfully');
    }
}

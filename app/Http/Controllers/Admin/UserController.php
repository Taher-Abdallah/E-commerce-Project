<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function getDataTable(){
        $users=User::all();
        return DataTables::of($users)
        ->addIndexColumn()
        ->addColumn('action',function ($user){
            return view('admin.users.datatables.action',compact('user'));
        })
        ->addColumn(('status'),function ($user){
            return $user->status==1 ? 'Active' : 'Inactive';
        })
        ->addColumn('governorate_id', function ($user) {
            return $user->governorate ? $user->governorate->name : 'N/A';
        })
        ->addColumn('city_id', function ($user) {
            return $user->city ? $user->city->name : 'N/A';
        })
        ->addColumn('created_at',function ($user){
            return $user->created_at->diffForHumans();
        })
        ->make(true);
    }
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities=City::all();
        return view('admin.users.create',compact('cities'));    
    }


    public function store(UserRequest $request)
    {
        $data=$request->validated();
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    public function edit(string $id)
    {
        $user=User::find($id);
        $cities=City::all();
        return view('admin.users.edit',compact('user','cities'));
    }

    public function update(UserRequest $request, string $id)
    {
        $data=$request->validated();
        $user=User::find($id);
        $user->update($data);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }


    public function destroy(string $id)
    {
        $users=User::find($id);
        $users->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}

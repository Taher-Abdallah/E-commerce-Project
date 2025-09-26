<?php

namespace App\Repositories;

use App\Models\Role;

class RoleRepository
{

    public function getRoles(){
        return Role::paginate(7);
    }

    public function findId($id){
        return Role::findOrFail($id);
    }

    public function updateRole($request, $id){
        $role = $this->findId($id);
        $role->update($request);
        return $role;
    }

    public function deleteRole($id=null){
        $role = $this->findId($id);
        $role->delete();
    }

    public function storeRole($request){
        $role= Role::create($request);
        return $role;
    }
}

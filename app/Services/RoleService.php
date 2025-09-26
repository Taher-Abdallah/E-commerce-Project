<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    /**
     * Create a new class instance.
     */
    protected $roleRepository;
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getRoles(){
        return $this->roleRepository->getRoles();
    }

    public function findId($id){
        return $this->roleRepository->findId($id);
    }

    public function updateRole($request, $id=null){
        return $this->roleRepository->updateRole($request, $id);
    }

    public function deleteRole($id=null){
        return $this->roleRepository->deleteRole($id);
    }

    public function storeRole($request){
        return $this->roleRepository->storeRole($request);
    }
}

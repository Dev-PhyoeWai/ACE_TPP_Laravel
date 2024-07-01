<?php
namespace App\Repositories;
use App\Models\Role;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function getAll() {
        return $this->role->all();
    }

    public function getId($id) {
        return $this->role->find($id);
    }

    public function create(array $data) {
        return $this->role->create($data);
    }

    public function update(array $data, $id) {
        $role = $this->getId($id);
        $role->update($data);
        return $role;
    }

    public function delete($id) {
        $role = $this->getId($id);
        $role->delete();
    }
}

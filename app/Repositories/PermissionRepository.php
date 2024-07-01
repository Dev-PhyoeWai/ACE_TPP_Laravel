<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface{
    protected $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function getAll() {
        return $this->permission->all();
    }

    public function getId($id) {
        return $this->permission->find($id);
    }

    public function create(array $data) {
        return $this->permission->create($data);
    }

    public function update(array $data, $id) {
        $permission = $this->getId($id);
        $permission->update($data);
        return $permission;
    }

    public function delete($id) {
        $permission = $this->getId($id);
        $permission->delete();
    }
}

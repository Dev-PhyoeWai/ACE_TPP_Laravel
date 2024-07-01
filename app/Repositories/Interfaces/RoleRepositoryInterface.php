<?php
namespace App\Repositories\Interfaces;
interface RoleRepositoryInterface{
    public function getAll();
    public function getId($id);
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
}

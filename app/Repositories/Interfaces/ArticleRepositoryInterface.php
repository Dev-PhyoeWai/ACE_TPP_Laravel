<?php
namespace App\Repositories\Interfaces;
interface ArticleRepositoryInterface{
    public function getAll();
    public function getId($id);
    public function create(array $data);
//    public function store($data);
    public function update(array $data, $id);
    public function delete($id);
}

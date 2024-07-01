<?php

namespace App\Repositories\Interfaces;

interface StudentRepositoryInterface {
    public function getAll();
    public function getId($id);
    public function create();
    public function store(array $data);
    public function edit($id);
    public function update($id, array $data);
    public function delete($id);
}

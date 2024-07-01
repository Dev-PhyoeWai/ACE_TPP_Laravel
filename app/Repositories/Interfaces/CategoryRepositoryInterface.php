<?php

namespace App\Repositories\Interfaces;
    interface CategoryRepositoryInterface
    {
        public function getAll();
        public function getCategoryById($id);
        public function createCategory($id);
        public function storeCategory($id);
        public function updateCategory($id ,array $data);
        public function deleteCategory($id);
    }

<?php
namespace App\Repositories;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
class CategoryRepository implements CategoryRepositoryInterface{
    protected $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function getAll()
    {
        return $this->category->all();
    }
    public function getCategoryById($id){
        return $this->category->find($id);
    }
    public function createCategory($id)
    {
        return $this->category->create($id);
    }
    public function storeCategory($id)
    {
        return $this->createCategory($id);
    }
    public function updateCategory($id ,array $data){
        $category = $this->category->findOrFail($id);
        $category->update($data);
        return $category;
    }
    public function deleteCategory($id){
        $category = $this->category->findOrFail($id);
        return $category->delete();
    }

}

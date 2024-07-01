<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;
    }
    public function index(){
        $data = $this->categoryRepository->getAll();
        return view( 'categories.index', compact('data'));
    }
    public function result(){
        return view('categories.result');
    }
    public function create(){
        return view('categories.create');
    }

    public function store(Request $request){
        $this->categoryRepository->storeCategory([
            'name' => $request->name,
        ]);
        return redirect()->route('categoryIndex');
    }

    public function edit($id){
        $data = $this->categoryRepository->getCategoryById($id);
        return view('categories.edit', compact('data'));
    }

    public function update(Request $request,$id){
        $this->categoryRepository->updateCategory($id, [
            'name' => $request->name,
        ]);

        return redirect()->route('categoryIndex');
    }

    public function destroy($id){
        $this->categoryRepository->deleteCategory($id);
        return redirect()->route('categoryIndex');
    }

}


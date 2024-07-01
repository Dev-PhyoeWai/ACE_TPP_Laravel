<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->middleware('auth');
        $this->productRepository = $productRepository;
    }
    public function index()
    {
        $product_item = $this->productRepository->getAll();
        return view('product.index', compact('product_item'));
    }
    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['images'] = $request->file('images');
        $this->productRepository->store($data);

        return redirect()->route('productIndex');
    }
    public function edit($id)
    {
        $data = $this->productRepository->getById($id);
        if (!$data) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }

        return view('product.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['images'] = $request->file('images');
        $this->productRepository->update($id, $data);

        return redirect()->route('productIndex');
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);
        return redirect()->route('productIndex');
    }
}

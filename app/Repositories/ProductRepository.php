<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Repositories\Interfaces\ProductRepositoryInterface;
class ProductRepository implements ProductRepositoryInterface {
    protected $product;
    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function getAll() {
        return $this->product->with('images')->get();
    }

    public function getById($id) {
        return $this->product->with('images')->find($id);
    }

    public function create(array $data) {
        return $this->product->create($data);
    }

    public function store(array $data) {
        $product = $this->create($data);

        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }

        return $product;
    }

    public function update($id, array $data) {
        $product = $this->product->findOrFail($id);
        $product->update($data);

        if (isset($data['images'])) {
            foreach ($product->images as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            foreach ($data['images'] as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }

        return $product;
    }

    public function delete($id) {
        $product = $this->product->findOrFail($id);

        foreach ($product->images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        return $product->delete();
    }
}

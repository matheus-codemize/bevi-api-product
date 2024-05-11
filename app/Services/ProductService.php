<?php

namespace App\Services;

use App\Models\Product;
use Exception;

class ProductService implements ProductServiceInterface
{
    public function index()
    {
        return Product::all();
    }

    public function store(string $name, float $price, int $stock_quantity)
    {
        $status = 'stock';
        $product = Product::create([
            'name' => $name,
            'price' => $price,
            'status' => $status,
            'stock_quantity' => $stock_quantity
        ]);

        return $product;
    }

    public function update(int $id, array $data)
    {
        $product = Product::find($id);

        if (!$product) {
            throw new Exception('Produto não encontrado');
        }

        $product->update($data);

        return $product;
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);

        if (!$product) {
            throw new Exception('Produto não encontrado');
        }

        $product->delete();
    }
}

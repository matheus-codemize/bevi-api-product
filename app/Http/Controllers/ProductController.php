<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductServiceInterface;
use Exception;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index() {
        try
        {
            return $this->productService->index();
        }
        catch(Exception $e)
        {
            $error = ['error' => $e->getMessage()];
            return response()->json($error, 400);
        }
    }

    public function store(CreateProductRequest $request)
    {
        try
        {
            return $this->productService->store(
                $request->get('name'),
                $request->get('price'),
                $request->get('stock_quantity')
            );
        }
        catch(Exception $e)
        {
            $error = ['error' => $e->getMessage()];
            return response()->json($error, 400);
        }
    }

    public function update(int $id, UpdateProductRequest $request)
    {
        try
        {
            return $this->productService->update(
                $id,
                $request->all()
            );
        }
        catch(Exception $e)
        {
            $error = ['error' => $e->getMessage()];
            return response()->json($error, 400);
        }
    }

    public function destroy(int $id)
    {
        try
        {
            $this->productService->destroy($id);
        }
        catch(Exception $e)
        {
            $error = ['error' => $e->getMessage()];
            return response()->json($error, 400);
        }
    }
}

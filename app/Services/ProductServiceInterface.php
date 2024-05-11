<?php

namespace App\Services;

interface ProductServiceInterface
{
    function index();
    function store(string $name, float $price, int $stock_quantity);
    function update(int $id, array $data);
    function destroy(int $id);
}

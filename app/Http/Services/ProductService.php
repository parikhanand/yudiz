<?php

namespace App\Http\Services;

use App\Models\Product;

class ProductService
{
    public function create($data)
    {
        return Product::create($data);
    }
}
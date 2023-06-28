<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function list(){
        $products = Product::get(['id','name','description','price','product_code','unit_code']);
        return response()->json([
            'data' => $products,
            'status' => 200
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $nameProducts = array($product['name']);
        }
//        dd($nameProducts);
        return view('store.index', compact('products'));
    }
}

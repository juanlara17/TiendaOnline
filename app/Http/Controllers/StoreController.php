<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\View\View;
use TwigBridge\ServiceProvider;

class StoreController extends Controller
{
    public function index()
    {

//        dd($nameProducts)
        return \view('/page.index');
    }

    public function catalog()
    {
        $products = Product::all();

        foreach ($products as $product) {
            $nameProducts = array($product['name']);
        }
        return \view('store.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
//        dd($product);

        return \view('/store.show', compact('product'));
    }
}

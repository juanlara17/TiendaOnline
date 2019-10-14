<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TwigBridge\ServiceProvider;

class CartController extends Controller
{
    public function __construct()
    {
        if (!\Session::has('cart')) \Session::put('cart', array());
    }

    /***** SHOW CART *****/

    public function show()
    {
        $cart = \Session::get('cart');
        return \view('store.cart', compact('cart'));
    }

    /***** ADD ITEM *****/
    public function add(Product $product)
    {
        $cart = \Session::get('cart');
        $product->quantity = 1;
        $cart[$product->slug] = $product;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    /***** DELETE ITEM *****/
    public function delete(Product $product)
    {
        $cart = \Session::get('cart');
        unset($cart[$product->slug]);
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    /***** UPDATE ITEM *****/
    public function update()
    {

    }

    /***** TRASH CART *****/
    public function trash()
    {

    }
    /***** TOTAL ******/
    public function total()
    {

    }

}

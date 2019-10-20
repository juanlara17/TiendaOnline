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
        $total = $this->total();
        return \view('store.cart', compact('cart', 'total'));
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
    public function update(Product $product, $quantity)
    {
        $cart = \Session::get('cart');
        $cart[$product->slug]->quantity = $quantity;
        \Session::put('cart', $cart);

        return redirect()->route('cart-show');
    }

    /***** TRASH CART *****/
    public function trash()
    {
        \Session::forget('cart');
        return redirect()->route('cart-show');
    }
    /***** TOTAL ******/
    private function total()
    {
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total = $total + $item->price * $item->quantity;
        }

        return $total;
    }

    /***** DETALLE DEL PEDIDO ******/
    public function orderdetail()
    {
        if (count(\Session::get('cart')) <= 0) return redirect()->route('catalogo');
        $cart = \Session::get('cart');
        $total = $this->total();

        return \view('store.order-detail', compact('cart','total'));
    }

}

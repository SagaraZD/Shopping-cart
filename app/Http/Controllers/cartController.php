<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Session;

use App\Http\Requests;
use App\Type as Type;
use App\Product as Product;
use App\Cart;

class cartController extends Controller
{
  //Cart functions
  public function addToCart(\Illuminate\Http\Request  $request) {
    $product_id= $request['product_id'];
    $product = Product::find($product_id);
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cartQty = $cart->add($product, $product->id);
    $request->session()->put('cart', $cart);
    return $cartQty;
  }


// Cart Reduce by one
  public function reduceByOne($id) {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->reduceByOne($id);
    if (count($cart->items) > 0) {
      Session::put('cart', $cart);
    } else {
      Session::forget('cart');
    }
    return redirect()->route('member-get-cart');
  }

//Remove Cart Item
  public function removeItem($id) {
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    if (count($cart->items) > 0) {
      Session::put('cart', $cart);
    } else {
      Session::forget('cart');
    }
    return redirect()->route('member-get-cart');
  }

  //Get Cart
  public function getCart() {
    if (!Session::has('cart')) {
      return view('cart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
  }
}

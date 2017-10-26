<?php

namespace App\Http\Controllers;

use Auth;
use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
	public function showCart() {
		$customer_id = Auth::user()->id;

		$carts = CartItem::where('customer_id', $customer_id)->get();

		return view('cart', compact('carts'));
	}

    public function addToCart(Request $request) {
    	$product_code = $request -> product_code;
    	$product_name = $request -> product_name;
    	$product_price = $request -> product_price;
    	$image = $request -> image;
    	$quantity = $request -> quantity;
    	$customer_id = Auth::user()->id;

    	$product = new CartItem;
    	$product -> product_code = $product_code;
    	$product -> product_name = $product_name;
    	$product -> product_price = $product_price;
    	$product -> image = $image;
    	$product -> quantity = $quantity;
    	$product -> customer_id = $customer_id;
    	$product -> save();

    	Session::flash('message', $product_name." added to cart.");
    	return redirect('/home');
    }

    public function deleteToCart(Request $request) {
    	$product_code = $request -> product_code;
    	$customer_id = Auth::user()->id;

    	$delete = CartItem::where([
    		['customer_id', $customer_id],
    		['product_code', $product_code]
    	])->delete();

    	return redirect('/cart');
    }
}

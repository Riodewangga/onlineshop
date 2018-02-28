<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Cart;

use App\Http\Requests;
use Session;
use Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('index');
    }

    public function getReduceByOne($id)
    {
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->reduceByOne($id);

		if (count($cart->items) > 0)
    	{
    		Session::put('cart', $cart);	
    	} else {
    		Session::forget('cart');
    	}
    	
    	return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->removeItem($id);

    	if (count($cart->items) > 0)
    	{
    		Session::put('cart', $cart);	
    	} else {
    		Session::forget('cart');
    	}

    	return redirect()->route('product.shoppingCart');
    }

    public function getCart()
    {
    	if (!Session::has('cart')) {
    		return view('shoppingcart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	return view ('shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
    	if(!Session::has('cart')) {
    		return view('shoppingcart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);
    	$total = $cart->totalPrice;
    	return view('checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
    	if (!Session::has('cart')) {
    		return redirect()->route('shoppingCart');
    	}
    	$oldCart = Session::get('cart');
    	$cart = new Cart($oldCart);

    	/**Stripe::setApiKey('sk_test_J4ornnuZjFEbQ05rAiHxmGsV');
    	try {
    	 $charge = Charge::create(array(
			  "amount" => $cart->totalPrice * 100,
			  "currency" => "usd",
			  "source" => $request->input('stripeToken'), // obtained with Stripe.js
			  "description" => "Test Charge"
			));
			$order = new Order();
			$order->cart = serialize($cart);
			$order->address = $request->input('address');
			$order->name = $request->input('name');
			$order->payment_id = $charge->id;
		
			Auth::user()->orders()->save($order);
    	} catch (\Exception $e) {
    		return redirect()->route('checkout')->with('error', $e->getMessage());
    	}**/

    	Session::forget('cart');
    	return redirect()->route('index')->with('success', 'Successfully purchased products!');
    }
}

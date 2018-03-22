<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Storage;
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
    public function index(Request $request)
    {
        $search = $request->input('search');
        $product = Product::latest()
            ->search($search)
            ->paginate(env('PER_PAGE'));
        // dd($product);
        return view('home',compact('product', 'search'));
    }

    public function opencart($slug) 
    {
        $product = Product::where('slug', $slug)->first();

        return view('opencart', compact('product'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function create()
    {
        $categories = Category::all();

        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
         $this->validate(request(),[
            'category_id' => 'required',
            'imagePath' => 'image|mimes:jpg,jpeg,png,bmp',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $imagePath = $request->file('imagePath')->store('imageproduct');

        Product::create([
            'category_id' => request('category_id'),
            'user_id' => auth()->user()->id,
            'imagePath' => $imagePath,
            'title' => request('title'),
            'slug' => str_slug(request('title'), '-'),
            'description' => request('description'),
            'price' => request('price')
        ]);

        return redirect()->route('index');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->imagePath);
        $product->delete();

        return redirect()->route('index');
    }

    public function showProductByCat(Request $request, $categoryId)
    {
        $search = $request->input('search');
        $product = Product::where('category_id', $categoryId)
            ->search($search)
            ->paginate(env('PER_PAGE'));
        // dd($product);
        return view('showbycat',compact('product', 'search'));
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

    public function edit(Product $product)
    {
        $categories = Category::all();


        return view('edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $imagePath = $product->imagePath;

        $this->validate(request(),[
            'category_id' => 'required',
            'imagePath' => 'image|mimes:jpg,jpeg,png,bmp',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        if($request->hasFile('imagePath') ){
            $imagePath = $request->file('imagePath')->store('imageproduct');
            Storage::delete($product->imagePath);
        }

        $product->update([
            'category_id' => request('category_id'),
            'imagePath' => $imagePath,
            'title' => request('title'),
            'slug' => str_slug(request('title'), '-'),
            'description' =>request('description'),
            'price' => request('price')
        ]);

        return redirect()->route('index');
    }
}

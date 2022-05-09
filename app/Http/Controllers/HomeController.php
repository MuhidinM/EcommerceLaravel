<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderdItem;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function home()
    {
        $store = Store::paginate(10);
        return view('main.home')->with('stores', $store);
    }

    public function tests()
    {
        return view('tests');
    }

    public function index()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            $user = User::all();
            $user_count = $user->count();
            $store = Store::all();
            $store_count = $store->count();
            $product = Product::all();
            $product_count = $product->count();
            $order = Order::all();
            $order_count = $order->count();
            return view('admin.home')->with('users', $user_count)->with('stores', $store_count)->with('products', $product_count)->with('orders', $order_count);
        } else {
            $product = Product::where('store_id', auth()->id())->get();
            $product_count = $product->count();
            $order = Order::with(['order' => function($query){
                $query->where('store_id', auth()->id());
            }])->get();
            $order_count = $order->count();
            return view('client.home')->with('products', $product_count)->with('orders', $order_count);
        }
    }

    public function store($id)
    {
        $product = Store::orderBy('created_at', 'desc')->with('categories', 'products')->find($id);
        return view('main.store')->with('product', $product);
    }

    public function detail($client_id, $product_id)
    {
        $product = Product::find($product_id);
        return view('main.detail')->with('product', $product);
    }

    public function categories($client_id, $category_id)
    {
        $product = Store::with('categories', 'products')->find($client_id);
        return view('main.categories')->with('product', $product)->with('category_id', $category_id);
    }

    public function detail2($client_id, $category_id, $product_id)
    {
        $product = Product::find($product_id);
        return view('main.detail')->with('product', $product);
    }

    public function addcart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect('cart')->with('status', 'Cart added!');
    }

    public function getreduce($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($id);

        Session::put('cart', $cart);
        return redirect('cart');
    }

    public function getremoveall($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeall($id);

        if(count($cart->items) > 0){
                Session::put('cart', $cart);
        }else {
            Session::forget('cart');
        }


        return redirect('cart');
    }

    public function cart()
    {
        if (!Session::has('cart')) {
            return view('main.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('main.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalprice]);
    }

    public function checkout()
    {
        if (!Session::has('cart')) {
            return view('main.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $tax = $cart->totalprice * 0.05;
        $total = $cart->totalprice + $tax;
        return view('main.ceckout', ['total' => $total]);
    }

    public function order(Request $request)
    {
        if (!Session::has('cart')) {
            return view('main.cart');
        }

        $request->validate([
            'first_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $oldCart = Session::get('cart');
        $carts = new Cart($oldCart);
        $cart = $carts->items;
        $order = $request->all();
        $data = Order::create($order);
        $order_id = $data->id;

        foreach ($cart as $key => $value) {
            $qty = $cart[$key]['qty'];
            $store = Product::with('store')->where('id', $key)->get();
            $product_id = $store[0]->id;
            $store_id = $store[0]->store->id;
            $orderitem = new OrderdItem;
            $orderitem->quantity = $qty;
            $orderitem->store_id = $store_id;
            $orderitem->order_id = $order_id;
            $orderitem->product_id = $product_id;
            $orderitem->save();
        }
        Session::forget('cart');
        return view('main.order_complete', ['products' => $cart, 'totalPrice' => $carts->totalprice])->with('order',$order)->with('date',$data->created_at );
    }
}

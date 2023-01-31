<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\SnapToken;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    public function main()
    {
        $data = [
            'title' => 'Homepage | Urban Adventure',
            'products' => Product::get(),
            'categories' => Category::first()->get(),
            'brands' => Brand::with(['products'])->latest()->get()
        ];
        return view('frontpage.main.main', $data);
    }
    public function category(Category $category)
    {
        $data = [
            'title' => 'Category | Urban Adventure',
            'products' => $category->products,
            'name' => $category,
            'categories' => Category::first()->get(),
            'brands' => Brand::with(['products'])->latest()->get()
        ];
        return view('frontpage.category.category', $data);
    }
    public function brand(Brand $brand)
    {
        $data = [
            'title' => 'Category | Urban Adventure',
            'products' => $brand->products,
            'name' => $brand,
            'categories' => Category::first()->get(),
            'brands' => Brand::with(['products'])->latest()->get()
        ];
        return view('frontpage.category.category', $data);
    }
    public function quickview(Product $product)
    {
        $data = [
            'title' => 'Quickview | Urban Adventure',
            'product' => $product,
            'brands' => Brand::with(['products'])->latest()->get(),
            // 'products' => Product::latest()->get()->random(Product::all()->count() > 6 ? 6 : Product::all()->count()),
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.quickview.quickview', $data);
    }
    public function cart()
    {
        $data = [
            'isUser' => auth()->user(),
            'cart' => auth()->user()->cart ?? [],
            'weight' => 0,
            'title' => 'Cart | Urban Adventure',
            'categories' => Category::first()->get(),
            'brands' => Brand::with(['products'])->latest()->get(),
        ];
        foreach ($data['cart'] as $item) {
            $data['weight'] += ($item->product->weight * 1000);
        }
        return view('frontpage.cart.cart', $data);
    }
    public function product_detail(Product $product)
    {
        $data = [
            'title' => 'Detail Product | Urban Adventure',
            'product' => $product,
            'brands' => Brand::with(['products'])->latest()->get(),
            'products' => Product::latest()->get()->random(Product::all()->count() > 6 ? 6 : Product::all()->count()),
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.product.product-detail', $data);
    }
    public function checkout(Request $request)
    {

        if ($request->isMethod('GET')) {
            $cart = Cart::where('user_id', auth()->user()->id)->get();
            $data = [
                'title' => 'Check Out | Urban Adventure',
                'isUser' => auth()->user(),
                'weight' => 0,
                'brands' => Brand::with(['products'])->latest()->get(),
                'categories' => Category::first()->get(),
                'cart' => Product::whereIn('product_code', $cart->map(function ($item) {
                    return $item->product_id;
                }))->get()->each(function ($item, $index) use ($cart) {
                    $item->amount = $cart->where('product_id', $item->product_code)->where('user_id', auth()->user()->id)->first()->amount;
                })
            ];

            foreach ($data['cart'] as $item) {
                $data['weight'] += ($item->weight * 1000);
            }
            return view('frontpage.cart.checkout', $data);
        }
        if ($request->isMethod('POST')) {
            $product = Product::whereIn('product_code', request()->product_code)->get();
            $data = [
                'title' => 'Check Out | Urban Adventure',
                'isUser' => auth()->user(),
                'weight' => 0,
                'brands' => Brand::with(['products'])->latest()->get(),
                'categories' => Category::first()->get(),
                'cart' => $product->each(function ($item, $index) {
                    $item->amount = (request()->cart[$index]["quantity"] > $item->stock ? $item->stock : request()->cart[$index]["quantity"]);
                })
            ];

            foreach ($data['cart'] as $item) {
                $data['weight'] += ($item->weight * 1000);
            }
            return view('frontpage.cart.checkout', $data);
        }
    }

    public function execute_order(Request $request)
    {
        // local function
        function countGrossAmount($array = [], $shipping_cost, $starting_value = 0)
        {
            $starting_value = 0;
            foreach ($array as $index => $item) {
                $starting_value += $item['price'] * $item['quantity'];
            }
            return $starting_value + $shipping_cost;
        }
        // local function
        $validator = Validator::make($request->all(), [
            'weight' => 'required|numeric|min:1',
            'customer.name' => 'required|string',
            'customer.id' => 'required|numeric',
            'customer.fullname' => 'required|string',
            'customer.email' => 'required|email:dns',
            'customer.phone' => 'required|numeric',
            'customer.address' => 'required|string',
            'destination.province_id' => 'required|numeric',
            'destination.city_id' => 'required|numeric',
            'cart.*.name' => 'required|string',
            'cart.*.id' => 'required|string',
            'cart.*.quantity' => 'required|numeric|min:1',
            'cart.*.price' => 'required|numeric',
            'shipping.cost' => 'required|numeric',
            'shipping.province' => 'required|string',
            'shipping.city' => 'required|string',
            'comments' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', "Order Can't Execute, Try Again!");
        }
        $validated = $validator->validated();

        // preparing data for snaptoken
        $transaction_details = [
            'order_id' => Str::random(12),
            'gross_amount' => countGrossAmount($validated['cart'], $validated['shipping']['cost'])
        ];

        $item_details = $validated['cart'];
        // check avaiavility stock
        foreach ($item_details as $key => $item) {
            $product = Product::find($item['id']);
            if ($product->stock < request()->cart[$key]['quantity']) {
                if ($product->stock < 1) {
                    return redirect()->route('checkout')->with('error', 'Product ' . $product->name . "Out Of Stock!");
                }
                return redirect()->route('checkout')->with('error', "You Order " . $product->name . " Too Much!");
            }
        }
        array_push($item_details, [
            'name' => 'Delivery Service JNE',
            'quantity' => 1,
            'id' => 'JNE',
            'price' => $validated['shipping']['cost']
        ]);

        $customer_details = $validated['customer'];
        $shipping_address = [
            "name" => $validated['customer']['name'],
            "email" =>  $validated['customer']['email'],
            "phone" =>  $validated['customer']['phone'],
            "address" =>  $validated['customer']['address'],
            "province" => $validated['shipping']['province'],
            "city" => $validated['shipping']['city'],
            "cost" => $validated['shipping']['cost']
        ];
        // preparing data for snaptoken

        // sending to view
        $cart = Cart::where('user_id', auth()->user()->id)->get();
        $data = [
            'title' => "Prepare To Order",
            'isUser' => auth()->user(),
            'weight' => 0,
            'brands' => Brand::with(['products'])->latest()->get(),
            'snap' => SnapToken::claim($transaction_details, $customer_details, $item_details, $shipping_address),
            'categories' => Category::first()->get(),
            'shipping' => $shipping_address,
            'transaction' => $transaction_details,
            'comments' => $validated['comments'],
            'cart' => Product::whereIn('product_code', $cart->map(function ($item) {
                return $item->product_id;
            }))->get()->each(function ($item, $index) use ($cart) {
                $item->amount = $cart->where('product_id', $item->product_code)->where('user_id', auth()->user()->id)->first()->amount;
            })
        ];
        // sending to view

        // create order before show the page
        $order = Order::generate($customer_details, $shipping_address, $item_details, $transaction_details);
        // create order before show the page

        // return $order;

        return redirect()->route('order_detail', ['order' => $order]);
    }
    public function blog_detail()
    {
        $data = [
            'title' => 'Detail Blog | Urban Adventure',
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.blog.blog-detail', $data);
    }
    public function blog()
    {
        $data = [
            'title' => 'Blog | Urban Adventure',
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.blog.blog-page', $data);
    }
    public function order_detail(Order $order)
    {
        if ($order->email != auth()->user()->email) {
            return redirect()->route('main')->with('error', 'Thats Not Your Order!');
        }
        $data = [
            'title' => "Prepare To Order",
            'isUser' => auth()->user(),
            'weight' => 0,
            'order' => $order,
            'brands' => Brand::with(['products'])->latest()->get(),
            'snap' => $order->payment_token,
            'categories' => Category::first()->get(),
            'cart' => $order->details->slice(0, -1)
        ];
        return view('frontpage.cart.execute-order', $data);
    }
    public function order_history()
    {
        $data = [
            'brands' => Brand::with(['products'])->latest()->get(),
            'title' => 'Detail Order | Urban Adventure',
            'categories' => Category::first()->get(),
            'orders' => auth()->user()->orders
        ];
        return view('frontpage.order.order-history', $data);
    }
    public function my_account()
    {
        $data = [
            'brands' => Brand::with(['products'])->latest()->get(),
            'title' => 'Profile | Urban Adventure',
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.profile.my-account', $data);
    }
    public function wishlist()
    {
        $data = [
            'title' => 'Whislist | Urban Adventure',
            'wishlist' => auth()->user()->wishlists ?? [],
            'categories' => Category::first()->get(),
        ];
        return view('frontpage.wishlist.wishlist', $data);
    }
}

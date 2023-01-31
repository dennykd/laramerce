<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function allCart()
    {
        $data = [
            'title' => 'Carts | Urban Adventure'
        ];
        return view('dashboard.user.cart.all-cart', $data);
    }

    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required|numeric',
            'user_id' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Failed!'
            ]);
        }
        $validated = $validator->validate();

        if (Cart::create([
            'user_id' => $validated['user_id'],
            'product_code' => $validated['product_code'],
            'amount' => $validated['amount'],
        ])) {
            return response()->json([
                'status' => 200,
                'message' => 'Product Added To Your Cart!'
            ]);
        } else {
            return response()->json([
                'status' => 201,
                'message' => 'Something Went Wrong!'
            ]);
        }
    }

    public function changeAmount(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required|numeric',
            'user_id' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Failed!'
            ]);
        }
        $validated = $validator->validate();
        $product_on_cart = Cart::where('user_id', $validated['user_id'])->orWhere('product_code', $validated['product_code'])->get();
        if ($product_on_cart->count()) {
            if ($product_on_cart->first()->update([
                'amount' => $validated['amount'],
            ])) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Amount Increased!'
                ]);
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => 'Something Went Wrong!'
                ]);
            }
        }
        return response()->json([
            'status' => 201,
            'message' => 'Product Not Found!'
        ]);
    }

    public function deleteItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required|numeric',
            'user_id' => 'required|numeric',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Failed!'
            ]);
        }
        $validated = $validator->validate();
        $product_on_cart = Cart::where('user_id', $validated['user_id'])->orWhere('product_code', $validated['product_code'])->get();
        if ($product_on_cart->count()) {
            if ($product_on_cart->first()->delete()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Deleted!'
                ]);
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => 'Something Went Wrong!'
                ]);
            }
        }
        return response()->json([
            'status' => 201,
            'message' => 'Product Not Found!'
        ]);
    }
}

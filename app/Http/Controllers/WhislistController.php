<?php

namespace App\Http\Controllers;

use App\Models\Whislist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhislistController extends Controller
{
    public function wish(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_code' => 'required|numeric',
            'user_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation Failed!'
            ]);
        }
        $validated = $validator->validate();
        $product_on_wish = Whislist::where('user_id', $validated['user_id'])->orWhere('product_code', $validated['product_code'])->get();
        if ($product_on_wish->count()) {
            if ($product_on_wish->first()->delete()) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Wish Product Deleted!'
                ]);
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => 'Something Went Wrong!'
                ]);
            }
        } else {
            if (Whislist::create([
                'product_code' => $validated['product_code'],
                'user_id' => $validated['user_id'],
            ])) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Product Added To WishList!'
                ]);
            } else {
                return response()->json([
                    'status' => 201,
                    'message' => 'Something Went Wrong!'
                ]);
            }
        }
    }
}

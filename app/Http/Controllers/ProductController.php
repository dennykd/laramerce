<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function allProduct()
    {
        $data = [
            'title' => 'Products | Urban Adventure',
            'products' => Product::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::latest()->get(),
        ];
        return view('dashboard.admin.products.product-all', $data);
    }

    public function createProduct()
    {
        $data = [
            'title' => 'Add New Products | Urban Adventure',
            'categories' => Category::latest()->get(),
            'brands' => Brand::latest()->get()
        ];
        return view('dashboard.admin.products.product-add', $data);
    }

    public function detailProduct(Product $product)
    {
        $data = [
            'title' => 'Product Detail | Urban Adventure',
            'product' => $product
        ];
        return view('dashboard.admin.products.product-detail', $data);
    }
    public function updateProduct(Product $product)
    {
        $data = [
            'title' => 'Update Products | Urban Adventure',
            'product' => $product,
            'categories' => Category::latest()->get(),
            'brands' => Brand::latest()->get()
        ];
        return view('dashboard.admin.products.product-update', $data);
    }
    public function storeProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'product_code' => 'required|string|unique:products,product_code',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'condition' => ['required', Rule::in('new', 'second')],
            'weight' => 'required|numeric',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Input Failed!<br>Please Try Again With Correct Input');
        }
        $validated = $validator->validated();
        $created_product = Product::create([
            'name' => $validated['name'],
            'product_code' => $validated['product_code'],
            'category_id' => $validated['category_id'] == 0 ? NULL : $validated['category_id'],
            'brand_id' => $validated['brand_id'] == 0 ? NULL : $validated['brand_id'],
            'condition' => $validated['condition'],
            'weight' => $validated['weight'] / 1000,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'description' => $validated['description'],
        ]);
        if ($created_product) {
            return redirect()->route('manage_product.all')->with('success', 'New Category Successfully Added');
        }
        return redirect()->back()->with('error', 'Error Occured, Please Try Again');
    }
    public function patchProduct(Product $product, Request $request)
    {
        if ($request->product_code != $product->product_code) {
            if (Product::where('product_code', $product->product_code)->whereNot('id', $product->id)->count()) {
                return redirect()->back()->withInput()->with('error', 'This product has been registered, please input another product');
            } else {
                $code_validator = Validator::make($request->all(), [
                    'product_code' => 'required|string|unique:products,product_code',
                ]);

                if ($code_validator->fails()) {
                    return redirect()->back()->withErrors($code_validator)->withInput()->with('error', 'OPPS! <br> An Error Occurred During Updating!');
                }

                $validated_code = $code_validator->validate();
                $product->update(['product_code' => $validated_code['product_code']]);
            }
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'condition' => ['required', Rule::in('new', 'second')],
            'weight' => 'required|numeric',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Input Failed!<br>Please Try Again With Correct Input');
        }
        $validated = $validator->validated();
        $product->touch();
        $updated_product = $product->update([
            'name' => $validated['name'],
            'category_id' => $validated['category_id'] == 0 ? NULL : $validated['category_id'],
            'brand_id' => $validated['brand_id'] == 0 ? NULL : $validated['brand_id'],
            'condition' => $validated['condition'],
            'weight' => $validated['weight'] / 1000,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            // 'description' => $validated['description'],
        ]);
        if ($updated_product) {
            return redirect()->route('manage_product.all')->with('success', 'New Category Successfully Added');
        }
        return redirect()->back()->with('error', 'Error Occured, Please Try Again');
    }
    public function deleteProduct(Product $product)
    {
        if ($product->delete()) {
            return redirect()->route('manage_product.all')->with('success', 'This Product Successfully Deleted');
        }
        return redirect()->back()->with('error', 'Error Occured, Please Try Again!');
    }
}

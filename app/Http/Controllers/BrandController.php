<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function allBrand()
    {
        $data = [
            'title' => 'Brands | Urban Adventure',
            'brand' => Brand::latest()->get(),
        ];
        return view('dashboard.admin.brand.brand-all', $data);
    }

    public function createBrand()
    {
        $data = [
            'title' => 'Add New Brand | Urban Adventure',
        ];
        return view('dashboard.admin.brand.brand-add', $data);
    }

    public function detailBrand(Brand $brand)
    {
        $data = [
            'title' => 'Brand Detail | Urban Adventure',
            'brand' => $brand,
            'products' => $brand->products
        ];
        return view('dashboard.admin.brand.brand-detail', $data);
    }

    public function updateBrand(Brand $brand)
    {
        $data = [
            'title' => 'Brand Update | Urban Adventure',
            'brand' => $brand,
            'products' => $brand->products
        ];
        return view('dashboard.admin.brand.brand-edit', $data);
    }

    public function storeBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'brand_code' => 'required|string|unique:brands,brand_code',
            'description' => 'required|string'
        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Input error!');
        }

        $brand_created = Brand::create($validator->validate());
        if ($brand_created) {
            return redirect()->route('manage_brand.all')->with('success', 'New brand successfully created');
        }
        return redirect()->back()->with('error', 'Something Error! <br> Try Again!');
    }

    public function patchBrand(Brand $brand, Request $request)
    {
        if ($request->brand_code != $brand->brand_code) {
            if (Brand::where('brand_code', $brand->brand_code)->whereNot('id', $brand->id)->count()) {
                return redirect()->back()->withInput()->with('error', 'This brand has been registered, please input another brand');
            } else {
                $code_validator = Validator::make($request->all(), [
                    'brand_code' => 'required|string|unique:brands,brand_code',
                ]);

                if ($code_validator->fails()) {
                    return redirect()->back()->withErrors($code_validator)->withInput()->with('error', 'OPPS! <br> An Error Occurred During Updating!');
                }

                $validated_code = $code_validator->validate();
                $brand->update(['brand_code' => $validated_code['brand_code']]);
            }
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string'
        ]);

        if ($validator->failed()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Input error!');
        }
        $brand->touch();
        $brand_updated = $brand->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        if ($brand_updated) {
            return redirect()->route('manage_brand.all')->with('success', 'New brand successfully updated');
        }
        return redirect()->back()->with('error', 'Something Error! <br> Try Again!');
    }

    public function deleteBrand(Brand $brand)
    {
        if ($brand->delete()) {
            return redirect()->route('manage_brand.all')->with('success', $brand->name . "successfully deleted");
        }
        return redirect()->back()->with('error', $brand->name . "delete failed");
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function allOrder()
    {
        $data = [
            'title' => 'Orders | Urban Adventure',
            'order' => Order::latest()->get()
        ];
        return view('dashboard.admin.orders.order-all', $data);
    }

    public function createOrder()
    {
        $data = [
            'title' => 'Add New Order | Urban Adventure'
        ];
        return view('dashboard.admin.orders.order-add', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'orders.*.product' => 'required|string',
            'orders.*.amount' => 'required|numeric',
            'orders.*.price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Something Error With Your Input!')->withInput()->withErrors($validator);
        }
    }

    public function detailOrder(Order $order)
    {
        $data = [
            'title' => 'Order Detail | Urban Adventure',
            'order' => $order
        ];
        return view('dashboard.admin.orders.order-detail', $data);
    }
}

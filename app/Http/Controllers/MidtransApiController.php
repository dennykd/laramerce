<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MidtransApiController extends Controller
{
    public function paymentNotif(Request $request)
    {
        $json = json_decode($request->getContent());
        $signatureKey = hash('SHA512', $json->order_id . $json->status_code . $json->gross_amount . config('midtrans.server_key'));
        if ($signatureKey == $json->signature_key) {
            $order = Order::find($json->order_id);
            $updated = $order->update([
                'transaction_status' => $json->transaction_status
            ]);

            if ($updated) {
                Mail::to($order->email)->send(new OrderMail($order));
            }

            // return 'same';
        }
        // return 'not same';
    }
}

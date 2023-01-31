<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Midtrans\Config as MDConfig;
use Midtrans\Snap as MDSnap;

class SnapToken extends Model
{
    use HasFactory;

    public static function claim($transaction_details = [], $customer_details = [], $item_details = [], $shipping_address = [])
    {
        MDConfig::$serverKey = config('midtrans.server_key');
        MDConfig::$isProduction = false;
        MDConfig::$isSanitized = true;
        MDConfig::$is3ds = true;

        $details = [];
        if (!count($transaction_details) || !count($customer_details) || !count($item_details) || !count($customer_details)) {
            return false;
        }
        $details['transaction_details'] = $transaction_details;
        $details['customer_details'] = $customer_details;
        $details['item_details'] = $item_details;
        $details['shipping_address'] = $shipping_address;

        return MDSnap::getSnapToken($details);
    }
}

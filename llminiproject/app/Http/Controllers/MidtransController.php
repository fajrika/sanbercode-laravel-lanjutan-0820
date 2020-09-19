<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MidtransController extends Controller
{
    public function snap(Request $request){
        \Midtrans\Config::$serverKey = 'SB-Mid-server-9poYSyd6myPYlQlFwALCpcBH';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->total,
            ),
            'customer_details' => array(
                'first_name' => User::where('uuid',$request->header('Authorization'))->first()->name,
                'last_name' => '',
                'email' => User::where('uuid',$request->header('Authorization'))->first()->email,
                'phone' => '08111222333',
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return DefaultResource::make([
            'message' => 'Success, store data',
            'metadata' => [
                "url" =>"https://app.sandbox.midtrans.com/snap/v2/vtweb/".$snapToken,
                "token" => $snapToken
            ]
        ]);
    }
}

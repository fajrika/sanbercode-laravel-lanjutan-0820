<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::with('category')->get()->toArray();
        Log::info('Load Product : ', 
            [
                'user' => User::find($request->header('Authorization'))->first()->toArray(),
                'data' => $data
            ]
        );
        return DefaultResource::make ([
            'message' => 'Success, load all data',
            'metadata' => $data
        ]);
    }
    public function store(Request $request)
    {
        
    }
    public function show(Order $order)
    {
        
    }

    public function update(Request $request, Order $order)
    {
        
    }

    public function destroy(Order $order)
    {

    }
}

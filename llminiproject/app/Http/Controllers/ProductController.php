<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
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
        Log::info('Store Product : ', 
            [
                'user' => User::find($request->header('Authorization'))->first()->toArray(),
                'data' => $request->all()
            ]
        );
        sleep(1);
        $request->validate([
            'name' => 'required|max:45',
            'price' => 'required|numeric',
            'category_uuid' => 'required|exists:categories,uuid',
            'description' => 'required|max:255'
        ]);
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_uuid' => $request->category_uuid,
            'description' => $request->description
        ]);;
        return DefaultResource::make([
            'message' => 'Success, store data',
            'metadata' => $product
        ]);
    }
    public function show(Request $request, Product $product)
    {
        $data = Product::with('category')->where('products.uuid',$product->uuid)->first()->toArray();
        Log::info('Show Product : ', 
            [
                'user' => User::find($request->header('Authorization'))->first()->toArray(),
                'data' => $data
            ]
        );
        return DefaultResource::make([
            'message' => "Success, load data with uuid : $product->uuid",
            'metadata' => $data
        ]);
    }
    public function update(Request $request, Product $product)
    {
        Log::info('Update Product : ', 
            [
                'user' => User::find($request->header('Authorization'))->first()->toArray(),
                'data' => 
                    [
                        'from' => $product->toArray(),
                        'to' => $request->all()
                    ]
            ]
        );
        sleep(1);
        $request->validate([
            'name' => 'required|max:45',
            'price' => 'required|numeric',
            'category_uuid' => 'required|exists:categories,uuid',
            'description' => 'required|max:255'
        ]);
        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->category_uuid = $request->category_uuid ?? $product->category_uuid;
        $product->description = $request->description ?? $product->description;
        $product->update();
        return DefaultResource::make([
            'message' => 'Success update data',
            'metadata' => $product
        ]);
    }
    public function destroy(Request $request, Product $product)
    {
        Log::info('Delete Product : ', 
            [
                'user' => User::find($request->header('Authorization'))->first()->toArray(),
                'data' => $product->toArray()
            ]
        );
        $product->delete();
        return DefaultResource::make([
            'message' => 'Success, delete data',
            'metadata' => $product
        ]);
    }
}

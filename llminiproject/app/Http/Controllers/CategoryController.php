<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = Category::all();
        Log::info('Load Category : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $data
            ]
        );
        return DefaultResource::make([
            'message' => 'Success, load all data',
            'metadata' => $data
        ]);
    }
    public function store(Request $request)
    {
        Log::info('Store Category : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $request->all()
            ]
        );
        sleep(1);
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);;
        return DefaultResource::make([
            'message' => 'Success, store data',
            'metadata' => $category
        ]);
    }
    public function show(Request $request, Category $category)
    {
        $data = $category->toArray();
        Log::info('Show Category : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $data
            ]
        );
        return DefaultResource::make([
            'message' => "Success, load data with uuid : $category->uuid",
            'metadata' => $data
        ]);
    }
    public function update(Request $request, Category $category)
    {
        Log::info('Update Category : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => 
                    [
                        'from' => $category->toArray(),
                        'to' => $request->all()
                    ]
            ]
        );
        sleep(1);
        
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        $category->name = $request->name ?? $category->name;
        $category->description = $request->description ?? $category->description;
        $category->update();
        return DefaultResource::make([
            'message' => 'Success update data',
            'metadata' => $category
        ]);
    }
    public function destroy(Request $request, Category $category)
    {
        Log::info('Delete Category : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $category->toArray()
            ]
        );
        $category->delete();
        return DefaultResource::make([
            'message' => 'Success, delete data',
            'metadata' => $category
        ]);
    }
}

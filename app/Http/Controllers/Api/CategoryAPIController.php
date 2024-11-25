<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryAPIController extends Controller
{
    public function index() {
        $categories = Category::get();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category) {
        // return response()->json($category);
        return new CategoryResource($category);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|min:3|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errorCode' => '004',
                'message' => 'Missing required fields' // 'errors.required_field'
            ]);
        }

        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function update(Category $category, Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:categories|min:3|max:50'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errorCode' => '004',
                'message' => 'Missing required fields' // 'errors.required_field'
            ]);
        }

        $category->title = $request->get('title');
        $category->save();
        return new CategoryResource($category);
    }

    public function destroy(Category $category, Request $request) {
        $category->delete();
        return response()->json([
            'message' => 'Category is deleted'
        ]);
    }
}

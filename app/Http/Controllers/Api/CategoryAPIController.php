<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}

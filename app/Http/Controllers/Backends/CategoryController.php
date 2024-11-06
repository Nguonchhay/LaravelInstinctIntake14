<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();
        return view('backends.categories.index')->with('categories', $categories);
    }

    public function create() {
        return view('backends.categories.create');
    }

    public function store(Request $request) {
        $title = $request->get('title') ?? '';
        if ($title === '') {
            return back();
        }
        $category = new Category();
        $category->title = $title;
        $category->save();

        return redirect(route('backends.categories.index'));
    }

    // Old Laravel style:
    // public function edit($id) {
    //     $category = Category::findOrFail($id);
    //     if (empty($category)) {
    //         return back();
    //     }
    //     return view('backends.categories.edit', [
    //         'category' => $category
    //     ]);
    // }

    public function edit(Category $category) {
        return view('backends.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Category $category, Request $request) {
        // Old Laravel style:
        // if ($request->has('title') && $request->get('title') === '') {
        //     return back();
        // }
        // $title = $request->get('title');

        $title = $request->get('title') ?? '';
        if ($title === '') {
            return back();
        }
        /**
         * Dynamic way
         * foreach ($request->all() => $field => $value) {
         *  $category->{$field} = $value;
         * }
         * Laravel style
         * $category = Category::save($request->all());
         */
        $category->title = $title;
        $category->save();
        return redirect(route('backends.categories.index'));
    }
}

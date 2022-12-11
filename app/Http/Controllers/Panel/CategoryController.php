<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Config;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderByDesc('id')
            ->paginate(Config::get('dornicasettings.paginate.region'));
        return view('panel.category.index', compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->only('name','slug'));
        return redirect()->back()->with('success','Add new category successfully.');
    }


    public function edit(Category $category)
    {
        return view('panel.category.edit',compact('category'));
    }


    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->only('name','slug'));
        return redirect()->back()->with('success','Update category successfully.');
    }


    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->with('success', 'Delete category successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('error', 'Can not delete this category');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::query()->orderByDesc('id')->get();

        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $mainCategories = Categories::forJob()->whereNull('parent_id')->get();

        return view('admin.categories.create', [
            'mainCategories' => $mainCategories,
        ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Categories::create($request->validated());
        if ($request->hasFile('image')) {
            $category->addMedia($request->file('image'))->toMediaCollection('category');
        }

        $category->update([
            'default_cover_image' => $category->getFirstMediaUrl('category')
        ]);

        return redirect()->route('admin.categories.store');
    }

    public function edit(Categories $category)
    {
        $mainCategories = Categories::whereNull('parent_id')->get();

        $category = $category->load('parent');

        return view('admin.categories.edit', [
            'category' => $category,
            'mainCategories' => $mainCategories,
        ]);
    }

    public function update(CategoryUpdateRequest $request, Categories $category)
    {
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('category');
            $category->addMedia($request->file('image'))->toMediaCollection('category');
        }

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'model' => $request->model,
            'default_cover_image' => $category->getFirstMediaUrl('category'),
        ]);

        return redirect()->back();
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.store');
    }
}

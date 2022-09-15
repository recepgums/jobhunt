<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\Job;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::get();

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

        $category->default_cover_image = $category->getFirstMediaUrl('category');
        $category->save();

        return redirect()->route('admin.categories.store');
    }

    public function edit($id)
    {
        $mainCategories = Categories::whereNull('parent_id')->where('model', 'App\Models\Job')->get();

        $category = Categories::with('parent')->where('id', $id)->first();

        return view('admin.categories.edit', [
            'category' => $category,
            'mainCategories' => $mainCategories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $imageName = time() . '.' . $request->image->extension();

        $path = $request->image->move('img', $imageName);

        $category = Categories::where('id', $id);
        $category->fill($request->toArray());
        $category->default_cover_image = $path;
        $category->model = "App\Models\Blog";
        $category->slug = $request->name;
        $category->save();

        return redirect()->route('admin.categories.store');
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\Categories;

class BlogController extends Controller

{
    public function index()
    {
        $blogs = Blog::all();

        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Categories::forBlog()->get();

        return view('admin.blog.create', compact('categories'));
    }

    public function store(BlogStoreRequest $request)
    {
        try {
            $blog = Blog::create($request->validated());
        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }

        if ($request->hasFile('cover_image')) {
            $blog->addMedia($request->file('cover_image'))->toMediaCollection('images');
        }

        return redirect()->route('admin.blog.index');
    }

    public function show(Blog $blog)
    {
        $prevBlog = Blog::where('id', $blog->id - 1)->first();
        $nextBlog = Blog::where('id', $blog->id + 1)->first();

        $recentBlogs = Blog::query()->inRandomOrder()->limit(6)->get();

        return view('blogs.show', [
            'blog' => $blog,
            'prevBlog' => $prevBlog,
            'nextBlog' => $nextBlog,
            'recentBlogs' => $recentBlogs,
        ]);
    }

    public function edit(Blog $blog)
    {
        $categories = Categories::forBlog()->get();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    public function update(Blog $blog, BlogUpdateRequest $request)
    {
        $blog->update($request->validated());

        if ($request->hasFile('cover_image')) {
            $blog->media()->delete();

            $blog->addMedia($request->file('cover_image'))->toMediaCollection('images');
        }

        return redirect()->back();
    }
}

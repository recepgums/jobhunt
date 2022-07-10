<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->inRandomOrder()->paginate(9);

        return view('blogs.index', ["blogs" => $blogs]);
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Blog::published();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
        }

        $blogs = $query->latest()->paginate(9);

        return view('admin.blogs.index', compact('blogs'));
    }

    public function show($slug)
    { 
        $blog = Blog::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedPosts = $blog->getRelatedPosts(3);

        return view('admin.blogs.show', compact('blog', 'relatedPosts'));
    }
}
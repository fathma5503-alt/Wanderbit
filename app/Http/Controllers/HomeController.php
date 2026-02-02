<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch active categories
        $categories = Category::orderBy('name')->get();

        // Fetch active packages with category
        $packages = Package::with('category')
            ->where('is_active', true)
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->latest()
            ->get();

        return view('index', compact('packages', 'categories'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Package;
use App\Models\Testimonials;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch categories
        $categories = Category::orderBy('name')->get();

        // Fetch packages
        $packages = Package::with('category')
            ->where('is_active', true)
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->latest()
            ->get();

        return view('index', compact('packages', 'categories'));
    }

   
    public function about()
    {
        $testimonials = Testimonials::latest()->get();
         $teams = Team::latest()->get();

        return view('about', compact('testimonials','teams'));
    }
      public function contact()
    {
        $testimonials = Testimonials::latest()->get();
         $teams = Team::latest()->get();

        return view('contact', compact('testimonials','teams'));
    }

    public function services(Request $request)
    {
        // Fetch categories
        $categories = Category::orderBy('name')->get();

        // Fetch packages
        $packages = Package::with('category')
            ->where('is_active', true)
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->latest()
            ->get();

        return view('services', compact('packages', 'categories'));
    }

}

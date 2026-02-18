<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
 //    backend

    public function index()
    {
        $testimonials = Testimonials::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        $testimonial = new Testimonials();
        $testimonial->name = $request->name;
        $testimonial->message = $request->message;

        if ($request->hasFile('image')) {
            $testimonial->image = $request->file('image')
                ->store('testimonials', 'public');
        }

        $testimonial->save();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial created successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonials::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonials::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'message' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:20480',
        ]);

        if ($request->hasFile('image')) {

            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }

            $testimonial->image = $request->file('image')
                ->store('testimonials', 'public');
        }

        $testimonial->update([
            'name' => $request->name,
            'message' => $request->message,
        ]);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully!');
    }

    public function destroy($id)
    {
        $testimonial = Testimonials::findOrFail($id);

        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial deleted successfully!');
    }

    // frontend
    
    public function publicIndex()
    {
        $testimonials = Testimonials::latest()->get();
        return view('testimonials', compact('testimonials'));
    }
}

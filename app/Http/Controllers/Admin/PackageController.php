<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /* =======================
        ADMIN SECTION
    ======================== */

    public function create_package()
    {
        $category = Category::latest()->get();
        return view('admin.package.create_package', compact('category'));
    }

    public function create_pack(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'featured_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'other_images' => 'nullable|array',
            'other_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $package = new Package();
        $package->fill($validated);
        $package->slug = Str::slug($request->title);
        $package->is_active = $request->has('is_active');

        /* Featured image */
        if ($request->hasFile('featured_image')) {
            $package->featured_image = $request->file('featured_image')
                ->store('packages', 'public');
        }

        /* Other images */
        $otherImages = [];
        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $image) {
                $otherImages[] = $image->store('package_other_images', 'public');
            }
        }
        $package->other_images = $otherImages ? json_encode($otherImages) : null;

        $package->save();

        return redirect()->route('show_package')
            ->with('success', 'Package created successfully!');
    }

    public function show_package()
    {
        $package = Package::with('category')->latest()->get();
        return view('admin.package.show_package', compact('package'));
    }

    public function update_package($id)
    {
        $package = Package::findOrFail($id);
        $category = Category::latest()->get();
        return view('admin.package.update_package', compact('package', 'category'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'other_images' => 'nullable|array',
            'other_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:4096',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        /* Featured image update */
        if ($request->hasFile('featured_image')) {
            if ($package->featured_image) {
                Storage::disk('public')->delete($package->featured_image);
            }
            $package->featured_image = $request->file('featured_image')
                ->store('packages', 'public');
        }

        /* Other images handling */
        $existingImages = $package->other_images
            ? json_decode($package->other_images, true)
            : [];

        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $index) {
                if (isset($existingImages[$index])) {
                    Storage::disk('public')->delete($existingImages[$index]);
                    unset($existingImages[$index]);
                }
            }
        }

        if ($request->hasFile('other_images')) {
            foreach ($request->file('other_images') as $image) {
                $existingImages[] = $image->store('package_other_images', 'public');
            }
        }

        $package->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'price' => $request->price,
            'duration_days' => $request->duration_days,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
            'other_images' => $existingImages ? json_encode(array_values($existingImages)) : null,
        ]);

        return redirect()->route('show_package')
            ->with('success', 'Package updated successfully!');
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);

        if ($package->featured_image) {
            Storage::disk('public')->delete($package->featured_image);
        }

        if ($package->other_images) {
            foreach (json_decode($package->other_images, true) as $img) {
                Storage::disk('public')->delete($img);
            }
        }

        $package->delete();

        return redirect()->route('show_package')
            ->with('success', 'Package deleted successfully!');
    }

    /* =======================
        PUBLIC SECTION
    ======================== */

 public function publicIndex(Request $request)
{
    $packages = Package::where('is_active', true)

        // Filter by destination (package id)
        ->when($request->destination, function ($q) use ($request) {
            $q->where('id', $request->destination);
        })

        ->latest()
        ->get();

    return view('package', compact('packages'));
}


    public function showPublic($id)
    {
        $package = Package::where('is_active', true)->findOrFail($id);
        return view('package_details', compact('package'));
    }
}

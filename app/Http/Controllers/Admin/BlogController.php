<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
public function index(Request $request)
{
    $query = Blog::query();

    // Filter by title
    if ($request->title) {
        $query->where('title', 'like', '%'.$request->title.'%');
    }

    // Filter by status
    if ($request->status) {
        $query->where('status', $request->status);
    }

    // Filter by slug
    if ($request->slug) {
        $query->where('slug', 'like', '%'.$request->slug.'%');
    }

    // Date filter (optional)
    if ($request->from_date && $request->to_date) {
        $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
    }

    $blogs = $query->orderBy('id', 'asc')->paginate(10);

    return view('admin.blogs.index', compact('blogs'));
}

public function show($id)
{
    $blog = Blog::findOrFail($id);
    return view('admin.blogs.show', compact('blog'));
}

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:blogs',
            'cover_image'=>'nullable|image'
        ]);

        $data = $request->all();

        // Upload Image and store only filename
        if($request->hasFile('cover_image')) {
            $filename = time().'_'.$request->cover_image->getClientOriginalName();
            $request->cover_image->move(public_path('uploads/blog'), $filename);
            $data['cover_image'] = $filename;  // Store filename only
        }

        $data['slug'] = Str::slug($request->slug);

        Blog::create($data);

        return redirect()->route('blogs.index')->with('success','Blog created successfully.');
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:blogs,slug,'.$id,
            'cover_image'=>'nullable|image'
        ]);

        $data = $request->all();

        // Upload Image and store only filename
        if($request->hasFile('cover_image')) {
            $filename = time().'_'.$request->cover_image->getClientOriginalName();
            $request->cover_image->move(public_path('uploads/blog'), $filename);
            $data['cover_image'] = $filename; // store filename only
        }

        $data['slug'] = Str::slug($request->slug);

        $blog->update($data);

        return redirect()->route('blogs.index')->with('success','Blog updated successfully.');
    }

    public function destroy($id) {
        Blog::findOrFail($id)->delete();
        return back()->with('success','Blog deleted successfully.');
    }

    // Public blog pages
   public function publicIndex() {
    $blogs = Blog::where('status','published')->latest()->paginate(6);
    return view('blog', compact('blogs'));
}

    public function showPublic($slug) {
        $blog = Blog::where('slug',$slug)->firstOrFail();
        $related = Blog::where('id','!=',$blog->id)->take(3)->get();
        return view('blog_detail', compact('blog','related'));
    }
}
     
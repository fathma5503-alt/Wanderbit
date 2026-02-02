<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
       public function create_category(){
        return view('admin.category.create_category');

    }
    public function create_cate(Request $request){
        $category = new Category();
        $category -> name = $request ->name;
        $category -> description = $request ->description;
        $category -> save();
        return redirect()->route('show_category')->with('success','Category added successfully');
    }
      public function show_category(){
    $category = Category::all();
    return view("admin.category.show_category", compact("category"));

   }
     public function destroy($id){
        $category = Category::findOrFail($id);

        $category->delete();
        return redirect()->route('show_category')->with('working', 'Category Delete Successfully');
    }
       public function update_category($id)
{
    $category = Category::findOrFail($id);
    return view("admin.category.update_category", compact("category"));
}

public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:20',
    ]);
    
    $category = Category::findOrFail($id);
    $category->update($data);
    
    return redirect()->route('show_category')
        ->with('success', 'Category updated successfully.');
}
}

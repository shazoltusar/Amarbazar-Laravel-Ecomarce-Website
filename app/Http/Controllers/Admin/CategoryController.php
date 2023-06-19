<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Index()
    {
        $catagories = Category::latest()->get();
        return view('admin.allcatetory', compact('catagories'));
    }
    public function AddCategory()
    {
        return view('admin.addcatetory');
    }
    public function StoreCat(Request $request)
    {
        $request->validate([
            'categori_name' => 'required|unique:categories',
        ]);
        Category::insert([
            'categori_name' => $request->categori_name,
            'slug' => strtolower(str_replace(' ', '_', $request->categori_name))
        ]);
        return redirect()->route('allcatetory')->with('message', 'Category Added Successfully!');
    }
    public function EditCategory($id)
    {
        $category_info = Category::findOrFail($id);
        return view('admin.editcategory', compact('category_info'));
    }
    public function UpdateCat(Request $request)
    {
        $category_id = $request->category_id;
        $request->validate([
            'categori_name' => 'required|unique:categories',
        ]);
        Category::findOrFail($category_id)->update([
            'categori_name' => $request->categori_name,
            'slug' => strtolower(str_replace(' ', '_', $request->categori_name))
        ]);
        return redirect()->route('allcatetory')->with('message', 'Category Updated Successfully!');
    }
    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('allcatetory')->with('message', 'Category Delete Successfully!');
    }
}